@extends('layouts.master')
@section('title', 'Autoglass depot')@push('styles')

@endpush

@section('content')

<div class="service-page-style">
        <!-- start page-title -->
        <section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>Our Services</h2>
                        <ol class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li>Services</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->        
        <!--service area start -->
        <div class="service-style-3 section-padding">
            <div class="container">
                <div class="col-12">
                    <div class="section-title-s2 text-center">
                        <span>What We Do</span>
                        <h2>Our Services</h2>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="service-wrap">
                            <div class="service-icon">
                                <i class="fi flaticon-turbo"></i>
                            </div>
                            <div class="service-text">
                                <h2>Engine Repair</h2>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have</p>
                            </div>  
                        </div>
                    </div>
                    <div class="col-md-4  col-sm-6">
                        <div class="service-wrap">
                            <div class="service-icon-2">
                                <i class="fi flaticon-tyre"></i>
                            </div>
                            <div class="service-text">
                                <h2>Tires Replacement</h2>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have</p>
                            </div>  
                        </div>
                    </div>
                    <div class="col-md-4  col-sm-6">
                        <div class="service-wrap">
                            <div class="service-icon-3">
                                <i class="fi flaticon-car-1"></i>
                            </div>
                            <div class="service-text">
                                <h2>Transmission</h2>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have</p>
                            </div>  
                        </div>
                    </div>
                    <div class="col-md-4  col-sm-6">
                        <div class="service-wrap">
                            <div class="service-icon-4">
                                <i class="fi flaticon-car-repair"></i>
                            </div>
                            <div class="service-text">
                                <h2>Diagnostic</h2>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have</p>
                            </div>  
                        </div>
                    </div>
                    <div class="col-md-4  col-sm-6">
                        <div class="service-wrap">
                            <div class="service-icon-5">
                                <i class="fi flaticon-battery"></i>
                            </div>
                            <div class="service-text">
                                <h2>Batteries</h2>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have</p>
                            </div>  
                        </div>
                    </div>
                    <div class="col-md-4  col-sm-6">
                        <div class="service-wrap">
                            <div class="service-icon-6">
                                <i class="fi flaticon-electricity"></i>
                            </div>
                            <div class="service-text">
                                <h2>Breaks</h2>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have</p>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- service area end -->

        <div class="btns get-a-quote-btn">
          
          <a href="vehicle"  class="theme-btn"><div class="get-a-quote-btn-icon-div"><img src="assets\images\banner\quoteicon.png"> </div>Get Quote</a>
      </div>
        
@endsection

@push('scripts')

@endpush