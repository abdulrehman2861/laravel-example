@extends('dashboard.layouts.master')

@section('title', 'Autoglass depot')@push('styles')
    <style>
        .my-suppliers-table tr th,
        td {
            text-align: start !important;
            background: white !important
        }
    </style>
@endpush

@section('content')


    <section class="content">
        <div class="padding-class">
            <div style="background:white;padding:20px;border-radius:6px" class="border-class">
                <!-- Row -->

                <table id="my-all-items-table" class="table table-striped table-bordered" cellspacing="0" width="100%">

                    <tbody class="my-suppliers-table">
                        <tr>
                            <th>Supplier Name</th>
                            <td style="table-cell">{{$supplier->name}}</td>

                        </tr>
                        <tr>
                            <th>Contact Person</th>
                            <td style="table-cell"> {{$supplier->contact_person ?? '-'}}</td>

                        </tr>
                        <tr>
                            <th>Supplier Email </th>
                            <td style="table-cell">{{$supplier->email ?? '-'}}</td>

                        </tr>
                        <tr>
                            <th>Supplier Phone</th>
                            <td style="table-cell">{{$supplier->phone ?? '-'}}</td>

                        </tr>
                        <tr>
                            <th>Supplier Phone</th>
                            <td style="table-cell">{{$supplier->phone_alternative ?? '-'}}</td>

                        </tr>
                        <tr>
                            <th>City</th>
                            <td style="table-cell">{{$supplier->city ?? '-'}}</td>

                        </tr>
                        <tr>
                            <th>Country</th>
                            <td style="table-cell">{{$supplier->country ?? '-'}}</td>

                        </tr>
                        <tr>
                            <th>Website</th>
                            <td style="table-cell">{{$supplier->website ?? '-'}}</td>

                        </tr>
                        <tr>
                            <th>Fax</th>
                            <td style="table-cell">{{$supplier->fax ?? '-'}}</td>

                        </tr>
                        <tr>
                            <th>Address</th>
                            <td style="table-cell">{{$supplier->address ?? '-'}}</td>

                        </tr>
                        <tr>
                            <th>Notes</th>
                            <td style="table-cell">{{$supplier->note ?? '-'}}</td>

                        </tr>
                    </tbody>
                </table>

                `


            </div>
            <!-- End Row -->

        </div>

        </div>

        </div>
        </div>
        </div>
        </div>


        </div>


        </div>
        </div>

    </section>

@endsection

@push('scripts')
@endpush
