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

            <livewire:dashboard.sale.edit-sale :transaction="$transaction"/>

        </div>

    </div>
    
    <div class="modal fade" id="upsModal" tabindex="-1" role="dialog" aria-labelledby="upsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="upsModalLabel">UPS Rates</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                </div>

                <form method="POST" action="{{ route('dashboard.shipment.ups.createShipment') }}">
                    @csrf
                    <input type="hidden" name="detail_id" id="sale_detail_id" value="">
                    <div class="modal-body">
                        <label for="ups-rates">Select UPS rate</label>
                        <select class="form-control" name="service_code" id="ups-rates" required>
                            <option value="">Select UPS rate</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="create-shipment" disabled>Create Shipment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <!-- Include Bootstrap CSS and JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#ups-btn').click(function() {
                $('#upsModal .modal-body').children().not('select, label').remove();
                
                $('#upsModal').modal('show'); 
                let detail_id = $(this).data('id');
                let url = "{{ route('dashboard.shipment.ups.getRates', ':detail_id') }}".replace(':detail_id', detail_id);
                // Send AJAX request to fetch UPS rates
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json', // Set the expected data type
                    success: function(response) {
                        $('#ups-rates').empty();
                        
                        // Loop through the UPS rates and append the options
                        $.each(response, function(key, value) {
                            $('#ups-rates').append(value.service_html);
                        });

                        $('#sale_detail_id').val(detail_id);
                        // Enable create shipment button
                        $('#create-shipment').prop('disabled', false);
                    },
                    error: function() {
                        $('#create-shipment').prop('disabled', true);
                        // Handle error if AJAX request fails
                        $('#upsModal .modal-body').append('<p>Failed to fetch UPS rates.</p>');
                    }
                });
            });
            
        })

    </script>
@endpush
