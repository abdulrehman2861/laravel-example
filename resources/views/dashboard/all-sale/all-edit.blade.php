@extends('dashboard.layouts.master')

@section('title', 'Auto Glass depo')

@push('styles')



<style>

</style>
@endpush

@section('content')

<div style="padding:20px">

    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col-12">
                <div wire:id="0U3V2c9G8YkQtnyLu4iO" class="position-relative">
                    <div class="card mb-0 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="form-group mb-0">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="bi bi-search text-primary"></i>
                                        </div>
                                    </div>
                                    <input wire:keydown.escape="resetQuery" wire:model.debounce.500ms="query" type="text" id="sproduct" class="form-control" placeholder="Type product name or code....">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div wire:loading="" class="card position-absolute mt-1 border-0" style="z-index: 1;left: 0;right: 0;">
                        <div class="card-body shadow">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-body">

                                    <h5 class="mb-4 "><i>Vehicle Information</i></h5>

                                    <form id="quotation-search">


                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="years_id">Year </label>
                                                    <select wire:change.prevent="selectProductPara('year')" class="form-control" name="years_id" id="years_id" wire:model="year" required="">



                                                        <option value="36">2023</option>
                                                        <option value="17">2022</option>
                                                        <option value="15">2021</option>
                                                        <option value="16">2020</option>
                                                        <option value="18">2019</option>
                                                        <option value="19">2018</option>
                                                        <option value="4">2017</option>
                                                        <option value="5">2016</option>
                                                        <option value="20">2015</option>
                                                        <option value="21">2014</option>
                                                        <option value="22">2013</option>
                                                        <option value="23">2012</option>
                                                        <option value="24">2011</option>
                                                        <option value="6">2010</option>
                                                        <option value="7">2009</option>
                                                        <option value="25">2008</option>
                                                        <option value="26">2007</option>
                                                        <option value="8">2006</option>
                                                        <option value="31">2005</option>
                                                        <option value="27">2004</option>
                                                        <option value="28">2003</option>
                                                        <option value="29">2002</option>
                                                        <option value="30">2001</option>
                                                        <option value="9">2000</option>
                                                        <option value="10">1999</option>
                                                        <option value="11">1998</option>
                                                        <option value="12">1997</option>
                                                        <option value="13">1996</option>
                                                        <option value="14">1995</option>
                                                        <option value="3">1994</option>
                                                        <option value="32">1993</option>
                                                        <option value="33">1992</option>
                                                        <option value="34">1991</option>
                                                        <option value="35">1990</option>
                                                        <option value="37">1989</option>
                                                        <option value="38">1987</option>
                                                    </select>
                                                    <input type="hidden" id="year" value="">

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="makers_id">Make </label>
                                                    <select wire:change.prevent="selectProductPara('make')" wire:change="models" class="form-control" name="makers_id" id="makers_id" wire:model="make" onchange="match('' , 'makers_id')" required="">



                                                        <option value="16">Acura</option>
                                                        <option value="44">Alfa Romeo</option>
                                                        <option value="26">Alfa Romeo/Chrysler</option>
                                                        <option value="7">Audi</option>
                                                        <option value="20">BMW</option>
                                                        <option value="4">Buick</option>
                                                        <option value="34">Cadillac</option>
                                                        <option value="32">Chevrolet</option>
                                                        <option value="5">Chrysler</option>
                                                        <option value="30">Dodge</option>
                                                        <option value="40">Eagle</option>
                                                        <option value="23">Fiat/Chrysler</option>
                                                        <option value="43">Ford</option>
                                                        <option value="10">Genesis</option>
                                                        <option value="39">Geo</option>
                                                        <option value="49">GMC</option>
                                                        <option value="9">Honda</option>
                                                        <option value="52">Hummer</option>
                                                        <option value="11">Hyundai</option>
                                                        <option value="25">Infiniti</option>
                                                        <option value="38">Isuzu</option>
                                                        <option value="14">Jaguar</option>
                                                        <option value="37">Jeep</option>
                                                        <option value="8">Kia</option>
                                                        <option value="15">Land Rover</option>
                                                        <option value="18">Lexus</option>
                                                        <option value="50">Lincoln</option>
                                                        <option value="45">Maserati</option>
                                                        <option value="24">Mazda</option>
                                                        <option value="6">Mercedes Benz</option>
                                                        <option value="42">Mercury</option>
                                                        <option value="28">Mini</option>
                                                        <option value="12">Mitsubishi</option>
                                                        <option value="19">Nissan</option>
                                                        <option value="53">Oldsmobile</option>
                                                        <option value="3">Plymouth</option>
                                                        <option value="36">Pontiac</option>
                                                        <option value="21">Porsche</option>
                                                        <option value="48">Ram</option>
                                                        <option value="33">Saab</option>
                                                        <option value="51">Saturn</option>
                                                        <option value="31">Scion</option>
                                                        <option value="29">Smart</option>
                                                        <option value="46">Sterling</option>
                                                        <option value="22">Subaru</option>
                                                        <option value="35">Suzuki</option>
                                                        <option value="47">Tesla</option>
                                                        <option value="17">Toyota</option>
                                                        <option value="13">Volkswagen</option>
                                                        <option value="27">Volvo</option>
                                                        <option value="41">Yugo</option>
                                                    </select>
                                                    <input type="hidden" name="make" id="make" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="models_id">Model </label>
                                                    <select wire:change.prevent="selectProductPara('model')" wire:change="bodys" class="form-control" name="models_id" id="models_id" wire:model="model" onchange="match('' , 'models_id')" required="">





                                                    </select>
                                                    <input type="hidden" name="model" id="model" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="models_id">Body Style </label>
                                                    <select wire:change.prevent="selectProductPara('body')" class="form-control" name="bodystyles_id" id="bodystyles_id" wire:model="body" required="">

                                                        <option value="0" selected="" disabled="">Select Body Style</option>
                                                    </select>
                                                    <input type="hidden" name="body" id="body" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="glasses_id">Glass </label>
                                                    <select wire:change.prevent="selectProductPara('glass')" class="form-control" name="glasses_id" id="glasses_id" wire:model="glass" onchange="match('' , 'glasses_id')" required="">
                                                        <!--  -->
                                                        <option value="0" selected="" disabled="">Select Glass</option>
                                                    </select>
                                                    <input type="hidden" name="glass" id="glass" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="features_id">Feature </label>
                                                    <select wire:change.prevent="selectProductPara('feature')" class="form-control" name="features_id" id="features_id" wire:model="feature">
                                                        <option value="0" selected="" disabled="">Select Feature</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>






                <!-- Livewire Component wire-end:0U3V2c9G8YkQtnyLu4iO -->
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form id="sale-form" action="https://inventory.allstateautoglassinc.com/sales/105" method="POST">
                            <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln"> <input type="hidden" name="_method" value="patch">

                            <div wire:id="N2FiBTdzuAcLdk29g3qY">
                                <div>
                                    <div class="table-responsive position-relative">
                                        <div wire:loading.flex="" class="col-12 position-absolute justify-content-center align-items-center" style="top:0;right:0;left:0;bottom:0;background-color: rgba(255,255,255,0.5);z-index: 99;">
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
                                                    <td class="align-middle">
                                                        DQ08589 YPY
                                                    </td>
                                                    <td class="align-middle">
                                                        1994,Plymouth,Voyager,Driver Quarter | <br>
                                                        <span class="badge badge-success">
                                                            DQ08589 YPY
                                                        </span>
                                                        <!-- Button trigger Discount Modal -->
                                                        <span wire:click="$emitSelf('discountModalRefresh', '2', '391615ae616e8cb4c5bd52091044418b')" role="button" class="badge badge-warning pointer-event" data-toggle="modal" data-target="#discountModal2">
                                                            <img src="./assets/images/dashboard/search/pen (2).png">
                                                        </span>
                                                        <!-- Discount Modal -->
                                                        <div wire:ignore.self="" class="modal fade" id="discountModal2" tabindex="-1" role="dialog" aria-labelledby="discountModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="discountModalLabel">
                                                                            1994,Plymouth,Voyager,Driver Quarter
                                                                            <br>
                                                                            <span class="badge badge-success">
                                                                                DQ08589 YPY
                                                                            </span>
                                                                        </h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label>Discount Type <span class="text-danger">*</span></label>
                                                                            <select wire:model="discount_type.2" class="form-control" required="">
                                                                                <option value="fixed">Fixed</option>
                                                                                <option value="percentage">Percentage</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Discount <span class="text-danger">*</span></label>
                                                                            <input wire:model.defer="item_discount.2" type="number" class="form-control" value="0">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="align-middle">
                                                        <form wire:submit.prevent="changePrice('391615ae616e8cb4c5bd52091044418b', '2')">
                                                            <div class="input-group">
                                                                <div style="margin: 8px">($99.00)</div>
                                                                <input wire:model.defer="price.2" style="min-width: 40px;max-width: 90px;" type="text" class="form-control" value="99" min="1">
                                                                
                                                            </div>
                                                        </form>

                                                    </td>







                                                    <td class="align-middle text-center">
                                                        <span class="badge badge-info">1 </span>
                                                    </td>

                                                    <td class="align-middle">
                                                        <form wire:submit.prevent="updateQuantity('391615ae616e8cb4c5bd52091044418b', '2')">
                                                            <div class="input-group">
                                                                <div style="margin: 8px">(1)</div>
                                                                <input wire:model.defer="quantity.2" style="min-width: 40px;max-width: 90px;" type="number" class="form-control" value="1" min="1">
                                                                
                                                            </div>
                                                        </form>
                                                    </td>

                                                    <td class="align-middle">
                                                        $0.00
                                                    </td>

                                                    <td class="align-middle">
                                                        $0.00
                                                    </td>

                                                    <td class="align-middle">
                                                        $99.00
                                                    </td>

                                                    <td class="align-middle text-center">
                                                        <a href="#" wire:click.prevent="removeItem('391615ae616e8cb4c5bd52091044418b')">
                                                            <i class="bi bi-x-circle font-2xl text-danger"></i>
                                                        </a>
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
                                                            (=) $99.00
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="total_amount" value="99">

                                <div class="form-row">

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="discount_percentage">Discount (%)</label>
                                            <input wire:model.lazy="global_discount" type="number" class="form-control" name="discount_percentage" min="0" max="100" value="0" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="shipping_amount">Shipping</label>
                                            <input wire:model.lazy="shipping" type="number" class="form-control" name="shipping_amount" min="0" value="0" required="" step="0.01">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="tax_type">Tax <span class="text-danger">*</span></label>
                                            <select class="form-control" name="tax_type" id="tax_type" onchange="update()">
                                                <option value="Default">Default</option>
                                                <option value="Exempt">Exempt</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" id="global_tax_">
                                        <div class="form-group">
                                            <label for="tax_percentage">Order Tax (%)</label>
                                            <input wire:model.lazy="global_tax" type="number" class="form-control global_tax" name="tax_percentage" min="0" max="100" value="0" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
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

                            <!-- Livewire Component wire-end:N2FiBTdzuAcLdk29g3qY -->
                            <h5 class="mb-4 "><i>Customer Information</i></h5>
                            <div class="form-row">
                                <div class="col-lg-4 ">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="customer_id">Customers<span class="text-danger">*</span></label>
                                            <select class="form-control" name="customer_id" id="customer_id" required="">
                                                <option value="0" selected="" disabled="">Select Customer</option>
                                                <option value="18">Cust_3</option>
                                                <option selected="" value="19">Cust_2</option>
                                                <option value="23">Cus_1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="schedule">Appointment Time </label>
                                        <select class="form-control" name="schedule" id="schedule">
                                            <option value="" disabled="">Select Appointment Time</option>
                                            <option value="8ato10a">8am-10am</option>
                                            <option value="10ato12p">10am-12pm</option>
                                            <option value="1pto3p">1pm-3pm</option>
                                            <option value="3pto5p">3pm-5pm</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="servicetype" style="display: flex;"><svg style="  width: 17px;height: 14px;" class="svg-inline--fa fa-truck-field" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="truck-field" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M32 96C32 60.65 60.65 32 96 32H320C343.7 32 364.4 44.87 375.4 64H427.2C452.5 64 475.4 78.9 485.7 102L538.5 220.8C538.1 221.9 539.4 222.9 539.8 223.1H544C579.3 223.1 608 252.7 608 287.1V319.1C625.7 319.1 640 334.3 640 352C640 369.7 625.7 384 608 384H576C576 437 533 480 480 480C426.1 480 384 437 384 384H256C256 437 213 480 160 480C106.1 480 64 437 64 384H32C14.33 384 0 369.7 0 352C0 334.3 14.33 319.1 32 319.1V287.1C14.33 287.1 0 273.7 0 255.1V159.1C0 142.3 14.33 127.1 32 127.1V96zM469.9 224L427.2 128H384V224H469.9zM160 432C186.5 432 208 410.5 208 384C208 357.5 186.5 336 160 336C133.5 336 112 357.5 112 384C112 410.5 133.5 432 160 432zM480 336C453.5 336 432 357.5 432 384C432 410.5 453.5 432 480 432C506.5 432 528 410.5 528 384C528 357.5 506.5 336 480 336z"></path>
                                            </svg><!-- <i class="fa-solid fa-truck-field"></i> Font Awesome fontawesome.com --> / <svg style="width: 17px;height: 14px;margin: 0px 6px;" class="svg-inline--fa fa-shop" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shop" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M0 155.2C0 147.9 2.153 140.8 6.188 134.7L81.75 21.37C90.65 8.021 105.6 0 121.7 0H518.3C534.4 0 549.3 8.021 558.2 21.37L633.8 134.7C637.8 140.8 640 147.9 640 155.2C640 175.5 623.5 192 603.2 192H36.84C16.5 192 .0003 175.5 .0003 155.2H0zM64 224H128V384H320V224H384V464C384 490.5 362.5 512 336 512H112C85.49 512 64 490.5 64 464V224zM512 224H576V480C576 497.7 561.7 512 544 512C526.3 512 512 497.7 512 480V224z"></path>
                                            </svg><!-- <i class="fa-solid fa-shop"></i> Font Awesome fontawesome.com -->Service Type </label>
                                        <select class="form-control" name="servicetype" id="servicetype" value="">
                                            <option value="" disabled="">Select Model</option>
                                            <option value="Mobile">Mobile</option>
                                            <option value="InShop">In Shop</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="inst_id">Installer<span class="text-danger">*</span></label>
                                            <select class="form-control" name="inst_id" id="inst_id" required="">
                                                <option value="0" selected="" disabled="">Select Installer</option>
                                                <option value="7">installer_1</option>
                                                <option value="8">Installer_2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <hr>


                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label for="reference">Reference <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="reference" required="" readonly="" value="SL-00105">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="date">Date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="date" required="" value="2023-01-18">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <select class="form-control" name="status" id="status" required="">
                                            <option value="Pending">Pending</option>
                                            <option value="Shipped">Shipped</option>
                                            <option selected="" value="Completed">Completed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="payment_method">Payment Method <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="payment_method" required="" value="Cash" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="paid_amount">Amount Received <span class="text-danger">*</span></label>
                                        <input id="paid_amount" type="text" class="form-control" name="paid_amount" required="" value="99" readonly="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="note">Note (If Needed)</label>
                                <textarea name="note" id="note" rows="5" class="form-control"></textarea>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">
                                    Update Sale <i class="bi bi-check"></i>
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