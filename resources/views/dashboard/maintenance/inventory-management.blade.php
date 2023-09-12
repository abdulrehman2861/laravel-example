@extends('dashboard.layouts.master')

@section('title', 'Autoglass depot')

@section('content')


    <div class="c-body">

        <main class="c-main">

            <div class="container-fluid">

                <div class="row mb-4">
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-sm ">
                            <div class="card-header">
                                Export Inventory
                            </div>
                            <a href="{{ route('dashboard.inv.export') }}" class="custom-link">
                                <div class="card-body mt-3">

                                    <div class="card border-0">
                                        <div class="card-body p-0 d-flex align-items-center shadow-sm">
                                            <div class="bg-gradient-primary p-4 mfe-3 rounded-left">
                                                <i class="fa-solid fa-database font-2xl"></i>
                                            </div>

                                            <div>
                                                <div class="text-value text-primary"></div>
                                                <div class="text-muted text-uppercase font-weight-bold small"
                                                    style="margin-left:10px;">Make a Backup Copy</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card border-0 shadow-sm ">
                            <div class="card-header">
                                Restore Data from Backup
                            </div>

                            <div class="card-body">


                                <form action="{{ route('dashboard.inv.import') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <input type="file" name="file" id="file" class="input-file">

                                    </div>

                                    <div class="form-group mt-4">
                                        <button class="btn btn-success" style=" background:#1A33A2; width: 150px;">Import
                                            File</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>

                </div>



            </div>

            <livewire:dashboard.inventory.product-list />










        </main>

    </div>

















@endsection
@push('scripts')
    {{-- <script src="assets/plugins/jquery/jquery.min.js"></script>
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
<script src="../dist/js/demo.js"></script> --}}
@endpush
