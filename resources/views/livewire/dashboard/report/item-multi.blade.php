<div>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form method="GET" action="#">
                        <div class="form-row">



                            <div class="col-md-3">

                                <div class="form-group">
                                    {{-- <div class="form-check form-switch">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="show_products"
                                                name="permissions[]" value="show_products">
                                            <label class="custom-control-label" for="show_products"></label>
                                        </div>
                                    </div> --}}
                                    <label for="category_id">Category </label>
                                    <select wire:model="categoryId" class="form-control"
                                        id="category_id"  >
                                        <option selected="true" value="">
                                            Select Category
                                        </option>

                                        @forelse ($category_list as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @empty
                                            <option >
                                                No Data Available
                                            </option>
                                        @endforelse
                                    </select>

                                </div>

                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="subcategories_id">Sub Category </label>
                                    <select wire:model="subcategories_id" class="form-control"
                                         id="subcategories_id" >

                                        <option selected="true" value="">
                                            Select Sub Category
                                        </option>

                                        @forelse ($subCategory_List as $subCategory)
                                            <option value="{{ $subCategory->id }}">
                                                {{ $subCategory->name }}
                                            </option>
                                        @empty
                                            <option >
                                                No Data Available
                                            </option>
                                        @endforelse


                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    {{-- <div class="form-check form-switch">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="show_products"
                                                name="permissions[]" value="show_products">
                                            <label class="custom-control-label" for="show_products"></label>
                                        </div>
                                    </div> --}}
                                    <label>Supplier</label>


                                    <select wire:model="supplier_id" class="form-control"
                                        id="supplier_id" >
                                        <option selected="true" value="">
                                            Select Supplier
                                        </option>

                                        @forelse ($supplier_list as $singleSupplier)
                                            <option value="{{ $singleSupplier->id }}">
                                                {{ $singleSupplier->name }}
                                            </option>
                                        @empty
                                            <option >
                                                No Data Available
                                            </option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    {{-- <div class="form-check form-switch">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="show_products"
                                                value="show_products">
                                            <label class="custom-control-label" for="show_products"></label>
                                        </div>
                                    </div> --}}
                                    <label>Warehouse</label>

                                    <select wire:model="warehouse_id" class="form-control" name="warehouse_id"
                                        id="warehouse_id" >
                                        <option selected="true" value="">
                                            Select Warehouse
                                        </option>

                                        @forelse ($warehouse_List as $warehouse)
                                            <option value="{{ $warehouse->id }}">
                                                {{ $warehouse->name }}
                                            </option>
                                        @empty
                                            <option >
                                                No Data Available
                                            </option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-md-1">
                                <div class="form-group">
                                    <div class="form-check form-switch">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" wire:model="lowStockProduct" class="custom-control-input" id="show_products"
                                                 value="1">
                                            <label class="custom-control-label" for="show_products"></label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3" style="margin-left: -30px">

                                <label class="form-check-label" for="lowstock">Low Level Stock</label>

                            </div>

                            {{-- <div class="col-md-1">
                                <div class="form-group">
                                    <div class="form-check form-switch">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="show_products"
                                                name="permissions[]" value="show_products">
                                            <label class="custom-control-label" for="show_products"></label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3" style="margin-left: -30px">

                                <label class="form-check-label" for="backstock">Back Order Stock</label>

                            </div> --}}



                        </div>
                        {{-- <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                <span wire:target="generateReport" wire:loading=""
                                    class="spinner-border spinner-border-sm" role="status"
                                    aria-hidden="true"></span>
                                <i wire:target="generateReport" wire:loading.remove=""
                                    class="bi bi-shuffle"></i>
                                Filter Report
                            </button>
                        </div> --}}


                    </form>
                </div>
            </div>
        </div>
    </div>














    <div class="row p-2">
        <div class="card col-12">
            <div class=" card-body  ">
                <div class="row mb-3">
                    <div class="col-md-4">

                        {{-- PerPage --}}
                        <div class="form-inline">
                            <label class="my-1 mr-2" for="showEntries">Show</label>
                            <select wire:model="perPage" id="showEntries" name="product_categories-table_length"
                                aria-controls="product_categories-table"
                                class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <label class="my-1 ml-2" for="showEntries">entries</label>
                        </div>


                    </div>

                    <div class="col-md-8">
                        <div style="display: flex; justify-content: end;" id="datatable_filter" class=""><label
                                class="labelstyle">Search: <input wire:model="searchKey" type="search"
                                    class="form-control input-sm" placeholder="" aria-controls="datatable"></label>
                        </div>
                    </div>
                </div>

                <div class="padding-class card" wire:loading.delay.longer wire:loading.flex>
                    <div class="spinner-border justify-content-center mx-auto" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

                <table wire:loading.remove id="my-all-items-table" class="table table-striped table-bordered"
                    cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Part number </th>
                            <th>Shelf</th>
                            <th>Shop</th>
                            <th>Price </th>
                            <th>Cost</th>
                            <th>In Stock</th>
                            <th>Alert Quantity</th>


                        </tr>
                    </thead>



                    <tbody>

                        @forelse ($products as $product)

                            <tr>
                                <td>{{ $product->part_number }}</td>
                                <td>{{ $product->shelf ?? '-' }}</td>
                                <td>{{ $product->warehouse?->name ?? '-' }}</td>
                                <td>${{ $product->price }}</td>
                                <td>${{ $product->cost }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->alert_quantity }}</td>



                            </tr>
                        @empty
                            <tr class="background-body-color">
                                <td class="text-center" colspan="11">
                                    No Data Available
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

                {{ $products->links() }}


            </div>
        </div>
    </div>
</div>
