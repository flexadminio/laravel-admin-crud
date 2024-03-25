class FlexAdminMegaTable {
  init = () => {
    self = this;
    $('.parent-checkbox').on('click', function() {
      var isChecked = this.checked;
      self.toggleCheckbox(this, isChecked);
    });
  }

  toggleCheckbox = (parentEl, isChecked) => {
    if(isChecked) {
      $(parentEl).closest('table').find('.child-checkbox').each(function() { 
        this.checked = true; 
      });
    } else {
      $(parentEl).closest('table').find('.child-checkbox').each(function() {
        this.checked = false;
      });
    }
  }
}

export default FlexAdminMegaTable;
