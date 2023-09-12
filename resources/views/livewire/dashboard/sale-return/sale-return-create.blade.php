<div class="container-fluid mb-4">
    <div class="row">
        <div class="col-12">
            <div class="position-relative">
                <div class="card mb-0 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="form-group mb-0">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="bi bi-search text-primary"></i>
                                    </div>
                                </div>
                                <input wire:model="generalKey" type="text" id="sproduct" class="form-control"
                                    placeholder="Type purchase or Customer name or code....">
                                <input wire:model="searchPhone" type="text" class="form-control"
                                    placeholder="Type Customer phone number">
                                <input wire:model="searchDate" type="date" class="form-control">

                            </div>





                        </div>
                        <br>

                        <div class="form-row">
                            <div class="col-lg-6 d-none">
                                <div class="form-group">
                                    <label for="reference">Reference <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" readonly="" value="PRRN">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="from-group">
                                    <div class="form-group">
                                        <label for="supplier_id">Customer <span class="text-danger">*</span></label>
                                        <select wire:model="searchSupplier" class="form-control" name="customer_id"
                                            id="supplier_id" required="">
                                            <option value="0" selected="">Select Customer</option>
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


                        </div>

                    </div>
                </div>



                <div wire:loading.delay.longer class="card position-absolute mt-1 border-0"
                    style="z-index: 1;left: 0;right: 0;">
                    <div class="card-body shadow">
                        <div wire:loading.flex class="justify-content-center mx-auto">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>

                @if (!empty($transactions))
                    <div class="card  position-absolute   mt-1" style="z-index: 2;  left: 0;right: 0;border: 0;">
                        <div class="card-body shadow">
                            <ul class="list-group list-group-flush">

                                @forelse ($transactions as $transactionListItem)
                                    <li class="list-group-item list-group-item-action">
                                        <a wire:click.prevent="selectTransaction({{ $transactionListItem->id }})"
                                            href="#">

                                            {{ $transactionListItem->sale_order_no }} ( Customer :
                                            {{ $transactionListItem->customer?->name }} , Customer Phone Number :
                                            {{ $transactionListItem->customer?->phone }}
                                            ) ( Total Amount : {{ $transactionListItem->total_amount }} )
                                        </a>

                                    </li>
                                @empty
                                    <li class="list-group-item list-group-item-action text-center">
                                        No Data Available
                                    </li>
                                @endforelse




                            </ul>
                        </div>
                    </div>
                @endif





            </div>





        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form id="purchase-return-form" action="{{ route('dashboard.sale-return.store') }}"
                        method="POST">
                        @csrf
                        <input wire:model="selectedTransactionId" type="hidden" name="sale_transaction_id" value="{{$selectedTransactionId}}">


                        <div>
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
                                                        name="details[{{ $key }}][detail_id]">

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

                                                            <div style="margin: 8px">(${{ $product['cost'] }})
                                                            </div>
                                                        </div>

                                                    </td>





                                                    <td class="align-middle text-center">
                                                        <span class="badge badge-info">{{ $product['stock'] }}</span>
                                                    </td>

                                                    <td class="align-middle">
                                                        <div class="input-group">
                                                            <div style="margin: 8px">(${{ $product['quantity'] }})
                                                            </div>

                                                        </div>
                                                    </td>



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

                            {{-- <input type="hidden" name="total_amount" value="0"> --}}
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="paid_amount">Amount Return <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input wire:model="return_amount" id="paid_amount" type="number" step="0.01" class="form-control"
                                            name="return_amount"  required="">
                                        {{-- <div class="input-group-append">
                                            <button id="getTotalAmount" class="btn btn-primary" type="button">
                                                <i class="bi bi-check-square"></i>
                                            </button>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                        </div>





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
</div>
