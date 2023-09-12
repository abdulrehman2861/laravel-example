@extends('dashboard.layouts.master')

@section('title', 'Autoglass depot')

@push('styles')
    <link rel="stylesheet" type="text/css"
        href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
@endpush

@section('content')

    <div class="c-body">

        <main class="c-main">

            <div class="container-fluid">

                <livewire:dashboard.report.item-sold />

                {{-- <div class="row">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <form method="GET" action="#">
                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="category_id">From </label>
                                                <input name="from" type="date" value="2023-06-28 04:47:04"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <label for="category_id">To </label>
                                                <input name="to" type="date" value="2023-06-28 04:47:04"
                                                    class="form-control">
                                            </div>

                                        </div>





                                    </div>
                                    <br>

                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary">
                                            <span wire:target="generateReport" wire:loading=""
                                                class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            <i wire:target="generateReport" wire:loading.remove=""
                                                class="bi bi-shuffle"></i>
                                            Filter Report
                                        </button>
                                        <a href="#" class="btn btn-info">Reset</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>














                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Button trigger modal -->


                                <hr>

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example1">
                                        <thead>
                                            <tr role="row">
                                                <th>#No</th>
                                                <th>Product Name</th>
                                                <th>Product Part Number</th>
                                                <th>No of Invoices</th>
                                                <th>Price</th>
                                                <th>Quantity Sold</th>
                                                <th>In Stock</th>
                                                <th>Total</th>
                                                <th>Status</th>




                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd">
                                                <td>1</td>
                                                <td>Product Name</td>
                                                <td>Product-123</td>
                                                <td>12345</td>
                                                <td>50</td>
                                                <td>30</td>
                                                <td>In Stock</td>
                                                <td>100</td>
                                                <td>approved</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
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
