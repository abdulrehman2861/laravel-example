@extends('dashboard.layouts.master')

@section('title', 'Autoglass depot')

@push('styles')
<link rel="stylesheet" type="text/css"
        href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">

        <style>
        .bg-primary.p-3.mfe-3.rounded {
            margin-right: 10px;
        }
        </style>

        @endpush

@section('content')

<div class="c-body">

    <main class="c-main">

            <div class="container-fluid">
<div>
<div class="row">
<div class="col-12">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form wire:submit.prevent="generateReport">
                <div class="form-row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Start Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="start_date">
                                                            </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>End Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="end_date">
                                                            </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Payments</label>
                            <select class="form-control" name="payments">
                                <option value="">Select Payments</option>
                                <option value="sale">Sales</option>
                                <option value="sale_return">Sale Returns</option>
                                <option value="purchase">Purchase</option>
                                <option value="purchase_return">Purchase Returns</option>
                            </select>
                                                            </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Payment Method</label>
                            <select class="form-control" name="payment_method">
                                <option value="">Select Payment Method</option>
                                <option value="Cash">Cash</option>
                                <option value="Credit Card">Credit Card</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-shuffle"></i>
                        Filter Report
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

    <div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="alert alert-warning mb-0">
                    No Data Available!
                </div>
            </div>
        </div>
    </div>
</div>
</div>

    </div>

    </main>

</div>

















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
