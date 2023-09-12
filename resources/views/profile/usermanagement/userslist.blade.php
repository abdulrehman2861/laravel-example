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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Button trigger modal -->
                                <a href="adduser" class="btn btn-primary">
                                    Add User <i class="bi bi-plus"></i>
                                </a>

                                <hr>

                                <div class="table-responsive">
                                        <table class="table table-bordered" id="example1">
                                            <thead>
                                                <tr role="row">
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th title="Status" class="text-center align-middle sorting_disabled"
                                                        rowspan="1" colspan="1" aria-label="Status"
                                                        style="width: 130px;">Status</th>
                                                    <th title="Action" class="text-center align-middle sorting_disabled"
                                                        rowspan="1" colspan="1" aria-label="Action"
                                                        style="width: 119px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd">
                                                    <td ><img
                                                            src="https://www.gravatar.com/avatar/6b8d83fdd97af21ba6b8d9a61bc3683a"
                                                            style="width:50px;height:50px;"
                                                            class="img-thumbnail rounded-circle"></td>
                                                    <td >Test_user</td>
                                                    <td >test@testuser.com</td>
                                                    <td ><span
                                                            class="badge badge-primary">Super Admin</span>
                                                    </td>
                                                    <td ><span
                                                            class="badge badge-warning">Deactivated</span></td>
                                                    <td ><a href="#"
                                                            class="btn btn-info btn-sm">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        <button id="delete" class="btn btn-danger btn-sm"
                                                            onclick="
                                                            event.preventDefault();
                                                            if (confirm('Are you sure? It will delete the data permanently!')) {
                                                            document.getElementById('destroy13').submit();
                                                            }
                                                            ">
                                                            <i class="bi bi-trash"></i>
                                                            <form id="destroy13" class="d-none" action="#"
                                                                method="POST">
                                                                <input type="hidden" name="_token"
                                                                    value="xBAgk99kwigUWZVU6Hdy47vhaZdPyZrVLKy2ISOe">
                                                                <input type="hidden" name="_method" value="delete">
                                                            </form>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td ><img
                                                            src="https://www.gravatar.com/avatar/148748843870253c26c216984da104a5"
                                                            style="width:50px;height:50px;"
                                                            class="img-thumbnail rounded-circle"></td>
                                                    <td >Shawn Doe</td>
                                                    <td >alien4gc@yahoo.com</td>
                                                    <td ><span
                                                            class="badge badge-primary">Super Admin</span>
                                                    </td>
                                                    <td ><span
                                                            class="badge badge-warning">Deactivated</span></td>
                                                    <td ><a href="#"
                                                            class="btn btn-info btn-sm">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        <button id="delete" class="btn btn-danger btn-sm"
                                                            onclick="
                                                            event.preventDefault();
                                                            if (confirm('Are you sure? It will delete the data permanently!')) {
                                                            document.getElementById('destroy12').submit();
                                                            }
                                                            ">
                                                            <i class="bi bi-trash"></i>
                                                            <form id="destroy12" class="d-none" action="#"
                                                                method="POST">
                                                                <input type="hidden" name="_token"
                                                                    value="xBAgk99kwigUWZVU6Hdy47vhaZdPyZrVLKy2ISOe">
                                                                <input type="hidden" name="_method" value="delete">
                                                            </form>
                                                        </button>
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
