<li class="nav-item user-setting-list topbar-dropdown me-4">
    <a class="nav-link dropdown-toggle nav-profile" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
    <img src="{{ Vite::asset('resources/images/avatar.png') }}" alt="user-image" class="rounded-circle">
    <span class="ms-1 d-none d-lg-inline">
    <span class="user-name">Hi, {{ Auth::user()->name }}</span>
    </span>
    </a>
    <div class="dropdown-menu dropdown-menu-right profile-dropdown dropdown-animate">
      <div class="dropdown-header">
        <h6 class="text-center">Welcome !</h6>
      </div>
      <a href="{{ route('profile.edit') }}" class="dropdown-item">
      <i class="fa fa-user-alt me-1"></i>
      <span>My Account</span>
      </a>
      <a href={{route('logout')}} class="dropdown-item">
      <i class="fa fa-sign-out me-1"></i>
      <span>{{ __('Log Out') }}</span>
      </a>
     
    </div>
  </li>