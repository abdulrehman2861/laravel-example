<div>
    <form id="purchase-form" action="{{ route('dashboard.sale.store') }}" method="POST">
        @csrf
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
                                            <th class="align-middle">Sale Price</th>
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

                                                        <div style="margin: 8px">(${{ $product['original_rate'] }})
                                                        </div>

                                                        <input wire:model="products.{{ $key }}.rate"
                                                            style="min-width: 40px;max-width: 90px;" type="number"
                                                            class="form-control" value="{{ $product['rate'] }}"
                                                            min="1" name="details[{{ $key }}][rate]">
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
                                                    ${{ $product['quantity'] * $product['rate'] }}
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
                                        value="0" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="shipping_amount">Shipping</label>
                                    <input wire:change="calculateValues" wire:model.lazy="shipping" type="number"
                                        id="shipping_amount" class="form-control" name="shipping" min="0"
                                        value="0" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="tax_type">Tax </label>
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
                                        max="100" value="0" required>
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

                        <div class="form-row">
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
                            {{-- <div class="col-md-3" style="margin-left: -30px">

                                <label class="form-check-label" for="tax">Existing Customers</label>

                            </div> --}}
                            <div class="col-md-8" style="margin-left: -30px">

                            </div>
                        </div>
                        <br>
                        <h5 class="mb-4 "><i>Customer Information</i></h5>
                        <div class="form-row">
                            <div class="col-lg-4 cus @if ($existingCustomer == false) d-none @endif " style="">
                                <div class="from-group">
                                    <div class="form-group">
                                        <label for="customer_id">Customers</label>
                                        <select class="form-control" name="customer_id" id="customer_id"
                                            required="">
                                            @forelse ($customers as $customer)
                                                <option value="{{ $customer->id }}">
                                                    {{ $customer->name }}
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="servicetype">Service Type </label>
                                    <select class="form-control" name="service_type" id="servicetype" required>
                                        @forelse ($serviceTypes as $serviceType)
                                            <option value="{{ $serviceType }}">
                                                {{ $serviceType }}
                                            </option>
                                        @empty
                                            <option selected="true" disabled>
                                                No Data Available
                                            </option>
                                        @endforelse

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 d-none">
                                <div class="from-group">
                                    <div class="form-group">
                                        <label for="schedule">Appointment Time<span
                                                class="text-danger"></span></label>
                                        <select class="form-control " name="appointment_time" id="schedule" required>
                                            @forelse ($appointmentTimes as $appointmentTime)
                                                <option value="{{ $appointmentTime }}">
                                                    {{ $appointmentTime }}
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
                            <div class="col-lg-4">
                                <div class="from-group">
                                    <div class="form-group">
                                        <label for="inst_id">Installer<span class="text-danger"></span></label>
                                        <select class="form-control" name="installer_id" id="inst_id">
                                            @forelse ($installers as $installer)
                                                <option value="{{ $installer->id }}">
                                                    {{ $installer->first_name }}
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
                            <div class="form-row">
                                <!-- <div class="col-md-4 ">
                                        <div class="form-group">
                                            <label for="name">First Name </label>
                                            <input type="text" class="form-control" name="firstname" id="firstname">
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                            <label for="lastname">Last Name </label>
                                            <input type="text" class="form-control" name="lastname" id="lastname">
                                        </div>
                                    </div> -->
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="customer_name">Customer Name </label>
                                                        <input type="text" class="form-control remcus"
                                                            name="customer[name]">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="contact_person">Contact Person </label>
                                                        <input type="text" class="form-control remcus"
                                                            name="customer[contact_person]">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="customer_email">Email </label>
                                                        <input type="email" class="form-control remcus"
                                                            name="customer[email]">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="customer_type_id">Customer Type </label>
                                                        <select class="form-control remcus"
                                                            name="customer[customer_Type_id]" id="customer_type_id">
                                                            @forelse ($customerTypes as $customerType)
                                                                <option value="{{ $customerType->id }}">
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

                                            <div class="form-row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="customer_phone">Phone </label>
                                                        <input type="text" class="form-control remcus"
                                                            name="customer[phone]">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="customer_phone_alt">Phone (Alternate) </label>
                                                        <input type="text" class="form-control remcus"
                                                            name="customer[phone_alternative]">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="fax">Fax </label>
                                                        <input type="text" class="form-control remcus"
                                                            name="customer[fax]">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="discount_type">Discount </label>
                                                        <select class="form-control remcus"
                                                            name="customer[discount_Type]" id="discount_type">
                                                            <option value="None" selected="">None</option>
                                                            <option value="Rate">Discount in Rates</option>
                                                            <option value="Percentage">Discount in Percentage
                                                            </option>
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="col-lg-4 discount remcus" style="display: none">
                                                    <div class="form-group">
                                                        <label for="discount">Discount</label>
                                                        <div class="input-group">
                                                            <input id="discount" type="text" class="form-control"
                                                                name="customer[discount]">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text" id="basic-addon2"><i
                                                                        class="bi bi-percent"></i></span>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="state">State </label>
                                                        <input type="text" class="form-control remcus"
                                                            name="customer[state]">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="city"> City</label>
                                                        <input type="text" class="form-control remcus"
                                                            name="customer[city]">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 d-none">
                                                    <div class="form-group">
                                                        <label for="country">Country </label>
                                                        <input type="text" class="form-control remcus"
                                                            name="customer[country]">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="billing_address">Billing Address </label>

                                                        <textarea name="customer[billing_address]" id="billing_address" rows="4" class="form-control remarea"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="service_address">Service Address </label>

                                                        <textarea name="customer[service_address]" id="service_address" rows="4" class="form-control remarea"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="notes">Notes </label>
                                                        <textarea name="notes" id="customer[note]" rows="4" class="form-control remarea"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>





                        </div>
                        <hr>


                        <div class="form-row">
                            <div class="col-lg-6 d-none">
                                <div class="form-group">
                                    <label for="reference">Reference </label>
                                    <input type="text" class="form-control" name="reference" required=""
                                        readonly="" value="QT-00171">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="from-group">
                                    <div class="form-group">
                                        <label for="date">Date </label>
                                        <input type="date" class="form-control" name="appointment_date"
                                            >
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="status">Status </label>
                                    <select class="form-control" name="status" id="status" required="">
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
                        </div>

                        <div class="form-group">
                            <label for="note">Note (If Needed)</label>
                            <textarea name="note" id="note" rows="5" class="form-control"></textarea>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">
                                Create Sale <i class="bi bi-check"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
