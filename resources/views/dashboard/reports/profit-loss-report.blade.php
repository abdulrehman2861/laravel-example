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
                <livewire:dashboard.report.profit-loss />

                {{-- <div >
                    <div class="row">
                        <div class="col-12">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <form wire:submit.prevent="generateReport">
                                        <div class="form-row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Start Date <span class="text-danger">*</span></label>
                                                    <input wire:model.defer="start_date" type="date" class="form-control"
                                                        name="start_date">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>End Date <span class="text-danger">*</span></label>
                                                    <input wire:model.defer="end_date" type="date" class="form-control"
                                                        name="end_date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-primary">
                                                <span wire:target="generateReport" wire:loading=""
                                                    class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                <i wire:target="generateReport" wire:loading.remove=""
                                                    class="bi bi-shuffle"></i>
                                                Filter Report
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12 col-lg-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-3 d-flex align-items-center">
                                    <div class="bg-primary p-3 mfe-3 rounded">
                                        <i class="bi bi-receipt font-2xl"></i>
                                    </div>
                                    <div>
                                        <div class="text-value text-primary">$616.00</div>
                                        <div class="text-uppercase font-weight-bold small ">9 Sales</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-3 d-flex align-items-center">
                                    <div class="bg-primary p-3 mfe-3 rounded">
                                        <i class="bi bi-arrow-return-left font-2xl"></i>
                                    </div>
                                    <div>
                                        <div class="text-value text-primary">$0.00</div>
                                        <div class="text-uppercase font-weight-bold small">0 Sale Returns</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-3 d-flex align-items-center">
                                    <div class="bg-primary p-3 mfe-3 rounded">
                                        <i class="bi bi-trophy font-2xl"></i>
                                    </div>
                                    <div>
                                        <div class="text-value text-primary">$530.00</div>
                                        <div class="text-uppercase font-weight-bold small">Profit</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-3 d-flex align-items-center">
                                    <div class="bg-primary p-3 mfe-3 rounded">
                                        <i class="bi bi-bag font-2xl"></i>
                                    </div>
                                    <div>
                                        <div class="text-value text-primary">$1.00</div>
                                        <div class="text-uppercase font-weight-bold small">2 Purchases</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-3 d-flex align-items-center">
                                    <div class="bg-primary p-3 mfe-3 rounded">
                                        <i class="bi bi-arrow-return-right font-2xl"></i>
                                    </div>
                                    <div>
                                        <div class="text-value text-primary">$0.00</div>
                                        <div class="text-uppercase font-weight-bold small">0 Purchase Returns</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-3 d-flex align-items-center">
                                    <div class="bg-primary p-3 mfe-3 rounded">
                                        <i class="bi bi-wallet2 font-2xl"></i>
                                    </div>
                                    <div>
                                        <div class="text-value text-primary">$0.00</div>
                                        <div class="text-uppercase font-weight-bold small">Expenses</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-3 d-flex align-items-center">
                                    <div class="bg-primary p-3 mfe-3 rounded">
                                        <i class="bi bi-cash-stack font-2xl"></i>
                                    </div>
                                    <div>
                                        <div class="text-value text-primary">$616.00</div>
                                        <div class="text-uppercase font-weight-bold small">Payments Received</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-3 d-flex align-items-center">
                                    <div class="bg-primary p-3 mfe-3 rounded">
                                        <i class="bi bi-cash-stack font-2xl"></i>
                                    </div>
                                    <div>
                                        <div class="text-value text-primary">$13,163.00</div>
                                        <div class="text-uppercase font-weight-bold small">Payments Sent</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-3 d-flex align-items-center">
                                    <div class="bg-primary p-3 mfe-3 rounded">
                                        <i class="bi bi-cash-stack font-2xl"></i>
                                    </div>
                                    <div>
                                        <div class="text-value text-primary">$-12,547.00</div>
                                        <div class="text-uppercase font-weight-bold small">Payments Net</div>
                                    </div>
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
