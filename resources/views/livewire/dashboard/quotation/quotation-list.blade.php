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

                        <label class="my-1 mx-2" for="sortBy">Sort By</label>
                        <select wire:model="sortBy" id="sortBy" name="product_categories-table_sort"
                            aria-controls="product_categories-table"
                            class="custom-select custom-select-sm form-control form-control-sm">
                            <option value="id">Sale No</option>
                            <option value="latest">latest</option>
                            <option value="oldest">Oldest</option>
                        </select>
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
                        <th>Quote No.</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Year</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Body Style</th>
                        <th>Deductible</th>
                        <th>Status </th>
                        <th>Action</th>

                    </tr>
                </thead>



                <tbody>

                    @forelse ($quotations as $quotation)
                        <tr>
                            <td>QT-{{ $quotation->id }}</td>
                            <td>{{ $quotation->name }}</td>
                            <td>{{ $quotation->email }}</td>
                            <td>{{ $quotation->phone }}</td>
                            <td>{{ $quotation->year }}</td>
                            <td>{{ $quotation->make }}</td>
                            <td>{{ $quotation->model }}</td>
                            <td>{{ $quotation->body_style }}</td>
                            <td>{{ $quotation->deductible }}</td>
                            <td><span
                                    class="badge @if ($quotation->status == 'Pending') badge-info @elseif($quotation->status == 'Ordered' || $quotation->status == 'Completed') badge-success @endif ">
                                    {{ $quotation->status ?? '-' }} </span> </td>
                            <td>{{ $quotation->total_amount }}</td>

                            <td>

                                {{-- <a class="btn btn-info btn-xs"
                                    href="{{ route('dashboard.quotation.show', $quotation->id) }}"><span
                                        class="fas fa-eye"></span></a> --}}

                                @can('delete_quotations')
                                    <button
                                        onclick="confirmDelete(`{{ route('dashboard.quotation.destroy', $quotation->id) }}`)"
                                        class="btn btn-danger btn-xs">
                                        <span class="fas fa-trash"></span>
                                    </button>
                                @endcan
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

            {{ $quotations->links() }}


        </div>
    </div>
</div>
