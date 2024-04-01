{{-- Extends layout --}}
@extends('layout.blank')

{{-- Page Content --}}
@section('content')
<div class="container">
  <div class="row justify-content-center align-items-center vh-100">
      <div class="col-xl-4 col-lg-5 px-4">
          <div class="card shadow-sm rounded-0">
              <div class="card-body p-4">
                  <div class="text-center mb-4">
                      <a href="/">
                          <img src="assets/images/logo.svg" style="width: 145px;" class="img-fluid" alt="Logo" />
                      </a>
                  </div>
                  <div class="text-center m-auto">
                      <h3 class="text-dark-50 text-center mt-0 font-weight-bold">Sign In</h3>
                      <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
                  </div>
                  <form action="#">
                      <div class="input-group mb-4">
                          <span class="input-group-text" id="basic-addon1"><i class="fal fa-envelope"></i></span>
                          <input type="email" id="emailaddress" class="form-control" required="" placeholder="Email address" aria-label="Email" />
                      </div>
                      <div class="input-group mb-4">
                          <span class="input-group-text" id="basic-addon2"><i class="fal fa-lock-alt"></i></span>
                          <input class="form-control" type="password" required="" id="password" placeholder="Password" />
                      </div>
                      <div class="mb-3 justify-content-between d-flex">
                          <label class="custom-checkbox">
                              <input type="checkbox" id="remember-me" /> Keep me logged in
                              <span></span>
                          </label>
                          <a href="pages-authentication-forgot-password.html" class="text-info ms-1">Forgot your password?</a>
                      </div>
                      <div class="d-grid mb-0 text-center">
                          <button class="btn btn-warning d-block w-100 text-white" type="submit"><span>Sign In</span> <i class="fal fa-sign-in-alt"></i></button>
                      </div>
                      <p class="text-center my-4">- OR -</p>
                      <div class="d-grid mx-auto">
                          <a href="#" class="btn btn-facebook d-block w-100 mb-4">
                              <span class="me-2"><i class="fab fa-facebook-f"></i></span> Sign In with Facebook
                          </a>
                          <a href="#" class="btn btn-twitter d-block w-100 mb-4">
                              <span class="me-2"><i class="fab fa-twitter"></i></span> Sign In with Twitter
                          </a>
                      </div>
                  </form>
              </div>
          </div>
          <div class="row mt-3">
              <div class="col-12 text-center">
                  <p class="text-muted">Don't have an account? <a href="pages-authentication-register.html" class="text-info ms-1">Sign Up</a></p>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection