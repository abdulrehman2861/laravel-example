<div>
    <form id="purchase-form" action="{{ route('dashboard.purchase.update', $transaction_id) }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="reference">Reference<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="reference" required="" readonly=""
                        value="PR">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="from-group">
                    <div class="form-group">
                        <label for="supplier_id">Supplier <span class="text-danger">*</span></label>
                        <select wire:model="supplier_id" class="form-control" name="supplier_id" id="supplier_id">
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
                        <label for="issue_date">Issue Date <span class="text-danger">*</span></label>
                        <input type="date" wire:model="issue_date" class="form-control" name="issue_date"
                            value="{{ today()->format('Y-m-d') }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="from-group">
                    <div class="form-group">
                        <label for="expected_receipt_date">Expected Receipt Date <span class="text-danger">*</span></label>
                        <input type="date" wire:model="expected_receipt_date" class="form-control" name="expected_receipt_date"
                            value="{{ today()->format('Y-m-d') }}">
                    </div>
                </div>
            </div>
        </div>


        <div class="form-row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="status">Status <span class="text-danger">*</span></label>
                    <select  wire:model="status" class="form-control" name="status" id="status" >
                        @forelse ($transaction_status as $transactionStatus)
                            <option value="{{ $transactionStatus }}">
                                {{ $transactionStatus }}
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
                    <label for="ship_to_warehouse_id">Ship To Location <span class="text-danger">*</span></label>
                    <select wire:model="ship_to_warehouse_id" class="form-control" name="ship_to_warehouse_id" id="ship_to_warehouse_id" >
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
                        <label for="payment_method">Payment Method <span class="text-danger">*</span></label>

                        <select wire:model="payment_method"  class="form-control" name="payment_method" id="payment_method" >
                            @forelse ($payment_methods as $payment_method)
                                <option value="{{ $payment_method }}" >
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
                    <label for="amount_paid">Amount Paid <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input wire:model="amount_paid" id="amount_paid" type="number" class="form-control" name="amount_paid" required="">

                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <div class="custom-control custom-switch">
                    <input name="same_billing_address" type="checkbox" value="1" class="custom-control-input"
                        id="customSwitch1">
                    <label class="custom-control-label" for="customSwitch1" style="width:200px;margin:20px 0px">Same as
                        Billing Address</label>
                </div>
            </div>
        </div>

        <div class="form-row">

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="billing_address">Bill To</label>
                    <textarea wire:model="billing_address"  name="billing_address" id="billing_address" rows="5" class="form-control"
                        placeholder="Billing Address"></textarea>
                </div>
            </div>

            <div class="col-lg-6 ">
                <div class="form-group">
                    <label for="shipping_address">Ship To</label>
                    <textarea wire:model="shipping_address" name="shipping_address" id="shipping_address" rows="5" class="form-control"
                        placeholder="Shipping Address"> </textarea>
                </div>
            </div>
        </div>
        {{-- end card  --}}
        <input type="hidden" value="so"name="transaction_type">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div>
                            <div class="table-responsive position-relative">
                                <div wire:loading.delay.longer wire:loading.flex
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
                                            <th class="align-middle">Cost Price</th>
                                            <th class="align-middle">Stock</th>
                                            <th class="align-middle">Quantity</th>
                                            <th class="align-middle">Sub Total</th>
                                            <th class="align-middle">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $key => $product)
                                            <tr>
                                                <input type="hidden" value="{{ $product['product_id'] }}"
                                                    name="details[{{ $key }}][product_id]">
                                                <input type="hidden" value="{{ $product['product_fitting_id'] }}"
                                                    name="details[{{ $key }}][product_fitting_id]">

                                                <td class="align-middle">
                                                    <div class="input-group">
                                                        <div style="margin: 8px">( {{ $product['part_number'] }} )
                                                        </div>

                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    {{ $product['product'] }} | <br>
                                                    <span class="badge badge-success">
                                                        {{ $product['part_number'] }}
                                                    </span>
                                                    <!-- Button trigger Discount Modal -->
                                                    {{-- <a href="{{ route('dashboard.product.edit', $product['product_id']) }}"
                                                        class="badge badge-warning pointer-event">
                                                        <i class="fa fa-pen-square text-white"></i>
                                                    </a> --}}
                                                </td>



                                                <td class="align-middle">
                                                    <div class="input-group">

                                                        <div style="margin: 8px">(${{ $product['original_cost'] }})
                                                        </div>

                                                        <input wire:model="products.{{ $key }}.cost"
                                                            style="min-width: 40px;max-width: 90px;" type="number"
                                                            class="form-control" value="{{ $product['cost'] }}"
                                                            min="1" name="details[{{ $key }}][cost]">
                                                        <div class="input-group-append">
                                                            <a class="btn btn-primary"
                                                                wire:click.prevent="calculateValues">
                                                                <i class="fa fa-check"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                </td>





                                                <td class="align-middle text-center">
                                                    <span class="badge badge-info">{{ $product['stock'] }}</span>
                                                </td>

                                                <td class="align-middle">
                                                    <div class="input-group">
                                                        <input wire:model="products.{{ $key }}.quantity"
                                                            style="min-width: 40px;max-width: 90px;" type="number"
                                                            class="form-control" value="{{ $product['quantity'] }}"
                                                            min="1"
                                                            name="details[{{ $key }}][quantity]">
                                                        <div class="input-group-append">
                                                            <a class="btn btn-primary"
                                                                wire:click.prevent="calculateValues">
                                                                <i class="fa fa-check"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>

                                                <input type="hidden" value="0"
                                                    name="details[{{ $key }}][discount]">

                                                <input type="hidden" value="0"
                                                    name="details[{{ $key }}][tax]">

                                                {{-- <td class="align-middle">
                                            $0.00
                                        </td>

                                        <td class="align-middle">
                                            $0.00
                                        </td> --}}

                                                <td class="align-middle">
                                                    ${{ $product['quantity'] * $product['cost'] }}
                                                </td>

                                                <td class="align-middle text-center">
                                                    <a class="btn"
                                                        wire:click.prevent="removeProduct({{ $key }})"
                                                        title="remove">
                                                        <i class="far fa-times-circle font-2xl text-danger"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center">
                                                    <span class="text-danger">
                                                        Please search &amp; select products!
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforelse
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
                                                <th>Order Tax ({{ $tax }}%)</th>
                                                <td>(+) ${{ $tax_value }}</td>
                                            </tr>
                                            <tr>
                                                <th>Discount ({{ $discount }}%)</th>
                                                <td>(-) ${{ $discount_value }}</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping</th>
                                                <input type="hidden" value="0" name="shipping_amount">
                                                <td>(+) ${{ $shipping }}</td>
                                            </tr>
                                            <tr>
                                                <th>Grand Total</th>
                                                <th>
                                                    (=) ${{ $grandtotal }}
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="total_amount" value="0">

                        <div class="form-row">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="discount_percentage">Discount (%)</label>
                                    <input wire:change="calculateValues" wire:model.lazy="discount" type="number"
                                        class="form-control" name="discount" min="0" max="100"
                                        value="0" >
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="shipping_amount">Shipping</label>
                                    <input wire:change="calculateValues" wire:model.lazy="shipping" type="number"
                                        id="shipping_amount" class="form-control" name="shipping" min="0"
                                        value="0" >
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="tax_type">Tax <span class="text-danger">*</span></label>
                                    <select wire:model.lazy="tax_type" class="form-control" name="tax_type"
                                        id="tax_type">
                                        @foreach ($taxTypes as $SingleTaxtype)
                                            <option value="{{ $SingleTaxtype }}">
                                                {{ $SingleTaxtype }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 @if ($tax_type == 'Exempt') d-none @endif" id="global_tax_">
                                <div class="form-group">
                                    <label for="tax_percentage">Order Tax (%)</label>
                                    <input wire:change="calculateValues" wire:model.lazy="tax" type="number"
                                        class="form-control global_tax" name="order_tax" min="0"
                                        max="100" value="0" >
                                </div>
                            </div>
                        </div>






                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        {{-- <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" wire:model.lazy="existingCustomer"
                                            name="existing_customer" class="custom-control-input" id="customSwitch1"
                                            value="1">
                                        <label class="custom-control-label" for="customSwitch1">Existing
                                            Customers</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8" style="margin-left: -30px">

                            </div>
                        </div>
                        <br> --}}

                        <hr>



                        {{-- <div class="form-row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select  wire:model="status" class="form-control" name="status" id="status" required="">
                                        @forelse ($transactionStatuses as $transactionStatus)
                                            <option value="{{ $transactionStatus }}">
                                                {{ $transactionStatus }}
                                            </option>
                                        @empty
                                            <option selected="true" disabled>
                                                No Data Available
                                            </option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="external_note">Order Notes (If Needed)</label>
                                    <textarea wire:model="external_note" name="external_note" id="order_note" rows="5" class="form-control" placeholder="External Notes"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="internal_note">Internal Notes (If Needed)</label>
                                    <textarea wire:model="internal_note" name="internal_note" id="internal_note" rows="5" class="form-control" placeholder="Internal Notes"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">
                                Update Purchase <i class="bi bi-check"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
