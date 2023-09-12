@extends('dashboard.layouts.master')

@section('title', 'Auto Glass depo')

@push('styles')
    <style>

    </style>
@endpush

@section('content')

    <div style="padding:20px">

        <livewire:dashboard.purchase-return.purchase-return-create />
        {{-- <div class="container-fluid mb-4">
            <div class="row">
                <div class="col-12">
                    <div wire:id="X9O45EYwTYSkTvZ8aGnM" class="position-relative">
                        <div class="card mb-0 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="form-group mb-0">

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="bi bi-search text-primary"></i>
                                            </div>
                                        </div>
                                        <input wire:keydown.escape="resetQuery" wire:model.debounce.500ms="query"
                                            type="text" id="sproduct" class="form-control"
                                            placeholder="Type purchase or supplier name or code....">
                                        <input wire:keydown.escape="resetQuery" wire:model.debounce.500ms="query"
                                            type="text" class="form-control" placeholder="Type supplier phone number">
                                        <input wire:keydown.escape="resetQuery" wire:model.debounce.500ms="query"
                                            type="date" class="form-control">

                                    </div>





                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="reference">Reference <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="reference" required=""
                                                readonly="" value="PRRN">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="supplier_id">Suppliers <span
                                                        class="text-danger">*</span></label>
                                                <select wire:keydown.escape="resetQuery" wire:model.debounce.500ms="query"
                                                    class="form-control" name="supplier_id" id="supplier_id" required="">
                                                    <option value="0" selected="">Select Supplier</option>
                                                    <option value="2"></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>



                        <div wire:loading="" class="card position-absolute mt-1 border-0"
                            style="z-index: 1;left: 0;right: 0;">
                            <div class="card-body shadow">
                                <div class="d-flex justify-content-center">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card  position-absolute   mt-1"
                            style=" display:none; z-index: 2;  left: 0;right: 0;border: 0;">
                            <div class="card-body shadow">
                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item list-group-item-action">
                                        <a href="#">

                                            PR-00003 ( Supplier : xyz Glass manufacturer , Supplier Phone Number : 86234876
                                            ) ( Total Amount : 1 )
                                        </a>

                                        </lis>




                                </ul>
                            </div>
                        </div>





                    </div>





                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="purchase-return-form"
                                action="https://inventory.allstateautoglassinc.com/purchase-returns" method="POST">
                                <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln">
                                <div class="form-row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="reference">Reference <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="reference" required=""
                                                readonly="" value="PRRN">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="supplier_id">Supplier <span class="text-danger">*</span></label>
                                                <select class="form-control" name="supplier_id" id="supplier_id"
                                                    required="">
                                                    <option value="2">xyz Glass manufacturer</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="date">Date <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="date" required=""
                                                    value="2023-06-24">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div wire:id="GH0mQXx5ANblqugl3cmq">
                                    <div>
                                        <div class="table-responsive position-relative">
                                            <div wire:loading.flex=""
                                                class="col-12 position-absolute justify-content-center align-items-center"
                                                style="top:0;right:0;left:0;bottom:0;background-color: rgba(255,255,255,0.5);z-index: 99;">
                                                <div class="spinner-border text-primary" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                            <table class="table table-bordered">
                                                <thead class="thead-dark">
                                                    <tr>

                                                        <th class="align-middle">Part Number</th>
                                                        <th class="align-middle">Product </th>
                                                        <th class="align-middle ">Sale Price</th>
                                                        <th class="align-middle">Stock</th>
                                                        <th class="align-middle">Quantity</th>
                                                        <th class="align-middle">Discount</th>
                                                        <th class="align-middle">Tax</th>
                                                        <th class="align-middle">Sub Total</th>
                                                        <th class="align-middle">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="9" class="text-center">
                                                            <span class="text-danger">
                                                                Please search &amp; select products!
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row justify-content-md-end">
                                        <div class="col-md-4">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <th>Order Tax (0%)</th>
                                                            <td>(+) $0.00</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Discount (0%)</th>
                                                            <td>(-) $0.00</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Shipping</th>
                                                            <input type="hidden" value="0" name="shipping_amount">
                                                            <td>(+) $0.00</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Grand Total</th>
                                                            <th>
                                                                (=) $0.00
                                                            </th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="total_amount" value="0">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="paid_amount">Amount Return <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input id="paid_amount" type="text" class="form-control"
                                                    name="paid_amount" value="0" required="">
                                                <div class="input-group-append">
                                                    <button id="getTotalAmount" class="btn btn-primary" type="button">
                                                        <i class="bi bi-check-square"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <script>
                                    document.getElementById('paid_amount').value = 0;

                                    function update() {
                                        var select = document.getElementById('tax_type');
                                        var div = document.getElementById('global_tax_');
                                        var value = select.options[select.selectedIndex].value;

                                        if (value == "Exempt") {
                                            div.style.display = "none";
                                        } else {
                                            div.style.display = "block";
                                        }
                                    }
                                </script>




                                <div class="form-group">
                                    <label for="note">Note (If Needed)</label>
                                    <textarea name="note" id="note" rows="5" class="form-control"></textarea>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        Create Purchase Return <i class="bi bi-check"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}





    </div>






@endsection

@push('scripts')
@endpush
