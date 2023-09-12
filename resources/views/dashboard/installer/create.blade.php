@extends('dashboard.layouts.master')

@section('title', 'Auto Glass depo')

@push('styles')
    <style>
        .full-amount-div {
            width: 100%;
            height: 200px;

            text-align: end;
            display: flex;
            justify-content: end;

        }

        .full-amount-div ul li {
            height: 40px;
            /* align-self: center; */
            padding-top: 9px;
            border-top: 1px solid;
            display: flex;
            justify-content: space-between;
            margin-top: 3px;
            width: 271px;
            font-weight: bolder;
        }

        .full-amount-div ul li span {
            font-weight: 400;
        }

        /* .my-search-table tr th,td{
    border: 1px solid;
    text-align: center;
    } */

        .hover:hover {
            cursor: pointer;
        }

        .my-search-button-table th,
        tr {
            font-size: 13px;
            text-align: center;
        }

        .my-search-button-table thead {
            border-bottom: 2px solid #d8dbe0;
            border-top: 2px solid #d8dbe0;
            background: white
        }

        .background-body-color {
            background-color: rgba(0, 0, 21, .05);
        }

        .my-search-button-table button {
            margin-top: 5px;
            font-size: 13px;
            padding: 8px;

        }

        .my-search-button-table button img {
            width: 15px;
            height: 15px;
        }


        .border-class {
            border: 1px solid #d8dbe0;
        }

        .padding-class {

            border-radius: 0.25rem;
            padding: 40px !important;
        }

        .wrapper {
            background-color: white !important
        }

        .my-first-box {
            position: absolute;
            top: 113%;
            left: 25% !important;

        }

        .my-second-box {
            position: absolute;
            top: 113%;
            left: 72% !important;
        }

        .border-bottom-none::before {
            display: none;
            padding-bottom: 0px !important;
            margin-bottom: 0px !important;
        }

        .my-new-navbar-first-list img {
            animation: get-a-quote-btn-icon-div 1s infinite;
            box-shadow: 0 0 0 2em transparent;
            border-radius: 50%;
        }
    </style>
@endpush

@section('content')


    <form method="POST" action="{{ route('dashboard.installer.store') }}">
        @csrf
        <button style="margin-left:50px" class="btn btn-primary btn-sm">Create Installer <i class="bi bi-check"></i></button>

        <section class="content">
            <div class="padding-class">
                <div style="background:white;padding:20px;border-radius:6px" class="border-class">
                    <!-- Row -->
                    <div class="row row-sm">
                        <div class="col-lg-12 col-md-12">
                            <div class="">
                                <div class="card-body">

                                    <div class="row row-sm">
                                       <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="mg-b-10">Installer First Name </p>
                                                <input type="text" name="first_name" value="{{old('first_name')}}" class="form-control"
                                                    name="example-text-input" required>
                                            </div>


                                            <div class="form-group">
                                                <p class="mg-b-10">Email </p>
                                                <input type="email" name="email" class="form-control"
                                                    name="example-text-input">
                                            </div>
                                            <div class="form-group">
                                                <p class="mg-b-10">Phone Number  </p>
                                                <input type="text" name="phone" class="form-control"
                                                    name="example-text-input" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                           <div class="form-group">
                                                <p class="mg-b-10">Installer Last Name </p>
                                                <input type="text" name="last_name" class="form-control"
                                                    name="example-text-input" >
                                            </div>
                                            <div class="form-group">
                                                <p class="mg-b-10">Social Security Numbe </p>
                                                <input type="text" name="social_security_number" class="form-control"
                                                    name="example-text-input">
                                            </div>
                                            <div class="form-group">
                                                <p class="mg-b-10">Identity Number </p>
                                                <input type="text" name="identity_number" class="form-control"
                                                    name="example-text-input">
                                            </div>


                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="mg-b-10">City </p>
                                                <input type="text" name="city" class="form-control"
                                                    name="example-text-input">
                                            </div>


                                        </div>
                                        <div class="col-md-6 d-none">
                                           <div class="form-group">
                                                <p class="mg-b-10">Country </p>
                                                <input type="text" name="country" class="form-control"
                                                    name="example-text-input">
                                            </div>

                                        </div>
                                        <div class="col-md-12 ">
                                            <div class="form-group mb-0">
                                                <p class="mg-b-10">Address</span></p>
                                                <textarea class="form-control" name="address" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->


                    `


                </div>
                <!-- End Row -->

            </div>

            </div>

            </div>
            </div>
            </div>
            </div>


            </div>


            </div>
            </div>

        </section>

    </form>

@endsection

@push('scripts')
@endpush
