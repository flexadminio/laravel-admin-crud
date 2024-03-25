export default class FlexAdminSelect2Builder {
  init = () => {
    let self = this;
    $(document).on('shown.bs.modal', () => {
      self.build();
    });
  }

  build = () => {
    $('select.form-control').each((_, element) => {
      var select = $(element);
      var closeOnSelect = select.hasClass('do-not-close-on-selecting') ? false : true;
      var options = {
        allowClear: true,
        width: 'copy',
        closeOnSelect: closeOnSelect
      };
      select.select2(options);
    });
  }
}
