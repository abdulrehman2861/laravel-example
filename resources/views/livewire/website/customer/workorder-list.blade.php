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
                        <th>Sale No.</th>
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
                            <td><span
                                    class="badge @if ($workorder->status == 'Pending') badge-info @elseif($workorder->status == 'Ordered' || $workorder->status == 'Completed') badge-success @endif ">
                                    {{ $workorder->status ?? '-' }} </span> </td>
                            <td>{{ $workorder->total_amount }}</td>
                            <td><span
                                    class="badge @if ($workorder->payment_status == 'Unpaid') badge-danger @elseif($workorder->payment_status == 'Returned' || $workorder->payment_status == 'Paid') badge-success @endif ">
                                    {{ $workorder->payment_status ?? '-' }} </span> </td>

                            <td>{{  \Carbon\Carbon::parse( $workorder->appointment_date)->format('Y-m-d') }}</td>

                            <td>
                                <a class="btn btn-info btn-xs"
                                    href="{{ route('customer.dashboard.workorders.show', $workorder->id) }}"><span
                                        class="fas fa-eye"></span></a>

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
