export default class FlexAdminRemotiPart  {
  init = function() {
    var self = this;
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    self.formSubmit();
  }

  formSubmit = function() {
    var self = this;
    $('form[data-remote]').on('submit', function(e) {
      e.preventDefault();
      var form = $(this);
      var method = form.find('input[name="_method"]').val() || 'POST';
      var url = form.prop('action');
      var defaultSuccessMessage = form.data('successMessage') || method + ' data successfully';
      var formData = new FormData(this);

      $.ajax({
        /*
        * If you're sending PATCH request from postman, you need to send it with x-www-form-urlencoded as Laravel unfortunately gives empty request for form-data with PATCH request.
        * As a side note, you can't send files with x-www-form-urlencoded so if you have files in your request, you should send a POST request using form-data and _method: PATCH in the request body, Laravel will automatically treat it like a PATCH request.
        */
        type: 'POST',
        url: url,
        processData: false,
        contentType : false,
        data: formData,
        success: function(data) {
          if($.isEmptyObject(data.error)){
            var successMessage = data.message || defaultSuccessMessage;
            $.bootstrapGrowl(successMessage, {
              type: "success"
            });
    
            setTimeout(function(){
              window.location.reload();
            }, 1000);
          }else{
            self.printErrorMsg(data.error);
          }
        },
        error: function(xhr) {
          self.printErrorMsg(JSON.parse(xhr.responseText).error);
        }
      });
    });
  }

  printErrorMsg = function(msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
  }
}
