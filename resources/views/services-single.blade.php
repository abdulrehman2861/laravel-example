@extends('layouts.master')
@section('title', 'Auto Glass depo')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<style>
    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .swiper-slide {
        height: 472px;
    }
</style>

@endpush

@section('content')

<!-- end of header -->
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
    <div class="service-style-1 section-padding">
        <div class="container">
            <div class="col-12">
                <div class="section-title-s2 text-center">
                    <h2 class="border-bottom-none">What We Do</h2>
                    <h2>Our Services</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="service-wrap">
                        <div class="our-services-img">
                            <img src="assets/images/service-details/23.webp">
                        </div>
                        <div class="service-text">
                            <h2>Personal Vehicles</h2>
                            <p>Factory Quality Windshield, Professional Installation, Life Time Warranty, and We Come To You For FREE!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4  col-sm-6">
                    <div class="service-wrap">
                        <div class="our-services-img">
                            <img src="assets/images/service-details/download13.webp">
                        </div>
                        <div class="service-text">
                            <h2>Commercial Vehicles</h2>
                            <p>Factory Quality Windshield, Professional Installation, Life Time Warranty, and We Come To You For FREE!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4  col-sm-6">
                    <div class="service-wrap">
                        <div class="our-services-img">
                            <img src="assets/images/service-details/download14.webp">
                        </div>
                        <div class="service-text">
                            <h2>Transport Vehicles</h2>
                            <p>Factory Quality Windshield, Professional Installation, Life Time Warranty, and We Come To You For FREE!</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- service area end -->

 <!-- start blog-section -->
 <section class="blog-section section-padding  section-four-div-respon">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="section-title-s2 text-center">
                        <h2 class="border-bottom-none">WE PROVIDE PROFESSIONAL AUTO</h2>
                        <h2>GLASS REPAIR SERVICES</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-xs-12">
                    <div class="blog-grids clearfix">
                        <div class="grid">
                            <div class="entry-media">
                                <img src="assets/images/about/img2.jpeg" alt>
                            </div>
                            <div class="details  us-auto-sight">
                                <img src="assets/images/service-details/car-1.png">
                                <h3><a href="#">Windshield <br /> Chip Repair</a></h3>
                                <p class="us-auto-sight-p">Why replace it? We can repair that chip on your windshield before it spreads and requires replacement.</p>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="entry-media">
                                <img src="assets/images/about/img2.jpeg" alt>
                            </div>
                            <div class="details  us-auto-sight">
                                <img src="assets/images/service-details/car-1.png">
                                <h3><a href="#">Windshield <br /> Chip Repair</a></h3>
                                <p class="us-auto-sight-p">Why replace it? We can repair that chip on your windshield before it spreads and requires replacement.</p>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="entry-media">
                                <img src="assets/images/about/img6.jpeg" alt>
                            </div>
                            <div class="details us-auto-sight">
                                <img src="assets/images/service-details/car-1.png">
                                <h3><a href="#">Door Glass Replacement</a></h3>
                                <p class="us-auto-sight-p">Had a break in? We've got you covered. We can replace your car window today. Best of all, we come to you for FREE!</p>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="entry-media">
                                <img src="assets/images/about/img4.jpeg" alt>
                            </div>
                            <div class="details us-auto-sight">
                                <img src="assets/images/service-details/car-1.png">
                                <h3><a href="#">Windshield Replacement</a></h3>
                                <p class="us-auto-sight-p">We carry a wide range of original, O.E.M, and After-market windshields for all makes, models, and budgets.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end blog-section -->

    <!-- hx-service-dt-area start -->
    <div class="hx-service-dt-area section-padding">
        <div class="container">
            <div class="row" style="display:flex;justify-content:center">

                <div class="col-md-10">
                    <div class="hx-service-dt-right">
                        <div class="hx-service-dt-img">
                            <div class="swiper mySwiper services-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"> <img src="\assets\images\slider\homeright.jpeg"></div>
                                    <div class="swiper-slide"> <img src="\assets\images\slider\homeright11.jpg"></div>
                                    <div class="swiper-slide"> <img src="\assets\images\slider\homeright12.jpg"></div>
                              


                                    <div class="swiper-slide"> <img src="\assets\images\slider\istockphoto-182680241-2048x2048-transformed.jpeg"></div>
                                    <div class="swiper-slide"> <img src="\assets\images\slider\istockphoto-1190854132-2048x2048-transformed.jpeg"></div>
                                    <div class="swiper-slide"> <img src="\assets\images\slider\istockphoto-451617613-2048x2048-transformed.jpeg"></div>
                                    <div class="swiper-slide"> <img src="\assets\images\slider\istockphoto-1190859781-2048x2048-transformed.jpeg"></div>
                                    <div class="swiper-slide"> <img src="\assets\images\slider\windshield-inventory-1024x683.jpg"></div>

                                </div>
                            </div>

                        </div>
                        <h3 style="color:black !important">Our Services</h3>
                        <p>At Auto Glass Depot, we offer a comprehensive range of services to cater to all your auto glass needs.We service all makes and models including both foreign and domestic vehicles. Our technicians have the expertise to work on various vehicle brands, ensuring that your auto glass needs are met regardless of the vehicle you own. We value your time and understand the urgency of auto glass repairs. In most cases, we strive to provide same-day service, ensuring a quick turnaround time so that you can get back on the road safely and promptly. We strive to make the process as seamless as possible for our customers. You can easily schedule an appointment through our user-friendly online platform, or you can speak to one of our friendly customer service representatives who will assist you in finding a suitable time for your auto glass service. At Auto Glass Depot We take pride in delivering exceptional service and ensuring your satisfaction. Whether you need windshield replacement, chip repair, or calibration services, our team of certified technicians is here to provide you with reliable, convenient and high-quality auto glass solutions.</p>
                      
                        

                        
                        <div class="service-style-1 service-details-what-we-do">
                            <div class="row no-gutters">
                                <div class="col-md-4 col-sm-6">
                                    <div class="service-wrap height-services-same-div">
                                        <div class="service-icon">
                                            <i class="fi flaticon-turbo"></i>
                                        </div>
                                        <div class="service-text">
                                            <h2>Choose Your Service</h2>
                                            <p>If your windshield is cracked, chipped, or severely damaged, our skilled technicians can efficiently replace it with a high-quality OEM or equivalent glass. We ensure a precise fit and proper installation techniques to restore the structural integrity of your vehicle.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4  col-sm-6">
                                    <div class="service-wrap height-services-same-div">
                                        <div class="service-icon-2">
                                            <i class="fi flaticon-tyre"></i>
                                        </div>
                                        <div class="service-text">
                                            <h2>Make An Appointment</h2>
                                            <p>Small chips and cracks in your windshield can be repaired effectively, saving you the cost and hassle of a full replacement. Our technicians utilize industry-leading techniques to repair chips, preventing them from spreading and compromising the windshield's strength.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4  col-sm-6">
                                    <div class="service-wrap height-services-same-div">
                                        <div class="service-icon-2">
                                            <i class="fi flaticon-tyre"></i>
                                        </div>
                                        <div class="service-text">
                                            <h2>Confrim Your Request</h2>
                                            <p>We understand the importance of properly calibrated advanced driver assistance systems (ADAS) in modern vehicles. Our certified technicians have the expertise to perform accurate calibration services after windshield replacement, ensuring your vehicle's safety features function correctly.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="challange-solution-section">
                        <p>We understand that your time is valuable, so we offer convenient mobile service. Our technicians can come to your location, whether it's your home, office, or any other preferred address, to repair or replace your auto glass. This way, you can get your vehicle back on the road without disrupting your daily routine.</p>
    <p>Our team consists of highly trained and certified technicians who possess extensive experience in auto glass repair and replacement. They stay up to date with the latest industry standards and techniques to provide you with exceptional service.</p>  
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- hx-service-dt-area end -->
    
    
    
    <!-- gif section -->
    <section>
        <div class="elementor-container elementor-column-gap-default gif-div-services">
            <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-e25b098" data-id="e25b098" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-e9c94a0 custom-steps elementor-position-top elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="e9c94a0" data-element_type="widget" data-widget_type="image-box.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-image-box-wrapper">
                                <figure class="elementor-image-box-img"><img decoding="async" width="400" height="400" src="assets\images\usa-images/download15.gif" class="attachment-full size-full wp-image-188" alt="" loading="lazy"></figure>
                                <div class="elementor-image-box-content">
                                    <h3 class="elementor-image-box-title">Personal Vehicles</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-38e94f6" data-id="38e94f6" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-a2b38ca custom-steps elementor-position-top elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="a2b38ca" data-element_type="widget" data-widget_type="image-box.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-image-box-wrapper">
                                <figure class="elementor-image-box-img"><img decoding="async" width="400" height="400" src="assets\images\usa-images/downlaod16-1.gif" class="attachment-full size-full wp-image-189" alt="" loading="lazy"></figure>
                                <div class="elementor-image-box-content">
                                    <h3 class="elementor-image-box-title">Company Vehicles</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-73d02f7" data-id="73d02f7" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-3898a2b custom-steps elementor-position-top elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="3898a2b" data-element_type="widget" data-widget_type="image-box.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-image-box-wrapper">
                                <figure class="elementor-image-box-img"><img decoding="async" width="400" height="400" src="assets\images\usa-images/download17-1.gif" class="attachment-full size-full wp-image-190" alt="" loading="lazy"></figure>
                                <div class="elementor-image-box-content">
                                    <h3 class="elementor-image-box-title">Same Day Service</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-283ea03" data-id="283ea03" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-9617a55 custom-steps elementor-position-top elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="9617a55" data-element_type="widget" data-widget_type="image-box.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-image-box-wrapper">
                                <figure class="elementor-image-box-img"><img decoding="async" width="400" height="400" src="assets\images\usa-images/download18-1.gif" class="attachment-full size-full wp-image-191" alt="" loading="lazy"></figure>
                                <div class="elementor-image-box-content">
                                    <h3 class="elementor-image-box-title">Insurance Approved Repair Facility</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-dca5280" data-id="dca5280" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-4cb3547 custom-steps elementor-position-top elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="4cb3547" data-element_type="widget" data-widget_type="image-box.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-image-box-wrapper">
                                <figure class="elementor-image-box-img"><img decoding="async" width="400" height="400" src="https://usa-autoglass.com/wp-content/uploads/2023/01/download19.gif" class="attachment-full size-full wp-image-192" alt="" loading="lazy"></figure>
                                <div class="elementor-image-box-content">
                                    <h3 class="elementor-image-box-title">Windshield Chip Repair</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <!-- gif section -->
    
    
    
    
    
    
    
    
    
    
    
    
    <div class="btns get-a-quote-btn">
        
        <a href="vehicle" class="theme-btn">
            <div class="get-a-quote-btn-icon-div"><img src="assets\images\banner\quoteicon.png"> </div>Get Quote
        </a>
    </div>
    
    
    
    @endsection
    
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".services-slider", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
        });
        </script>
    @endpush
