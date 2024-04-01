<nav class="navbar topbar">
    <div class="top-left-menu">
        {{-- @include('layouts.admin.partials.topbar.searchbox') --}}
    </div>
    <ul class="list-unstyled top-right-menu">
        @include('layouts.admin.partials.topbar.notifications')
        @include('layouts.admin.partials.topbar.user-menu')
        <li class="nav-item me-4">
          <a href="#app-settings" class="nav-link" data-bs-toggle="modal"  id="modalSetting">
          <i class="fa-solid fa-gear rotate"></i>
          </a>
        </li>
    </ul>
</nav>
