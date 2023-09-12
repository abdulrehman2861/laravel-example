@extends('layouts.master')
@section('title', 'Autoglass depot')@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
<style>
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
        height: 54px;
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

    .my-new-btn img {
        height: 85%
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

    .product-img .img-full {
        height: 100% !important;
    }

    /* Style the sidebar */
    .sidebar {
        height: 100%;
        width: 250px;
        position: fixed;
        top: 0;
        left: -100%;
        padding-top: 20px;
        background-color: #f5f5f5;
        transition: left 0.3s;
        width: 100%;
        background: rgba(0, 0, 0, .3);
        z-index: 1;
    }

    /* Show the sidebar when active class is applied */
    .sidebar.active {
        left: 0;
    }

    /* Style the content */
    .content {
        padding: 20px;
        margin-left: 20px;
    }

    /* Add a button to toggle the sidebar */
   

    .responsive-vehicle-select {
        height: 94px;
        color: white;
        border: none;
        font-size: 30px;
        border-radius: 92px;
        padding: 0px;
        margin: 0px auto;
        margin-top: 100px;
        font-family: 'Josefin Sans', sans-serif;
        background: #ed5217;
        width: 95%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        display: none;
        position: relative;
        top: 5px;

    }

    .sider-bar-responsive-content {
        width: 300px;
        height: 100%;
        background-color: #ffffff;
        position: absolute;
        overflow: scroll;
        top: 0px;
    }
    .sider-bar-responsive-content h1{
        text-align: center;
    font-size: 25px;
    margin-top: 24px;
    }
    .sider-bar-responsive-content h5{
        text-align: center;
    font-size: 20px;
    margin-top: 26px;
    }
    .sider-bar-responsive-content button{
        height: 42px;
    margin-bottom: 10px;
    border: none;
    margin-left: 22px;
    width: 84%;
    color: white;
    background: #ed5217;
    font-size: 21px;
    }
    .sider-bar-responsive-content ul{
        padding: 20px;
    }
    .sider-bar-responsive-content ul li select{
        width: 100%;
    height: 50px;
    margin-bottom: 10px;
    padding: 0px 10px;
    border: 1px solid #e0e0e0;

    }

    @media (min-width: 0px) and (max-width: 999px) {
        .responsive-vehicle-select {
            display: flex;
        }
        .shop-area{
            margin-top: 0px !important;
            padding-top: 0px !important;
        }

        .text-charcoal{
            margin-top: 0px;
        }
    }

    .responsive-vehicle-select img {
        animation: get-a-quote-btn-icon-div 1s infinite;
        box-shadow: 0 0 0 2em transparent;
        border-radius: 50%;
    }

    .main-content {
        text-align: center;
    }
</style>
@endpush


@section('content')
<!-- Begin Main Content Area -->
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/banner/whatimg.jpeg">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item text-night-rider">
                        <h2 class="breadcrumb-heading">Shop Layout</h2>
                        <ul>
                            <li>
                                <a href="{{ route('index') }}">Home /</a>
                            </li>
                            <li>Shop Default</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button  class="responsive-vehicle-select sidebarToggle"><img src="/assets/images/product/large-size/sport-car.png" style="margin-left: 22px;font-size: 18px;"> Select Your Vehicle <img src="/assets/images/product/large-size/finder.png" style="margin-right: 22px;font-size: 18px;"></button>



    <div class="shop-area section-space-y-axis-100 shopping-cart-bg-color">
        <div class="drop-down-nav">
            <div class="row center-div">

                <livewire:website.product.product-list />

            </div>
        </div>
    </div>
</main>
<!-- Main Content Area End Here -->



<!-- Begin Modal Area -->
<div class="modal quick-view-modal fade" id="quickModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="quickModal" aria-hidden="true" style="padding-top:30px">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="product_detail">

            </div>
        </div>
    </div>
</div>
<!-- Modal Area End Here -->




<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar " id="sidebar" onclick="closeBar()">
        <div class="sider-bar-responsive-content">
            <h5>Select Vehicle</h5>
            <ul>
                <li>
                    <select>
                        <option>year</option>
                        <option>2023</option>
                        <option>2022</option>
                        <option>2021</option>
                        <option>2022</option>

                    </select>
                </li>
                <li>
                    <select>
                    <option>Select Make</option>
                        <option>2023</option>
                        <option>2022</option>
                        <option>2021</option>
                        <option>2022</option>
                    </select>
                </li>
                <li>
                    <select>
                        <option>Select Model</option>
                        <option>year</option>
                        <option>2023</option>
                        <option>2022</option>
                        <option>2021</option>
                        <option>2022</option>
                    </select>
                </li>
                <li>
                    <select>
                    <option>Select Body Style</option>
                        <option>year</option>
                        <option>2023</option>
                        <option>2022</option>
                        <option>2021</option>
                        <option>2022</option>
                    </select>
                </li>
                <li>
                    <select>
                    <option>Select Glass</option>
                        <option>year</option>
                        <option>2023</option>
                        <option>2022</option>
                        <option>2021</option>
                        <option>2022</option>
                    </select>
                </li>
                <li>
                    <select>
                    <option>Select Features</option>
                        <option>year</option>
                        <option>2023</option>
                        <option>2022</option>
                        <option>2021</option>
                        <option>2022</option>
                    </select>
                </li>

            </ul>

            <button>Find Vehicle</button>
        </div>
    </div>






</div>

@endsection

@push('scripts')




<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script src="/assets/js/plugins/swiper-bundle.min.js"></script>

<script>
    // on click view_product btn
    $(document).on('click', '.view-product', function() {
        var product_id = $(this).attr('id');
        $.ajax({
            url: "/product/quick-view/" + product_id,
            method: "GET",
            success: function(data) {
                $('#product_detail').html(data);
                $('#quickModal').modal('show');

                // Reload scripts
                $.getScript("https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js");
                $.getScript("/assets/js/plugins/swiper-bundle.min.js");
            }
        });
    });

     // JavaScript to handle sidebar toggle
     $(document).ready(function() {
        $(".sidebarToggle").click(function() {
            $("#sidebar").toggleClass("active");
        });
    });

   function closeBar(){
    $("#sidebar").toggleClass("active");

   }

    // on click add to cart btn
    $(document).on('click', '.add-to-cart', function() {
        var product_id = $(this).attr('id');
        var fitting_id = $(this).attr('data-fitting');
        var qty = $('#qty').val();
        $.ajax({
            url: "/add-to-cart/" + product_id + "/" + fitting_id,
            method: "GET",
            data: {
                qty: qty
            },
            success: function(data) {
                window.location.href = "/shopingcart";
            }
        });
    });
</script>

@endpush