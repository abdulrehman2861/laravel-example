<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">


            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body" id="removeDataTableActionButtons">


                            <div class="table-responsive">
                                <table class="table table-bordered" id="tblInventoryHeadhings">

                                    <thead>
                                        <tr class="text-center align-middle">
                                            <th width="10%;" colspan="2">Delete All</th>
                                            <th width="10%;">Shelf Column</th>
                                            <th width="10%">Warehouse Column</th>
                                            <th width="10%;">Price Column</th>
                                            <th width="10%;">Quantity Column</th>
                                            {{-- <th width="10%;">Cost Column</th> --}}
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td colspan="2" class="text-center align-middle">
                                                <button type="button" wire:click="deleteSelected" class="btn btn-danger"
                                                    id="bulk_delete">
                                                    Delete Selected
                                                </button>
                                            </td>

                                            <td class="text-center align-middle">

                                                <a class="btn btn-danger btn-sm m-1 custom-link-size"
                                                    id="empty_shelf" wire:click="emptyColumn('shelf','ids')">Empty Selected</a>
                                                <a class="btn btn-danger btn-sm m-1 custom-link-size"
                                                    id="empty_shelf_all" wire:click="emptyColumn('shelf','all')">Empty All</a>



                                            </td>

                                            <td class="text-center align-middle">

                                                <a class="btn btn-danger btn-sm m-1 custom-link-size"
                                                    id="empty_warehouse" wire:click="emptyColumn('warehouse_id','ids')">Empty Selected</a>
                                                <a class="btn btn-danger btn-sm m-1 custom-link-size"
                                                    id="empty_warehouse_all" wire:click="emptyColumn('warehouse_id','all')">Empty All</a>



                                            </td>

                                            <td class="text-center align-middle">

                                                <a class="btn btn-danger btn-sm m-1 custom-link-size"
                                                    id="empty_price" wire:click="emptyColumn('price','ids')">Empty Selected</a>
                                                <a class="btn btn-danger btn-sm m-1 custom-link-size"
                                                    id="empty_price_all" wire:click="emptyColumn('price','all')">Empty All</a>


                                            </td>

                                            <td class="text-center align-middle">

                                                <a class="btn btn-danger btn-sm m-1 custom-link-size"
                                                    id="empty_quantity" wire:click="emptyColumn('quantity','ids')">Empty Selected</a>
                                                <a class="btn btn-danger btn-sm m-1 custom-link-size"
                                                    id="empty_quantity_all" wire:click="emptyColumn('quantity','all')">Empty All</a>



                                            </td>

                                            {{-- <td colspan="2">

                                                <a class="btn btn-danger btn-sm m-1 custom-link-size"
                                                    id="empty_cost">Empty Selected</a>
                                                <a class="btn btn-danger btn-sm m-1 custom-link-size"
                                                    id="empty_cost_all">Empty All</a>


                                            </td> --}}
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <hr>


                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div>
                    <div class="row table-setting" style="padding:10px">
                        <div class="col-md-12 ">
                            <div class="row mb-3">
                                <div class="col-md-4">

                                    {{-- PerPage --}}
                                    <div class="form-inline">
                                        <label class="my-1 mr-2" for="showEntries">Show</label>
                                        <select wire:model="perPage" id="showEntries"
                                            name="product_categories-table_length"
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
                                    <div style="display: flex; justify-content: end;" id="datatable_filter"
                                        class=""><label class="labelstyle">Search: <input wire:model="searchKey"
                                                type="search" class="form-control input-sm" placeholder=""
                                                aria-controls="datatable"></label></div>
                                </div>
                            </div>

                            <div class="padding-class card" wire:loading.delay.longer wire:loading.flex>
                                <div class="spinner-border justify-content-center mx-auto" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>

                            <table wire:loading.remove id="my-all-items-table"
                                class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" wire:model="selectAll"> </th>
                                        <th>Part number </th>
                                        <th>Shelf</th>
                                        <th>Warehouse </th>
                                        <th>Price</th>
                                        <th>Quality </th>

                                    </tr>
                                </thead>



                                <tbody>

                                    @forelse ($products as $product)
                                        <tr>
                                            <td><input type="checkbox" wire:model="selectedProducts"
                                                    value="{{ $product->id }}"></td>
                                            <td>{{ $product->part_number }}</td>
                                            <td>{{ $product->shelf }}</td>
                                            <td>{{ $product->warehouse->name ?? '-' }}</td>
                                            <td>{{ $product->price }}
                                            <td>{{ $product->quantity }}
                                            </td>


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



                {{-- <div class="card-body">
                                <!-- Button trigger modal -->


                                <hr>

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example1">
                                        <thead>
                                            <tr class="even text-center align-middle">
                                                <th><input type="checkbox"> </th>
                                                <th>Part No </th>
                                                <th>Shelf</th>
                                                <th>Warehouse</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Cost</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd text-center align-middle">
                                                <td><input type="checkbox"></td>
                                                <td>Test_002</td>
                                                <td>T22</td>
                                                <td>Falls Church</td>
                                                <td>$0.00 </td>
                                                <td>5</td>
                                                <td>N/A
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
