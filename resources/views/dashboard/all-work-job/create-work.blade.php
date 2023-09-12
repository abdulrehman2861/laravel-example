@extends('dashboard.layouts.master')

@section('title', 'Auto Glass depo')

@push('styles')



<style>

</style>
@endpush

@section('content')

<div style="padding:20px">
    <main class="c-main">

        <div class="container-fluid mb-4">
            <div class="row">
                <div class="col-12">
                    <div wire:id="57RBbH9lcgOLLRKAa54D" class="position-relative">
                        <div class="card mb-0 border-0 shadow-sm" style="z-index:1">
                            <div class="card-body">
                                <div class="form-group mb-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="bi bi-search text-primary"></i>
                                            </div>
                                        </div>
                                        <input  type="text" id="sproduct" class="form-control" placeholder="Type product name or code....">
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
                        <div class="position-fixed w-100 h-100" style="left: 0; top: 0; right: 0; bottom: 0;  " wire:click="resetQuery"></div>
                        <div class="card   mt-1" style="  left: 0;right: 0;border: 0;">
                            <div class="card-body shadow">
                                <ul class="list-group list-group-flush">






                                    <li class="list-group-item list-group-item-action">
                                        <a wire:click="resetQuery" wire:click.prevent=" selectProduct({&quot;id&quot;:7,&quot;product_name&quot;:&quot;2006,Chrysler,Sebring,Back Glass&quot;,&quot;product_part_number&quot;:&quot;DB12626GTN&quot;,&quot;interchange_part_name&quot;:&quot;&quot;,&quot;product_shelf_number&quot;:&quot;z22&quot;,&quot;product_barcode_symbology&quot;:&quot;C128&quot;,&quot;product_quantity&quot;:5,&quot;product_cost&quot;:10,&quot;product_price&quot;:300,&quot;product_unit&quot;:null,&quot;product_stock_alert&quot;:null,&quot;product_order_tax&quot;:null,&quot;product_tax_type&quot;:null,&quot;product_note&quot;:null,&quot;suppliers_id&quot;:0,&quot;category_id&quot;:null,&quot;subcategories_id&quot;:0,&quot;years_id&quot;:8,&quot;models_id&quot;:5,&quot;makers_id&quot;:5,&quot;bodystyles_id&quot;:4,&quot;glasses_id&quot;:4,&quot;features_id&quot;:3,&quot;part_id&quot;:4,&quot;product_interchange_part_number&quot;:null,&quot;warehouse_id&quot;:1,&quot;created_at&quot;:&quot;2022-07-19T03:53:07.000000Z&quot;,&quot;updated_at&quot;:&quot;2023-01-17T19:00:38.000000Z&quot;,&quot;media&quot;:[]}) " href="#">
                                            2006 - 2006,Chrysler,Sebring,Back Glass | DB12626GTN ( Chrysler | Sebring | 2 Door Convertible | Back Glass | No Data Available )
                                        </a><a href="items-add-product" class="btn btn-info btn-sm m-1">
                                            <img src="./assets/images/dashboard/search/pen (2).png">
                                        </a>


                                    </li>










                                    <li class="list-group-item list-group-item-action">
                                        <a wire:click="resetQuery" wire:click.prevent=" selectProduct({&quot;id&quot;:10506,&quot;product_name&quot;:&quot;2006,Jaguar,X Type,Windshield&quot;,&quot;product_part_number&quot;:&quot;FW03453&quot;,&quot;interchange_part_name&quot;:&quot;&quot;,&quot;product_shelf_number&quot;:&quot;&quot;,&quot;product_barcode_symbology&quot;:null,&quot;product_quantity&quot;:5,&quot;product_cost&quot;:0,&quot;product_price&quot;:55,&quot;product_unit&quot;:null,&quot;product_stock_alert&quot;:null,&quot;product_order_tax&quot;:null,&quot;product_tax_type&quot;:null,&quot;product_note&quot;:null,&quot;suppliers_id&quot;:0,&quot;category_id&quot;:0,&quot;subcategories_id&quot;:0,&quot;years_id&quot;:8,&quot;models_id&quot;:488,&quot;makers_id&quot;:14,&quot;bodystyles_id&quot;:8,&quot;glasses_id&quot;:5,&quot;features_id&quot;:781,&quot;part_id&quot;:1688,&quot;product_interchange_part_number&quot;:null,&quot;warehouse_id&quot;:0,&quot;created_at&quot;:&quot;2022-07-19T03:55:14.000000Z&quot;,&quot;updated_at&quot;:&quot;2023-01-08T15:49:36.000000Z&quot;,&quot;media&quot;:[]}) " href="#">
                                            2006 - 2006,Jaguar,X Type,Windshield | FW03453 ( Jaguar | X Type | 4 Door Sedan | Windshield | Windshield with Electrochromic Mirror, Rain Sensor and Third Visor Frit. )
                                        </a><a href="items-add-product" class="btn btn-info btn-sm m-1">
                                            <img src="./assets/images/dashboard/search/pen (2).png">
                                        </a>


                                    </li>










                                    <li class="list-group-item list-group-item-action">
                                        <a wire:click="resetQuery" wire:click.prevent=" selectProduct({&quot;id&quot;:10507,&quot;product_name&quot;:&quot;2006,Jaguar,X Type,Windshield&quot;,&quot;product_part_number&quot;:&quot;FW03453&quot;,&quot;interchange_part_name&quot;:&quot;&quot;,&quot;product_shelf_number&quot;:&quot;&quot;,&quot;product_barcode_symbology&quot;:null,&quot;product_quantity&quot;:5,&quot;product_cost&quot;:0,&quot;product_price&quot;:55,&quot;product_unit&quot;:null,&quot;product_stock_alert&quot;:null,&quot;product_order_tax&quot;:null,&quot;product_tax_type&quot;:null,&quot;product_note&quot;:null,&quot;suppliers_id&quot;:0,&quot;category_id&quot;:0,&quot;subcategories_id&quot;:0,&quot;years_id&quot;:8,&quot;models_id&quot;:488,&quot;makers_id&quot;:14,&quot;bodystyles_id&quot;:14,&quot;glasses_id&quot;:5,&quot;features_id&quot;:781,&quot;part_id&quot;:1688,&quot;product_interchange_part_number&quot;:null,&quot;warehouse_id&quot;:0,&quot;created_at&quot;:&quot;2022-07-19T03:55:14.000000Z&quot;,&quot;updated_at&quot;:&quot;2023-01-08T15:49:36.000000Z&quot;,&quot;media&quot;:[]}) " href="#">
                                            2006 - 2006,Jaguar,X Type,Windshield | FW03453 ( Jaguar | X Type | 4 Door Station Wagon | Windshield | Windshield with Electrochromic Mirror, Rain Sensor and Third Visor Frit. )
                                        </a><a href="items-add-product" class="btn btn-info btn-sm m-1">
                                            <img src="./assets/images/dashboard/search/pen (2).png">
                                        </a>


                                    </li>










                                    <li class="list-group-item list-group-item-action">
                                        <a wire:click="resetQuery" wire:click.prevent=" selectProduct({&quot;id&quot;:13248,&quot;product_name&quot;:&quot;2006,Mitsubishi,Endeavor,Windshield&quot;,&quot;product_part_number&quot;:&quot;FW02886 GBN&quot;,&quot;interchange_part_name&quot;:&quot;&quot;,&quot;product_shelf_number&quot;:&quot;&quot;,&quot;product_barcode_symbology&quot;:null,&quot;product_quantity&quot;:5,&quot;product_cost&quot;:0,&quot;product_price&quot;:55,&quot;product_unit&quot;:null,&quot;product_stock_alert&quot;:null,&quot;product_order_tax&quot;:null,&quot;product_tax_type&quot;:null,&quot;product_note&quot;:null,&quot;suppliers_id&quot;:0,&quot;category_id&quot;:0,&quot;subcategories_id&quot;:0,&quot;years_id&quot;:8,&quot;models_id&quot;:558,&quot;makers_id&quot;:12,&quot;bodystyles_id&quot;:5,&quot;glasses_id&quot;:5,&quot;features_id&quot;:3,&quot;part_id&quot;:2017,&quot;product_interchange_part_number&quot;:null,&quot;warehouse_id&quot;:0,&quot;created_at&quot;:&quot;2022-07-19T03:55:43.000000Z&quot;,&quot;updated_at&quot;:&quot;2023-01-08T15:52:40.000000Z&quot;,&quot;media&quot;:[]}) " href="#">
                                            2006 - 2006,Mitsubishi,Endeavor,Windshield | FW02886 GBN ( Mitsubishi | Endeavor | 4 Door Utility | Windshield | No Data Available )
                                        </a><a href="items-add-product" class="btn btn-info btn-sm m-1">
                                            <img src="./assets/images/dashboard/search/pen (2).png">
                                        </a>


                                    </li>










                                    <li class="list-group-item list-group-item-action">
                                        <a wire:click="resetQuery" wire:click.prevent=" selectProduct({&quot;id&quot;:13277,&quot;product_name&quot;:&quot;2006,Volkswagen,GTI,Windshield&quot;,&quot;product_part_number&quot;:&quot;FW02882 GTY&quot;,&quot;interchange_part_name&quot;:&quot;&quot;,&quot;product_shelf_number&quot;:&quot;&quot;,&quot;product_barcode_symbology&quot;:null,&quot;product_quantity&quot;:5,&quot;product_cost&quot;:0,&quot;product_price&quot;:55,&quot;product_unit&quot;:null,&quot;product_stock_alert&quot;:null,&quot;product_order_tax&quot;:null,&quot;product_tax_type&quot;:null,&quot;product_note&quot;:null,&quot;suppliers_id&quot;:0,&quot;category_id&quot;:0,&quot;subcategories_id&quot;:0,&quot;years_id&quot;:8,&quot;models_id&quot;:525,&quot;makers_id&quot;:13,&quot;bodystyles_id&quot;:19,&quot;glasses_id&quot;:5,&quot;features_id&quot;:972,&quot;part_id&quot;:2020,&quot;product_interchange_part_number&quot;:null,&quot;warehouse_id&quot;:0,&quot;created_at&quot;:&quot;2022-07-19T03:55:43.000000Z&quot;,&quot;updated_at&quot;:&quot;2023-01-08T15:52:42.000000Z&quot;,&quot;media&quot;:[]}) " href="#">
                                            2006 - 2006,Volkswagen,GTI,Windshield | FW02882 GTY ( Volkswagen | GTI | 2 Door Hatchback | Windshield | Windshield with PAAS System and Third Visor Frit )
                                        </a><a href="items-add-product" class="btn btn-info btn-sm m-1">
                                            <img src="./assets/images/dashboard/search/pen (2).png">
                                        </a>


                                    </li>





                                    <li class="list-group-item list-group-item-action text-center">
                                        <a wire:click.prevent="loadMore" class="btn btn-primary btn-sm" href="#">
                                            Load More <i class="bi bi-arrow-down-circle"></i>
                                        </a>
                                    </li>
                                </ul>
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






                    <!-- Livewire Component wire-end:57RBbH9lcgOLLRKAa54D -->
                </div>
            </div>
        </div>
        <div class="container-fluid mb-4">



            <div id="product-search">

            </div>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" style="padding: 11px;">

                            <div class="card-body">

                                <div class="table-responsive-sm">
                                    <table class="table table-striped">
                                        <!--<thead>-->
                                        <!--<tr>-->
                                        <!--    <th class="align-middle">Part Number</th>-->
                                        <!--    <th class="align-middle">Product</th>-->
                                        <!--    <th class="align-middle">Interchange Part Number</th>-->
                                        <!--    <th class="align-middle">Stock</th>-->
                                        <!--    <th class="align-middle">Quantity</th>-->
                                        <!--    <th class="align-middle">Net Unit Price</th>-->
                                        <!--    <th class="align-middle">Sub Total</th>-->
                                        <!--    <th class="align-middle">Action</th>-->
                                        <!--</tr>-->

                                        <tbody id="product-search">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <!--<div class="col-lg-4 col-sm-5 ml-md-auto">-->
                                    <!--    <table class="table">-->
                                    <!--        <tbody>-->
                                    <!--        <tr>-->
                                    <!--            <td class="left"><strong>Discount ( <span id="discountper">0</span> %)</strong></td>-->
                                    <!--            <td class="right">$<span id="discount_">0</span></td>-->

                                    <!--        </tr>-->

                                    <!--        <tr>-->
                                    <!--            <td class="left"><strong>Grand Total</strong></td>-->
                                    <!--            <td class="right"><strong>$<span id="total">0</span></strong></td>-->
                                    <!--            <input type="hidden" name="totalh" id="totalh" value="0">-->
                                    <!--            <input type="hidden" name="totalb" id="totalb" value="0">-->
                                    <!--        </tr>-->
                                    <!--        </tbody>-->
                                    <!--    </table>-->
                                </div>
                            </div>
                            <div >
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

                            <!-- Livewire Component wire-end:lvpmrXlY8ppGHJHLK4Hw -->

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form id="quotation-form" action="https://inventory.allstateautoglassinc.com/quotations" method="POST">
                            <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln">
                            <div class="form-row">
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="customerch" name="customerch">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-3" style="margin-left: -30px">

                                    <label class="form-check-label" for="tax">Existing Customers</label>

                                </div>
                                <div class="col-md-8" style="margin-left: -30px">

                                </div>
                            </div>
                            <br>
                            <h5 class="mb-4 "><i>Customer Information</i></h5>
                            <div class="form-row">
                                <div class="col-lg-4 cus" style="display: none">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="customer_id">Customers<span class="text-danger">*</span></label>
                                            <select class="form-control" name="customer_id" id="customer_id" onchange="getcustomer()" required="">
                                                <option value="0" selected="" disabled="">Select Customer</option>
                                                <option value="18">Cust_3</option>

                                                <option value="19">Cust_2</option>

                                                <option value="23">Cus_1</option>


                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="servicetype">Service Type </label>
                                        <select class="form-control" name="servicetype" id="servicetype">
                                            <option value="" disabled="">Select Model</option>
                                            <option value="Mobile">Mobile</option>
                                            <option value="InShop">In Shop</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="inst_id">Installer<span class="text-danger"></span></label>
                                            <select class="form-control" name="inst_id" id="inst_id">
                                                <option value="0" selected="" disabled="">Select Installer</option>
                                                <option value="7">installer_1</option>
                                                <option value="8">Installer_2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="schedule">Appointment Time<span class="text-danger"></span></label>
                                            <select class="form-control" name="schedule" id="schedule">
                                                <option value="" selected="" disabled="">Select Appointment Time</option>
                                                <option value="0ato0a">Not Scheduled</option>
                                                <option value="8ato10a">8am-10am</option>
                                                <option value="10ato12p">10am-12pm</option>
                                                <option value="1pto3p">1pm-3pm</option>
                                                <option value="3pto5p">3pm-5pm</option>
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
                                                            <label for="customer_name">Customer Name <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control remcus" name="customer_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="contact_person">Contact Person </label>
                                                            <input type="text" class="form-control remcus" name="contact_person">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="customer_email">Email </label>
                                                            <input type="email" class="form-control remcus" name="customer_email">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="customer_type_id">Customer Type </label>
                                                            <select class="form-control remcus" name="customer_type_id" id="customer_type_id">
                                                                <option value="" selected="" disabled="">Select Type</option>
                                                                <option value="2">Walk</option>
                                                                <option value="3">Phone Call</option>
                                                                <option value="4">Website</option>
                                                                <option value="5">Insurance</option>
                                                                <option value="6">Dealer/Shop Accounts</option>
                                                                <option value="7">Mobile Glass Installer</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="customer_phone">Phone </label>
                                                            <input type="text" class="form-control remcus" name="customer_phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="customer_phone_alt">Phone (Alternate) </label>
                                                            <input type="text" class="form-control remcus" name="customer_phone_alt">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="fax">Fax </label>
                                                            <input type="text" class="form-control remcus" name="fax">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="discount_type">Discount </label>
                                                            <select class="form-control remcus" name="discount_type" id="discount_type">
                                                                <option value="" selected="" disabled="">Select Discount</option>
                                                                <option value="None" selected="">None</option>
                                                                <option value="Rate">Discount in Rates</option>
                                                                <option value="Percentage">Discount in Percentage</option>
                                                            </select>

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 discount remcus" style="display: none">
                                                        <div class="form-group">
                                                            <label for="discount">Discount</label>
                                                            <div class="input-group">
                                                                <input id="discount" type="text" class="form-control" name="discount">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-percent"></i></span>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="state">State </label>
                                                            <input type="text" class="form-control remcus" name="state">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="city"> City</label>
                                                            <input type="text" class="form-control remcus" name="city">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="country">Country </label>
                                                            <input type="text" class="form-control remcus" name="country">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row insurance" style="display: none">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="company_name">Insurance Company Name </label>
                                                            <input type="text" class="form-control remcus" name="company_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="insurance_policy_number">Insurance Policy Number </label>
                                                            <input type="text" class="form-control remcus" name="insurance_policy_number">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="insurance_auth_number"> Insurance Authentication Number </label>
                                                            <input type="text" class="form-control remcus" name="insurance_auth_number">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="insurance_company_phone">Insurance Company Phone Number </label>
                                                            <input type="text" class="form-control remcus" name="insurance_company_phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="insurance_type_of_claim">Insurance Type of Claim </label>
                                                            <input type="text" class="form-control remcus" name="insurance_type_of_claim">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="insurance_deductible_amount">Insurance Deductible Amount </label>
                                                            <input type="text" class="form-control remcus" name="insurance_deductible_amount" id="insurance_deductible_amount">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row account" style="display: none">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="business_name">Business Name </label>
                                                            <input type="text" class="form-control remcus" name="business_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="account_number">Account Number </label>
                                                            <input type="text" class="form-control remcus" name="account_number">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="account_tax_id"> Tax Id </label>
                                                            <input type="text" class="form-control remcus" name="account_tax_id">
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="billing_address">Billing Address </label>

                                                            <textarea name="billing_address" id="billing_address" rows="4" class="form-control remarea"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="service_address">Service Address </label>

                                                            <textarea name="service_address" id="service_address" rows="4" class="form-control remarea"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="notes">Notes </label>
                                                            <textarea name="notes" id="notes" rows="4" class="form-control remarea"></textarea>
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
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="reference">Reference <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="reference" required="" readonly="" value="QT-00171">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="date">Date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="date" required="" value="2023-06-24">
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
                                            <option value="Completed">Completed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="totalam" value="">

                            <div class="form-group">
                                <label for="note">Note (If Needed)</label>
                                <textarea name="note" id="note" rows="5" class="form-control"></textarea>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">
                                    Create Quotation <i class="bi bi-check"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>



</div>






@endsection

@push('scripts')

@endpush