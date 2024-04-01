import AppConfig from './config.js';
import throttle from 'lodash.throttle'
import 'overlayscrollbars/overlayscrollbars.css';
import { OverlayScrollbars } from 'overlayscrollbars';

class LeftSidebar {
  constructor() {
    this.body = $('body');
    this.sidebarBody = $(".sidebar-body");
    this.sidebarWrapper = $(".sidebar-wrapper");
  }

  init = () => {
    this._addActiveMenuOnLeftSidebar();
    this._addOrRemoveScrollbarOnLeftSidebar();

    this._resizeScreen();
    this._setFixedLeftSideBar();
    this._toggleFixedLeftSideBar();
    this._changeCheckBoxShrinkingLeftSidebar();

    let _throttled = throttle(this._resizeScreen, 1000);
    $(window).resize(_throttled);
  }

  _resizeScreen = () => {
    if (AppConfig.isMobile()) {
      this._toggleMobileSidebar();
      if (AppConfig.isShrinked) {
        AppConfig.setConfig({ isShrinked: false });
        $('body').attr('data-theme-sidebar-shrinked', false);
      }
    } else {
      this._toggleShrinkingSidebar();
      this.sidebarWrapper.show();
      if (AppConfig.getConfig().isShrinked) this._shrinkSidebar();
    }
  }

  _toggleFixedLeftSideBar = () => {
    let self = this;
    $('#app-fixed-left-sidebar').on('change', (event) => {
      let isSideBarFixed = $(event.target).is(":checked");
      AppConfig.setConfig({ fixedLeftSidebar: isSideBarFixed });
      $('body').attr('data-theme-sidebar-fixed', isSideBarFixed);
      self._addOrRemoveScrollbarOnLeftSidebar();
    });
  }

  _setFixedLeftSideBar = () => {
    $('body').attr('data-theme-sidebar-fixed', AppConfig.getConfig().fixedLeftSidebar);
    $('#app-fixed-left-sidebar').prop("checked", AppConfig.getConfig().fixedLeftSidebar);
  }

  _toggleShrinkingSidebar = () => {
    let self = this;
    $('.sidebar-toggle-btn').off('click').on('click', (e) => {
      if (AppConfig.getConfig().isShrinked) {
        self._expandSidebar();
      } else {
        self._shrinkSidebar();
      }
      $('#app-shrinking-left-sidebar').prop("checked", AppConfig.getConfig().isShrinked);
    });
  }

  _changeCheckBoxShrinkingLeftSidebar = () => {
    $('#app-shrinking-left-sidebar').change(() => {
      $(".sidebar-toggle-btn").trigger("click");
    });
  }

  _shrinkSidebar = () => {
    AppConfig.setConfig({ isShrinked: true });
    $('body').attr('data-theme-sidebar-shrinked', true);
    this._addOrRemoveScrollbarOnLeftSidebar();
    $('#app-shrinking-left-sidebar').prop("checked", AppConfig.getConfig().isShrinked);
  }

  _toggleMobileSidebar = () => {
    let self = this;
    let openMenu = false;
    $('.sidebar-toggle-btn').off('click').on('click', (e) => {
      if (openMenu) {
        self.sidebarWrapper.slideUp();
        openMenu = false;
      } else {
        self.sidebarWrapper.slideDown();
        openMenu = true;
      }
    });
  }

  _expandSidebar = () => {
    AppConfig.setConfig({ isShrinked: false });
    $('body').attr('data-theme-sidebar-shrinked', false);

    this._addOrRemoveScrollbarOnLeftSidebar();
    $('#app-shrinking-left-sidebar').prop("checked", false);
  }

  _addOrRemoveScrollbarOnLeftSidebar = () => {
    let scrollBar = OverlayScrollbars({
      target: document.querySelector('#left-sidebar-body'),
    }, { 
      scrollbars: {
        theme: 'left-sidebar-scrollbar',
        autoHide: 'leave',
        autoHideDelay: 1000,
        visibility: 'auto',
      }
    });
    if (AppConfig.getConfig().isShrinked || !AppConfig.getConfig().fixedLeftSidebar || AppConfig.isMobile()) {
      scrollBar.destroy();
    }
  }

  _addActiveMenuOnLeftSidebar = () => {
    $('.left-sidebar a').each(() => {
      let pageUrl = window.location.href.split(/[?#]/)[0];
      if (this.href == pageUrl) {
        $(this).addClass('active');
        $(this)
          .parent()
          .addClass('active') // add active to li of the current link
        $(this)
          .parent()
          .parent()
          .addClass('show');
        $(this)
          .parent()
          .parent()
          .prev()
          .addClass('active') // add active class to an anchor
          .removeClass('collapsed');
        $(this)
          .parent()
          .parent()
          .parent()
          .addClass('active');
        $(this)
          .parent()
          .parent()
          .parent()
          .parent()
          .addClass('show'); // add active to li of the current link
      }
    });
  }
}

export default LeftSidebar;
