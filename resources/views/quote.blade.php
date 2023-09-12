@extends('layouts.master')
@section('title', 'Autoglass depot') @push('styles')
 <link href="{{ asset('css/custom-styles.css') }}" rel="stylesheet">
 <style>
        .myniceselect  .myniceselect{
            display:none !important
        }
        .country-select div{
            display:none !important
        }
    </style>
@endpush 

@section('content')

<!-- Begin Main Content Area -->
<main class="main-content">
           
           
            <div class="checkout-area section-space-y-axis-100">
                <div class="container quotes-main-div">
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-accordion">
                               
                                <h3 style="color: white;font-size: 25px;background: #f44336;text-align: center;" class="h3-div-quote-id">QUOTE #:	614758</h3>
                                
                               
                            </div>
                            <div class="coupon-accordion">
                                            <h3 style="color: white;font-size: 25px;background: #f44336;text-align: center;" class="h3-div-quote-id note-quote-heading">Note  <marquee  Scrollamount=10  direction="left"
                 loop=""  style="margin-left: 24px;">You can take an appointment in between <span>8:00 </span>to<span> 12:00 </span>AM and <span>1:00</span> to <span>5:00 </span>PM   and  you can send <span>3</span> Request per day</marquee></h3>
                                        </div>
                    </div> 
                        </div>

                       
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <form action="javascript:void(0)">
                                <div class="checkbox-form">
                                    <h3 style="color: #283a5e;">Choose Date and Time</h3>

                                    <div class="date-and-time-picker">
                                    <label class="date-and-time-picker-label">Select Date For Service</label>
                                    <input style="width: 100%;height: 43px;padding: 0px 14px;border-radius: 4px;border: 1px solid #dee2e6;" type="date"   value="2023-06-01">
                                    </div>

                                    <div class="date-and-time-picker" style="margin-top:30px">
                                    <label class="date-and-time-picker-label">Select Date For Service</label>
                                    <input style="width: 100%;height: 43px;padding: 0px 14px;border-radius: 4px;border: 1px solid #dee2e6;" type="time"  value="12:00">
                                    </div>

                                    <div class="checkbox-form">
                                    <h3>Billing Details</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="country-select clearfix">
                                                <label>Country <span class="required">*</span></label>
                                                <select class="myniceselect nice-select wide">
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="uk">London</option>
                                                    <option value="rou">Romania</option>
                                                    <option value="fr">French</option>
                                                    <option value="de">Germany</option>
                                                    <option value="aus">Australia</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>First Name <span class="required">*</span></label>
                                                <input placeholder="" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Last Name <span class="required">*</span></label>
                                                <input placeholder="" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Company Name</label>
                                                <input placeholder="" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Address <span class="required">*</span></label>
                                                <input placeholder="Street address" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Town / City <span class="required">*</span></label>
                                                <input type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>State / County <span class="required">*</span></label>
                                                <input placeholder="" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Postcode / Zip <span class="required">*</span></label>
                                                <input placeholder="" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Email Address <span class="required">*</span></label>
                                                <input placeholder="" type="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Phone <span class="required">*</span></label>
                                                <input type="text">
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                                            <div class="checkout-form-list">
                                                                <label>Town / City <span class="required">*</span>
                                                                </label>
                                                                <input type="text">
                                                            </div>
                                                        </div>
                                        <div class="col-md-12">
                                            
                                            <div class="order-notes">
                                            <div class="checkout-form-list checkout-form-list-2">
                                                <label>Order Notes</label>
                                                <textarea id="checkout-mess" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                            </div>
                                        </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                </div>
                            </form>
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
                                        <tbody>
                                            <tr class="cart_item">
                                                <td class="cart-product-name"> Vestibulum suscipit<strong class="product-quantity">
                                                    × 1</strong></td>
                                                <td class="cart-product-total"><span class="amount">$165.00</span></td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="cart-product-name"> Vestibulum suscipit<strong class="product-quantity">
                                                    × 1</strong></td>
                                                <td class="cart-product-total"><span class="amount">$165.00</span></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">$215.00</span></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">$215.00</span></strong></td>
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
                                                        <a href="#" class="" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true">
                                                        Summary
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                                                    <div class="card-body">
                                                        <p class="summary-details">2020, Audi S3, 4 Door Sedan <br/>
                                                        Byron, IL 61010</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="#payment-2">
                                                    <h5 class="panel-title">
                                                        <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false">
                                                        Choosen date & time
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>Saturday, August 05, 2023</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="#payment-3">
                                                    <h5 class="panel-title">
                                                        <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false">
                                                        Includes
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                                                    <div class="card-body">
                                                        <p class="summary-details">Mobile SERVICE <br/>
                                                         Glass Clean Up<br/>
                                                          Glass Disposal <br/>
                                                           Lifetime Warranty</p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="order-button-payment">
                                            <input value="Place order" type="submit">
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



@endsection

@push('scripts')

@endpush


