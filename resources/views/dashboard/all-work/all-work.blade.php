@extends('dashboard.layouts.master')

@section('title', 'Autoglass depot')@push('styles')
<link rel="stylesheet" type="text/css"
        href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
@endpush
        @section('content')

    <div class="c-body">

        <main class="c-main">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Button trigger modal -->
                                <a href="adduser" class="btn btn-primary">
                                    Add Work Order <i class="bi bi-plus"></i>
                                </a>

                                <hr>

                                <div class="table-responsive">
                                        <table class="table table-bordered" id="example1">
                                            <thead>
                                                <tr role="row">
                                                    <th>Date</th>
                                                    <th>Reference</th>
                                                    <th>Customer</th>
                                                    <th>Status</th>
                                                    <th title="Status" class="text-center align-middle sorting_disabled"
                                                        rowspan="1" colspan="1" aria-label="Status"
                                                        style="width: 130px;">Total Amount</th>
                                                    <th title="Action" class="text-center align-middle sorting_disabled"
                                                        rowspan="1" colspan="1" aria-label="Action"
                                                        style="width: 119px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd">
                                                    <td >13 Jan, 2023	</td>
                                                    <td >QT-00001	</td>
                                                    <td >Cust_3	</td>
                                                    <td ><span class="badge badge-info">
														Pending
													</span>
                                                    </td>
                                                    <td >$33.00	
													</td>
                                                    <td ><div class="btn-group dropleft">
														<button type="button" class="btn btn-ghost-primary dropdown rounded" data-toggle="dropdown" aria-expanded="true">
															<i class="bi bi-three-dots-vertical"></i>
														</button>
														<div class="dropdown-menu"  data-popper-placement="left-start">
															
																		<a href="#" class="dropdown-item">
																	<i class="bi bi-cursor mr-2 text-warning" style="line-height: 1;"></i> Send On Email
																</a>
																									   
																<a href="#" class="dropdown-item" onclick="modalopen(160 , 33 , 33 )  ">
																	<i class="bi bi-check-lg mr-2 text-success" style="line-height: 1;"></i> Complete &amp; Invoice
																</a>
																						   <a href="#" class="dropdown-item">
																	<i class="bi bi-pencil mr-2 text-primary" style="line-height: 1;"></i> Edit
																</a>
																				<a href="{{url('dashboard/allwork/details')}}" class="dropdown-item">
																	<i class="bi bi-eye mr-2 text-info" style="line-height: 1;"></i> Details
																</a>
																				<button id="delete" class="dropdown-item" onclick="
																	event.preventDefault();
																	if (confirm('Are you sure? It will delete the data permanently!')) {
																	document.getElementById('destroy160').submit()
																	}">
																	<i class="bi bi-trash mr-2 text-danger" style="line-height: 1;"></i> Delete
																	<form id="destroy160" class="d-none" action="#" method="POST">
																		<input type="hidden" name="_token" value="7v7vXaRfEy95Zr2Jlw8JaJhgMDj8LNH1LQNsqMjf">                    <input type="hidden" name="_method" value="delete">                </form>
																</button>
																</div>
													</div>
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
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

    <script></script>
@endpush
