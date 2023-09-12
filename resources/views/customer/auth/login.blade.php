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
                            <form action="{{route('customer.login.process')}}" method="post">
                                @csrf
                                <div class="login-form">
                                    <h4 class="login-title">Login</h4>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Email Address*</label>
                                            <input type="email" name="email" placeholder="Email Address">
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Password</label>
                                            <input type="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="check-box">
                                                <input type="checkbox" name="remember" value="1" id="remember_me">
                                                <label for="remember_me">Remember me</label>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-4 pt-1 mt-md-0">
                                            <div class="forgotton-password_info">
                                                <a href="#"> Forgotten pasward?</a>
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-12 pt-5">
                                            <button class="btn btn-custom-size lg-size btn-primary logn-signup-btn" type="submit">Login</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 pt-10 pt-lg-0">
                            <form action="{{route('customer.register')}}" method="post">
                                @csrf
                                <div class="login-form">
                                    <h4 class="login-title">Register</h4>
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <label>Name</label>
                                            <input type="text" name="name" placeholder="Name" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Email Address*</label>
                                            <input type="email" name="email" placeholder="Email Address" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Password</label>
                                            <input type="password" name="password" placeholder="Password" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Password</label>
                                            <input type="password" name="password_confirmation" placeholder="Password" required>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-custom-size lg-size btn-primary logn-signup-btn" type="submit">Register</button>
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
