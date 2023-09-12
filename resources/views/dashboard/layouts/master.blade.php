<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title')</title>







    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <link rel="stylesheet"
        href="{{ asset('assets/css/css/dashboard/dist/plugins/fontawesome-free/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.0/dist/sweetalert2.min.css">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<style >
.control-sidebar-dark{
    height: 50px;
    text-align: center;
    display: block;
    width: 183px;
    background:transparent;
}


.control-sidebar-dark button{
    background-color: #f56954;
    border: none;
    color: white;
    height: 52px;
    width: 135px;
    /* border: 1px solid white; */
    font-size: 22px;
}
</style>

    @livewireStyles
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper" style="background:white">
        @include('dashboard.layouts.partials.navbar')
        @include('dashboard.layouts.partials.sidebar')


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('dashboard.layouts.partials.header')
            @yield('content')
        </div>
        @include('dashboard.layouts.partials.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark" style="height: 52px;text-align: center;">
          <button> Log Out</button>
        </aside>
        <!-- /.control-sidebar -->
    </div>

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- DataTables Added By Moyeez-->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">



<!-- DataTables Added By Moyeez-->

    <!-- Bootstrap 4 -->
    <!-- <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('assets/dist/js/demo.js') }}" ></script> --}}


    <!-- fullCalendar 2.2.5 -->
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/fullcalendar/main.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @livewireScripts

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- Include SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.0/dist/sweetalert2.min.js"></script>
    <script src="\assets\js\jquery.repeater.min.js"></script>
    <script src="{{ asset('assets/js/trix/attachment.js') }}"></script>


    <script>
        $(document).ready(function() {
            // Retrieve the CSRF token value from the meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Set the CSRF token in the header for all AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': csrfToken
                }
            });
        });


        @if (session('success'))
            toastr.options = {
                "closeButton": true,
            }
            toastr.success("{{ session('success') }}");
        @endif

        @if ($errors->any())
            toastr.options = {
                "closeButton": true,
            }
            toastr.error("{{ $errors->first() }}");
        @endif

        function confirmDelete(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    
                    window.location.href = url;
                }
            });
        }
        </script>

<script>
    document.addEventListener('livewire:load', function() {
        // Initialize select2
        // $('.select2').select2();
        
        
    });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('plugins/dropzone/min/dropzone.min.js') }}"></script>
    
    
    
    
    
    <!-- DataTables  & Plugins Added By Moyeez-->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- DataTables  & Plugins Added By Moyeez-->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
        </script>

    @stack('scripts')


</body>

</html>
