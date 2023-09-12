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
                                name="details[{{ $key }}][product_id]">
                            <input type="hidden" value="{{ $product['product_fitting_id'] }}"
                                name="details[{{ $key }}][product_fitting_id]">

                            <td class="align-middle">
                                <div class="input-group">
                                    <div style="margin: 8px">( {{ $product['part_number'] }} )</div>

                                </div>
                            </td>
                            <td class="align-middle">
                                {{ $product['product'] }} | <br>
                                <span class="badge badge-success">
                                    {{ $product['part_number'] }}
                                </span>
                                <!-- Button trigger Discount Modal -->
                                <a href="{{ route('dashboard.product.edit', $product['product_id']) }}"
                                    class="badge badge-warning pointer-event">
                                    <i class="fa fa-pen-square text-white"></i>
                                </a>
                            </td>



                            <td class="align-middle">
                                <div class="input-group">

                                    <div style="margin: 8px">(${{ $product['original_cost'] }})</div>

                                    <input wire:model="products.{{ $key }}.cost"
                                        style="min-width: 40px;max-width: 90px;" type="number" class="form-control"
                                        value="{{ $product['cost'] }}" min="1"
                                        name="details[{{ $key }}][cost]">
                                    <div class="input-group-append">
                                        <a class="btn btn-primary" wire:click.prevent="calculateValues">
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
                                        style="min-width: 40px;max-width: 90px;" type="number" class="form-control"
                                        value="{{ $product['quantity'] }}" min="1"
                                        name="details[{{ $key }}][quantity]">
                                    <div class="input-group-append">
                                        <a class="btn btn-primary" wire:click.prevent="calculateValues">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>

                            <input type="hidden" value="0" name="details[{{ $key }}][discount]">

                            <input type="hidden" value="0" name="details[{{ $key }}][tax]">

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
                                <a class="btn" wire:click.prevent="removeProduct({{ $key }})"
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
                <input wire:change="calculateValues" wire:model.lazy="discount" type="number" class="form-control" name="discount" min="0"
                    max="100" value="0" >
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="shipping_amount">Shipping</label>
                <input wire:change="calculateValues" wire:model.lazy="shipping" type="number" id="shipping_amount" class="form-control"
                    name="shipping" min="0" value="0" >
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="tax_type">Tax <span class="text-danger">*</span></label>
                <select wire:model.lazy="tax_type" class="form-control" name="tax_type" id="tax_type">
                    @foreach ($taxTypes as $SingleTaxtype)
                        <option value="{{ $SingleTaxtype }}">
                            {{ $SingleTaxtype }}
                        </option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="col-lg-4 @if($tax_type == 'Exempt') d-none @endif" id="global_tax_">
            <div class="form-group">
                <label for="tax_percentage">Order Tax (%)</label>
                <input wire:change="calculateValues" wire:model.lazy="tax" type="number" class="form-control global_tax"
                    name="order_tax" min="0" max="100" value="0" >
            </div>
        </div>
    </div>
</div>
