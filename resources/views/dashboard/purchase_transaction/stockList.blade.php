@extends('dashboard.layouts.master')

@section('title', 'Autoglass depot')@push('styles')
<style>
    label:not(.form-check-label):not(.custom-file-label) {
        font-weight: 400 !important
    }

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
        font-weight: 400 !important
    }

    tfoot {
        display: none !important
    }

    .selectstyle {
        margin-left: 10px;
        margin-right: 10px;
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
        background: #428bca;
        color: white;
    }

    .table-setting {
        margin: 0px !important;

        width: 100%;
    }

    .sidebar {
        width: 100% !important;
    }

    .modal-open .modal {
        overflow-x: hidden;
        overflow-y: auto;
        background: rgba(0, 0, 0, .5) !important;
    }
</style>
@endpush

@section('content')
<div style="padding:20px">


    <div class="container-fluid mb-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('dashboard.purchase.create') }}" class="btn btn-primary">
                                Order Stock +
                            </a>



                            <a class="btn btn-sm btn-success  rec text-white float-right" id="recall"
                                style="display: none" onclick="receive(0)">
                                <i class="bi bi-list-check"></i> Receive All
                            </a>

                            <hr>
                            <livewire:dashboard.purchase.stock-list />

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
@endpush
