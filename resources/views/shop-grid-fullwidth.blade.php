@extends('layouts.master')
@section('title', 'Auto Glass Part')

@push('styles')

@endpush


@section('content')

        <!-- Begin Main Content Area -->
        <main class="main-content">
            <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1920x400.jpg">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-12">
                            <div class="breadcrumb-item text-night-rider">
                                <h2 class="breadcrumb-heading">Shop Layout</h2>
                                <ul>
                                    <li>
                                        <a href="index.html">Home /</a>
                                    </li>
                                    <li>Shop Grid Fullwidth</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shop-area section-space-y-axis-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-topbar">
                                <ul>
                                    <li class="page-count">
                                        <span>23</span> Product Found of <span>50</span>
                                    </li>
                                    <li class="product-view-wrap">
                                        <ul class="nav" role="tablist">
                                            <li class="grid-view" role="presentation">
                                                <a class="active" id="grid-view-tab" data-bs-toggle="tab" href="#grid-view" role="tab" aria-selected="true">
                                                    <i class="fa fa-th"></i>
                                                </a>
                                            </li>
                                            <li class="list-view" role="presentation">
                                                <a id="list-view-tab" data-bs-toggle="tab" href="#list-view" role="tab" aria-selected="true">
                                                    <i class="fa fa-th-list"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="short">
                                        <select class="nice-select rounded-0">
                                            <option value="1">Sort by Default</option>
                                            <option value="2">Sort by Popularity</option>
                                            <option value="3">Sort by Rated</option>
                                            <option value="4">Sort by Latest</option>
                                            <option value="5">Sort by High Price</option>
                                            <option value="6">Sort by Low Price</option>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content text-charcoal pt-8">
                                <div class="tab-pane fade show active" id="grid-view" role="tabpanel" aria-labelledby="grid-view-tab">
                                    <div class="product-grid-view row">
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="product-item">
                                                <div class="product-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-1-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <a class="product-name pb-1" href="single-product-variable.html">Auto Clutch & Brake</a>
                                                    <div class="price-box">
                                                        <div class="price-box-holder">
                                                            <span>Price:</span>
                                                            <span class="new-price text-primary">$120.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 pt-6 pt-md-0">
                                            <div class="product-item">
                                                <div class="product-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-2-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <a class="product-name pb-1" href="single-product-variable.html">Fuel Injector</a>
                                                    <div class="price-box">
                                                        <div class="price-box-holder">
                                                            <span>Price:</span>
                                                            <span class="new-price text-primary">$130.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 pt-6 pt-lg-0">
                                            <div class="product-item">
                                                <div class="product-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-3-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <a class="product-name pb-1" href="single-product-variable.html">A/C Compressor</a>
                                                    <div class="price-box">
                                                        <div class="price-box-holder">
                                                            <span>Price:</span>
                                                            <span class="new-price text-primary">$150.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 pt-6">
                                            <div class="product-item">
                                                <div class="product-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-4-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <a class="product-name pb-1" href="single-product-variable.html">Shock Absorbers</a>
                                                    <div class="price-box">
                                                        <div class="price-box-holder">
                                                            <span>Price:</span>
                                                            <span class="new-price text-primary">$180.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 pt-6">
                                            <div class="product-item">
                                                <div class="product-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-5-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <a class="product-name pb-1" href="single-product-variable.html">Catalytic Converter</a>
                                                    <div class="price-box">
                                                        <div class="price-box-holder">
                                                            <span>Price:</span>
                                                            <span class="new-price text-primary">$200.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 pt-6">
                                            <div class="product-item">
                                                <div class="product-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-6-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <a class="product-name pb-1" href="single-product-variable.html">Tire Pressure Gauge</a>
                                                    <div class="price-box">
                                                        <div class="price-box-holder">
                                                            <span>Price:</span>
                                                            <span class="new-price text-primary">$220.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 pt-6">
                                            <div class="product-item">
                                                <div class="product-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-7-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <a class="product-name pb-1" href="single-product-variable.html">Power Steering Fluid</a>
                                                    <div class="price-box">
                                                        <div class="price-box-holder">
                                                            <span>Price:</span>
                                                            <span class="new-price text-primary">$240.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 pt-6">
                                            <div class="product-item">
                                                <div class="product-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-8-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <a class="product-name pb-1" href="single-product-variable.html">Transmission</a>
                                                    <div class="price-box">
                                                        <div class="price-box-holder">
                                                            <span>Price:</span>
                                                            <span class="new-price text-primary">$250.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 pt-6">
                                            <div class="product-item">
                                                <div class="product-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-9-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <a class="product-name pb-1" href="single-product-variable.html">Spark Plug</a>
                                                    <div class="price-box">
                                                        <div class="price-box-holder">
                                                            <span>Price:</span>
                                                            <span class="new-price text-primary">$215.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 pt-6">
                                            <div class="product-item">
                                                <div class="product-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-10-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <a class="product-name pb-1" href="single-product-variable.html">Spare Tire</a>
                                                    <div class="price-box">
                                                        <div class="price-box-holder">
                                                            <span>Price:</span>
                                                            <span class="new-price text-primary">$190.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 pt-6">
                                            <div class="product-item">
                                                <div class="product-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-11-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <a class="product-name pb-1" href="single-product-variable.html">Engine Fan</a>
                                                    <div class="price-box">
                                                        <div class="price-box-holder">
                                                            <span>Price:</span>
                                                            <span class="new-price text-primary">$145.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 pt-6">
                                            <div class="product-item">
                                                <div class="product-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-12-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <a class="product-name pb-1" href="single-product-variable.html">Car Jack</a>
                                                    <div class="price-box">
                                                        <div class="price-box-holder">
                                                            <span>Price:</span>
                                                            <span class="new-price text-primary">$125.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-view" role="tabpanel" aria-labelledby="list-view-tab">
                                    <div class="product-list-view row">
                                        <div class="col-12">
                                            <div class="product-list-item">
                                                <div class="product-list-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-1-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-list-content">
                                                    <a class="product-name pb-2" href="single-product-variable.html">Auto Clutch & Brake</a>
                                                    <div class="price-box pb-1">
                                                        <span class="new-price">$120.00</span>
                                                    </div>
                                                    <div class="rating-box pb-2">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                    <p class="short-desc mb-0">Integer commodo ligula in lectus porttitor tempus. Integer euismod, enim ut molestie dictum, nibh lectus scelerisque tellus, a dictum sem urna vel odio. Morbi sed quam vitae leo euismod sodales ac vel lacus. Sed fermentum erat sit amet faucibus egestas. Nunc rhoncus sem in orci blandit scelerisque. Suspendisse magna tortor, aliquet non eleifend.</p>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 pt-8">
                                            <div class="product-list-item">
                                                <div class="product-list-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-2-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-list-content">
                                                    <a class="product-name pb-2" href="single-product-variable.html">Fuel Injector</a>
                                                    <div class="price-box pb-1">
                                                        <span class="new-price">$130.00</span>
                                                    </div>
                                                    <div class="rating-box pb-2">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                    <p class="short-desc mb-0">Integer commodo ligula in lectus porttitor tempus. Integer euismod, enim ut molestie dictum, nibh lectus scelerisque tellus, a dictum sem urna vel odio. Morbi sed quam vitae leo euismod sodales ac vel lacus. Sed fermentum erat sit amet faucibus egestas. Nunc rhoncus sem in orci blandit scelerisque. Suspendisse magna tortor, aliquet non eleifend.</p>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 pt-8">
                                            <div class="product-list-item">
                                                <div class="product-list-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-3-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-list-content">
                                                    <a class="product-name pb-2" href="single-product-variable.html">A/C Compressor</a>
                                                    <div class="price-box pb-1">
                                                        <span class="new-price">$150.00</span>
                                                    </div>
                                                    <div class="rating-box pb-2">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                    <p class="short-desc mb-0">Integer commodo ligula in lectus porttitor tempus. Integer euismod, enim ut molestie dictum, nibh lectus scelerisque tellus, a dictum sem urna vel odio. Morbi sed quam vitae leo euismod sodales ac vel lacus. Sed fermentum erat sit amet faucibus egestas. Nunc rhoncus sem in orci blandit scelerisque. Suspendisse magna tortor, aliquet non eleifend.</p>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 pt-8">
                                            <div class="product-list-item">
                                                <div class="product-list-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-4-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-list-content">
                                                    <a class="product-name pb-2" href="single-product-variable.html">Shock Absorbers</a>
                                                    <div class="price-box pb-1">
                                                        <span class="new-price">$180.00</span>
                                                    </div>
                                                    <div class="rating-box pb-2">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                    <p class="short-desc mb-0">Integer commodo ligula in lectus porttitor tempus. Integer euismod, enim ut molestie dictum, nibh lectus scelerisque tellus, a dictum sem urna vel odio. Morbi sed quam vitae leo euismod sodales ac vel lacus. Sed fermentum erat sit amet faucibus egestas. Nunc rhoncus sem in orci blandit scelerisque. Suspendisse magna tortor, aliquet non eleifend.</p>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 pt-8">
                                            <div class="product-list-item">
                                                <div class="product-list-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-5-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-list-content">
                                                    <a class="product-name pb-2" href="single-product-variable.html">Catalytic Converte</a>
                                                    <div class="price-box pb-1">
                                                        <span class="new-price">$200.00</span>
                                                    </div>
                                                    <div class="rating-box pb-2">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                    <p class="short-desc mb-0">Integer commodo ligula in lectus porttitor tempus. Integer euismod, enim ut molestie dictum, nibh lectus scelerisque tellus, a dictum sem urna vel odio. Morbi sed quam vitae leo euismod sodales ac vel lacus. Sed fermentum erat sit amet faucibus egestas. Nunc rhoncus sem in orci blandit scelerisque. Suspendisse magna tortor, aliquet non eleifend.</p>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 pt-8">
                                            <div class="product-list-item">
                                                <div class="product-list-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-6-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-list-content">
                                                    <a class="product-name pb-2" href="single-product-variable.html">Tire Pressure Gauge</a>
                                                    <div class="price-box pb-1">
                                                        <span class="new-price">$220.00</span>
                                                    </div>
                                                    <div class="rating-box pb-2">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                    <p class="short-desc mb-0">Integer commodo ligula in lectus porttitor tempus. Integer euismod, enim ut molestie dictum, nibh lectus scelerisque tellus, a dictum sem urna vel odio. Morbi sed quam vitae leo euismod sodales ac vel lacus. Sed fermentum erat sit amet faucibus egestas. Nunc rhoncus sem in orci blandit scelerisque. Suspendisse magna tortor, aliquet non eleifend.</p>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 pt-8">
                                            <div class="product-list-item">
                                                <div class="product-list-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-7-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-list-content">
                                                    <a class="product-name pb-2" href="single-product-variable.html">Power Steering Fluid</a>
                                                    <div class="price-box pb-1">
                                                        <span class="new-price">$240.00</span>
                                                    </div>
                                                    <div class="rating-box pb-2">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                    <p class="short-desc mb-0">Integer commodo ligula in lectus porttitor tempus. Integer euismod, enim ut molestie dictum, nibh lectus scelerisque tellus, a dictum sem urna vel odio. Morbi sed quam vitae leo euismod sodales ac vel lacus. Sed fermentum erat sit amet faucibus egestas. Nunc rhoncus sem in orci blandit scelerisque. Suspendisse magna tortor, aliquet non eleifend.</p>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 pt-8">
                                            <div class="product-list-item">
                                                <div class="product-list-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-1-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-list-content">
                                                    <a class="product-name pb-2" href="single-product-variable.html">Transmission</a>
                                                    <div class="price-box pb-1">
                                                        <span class="new-price">$250.00</span>
                                                    </div>
                                                    <div class="rating-box pb-2">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                    <p class="short-desc mb-0">Integer commodo ligula in lectus porttitor tempus. Integer euismod, enim ut molestie dictum, nibh lectus scelerisque tellus, a dictum sem urna vel odio. Morbi sed quam vitae leo euismod sodales ac vel lacus. Sed fermentum erat sit amet faucibus egestas. Nunc rhoncus sem in orci blandit scelerisque. Suspendisse magna tortor, aliquet non eleifend.</p>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 pt-8">
                                            <div class="product-list-item">
                                                <div class="product-list-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-1-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-list-content">
                                                    <a class="product-name pb-2" href="single-product-variable.html">Spark Plug</a>
                                                    <div class="price-box pb-1">
                                                        <span class="new-price">$215.00</span>
                                                    </div>
                                                    <div class="rating-box pb-2">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                    <p class="short-desc mb-0">Integer commodo ligula in lectus porttitor tempus. Integer euismod, enim ut molestie dictum, nibh lectus scelerisque tellus, a dictum sem urna vel odio. Morbi sed quam vitae leo euismod sodales ac vel lacus. Sed fermentum erat sit amet faucibus egestas. Nunc rhoncus sem in orci blandit scelerisque. Suspendisse magna tortor, aliquet non eleifend.</p>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 pt-8">
                                            <div class="product-list-item">
                                                <div class="product-list-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-1-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-list-content">
                                                    <a class="product-name pb-2" href="single-product-variable.html">Spare Tire</a>
                                                    <div class="price-box pb-1">
                                                        <span class="new-price">$190.00</span>
                                                    </div>
                                                    <div class="rating-box pb-2">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                    <p class="short-desc mb-0">Integer commodo ligula in lectus porttitor tempus. Integer euismod, enim ut molestie dictum, nibh lectus scelerisque tellus, a dictum sem urna vel odio. Morbi sed quam vitae leo euismod sodales ac vel lacus. Sed fermentum erat sit amet faucibus egestas. Nunc rhoncus sem in orci blandit scelerisque. Suspendisse magna tortor, aliquet non eleifend.</p>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 pt-8">
                                            <div class="product-list-item">
                                                <div class="product-list-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-1-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-list-content">
                                                    <a class="product-name pb-2" href="single-product-variable.html">Engine Fan</a>
                                                    <div class="price-box pb-1">
                                                        <span class="new-price">$145.00</span>
                                                    </div>
                                                    <div class="rating-box pb-2">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                    <p class="short-desc mb-0">Integer commodo ligula in lectus porttitor tempus. Integer euismod, enim ut molestie dictum, nibh lectus scelerisque tellus, a dictum sem urna vel odio. Morbi sed quam vitae leo euismod sodales ac vel lacus. Sed fermentum erat sit amet faucibus egestas. Nunc rhoncus sem in orci blandit scelerisque. Suspendisse magna tortor, aliquet non eleifend.</p>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 pt-8">
                                            <div class="product-list-item">
                                                <div class="product-list-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="assets/images/product/medium-size/shop/1-1-290x350.jpg" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-list-content">
                                                    <a class="product-name pb-2" href="single-product-variable.html">Car Jack</a>
                                                    <div class="price-box pb-1">
                                                        <span class="new-price">$125.00</span>
                                                    </div>
                                                    <div class="rating-box pb-2">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                    <p class="short-desc mb-0">Integer commodo ligula in lectus porttitor tempus. Integer euismod, enim ut molestie dictum, nibh lectus scelerisque tellus, a dictum sem urna vel odio. Morbi sed quam vitae leo euismod sodales ac vel lacus. Sed fermentum erat sit amet faucibus egestas. Nunc rhoncus sem in orci blandit scelerisque. Suspendisse magna tortor, aliquet non eleifend.</p>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-like"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-tippy="Add to compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-shuffle"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pagination-area pt-10">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">&laquo;</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">&raquo;</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Main Content Area End Here -->

        @endsection

    @push('scripts')

@endpush

        