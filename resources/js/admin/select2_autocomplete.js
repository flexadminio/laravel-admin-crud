window.FlexAdminSelect2Autocomplete = {
  init: function(){
    var self = this;

    $(document).on('shown.bs.modal', function () {
      self.select2Constructor();
    });

    $(document).on('filterBar.componentAppended', function () {
      self.select2Constructor();
    });

    $(document).on('apply.select2', function () {
      self.select2Constructor();
    });
  },

  select2Constructor: function(){
    $('.select2-autocomplete').each(function (_, element) {
      var select = $(element);
      var options = {
        minimumInputLength: 2,
        allowClear: true,
        val: "",
        multiple: select.data('multiple'),
        placeholder: select.data('placeholder'),
        ajax: {
          url: select.data('search-path'),
          dataType: 'json',
          quietMillis: 500,
          data: function (term) {
            return {
              search_term: term
            };
          },
          results: function (data) {
            var except_id = select.data('except-id');
            
            if(except_id && data[0].id) {
              var data = data.filter(function(elem) {
                return elem.id != except_id
              })
            }

            return {results: data};
          }
        },
        formatResult: function (item) {
          var format = select.data('format');
          return format ? eval(format) : item.name;
        },
        formatSelection: function (item, page) {
          var format = select.data('format');

          if (item.nominal_duration) {
            $('.label-nominal-duration').empty()
            var nominalDuration = "<span class='badge label-nominal-duration'>Duration: " + item.nominal_duration + " months</span>"
            $(page).closest('.controls').after(function() { return nominalDuration })
          }

          return format ? eval(format) : item.name;
        },
        initSelection: function (element, callback) {
          var id = $(element).val();
          var paramsPath = select.data('item-path').includes('id_in') ? id : ('/' + id);

          if (id !== "") {
            return $.getJSON(select.data('item-path') + paramsPath, null, function (data) {
              callback(data);
            });
          }
        }
      };

      if (select.hasClass('select2-free-text')) {
        if (select.hasClass('creatable')) {
          options.createSearchChoice = function(term, data) {
            var results = $(data).filter( function() {
              return this.name.localeCompare(term) === 0;
            });

            if (results.length === 0) {
              return { id: term, name: term }
            }
          };
        }

        options.initSelection = function (element, callback) {
          var id = $(element).val() || select.data('blank-value');
          var notFoundItem = { id: id, name: id };
          if (id !== "") {
            var xhr = $.getJSON(select.data('item-path') + '/' + id, null, function (data) {
              if (data.not_found) {
                callback(notFoundItem);
                $(element).val(id);
              } else {
                callback(data);
              }
            });

            xhr.error(function() { 
              callback(notFoundItem);
            });

            return xhr;
          }
        };
      }

      select.select2(options);
    });

    $('.select2-tags').each(function(_, element){
      var select = $(element);
      var options = {
        minimumInputLength: 1,
        formatInputTooShort: "Press spacebar or ',' on your keyboard to search for multiple payroll id’s",
        allowClear: true,
        val: "",
        multiple: select.data('multiple') || false,
        // placeholder: select.data('placeholder') || '',
        tokenSeparators: [",", " ", ";"],
        formatSelection: function (item, page) {
          var format = select.data('format');
          if (format)
            return eval(format);
          else if ($.isArray(item))
            return item[0].text || (item[0].name || '')
          else
            return item.text || (item.name || '')
        },
      }
      select.select2(options);
    });
  }
}
