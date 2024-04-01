$.fn.fileinputBsVersion = 5;
class FlexAdminBulkUploader {
  UPLOAD_URL = '';

  init = (options) => {
    this.UPLOAD_URL = options.uploadUrl;
    this.showThumbnail = options.showThumbnail;
    this.bindingBulkUploader(options.allowedFileExtensions, options.maxFileSize);
    this.addUploadButton();
    this.bindingSubmit(options.fakeUpload);
    this.onFilesAddedCallback();
    this.afterUpload = options.afterUpload;
  }

  bindingBulkUploader = (allowedFileExtensions, maxFileSize) => {
    var self = this;
    var maxFileSizeKb = maxFileSize * 1024;
    $('#flexadmin-bulk-upload-input').fileinput({
      uploadUrl: self.UPLOAD_URL,
      deleteUrl: null,
      initialPreviewAsData: true,
      showUploadedThumbs: true,
      allowedFileExtensions: allowedFileExtensions,
      dropZoneEnabled: true,
      fileActionSettings: {
        showRemove: false,
        showUpload: false,
        showDownload: false,
        showZoom: false,
        showDrag: false,
        showRotate: false
      },
      maxFileCount: 5,
      maxFileSize: maxFileSizeKb, // in KB
      maxFilePreviewSize: maxFileSizeKb,
      msgSizeTooLarge: 'File "{name}" (<b>{size} KB</b>) exceeds maximum allowed upload size of <b>'+maxFileSize+' MB</b>.',
      browseIcon: '<i class="fas fa-folder-open"></i>',
      browseClass: 'btn btn-highlight browse-button',
      buttonLabelClass: 'd-none-xs browse-button-label',
      previewTemplates: {
        html: self.customPreviewTemplate('html', 'text/html'),
        image: self.customPreviewTemplate('image', 'image/*'),
        text: self.customPreviewTemplate('text', 'text/plain;charset=UTF-8'),
        office: self.customPreviewTemplate('office'),
        gdocs: self.customPreviewTemplate('gdocs'),
        video: self.customPreviewTemplate('video'),
        audio: self.customPreviewTemplate('audio'),
        flash: self.customPreviewTemplate('flash'),
        object: self.customPreviewTemplate('object'),
        pdf: self.customPreviewTemplate('pdf', 'application/pdf'),
        other: self.customPreviewTemplate('other')
      },
      // layoutTemplates: { // remove this when we override previewTemplates
      //   footer: self.footerTemplate()
      // },
      generateFileId: (file) => {
        if (!file) { return null; }
        var fileIndex = Object.keys($('#flexadmin-bulk-upload-input').fileinput('getFileStack')).length;
        return "file-" + (fileIndex + 1);
      }
    }).on('fileselectnone filelock fileremoved filecleared', (event) => {
      self.checkShowButton();
    }).on('filebatchselected', (event, files) => {
    });
  }

  checkShowButton = () => {
    var files = $('#flexadmin-bulk-upload-input').fileinput('getFileStack');
    if (files.length === 0)
      $('#flexadmin-bulk-upload-submit').addClass('d-none');
    else
      $('#flexadmin-bulk-upload-submit').removeClass('d-none');
  }

  addUploadButton = () => {
    $('<button />', {
      id: 'flexadmin-bulk-upload-submit',
      class: 'btn btn-success d-none btn-file rounded-2 ms-3',
      style: 'height: 43px',
      type: 'submit',
      name: 'commit',
      value: 'Upload',
      tabindex: 500
    }).html('<i class="fas fa-arrow-circle-up"></i><span class="d-none-xs"> Upload</span>')
      .insertAfter($('.flexadmin-bulk-upload-form .input-group .btn-file'));
  }

  bindingSubmit = (fakeUpload) => {
    var self = this;
    $('#flexadmin-bulk-upload-submit').on('click', (e) => {
      e.preventDefault();
      self.showLoading();
      var files = self.getFiles();
      if (files) {
        if (fakeUpload === true)
          self.fakeUpload(files);
        else {
          self.submitFiles(files);
        }
      } else {
        self.removeLoading();
      }
    });
  }

  preloadLoadImage = (imgSrc, callback) => {
    var imgPreload = new Image();
    imgPreload.src = imgSrc;
    if (imgPreload.complete)
      callback(imgPreload);
    else {
      imgPreload.onload = () => {
          callback(imgPreload);
      }
      imgPreload.onerror = () => {
          callback(undefined);
      }
    }
  }

