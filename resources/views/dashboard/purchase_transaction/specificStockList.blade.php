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
    <div class="container-fluid">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <form action="{{ route('dashboard.purchase.specific.stock') }}" method="GET">
                                <div class="form-row">
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="choice">
                                                <label class="custom-control-label choice" for="choice"
                                                    style="width:200px;margin:10px 0px">Search By Supplier</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Reference No#</label>
                                            <input id="reference" type="text" class="form-control" name="reference"
                                                required="">

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="supplier_id">Supplier </label>
                                            <select class="form-control" name="supplier_id" id="supplier_id"
                                                required="" disabled>
                                                <option value="">Select Supplier</option>
                                                @forelse ($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}">
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



                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-shuffle"></i>
                                        Search
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="alert-body">
            <span>No Data Found</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    </div> --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">

                            </div>
                            <div class="col-sm-4">
                                <a class="btn btn-sm btn-success  recmulti text-white mfs-auto"
                                    style="display: none; justify-content: center;" id="multiall"
                                    onclick="receivep('all')">
                                    Receive Parts
                                </a>
                            </div>
                            <div class="col-sm-4">

                            </div>
                        </div>

                        <br>
                        <br>
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        {{-- <th class="align-middle">
                                            <div>
                                                <input class="form-check-input multicheckall" style="margin-top: -7px"
                                                    type="checkbox" name="multicheckall">
                                            </div>
                                        </th> --}}
                                        <th class="align-middle">Reference</th>
                                        <th class="align-middle">Product</th>
                                        <th class="align-middle">Net Unit Price</th>
                                        <th class="align-middle">Total Qty</th>
                                        <th class="align-middle">Recieved Qty</th>

                                        <th class="align-middle rec">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        @foreach ($transaction->transactionDetails as $detail)
                                            <tr>
                                                <form
                                                    action="{{ route('dashboard.purchase.specific.stock.receive', $detail->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <td><strong>{{ $transaction->purchase_no }} </strong></td>
                                                    <td class="align-middle">
                                                        {{ $detail->productFitting?->yearFrom?->name }},{{ $detail->productFitting?->car?->carCompany?->name }},{{ $detail->productFitting?->car?->name }},{{ $detail->productFitting?->glass?->name }}
                                                        <br>
                                                        <span class="badge badge-success">
                                                            {{ $detail->productFitting?->product?->part_number }}
                                                        </span>
                                                    </td>

                                                    <td class="align-middle">
                                                        ${{ $detail->productFitting?->product?->price }}</td>

                                                    <td class="align-middle">{{ $detail->quantity }}</td>

                                                    <td class="align-middle">

                                                        <div class="input-group">
                                                            <div style="margin: 8px">( {{ $detail->received_quantity }}
                                                                )
                                                            </div>
                                                            @if ($detail->received_quantity < $detail->quantity)
                                                                <input type="number"
                                                                    style="min-width: 40px;max-width: 170px;"
                                                                    name="quantity" class="form-control" min="1"
                                                                    max="{{ $detail->quantity - $detail->received_quantity }}"
                                                                    placeholder="Recieve quantity">
                                                            @endif
                                                        </div>
                                                    </td>

                                                    <td>
                                                        @if ($detail->received_quantity < $detail->quantity)
                                                            <button type="submit"
                                                                class="btn btn-sm btn-success mfs-auto mfe-1 rec">
                                                                <i class="bi bi-save-fill"></i> Receive Part
                                                            </button>
                                                        @else
                                                            <span class="badge badge-info">
                                                                Received
                                                            </span>
                                                        @endif

                                                    </td>

                                                </form>
                                            </tr>
                                        @endforeach
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    $('#choice').change(function() {
        if ($(this).is(':checked')) {
            $('.choice').text('Search By Reference');
            $('#reference').val("");
            $('#supplier_id').attr('disabled', false);
            $('#reference').attr('disabled', true);
        } else {
            $('.choice').text('Search By Supplier');
            $('#supplier_id').val(0);
            $('#reference').attr('disabled', false);
            $('#supplier_id').attr('disabled', true);
        }
    });
</script>
@endpush
