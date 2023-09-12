@extends('dashboard.layouts.master')

@section('title', 'Autoglass depot')@push('styles')
    <!-- Style css-->
    <link href="/assets/css/style.css" rel="stylesheet">

    <!-- Select2 css -->
    {{-- <link href="../assets/plugins/select2/css/select2.min.css" rel="stylesheet"> --}}

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/vendors/css/file-uploaders/dropzone.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/css/plugins/forms/form-file-uploader.css">
    <!-- END: Page CSS-->




    <style>
        .hrstyle {
            border: 0;
            border-color: currentcolor rgba(0, 0, 21, .2) rgba(0, 0, 21, .2);
            border-top: 1px solid rgba(0, 0, 21, .2);
            margin-bottom: 1rem;
            margin-top: 1rem;
        }

        .data-repeater:first-child .minus-btn {
            display: none
        }

        .data-repeater:first-child .plus-btn {
            display: block !important
        }

        .show {
            opacity: 1 !important;
        }

        .modal {
            background: rgba(0, 0, 0, 0.4) !important;
        }

        .button-to-table button {
            background: #ced2d8 !important;
            color: black !important;
            border-right: 1px solid #636f83;
            box-shadow: 0 1px 1px 0 rgba(60, 75, 100, .14), 0 2px 1px -1px rgba(60, 75, 100, .12), 0 1px 3px 0 rgba(60, 75, 100, .2);

        }

        .button-to-table button:hover {
            color: white !important;
            background: #636f83 !important
        }


        .fade:not(.show) {
            opacity: 1 !important;
        }

        .dz-success-mar {
            background: red !important
        }
    </style>
@endpush

