// libraries
import './bootstrap.js';
import 'bootstrap-growl-ifightcrime';

// core
import './global.js';
import './bulk_checker.js';
import AppCommon from './common.js';
import LeftSidebar from './left_sidebar.js';
import QuickSearch from './quick_search.js';
import Topbar from './topbar.js';
import Footer from './footer.js';
import Fullscreen from './fullscreen.js';
import FlexAdminMegaTable from './mega_table.js';
import FlexAdminModal from './ajax_modal.js';
import FlexAdminAjaxDelete from './ajax_delete.js';
import FlexAdminSelect2Builder from './select2_builder.js';
import ThemeConfig from './theme_config.js';

jQuery(function() {
  new Topbar().init();
  new LeftSidebar().init();
  new Footer().init();
  new ThemeConfig().init();
  new AppCommon().init();
  new Fullscreen().init();
  new FlexAdminModal().init();
  new FlexAdminMegaTable().init();
  new FlexAdminSelect2Builder().init();
  new FlexAdminAjaxDelete().init();
  new QuickSearch().init();
});
