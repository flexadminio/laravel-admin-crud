$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

export default class FlexAdminAjaxDelete {
  init = () => {
    let self = this;
    if ($('.flexadmin-ajax-delete-btn').length > 0) {
      $('.flexadmin-ajax-delete-btn').each(function () {
        self.bind(this);
      });
    }
  }

  bind = (el) => {
    var element = $(el);
    element.on('click', (e) => {
      e.preventDefault();
      var url = element.data('url');
      var dataMethod = element.data('method') || 'DELETE';
      var confirmText = element.data('confirm') || 'Are you sure?';

      Swal.fire({
        title: confirmText,
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: url,
            type: dataMethod,
            success: (response) => {
              Swal.fire("Done!", "It was succesfully deleted!", "success");
              element.closest('.item').remove();
            },
            error: (xhr, ajaxOptions, thrownError) => {
              console.log(xhr);
              Swal.fire("Error deleting!", "Please try again", "error");
            }
          });
        }
      });
    });
  }
};
