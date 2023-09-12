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
<div wire:id="GaZ9YVPUBHo5wGeEA5TP">
<div class="row">
<div class="col-12">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form wire:submit.prevent="generateReport">
                <div class="form-row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Start Date <span class="text-danger">*</span></label>
                            <input wire:model.defer="start_date" type="date" class="form-control" name="start_date">
                                                            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>End Date <span class="text-danger">*</span></label>
                            <input wire:model.defer="end_date" type="date" class="form-control" name="end_date">
                                                            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Customer</label>
                            <select wire:model.defer="customer_id" class="form-control" name="customer_id">
                                <option value="">Select Customer</option>
                                                                            <option value="18">Cust_3</option>
                                                                            <option value="19">Cust_2</option>
                                                                            <option value="23">Cus_1</option>
                                                                    </select>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select wire:model.defer="sale_status" class="form-control" name="sale_status">
                                <option value="">Select Status</option>
                                <option value="Pending">Pending</option>
                                <option value="Shipped">Shipped</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Payment Status</label>
                            <select wire:model.defer="payment_status" class="form-control" name="payment_status">
                                <option value="">Select Payment Status</option>
                                <option value="Paid">Paid</option>
                                <option value="Unpaid">Unpaid</option>
                                <option value="Partial">Partial</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary">
                        <span wire:target="generateReport" wire:loading="" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <i wire:target="generateReport" wire:loading.remove="" class="bi bi-shuffle"></i>
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
            <div wire:loading.flex="" class="col-12 position-absolute justify-content-center align-items-center" style="top:0;right:0;left:0;bottom:0;background-color: rgba(255,255,255,0.5);z-index: 99;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div><table class="table table-bordered table-striped text-center mb-0">
                
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Reference</th>
                    <th>Customer</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Paid</th>
                    <th>Due</th>
                    <th>Payment Status</th>
                </tr>
                </thead>
                <tbody>
                                            <tr>
                        <td colspan="8">
                            <span class="text-danger">No Sales Data Available!</span>
                        </td>
                    </tr>
                                        </tbody>
            </table>
            <div class="">
                <div>
</div>

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
