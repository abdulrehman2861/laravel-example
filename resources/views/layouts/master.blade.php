<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Auto Car depot</title>

    @stack('styles')

    @livewireStyles

    {{-- GLOBAL Styles CAN BE PLACED HERE --}}
    <!-- Favicon -->
    <link href="/assets/css/themify-icons.css" rel="stylesheet">
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/css/flaticon.css" rel="stylesheet">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/animate.css" rel="stylesheet">
    <link href="/assets/css/owl.carousel.css" rel="stylesheet">
    <link href="/assets/css/owl.theme.css" rel="stylesheet">
    <link href="/assets/css/slick.css" rel="stylesheet">
    <link href="/assets/css/slick-theme.css" rel="stylesheet">
    <link href="/assets/css/owl.transitions.css" rel="stylesheet">
    <link href="/assets/css/jquery.fancybox.css" rel="stylesheet">
    <link href="/assets/css/odometer-theme-default.css" rel="stylesheet">
    <link href="/assets/css/jquery.bxslider.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/responsive.css" rel="stylesheet">
    @stack('css')
</head>
<script src="bs-stepper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>

<body>

    <div class="page-wrapper">

        @include('layouts.partials.preloader')
        @include('layouts.partials.header')

        @yield('content')











        @include('layouts.partials.footer')


    </div>

    {{-- GLOBAL SCRIPTS CAN BE PLACED HERE --}}
    <script src="https://kit.fontawesome.com/2fd267da14.js" crossorigin="anonymous"></script>


    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>

    <!-- Plugins for this template -->
    <script src="/assets/js/jquery-plugin-collection.js"></script>

    <!-- Custom script for this template -->
    <script src="/assets/js/script.js"></script>

    <!-- Vendor JS -->
    <script src="/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="/assets/js/vendor/modernizr-3.11.2.min.js"></script>

    <!--Plugins JS-->
    <script src="/assets/js/plugins/wow.min.js"></script>
    <script src="/assets/js/plugins/jquery-ui.min.js"></script>
    <script src="/assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="/assets/js/plugins/jquery.nice-select.js"></script>
    <script src="/assets/js/plugins/parallax.min.js"></script>
    <script src="/assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="/assets/js/plugins/tippy.min.js"></script>
    <script src="/assets/js/plugins/ion.rangeSlider.min.js"></script>
    <script src="/assets/js/plugins/mailchimp-ajax.js"></script>

    <!--Main JS (Common Activation Codes)-->
    <script src="/assets/js/main.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @stack('scripts')

    <script>
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
    </script>

    @livewireScripts
</body>

</html>
