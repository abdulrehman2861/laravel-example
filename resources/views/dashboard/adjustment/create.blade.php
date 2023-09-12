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



            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="purchase-form" action="{{ route('dashboard.adjustment.store') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="reference">Reference<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="reference" required=""
                                                readonly="" value="ADJ">
                                        </div>
                                    </div>
                                 
                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="date">Date <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="adjustment_date" required=""
                                                    value="{{today()->format('Y-m-d') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              

                                <livewire:dashboard.adjustment.create-purchase />

                                <div class="form-row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="note"> Notes (If Needed)</label>
                                            <textarea name="note" id="internal_note" rows="5" class="form-control" placeholder="Notes"></textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        Create Adjustment <i class="bi bi-check"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
@endpush
