@extends('profile.layouts.master')
@section('title', 'Autoglass depot')
@push('styles')
<style>
aside.main-sidebar.sidebar-dark-primary.elevation-4 ,.content-header, nav.main-header.navbar.navbar-expand.navbar-white.navbar-light {display:none;}

body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {margin-left: 0px;}


.content-wrapper {
    padding-top: 50px;
}
  .login-box {text-align:center;    margin: 0 auto;    width: 100%;max-width: 500px;}
  </style>





@endpush

@section('content')
    
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Auto Glass</b> Depot</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

      <form action="recover-password.html" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="/profile/login">Login</a>
      </p>
      <p class="mb-0">
        <a href="/profile/signup" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

@endsection

@push('scripts')
@endpush
