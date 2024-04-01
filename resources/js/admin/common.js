import { Tooltip } from 'bootstrap';
import 'overlayscrollbars/overlayscrollbars.css';
import { OverlayScrollbars } from 'overlayscrollbars';

class AppCommon {
  constructor() {}

  init() {
    this._applyTooltip();
    this._applySelect2();
    this._select2WithIcon();
    this._applyCustomScroll();
    this._inputGroupHighlight();
    // this._applyBsDatePicker();
    this._removeCard();
  }

  _applyTooltip() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.map((tooltipTriggerEl) => {
      return new Tooltip(tooltipTriggerEl)
    })
  }

  _applySelect2() {
    $('select.select2').each((_, element) => {
      let select = $(element);
      let closeOnSelect = select.hasClass('do-not-close-on-selecting') ? false : true;
      let options = {
        allowClear: true,
        width: 'copy',
        closeOnSelect: closeOnSelect,
        placeholder: "Select an attribute"
      };
      select.select2(options);
    });
  }

  _select2WithIcon() {
    function icon(item) {
      return item.id ? "<i class='" + $(item.element).data("icon") + " me-2'></i>" + item.text : item.text
    }
    $('select.select2-with-icon').each(function(_, element) {
      let select = $(element);
      let options = {
        width: '100%',
        templateResult: icon,
        templateSelection: icon,
        escapeMarkup: function(item) {
          return item
        }
      };
      select.select2(options);
    });
  }

  _applyCustomScroll() {
    let items = document.getElementsByClassName("custom-scroll");
    let array = [].slice.call(items)
    for (let i = 0; i < array.length; i++) {
      OverlayScrollbars({
        target: array[i],
      }, {
        scrollbars: {
          visibility: "hide",
        }
      });
    }
  }

  _inputGroupHighlight() {
    $('.input-group .form-control').on('focus', function() {
      $(this).parent().addClass('focus');
    });

    $('.input-group .form-control').on('focusout', function() {
      $(this).parent().removeClass('focus');
    });
  }

  _applyBsDatePicker() {
    let controls = {
      leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
      rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
    }
    if ($('.datepicker').length > 0) {
      $('.datepicker').datepicker({
        todayHighlight: true,
        orientation: "bottom left",
        templates: controls
      });
    }
  }

  _removeCard() {
    $('[data-bs-toggle="remove"]').on('click', function(e) {
      e.preventDefault();

      $(this).closest('.card').remove();
    });
  }

  _applyDatePicker() {
    if ($('.datepicker').length > 0) {
      $('.datepicker').datepicker();
    }
  }
}

export default AppCommon;