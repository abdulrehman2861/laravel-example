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
                {{-- <div class="col-md-5">
                    <div class="dt-buttons btn-group flex-wrap button-to-table"> <button
                            class="btn btn-secondary buttons-excel" tabindex="0" aria-controls="product-table"
                            type="button"><span>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" style="width:17px">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                                </svg>


                                Excel</span></button> <button class="btn btn-secondary buttons-print" tabindex="0"
                            aria-controls="product-table" type="button"><span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" style="width:17px">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                </svg>



                                Print</span></button> <button class="btn btn-secondary buttons-reset" tabindex="0"
                            aria-controls="product-table" type="button"><span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" style="width:17px">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>


                                Reset</span></button> <button class="btn btn-secondary buttons-reload" tabindex="0"
                            aria-controls="product-table" type="button"><span>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" style="width:17px">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>

                                Reload</span></button> </div>
                </div> --}}
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
                        <th>Sale No.</th>
                        <th>Customer</th>
                        <th>Status </th>
                        <th>Total Amount</th>
                        <th>Payment Status </th>
                        <th>Appoinment Date </th>
                        <th>Action</th>

                    </tr>
                </thead>



                <tbody>

                    @forelse ($workorders as $workorder)
                        <tr>
                            <td>{{ $workorder->qt_no }}</td>
                            <td>{{ $workorder->customer?->name }}</td>
                            <td><span
                                    class="badge @if ($workorder->status == 'Pending') badge-info @elseif($workorder->status == 'Ordered' || $workorder->status == 'Completed') badge-success @endif ">
                                    {{ $workorder->status ?? '-' }} </span> </td>
                            <td>{{ $workorder->total_amount }}</td>
                            <td><span
                                    class="badge @if ($workorder->payment_status == 'Unpaid') badge-danger @elseif($workorder->payment_status == 'Returned' || $workorder->payment_status == 'Paid') badge-success @endif ">
                                    {{ $workorder->payment_status ?? '-' }} </span> </td>

                            <td>{{  \Carbon\Carbon::parse( $workorder->appointment_date)->format('Y-m-d') }}</td>

                            <td>

                                <a class="btn btn-primary btn-xs"
                                    href="{{ route('dashboard.workorder.edit', $workorder->id) }}"><span
                                        class="fas fa-pen"></span></a>

                                <a class="btn btn-info btn-xs"
                                    href="{{ route('dashboard.workorder.show', $workorder->id) }}"><span
                                        class="fas fa-eye"></span></a>


                                <button onclick="confirmDelete(`{{ route('dashboard.workorder.destroy', $workorder->id) }}`)"
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

            {{ $workorders->links() }}


        </div>
    </div>
</div>
