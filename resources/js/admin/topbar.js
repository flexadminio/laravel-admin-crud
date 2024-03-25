import AppConfig from './config.js';


const BUTTON_SEARCH_ID = 'btn-dropdown-search';
const CLASS_NAME_SHOW = 'show';

class Topbar {
  constructor() {
    this.btnSearch = $(`#${BUTTON_SEARCH_ID}`);
    this.formGlobalSearch = $('#form-global-search');
    this.body = $('body');
    this.fixedHeaderCheckBox = $('#app-fixed-header');
  }

  init = () => {
    this._setFixedHeader();
    this._toggleFixedHeader();
  }

  _toggleGlobalSearch = () => {
    this._showGlobalSearch();
    this._hideGlobalSearch();
  }

  _showGlobalSearch = () => {
    let self = this;

    this.btnSearch.on('click', function () { 
      if(!self.formGlobalSearch.hasClass(CLASS_NAME_SHOW)) {
        self.formGlobalSearch.addClass(CLASS_NAME_SHOW);
      }else{
        self.formGlobalSearch.removeClass(CLASS_NAME_SHOW);
      }
    });
  }

  _hideGlobalSearch = () => {
    let self = this;

    this.body.on('click', function (event) {
      if(self._hideGlobalSearchCondition(event)) {
        self.formGlobalSearch.removeClass(CLASS_NAME_SHOW);
      }
    })
  }

  _hideGlobalSearchCondition = (event) => {
    return this.formGlobalSearch.hasClass(CLASS_NAME_SHOW) 
      && event.target.id != BUTTON_SEARCH_ID 
      && !$(event.target).closest(`#${BUTTON_SEARCH_ID}`).length
  }

  _toggleFixedHeader = () => {
    let self = this;
    this.fixedHeaderCheckBox.change(function () {
      let isSideBarFixed = $(this).is(":checked");
      AppConfig.setConfig({ fixedHeader: isSideBarFixed });
      $('body').attr('data-theme-header-fixed', isSideBarFixed);
    });
  }

  _setFixedHeader = () => {
    $('body').attr('data-theme-header-fixed', AppConfig.getConfig().fixedHeader);
    this.fixedHeaderCheckBox.prop("checked", AppConfig.getConfig().fixedHeader);
  }
}

export default Topbar;
