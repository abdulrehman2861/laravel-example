<div>
    <div class="row table-setting" style="padding:10px">
        <div class="col-md-12 ">
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
                        <th>Currency Name </th>
                        <th>Code</th>
                        <th>Symbol</th>
                        <th>Thousand Sperator</th>
                        <th>Decimal Seprator</th>
                        <th>Action</th>

                    </tr>
                </thead>



                <tbody>

                    @forelse ($currencies as $currency)
                        <tr>
                            <td>{{ $currency->name }}</td>
                            <td>{{ $currency->code }}</td>
                            <td>{{ $currency->symbol}}
                            </td>
                            <td>{{ $currency->thousand_separator }}</td>
                            <td>{{ $currency->decimal_separator }}</td>

                            <td>

                                <a class="btn btn-primary btn-xs"
                                    href="{{ route('dashboard.currency.edit', $currency->id) }}"><span
                                        class="fas fa-pen"></span></a>


                                <button
                                    onclick="confirmDelete(`{{ route('dashboard.currency.destroy', $currency->id) }}`)"
                                    class="btn btn-danger btn-xs">
                                    <span class="fas fa-trash"></span>
                                </button>
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

            {{ $currencies->links() }}


        </div>
    </div>
</div>