  showLoading = () => {
    var self = this;

    $('.flexadmin-bulk-upload-form .upload-body').append($('<div class="uploading text-center"><div class="progress">' +
      '<div class="progress-bar progress-bar-striped progress-bar-animated active bg-info" ole="progressbar" ' +
      'aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div>' +
      '<div class="loaded_n_total"></div><div class="status"></div>'+
      '<div class="current-action"></div></div>'));
    var overlay = $('.flexadmin-bulk-upload-form .upload-body .uploading');
    var loadingImg = $('#main-loading').attr('src');
    self.preloadLoadImage(loadingImg, (img) => {
      if (img)
        $(img).appendTo(overlay);
    });

    var files = $('#flexadmin-bulk-upload-input').fileinput('getFileStack');
    if (files.length > 1)
      overlay.css('padding-top', ((files.length - 1) * 5) + '%');
  }

  removeLoading = () => {
    $('.flexadmin-bulk-upload-form .upload-body .uploading').remove();
  }

  getFiles = () => {
    $('.kv-zoom-cache, .file-preview-error').remove();
    var files = $('#flexadmin-bulk-upload-input').fileinput('getFileStack');
    if (files.length == 0) {
      $.bootstrapGrowl('Please choose as least one file', { type: "danger" });
      return null;
    }

    var formFiles = $('.flexadmin-bulk-upload-form [id^="thumb-flexadmin-bulk-upload-input-file"]');
    return this.fillForm(formFiles, files);
  }

  submitFiles = (formData) => {
    var self = this;
    $.ajax({
      type: 'POST',
      url: self.UPLOAD_URL,
      cache: false,
      contentType: false,
      processData: false,
      data: formData,
      xhr: () => {
        var xhr = new window.XMLHttpRequest();
        xhr.upload.manage = self;
        xhr.upload.addEventListener("progress", self.uploadProgressHandler, false);
        return xhr;
      },
      success: (data) => {
        self.removeLoading();
        self.afterUpload();
        $('#flexadmin-bulk-upload-submit').addClass('d-none');
      },
      error: (data) => {
        self.removeLoading();
        $.bootstrapGrowl('Upload failed', {
          type: "danger"
        });
      }
    });
  }

  fakeUpload = (formData) => {
    // console.log('fakeUpload', Object.fromEntries(formData));
    var self = this;
    $.ajax({
      type: 'POST',
      url: '/',
      cache: false,
      contentType: false,
      processData: false,
      data: formData,
      xhr: () => {
        var xhr = new window.XMLHttpRequest();
        xhr.upload.manage = self;
        xhr.upload.addEventListener("progress", self.uploadProgressHandler, false);
        xhr.addEventListener("load", self.loadHandler, false);
        xhr.addEventListener("error", self.errorHandler, false);
        return xhr;
      }
    });
  }

  uploadProgressHandler = (event) => {
    var self = event.target.manage;
    $('.flexadmin-bulk-upload-form .uploading .loaded_n_total').html("Uploaded " + self.fileSizeConverter(event.loaded, 'KB') + " of " + self.fileSizeConverter(event.total, 'KB'));
    var percent = (event.loaded / event.total) * 100;
    var progress = Math.round(percent);
    $('.flexadmin-bulk-upload-form .uploading .progress-bar').html(progress + " % in progress")
    .attr('aria-valuenow', progress).css("width", progress + "%");
    $('.flexadmin-bulk-upload-form .uploading .status').html(progress + "% uploaded" + (progress >= 100 ? '' : '... please wait'));
    $('.flexadmin-bulk-upload-form .uploading .current-action').html('Current action: <span class="badge">Uploading</span>');
  }

  loadHandler = (event) => {
    event.preventDefault();
    event.stopImmediatePropagation();

    var self = event.target.upload.manage;
    $('.flexadmin-bulk-upload-form .uploading .current-action').html('Current action: <span class="badge bg-success">Uploaded</span>');
    setTimeout(() => {
      self.removeLoading();
      self.afterUpload();
      $('#flexadmin-bulk-upload-submit').addClass('d-none');
      $.bootstrapGrowl('Upload successfully', {
        type: "success"
      });
    }, 3000);
  }

  errorHandler = (event) => {
    console.log('errorHandler', event);
    var self = event.target.upload.manage;
    self.removeLoading();
    $.bootstrapGrowl('Upload failed', {
      type: "danger"
    });
  }

