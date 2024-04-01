import AppConfig from './config.js';

class Footer {
  constructor() {
    this.fixedFooterCheckBox = $('#app-fixed-footer');
  }

  init = () => {
    this._setFixedFooter();
    this._toggleFixedFooter();
  }

  _toggleFixedFooter = () => {
    let self = this;
    this.fixedFooterCheckBox.change( () => {
      let isSideBarFixed = $(this).is(":checked");
      AppConfig.setConfig({ fixedFooter: isSideBarFixed });
      $('body').attr('data-theme-footer-fixed', isSideBarFixed);
    });
  }

  _setFixedFooter = () => {
    $('body').attr('data-theme-footer-fixed', AppConfig.getConfig().fixedFooter);
    this.fixedFooterCheckBox.prop("checked", AppConfig.getConfig().fixedFooter);
  }

}

export default Footer;
