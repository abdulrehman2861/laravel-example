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
                            <th>Adjustment Date</th>
                            <td style="table-cell">{{$adjustment->adjustment_date}}</td>

                        </tr>

                        <tr>
                            <th>Notes</th>
                            <td style="table-cell">{{$adjustment->note ?? '-'}}</td>

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
