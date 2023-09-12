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
                        <h2>Contact</h2>
                        <ol class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li>Contact</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title --> 

    <!-- .contact area start -->
    <div class="hx-contact-area-s2 section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="hx-contact-img">
                        <img src="assets/images/contact/img-2.png" alt="">
                    </div>
                </div>
                <div class="col col-md-7 col-sm-12 col-12">
                    <div class="hx-contact-content">
                        <h2>Get In Touch</h2>
                        <div class="hx-contact-form">
                            <form method="post" class="contact-validation-active" id="hx-contact-form">
                                <div class="half-col">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Your Name">
                                </div>
                                <div class="half-col">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
                                </div>
                                <div class="half-col">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="half-col">
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Subject">
                                </div>
                                <div>
                                    <textarea class="form-control" name="note"  id="note" placeholder="Massage"></textarea>
                                </div>
                                <div class="submit-btn-wrapper">
                                    <button type="submit" class="theme-btn">Send Message</button>
                                    <div id="loader">
                                        <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                                    </div>
                                </div>
                                <div class="clearfix error-handling-messages">
                                    <div id="success">Thank you</div>
                                    <div id="error"> Error occurred while sending email. Please try again later. </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .contact area start -->
    <!-- .hx-contact-grid-area start -->
    <div class="hx-contact-grid-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="hx-contact-gd-wrap">
                        <div class="hx-contact-gd-icon">
                            <i class="fi flaticon-call"></i>
                        </div>
                        <div class="hx-contact-gd-text">
                            <h4>Call Us Now</h4>
                            <span>+(008) 001-234-567 </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="hx-contact-gd-wrap">
                        <div class="hx-contact-gd-icon">
                            <i class="fi flaticon-message"></i>
                        </div>
                        <div class="hx-contact-gd-text">
                            <h4>Mail Us Today</h4>
                            <span>youremail@gmail.com</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="hx-contact-gd-wrap">
                        <div class="hx-contact-gd-icon">
                            <i class="fi flaticon-placeholder"></i>
                        </div>
                        <div class="hx-contact-gd-text">
                            <h4>Our Location</h4>
                            <span>150 Street, London, USA</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-xs-12">
                    <div class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.9147703055!2d-74.11976314309273!3d40.69740344223377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1547528325671" allowfullscreen></iframe>
                    </div>                        
                </div>
            </div>
        </div>
    </div>
    <!-- .hx-contact-grid-area end -->

    <div class="btns get-a-quote-btn">
          
          <a href="vehicle"  class="theme-btn"><div class="get-a-quote-btn-icon-div"><img src="assets\images\banner\quoteicon.png"> </div>Get Quote</a>
      </div>

        
@endsection

@push('scripts')

@endpush