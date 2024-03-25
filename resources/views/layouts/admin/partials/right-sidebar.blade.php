<div class="modal right fade" id="app-settings" tabindex="-1" aria-labelledby="modalSetting" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content custom-scroll" style="max-height: 100%">
        <div class="align-items-center bg-trans-gradient justify-content-center modal-header rounded-0 w-100">
          <h4 class="m-0 text-center text-white fw-700">
            Settings
            <small class="mb-0 opacity-80">Only For Paid license</small>
          </h4>
          <a href="#" class="pos-top-right text-white p-2 m-1 me-2 fs-md" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></a>
        </div>
        <div class="modal-body p-0">
          <div class="settings-panel">
            <div class="mx-3 mt-2">
              <p class="text-muted fs-base">Customize layout, left sidebar menu, etc. FlexAdmin stores the preferences in local storage.</p>
            </div>
            <div class="mt-4 ps-3 pe-2">
              <h5 class="p-0 fw-700">
                Layout Options (Only For Paid license)
              </h5>
            </div>
            <div class="ps-3 pe-2">
              <div class="d-flex mb-2">
                <div class="custom-switcher custom-switcher-info">
                  <input type="checkbox" name="app-shrinking-left-sidebar" id="app-shrinking-left-sidebar">
                  <label for="app-shrinking-left-sidebar"></label>
                </div>
                <div class="ms-3"><label for="app-shrinking-left-sidebar">Shrinking Left Navigation</label></div>
              </div>
              <div class="d-flex mb-2">
                <div class="custom-switcher custom-switcher-info">
                  <input type="checkbox" name="app-fixed-header" id="app-fixed-header" value=true>
                  <label for="app-fixed-header"></label>
                </div>
                <div class="ms-3"><label for="app-fixed-header">Fixed Header</label></div>
              </div>
              <div class="d-flex mb-2">
                <div class="custom-switcher custom-switcher-info">
                  <input type="checkbox" name="app-fixed-left-sidebar" id="app-fixed-left-sidebar">
                  <label for="app-fixed-left-sidebar"></label>
                </div>
                <div class="ms-3"><label for="app-fixed-left-sidebar">Fixed Navigation</label></div>
              </div>
              <div class="d-flex mb-2">
                <div class="custom-switcher custom-switcher-info">
                  <input type="checkbox" name="app-fixed-footer" id="app-fixed-footer">
                  <label for="app-fixed-footer"></label>
                </div>
                <div class="ms-3"><label for="app-fixed-footer">Fixed Footer</label></div>
              </div>
            </div>
            <div class="mt-4 ps-3 pe-2">
              <h5 class="p-0 fw-700">
                Theme Colors (Only For Paid license)
              </h5>
            </div>
            <div class="theme-colors ps-3 pe-2">
              <ul class="m-0 p-0">
                <li>
                  <a href="#" class="bg-anchor" data-theme-color="app-theme-anchor" data-bs-toggle="tooltip" data-bs-original-title="Anchor"></a>
                </li>
                <li>
                  <a href="#" class="bg-maroon" data-theme-color="app-theme-maroon" data-bs-toggle="tooltip" data-bs-original-title="Maroon"></a>
                </li>
                <li>
                  <a href="#" class="bg-carrot" data-theme-color="app-theme-carrot" data-bs-toggle="tooltip" data-bs-original-title="Carrot"></a>
                </li>
                <li>
                  <a href="#" class="bg-lollipop" data-theme-color="app-theme-lollipop" data-bs-toggle="tooltip" data-bs-original-title="Lollipop"></a>
                </li>
                <li>
                  <a href="#" class="bg-gold" data-theme-color="app-theme-gold" data-bs-toggle="tooltip" data-bs-original-title="Gold"></a>
                </li>
                <li>
                  <a href="#" class="bg-forest" data-theme-color="app-theme-forest" data-bs-toggle="tooltip" data-bs-original-title="Forest"></a>
                </li>
                <li>
                  <a href="#" class="bg-hoki" data-theme-color="app-theme-hoki" data-bs-toggle="tooltip" data-bs-original-title="Hoki"></a>
                </li>
                <li>
                  <a href="#" class="bg-facebook" data-theme-color="app-theme-facebook" data-bs-toggle="tooltip" data-bs-original-title="Facebook"></a>
                </li>
                <li>
                  <a href="#" class="bg-purple" data-theme-color="app-theme-purple" data-bs-toggle="tooltip" data-bs-original-title="Purple"></a>
                </li>
                <li>
                  <a href="#" class="bg-indigo" data-theme-color="app-theme-indigo" data-bs-toggle="tooltip" data-bs-original-title="Indigo"></a>
                </li>
                <li>
                  <a href="#" class="bg-cafe" data-theme-color="app-theme-cafe" data-bs-toggle="tooltip" data-bs-original-title="Cafe"></a>
                </li>
                <li>
                  <a href="#" class="bg-charcoal" data-theme-color="app-theme-charcoal" data-bs-toggle="tooltip" data-bs-original-title="Charcoal"></a>
                </li>
              </ul>
            </div>
            <div class="mt-4 ps-3 pe-2">
              <h5 class="p-0 fw-700">
                Theme Modes (Only For Paid license)
              </h5>
            </div>
            <div class="theme-modes ps-3 pe-2">
              <div class="row">
                <div class="col-6 pe-2 text-center">
                  <div data-theme-mode="default-mode" class="theme-mode-config d-flex bg-white border border-secondary rounded overflow-hidden text-success" style="height: 100px">
                    <div class="map-left-sidebar px-2 pt-0 border-end"></div>
                    <div class="d-flex w-100 flex-column flex-1">
                      <div class="bg-white border-bottom py-1"></div>
                      <div class="bg-white h-100 flex-1 pt-3 pb-3 px-2">
                        <div class="py-3 h-100" style="background:url('{{ Vite::image('website-layout.jpg') }}') top left no-repeat;background-size: 100%;"></div>
                      </div>
                    </div>
                  </div>
                  Default
                </div>
                <div class="col-6 ps-2 text-center">
                  <div data-theme-mode="dark-mode" class="theme-mode-config d-flex border border-white rounded overflow-hidden text-success bg-dark" style="height: 100px">
                    <div class="px-2 pt-0 border-end"></div>
                    <div class="d-flex w-100 flex-column flex-1">
                      <div class="border-bottom py-1"></div>
                      <div class="flex-1 h-100 pt-3 pb-3 px-2">
                        <div class="py-3 h-100 " style="background:url('{{ Vite::image('website-layout-dark.jpg') }}') top left no-repeat;background-size: 100%;"></div>
                      </div>
                    </div>
                  </div>
                  Dark
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-center mt-4 pt-4">
              <button id="reset-setting" type="button" class="btn btn-warning btn-rounded d-block w-75">Reset</button>
            </div>
            <div class="d-flex justify-content-center mt-4 mb-4">
              <a class="btn btn-rose btn-rounded d-block w-75" href="https://codecanyon.net/item/flexadmin-bootstrap-5-admin-template/29011667" target="_blank">Buy Now</a>
            </div>
          </div>
        </div>
      </div>
      <!-- end modal-content -->
    </div>
    <!-- end modal-dialog -->
</div>