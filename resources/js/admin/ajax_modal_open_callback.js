import AppCommon from './common.js';
import FlexAdminRemotiPart from './remotipart.js';
import FlexAdminAjaxDelete from './ajax_delete.js';

class AjaxModalOpenCallback {
  init = () => {
    new AppCommon().init();
    new FlexAdminRemotiPart().init();
    new FlexAdminAjaxDelete().init();
  }
};

export default AjaxModalOpenCallback;
