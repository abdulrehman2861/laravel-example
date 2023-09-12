@extends('dashboard.layouts.master')
@section('title', 'Autoglass depot')@push('styles')
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
        <div wire:id="6ykBJNT552I0YdSNC5G0" class="position-relative">
          <div class="card mb-0 border-0 shadow-sm">
            <div class="card-body">
              <div class="form-group mb-0">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="bi bi-search text-primary"></i>
                    </div>
                  </div>
                  <input wire:keydown.escape="resetQuery" wire:model.debounce.500ms="query" type="text" id="sproduct"
                    class="form-control" placeholder="Type product name or code....">
                </div>
              </div>
            </div>
          </div>

          <div class="card-body shadow">
    <ul class="list-group list-group-flush">

        <li class="list-group-item list-group-item-action">
            <a wire:click="resetQuery"
                wire:click.prevent=" selectProduct({&quot;id&quot;:12777,&quot;product_name&quot;:&quot;2008,BMW,528,Windshield&quot;,&quot;product_part_number&quot;:&quot;FW02993 GGY  &quot;,&quot;interchange_part_name&quot;:&quot;&quot;,&quot;product_shelf_number&quot;:&quot;&quot;,&quot;product_barcode_symbology&quot;:null,&quot;product_quantity&quot;:5,&quot;product_cost&quot;:0,&quot;product_price&quot;:55,&quot;product_unit&quot;:null,&quot;product_stock_alert&quot;:null,&quot;product_order_tax&quot;:null,&quot;product_tax_type&quot;:null,&quot;product_note&quot;:null,&quot;suppliers_id&quot;:0,&quot;category_id&quot;:0,&quot;subcategories_id&quot;:0,&quot;years_id&quot;:25,&quot;models_id&quot;:332,&quot;makers_id&quot;:20,&quot;bodystyles_id&quot;:8,&quot;glasses_id&quot;:5,&quot;features_id&quot;:963,&quot;part_id&quot;:1961,&quot;product_interchange_part_number&quot;:null,&quot;warehouse_id&quot;:0,&quot;created_at&quot;:&quot;2022-07-19T03:55:38.000000Z&quot;,&quot;updated_at&quot;:&quot;2023-01-08T15:52:07.000000Z&quot;,&quot;media&quot;:[]}) "
                href="#">
                2008 - 2008,BMW,528,Windshield | FW02993 GGY ( BMW | 528 | 4 Door Sedan | Windshield | Windshield with
                Condensation Sensor, Lane Departure Warning System, Rain Sensor and Solar Coated )
            </a><a href="https://inventory.allstateautoglassinc.com/products/12777/edit"
                class="btn btn-info btn-sm m-1">
                <img src="\assets\images\dashboard\search\pen (2).png">
            </a>


        </li>
        <li class="list-group-item list-group-item-action">
            <a wire:click="resetQuery"
                wire:click.prevent=" selectProduct({&quot;id&quot;:12778,&quot;product_name&quot;:&quot;2008,BMW,535,Windshield&quot;,&quot;product_part_number&quot;:&quot;FW02993 GGY  &quot;,&quot;interchange_part_name&quot;:&quot;&quot;,&quot;product_shelf_number&quot;:&quot;&quot;,&quot;product_barcode_symbology&quot;:null,&quot;product_quantity&quot;:5,&quot;product_cost&quot;:0,&quot;product_price&quot;:55,&quot;product_unit&quot;:null,&quot;product_stock_alert&quot;:null,&quot;product_order_tax&quot;:null,&quot;product_tax_type&quot;:null,&quot;product_note&quot;:null,&quot;suppliers_id&quot;:0,&quot;category_id&quot;:0,&quot;subcategories_id&quot;:0,&quot;years_id&quot;:25,&quot;models_id&quot;:333,&quot;makers_id&quot;:20,&quot;bodystyles_id&quot;:8,&quot;glasses_id&quot;:5,&quot;features_id&quot;:963,&quot;part_id&quot;:1961,&quot;product_interchange_part_number&quot;:null,&quot;warehouse_id&quot;:0,&quot;created_at&quot;:&quot;2022-07-19T03:55:38.000000Z&quot;,&quot;updated_at&quot;:&quot;2023-01-08T15:52:07.000000Z&quot;,&quot;media&quot;:[]}) "
                href="#">
                2008 - 2008,BMW,535,Windshield | FW02993 GGY ( BMW | 535 | 4 Door Sedan | Windshield | Windshield with
                Condensation Sensor, Lane Departure Warning System, Rain Sensor and Solar Coated )
            </a><a href="https://inventory.allstateautoglassinc.com/products/12778/edit"
                class="btn btn-info btn-sm m-1">
                <img src="\assets\images\dashboard\search\pen (2).png">
            </a>


        </li>
        <li class="list-group-item list-group-item-action">
            <a wire:click="resetQuery"
                wire:click.prevent=" selectProduct({&quot;id&quot;:12779,&quot;product_name&quot;:&quot;2008,BMW,535,Windshield&quot;,&quot;product_part_number&quot;:&quot;FW02993 GGY  &quot;,&quot;interchange_part_name&quot;:&quot;&quot;,&quot;product_shelf_number&quot;:&quot;&quot;,&quot;product_barcode_symbology&quot;:null,&quot;product_quantity&quot;:5,&quot;product_cost&quot;:0,&quot;product_price&quot;:55,&quot;product_unit&quot;:null,&quot;product_stock_alert&quot;:null,&quot;product_order_tax&quot;:null,&quot;product_tax_type&quot;:null,&quot;product_note&quot;:null,&quot;suppliers_id&quot;:0,&quot;category_id&quot;:0,&quot;subcategories_id&quot;:0,&quot;years_id&quot;:25,&quot;models_id&quot;:333,&quot;makers_id&quot;:20,&quot;bodystyles_id&quot;:14,&quot;glasses_id&quot;:5,&quot;features_id&quot;:963,&quot;part_id&quot;:1961,&quot;product_interchange_part_number&quot;:null,&quot;warehouse_id&quot;:0,&quot;created_at&quot;:&quot;2022-07-19T03:55:38.000000Z&quot;,&quot;updated_at&quot;:&quot;2023-01-08T15:52:07.000000Z&quot;,&quot;media&quot;:[]}) "
                href="#">
                2008 - 2008,BMW,535,Windshield | FW02993 GGY ( BMW | 535 | 4 Door Station Wagon | Windshield |
                Windshield with Condensation Sensor, Lane Departure Warning System, Rain Sensor and Solar Coated )
            </a><a href="https://inventory.allstateautoglassinc.com/products/12779/edit"
                class="btn btn-info btn-sm m-1">
                <img src="\assets\images\dashboard\search\pen (2).png">
            </a>


        </li>
        <li class="list-group-item list-group-item-action">
            <a wire:click="resetQuery"
                wire:click.prevent=" selectProduct({&quot;id&quot;:12780,&quot;product_name&quot;:&quot;2008,BMW,550,Windshield&quot;,&quot;product_part_number&quot;:&quot;FW02993 GGY  &quot;,&quot;interchange_part_name&quot;:&quot;&quot;,&quot;product_shelf_number&quot;:&quot;&quot;,&quot;product_barcode_symbology&quot;:null,&quot;product_quantity&quot;:5,&quot;product_cost&quot;:0,&quot;product_price&quot;:55,&quot;product_unit&quot;:null,&quot;product_stock_alert&quot;:null,&quot;product_order_tax&quot;:null,&quot;product_tax_type&quot;:null,&quot;product_note&quot;:null,&quot;suppliers_id&quot;:0,&quot;category_id&quot;:0,&quot;subcategories_id&quot;:0,&quot;years_id&quot;:25,&quot;models_id&quot;:334,&quot;makers_id&quot;:20,&quot;bodystyles_id&quot;:8,&quot;glasses_id&quot;:5,&quot;features_id&quot;:963,&quot;part_id&quot;:1961,&quot;product_interchange_part_number&quot;:null,&quot;warehouse_id&quot;:0,&quot;created_at&quot;:&quot;2022-07-19T03:55:38.000000Z&quot;,&quot;updated_at&quot;:&quot;2023-01-08T15:52:07.000000Z&quot;,&quot;media&quot;:[]}) "
                href="#">
                2008 - 2008,BMW,550,Windshield | FW02993 GGY ( BMW | 550 | 4 Door Sedan | Windshield | Windshield with
                Condensation Sensor, Lane Departure Warning System, Rain Sensor and Solar Coated )
            </a><a href="https://inventory.allstateautoglassinc.com/products/12780/edit"
                class="btn btn-info btn-sm m-1">
                <img src="\assets\images\dashboard\search\pen (2).png">
            </a>


        </li>
        <li class="list-group-item list-group-item-action">
            <a wire:click="resetQuery"
                wire:click.prevent=" selectProduct({&quot;id&quot;:12781,&quot;product_name&quot;:&quot;2008,BMW,M5,Windshield&quot;,&quot;product_part_number&quot;:&quot;FW02993 GGY  &quot;,&quot;interchange_part_name&quot;:&quot;&quot;,&quot;product_shelf_number&quot;:&quot;&quot;,&quot;product_barcode_symbology&quot;:null,&quot;product_quantity&quot;:5,&quot;product_cost&quot;:0,&quot;product_price&quot;:55,&quot;product_unit&quot;:null,&quot;product_stock_alert&quot;:null,&quot;product_order_tax&quot;:null,&quot;product_tax_type&quot;:null,&quot;product_note&quot;:null,&quot;suppliers_id&quot;:0,&quot;category_id&quot;:0,&quot;subcategories_id&quot;:0,&quot;years_id&quot;:25,&quot;models_id&quot;:335,&quot;makers_id&quot;:20,&quot;bodystyles_id&quot;:8,&quot;glasses_id&quot;:5,&quot;features_id&quot;:963,&quot;part_id&quot;:1961,&quot;product_interchange_part_number&quot;:null,&quot;warehouse_id&quot;:0,&quot;created_at&quot;:&quot;2022-07-19T03:55:38.000000Z&quot;,&quot;updated_at&quot;:&quot;2023-01-08T15:52:07.000000Z&quot;,&quot;media&quot;:[]}) "
                href="#">
                2008 - 2008,BMW,M5,Windshield | FW02993 GGY ( BMW | M5 | 4 Door Sedan | Windshield | Windshield with
                Condensation Sensor, Lane Departure Warning System, Rain Sensor and Solar Coated )
            </a><a href="https://inventory.allstateautoglassinc.com/products/12781/edit"
                class="btn btn-info btn-sm m-1">
                <img src="\assets\images\dashboard\search\pen (2).png">
            </a>


        </li>





        <li class="list-group-item list-group-item-action text-center">
            <a wire:click.prevent="loadMore" class="btn btn-primary btn-sm" href="#">
                Load More <i class="bi bi-arrow-down-circle"></i>
            </a>
        </li>
    </ul>
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
                          <select wire:change.prevent="selectProductPara('year')" class="form-control" name="years_id"
                            id="years_id" wire:model="year" required="">

                            <option value="0" selected="" disabled="">Select Year</option>
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
                          <select wire:change.prevent="selectProductPara('make')" wire:change="models"
                            class="form-control" name="makers_id" id="makers_id" wire:model="make"
                            onchange="match('' , 'makers_id')" required="">
                            <option value="0" selected="" disabled="">Select Make</option>
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
                          <select wire:change.prevent="selectProductPara('model')" wire:change="bodys"
                            class="form-control" name="models_id" id="models_id" wire:model="model"
                            onchange="match('' , 'models_id')" required="">
                            <option value="0" selected="" disabled="">Select Model</option>

                          </select>
                          <input type="hidden" name="model" id="model" value="">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="models_id">Body Style </label>
                          <select wire:change.prevent="selectProductPara('body')" class="form-control"
                            name="bodystyles_id" id="bodystyles_id" wire:model="body" required="">

                            <option value="0" selected="" disabled="">Select Body Style</option>
                          </select>
                          <input type="hidden" name="body" id="body" value="">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="glasses_id">Glass </label>
                          <select wire:change.prevent="selectProductPara('glass')" class="form-control"
                            name="glasses_id" id="glasses_id" wire:model="glass" onchange="match('' , 'glasses_id')"
                            required="">
                            <!--  -->
                            <option value="0" selected="" disabled="">Select Glass</option>
                          </select>
                          <input type="hidden" name="glass" id="glass" value="">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="features_id">Feature </label>
                          <select wire:change.prevent="selectProductPara('feature')" class="form-control"
                            name="features_id" id="features_id" wire:model="feature">
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



      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form id="purchase-form" action="https://inventory.allstateautoglassinc.com/purchases" method="POST">
              <input type="hidden" name="_token" value="">
              <div class="form-row">
                <div class="col-lg-3">
                  <div class="form-group">
                    <label for="reference">Reference<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="reference" required="" readonly="" value="PR">
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="from-group">
                    <div class="form-group">
                      <label for="supplier_id">Supplier <span class="text-danger">*</span></label>
                      <select class="form-control" name="supplier_id" id="supplier_id" required="">
                        <option value="" selected="" disabled="">Select Supplier</option>
                        <option value="2">xyz Glass manufacturer</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="from-group">
                    <div class="form-group">
                      <label for="date">Issue Date <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" name="date" required="" value="2023-06-22">
                    </div>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="from-group">
                    <div class="form-group">
                      <label for="expected_date">Expected Receipt Date <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" name="expected_date" required="" value="2023-06-22">
                    </div>
                  </div>
                </div>
              </div>


              <div class="form-row">
                <div class="col-lg-3">
                  <div class="form-group">
                    <label for="status">Status <span class="text-danger">*</span></label>
                    <select class="form-control" name="status" id="status" required="">
                      <option value="Pending">Pending</option>
                      <option value="Ordered">Ordered</option>
                      <option value="Completed">Completed</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="warehouse_id">Ship To Location <span class="text-danger">*</span></label>
                    <select class="form-control" name="warehouse_id" id="warehouse_id" required="">
                      <option value="" selected="" disabled="">Select Warehouse</option>
                      <option value="1">Falls Church</option>
                      <option value="2">Manassas</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="from-group">
                    <div class="form-group">
                      <label for="payment_method">Payment Method <span class="text-danger">*</span></label>
                      <select class="form-control" name="payment_method" id="payment_method" required="">
                        <option value="Cash">Cash</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="Bank Transfer">Bank Transfer</option>
                        <option value="Cheque">Cheque</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label for="paid_amount">Amount Paid <span class="text-danger">*</span></label>
                    <div class="input-group">
                      <input id="paid_amount" type="text" class="form-control" name="paid_amount" required="">
                      <div class="input-group-append">
                        <button id="getTotalAmount" class="btn btn-primary" type="button">
                          <i class="bi bi-check-square"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                    <label class="custom-control-label" for="customSwitch1" style="width:200px;margin:20px 0px">Same as
                      Shipping Address</label>
                  </div>
                </div>
              </div>

              <div class="form-row">

                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="billto">Bill To</label>
                    <textarea name="billto" id="billto" rows="5" class="form-control"
                      placeholder="Billing Address"></textarea>
                  </div>
                </div>

                <div class="col-lg-6 ">
                  <div class="form-group">
                    <label for="shipto">Ship To</label>
                    <textarea name="shipto" id="shipto" rows="5" class="form-control"
                      placeholder="Shipping Address"> </textarea>
                  </div>
                </div>
              </div>

              <div>
                <div>
                  <div class="table-responsive position-relative">
                    <div class="col-12 position-absolute justify-content-center align-items-center"
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
                      <input wire:model.lazy="global_discount" type="number" class="form-control"
                        name="discount_percentage" min="0" max="100" value="0" required="">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="shipping_amount">Shipping</label>
                      <input wire:model.lazy="shipping" type="number" class="form-control" name="shipping_amount"
                        min="0" value="0" required="" step="0.01">
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
                      <input wire:model.lazy="global_tax" type="number" class="form-control global_tax"
                        name="tax_percentage" min="0" max="100" value="0" required="">
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
                  }
                  else {
                    div.style.display = "block";
                  }
                }
              </script>
              <div class="form-row">

                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="note">Order Notes (If Needed)</label>
                    <textarea name="note" id="order_note" rows="5" class="form-control"
                      placeholder="External Notes"></textarea>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="note">Internal Notes (If Needed)</label>
                    <textarea name="note" id="internal_note" rows="5" class="form-control"
                      placeholder="Internal Notes"></textarea>
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