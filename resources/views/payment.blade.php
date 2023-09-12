@extends('layouts.master')
@section('title', 'Autoglass depot')@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<style>
    .myniceselect  .myniceselect{
            display:none !important
        }
        .country-select div{
            display:none !important
        }

        .bs-stepper-content button{
            font-size: 14px;
            border-radius:6px !important;
            border-width: 0;
            border-style: solid;
            border-color: transparent;
            line-height: 1.42857;
            transition: box-shadow .5s ease;
            box-shadow: 0 0 0 5px rgba(0,0,0,0);
            text-align: center;
            background-color:  #ed5217 !important;
            color: #fff;
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
                        <h2 class="breadcrumb-heading">Checkout Page</h2>
                        <ul>
                            <li>
                                <a  href="{{ route('index') }}" >Home/</a>
                            </li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="checkout-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @guest
                    <div class="coupon-accordion">
                        <h3 style="color: #283a5e;">Returning customer? <span id="showlogin">Click here to login</span></h3>
                        <div id="checkout-login" class="coupon-content">
                            <div class="coupon-info">
                                <p class="coupon-text mb-1">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est
                                    sit amet ipsum luctus.</p>
                                <form action="{{route('customer.login.process')}}" method="post">
                                    @csrf
                                    <p class="form-row-first">
                                        <label class="mb-1">email <span class="required">*</span></label>
                                        <input type="email" name="email" required>
                                    </p>
                                    <p class="form-row-last">
                                        <label>Password <span class="required">*</span></label>
                                        <input type="password" name="password" required>
                                    </p>
                                    <p class="form-row">
                                        <input type="checkbox" name="remember" value="1" id="remember_me">
                                        <label for="remember_me">Remember me</label>
                                    </p>
                                    <button class="btn btn-custom-size lg-size btn-primary logn-signup-btn" type="submit">Login</button>
                                    <p class="lost-password"><a href="#">Lost your password?</a></p>
                                </form>
                            </div>
                        </div>
                        {{-- <h3 style="color: #283a5e;">Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                        <div id="checkout_coupon" class="coupon-checkout-content">
                            <div class="coupon-info">
                                <form action="javascript:void(0)">
                                    <p class="checkout-coupon">
                                        <input placeholder="Coupon code" type="text">
                                        <input class="coupon-inner_btn" value="Apply Coupon" type="submit">
                                    </p>
                                </form>
                            </div>
                        </div> --}}
                    </div>
                    @endguest
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div id="checkout_form">
                        <div class="checkbox-form">
                            <div class="checkbox-form" id="billing-detail">
                                <h3 style="color:black">Billing Details</h3>
                                <div class="row">
                                    {{-- <div class="col-md-12">
                                        <div class="country-select clearfix">
                                            <label>Country <span class="required">*</span></label>
                                            <select class="myniceselect nice-select wide" name="country">
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="uk">London</option>
                                                <option value="rou">Romania</option>
                                                <option value="fr">French</option>
                                                <option value="de">Germany</option>
                                                <option value="aus">Australia</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>First Name <span class="required">*</span></label>
                                            <input placeholder="" type="text" name="name[]" id="first_name" @auth value="" readonly @endauth>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Last Name <span class="required">*</span></label>
                                            <input placeholder="" type="text" name="name[]" id="last_name" @auth value="" readonly @endauth>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Company Name</label>
                                            <input placeholder="" type="text" name="company">
                                        </div>
                                    </div> --}}
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Address <span class="required">*</span></label>
                                            <input placeholder="Street address" type="text" name="address[]" @auth  value="{{ auth()->user()->customer->billing_address }}" readonly @endauth>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <input placeholder="Apartment, suite, unit etc. (optional)" type="text" name="address[]">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Town / City <span class="required">*</span></label>
                                            <input type="text" name="city" @auth  value="{{ auth()->user()->customer->city }}" readonly @endauth>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>State<span class="required">*</span></label>
                                            <input placeholder="" type="text" name="state" @auth  value="{{ auth()->user()->customer->state }}" readonly @endauth>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Postcode / Zip <span class="required">*</span></label>
                                            <input placeholder="" type="text" name="zip_code">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Email Address <span class="required">*</span></label>
                                            <input placeholder="" type="email" name="email" id="ship_email" @auth  value="{{ auth()->user()->email }}" readonly @endauth>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Phone <span class="required">*</span></label>
                                            <input type="text" name="phone" @auth  value="{{ auth()->user()->customer->phone }}" readonly @endauth>
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

                            <div class="checkbox-form" id="shipping-detail" style="display: none;">
                                <h3 style="color:black">Shipping Details</h3>
                                <div class="row">
                                    <div class="col-md-12 pickup-div">
                                        <div class="country-select clearfix">
                                            <label>Pickup Locations <span class="required">*</span></label>
                                            <select class="myniceselect nice-select wide" name="pickup_location_id" id='pickup'>
                                                <option value="">Select Pickup Location</option>
                                                @foreach ($pickupLocations as $pickup_location)
                                                    <option value="{{ $pickup_location->id }}">{{ $pickup_location->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 shipping-div">
                                        <div class="country-select clearfix">
                                            <label>Select Shipping Provider<span class="required">*</span></label>
                                            <select class="myniceselect nice-select wide" name="shipping_provider" id="shipping_provider">
                                                <option value="">Select Provider</option>
                                                @if(Config::get('fedex.is_active'))
                                                    <option value="Fedex">Fedex</option>
                                                @endif
                                                @if(Config::get('ups.is_active'))
                                                    <option value="UPS">UPS</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 shipping-div">
                                        <div class="country-select clearfix">
                                            <label>Select Shipping Type<span class="required">*</span></label>
                                            <select class="myniceselect nice-select wide" name="shipping_type" id="shipping_type">
                                                <option value="">Select Shipping Type</option>
                                                <option value="ground">Ground</option>
                                                <option value="expedited">Same Day</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-lg-12 col-12" id="payment-detail" style="display: none;">
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

                            <input type="hidden" name="payment_log" id="payment_log">
                            <input type="hidden" name="payment_success" id="payment_success" value="false">
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
                                <tbody>
                                    @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                        <tr class="cart_item">
                                            <td class="cart-product-name"> {{ $details['name'] }}<strong class="product-quantity">
                                                × {{ $details['quantity'] }}</strong></td>
                                            <td class="cart-product-total"><span class="amount">${{ $details['row_total'] }}</span></td>
                                        @endforeach
                                    @else
                                        <tr><td colspan="2">No items in cart</td></tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Cart Subtotal</th>
                                        <td><span class="amount">${{ session('cartSubtotal') ?? 0.00 }}</span></td>
                                    </tr>
                                    <tr class="cart-shipping" style="{{ session('shipping_rate') ?? 'display:none' }}">
                                        <th>Shipping Cost</th>
                                        <td><span class="amount" id="ship_rate">{{ session('shipping_rate') ?? 0.00 }}</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Order Total</th>
                                        <td><strong><span class="amount" id="total">{{ session('cartTotal') ?? 0.00 }}</span></strong></td>
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
                                            @if(session('cart'))
                                                @foreach(session('cart') as $id => $details)
                                                    <p class="summary-details">- {{ $details['name'] }}</p>
                                                @endforeach
                                            @else
                                                <tr><td colspan="2">No items in cart</td></tr>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-button-payment" id="submit-billing-div">
                                    <input value="Proceed to Shippment" type="button" id="submit_billing">
                                </div>

                                <div class="order-button-payment" id="submit-payment-div" style="display: none;">
                                    <input value="Proceed To Payment" type="button" id="submit_payment">
                                </div>

                                <div class="order-button-payment" id="submit-checkout-div" style="display: none;">
                                    <input value="Place order" type="button" id="cash_checkout">
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

    <script src="https://js.stripe.com/v3/"></script>
    @if(Config::get('paypal.is_active'))
        <script src="https://www.paypal.com/sdk/js?client-id={{ Config::get('paypal.client') }}"></script>
    @endif

    <script>
        const stripe = Stripe("{{ Config::get('stripe.key') }}");
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    </script>

    <script src="./assets/js/stripe-checkout.js"></script>

    <script>
        $(document).ready(function(){

            @auth
                var name = "{{ auth()->user()->name }}";
                var names = name.split(' '); // Split the name into an array of first and last name
                if (names.length >= 2) {
                    var firstName = names[0];
                    var lastName = names.slice(1).join(' ');
                    // Populate the input fields with the first and last names
                    document.getElementById('first_name').value = firstName;
                    document.getElementById('last_name').value = lastName;
                }
            @endauth


            $('#cash_checkout').on('click', function(){
                postPayment();
            });

            $('#submit_billing').on('click', function(){

                // validate address field
                let firstname = $('#first_name').val();
                let lastname = $('#last_name').val();
                
                let address = [];
                $('input[name="address[]"]').each(function(){
                    address.push($(this).val());
                });
                
                let city = $('input[name="city"]').val();
                let state = $('input[name="state"]').val();
                let zip_code = $('input[name="zip_code"]').val();
                let email = $('#ship_email').val();
                let phone = $('input[name="phone"]').val();

                if(firstname == '' || lastname == '' || address.length == 0 || city == '' || state == '' || zip_code == '' || email == '' || phone == ''){
                    Swal.fire({
                        title: "Error!",
                        text: 'Please fill all the required fields',
                        icon: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK",
                    });
                    return false;
                }
                

                // after validation ajax call to get shipping rate
                let url = "{{ route('shipment.ups.validateAddress') }}";
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        firstname: firstname,
                        lastname: lastname,
                        address: address,
                        city: city,
                        state: state,
                        zip_code: zip_code,
                        email: email,
                        phone: phone,
                    },
                    success: function(response){
                        if(response.status == 200){
                            $('#billing-detail').hide();
                            $('#shipping-detail').show();
                            getGlassType();
                        }else{
                            let errorMessage = '';
        
                            if (response.error) {
                                response.error.forEach(function(error) {
                                    errorMessage += error.message + '\n';
                                });
                            }

                            Swal.fire({
                                title: "Error!",
                                text: errorMessage,
                                icon: "error",
                                showCancelButton: false,
                                confirmButtonColor: "#3085d6",
                                confirmButtonText: "OK",
                            });

                            return false;
                        }
                    },
                    error: function(response){
                        Swal.fire({
                            title: "Error!",
                            text: 'Error in validating address, try again later',
                            icon: "error",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK",
                        });

                        return false;
                    }
                });
            });

            $('#submit_payment').on('click', function(){
                $('#shipping-detail').hide();
                $('#payment-detail').show();
            });

            $('.payment_method_input').on('click', function() {
                var payment_method = $(this).val();
                if(payment_method == 'card' || payment_method == 'paypal'){
                    $('#submit-payment-div').hide();
                    showPaymentForm();
                    renderPayPalButton();
                }else{
                    $('#submit-payment-div').show();
                }
            });
        });

        function getGlassType(){
            var url = "{{ route('product.glassType') }}";
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response){
                        console.log(response);
                        if(response.allowed_pickup > 0){
                            $('.pickup-div').show();
                            $('.shipping-div').hide();
                            $('#pickup').prop('required', true);
                        }else if(response.allowed_ship > 0){
                            $('.shipping-div').show();
                            $('.pickup-div').hide();
                            $('#shipping_provider').prop('required', true);
                            $('#shipping_type').prop('required', true);
                        }
                        $('#total').empty();
                        $('#total').text(response.total);
                        if(response.shipping_rate > 0){
                            $('#ship_rate').empty();
                            $('#ship_rate').text(response.shipping_rate);
                            $('.cart-shipping').show();
                        }
                        $('#submit-billing-div').hide();
                        $('#submit-payment-div').show();
                    },
                    error: function(response){
                        Swal.fire({
                            title: "Error!",
                            text: 'Error in getting glass type, try again later',
                            icon: "error",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK",
                        });
                    }
                });
        }

        function postPayment(payment_log = null, payment_success = false) {
            
            // var form = $('#checkout_form');

            // if(payment_log != null){
            //     payment_log = JSON.stringify(payment_log);
            // }

            // $('#payment_log').val(payment_log);
            // $('#payment_success').val(payment_success);

            // var data = form.serialize();

            var name = [];
            $.each($("input[name='name[]']"), function() {
                name.push($(this).val());
            });

            var address = [];
            $.each($("input[name='address[]']"), function() {
                address.push($(this).val());
            });

            var data = {
                _token: "{{ csrf_token() }}",
                name: name,
                address: address,
                city: $('input[name="city"]').val(),
                state: $('input[name="state"]').val(),
                zip_code: $('input[name="zip_code"]').val(),
                email: $('#ship_email').val(),
                phone: $('input[name="phone"]').val(),
                note: $('#checkout-mess').val(),
                payment_method: $('input[name="payment_method"]:checked').val(),
                payment_log: JSON.stringify(payment_log),
                payment_success: payment_success,
                shipping_provider: $('#shipping_provider').val(),
                shipping_type: $('#shipping_type').val(),
                pickup_location_id: $('#pickup').val(),
            };

            $.ajax({
                url: "{{ route('payment.store') }}",
                type: 'POST',
                data: data,
                success: function(response){
                    Swal.fire({
                        title: "Thank you!",
                        text: "order placed successfully",
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
                error: function(response){
                    Swal.fire({
                        title: "Error!",
                        text: JSON.parse(response.responseText)['message'],
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
            // empty the container before re-rendering it
            $('#paypal-button-container').empty();
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
    </script>
@endpush


