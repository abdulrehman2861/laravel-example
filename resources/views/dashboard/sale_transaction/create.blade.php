@extends('dashboard.layouts.master')
@section('title', 'Auto Glass depo')

@push('styles')
    <style>
        label:not(.form-check-label):not(.custom-file-label) {
            font-weight: 400 !important
        }
    </style>
@endpush

@section('content')
    <div style="padding:20px">


        <div class="container-fluid mb-4">

            <div class="row">
                <div class="col-12">
                    <div class="position-relative card p-4">

                        <div class="">
                            <livewire:dashboard.widget.search-product />
                        </div>

                        <livewire:dashboard.widget.list-product />





                    </div>



                </div>
            </div>

            <livewire:dashboard.sale.create-sale />

        </div>

    </div>

@endsection

@push('scripts')
@endpush
