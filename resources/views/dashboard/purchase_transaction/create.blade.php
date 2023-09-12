@extends('dashboard.layouts.master')
@section('title', 'Auto Glass depo')

@push('styles')
    <style>
        label:not(.form-check-label):not(.custom-file-label) {
            font-weight: 400 !important
        }
    </style>
@endpush

@section('content')
    <div style="padding:20px">


        <div class="container-fluid mb-4">

            <div class="row">
                <div class="col-12">
                    <div class="position-relative card p-4">

                        <div class="">
                            <livewire:dashboard.widget.search-product />
                        </div>

                        <livewire:dashboard.widget.list-product />





                    </div>



                </div>
            </div>



            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="purchase-form" action="{{ route('dashboard.purchase.store') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="reference">Reference<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="reference" required=""
                                                readonly="" value="PR">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="supplier_id">Supplier <span class="text-danger">*</span></label>
                                                <select class="form-control" name="supplier_id" id="supplier_id"
                                                   >
                                                    @forelse ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}">
                                                            {{ $supplier->name }}
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
                                    <div class="col-lg-3">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="date">Issue Date <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="issue_date"
                                                    value="{{today()->format('Y-m-d') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="expected_date">Expected Receipt Date <span
                                                        class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="expected_receipt_date"
                                                     value="{{today()->format('Y-m-d') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="status">Status <span class="text-danger">*</span></label>
                                            <select class="form-control" name="status" id="status">
                                                @forelse ($transaction_status as $status)
                                                        <option value="{{ $status }}">
                                                            {{ $status }}
                                                        </option>
                                                    @empty
                                                        <option selected="true" disabled>
                                                            No Data Available
                                                        </option>
                                                    @endforelse
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="warehouse_id">Ship To Location <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control" name="ship_to_warehouse_id" id="warehouse_id"
                                                >
                                                @forelse ($warehouses as $warehouse)
                                                        <option value="{{ $warehouse->id }}">
                                                            {{ $warehouse->name }}
                                                        </option>
                                                    @empty
                                                        <option selected="true" disabled>
                                                            No Data Available
                                                        </option>
                                                    @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="payment_method">Payment Method <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" name="payment_method" id="payment_method"
                                                    >
                                                    @forelse ($payment_methods as $payment_method)
                                                        <option value="{{ $payment_method }}">
                                                            {{ $payment_method }}
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
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="paid_amount">Amount Paid <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input id="paid_amount" type="number" class="form-control"
                                                    name="amount_paid" required="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="custom-control custom-switch">
                                            <input name="same_billing_address" type="checkbox" value="1" class="custom-control-input" id="customSwitch1">
                                            <label class="custom-control-label" for="customSwitch1"
                                                style="width:200px;margin:20px 0px">Same as
                                                Billing Address</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="billto">Bill To</label>
                                            <textarea  name="billing_address" id="billto" rows="5" class="form-control" placeholder="Billing Address"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 ">
                                        <div class="form-group">
                                            <label for="shipto">Ship To</label>
                                            <textarea name="shipping_address" id="shipto" rows="5" class="form-control" placeholder="Shipping Address"> </textarea>
                                        </div>
                                    </div>
                                </div>
                                {{-- end card  --}}

                                <livewire:dashboard.purchase.create-purchase />

                                <div class="form-row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="note">Order Notes (If Needed)</label>
                                            <textarea name="external_note" id="order_note" rows="5" class="form-control" placeholder="External Notes"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="note">Internal Notes (If Needed)</label>
                                            <textarea name="internal_note" id="internal_note" rows="5" class="form-control" placeholder="Internal Notes"></textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        Create Purchase <i class="bi bi-check"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
@endpush
