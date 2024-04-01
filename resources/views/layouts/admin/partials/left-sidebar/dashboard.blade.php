<!-- start sidebar-block -->
<div class="sidebar-block">
  <ul class="list-unstyled sidebar-content">
    <li class="sidebar-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
        <x-nav-link :href="route('dashboard')" :active="Request::is('dashboard')">
          <i class="fa-solid fa-gauge-high"></i>
          <span>{{ __('Dashboard') }}</span>
        </x-nav-link>
      </li><!-- start sidebar-block -->
    <li class="sidebar-item {{ Request::is('admin/profile') ? 'active' : '' }}">
        <x-nav-link :href="route('profile.edit')" :active="Request::is('profile')">
          <i class="fa-regular fa-address-card"></i>
          <span>{{ __('Profile') }}</span>
        </x-nav-link>
      </li><!-- start sidebar-block -->
  </ul>
</div>
<!-- end sidebar-block -->