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
                        <th class="align-middle">Product </th>
                        <th class="align-middle">Code</th>
                        <th class="align-middle">Stock</th>
                        <th class="align-middle">Quantity</th>
                        <th class="align-middle">Type</th>
                        <th class="align-middle">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $key => $product)
                        <tr>
                            <input type="hidden" value="{{ $product['product_id'] }}"
                                name="adjustmentProducts[{{ $key }}][product_id]">
                            <input type="hidden" value="{{ $product['product_fitting_id'] }}"
                                name="adjustmentProducts[{{ $key }}][product_fitting_id]">


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
                                    <div style="margin: 8px">( {{ $product['part_number'] }} )</div>

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
                                        name="adjustmentProducts[{{ $key }}][quantity]">
                                    <div class="input-group-append">
                                        <a class="btn btn-primary" wire:click.prevent="calculateValues">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">
                                <select name="adjustmentProducts[{{ $key }}][type]" class="form-control">
                                    <option value="Addition">(+) Addition</option>
                                    <option value="Subtraction">(-) Subtraction</option>
                                </select>
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

</div>
