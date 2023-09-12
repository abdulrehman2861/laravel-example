@extends('dashboard.layouts.master')

@section('title', 'Autoglass depot')@push('styles')
    <style>
        .pagination>li {
            display: inline;
            padding: 0px !important;
            margin: 0px !important;
            border: none !important;
        }

        .modal-backdrop {
            z-index: -1 !important;
        }

        /*
        Fix to show in full screen demo
        */
        iframe {
            height: 700px !important;
        }

        .btn {
            display: inline-block;
            padding: 6px 12px !important;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .btn-primary {
            color: #fff !important;
            background: #428bca !important;
            border-color: #357ebd !important;
            box-shadow: none !important;
        }

        .btn-danger {
            color: #fff !important;
            background: #d9534f !important;
            border-color: #d9534f !important;
            box-shadow: none !important;
        }

        .labelstyle {
            display: flex;
            align-items: center;
        }

        .selectstyle {
            margin-left: 5px;
            margin-right: 5px;
        }

        .hrstyle {
            border: 0;
            border-color: currentcolor rgba(0, 0, 21, .2) rgba(0, 0, 21, .2);
            border-top: 1px solid rgba(0, 0, 21, .2);
            margin-bottom: 1rem;
            margin-top: 1rem;
        }

        .btnstyle {

            border: 1px solid #0f76b6;
            border-radius: 0.25rem;
            color: #3c4b64;
            cursor: pointer;
            display: inline-block;

            text-align: center;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            vertical-align: middle;
        }

        .btnstyle:hover {
            background: #428bca !important;
            color: white !important;
        }

        .table-setting {
            margin: 0px !important;
            padding-left: 15px !important;
            width: 100%;
        }

        .sidebar {
            width: 100% !important;
        }

        #my-all-items-table th,
        tr,
        td {
            text-align: center;
            background: white !important
        }

        .modal.fade .modal-dialog {
            transform: translate(0, -3%) !important;
        }

        .show {
            opacity: 1 !important;
        }

        .modal {
            background: rgba(0, 0, 0, 0.4) !important;
        }

        .button-to-table button {
            background: #ced2d8 !important;
            color: black !important;
            border-right: 1px solid #636f83;
            box-shadow: 0 1px 1px 0 rgba(60, 75, 100, .14), 0 2px 1px -1px rgba(60, 75, 100, .12), 0 1px 3px 0 rgba(60, 75, 100, .2);

        }

        .button-to-table button:hover {
            color: white !important;
            background: #636f83 !important
        }



        .fade:not(.show) {
            opacity: 1 !important;
        }
    </style>
@endpush
@section('content')



        <div class="card w-50 mx-auto" role="document">
            <div class="">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Update Year</h3>
                </div>

                <form method="POST" action="{{ route('dashboard.year.update', $year->id) }}">
                    <div class="modal-body">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="col-form-label">Year Name *</label>
                            <input type="text" class="form-control" name="name" value="{{$year->name}}" id="name" required>

                        </div>



                    </div>
                    <div class="modal-footer">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary" data-dismiss="modal">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>


@endsection


