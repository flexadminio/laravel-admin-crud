<!-- start sidebar-block -->
<div class="sidebar-block">
  <div class="sidebar-title">MANAGE</div>
  <ul class="list-unstyled sidebar-content">
    <li class="sidebar-item">
      <a href="#manage-menu" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle collapsed">
      <i class="fa fa-layer-group"></i>
      <span>Resource</span>
      </a>
      <ul class="sidebar-second-level collapse list-unstyled show" id="manage-menu" data-parent="#left-sidebar">
          <li class="{{ Request::is('admin/products*') ? 'active' : '' }}">
            <x-nav-link :href="route('products.index')" :active="Request::is('admin/products*')">
                {{ __('Manage Product') }}
            </x-nav-link>
          </li>
          <li class="{{ Request::is('admin/categories*') ? 'active' : '' }}">
            <x-nav-link :href="route('categories.index')" :active="Request::is('admin/categories*')">
                {{ __('Manage Category') }}
            </x-nav-link>
          </li>
          <li class="{{ Request::is('admin/tags*') ? 'active' : '' }}">
            <x-nav-link :href="route('tags.index')" :active="Request::is('admin/tags*')">
                {{ __('Manage Tag') }}
            </x-nav-link>
          </li>
          @include('layouts.admin.partials.left-sidebar.generator')
         
      </ul>
    </li>
    <li class="sidebar-item">
      <a href="#advance-menu" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle collapsed">
      <i class="fa fa-users"></i>
      <span>User and Permission</span>
      </a>
      <ul class="sidebar-second-level collapse list-unstyled show" id="advance-menu" data-parent="#left-sidebar">
          <li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
            <x-nav-link :href="route('users.index')" :active="Request::is('admin/user*')">
                {{ __('Manage User') }}
            </x-nav-link>
          </li><!-- start sidebar-block -->
          <li class="{{ Request::is('admin/roles*') ? 'active' : '' }}">
            <x-nav-link :href="route('roles.index')" :active="Request::is('admin/roles*')">
                {{ __('Manage Role') }}
            </x-nav-link>
          </li>
      </ul>
    </li>
  </ul>
</div>
<!-- end sidebar-block -->