  fillForm = (formFiles, files) => {
    var hasError = false;
    var formData = new FormData();
    formFiles.each((index, element) => {
      var i = parseInt($(element).data('fileindex')) + 1;
      formData.append('attachments[' + i + '][file]', Object.values(files)[index].file);
      var label = $('[name="attachments[' + i + '][title]"]').val();
      if (typeof(label) === 'undefined' || label.trim() === '') {
        $.bootstrapGrowl('Please enter label', { type: 'danger' });
        hasError = true;
        return;
      }

      formData.append('attachments[' + i + '][title]', $('[name="attachments[' + i + '][title]"]').val());
      var featured = 'false';
      if ($('[name="attachments[' + i + '][featured]"]').is(':checked')) {
        featured = 'true';
      }
      formData.append('attachments[' + i + '][featured]', featured);
      formData.append('attachments[' + i + '][alt_text]', $('[name="attachments[' + i + '][alt_text]"]').val());
      formData.append('attachments[' + i + '][caption]', $('[name="attachments[' + i + '][caption]"]').val());
      formData.append('attachments[' + i + '][description]', $('[name="attachments[' + i + '][description]"]').val());
    });

    return hasError ? null : formData;
  }

  buildDatepicker = (previewId) => {
    var dateField = $(document.getElementById(previewId)).find('.expired-datepicker');

    if (dateField.length > 0) {
      dateField.datetimepicker({
        format: 'DD/MM/YYYY'
      });

    }
  }

  buildTagsSelect2 = (previewId) => {
    var tagSelect = $(document.getElementById(previewId)).find('.tags-select2');
    if (!tagSelect.data('select2')){
      tagSelect.select2({
        allowClear: true,
        width: 'copy'
      });
    }
  }

  onFilesAddedCallback = () => {
    var self = this;
    $('#flexadmin-bulk-upload-input').on('fileloaded', (event, file, previewId, index, reader) => {
      self.buildDatepicker(previewId);
      self.buildTagsSelect2(previewId);
      $('.flexadmin-bulk-upload-form .kv-zoom-cache').empty();
      $('#flexadmin-bulk-upload-submit').removeClass('d-none');
    });
  }

  fileSizeConverter = (size, toUnit, fromUnit) => {
    var self = this;
    if (typeof fromUnit === 'undefined')
      fromUnit = 'B';
    var units = ['B', 'KB', 'MB', 'GB', 'TB'];
    var from = units.indexOf(fromUnit.toUpperCase());
    if (from < 0)
      from = 0;
    var to = units.indexOf(toUnit.toUpperCase());
    var BASE_SIZE = 1024;
    var result = 0;

    if (from < 0 || to < 0) {
      return result = 'Error: Incorrect units';
    }

    result = from < to ? size / Math.pow(BASE_SIZE, to) : size * Math.pow(BASE_SIZE, from);
    return self.formatThousands(result, 2) +' ' + units[to];
  }

  formatThousands = (n, dp) => {
    var s = ''+(Math.floor(n)), d = n % 1, i = s.length, r = '';
    while ( (i -= 3) > 0 ) { r = ',' + s.substr(i, 3) + r; }
    return s.substr(0, i + 3) + r +
      (d ? '.' + Math.round(d * Math.pow(10, dp || 2)) : '');
  }

  defaultContent = () => {
    return '<div class="file-preview-other">\n' +
        '    <h2><i class="fal fa-file-alt display-1"></i></h2>\n' +
        '</div>';
  }

  previewData = (type, mime) => {
    var content = '';
    switch(type) {
      case 'text': case 'html': case 'pdf':
        content = this.renderObject('text', mime);
        break;
      case 'image':
        content = '<img src="{data}" class="file-preview-image kv-preview-data" title="{caption}" alt="{caption}">\n';
        break;
      case 'office':
        content =  '<iframe class="kv-preview-data file-preview-office" ' +
        'src="https://view.officeapps.live.com/op/embed.aspx?src={data}"></iframe>';
        break;
      case 'gdocs':
        content = '<iframe class="kv-preview-data file-preview-gdocs" ' +
        'src="https://docs.google.com/gview?url={data}&embedded=true"></iframe>';
        break;
      case 'video':
        content = '<video class="kv-preview-data file-preview-video" controls>\n' +
        '<source src="{data}" type="{type}">\n' + this.defaultContent() + '\n</video>\n';
        break;
      case 'audio':
        content = '<!--suppress ALL --><audio class="kv-preview-data file-preview-audio" controls>\n<source src="{data}" ' +
        'type="{type}">\n' + this.defaultContent() + '\n</audio>\n';
        break;
      case 'flash':
        content = '<embed class="kv-preview-data file-preview-flash" src="{data}" type="application/x-shockwave-flash">\n';
        break;
      case 'object':
        content = '<object class="kv-preview-data file-preview-object file-object {typeCss}" ' +
          'data="{data}" type="{type}">\n' + '<param name="movie" value="{caption}" />\n' +
          this.objectParams() + ' ' + this.defaultContent() + '\n</object>\n';
        break;
      default:
        content = '<div class="kv-preview-data file-preview-other-frame">\n' + this.defaultContent() + '\n</div>\n';
    }

    return content;
  }

