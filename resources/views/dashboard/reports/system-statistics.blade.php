@extends('dashboard.layouts.master')

@section('title', 'Autoglass depot')

@section('content')

    <div class="c-body">

        <main class="c-main">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0">
                            <div class="card-body p-0 d-flex align-items-center shadow-sm">
                                <div class="bg-gradient-primary p-4 mfe-3 rounded-left">
                                    <i class="bi bi-bar-chart font-2xl"></i>
                                </div>
                                <div>
                                    <div class="text-value text-primary" style="margin-left:10px;">
                                        ${{ round((float) $revenue, 2) }}</div>
                                    <div class="text-muted text-uppercase font-weight-bold small" style="margin-left:10px;">
                                        Revenue</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0">
                            <div class="card-body p-0 d-flex align-items-center shadow-sm">
                                <div class="bg-gradient-warning p-4 mfe-3 rounded-left">
                                    <i class="bi bi-arrow-return-left font-2xl"></i>
                                </div>
                                <div>
                                    <div class="text-value text-warning" style="margin-left:10px;">
                                        ${{ round((float) $saleReturn, 2) }}</div>
                                    <div class="text-muted text-uppercase font-weight-bold small" style="margin-left:10px;">
                                        Sales Return</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0">
                            <div class="card-body p-0 d-flex align-items-center shadow-sm">
                                <div class="bg-gradient-success p-4 mfe-3 rounded-left">
                                    <i class="bi bi-arrow-return-right font-2xl"></i>
                                </div>
                                <div>
                                    <div class="text-value text-success" style="margin-left:10px;">
                                        ${{ round((float) $purchaseReturn, 2) }}</div>
                                    <div class="text-muted text-uppercase font-weight-bold small" style="margin-left:10px;">
                                        Purchases Return</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0">
                            <div class="card-body p-0 d-flex align-items-center shadow-sm">
                                <div class="bg-gradient-info p-4 mfe-3 rounded-left">
                                    <i class="bi bi-trophy font-2xl"></i>
                                </div>
                                <div>
                                    <div class="text-value text-info" style="margin-left:10px;">
                                        ${{ round((float) $profit, 2) }}</div>
                                    <div class="text-muted text-uppercase font-weight-bold small" style="margin-left:10px;">
                                        Profit</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">

                        <!-- BAR CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Sales & Purchases of Last 7 Days</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->











                    </div>
                    <!-- /.col (LEFT) -->
                    <div class="col-md-6">


                        <!-- DONUT CHART -->
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Overview of Current Month

                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="donutChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->













                    </div>
                    <!-- /.col (RIGHT) -->

                    <div class="col-md-12">

                        <!-- LINE CHART -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Monthly Cash Flow (Payment Sent & Received) </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="lineChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>


                    <div class="row" style="display:none;">

                        <div class="col-md-6">











                            <!-- AREA CHART -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Area Chart</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="areaChart"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->




                        </div>

                        <div class="col-md-6">



                            <!-- PIE CHART -->
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Pie Chart</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="pieChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                        </div>

                    </div>








                </div>
                <!-- /.row -->


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
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="assets/plugins/moment/moment.min.js"></script>
    <script src="assets/plugins/fullcalendar/main.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>

    <!-- Page specific script -->
    <script>
        $(function() {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //--------------
            //- AREA CHART -
            //--------------

            // Get context with jQuery - using jQuery's .get() method.
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

            var areaChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                        label: 'Sales',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                        label: 'Purchase',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                ]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            new Chart(areaChartCanvas, {
                type: 'line',
                data: areaChartData,
                options: areaChartOptions
            })

            //-------------
            //- LINE CHART -
            //--------------

            var lineChartData = {
                labels: {!! json_encode($Linelabels) !!},
                datasets: [{
                        label: 'Sales',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: {!! json_encode($salesData) !!}
                    },
                    {
                        label: 'Purchase',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: {!! json_encode($purchasesData) !!}
                    },
                ]
            }

            console.log(lineChartData);
            var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
            var lineChartOptions = $.extend(true, {}, areaChartOptions)
            var lineChartData = $.extend(true, {}, lineChartData)
            lineChartData.datasets[0].fill = false;
            lineChartData.datasets[1].fill = false;
            lineChartOptions.datasetFill = false

            var lineChart = new Chart(lineChartCanvas, {
                type: 'line',
                data: lineChartData,
                options: lineChartOptions
            })

            //-------------
            //- DONUT CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            var donutData = {
                labels: [
                    'Sales',
                    'Purchase',
                    'Expense',
                ],
                datasets: [{
                    data: [{{ $salesTotal }},
                        {{ $purchasesTotal }},
                        {{ $expensesTotal }},
                    ],
                    backgroundColor: ['#00a65a', '#f39c12', '#f56954'],
                }]
            }
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            })

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData = donutData;
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })

            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            //   var barChartData = $.extend(true, {}, areaChartData)
            //   var temp0 = areaChartData.datasets[0]
            //   var temp1 = areaChartData.datasets[1]
            //   barChartData.datasets[0] = temp1
            //   barChartData.datasets[1] = temp0

            var barChartData = {!! $BarchartDataJson !!};

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: {
                    labels: barChartData.labels,
                    datasets: barChartData.datasets,
                },
                options: barChartOptions
            })

            //---------------------
            //- STACKED BAR CHART -
            //---------------------
            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            var stackedBarChartData = $.extend(true, {}, barChartData)

            var stackedBarChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }

            new Chart(stackedBarChartCanvas, {
                type: 'bar',
                data: stackedBarChartData,
                options: stackedBarChartOptions
            })
        })
    </script>
@endpush
