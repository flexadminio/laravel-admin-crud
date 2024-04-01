<nav id="left-sidebar" class="left-sidebar">
    <!-- start sidebar-header -->
      @include('layouts.admin.partials.left-sidebar.sidebar-header')
    <!-- end sidebar-header -->
    <div class="sidebar-wrapper">
      <!-- start sidebar-body -->
      <div class="sidebar-body" id="left-sidebar-body">
        <div class="nav-filter align-items-center justify-content-center flex-row mb-4 p-2">
          <div class="input-group">
            <input
              type="text"
              id="quick-search-input"
              placeholder="Quick search"
              class="w-100 form-control"
              tabindex="0" />
          </div>
        </div>
        <!-- end nav-profile -->
        
        <!-- start sidebar-block -->
        @include('layouts.admin.partials.left-sidebar.dashboard')
        @include('layouts.admin.partials.left-sidebar.resources')
        <!-- start sidebar-block -->
        
        <!-- end sidebar-block -->
      </div>
      <!-- end sidebar-body -->
      @include('layouts.admin.partials.left-sidebar.sidebar-footer')
      <!-- end sidebar-footer -->
    </div>
    <!-- end sidebar-wrapper -->
</nav>
