@extends('layouts.master')
@section('title', 'Auto Glass Part')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="bs-stepper.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">


<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="./assets/app-assets/vendors/css/vendors.min.css">
<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->



<link rel="stylesheet" type="text/css" href="./assets/app-assets/css/colors.css">
<link rel="stylesheet" type="text/css" href="./assets/app-assets/css/components.css">
<link rel="stylesheet" type="text/css" href="./assets/app-assets/css/themes/dark-layout.css">
<link rel="stylesheet" type="text/css" href="./assets/app-assets/css/themes/bordered-layout.css">
<link rel="stylesheet" type="text/css" href="./assets/app-assets/css/themes/semi-dark-layout.css">

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="./assets/app-assets/css/core/menu/menu-types/vertical-menu.css">
<link rel="stylesheet" type="text/css" href="./assets/app-assets/css/pages/app-chat.css">
<link rel="stylesheet" type="text/css" href="./assets/app-assets/css/pages/app-chat-list.css">
<!-- END: Page CSS-->



<style>
    .contact-img {
        width: 50% !important;
        padding-right: 10px
    }

    .get-a-quote-grp {
        display: flex;
        justify-content: space-between
    }

    .get-a-quote-grp .form-field {
        width: 45%
    }

    .get-a-quote-grp input {
        height: 44px;
        width: 100%;
        border: 1px solid #ddd !important;
        padding-left: 14px;
    }


    .full-width-input {
        height: 44px;
        width: 100%;
        border: 1px solid #ddd !important;
        padding-left: 14px;
    }

    .zip-code-input {
        width: 100%
    }

    .active .bs-stepper-circle {
        background-color: #ed5217 !important;
        animation: get-a-quote-btn-icon-div 1s infinite;
        box-shadow: 0 0 0 2em transparent;
    }

    .bs-stepper-header {
        width: 100%;
        justify-content: center;
        margin: 10px;
        margin-bottom: 0px;
        box-sizing: border-box;
        padding-right: 100px;
        padding-left: 100px;
        margin-top: 50px;

    }

    .myniceselect .myniceselect {
        display: none !important
    }

    .country-select div {
        display: none !important
    }

    .bs-stepper-content button {
        font-size: 14px;
        border-radius: 6px !important;
        border-width: 0;
        border-style: solid;
        border-color: transparent;
        line-height: 1.42857;
        transition: box-shadow .5s ease;
        box-shadow: 0 0 0 5px rgba(0, 0, 0, 0);
        text-align: center;
        background-color: #ed5217 !important;
        color: #fff;

    }

    .product-topbar {
        background: #ed5217;
        padding: 15px;
        border-radius: 80px;
    }

    .product-topbar li {
        background: white
    }

    .product-topbar>ul li.short {
        border-radius: 6px
    }

    .my-new-btn {
        width: 140px;
        height: 68px;
        border-radius: 10px;
        border: none;
        background: transparent;
        color: white;
        font-weight: 700;
        font-size: 34px;
        border: 1px solid white;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 15px;
    }

    .modal.fade .modal-dialog {
        transform: translate(0, -3%) !important;
    }

    .show {
        opacity: 1 !important;
    }

    .modal {
        background: rgba(0, 0, 0, 0.2) !important;
    }

    .button-to-table button {
        background: #ced2d8 !important;
        color: black !important;
        border-right: 1px solid #636f83;
        box-shadow: 0 1px 1px 0 rgba(60, 75, 100, .14), 0 2px 1px -1px rgba(60, 75, 100, .12), 0 1px 3px 0 rgba(60, 75, 100, .2);

    }

    .button-to-table button:hover {
        color: white !important;
        background: #636f83 !important
    }



    .fade:not(.show) {
        opacity: 1 !important;
    }

    .main-slider-modal {
        overflow: hidden;
        height: 400px;
        display: flex;
        align-items: center;
    }

    .user-chats,
    .start-chat-area {
        background-image: none !important
    }

    .btn-transparent {
        box-shadow: none !important
    }

    .dropdown-toggle::after {
        display: none !important
    }

    .custom-switch .custom-control-label::before,
    .custom-switch .custom-control-label::after {
        height: 17px !important
    }

    .content-body {
        height: auto !important
    }

    .chat-app-window {
        height: 625px !important
    }

    .sidebar-left {
        height: 625px !important;


    }

    .container-xxl {
        height: 625px !important;
    }

    .chat-application {
        padding: 23px !important;
        margin: 0px !important;
    }

    .content-right {
        width: 100% !important
    }

    .chat-body p {
        color: white !important
    }

    .chat-left p {
        color: black !important
    }

    .chats {
        width: 100%
    }

    .user-chats {
        overflow: auto !important
    }

    .content {
        margin-left: 0px !important
    }

    .my-chat-from {
        display: flex !important;
        border: 1px solid #c1c1c1 !important;
        margin-right: 15px !important;
    }

    .my-chat-from input {
        width: 90% !important;
        height: 36px !important;
        border: none !important;
    }

    .remove-border {
        border-radius: 0px !important;
    }

    .chat-app-form {
        position: sticky !important;
        bottom: 0 !important
    }

    .chat-app-window {
        height: 681px !important
    }

    .padding-effect {
        padding: 30px !important
    }

    .chat-us-now {
        position: fixed;
        right: 30px !important;
        bottom: 55px !important;
        left: 88% !important
    }

    .deductible-input-div {
        display: none;
        transition: 2s all linear;

    }

    #showhide:hover {
        cursor: pointer;
    }

    .deductible-input-div-show {
        display: block;

        transition: opacity 1s ease;
    }

    .quote-last-page {
        width: 100%;
        height: auto;

    }

    .quote-last-page .accordion-header {
        margin-left: 0px;
        box-shadow: 0px 12px 15px rgba(140, 152, 164, 0.1);
        background: transparent;
        color: #000;
        border-radius: 0px
    }

    .quote-last-page .accordion-header {
        background-color: white !important;
        border-radius: 0px !important;
    }

    .quote-last-page .accordion-item:first-of-type {
        border-top-left-radius: 0px !important;
        border-top-right-radius: 0px !important;


    }

    .quote-last-page button {
        background-color: transparent !important;
        color: black !important;
        font-size: 17px;
        font-weight: 500;
        display: flex;
        justify-content: space-between;
        position: relative;
    }

    .quote-last-page .accordion-item {
        margin-bottom: 50px;
    }

    .quote-last-page button::after {
        background-image: none;
    }

    .accordion-button:not(.collapsed)::after {
        display: none;
    }

    .quote-last-page .accordion-button {
        display: flex;
        justify-content: space-between;
    }

    .last-page-collapse-img {
        position: absolute;
        right: 5px;
    }

    .quote-last-page h5 {
        font-size: 29px;
        font-weight: 500;
    }

    .quote-last-page h6 {
        font-size: 15px;
        margin: 20px 0px;
        margin-bottom: 55px;
    }

    .quote-last-page h6 span {
        color: #ed5217;
    }

    .quote-second-page input {
        width: 100%;
        height: 47px;
        border-radius: 5px;
        border: 1px solid #ddd;
        margin-bottom: 15px;
        padding-left: 20px;
    }

    .full-width-input-last-page {
        width: 100%;
        height: 47px;
        border-radius: 5px;
        border: 1px solid #ddd;
        margin-bottom: 15px;
        padding-left: 20px;
    }

    .input-third-half-page {
        display: flex;
        margin-bottom: 15px;
        justify-content: space-between;
    }

    .input-third-half-page input {
        width: 30%;
        height: 47px;
        border-radius: 5px;
        border: 1px solid #ddd;

        padding-left: 20px;
    }

    .radio-btn-grp-last-page {
        display: flex;
        margin-bottom: 23px;
        margin-top: 20px;
    }

    .radio-btn-grp-last-page div {
        margin-left: 30px;
    }

    .radio-btn-grp-last-page div input {
        margin-right: 10px;
    }

    .radio-btn-grp-last-page input {

        width: 15px;
        height: 15px;
    }


    @media (min-width: 0px) and (max-width: 600px) {
        .glass-feature-inner-div-left{
        width: 100% !important;
        margin-bottom: 20px;
    }
    .glass-feature-inner-div {
        flex-direction: column !important;
    }
    .glass-feature-inner-div-right{
        width: 100% !important;
    }
    .quotes-div{
        padding: 50px 20px !important;
        padding-left: 0px !important;
    }

    .btn-custom-size.lg-size {
        width: 117px !important;
        height: 42px !important;
        line-height: 0px !important;
        font-size: 16px !important;
    }

    .select-ipload-photo h3, h2 {
        font-size: 12px !important;
    }
    .select-broken-glass h2 {
        font-size: 18px !important;
        font-weight: 700;
        margin-left: -8px;
    }
    }
