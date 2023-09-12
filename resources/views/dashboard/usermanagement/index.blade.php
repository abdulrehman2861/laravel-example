@extends('dashboard.layouts.master')

@section('title', 'Autoglass depot')@section('content')

<div class="c-body">

    <main class="c-main">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Button trigger modal -->
                            <a href="{{ route('dashboard.permissions.create') }}" class="btn btn-primary">
                                Add Role <i class="bi bi-plus"></i>
                            </a>

                            <hr>

                            <livewire:dashboard.user-management.role-list />

                            {{-- <div class="table-responsive">
                                <table class="table table-bordered" id="example1">
                                    <thead>
                                        <tr role="row">
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th class=" text-center align-middle">Permission</th>
                                            <th title="Action" class="text-center align-middle sorting_disabled"
                                                rowspan="1" colspan="1" aria-label="Action" style="width: 119px;">
                                                Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr class="odd">
                                            <td>1</td>
                                            <td>Office User</td>
                                            <td class=" text-center align-middle"><span
                                                    class="badge badge-primary">access_adjustments</span>
                                                <span class="badge badge-primary">access_customers</span>
                                                <span class="badge badge-primary">access_expense_categories</span>
                                                <a class="text-primary" href="#">.......</a>
                                            </td>

                                            <td class=" text-center align-middle"><a href="#"
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
                                                    <form id="destroy13" class="d-none" action="#" method="POST">
                                                        <input type="hidden" name="_token"
                                                            value="xBAgk99kwigUWZVU6Hdy47vhaZdPyZrVLKy2ISOe">
                                                        <input type="hidden" name="_method" value="delete">
                                                    </form>
                                                </button>
                                            </td>
                                        </tr>
                                    <tbody>






                                </table>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

<script></script>
@endpush
