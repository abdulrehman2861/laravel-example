@extends('layouts.master')
@section('title', 'Autoglass depot')@push('styles')

@endpush

@section('content')

<!-- Begin Main Content Area -->
<main class="main-content">
<section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>Login | Register</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li>Login | Register</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>

            <div class="login-register-area section-space-y-axis-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="#">
                                <div class="login-form">
                                    <h4 class="login-title">Login</h4>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Email Address*</label>
                                            <input type="email" placeholder="Email Address">
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Password</label>
                                            <input type="password" placeholder="Password">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="check-box">
                                                <input type="checkbox" id="remember_me">
                                                <label for="remember_me">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 pt-1 mt-md-0">
                                            <div class="forgotton-password_info">
                                                <a href="#"> Forgotten pasward?</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 pt-5">
                                            <button class="btn btn-custom-size lg-size btn-primary logn-signup-btn">Login</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 pt-10 pt-lg-0">
                            <form action="#">
                                <div class="login-form">
                                    <h4 class="login-title">Register</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <label>First Name</label>
                                            <input type="text" placeholder="First Name">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label>Last Name</label>
                                            <input type="text" placeholder="Last Name">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Email Address*</label>
                                            <input type="email" placeholder="Email Address">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Password</label>
                                            <input type="password" placeholder="Password">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Confirm Password</label>
                                            <input type="password" placeholder="Confirm Password">
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-custom-size lg-size btn-primary logn-signup-btn">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Main Content Area End Here -->

@endsection

@push('scripts')

@endpush