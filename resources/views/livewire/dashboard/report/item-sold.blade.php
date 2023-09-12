<div>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form method="GET" action="#">
                        <div class="form-row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="category_id">From </label>
                                    <input wire:model="from" type="date"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">

                                <div class="form-group">
                                    <label for="category_id">To </label>
                                    <input wire:model="to" type="date"
                                        class="form-control">
                                </div>

                            </div>





                        </div>
                        <br>

                        <div class="form-group mb-0">
                            {{-- <button type="submit" class="btn btn-primary">
                                <span wire:target="generateReport" wire:loading=""
                                    class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <i wire:target="generateReport" wire:loading.remove="" class="bi bi-shuffle"></i>
                                Filter Report
                            </button> --}}
                            <a wire:click.prevent="resetAll" href="#" class="btn btn-info">Reset</a>
                        </div>
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
                                class="form-control input-sm" placeholder="" aria-controls="datatable"></label></div>
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
                        <th>No of Invoices</th>
                        <th>Price </th>
                        <th>QTY Sold</th>
                        <th>In Stock</th>
                        <th>Total</th>
                        <th>Status</th>

                    </tr>
                </thead>



                <tbody>

                    @forelse ($products as $product)

                    @php
                        $invoices = [];
                        $total = 0;
                        foreach ($product->saleTransactionDetails as $key => $tmpDetail)
                        {
                            $invoices[] = $tmpDetail->mainTransaction->so_no;
                            $total += $tmpDetail->rate * $tmpDetail->quantity;
                        }
                    @endphp
                        <tr>
                            <td>{{ $product->part_number }}</td>
                            <td>{{ implode(",", $invoices) }}</td>
                            <td>${{ $product->price }}</td>
                            <td>{{ $product->saleTransactionDetails()->sum('quantity')   }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>${{ $total }}</td>
                            <td>Paid</td>


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
