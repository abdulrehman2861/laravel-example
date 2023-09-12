@extends('dashboard.layouts.master')

@section('title', 'Autoglass depot')@section('content')
<div class="c-body">

    <main class="c-main">

            <div class="container-fluid">
<form action="{{route('dashboard.currency.store')}}" method="POST">
    @csrf        <div class="row">
        <div class="col-lg-12">
                                <div class="form-group">
                <button class="btn btn-primary">Create Currency <i class="bi bi-check"></i></button>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="currency_name">Currency Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" required="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="code">Currency Code <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="code" required="">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="symbol">Symbol <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="symbol" required="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="thousand_separator">Thousand Separator <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="thousand_separator" required="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="decimal_separator">Decimal Separator <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="decimal_separator" required="">
                            </div>
                        </div>

                        <div class="col-lg-4 d-none">
                            <div class="form-group">
                                {{-- <label for="decimal_separator">Decimal Separator <span class="text-danger">*</span></label> --}}
                                <input type="text" class="form-control" name="exchange_rate" value="0" required="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
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



@endpush