@section('content')
    <form id="productForm" action="{{ route('dashboard.product.update', $product->id) }}" method="post" class="repeater"
        enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12 col-md-12">
            <button type="submit" class="btn btn-primary" style="margin-left:20px">
                Update Product +
            </button>
            `
        </div>
        <div style="padding:20px">
            <div style="background:white;padding:20px 10px;border: 1px solid #d8dbe0;border-radius: 0.25rem;">


                <!-- Row -->
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body">

                                <div class="row row-sm mg-b-20">
                                    <div class="col-lg-4">
                                        <p class="mg-b-10">Product Name</p>
                                        <input class="form-control" name="part_name" placeholder="Enter name"
                                            type="text" value="{{$product->part_name}}">
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                        <p class="mg-b-10">Part Number *</p>
                                        <input class="form-control" name="part_number" placeholder="Enter part number"
                                            type="text" value="{{$product->part_number}}">
                                    </div><!-- col-4 -->
                                    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                        <p class="mg-b-10">Product Shelf Number </p>
                                        <input class="form-control" name="shelf" placeholder="Enter shelf number"
                                            type="text" value="{{$product->shelf}}">
                                    </div><!-- col-4 -->
                                </div>
                                <div class="row row-sm" style="margin-top:30px">
                                    <div class="col-lg-4">
                                        <p class="mg-b-10">Warehouse *</p>
                                        <select class="form-control select2-with-search" name="warehouse_id">

                                            <option  disabled>
                                                Select Warehouse
                                            </option>

                                            @forelse ($warehouses as $warehouse)
                                                <option value="{{ $warehouse->id }}" @if($warehouse->id == $product->warehouse_id)  selected="true"  @endif>
                                                    {{ $warehouse->name }}
                                                </option>
                                            @empty
                                                <option selected="true" disabled>
                                                    No Data Available
                                                </option>
                                            @endforelse

                                        </select>
                                    </div>
                                    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                        <p class="mg-b-10">Barcode Symbology</p>
                                        <select class="form-control select2-with-search">
                                            <option disabled>
                                                Select Barcode Symbology
                                            </option>

                                            @forelse ($barcode_symbols as $key => $barcode_symbol)
                                                <option value="{{ $key }}" @if($key == $product->barcode_symbology) selected="true"  @endif>
                                                    {{ $barcode_symbol }}
                                                </option>
                                            @empty
                                                <option selected="true" disabled>
                                                    No Data Available
                                                </option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                        <p class="mg-b-10">Supplier</p>
                                        <select class="form-control select2-with-search">
                                            <option disabled>
                                                Select Suppier
                                            </option>

                                            @forelse ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" @if($supplier->id == $product->supplier_id) selected="true"  @endif>
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
                <!-- End Row -->


                <div data-repeater-list="product_fittings">
                    <div data-repeater-item class="data-repeater" >
                        <div class="col-lg-12 col-md-12 plus-btn" style="text-align:end;display:none">
                            <a data-repeater-create type="button" class="btn btn-success" style="font-sie:100px">
                                <img src="\assets\images\dashboard\search\plus.png">
                            </a>
                        </div>

                        <div class="col-lg-12 col-md-12 minus-btn" style="text-align:end">
                            <a data-repeater-delete type="button" class="btn btn-danger" style="font-sie:100px">
                                <img src="\assets\images\dashboard\search\minus.png">
                            </a>
                        </div>
                        <!-- Row -->
                        <div class="row row-sm" style="margin-top:20px">
                            <div class="col-lg-12 col-md-12">
                                <div class="card custom-card">
                                    <input type="hidden" name="id" class="id"/>
                                    <div class="card-body">

                                        <div class="row row-sm mg-b-20">
                                            <div class="col-lg-4">
                                                <p class="mg-b-10">Interchange Part Number</p>
                                                <select class="form-control select2-with-search" id="interPart"
                                                    name="interPart">
                                                    <option selected="true">
                                                        Select Interchange Part Number
                                                    </option>

                                                    @forelse ($products as $tmpProduct)
                                                        <option value="{{ $tmpProduct->id }}">
                                                            {{ $tmpProduct->part_number }}
                                                        </option>
                                                    @empty
                                                        <option selected="true" disabled>
                                                            No Data Available
                                                        </option>
                                                    @endforelse
                                                </select>
                                            </div><!-- col-4 -->
                                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                                <p class="mg-b-10">Category</p>
                                                <select class="form-control select2-with-search parent-category"
                                                    name="parent_category_id">
                                                    <option selected="true" disabled>
                                                        Select Category
                                                    </option>

                                                    @forelse ($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->name }}
                                                        </option>
                                                    @empty
                                                        <option selected="true" disabled>
                                                            No Data Available
                                                        </option>
                                                    @endforelse
                                                </select>
                                            </div><!-- col-4 -->
                                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                                <p class="mg-b-10">Sub Category</p>
                                                <select class="form-control select2-with-search category"
                                                    name="category_id" disabled>
                                                    <option selected="true">
                                                        Select sub Category
                                                    </option>
                                                </select>
                                            </div><!-- col-4 -->
                                        </div>
                                        <div class="row row-sm" style="margin-top:30px">
                                            <div class="col-lg-4">
                                                <p class="mg-b-10">Year Type</p>
                                                <select class="form-control select2-with-search" name="year_type">
                                                    <option selected="true" disabled>
                                                        Select Year Type
                                                    </option>

                                                    @forelse ($yearTypes as $yearType)
                                                        <option value="{{ $yearType }}">
                                                            {{ $yearType }}
                                                        </option>
                                                    @empty
                                                        <option selected="true" disabled>
                                                            No Data Available
                                                        </option>
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                                <p class="mg-b-10">Year <span class="year-rage-inp">From</span> </p>
                                                <select class="form-control select2-with-search" name="year_from_id">
                                                    <option selected="true" disabled>
                                                        Select Year
                                                    </option>

                                                    @forelse ($years as $year)
                                                        <option value="{{ $year->id }}">
                                                            {{ $year->name }}
                                                        </option>
                                                    @empty
                                                        <option selected="true" disabled>
                                                            No Data Available
                                                        </option>
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                                <p class="mg-b-10 year-rage-inp">Year To</p>
                                                <select class="form-control select2-with-search" name="year_to_id">
                                                    <option selected="true" disabled>
                                                        Select Year
                                                    </option>

                                                    @forelse ($years as $year)
                                                        <option value="{{ $year->id }}">
                                                            {{ $year->name }}
                                                        </option>
                                                    @empty
                                                        <option selected="true" disabled>
                                                            No Data Available
                                                        </option>
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                                <p class="mg-b-10">Make</p>
                                                <select class="form-control select2-with-search make" name="make_id">
                                                    <option selected="true" disabled>
                                                        Select Make
                                                    </option>

                                                    @forelse ($makes as $make)
                                                        <option value="{{ $make->id }}">
                                                            {{ $make->name }}
                                                        </option>
                                                    @empty
                                                        <option selected="true" disabled>
                                                            No Data Available
                                                        </option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row row-sm" style="margin-top:30px">
                                            <div class="col-lg-4">
                                                <p class="mg-b-10">Model</p>
                                                <select class="form-control select2-with-search model" name="car_id"
                                                    disabled>
                                                    <option selected="true" disabled>
                                                        Select Model
                                                    </option>
                                                </select>
                                            </div><!-- col-4 -->
                                        </div>


                                    </div>
                                    {{-- <div class="row row-sm" style="margin-top:30px">
                                        <div class="col-lg-12" style="text-align:end">
                                            <a type="button" class="btn btn-primary" style="margin-right:20px">
                                                <img src="\assets\images\dashboard\search\plus.png">
                                            </a>
                                        </div>
                                    </div> --}}
                                    <div class="row row-sm mg-b-20" style="margin:10px">
                                        <div class="col-lg-4">
                                            <p class="mg-b-10">Body Style</p>
                                            <select class="form-control select2-with-search bodyStyle"
                                                name="body_style_id" disabled>
                                                <option selected="true">
                                                    Select Body Style
                                                </option>
                                            </select>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                            <p class="mg-b-10">Glass</p>
                                            <select class="form-control select2-with-search glass" name="glass_id"
                                                disabled>
                                                <option selected="true" disabled>
                                                    Select Glass
                                                </option>

                                                @forelse ($glasses as $glass)
                                                    <option value="{{ $glass->id }}">
                                                        {{ $glass->name }}
                                                    </option>
                                                @empty
                                                    <option selected="true" disabled>
                                                        No Data Available
                                                    </option>
                                                @endforelse
                                            </select>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                            <p class="mg-b-10">Feature</p>
                                            <select class="form-control select2-with-search feature" name="feature_id"
                                                disabled>
                                                <option selected="true" disabled>
                                                    Select Feature
                                                </option>
                                            </select>
                                        </div><!-- col-4 -->

                                        <div class="col-lg-3">
                                            <p class="mg-b-10">Calibration</p>

                                            <select class="form-control select2-with-search calibration" name="calibration">
                                                <option value="0" selected="true">
                                                    No
                                                </option>
                                                <option value="1">
                                                    Yes
                                                </option>
                                            </select>

                                        </div><!-- col-4 -->
                                        <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                            <p class="mg-b-10">Calibration price</p>
                                            <input class="form-control" name="calibration_price"
                                                placeholder="Enter Price" type="number">
                                        </div>

                                    </div>






                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>


            </div>
        </div>

        <!-- Row -->
        <div class="row row-sm" style="margin-top:20px">
            <div class="col-lg-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-body">

                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-3">
                                <p class="mg-b-10">Cost</p>
                                <input class="form-control" name="cost" placeholder="Enter Cost" type="number" value="{{$product->cost}}">
                            </div><!-- col-4 -->
                            <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">Price *</p>
                                <input class="form-control" name="price" placeholder="Enter Price" type="number" value="{{$product->price}}">
                            </div><!-- col-4 -->
                            <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">Quantity *</p>
                                <input class="form-control" name="quantity" placeholder="Enter Quantity" type="number" value="{{$product->quantity}}">
                            </div><!-- col-4 -->
                            <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">Alert Quantity</p>
                                <input class="form-control" name="alert_quantity" placeholder="Enter Alert Quantity"
                                    type="number" value="{{$product->alert_quantity}}">
                            </div><!-- col-4 -->
                        </div>
                        <div class="row row-sm mg-b-20 " style="margin-top:30px">
                            <div class="col-lg-3">
                                <p class="mg-b-10">Tax Applied</p>
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" name="apply_tax" class="custom-control-input"
                                            id="customSwitch1" value="1" @if($product->apply_tax) checked="true"  @endif>
                                        <label class="custom-control-label" for="customSwitch1"></label>
                                    </div>
                                </div>

                            </div><!-- col-4 -->
                            <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">Tax (%)</p>
                                <input class="form-control" name="tax" placeholder="Enter Tax" type="text" value="{{$product->tax}}">
                            </div><!-- col-4 -->
                            <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">Tax type</p>
                                <select class="form-control select2-with-search" name="tax_type" >
                                    <option disabled>
                                        Select Tax Type
                                    </option>

                                    @forelse ($taxTypes as $key => $tax_type)
                                        <option value="{{ $tax_type }}" @if($tax_type == $product->tax_type) selected="true"  @endif>
                                            {{ $tax_type }}
                                        </option>
                                    @empty
                                        <option selected="true" disabled>
                                            No Data Available
                                        </option>
                                    @endforelse
                                </select>
                            </div><!-- col-4 -->
                            <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                <p class="mg-b-10">Unit </p>
                                <input class="form-control" name="unit" placeholder="Enter Unit" type="text" value="{{$product->unit}}">
                            </div><!-- col-4 -->
                        </div>
                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Notes</label>
                                    <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="3">{{$product->note}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row row-sm">
                            <div class="col-lg-12 col-md-12">
                                <div class="card custom-card">
                                    <div class="card-body">


                                        <div>
                                            <p class="mg-b-10">Product Images (optional)</p>
                                            <!-- single file upload starts -->
                                            <div class="row">
                                                <div class="col-12">


                                                    <div class="dropzone dropzone-area" id="dpz-remove-thumb"
                                                        data-url="{{ route('dashboard.image.upload') }}"
                                                        data-token="{{ csrf_token() }}">
                                                        <div class="dz-message">Drop files here or click to upload.</div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- single file upload ends -->



                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>

    </form>








@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            'use strict';

            var $repeater = $('.repeater').repeater({

                show: function() {
                    $(this).slideDown();
console.log('add');
                    applyCustomIdsAndDataAttributes($(this));
                    attachChangeEvent($(this));
                },
                hide: function(deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                ready: function(setIndexes) {

                    setIndexes();

                    $('.repeater .data-repeater').each(function() {
                        applyCustomIdsAndDataAttributes($(this));
                        attachChangeEvent($(this));
                    });
                }
            });


            var value = '{!! json_encode($product->productFittings) !!}';
            // console.log("==========>", value);

            if (typeof value != 'undefined' && value.length != 0) {
                value = JSON.parse(value);
                $repeater.setList(value);
                for (var i = 0; i < value.length; i++) {
                    var parentEle = $('#productForm .id[value="' + value[i].id + '"]').parent();
                    parentEle.find('.parent-category').change();
                    parentEle.find('.category').val(value[i].category_id) ;

                    parentEle.find('.make').change();
                    parentEle.find('.model').val(value[i].car_id) ;

                    parentEle.find('.model').change();
                    parentEle.find('.bodyStyle').val(value[i].body_style_id) ;

                    parentEle.find('.bodyStyle').change();
                    parentEle.find('.glass').val(value[i].glass_id) ;

                    parentEle.find('.glass').change();
                    parentEle.find('.feature').val(value[i].feature_id) ;

                    parentEle.find('.calibration').val(value[i].calibration == true ? '1' : '0') ;
                    // tr.find('.item').val(value[i].product_id);
                    // console.log('=>>>>>>>>>>>tr','#sortable-table .id[value="' + value[i].id + '"]',tr);
                    // changeItem(tr.find('.item'));

                }
            }

            // window.outerRepeater = $('.outer-repeater').repeater({
            //     isFirstItemUndeletable: true,
            //     defaultValues: {
            //         'text-input': 'outer-default'
            //     },
            //     show: function() {
            //         console.log('outer show');
            //         $(this).slideDown();
            //     },
            //     hide: function(deleteElement) {
            //         console.log('outer delete');
            //         $(this).slideUp(deleteElement);
            //     },
            //     repeaters: [{
            //         isFirstItemUndeletable: true,
            //         selector: '.inner-repeater',
            //         defaultValues: {
            //             'inner-text-input': 'inner-default'
            //         },
            //         show: function() {
            //             console.log('inner show');
            //             $(this).slideDown();
            //         },
            //         hide: function(deleteElement) {
            //             console.log('inner delete');
            //             $(this).slideUp(deleteElement);
            //         }
            //     }]
            // });

            function applyCustomIdsAndDataAttributes($item) {

                var counter = $item.index() + 1;


                $item.find('.parent-category').attr('id', 'parent-category' + counter).attr('data-counter',
                    counter);
                $item.find('.category').attr('id', 'category' + counter).attr('data-counter', counter);
                $item.find('.make').attr('id', 'make' + counter).attr('data-counter', counter);
                $item.find('.model').attr('id', 'model' + counter).attr('data-counter', counter);
                $item.find('.bodyStyle').attr('id', 'bodyStyle' + counter).attr('data-counter', counter);
                $item.find('.glass').attr('id', 'glass' + counter).attr('data-counter', counter);
                $item.find('.feature').attr('id', 'feature' + counter).attr('data-counter', counter);
            }

            function attachChangeEvent($item) {

                var parentCategoryInput = $item.find('.parent-category');
                var categoryInput = $item.find('.category');
                var makeInput = $item.find('.make');
                var modelInput = $item.find('.model');
                var bodyStyleInput = $item.find('.bodyStyle');
                var glassInput = $item.find('.glass');
                var featureInput = $item.find('.feature');

                var modelSelect = $item.find('.model');
                var counter = makeInput.data('counter');

                //onchange for category
                parentCategoryInput.on('change',  function() {
                    var parentCategory = $(this).val();

                    // Empty the select tag of old data
                    categoryInput.empty().removeAttr('disabled');

                    // Add the "Select category" option
                    var selectOption = $('<option>').val('').text('Select Category');
                    categoryInput.append(selectOption);

                    // Fetch models related to the selected category using AJAX
                     $.ajax({
                        url: '{{ route('dashboard.category.fetch.subcategory') }}',
                        method: 'POST',
                        async: false,
                        data: {
                            id: parentCategory
                        },
                        success: function(response) {
                            // Populate the model select tag with the fetched models
                            response.data.forEach(function(model) {
                                var option = $('<option>').val(model.id).text(model
                                    .name);
                                categoryInput.append(option);
                            });
                            console.log('ajaxdone->');
                        },
                        error: function(xhr, status, error) {
                            console.log('AJAX error:', error);
                        }
                    });
                });

                //onchange for make
                makeInput.on('change', function() {
                    var make = $(this).val();

                    // Empty the select tag of old data
                    modelInput.empty().removeAttr('disabled');

                    // Add the "Select model" option
                    var selectOption = $('<option>').val('').text('Select model');
                    modelInput.append(selectOption);

                    // Fetch models related to the selected make using AJAX
                    $.ajax({
                        url: '{{ route('dashboard.make.fetch.models') }}',
                        method: 'POST',
                        async: false,
                        data: {
                            id: make
                        },
                        success: function(response) {
                            // Populate the model select tag with the fetched models
                            response.data.forEach(function(model) {
                                var option = $('<option>').val(model.id).text(model
                                    .name);
                                modelInput.append(option);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.log('AJAX error:', error);
                        }
                    });
                });

                //onchange for model
                modelInput.on('change', function() {
                    var model = $(this).val();

                    // Empty the select tag of old data
                    bodyStyleInput.empty().removeAttr('disabled');

                    // Add the "Select" option
                    var selectOption = $('<option>').val('').text('Select Body Style');
                    bodyStyleInput.append(selectOption);

                    // Fetch related to the selected using AJAX
                    $.ajax({
                        url: '{{ route('dashboard.model.fetch.bodystyle') }}',
                        method: 'POST',
                        async: false,
                        data: {
                            id: model
                        },
                        success: function(response) {
                            // Populate the select tag with the fetched models
                            response.data.forEach(function(model) {
                                var option = $('<option>').val(model.id).text(model
                                    .name);
                                bodyStyleInput.append(option);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.log('AJAX error:', error);
                        }
                    });
                });

                //onchange for body style
                bodyStyleInput.on('change', function() {

                    glassInput.val('').removeAttr('disabled');
                });

                //onchange for glass
                glassInput.on('change', function() {
                    var glass = $(this).val();

                    // Empty the select tag of old data
                    featureInput.empty().removeAttr('disabled');

                    // Add the "Select" option
                    var selectOption = $('<option>').val('').text('Select Feature');
                    featureInput.append(selectOption);

                    // Fetch related to the selected using AJAX
                    $.ajax({
                        url: '{{ route('dashboard.glass.fetch.feature') }}',
                        method: 'POST',
                        async: false,
                        data: {
                            id: glass
                        },
                        success: function(response) {
                            // Populate the select tag with the fetched models
                            response.data.forEach(function(model) {
                                var option = $('<option>').val(model.id).text(model
                                    .name);
                                featureInput.append(option);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.log('AJAX error:', error);
                        }
                    });
                });
            }
        });

        $(document).ready(function() {
            $('#switcher').change(function() {
                if ($(this).is(':checked')) {
                    // Switcher is checked, perform some action
                    console.log('Switcher is ON');
                } else {
                    // Switcher is unchecked, perform some other action
                    console.log('Switcher is OFF');
                }
            });
        });

        Dropzone.autoDiscover = false;
        $(document).ready(function() {

            var removeThumb = $('#dpz-remove-thumb');
            var savedImageUrls = {!! json_encode($product->images()->pluck('img_url')) !!};
            var uploadedImages = [];

            removeThumb.dropzone({
                url: removeThumb.data('url'),
                paramName: 'file', // The name that will be used to transfer the file
                maxFilesize: 1, // MB
                addRemoveLinks: true,
                dictRemoveFile: ' Trash',
                acceptedFiles: 'image/*',
                headers: {
                    'X-CSRF-TOKEN': removeThumb.data('token')
                },

                success: function(file, response) {
                    // Add the uploaded image URL to the array
                    uploadedImages.push(response.data);

                    // Create a hidden field with the uploaded image URL
                    var hiddenField = $('<input>').attr('type', 'hidden').attr('name', 'images[]').val(
                        response.data);
                    file.previewElement.querySelector("[data-dz-thumbnail]").setAttribute("data-url",
                        response.data)
                    $('#productForm').append(hiddenField);

                    file.previewElement.classList.add('dz-success');
                },
                removedfile: function(file) {


                    var imageUrl = file.previewElement.querySelector("[data-dz-thumbnail]")
                        .getAttribute("data-url", imageUrl);
                    console.log('removing url', imageUrl);
                    if (savedImageUrls.includes(imageUrl)) {
                        // Create a hidden field with the image URL to be deleted
                        var deleteField = $('<input>').attr('type', 'hidden').attr('name',
                            'imagesToDelete[]').val(imageUrl);
                        $('#productForm').append(deleteField);
                    }

                    // Remove the corresponding hidden field by matching the URL
                    var hiddenField = $('#productForm').find('input[name="images[]"][value="' +
                        imageUrl + '"]');
                    hiddenField.remove();

                    // Remove the image URL from the array
                    var index = uploadedImages.indexOf(imageUrl);
                    if (index !== -1) {
                        uploadedImages.splice(index, 1);
                    }

                    file.previewElement.parentNode.removeChild(file.previewElement);
                },
                init: function() {

                    let myDropzone = this;

                    var baseUrl = "{{ url('') }}";
                    console.log('urls', savedImageUrls)
                    savedImageUrls.forEach(function(imageUrl) {
                        var mockFile = {
                            name: imageUrl,
                            size: 500000
                        }; // Create a mock file object
                        myDropzone.emit('addedfile',
                            mockFile); // Add the file to Dropzone
                        myDropzone.emit('thumbnail', mockFile, baseUrl +
                            imageUrl); // Set the preview image URL
                        myDropzone.emit('complete',
                            mockFile); // Set the upload status as complete


                        // Add the saved image URL to the array
                        uploadedImages.push(imageUrl);

                        var thumbnailElement = myDropzone.previewsContainer
                            .querySelector(
                                'img[data-dz-thumbnail][src="' + baseUrl + imageUrl + '"]'
                            );

                        if (thumbnailElement) {
                            thumbnailElement.setAttribute('data-url', imageUrl);
                        }

                        // Create a hidden field with the saved image URL
                        var hiddenField = $('<input>').attr('type', 'hidden').attr('name',
                            'images[]').val(
                            imageUrl);
                        $('#productForm').append(hiddenField);
                    });

                }
            });






        });
    </script>

    <script src="/assets/js/jquery.repeater.min.js"></script>
    <!-- BEGIN: Page JS-->
    {{-- <script src="/assets/app-assets/js/scripts/forms/form-file-uploader.js"></script> --}}
    <!-- END: Page JS-->
@endpush
