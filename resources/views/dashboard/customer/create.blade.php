@extends('dashboard.layouts.master')

@section('title', 'Autoglass depot')@push('styles')
<style>
    .full-amount-div {
        width: 100%;
        height: 200px;

        text-align: end;
        display: flex;
        justify-content: end;

    }

    .full-amount-div ul li {
        height: 40px;
        /* align-self: center; */
        padding-top: 9px;
        border-top: 1px solid;
        display: flex;
        justify-content: space-between;
        margin-top: 3px;
        width: 271px;
        font-weight: bolder;
    }

    .full-amount-div ul li span {
        font-weight: 400;
    }

    /* .my-search-table tr th,td{
                            border: 1px solid;
                            text-align: center;
                            } */

    .hover:hover {
        cursor: pointer;
    }

    .my-search-button-table th,
    tr {
        font-size: 13px;
        text-align: center;
    }

    .my-search-button-table thead {
        border-bottom: 2px solid #d8dbe0;
        border-top: 2px solid #d8dbe0;
        background: white
    }

    .background-body-color {
        background-color: rgba(0, 0, 21, .05);
    }

    .my-search-button-table button {
        margin-top: 5px;
        font-size: 13px;
        padding: 8px;

    }

    .my-search-button-table button img {
        width: 15px;
        height: 15px;
    }


    .border-class {
        border: 1px solid #d8dbe0;
    }

    .padding-class {

        border-radius: 0.25rem;
        padding: 40px !important;
    }

    .wrapper {
        background-color: white !important
    }

    .my-first-box {
        position: absolute;
        top: 113%;
        left: 25% !important;

    }

    .my-second-box {
        position: absolute;
        top: 113%;
        left: 72% !important;
    }

    .border-bottom-none::before {
        display: none;
        padding-bottom: 0px !important;
        margin-bottom: 0px !important;
    }

    .my-new-navbar-first-list img {
        animation: get-a-quote-btn-icon-div 1s infinite;
        box-shadow: 0 0 0 2em transparent;
        border-radius: 50%;
    }
</style>
@endpush

@section('content')


<form method="POST" action="{{ route('dashboard.customer.store') }}">
    @csrf
    <button style="margin-left:50px" class="btn btn-primary btn-sm">Create Customer <i class="bi bi-check"></i></button>

    <section class="content">
        <div class="padding-class">
            <div style="background:white;padding:20px;border-radius:6px" class="border-class">
                <!-- Row -->
                <div class="row row-sm">
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <p class="mg-b-10">Customer Name </p>
                            <input type="text" name="name" class="form-control" placeholder="Enter customer name"
                                value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <p class="mg-b-10">Contact Person </p>
                            <input type="text" name="contact_person" class="form-control"
                                placeholder="Enter contact person" value="{{ old('contact_person') }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <p class="mg-b-10">Email </p>
                            <input type="text" name="email" placeholder="Enter email" class="form-control"
                                value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <p class="mg-b-10">Customer Type </p>
                            <select class="form-control " name="customer_Type_id">
                                <option selected="true" disabled>
                                    Select customer type
                                </option>

                                @forelse ($customerTypes as $customerType)
                                    <option value="{{ $customerType->id }}"
                                        {{ old('customer_Type_id') === $customerType->id ? 'selected' : '' }}>
                                        {{ $customerType->name }}
                                    </option>
                                @empty
                                    <option selected="true" disabled>
                                        No Data Available
                                    </option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row row-sm">
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <p class="mg-b-10">Phone </p>
                            <input type="text" name="phone" class="form-control" placeholder="Enter ohone number"
                                value="{{ old('phone') }}" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <p class="mg-b-10">Phone (Alternative) </p>
                            <input type="text" name="phone_alternative" placeholder="Enter phone alternative"
                                class="form-control" value="{{ old('phone_alternative') }}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <p class="mg-b-10">Fax </p>
                            <input type="text" name="fax" placeholder="Enter fax" class="form-control"
                                value="{{ old('fax') }}">
                        </div>
                    </div>
                </div>

                <div class="row row-sm">
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <p class="mg-b-10">Discount Type</p>
                            <select class="form-control" name="discount_Type" id="discountType">
                                <option selected>None</option>
                                <option value="discount_in_rate">Discount in
                                    rates</option>
                                <option value="discount_in_percentage">
                                    Discount in percentages</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3" id="discountField">
                        <div class="form-group">
                            <p class="mg-b-10">Discount </p>
                            <div class="input-group">
                                <input type="number" name="discount" class="form-control" aria-label="Discount">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="discountSuffix"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <p class="mg-b-10">State </p>
                            <input type="text" name="state" placeholder="Enter state" class="form-control"
                                value="{{ old('state') }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <p class="mg-b-10">City </p>
                            <input type="text" name="city" placeholder="Enter city" class="form-control"
                                value="{{ old('city') }}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 d-none">
                        <div class="form-group">
                            <p class="mg-b-10">Country </p>
                            <input type="text" name="country" placeholder="Enter country" class="form-control"
                                value="{{ old('country') }}">
                        </div>
                    </div>
                </div>

                <div class="row row-sm">
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group mb-0">
                            <p class="mg-b-10">Billing Address </p>
                            <textarea class="form-control" name="billing_address" placeholder="Enter billing address" rows="4">{{ old('billing_address') }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group mb-0">
                            <p class="mg-b-10">Service Address </p>
                            <textarea class="form-control" name="service_address" placeholder="Enter service address" rows="4">{{ old('service_address') }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group mb-0">
                            <p class="mg-b-10">Notes </p>
                            <textarea class="form-control" name="note" placeholder="Enter note" rows="4">{{ old('note') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- End Row -->


                `


            </div>
            <!-- End Row -->

        </div>

        </div>

        </div>
        </div>
        </div>
        </div>


        </div>


        </div>
        </div>

    </section>

</form>
<script>
    var discountType = document.getElementById('discountType');
    var discountField = document.getElementById('discountField');
    var discountSuffix = document.getElementById('discountSuffix');
    var discountInput = document.querySelector('input[name="discount"]');

    discountType.addEventListener('change', function() {
        if (discountType.value === 'discount_in_percentage') {
            discountField.style.display = 'block';
            discountSuffix.textContent = '%';
            discountInput.placeholder = '0.00';
        } else if (discountType.value === 'discount_in_rate') {
            discountField.style.display = 'block';
            discountInput.placeholder = '$0.00';
            discountSuffix.textContent = '';

        } else {
            discountField.style.display = 'none';
            discountSuffix.textContent = '';
            discountInput.placeholder = '';
        }
    });
    // Hide the discount field if "None" is selected initially
    window.addEventListener('DOMContentLoaded', function() {
        if (discountType.value === 'None') {
            discountField.style.display = 'none';
            discountSuffix.textContent = '';
        }
    });
</script>

@endsection

@push('scripts')
@endpush
