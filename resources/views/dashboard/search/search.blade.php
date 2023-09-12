@extends('dashboard.layouts.master')

@section('title', 'Autoglass depot')@push('styles')
    <style>
        .border-class {
            border: 1px solid #d8dbe0;
        }

        .padding-class {

            border-radius: 0.25rem;
            padding: 40px !important;
        }

        .hover:hover {
            cursor: pointer;
        }

        .my-search-button-table th,
        tr {
            font-size: 13px;
            text-align: center;
        }

        .my-search-button-table thead {
            border-bottom: 2px solid #d8dbe0;
            border-top: 2px solid #d8dbe0;
            background: white
        }

        .background-body-color {
            background-color: rgba(0, 0, 21, .05);
        }

        .my-search-button-table button {
            margin-top: 5px;
            font-size: 13px;
            padding: 8px;

        }

        .my-search-button-table button img {
            width: 15px;
            height: 15px;
        }
    </style>
@endpush

@section('content')



    <section class="content">

        <div class="padding-class card">
            <div class="card-body">
                <button type="button" class="btn btn-primary ">
                    Create Product
                </button>
                <livewire:dashboard.widget.search-product />
            </div>
        </div>


        <livewire:dashboard.search.product-list />



    </section>















@endsection

@push('scripts')
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery UI -->
    <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="assets/plugins/moment/moment.min.js"></script>
    <script src="assets/plugins/fullcalendar/main.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
@endpush