</style>
@endpush



@section('content')

<div id="stepper1" class="bs-stepper">
    <div class="bs-stepper-header" role="tablist">
        <div class="step stepone" data-target="#test-l-1" onclick="goToStep(1)">
            <button type="button" class="btn btn-link step-trigger" role="tab" id="stepper1trigger1" aria-controls="test-l-1">
                <span class="bs-stepper-circle">1</span>
                <span class="bs-stepper-label">Vehicle Info</span>
            </button>
        </div>
        <div class="line"></div>
        <div class="step" data-target="#test-l-2" onclick="goToStep(2)">
            <button type="button" class="btn btn-link step-trigger" role="tab" id="stepper1trigger2" aria-controls="test-l-2">
                <span class="bs-stepper-circle">2</span>
                <span class="bs-stepper-label">Glass Selected</span>
            </button>
        </div>
        <div class="line"></div>
        <div class="step" data-target="#test-l-3" onclick="goToStep(3)">
            <button type="button" class="btn btn-link step-trigger" role="tab" id="stepper1trigger3" aria-controls="test-l-3">
                <span class="bs-stepper-circle">3</span>
                <span class="bs-stepper-label">Glass Features</span>
            </button>
        </div>

        <div class="line"></div>
        <div class="step" data-target="#test-l-4" onclick="goToStep(4)">
            <button type="button" class="btn btn-link step-trigger" role="tab" id="stepper1trigger4" aria-controls="test-l-4">
                <span class="bs-stepper-circle">4</span>
                <span class="bs-stepper-label">Availability</span>
            </button>
        </div>
        <div class="line"></div>
        <div class="step" data-target="#test-l-5" onclick="goToStep(5)">
            <button type="button" class="btn btn-link step-trigger" role="tab" id="stepper1trigger5" aria-controls="test-l-5">
                <span class="bs-stepper-circle">5</span>
                <span class="bs-stepper-label">Check Out</span>
            </button>
        </div>
        <!-- END: Content-->



    </div>
    <div class="bs-stepper-content">

        <form novalidate action="{{ route('vehicle.store') }}" method="POST" id="service-quatation">
            <div id="test-l-1" role="tabpanel" class="content" aria-labelledby="stepper1trigger1">
                <div class="form-group">
                    <div class="contact-form-area section-space-bottom-100 quots-slect section-space-y-axis-100">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="contact-form-wrap quote-responsive-div">
                                        <div class="contact-img">
                                            <h6 style="margin-left: 50px; font-size: 30px;">Provide your <span style="color: #ed5217;font-size:30px;margin-bottom:40px"> Zip Code <br /></span> Get a Price In seconds !</h6>
                                            <img src="/assets/images/blog/img-8.jpg" alt="Contact Images" style=" width: 90%;">
                                        </div>
                                        <div style="width:40% ;    position: relative;" class="responsive-first-page-quote">
                                            <img src="assets/images/background-img/pngegg (2).png" class="all-time-avail-img" style="    width: 50%;
                                                    position: absolute;
                                                    top: -45px;
                                                    right: -26px;">
                                            <form id="contact-form" class="contact-form quotes-div">
                                                <h4 class="contact-form-title mb-7 resposive-h4" style="    font-size: 22px;
                                                color:#e62700;"> Auto Glass Replacement</h4>
                                                <div class="form-field me-xl-6 zip-code-input ">
                                                    <input type="text" name="con_zip" id="con_zip" placeholder="zip code *" class="input-field  full-width-input">
                                                </div>

                                                <div class="group-input first-page-input-grp get-a-quote-grp">
                                                    <div class="form-field me-xl-6">
                                                        <div class="select-div">
                                                            <select name="car_year" id="car_year" required>
                                                                <option disabled>Year</option>
                                                                @forelse ($years as $year)
                                                                <option value="{{ $year->id }}">
                                                                    {{ $year->name }}
                                                                </option>
                                                                @empty
                                                                <option>
                                                                    No Data Available
                                                                </option>
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-field mt-6 mt-xl-0">
                                                        <div class="select-div">
                                                            <select name="car_make" id="car_make" required>
                                                                <option disabled selected>Make</option>
                                                                @forelse ($makes as $make)
                                                                <option value="{{ $make->id }}">
                                                                    {{ $make->name }}
                                                                </option>
                                                                @empty
                                                                <option>
                                                                    No Data Available
                                                                </option>
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="group-input first-page-input-grp get-a-quote-grp">
                                                    <div class="form-field me-xl-6">
                                                        <div class="select-div">
                                                            <select name="car_model" id="car_model">
                                                                <option disabled>Model</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-field mt-6 mt-xl-0">
                                                        <div class="select-div">
                                                            <select name="car_body_style" id="car_body_style">
                                                                <option disabled>Style</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-field me-xl-6 zip-code-input  " style="    padding: 14px;border: 1px solid #e0e0e0;">
                                                    <label>Contact Phone/ Mobile number *</label>
                                                    <input type="text" name="con_phone" id="con_phone" placeholder="phone *" class="input-field full-width-input">
                                                </div>
                                                <div class="form-field me-xl-6 zip-code-input  ">
                                                    <input type="text" name="con_email" id="con_email" placeholder="E-mail *" class="input-field full-width-input">
                                                </div>

                                                <div class="form-field me-xl-6 zip-code-input  deductible-input-div" >
                                                    <input type="number" name="deductible" id="deductible" placeholder="$ Deductible *" class="input-field full-width-input" value="0">
                                                </div>
                                                <div class="button-wrap mt-8 respon-div-last-quote" style="display:flex;justify-content:space-between">
                                                    <div style="display:flex;align-items:center">

                                                        <input type="checkbox" style="height:22px;width:40px" id="showhide">
                                                        <label style="margin-top: 11px;">I want to use my insurance

                                                        </label>
                                                    </div>
                                                    <button type="button" class="btn btn-primary" onclick="getGlasses()">Get Quote</button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </main>
                </div>
            </div>
            <div id="test-l-2" role="tabpanel" class="content" aria-labelledby="stepper1trigger2">
                <div class="form-group">
                    <div class="contact-form-area section-space-bottom-100 section-space-y-axis-100">
                        <div class="container ">
                            <div class="row select-">
                                <div class="col-lg-12">
                                    <div class="contact-form-wrap glass-main-div justify-content-between">
                                        <form id="glass-form" class="contact-form quotes-div">
                                            <h4 class="contact-form-title mb-7">What do you need fixed?</h4>
                                            <div id="glass-content">
                                                {{-- glass content here --}}
                                            </div>
                                            <div class="button-wrap mt-8">
                                                <button type="button" class="btn btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0" onclick="stepper1.previous()">back</button>
                                                <button type="button" class="btn btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0" onclick="isDoor('front')">Next</button>
                                                <p class="form-message mt-3 mb-0"></p>
                                            </div>
                                        </form>
                                        <div style="display: flex; flex-direction: column; width: auto;" class="contact-img">
                                            <img src="assets/images/newsletter/image-1.webp" alt="Contact Images">
                                            <img src="assets/images/newsletter/image-2.webp" alt="Contact Images">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </main>
                </div>
            </div>
            <div id="test-l-3" role="tabpanel" class="content" aria-labelledby="stepper1trigger3">
                <div class="form-group">
                    <div class="contact-form-area section-space-bottom-100 section-space-y-axis-100">
                        <div class="container ">
                            <div class="row select-">
                                <div class="col-lg-12">
                                    <div class="contact-form-wrap glass-main-div" id="door-scr">
                                        <form id="feature-form1" class="contact-form quotes-div" style="padding:50px 0px">
                                            <div class="glass-feature-main  "  id="calibration-service">
                                                {{-- <h5>We've got your <span> 2023 Acura RDX covered! </span></h5> --}}
                                                <h6>Now choose your service options*.</h6>
                                                <div class="glass-feature-inner-div">
                                                    <div class="glass-feature-inner-div-left border-div calibration-choice" data-value="Installation Only">
                                                        <h2 class="pl-2">Glass Installation Only </h2>
                                                        <ul class="pl-4">
                                                            <li>
                                                                New Windshield Replacement
                                                            </li>
                                                            <li>
                                                                Professional Installation
                                                            </li>
                                                            <li>
                                                                Lifetime Warranty
                                                            </li>
                                                        </ul>

                                                        {{-- <h4>$875</h4> --}}
                                                    </div>
                                                    <div class="glass-feature-inner-div-left calibration-choice" data-value="Premium Service" >
                                                        <h2 class="pl-2">Premium</h2>
                                                        <ul class="pl-4">
                                                            <li>
                                                                Recalibration Included
                                                            </li>
                                                            <li>
                                                                New Windshield Replacement
                                                            </li>
                                                            <li>
                                                                Professional Installation
                                                            </li>
                                                            <li>
                                                                Lifetime Warranty
                                                            </li>

                                                        </ul>

                                                        <h4>$250</h4>
                                                    </div>

                                                </div>
                                                <input type="hidden" name="Windshield_Service" id="Windshield_Service" value="">
                                            </div>
                                            <div class="glass-feature-main " id="broken-glass-screen">
                                                <h5 style="margin-bottom:20px">What's wrong with your side window?</h5>

                                                <div class="glass-feature-inner-div">
                                                    <div class="glass-feature-inner-div-left border-div glass-is-broken" data-value="broken">
                                                        <img src="assets/images/about/broken.png">
                                                        <h2 class="pl-2">The Glass is Broken </h2>


                                                    </div>
                                                    <div class="glass-feature-inner-div-left glass-is-broken" data-value="slow-moving">
                                                        <img src="assets/images/about/updown.png">
                                                        <h2 class="pl-2">It's Stuck or Move Slowly</h2>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="glass_issue" id="glass_issue" value="">
                                                <div class="select-broken-glass" id="select-broken-glass">
                                                    <h2>What cause the glass to break?</h2>

                                                    <ul>
                                                        <li>
                                                            <div>
                                                                <input type="checkbox" name="glass_issue_cause[]" value="Break-Ins">
                                                                <label>Break-Ins</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <input type="checkbox" name="glass_issue_cause[]" value="Accidents">
                                                                <label>Accidents</label>

                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <input type="checkbox" name="glass_issue_cause[]" value="Debris Impact">
                                                                <label>Debris Impact</label>

                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <input type="checkbox" value="Other" name="glass_issue_cause[]" id="other_check">
                                                                <label>Other</label>
                                                                <input type="text" id="other_input" style="display: none;">

                                                            </div>
                                                        </li>
                                                    </ul>

                                                </div>
                                                <div class="select-ipload-photo">
                                                    <div class="select-input-upload-img">
                                                        <input type="file" name="glass_issue_image" id="glass_issue_image">
                                                        <img src="assets/images/about/camra..png" id="glass_issue_image_preview">

                                                    </div>


                                                    <div class="not-sure-div">
                                                        <h2>Not sure of your damage?</h2>
                                                        <h3 style="color:#ed5217">Send us a photo to review</h3>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="button-wrap mt-8 " style="margin-left: 30px;">
                                                <button type="button" class="btn btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0" onclick="stepper1.previous()">back</button>
                                                <button type="button" class="btn btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0 calibration-step"  onclick="getFeatures()">Next</button>
                                                <p class="form-message mt-3 mb-0"></p>
                                            </div>
                                        </form>
                                        <div class="contact-img image-sizes">
                                            <div class="center">
                                                <img src="assets/images/newsletter/car-wash.png" alt="Contact Images">
                                                <p>Pay for service once completed</p>
                                            </div>
                                            <div class="center center-2 background-1">
                                                <img src="assets/images/newsletter/credit-card.png" alt="Contact Images">
                                                <p>We come to you at no extra cost</p>
                                            </div>
                                            <div class="center center-2 background-2">
                                                <img src="assets/images/newsletter/warranty.png" alt="Contact Images">
                                                <p>National lifetime warranty</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="test-l-4" role="tabpanel" class="content " aria-labelledby="stepper1trigger4">
                <div class="form-group">
                    <div class="contact-form-area section-space-bottom-100 section-space-y-axis-100">
                        <div class="container ">
                            <div class="row select-">
                                <div class="col-lg-12">
                                    <div class="contact-form-wrap glass-main-div">
                                        <form id="feature-form-2" class="contact-form quotes-div">
                                            <div id="feature-content">
                                                {{-- feature content here --}}
                                            </div>
                                            <div class="button-wrap mt-8">
                                                <button type="button" class="btn btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0" onclick="isDoor('back')">back</button>
                                                <button type="button" class="btn btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0" onclick="addToCart()">Next</button>
                                                <p class="form-message mt-3 mb-0"></p>
                                            </div>
                                        </form>
                                        <div class="contact-img image-sizes">
                                            <div class="center">
                                                <img src="assets/images/newsletter/car-wash.png" alt="Contact Images">
                                                <p>Pay for service once completed</p>
                                            </div>
                                            <div class="center center-2 background-1">
                                                <img src="assets/images/newsletter/credit-card.png" alt="Contact Images">
                                                <p>We come to you at no extra cost</p>
                                            </div>
                                            <div class="center center-2 background-2">
                                                <img src="assets/images/newsletter/warranty.png" alt="Contact Images">
                                                <p>National lifetime warranty</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="test-l-5" role="tabpanel" class="content" aria-labelledby="stepper1trigger5">
                <div class="form-group">
                    <!-- Begin Main Content Area -->
                    <main class="main-content">
                        <div class="checkout-area section-space-y-axis-100">
                            <div class="container quotes-main-div">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-accordion">
                                            <h3 style="color: white;font-size: 25px;background: #f44336;text-align: center;" class="h3-div-quote-id" id="quote-id"></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-6 col-12" id="billing-form">
                                        <form action="javascript:void(0)" id="customer-form">
                                            <h3 style="color: #283a5e;">Choose Date and Time</h3>
                                            <div class="date-and-time-picker">
                                                <label class="date-and-time-picker-label">Select Date For Service</label>
                                                <input style="width: 100%;height: 43px;padding: 0px 14px;border-radius: 4px;border: 1px solid #dee2e6;" type="date" value="2023-06-01" name="appointment_date">
                                            </div>
                                            <div class="date-and-time-picker" style="margin-top:30px">
                                                <label class="date-and-time-picker-label">Select Time For Service</label>
                                                <select style="width: 100%;height: 43px;padding: 0px 14px;border-radius: 4px;border: 1px solid #dee2e6;" name="appointment_time">
                                                    @foreach (\App\Models\SaleTransaction::ALL_APPOINTMENT_TIMES as $time)
                                                        <option value="{{ $loop->iteration }}">{{ $time }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="checkbox-form">
                                                <div class="checkbox-form">
                                                    <h3 style="color:black">Billing Details</h3>
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="checkout-form-list">
                                                                <label>First Name <span class="required">*</span></label>
                                                                <input placeholder="" type="text" name="name[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="checkout-form-list">
                                                                <label>Last Name <span class="required">*</span></label>
                                                                <input placeholder="" type="text" name="name[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="checkout-form-list">
                                                                <label>Email Address  <span class="required">*</span></label>
                                                                <input placeholder="Email" type="email" name="email" id="email" readonly>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="checkout-form-list">
                                                                <label>Phone<span class="required">*</span></label>
                                                                <input placeholder="" type="text" name="phone" id="phone" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="checkout-form-list">
                                                                <label>Alternate Phone <span class="required">*</span></label>
                                                                <input placeholder="" type="text" name="phone_alternative">
                                                            </div>
                                                        </div>
                                                        <h3 style="color:black">Address Details</h3>

                                                        <div class="col-md-12">
                                                            <div class="checkout-form-list">
                                                                <label> Address <span class="required">*</span></label>
                                                                <input placeholder="Address" type="text" name="address[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="checkout-form-list">
                                                                <label>Apt/Suite# <span class="required">*</span></label>
                                                                <input type="text" placeholder="Apt/Suite#"  name="address[]">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="checkout-form-list">
                                                                <label>City <span class="required">*</span></label>
                                                                <input type="text" placeholder="City"  name="city">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="checkout-form-list">
                                                                <label>State<span class="required">*</span></label>
                                                                <input type="text" placeholder="State" name="state">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="checkout-form-list">
                                                                <label>Zip Code <span class="required">*</span></label>
                                                                <input type="text" placeholder="Zip Code"  name="text" name="zip_code" readonly id="zip_code">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">

                                                            <div class="order-notes" style="margin-bottom:20px">
                                                                <div class="checkout-form-list checkout-form-list-2">
                                                                    <label>VIN</label>
                                                                    <input type="text" name="vin" placeholder="VIN # AVAILABLE">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">

                                                            <div class="order-notes">
                                                                <div class="checkout-form-list checkout-form-list-2">
                                                                    <label>Order Notes</label>
                                                                    <textarea id="checkout-mess" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery." name="note"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="button-wrap mt-8">
                                                {{-- <button type="button" class="btn btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0" onclick="stepper1.previous()">back</button> --}}
                                                <button type="button" class="btn btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0" style="width: auto;" onclick="proceedToPayment()">Proceed to Payment</button>
                                                <p class="form-message mt-3 mb-0"></p>
                                            </div>
                                        </form>
                                    </div>

                                    {{-- payment form --}}
                                    <div class="col-lg-6 col-12" id="payment-form" style="display: none;">
                                        <div class="quote-last-page">
                                            <h5>Payment Info</h5>
                                            <h6>This is a secure 2048-bit EV-SSL encrypted payment - <span>Strongest Available</span>.</h6>
                                            <div class="accordion" id="accordionExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            <div>
                                                                <input class="payment_method_input" type="radio" name="payment_method" value="cash" checked>
                                                                Cash
                                                            </div>
                                                            <div class="last-page-collapse-img">

                                                                <img src="assets\images\about\dollar.5152d9a.png">
                                                            </div>
                                                        </button>
                                                    </h2>
                                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            Please provide the exact amount in cash to our technician(s) once your installation is completed
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingTwo">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            <div>
                                                                <input class="payment_method_input" type="radio" name="payment_method" value="insurance">
                                                                Insurance
                                                            </div>
                                                            <div class="last-page-collapse-img">

                                                                <img src="assets\images\about\insurance.7768982.png">
                                                            </div>


                                                        </button>
                                                    </h2>
                                                    <div id="collapseTwo" class="accordion-collapse collapse second-collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <form>
                                                                <div class="quote-second-page">

                                                                    <input type="text" placeholder="Name of your insurance" name="insurance_name">
                                                                    <input type="text" placeholder="claim#" name="claim">
                                                                    <input type="number" placeholder="Insurance" name="payment_insurance" id="payment_insurance">
                                                                    <input type="text" placeholder="#VIN" name="payment_vin" id="payment_vin">

                                                                </div>


                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(Config::get('stripe.is_active'))
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingThree">

                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                <div>
                                                                    <input class="payment_method_input" type="radio" name="payment_method" value="card">
                                                                    Save Card <span style="color:#ed5217">( Charged upon technician arrival )</span>
                                                                </div>
                                                                <div class="last-page-collapse-img">
                                                                    <img src="https://windshieldhub.com/_nuxt/img/dollar.5152d9a.png">
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        
                                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <!-- Display a payment form -->
                                                                <form id="payment-form">
                                                                    <div id="link-authentication-element">
                                                                    <!--Stripe.js injects the Link Authentication Element-->
                                                                    </div>
                                                                    <div id="payment-element">
                                                                    <!--Stripe.js injects the Payment Element-->
                                                                    </div>
                                                                    <button id="submit">
                                                                    <div class="spinner hidden" id="spinner"></div>
                                                                    <span id="button-text">Pay now</span>
                                                                    </button>
                                                                    <div id="payment-message" class="hidden"></div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(Config::get('paypal.is_active'))
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingFour">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
                                                                <div>
                                                                    <input class="payment_method_input" type="radio" name="payment_method" value="paypal">
                                                                    Paypal

                                                                </div>
                                                                <div class="last-page-collapse-img">

                                                                    <img src="assets\images\about\insurance.7768982.png">
                                                                </div>


                                                            </button>
                                                        </h2>
                                                        <div id="collapseFour" class="accordion-collapse collapse second-collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                            <div id="paypal-button-container"></div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>


                                    </div>



                                    <div class="col-lg-6 col-12">
                                        <div class="your-order">
                                            <h3 style="color:black !important">Your order</h3>
                                            <div class="your-order-table table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="cart-product-name">Product</th>
                                                            <th class="cart-product-total">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="cart-rows">
                                                        @if(session('cart'))
                                                        @foreach(session('cart') as $id => $details)
                                                        <tr class="cart_item">
                                                            <td class="cart-product-name"> {{ $details['name'] }}<strong class="product-quantity">
                                                                    × {{ $details['quantity'] }}</strong></td>
                                                            <td class="cart-product-total"><span class="amount">${{ $details['row_total'] }}</span></td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <tr>
                                                            <td colspan="2">No items in cart</td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                    <tfoot>
                                                        <tr class="cart-subtotal">
                                                            <th>Cart Subtotal</th>
                                                            <td><span class="amount" id="subtotal">$ {{ session('cartSubtotal') ?? 0.00 }}</span></td>
                                                        </tr>
                                                        <tr class="cart-deductible">
                                                            <th>Deductible</th>
                                                            <td><span class="amount" id="deductible-cart"></span></td>
                                                        </tr>
                                                        <tr class="order-total">
                                                            <th>Order Total</th>
                                                            <td><strong><span class="amount" id="total">$ {{ session('cartTotal') ?? 0.00 }}</span></strong></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <div class="payment-method">
                                                <div class="payment-accordion">
                                                    <div id="accordion">
                                                        <div class="card">
                                                            <div class="card-header" id="#payment-1">
                                                                <h5 class="panel-title">
                                                                    <a href="#" class="" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"> Summary </a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                                                                <div class="card-body">
                                                                    <p class="summary-details" id="summery-text"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="order-button-payment">
                                                        <input value="Place order" type="button" id="place-order" style="display: none;">
                                                    </div>
                                                    <div class="order-button-payment" onclick="backBilling()">
                                                        <input value="Cancel" style="text-align:center" data-toggle="modal" data-target="#exampleModal">
                                                    </div>
                                                    <div class="btns get-a-quote-btn chat-us-now">

                                                        <!-- <a data-bs-toggle="modal" data-bs-target="#quickModal" class="theme-btn">
                                                            <div class="get-a-quote-btn-icon-div" style="margin-right:20px"><img src="assets\images\banner\chat.png" style="margin-top: 8px;margin-left: 5px;"> </div>Chat Us
                                                        </a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </main>
                    <!-- Main Content Area End Here -->

                </div>
            </div>
        </form>
    </div>
</div>

</div>
</div>

<!-- Begin Modal Area -->
<div class="modal quick-view-modal fade" id="quickModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="quickModal" aria-hidden="true" style="padding-top:30px">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- BEGIN: Content-->
            <div class="app-content content chat-application">
                <div class="content-overlay"></div>
                <div class="header-navbar-shadow"></div>
                <div class="content-area-wrapper container-xxl p-0">

                    <div class="content-right">
                        <div class="content-wrapper container-xxl p-0">
                            <div class="content-header row">
                            </div>
                            <div class="content-body">
                                <div class="body-content-overlay"></div>
                                <!-- Main chat area -->
                                <section class="chat-app-window">


                                    <div class="active-chat">
                                        <!-- Chat Header -->
                                        <div class="chat-navbar">
                                            <header class="chat-header" style="height:73px!important;text-align:center;justify-content:center;padding:5px">
                                                <div class="d-flex align-items-center">

                                                    <div class="avatar avatar-border user-profile-toggle m-0 mr-1">
                                                        <img src="assets/app-assets/images/portrait/small/avatar-s-7.jpg" alt="avatar" height="36" width="36">
                                                        <span class="avatar-status-busy"></span>
                                                    </div>
                                                    <h6 class="mb-0" style="    font-size: 17px;">Kristopher Candy</h6>
                                                </div>

                                            </header>
                                        </div>
                                        <!--/ Chat Header -->

                                        <!-- User Chat messages -->
                                        <div class="user-chats ps ps--active-y">
                                            <div class="chats">
                                                <div class="chat">
                                                    <div class="chat-avatar">
                                                        <span class="avatar box-shadow-1 cursor-pointer">
                                                            <img src="assets/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="36" width="36">
                                                        </span>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-content">
                                                            <p>How can we help? We're here for you! 😄</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <span class="avatar box-shadow-1 cursor-pointer">
                                                            <img src="assets/app-assets/images/portrait/small/avatar-s-7.jpg" alt="avatar" height="36" width="36">
                                                        </span>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-content">
                                                            <p>Hey John, I am looking for the best admin template.</p>
                                                            <p>Could you please help me to find it out? 🤔</p>
                                                        </div>
                                                        <div class="chat-content">
                                                            <p>It should be Bootstrap 4 compatible.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="divider">
                                                    <div class="divider-text">Yesterday</div>
                                                </div>
                                                <div class="chat">
                                                    <div class="chat-avatar">
                                                        <span class="avatar box-shadow-1 cursor-pointer">
                                                            <img src="assets/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="36" width="36">
                                                        </span>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-content">
                                                            <p>Absolutely!</p>
                                                        </div>
                                                        <div class="chat-content">
                                                            <p>Vuexy admin is the responsive bootstrap 4 admin template.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <span class="avatar box-shadow-1 cursor-pointer">
                                                            <img src="assets/app-assets/images/portrait/small/avatar-s-7.jpg" alt="avatar" height="36" width="36">
                                                        </span>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-content">
                                                            <p>Looks clean and fresh UI. 😃</p>
                                                        </div>
                                                        <div class="chat-content">
                                                            <p>It's perfect for my next project.</p>
                                                        </div>
                                                        <div class="chat-content">
                                                            <p>How can I purchase it?</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat">
                                                    <div class="chat-avatar">
                                                        <span class="avatar box-shadow-1 cursor-pointer">
                                                            <img src="assets/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="36" width="36">
                                                        </span>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-content">
                                                            <p>Thanks, from ThemeForest.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <span class="avatar box-shadow-1 cursor-pointer">
                                                            <img src="assets/app-assets/images/portrait/small/avatar-s-7.jpg" alt="avatar" height="36" width="36">
                                                        </span>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-content">
                                                            <p>I will purchase it for sure. 👍</p>
                                                        </div>
                                                        <div class="chat-content">
                                                            <p>Thanks.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat">
                                                    <div class="chat-avatar">
                                                        <span class="avatar box-shadow-1 cursor-pointer">
                                                            <img src="assets/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="36" width="36">
                                                        </span>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-content">
                                                            <p>Great, Feel free to get in touch on</p>
                                                        </div>
                                                        <div class="chat-content">
                                                            <p>https://pixinvent.ticksy.com/</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Submit Chat form -->
                                            <form class="chat-app-form" action="javascript:void(0);" onsubmit="enterChat();">
                                                <div class="input-group input-group-merge mr-1 form-send-message my-chat-from">

                                                    <input type="text" class="form-control message" placeholder="Type your message or use speech to text">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text remove-border">
                                                            <label for="attach-doc" class="attachment-icon mb-0">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image cursor-pointer lighten-2 text-secondary">
                                                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                                                    <polyline points="21 15 16 10 5 21"></polyline>
                                                                </svg>
                                                                <input type="file" id="attach-doc" hidden=""> </label></span>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-primary send waves-effect waves-float waves-light" onclick="enterChat();">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send d-lg-none">
                                                        <line x1="22" y1="2" x2="11" y2="13"></line>
                                                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                                    </svg>
                                                    <span class="d-none d-lg-block">Send</span>
                                                </button>
                                            </form>
                                            <!--/ Submit Chat form -->
                                        </div>
                                </section>
                                <!--/ Main chat area -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div id="insuranceInfoModal" role="dialog" class="modal fade show" aria-modal="true" style="padding-right: 17px; display: block;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content address-msg-popup">
                <button type="button" data-dismiss="modal" class="close" style="text-align: end;padding-right: 20px;font-size: 37px;color: black;">
                    ×
                </button>
                <div class="address-msg">
                    <div class="ml-4 mt-0" style="padding:20px">
                        <p style="font-size: 14px; padding-right: 5px;text-align:center">
                            Thank you for choosing WindshieldHUB! Since you will be using your insurance, you need to authorize us as the shop of your choice.
                        </p>
                        <h5 style="text-align:center;font-weight:700;font-size:25px">What to do next</h5>
                        <ol style="font-size: 14px; padding-left: 20px; text-align: left;">
                            <li>
                                Please add your VIN # since we need to verify the correct part # for your vehicle.
                            </li>
                            <li>
                                Go ahead and submit the order to save your appointment. Keep in mind we won't be able to schedule the service request until we get the insurance approval, and we need the approval 3 hrs before the time frame you selected.
                            </li>
                            <li>
                                Once you submit the order, please go ahead and call your insurance company and provide our shop name, WindshieldHUB of Florida, our phone # registered with all insurance is 646 663-1112. for billing purposes, we need you to select our location in Florida, and the city is Apollo Beach. It won't make a difference for your specific city

                                New York, NY,
                                since we cover mobile service nationwide and we have different locations.
                            </li>
                            <li>
                                Once your glass claim is approved, your insurance company will be emailed to us with the right deductible. If you have any otherwise, it will remain $0. We can dispatch the job accordingly.
                            </li>
                            <li>
                                If you would like us to set up the glass claim, please notify us, and we can call your insurance directly to the glass claims dept. We need the name of your Insurance company, your Policy #, and your VIN #, but keep in mind we need you on the line with us for your claim authorization typically takes 10-15 minutes.
                            </li>
                        </ol>
                    </div>
                    <div style="text-align:center">

                        <button style="
                                margin-bottom: 27px;
                                background: red;
                                color: white;
                                border: none;
                                width: 109px;
                                height: 39px;
                            " type="button" data-dismiss="modal" class="js-scroll-top btn-sp btn-sp-primary btn-sp-lg btn-wide btn-pill ws-next-btn">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
@if(Config::get('paypal.is_active'))
    <script src="https://www.paypal.com/sdk/js?client-id={{ Config::get('paypal.client') }}"></script>
@endif
<script>
        const stripe = Stripe("{{ Config::get('stripe.key') }}");
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        // paypal.Buttons().render('#paypal-button-container')
</script>

<script src="./assets/js/stripe-checkout.js"></script>



<script>
    var stepper1 = new Stepper(document.querySelector('#stepper1'));
    var form = document.querySelector('form');
    var validFormFeedback = document.querySelector('#test-l-5 .valid-feedback');
    var inValidFormFeedback = document.querySelector('#test-l-5 .invalid-feedback');
    var myprogress=0
    var glassFeatures = 0;



    $(".user-chats").scrollTop($(".user-chats")[0].scrollHeight);
    form.addEventListener('submit', function(event) {
        form.classList.remove('was-validated');
        inValidFormFeedback.classList.remove('d-block');
        validFormFeedback.classList.remove('d-block');

        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
            inValidFormFeedback.classList.add('d-block');
        } else {
            validFormFeedback.classList.add('d-block');
        }

        form.classList.add('was-validated');
    }, false);

    // on page load hit ajax to get make data
    $(document).ready(function() {
        $('#car_make').on('change', function() {
            var make = $(this).val();
            $("#car_model").empty();
            $.ajax({
                url: "{{ route('vehicle.getModel') }}",
                type: "GET",
                data: {
                    make_id: make,
                },
                success: function(response) {
                    var optionList = "<option disabled>Model</option>";
                    $.each(response, function(key, value) {
                        optionList += '<option value="' + value.id + '">' + value.name + '</option>';
                    });
                    // append to car model
                    $("#car_model").append(optionList);
                    $("#car_model").trigger("change");
                }
            });
        });

        // on model selet change hit ajax to get body style data
        $('#car_model').on('change', function() {
            var model = $(this).val();
            $("#car_body_style").empty();
            $.ajax({
                url: "{{ route('vehicle.getBodyStyle') }}",
                type: "GET",
                data: {
                    model_id: model,
                },
                success: function(response) {
                    var optionList = "<option disabled>Style</option>";
                    $.each(response, function(key, value) {
                        optionList += '<option value="' + value.id + '">' + value.name + '</option>';
                    });
                    // append to car model
                    $("#car_body_style").append(optionList);
                }
            });
        });

        $('#place-order').on('click', function() {
            postPayment();
        });

        $('.glass-is-broken').on('click', function() {
            var glass = $(this).data('value');

            // remove class
            $('.glass-is-broken').removeClass('border-div');
            $(this).addClass('border-div');

            $('#glass_issue').val(glass);

            if(glass == 'slow-moving'){
                $('#select-broken-glass').hide();
            }else{
                $('#select-broken-glass').show();
            }
        });

        $('.calibration-choice').on('click', function() {
            let choice = $(this).data('value');

            // remove class
            $('.calibration-choice').removeClass('border-div');
            $(this).addClass('border-div');

            $('#Windshield_Service').val(glass);

        });

        $('#other_check').on('click', function() {
            $(this).is(':checked') ? $('#other_input').show() : $('#other_input').hide();
        });

        $('#glass_issue_image').on('change', function() {
            var file = $(this)[0].files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#glass_issue_image_preview').attr('src', e.target.result);
                $('#glass_issue_image_preview').attr('width', '100px');
                $('#glass_issue_image_preview').attr('height', '100px');
            }
            reader.readAsDataURL(file);
        });

        $('#con_phone').on('keydown', function(e) {
            var key = e.keyCode || e.which;
            if (key === 8) { // Backspace key
                var inputValue = $(this).val();
                var formattedValue = formatMobileNumber(inputValue, true);
                $(this).val(formattedValue);
            }
        });

        $('#con_phone').on('input', function() {
            var inputValue = $(this).val();
            var formattedValue = formatMobileNumber(inputValue, false);
            $(this).val(formattedValue);
        });

        $('#showhide').click(function() {
            var deductible = $(".deductible-input-div");
            deductible.toggleClass("deductible-input-div-show");
        });

        $(document).on('change', '.glass-checkbox', function() {
            let has_featues = $(this).data('hasfeature');
            if ($(this).is(':checked') && has_featues) {
                glassFeatures++;
            } else if(!$(this).is(':checked') && has_featues) {
                glassFeatures--;
            }
            updateGlassFeaturesStep();
        });

        $('.payment_method_input').on('click', function() {
            var payment_method = $(this).val();
            if(payment_method == 'card' || payment_method == 'paypal'){
                $('#place-order').hide();
                showPaymentForm();
                renderPayPalButton();
            }else{
                $('#place-order').show();
            }
        });

        updateGlassFeaturesStep();
    });

    function postPayment(payment_log = null, payment_success = false) {
        var make = $('#car_make').val();
        var model = $('#car_model').val();
        var body_style = $('#car_body_style').val();
        var year = $('#car_year').val();
        var payment_method = $("input[name='payment_method']:checked").val();

        var glass_issue = $('#glass_issue').val();
        var windsheild_install_type = $('#Windshield_Service').val();

        if ($('#glass_issue_image')[0].files[0]) {
            var file = $('#glass_issue_image')[0].files[0];
        } else {
            var file = '';
        }

        var glass_issue_cause = [];
        $.each($("input[name='glass_issue_cause[]']:checked"), function() {
            glass_issue_cause.push($(this).val());
        });

        var glass = [];
        $.each($("input[name='glass[]']:checked"), function() {
            glass.push($(this).val());
        });

        var fitting = [];
        $.each($("input[name='fitting[]']"), function() {
            fitting.push($(this).val());
        });

        var feature = [];
        $.each($("input[name^='feature']:checked"), function() {
                feature.push($(this).val());
        });

        var appointment_date = $("input[name='appointment_date']").val();
        var appointment_time = $("select[name='appointment_time']").val();

        var name = [];
        $.each($("input[name='name[]']"), function() {
            name.push($(this).val());
        });

        var address = [];
        $.each($("input[name='address[]']"), function() {
            address.push($(this).val());
        });

        var email = $("input[name='email']").val();
        var phone = $("input[name='phone']").val();
        var phone_alternative = $("input[name='phone_alternative']").val();
        var city = $("input[name='city']").val();
        var state = $("input[name='state']").val();
        var zip_code = $("input[name='con_zip']").val();
        // var country = $("select[name='country']").val();
        var note = $("textarea[name='note']").val();
        var vin = $("input[name='vin']").val();

        // Create a new FormData object
        var formData = new FormData();

        // Append all the data to the FormData object
        formData.append('make', make);
        formData.append('model', model);
        formData.append('style', body_style);
        formData.append('year', year);
        formData.append('appointment_date', appointment_date);
        formData.append('appointment_time', appointment_time);
        formData.append('email', email);
        formData.append('phone', phone);
        formData.append('phone_alternative', phone_alternative);
        formData.append('city', city);
        formData.append('state', state);
        formData.append('zip_code', zip_code);
        formData.append('note', note);
        formData.append('vin', vin);
        formData.append('glass_issue', glass_issue);
        formData.append('glass_issue_image', file);
        formData.append('payment_method', payment_method);
        formData.append('payment_success', payment_success);
        formData.append('windsheild_install_type', windsheild_install_type);
        formData.append('_token', "{{ csrf_token() }}");

        // Convert arrays to JSON strings and append to formData
        formData.append('glass', JSON.stringify(glass));
        formData.append('fitting', JSON.stringify(fitting));
        formData.append('feature', JSON.stringify(feature));
        formData.append('name', JSON.stringify(name));
        formData.append('address', JSON.stringify(address));
        formData.append('glass_issue_cause', JSON.stringify(glass_issue_cause));
        formData.append('payment_log', JSON.stringify(payment_log));

        // get form action url
        var url = $('#service-quatation').attr('action');
        var method = $('#service-quatation').attr('method');
        $.ajax({
            url: url,
            type: method,
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                Swal.fire({
                    title: "Thank you!",
                    text: "Quotation request sent successfully.",
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('thanks-order') }}";
                    }
                });
            },
            error: function(response) {
                Swal.fire({
                    title: "Error!",
                    text: JSON.parse(response.responseText).message,
                    icon: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                });
            }
        });
    }

    // Function to get the updated amount to charge
    function getAmountToCharge() {
        var total = $('#total').text();
        return total;
    }

    // Render the PayPal button with the specified transaction details
    function renderPayPalButton() {
        const amountToCharge = getAmountToCharge();
        paypal.Buttons({
        // Set the transaction details
        createOrder: function (data, actions) {
            return actions.order.create({
            purchase_units: [
                {
                amount: {
                    value: amountToCharge,
                },
                },
            ],
            });
        },
        // Handle the onApprove event
        onApprove: function (data, actions) {
            // Capture the funds
            return actions.order.capture().then(function (details) {
            // console.log('Transaction completed:', details);
                postPayment(details, true);
            });
        },
        // Handle errors or cancellations
        onError: function (err) {
            postPayment(err, false);
            // console.error('Transaction error:', err);
            // Replace the console.error with your own logic to handle errors or cancellations
        },
        }).render('#paypal-button-container');
    }

    function updateStepNumbers() {
        let stepNumber = 1;
        $('.bs-stepper-header .step:visible').each(function () {
            const circle = $(this).find('.bs-stepper-circle');
            circle.text(stepNumber++);
        });

        // Hide all lines
        $('.line').hide();

        // Show lines only between visible steps
        $('.bs-stepper-header .step:visible').each(function (index) {
            if (index < $('.bs-stepper-header .step:visible').length - 1) {
                $(this).next('.line').show();
            }
        });
    }

    // Function to update the "Glass Features" step visibility
    function updateGlassFeaturesStep() {
        let hasFeatureChecked = false;
        $('.glass-checkbox').each(function() {
            if ($(this).is(':checked') && $(this).data('hasfeature')) {
                hasFeatureChecked = true;
                return false;
            }
        });

        if (hasFeatureChecked) {
            $('#stepper1trigger3').closest('.step').show();
        } else {
            $('#stepper1trigger3').closest('.step').hide();
        }

        updateStepNumbers();
    }


    // Glass static data
    var glass_1 = '<div class="select-input"><label for="glass1" class="d-flex justify-content-between align-items-center cursor-pointer"><div class="form-group form-group-nlg-sm mb-0"><div class="custom-control custom-checkbox"><div><input id="glass1" type="checkbox" rel="Windshield" class="custom-control-input glass-checkbox" value="1" name="glass[]" data-type="windshield" ></div><div class="custom-control-label pl-2"> Windshield</div></div></div><img src="/assets/images/newsletter/one.png" alt="Windshield" class="need-fix-img"></label></div>';

    var glass_2 = '<div class="select-input"><label for="glass2" class="d-flex justify-content-between align-items-center cursor-pointer"><div class="form-group form-group-nlg-sm mb-0"><div class="custom-control custom-checkbox"><div><input id="glass2" type="checkbox" rel="Passenger Front - Door Glass" class="custom-control-input glass-checkbox" value="2" name="glass[]" data-type="door"></div><div class="custom-control-label pl-2"> Passenger Front - Door Glass</div></div></div><img src="/assets/images/newsletter/two.png" alt="Passenger Front - Door Glass" class="need-fix-img"></label></div>';

    var glass_3 = '<div class="select-input"><label for="glass3" class="d-flex justify-content-between align-items-center cursor-pointer"><div class="form-group form-group-nlg-sm mb-0"><div class="custom-control custom-checkbox"><div><input id="glass3" type="checkbox" rel="Driver Front - Door Glass" class="custom-control-input glass-checkbox" value="3" name="glass[]" data-type="door"></div><div class="custom-control-label pl-2"> Driver Front - Door Glass</div></div></div><img src="/assets/images/newsletter/three.png" alt="Driver Front - Door Glass" class="need-fix-img"></label></div>';

    var glass_4 = '<div class="select-input"><label for="glass4" class="d-flex justify-content-between align-items-center cursor-pointer"><div class="form-group form-group-nlg-sm mb-0"><div class="custom-control custom-checkbox"><div><input id="glass4" type="checkbox" rel="Passenger Back - Door Glass" class="custom-control-input glass-checkbox" value="4" name="glass[]" data-type="door"></div><div class="custom-control-label pl-2">Passenger Back - Door Glass</div></div></div><img src="/assets/images/newsletter/four.png" alt="Passenger Back - Door Glass" class="need-fix-img"></label></div>';

    var glass_5 = '<div class="select-input"><label for="glass5" class="d-flex justify-content-between align-items-center cursor-pointer"><div class="form-group form-group-nlg-sm mb-0"><div class="custom-control custom-checkbox"><div><input id="glass5" type="checkbox" rel="Driver Back - Door Glass" class="custom-control-input glass-checkbox" value="5" name="glass[]" data-type="door"></div><div class="custom-control-label pl-2">Driver Back - Door Glass</div></div></div><img src="/assets/images/newsletter/five.png" alt="Driver Back - Door Glass" class="need-fix-img"></label></div>';

    var glass_6 = '<div class="select-input"><label for="glass6" class="d-flex justify-content-between align-items-center cursor-pointer"><div class="form-group form-group-nlg-sm mb-0"><div class="custom-control custom-checkbox"><div><input id="glass6" type="checkbox" rel="Passenger Quarter" class="custom-control-input glass-checkbox" value="6" name="glass[]"></div><div class="custom-control-label pl-2">Passenger Quarter</div></div></div><img src="/assets/images/newsletter/six.png" alt="Passenger Quarter" class="need-fix-img"></label></div>';

    var glass_7 = '<div class="select-input"><label for="glass7" class="d-flex justify-content-between align-items-center cursor-pointer"><div class="form-group form-group-nlg-sm mb-0"><div class="custom-control custom-checkbox"><div><input id="glass7" type="checkbox" rel="Driver Quarter" class="custom-control-input glass-checkbox" value="7" name="glass[]"></div><div class="custom-control-label pl-2">Driver Quarter</div></div></div><img src="/assets/images/newsletter/seven.png" alt="Driver Quarter" class="need-fix-img"></label></div>';

    var glass_8 = '<div class="select-input"><label for="glass8" class="d-flex justify-content-between align-items-center cursor-pointer"><div class="form-group form-group-nlg-sm mb-0"><div class="custom-control custom-checkbox"><div><input id="glass8" type="checkbox" rel="Back Glass" class="custom-control-input glass-checkbox" value="8" name="glass[]"></div><div class="custom-control-label pl-2">Back Glass</div></div></div><img src="/assets/images/newsletter/seven.png" alt="Back Glass" class="need-fix-img"></label></div>';

    function getGlasses() {

        var deductible = $("#deductible").val();
        var email = $("#con_email").val();
        var phone = $("#con_phone").val();
        var zip_code = $("#con_zip").val();
        var year = $("#car_year").val();
        var make = $("#car_make").val();
        var model = $("#car_model").val();
        var style = $("#car_body_style").val();
        var url = "{{ route('vehicle.getGlasses') }}";
        $("#glass-content").empty();
        $.ajax({
            url: url,
            type: "GET",
            data: {
                deductible: deductible,
                email: email,
                phone: phone,
                zip_code: zip_code,
                make_id: make,
                model_id: model,
                style_id: style,
                year_id: year,
            },
            success: function(response) {
                // if response is not empty
                if (response.glass.length > 0) {
                    let divList = '';
                    $.each(response.glass, function(key, value) {
                        let glass = "glass_" + value.id;
                        divList += window[glass];
                    });
                    $("#glass-content").append(divList);

                    $.each(response.glass, function(key, value) {
                        // $('#glass' + value.id).data('hasFeature' , value.has_feature);
                        $('#glass' + value.id).attr('data-hasfeature', value.has_feature);
                        $('#glass' + value.id).attr('data-hasCalibration', value.has_calibration);
                    });

                    // save custome data
                    $("#email").val(email);
                    $("#phone").val(phone);
                    $("#zip_code").val(zip_code);

                    stepper1.next();
                    window.scrollTo(0, 0);
                    if(myprogress==0){

                        ++myprogress
                    }

                } else {
                    Swal.fire({
                        title: "Error!",
                        text: "No data found against the selected model, body style and year",
                        icon: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK",
                    });
                }

            },
            error: function(response) {
                Swal.fire({
                    title: "Error!",
                    text: JSON.parse(response.responseText).message,
                    icon: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                });
            },
        });
    }

    function isDoor(vector='front'){
        let glass = [];
        let glassInputs = $("input[name='glass[]']:checked");
        $('#door-scr').hide();
        $('#broken-glass-screen').hide();
        $('#calibration-service').hide();
        $('#glass_issue').val('');
        $('#Windshield_Service').val('');

        if(glassInputs.length == 0){
            Swal.fire({
                    title: "Error!",
                    text: 'Select at least one glass',
                    icon: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                });
            return false;
        }
        let door_windshiel_check = false;
        let windshield_screen_check = false;

        glassInputs.each(function() {
            let value = $(this).val();
            let dataType = $(this).data('type');
            let hasCalibration = $(this).data('hascalibration');
            if (dataType === 'door') {
                // Add 1 to the value if data-type is not 'door'
                value = parseInt(value) + 1;
                glass.push(value);
                $('#door-scr').show();

                $('#glass_issue').val('broken');
                door_windshiel_check = true;
            }
            else if(dataType === 'windshield' && hasCalibration)
            {
                $('#door-scr').show();

                $('#Windshield_Service').val('Installation Only');
                door_windshiel_check = true;
                windshield_screen_check = true
            }
        });
        // Windshield_Service //calibration hidden field name
        var stepDiv = $('.step[data-target="#test-l-3"]');
        var calibrationStepBtn = $('.calibration-step');

        if (door_windshiel_check) {

            stepper1.next();

            if (windshield_screen_check)
            {
                $('#calibration-service').show();

                if (glass.length > 0)
                {
                    // Reattach the onclick attribute to the div
                    calibrationStepBtn.attr('onclick', 'swapWindows()');

                    calibrationStepBtn.on('click', function()
                    {
                        swapWindows();

                    });



                    // Reattach the onclick attribute to the div
                    stepDiv.attr('onclick', 'swapWindows()');

                    stepDiv.on('click', function()
                    {
                        swapWindows();

                    });

                } else
                {

                    // Reattach the onclick attribute to the div
                    stepDiv.attr('onclick', 'goToStep(3)');

                    // Re-add the click event handler for the div
                    stepDiv.on('click', function() {
                        // Define the function to execute when the div is clicked (goToStep(3))
                        goToStep(3);
                    });
                }

            }
            else
            {
                $('#broken-glass-screen').show();

                // Reattach the onclick attribute to the div
                stepDiv.attr('onclick', 'goToStep(3)');

                // Re-add the click event handler for the div
                stepDiv.on('click', function() {
                    // Define the function to execute when the div is clicked (goToStep(3))
                    goToStep(3);
                });

            }



        }else{
            // Remove the onclick attribute from the div
            stepDiv.removeAttr('onclick');

            // Remove the click event handler for the div
            stepDiv.off('click');
            if(vector == 'back'){
                stepper1.previous();
                stepper1.previous();
            }else if(vector == 'front'){
                    stepper1.next();
                    getFeatures();
            }
        }
    }

    function getFeatures() {
        if(glassFeatures == 0){
            stepper1.next();
            stepper1.next();
            return;
        }

        var model = $("#car_model").val();
        var style = $("#car_body_style").val();
        var year = $("#car_year").val();
        var glasses = [];
        $.each($("input[name='glass[]']:checked"), function(key, value) {
            glasses.push($(this).val());
        });

        let other_issue = $('#other_input').val();
        $('#other_check').val(other_issue);

        var url = "{{ route('vehicle.getFeature') }}";
        $("#feature-content").empty();
        $.ajax({
            url: url,
            type: "GET",
            data: {
                glass_ids: glasses,
                model_id: model,
                style_id: style,
                year_id: year,
            },
            success: function(response) {
                // if response is not empty
                if (response.feature.length > 0) {
                    let divList = '';
                    $.each(response.feature, function(key, value) {
                        divList += '<h4 class="contact-form-title mb-7">Which one of options best describes the ' + value.name + ' feature of your car?</h4><div class="select-input adjusting-width"><input class="availability-radio-button" type="radio" name="feature[' + value.id + ']" value="null" checked><label for="basic">I\'m not sure what I have? I just need a quote for a basic <br /> ' + value.name + '! </label></div>'

                        if (value.features.length > 0) {
                            $.each(value.features, function(k, v) {
                                divList += '<div class="select-input adjusting-width"><input class="availability-radio-button" type="radio" name="feature[' + value.id + ']" value="' + v.id + '"><label for="feature[' + value.id + ']">' + v.name + '</label></div>'
                            });
                        }
                    });

                    $.each(response.product_fittings, function(key, value) {
                        let fitting = "<input type='hidden' name='fitting[]' value='" + value + "'>";
                        divList += fitting;
                    });
                    $.each(response.products, function(key, value) {
                        let product = "<input type='hidden' name='product[]' value='" + value + "'>";
                        divList += product;
                    });

                    $("#feature-content").append(divList);
                    stepper1.next();
                    window.scrollTo(0, 0);
                    if(myprogress==1){
                        ++myprogress
                    }
                } else {
                    Swal.fire({
                        title: "Error!",
                        text: "No feature found against the selected glasses",
                        icon: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK",
                    });
                }

            }
        });
    }

    function addToCart() {
        var products = [];
        var fitting = [];
        $.each($("input[name='product[]']"), function(key, value) {
            products.push($(this).val());
        });
        $.each($("input[name='fitting[]']"), function(key, value) {
            fitting.push($(this).val());
        });

        var model = $("#car_model option:selected").text();
        var style = $("#car_body_style option:selected").text();
        var year = $("#car_year option:selected").text();
        var deductible= $('#deductible').val();

        $('#deductible-cart').text('$' + deductible);


        var url = "{{ route('vehicle.addToCart') }}";
        $.ajax({
            url: url,
            type: "GET",
            data: {
                _token: "{{ csrf_token() }}",
                product_ids: products,
                fitting_ids: fitting,
                deductible: deductible
            },
            success: function(response) {
                var cart = response.cart;
                var cartSubtotal = response.cartSubtotal;
                var cartTotal = response.cartTotal;
                var cartContent = '';
                var lastSaleTransaction = response.lastSaleTransaction;

                $.each(cart, function(key, value) {
                    cartContent += '<tr class="cart_item"><td class="cart-product-name"> ' + value.name + '<strong class="product-quantity">×  ' + value.quantity + '</strong></td><td class="cart-product-total"><span class="amount">$ ' + value.row_total + '</span></td></tr>';
                });

                $('#cart-rows').html(cartContent);
                $('#subtotal').text(cartSubtotal);
                $('#total').text(cartTotal);
                $('#quote-id').html('QUOTE #:' + lastSaleTransaction);

                $('#summery-text').text(year + ', ' + model + ', ' + style);
                stepper1.next();
                window.scrollTo(0, 0);
            }
        });
    }

    function proceedToPayment(){
        let vin = $("input[name='vin']").val();
        let deductible = $("#deductible").val();

        // customer-form span class="required" need to validate
        let first_name = $("input[name='first_name']").val();
        let last_name = $("input[name='last_name']").val();
        let email = $("input[name='email']").val();
        let phone = $("input[name='phone']").val();
        let address = $("input[name='address']").val();
        let city = $("input[name='city']").val();
        let state = $("input[name='state']").val();
        let zip = $("input[name='zip']").val();

        if(first_name == '' || last_name == '' || email == '' || phone == '' || address == '' || city == '' || state == '' || zip == ''){
            Swal.fire({
                title: "Error!",
                text: "Please fill all the required fields",
                icon: "error",
                showCancelButton: false,
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK",
            });
            return false;
        }

        $('#payment_insurance').val(deductible);
        $('#payment_vin').val(vin);

        $('#billing-form').hide();
        $('#payment-form').show();
        $('#place-order').show();

    }

    function backBilling(){
        if(glassFeatures == 0){
            stepper1.previous();
            stepper1.previous();
            stepper1.previous();
            return;
        }else{
            $('#billing-form').show();
            $('#payment-form').hide();
            $('#place-order').hide();
            stepper1.previous();
        }
    }

    function swapWindows() {

        let tmpStepDiv = $('.step[data-target="#test-l-3"]');

        $('#calibration-service').hide();
        $('#broken-glass-screen').show();


        //giving break so it don't get caught in existing event
        setTimeout(assignNextevent, 1500);
        // goToStep(3);

        tmpStepDiv.on('click', function() {
             goToStep(3);
        });

    }

    function assignNextevent()
    {
        let  calibrationStepBtn = $('.calibration-step');
        calibrationStepBtn.attr('onclick', 'getFeatures()');

        // calibrationStepBtn.on('click', function()
        // {
        //     getFeatures();

        // });
    }

    function goToStep(stepNumber) {

        if(myprogress>=stepNumber){

            if(stepNumber==1 ){
                window.location='{{ url("vehicle") }}'
            }
            stepper1.to(stepNumber);
            myprogress = stepNumber;
            window.scrollTo(0, 0);
        }
    }


    function formatMobileNumber(inputValue, isBackspace) {
        var formattedValue = inputValue.replace(/\D/g, '');
        formattedValue = formattedValue.slice(0, 10);

        if (formattedValue.length > 3) {
            formattedValue = '(' + formattedValue.slice(0, 3) + ')' + formattedValue.slice(3);
        }
        if (formattedValue.length > 8) {
            formattedValue = formattedValue.slice(0, 8) + '-' + formattedValue.slice(8);
        }

        if (isBackspace && inputValue.length > formattedValue.length) {
            formattedValue = formattedValue.slice(0, -1);
        }

        return formattedValue;
    }

</script>



@endpush