  objectParams = () => {
    return'<param name="controller" value="true" />\n' +
            '<param name="allowFullScreen" value="true" />\n' +
            '<param name="allowScriptAccess" value="always" />\n' +
            '<param name="autoPlay" value="false" />\n' +
            '<param name="autoStart" value="false" />\n' +
            '<param name="quality" value="high" />\n'
  }

  renderObject = (type, mime) => {
    return '<object class="kv-preview-data file-preview-' + type + '" title="{caption}" ' +
        'data="{data}" type="' + mime + '">\n' + this.defaultContent() + '\n</object>\n';
  }

  renderThumbnail = (type, mime) => {
    var thumbnail =  '<td style="width: 320px;">' +
      '<div class="krajee-default">' +
          this.previewData(type, mime) +
          '{footer}' +
      '</div>' +
    '</td>';

    if (this.showThumbnail === false) {
      thumbnail = '';
    }

    return thumbnail;
  }

  customFields = () => {
    return '<td style="vertical-align: middle;">' +
              '<div class="form-group mb-3">' +
                '<abbr title="required">*</abbr>' +
                '<label>Title</label>' +
                '<input type="text" name="attachments[{fileindex}][title]" value="{caption}" id="attachments_{fileindex}_title" autocomplete="off" class="form-control">' +
              '</div>' +
              '<div class="form-group mb-3">' +
                '<label class="custom-checkbox">' +
                  '<input id="attachments_{fileindex}_featured" type="checkbox" name="attachments[{fileindex}][featured]" value="0" /> Featured' +
                  '<span></span>' +
                '</label>' +
              '</div>' +
              '<div class="form-group mb-3">' +
                '<label>Alt text</label>' +
                '<input type="text" name="attachments[{fileindex}][alt_text]" id="attachments_{fileindex}_alt_text" class="form-control" autocomplete="off">' +
              '</div>' +
              '<div class="form-group mb-3">' +
                '<label>Caption</label>' +
                '<input type="text" name="attachments[{fileindex}][caption]" id="attachments_{fileindex}_caption" class="form-control" autocomplete="off">' +
              '</div>' +
              '<div class="form-group mb-3">' +
                '<label>Description</label>' +
                '<input type="text" name="attachments[{fileindex}][description]" id="attachments_{fileindex}_description" class="form-control" autocomplete="off">' +
              '</div>' +
            '</td>';
  }

  customPreviewTemplate = (type, mime) => {
    return '<div class="kv-preview-thumb-{fileindex} kv-preview-thumb"  id="{previewId}" data-fileindex="{fileindex}" data-template="{template}">' +
        '<table class="table" style="border: 1px solid rgb(232, 232, 232);">' +
          '<tbody>' +
            '<tr>' +
              this.renderThumbnail(type, mime) +
              this.customFields() +
              '<td style="vertical-align: middle;">' +
                  '<a class="kv-file-remove btn btn-xs">' +
                    '<i class="fal fa-trash-alt fa-fw" style="font-size: 20px;"></i>' +
                  '</a>' +
              '</td>' +
            '</tr>' +
          '</tbody>' +
        '</table>' +
    '</div>';
  }

  footerTemplate = () => {
    return '<div class="file-thumbnail-footer" style ="height:94px">\n' +
        '<div class="form-group mb-2">' +
        '   <abbr title="required">*</abbr>' +
        '   <label>Label</label>' +
        '  <input class="kv-input kv-new form-control input-sm form-control-sm text-center {TAG_CSS_NEW}" placeholder="Enter File Label...">\n' +
        '</div>' +
        '<div class="form-group mb-2">' +
        '   <label>Caption</label>' +
        '  <input class="kv-input kv-init form-control input-sm form-control-sm text-center {TAG_CSS_INIT}" value="{caption}" placeholder="Enter Caption...">\n' +
        '</div>' +
        '<div class="small" style="margin:15px 0 2px 0">{size}</div> {progress}\n{indicator}\n{actions}\n' +
    '</div>';
  }
}

export default FlexAdminBulkUploader;
