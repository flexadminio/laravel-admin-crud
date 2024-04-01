import AjaxModalOpenCallback from './ajax_modal_open_callback.js';

class FlexAdminModal {
  init = () => {
    this.ajaxSuccessCallback();
    this.ajaxErrorCallback();
    this.triggerModal();
    this.modalClosedCallback();
  }

  ajaxSuccessCallback = () => {
    var self = this;
    $( document ).ajaxSuccess(function( event, xhr, settings ) {
      if (self.isResponseScript(settings)) { self.stopAndDebug(event, xhr, settings, null); return; }

      if (self.isOpening() && self.isResponseHtml(settings)) {
        event.preventDefault();
        self.renderModalContent(xhr.responseText);
      }
    });
  }

  ajaxErrorCallback = () => {
    var self = this;
    $( document ).ajaxError(function( event, jqxhr, settings, thrownError ) {
      if (thrownError == 'canceled' || !self.isOpening() || self.isResponseJson(settings)) { return; }
      event.preventDefault();

      // for remotipart
      if (settings.iframe && jqxhr.status == 200 && jqxhr.statusText == 'OK' && jqxhr.responseText) {
        self.renderModalContent(jqxhr.responseText);
        return;
      }

      self.renderFormContent(jqxhr.responseText);
    });
  }

  triggerModal = () => {
    var self = this;
    $(document).on('click', 'a[data-modal]', function (event) {
      event.preventDefault();
      var url = $(this).attr('href');
      self.getContentByXhr(url);
    });
  }

  modalClosedCallback = () => {
    $(document).on('hidden.bs.modal', function () {
      $('#flexadmin-modal').empty().remove();
    });
  }

  bsModal = (data) => {
    var modalWrapper = $('#flexadmin-modal');
    modalWrapper.html(data)
    return new window.bootstrap.Modal(modalWrapper.find('.modal'), {backdrop: 'static', keyboard: false, focus: false});
  }

  open = (data) => {
    var modalWrapper = $('<div/>', {
      id: 'flexadmin-modal'
    });
    $(document.body).append(modalWrapper);
    this.bsModal(data).show();
  }

  close = () => {
    var modalEl = $('#flexadmin-modal .modal');
    
    if (modalEl.length > 0) {
      var modal = window.bootstrap.Modal.getInstance(modalEl);
      modal.hide();
    }
  }

  renderModalContent = (html) => {
    var newModalContent = $(html).find('.modal-content').html();
    if (newModalContent) {
      var modalDialogClassName = $(html).find('.modal-dialog').attr('class');
      $('#flexadmin-modal .modal-dialog').addClass(modalDialogClassName);
      $('#flexadmin-modal .modal-content').empty().html(newModalContent);
    }
  }

  renderFormContent = (html) => {
    $('.modal-body-container').html(html);
    $.event.trigger({
      type: "shown.bs.modal"
    });
  }

  isResponseHtml = (settings) => {
    return settings.dataTypes.indexOf('html') >= 0;
  }

  isResponseScript = (settings) => {
    return settings.dataTypes.indexOf('script') >= 0;
  }

  isResponseJson = (settings) => {
    return settings.dataTypes.indexOf('json') >= 0;
  }

  isOpening = () => {
    return $('#flexadmin-modal > .modal').length == 1;
  }

  getContentByXhr = (url) => {
    var self = this;
    if (self.isOpening()) {
      self.close();
      setTimeout(function() {
        _get();
      }, 200);
    } else {
      _get();
    }
    
    function _get() {
      $.ajax({
        global: false,
        url: url,
        method: 'GET',
        cache: false,
        success: function(data) {
          self.open(data);
          self.dissmissModalWithExternalLink();
          new AjaxModalOpenCallback().init();
        }
      });
    }
  }

  stopAndDebug = (event, xhr, settings, exception) => {
    event.stopImmediatePropagation();
    console.log('===> Server response javascript, all events has been stopped, see details below', event);
    console.log('XmlHttpRequest Object', xhr);
    console.log('XmlHttpRequest Settings', settings);
    if (exception == null) {
      console.log('all good');
    } else {
      console.log('Exception', exception);
    }
  }

  dissmissModalWithExternalLink = () => {
    var self = this;
    $('a[data-window="dismiss-modal-and-open-link"').on('click', function(){
      self.close();
    });
  }
}

export default FlexAdminModal;
