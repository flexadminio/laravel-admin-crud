$.fn.fileinputBsVersion = 5;
class FlexAdminBulkUploader {
  UPLOAD_URL = '';

  init = (options) => {
  
  }

  bindingBulkUploader = (allowedFileExtensions, maxFileSize) => {
   
  }

  checkShowButton = () => {
   
  }

  addUploadButton = () => {
    
  }

  bindingSubmit = (fakeUpload) => {
    
  }

  preloadLoadImage = (imgSrc, callback) => {
   
  }

  showLoading = () => {

  }

  removeLoading = () => {
  }

  getFiles = () => {
   
  }

  submitFiles = (formData) => {
    
  }

  fakeUpload = (formData) => {
   
  }

  uploadProgressHandler = (event) => {
   
  }

  loadHandler = (event) => {
   
  }

  errorHandler = (event) => {
   
  }

  fillForm = (formFiles, files) => {
   
  }

  buildDatepicker = (previewId) => {
    
  }

  buildTagsSelect2 = (previewId) => {
  
  }

  onFilesAddedCallback = () => {
    
  }

  fileSizeConverter = (size, toUnit, fromUnit) => {
    
  }

  formatThousands = (n, dp) => {
   
  }

  defaultContent = () => {
   
  }

  previewData = (type, mime) => {
    
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
    
  }

  customPreviewTemplate = (type, mime) => {
   
  }

  footerTemplate = () => {
   
  }
}

export default FlexAdminBulkUploader;
