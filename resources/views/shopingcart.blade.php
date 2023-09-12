@extends('layouts.master')
@section('title', 'Auto Glass Part')

@push('styles')

@endpush

@section('content')

 <!-- Begin Main Content Area -->
 <main class="main-content">
 <section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>Cart Page</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li>Cart</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
            <div class="cart-area section-space-y-axis-100 shopping-cart-bg-color">
                <div class="container">
                    <div class="row">
                        <div class="col-12 shopping-responsive" >
                            <form action="{{ route('shopingCart.updateCart') }}" method="POST">
                                @csrf
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="product_remove">remove</th>
                                                <th class="product-thumbnail">images</th>
                                                <th class="cart-product-name">Product</th>
                                                <th class="product-price">Unit Price</th>
                                                <th class="product-quantity">Quantity</th>
                                                <th class="product-subtotal">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(session('cart'))
                                                @foreach(session('cart') as $id => $details)
                                                    <tr>
                                                        <td class="product_remove">
                                                            <a href="{{ route('shopingCart.deleteCart', [$id]) }}">
                                                            <img style="height:30px" src="/assets/images/service-details/delete-icon.png">
                                                            </a>
                                                        </td>
                                                        <td class="product-thumbnail shoping-cart-img-height">
                                                            <a href="#">
                                                                <img style="max-width: 92px;" src="{{ $details['image'] ?? url('assets/images/product/large-size/glass--1.png') }}" alt="Cart Thumbnail">
                                                            </a>
                                                        </td>
                                                        <td class="product-name"><a href="#">{{ $details['name'] }}</a></td>
                                                        <td class="product-price"><span class="amount">${{ $details['unit_price'] }}</span></td>
                                                        <td class="quantity">
                                                            <div class="cart-plus-minus">
                                                                <input class="cart-plus-minus-box" value="{{ $details['quantity'] }}" type="text" name="quantity[]">
                                                                <input type="hidden" name="id[]" value="{{ $id }}">
                                                                <div class="dec qtybutton">
                                                                    <i class="fa fa-minus"></i>
                                                                </div>
                                                                <div class="inc qtybutton">
                                                                    <i class="fa fa-plus"></i>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="product-subtotal"><span class="amount">${{ $details['row_total'] }}</span></td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6" style="text-align:center">No Product in Cart</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-all">
                                            {{-- <div class="coupon">
                                                <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                                <input class="button mt-xxs-30" name="apply_coupon" value="Apply coupon" type="submit">
                                            </div> --}}
                                            <div class="coupon2">
                                                <input class="button" id="updateCart" name="update_cart" value="Update cart" type="submit" onclick="window.location='{{ url("shop") }}'">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <h2>Cart totals</h2>
                                            <ul>
                                                <li>Subtotal <span>${{ session('cartSubtotal') ?? 0.00 }}</span></li>
                                                <li>Total <span>${{ session('cartTotal') ?? 0.00 }}</span></li>
                                            </ul>
                                            <a  href="{{ route('payment.create') }}">Proceed to checkout</a>
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

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Increment quantity
            $(document).on('click', '.qtybutton.inc', function() {
                var input = $(this).prev('.cart-plus-minus-box');
                var newValue = parseInt(input.val()) + 1;
                input.val(newValue);
            });

            // Decrement quantity
            $(document).on('click', '.qtybutton.dec', function() {
                var input = $(this).next('.cart-plus-minus-box');
                var newValue = parseInt(input.val()) - 1;
                if (newValue >= 1) {
                    input.val(newValue);
                }
            });
        });
    </script> --}}

@endpush