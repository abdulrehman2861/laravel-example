@extends('profile.layouts.master')

@section('title', 'Autoglass depot')@push('styles')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>





<style>
    label:not(.form-check-label):not(.custom-file-label) {
        font-weight: 400 !important;
    }

    .card-header::after {
        display: none !important
    }

    .card-content {
        padding: 20px;
    }

    .comment-area textarea {
        padding: 10px;
        width: 100%;
        height: 200px;
        border: 2px solid #eee;
    }

    .direct-chat-messages {
        border: 5px solid #fff;
        /* margin: 10px; */
        -webkit-transform: translate(0, 0);
        transform: translate(0, 0);
        height: auto;
        overflow: auto;
        padding: 20px;
        background: #eee;
    }
</style>
@endpush

@section('content')

<div class="c-body">

    <main class="c-main">

        <div class="container-fluid">
            <div class="row" id="printDiv">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex flex-wrap align-items-center" style="justify-content:space-between">
                            <div>
                                Reference: <strong>{{ $transaction->qt_no }}</strong>
                            </div>
                            <div>


                                <button class="btn btn-sm btn-secondary mfs-auto mfe-1 d-print-none" id="printButton">
                                    <i class="bi bi-printer"></i> Print
                                </button>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4 mb-3 mb-md-0">
                                    <h5 class="mb-2 border-bottom pb-2">Company Info:</h5>
                                    <div><strong>Allstate Auto Glass</strong></div>
                                    <div>United States</div>
                                    <div>Email: info@allstateautoglassinc.com</div>
                                    <div>Phone: 703-645-2300</div>
                                </div>

                                <div class="col-sm-4 mb-3 mb-md-0">
                                    <h5 class="mb-2 border-bottom pb-2">Customer Info:</h5>
                                    <div><strong>{{ $transaction->customer?->name }}</strong></div>
                                    <div>{{ $transaction->customer?->billing_address }}</div>
                                    <div>Email: {{ $transaction->customer?->email }}</div>
                                    <div>Phone: {{ $transaction->customer?->phone }}</div>
                                </div>

                                <div class="col-sm-4 mb-3 mb-md-0">
                                    <h5 class="mb-2 border-bottom pb-2">Invoice Info:</h5>
                                    <div>Invoice: <strong>{{ $transaction->qt_no }}</strong></div>
                                    <div>Date: {{ $transaction->created_at->format('Y-m-d') }}</div>
                                    <div>
                                        Status: <strong>{{ $transaction->status }}</strong>
                                    </div>
                                    <div>
                                        Payment Status: <strong>{{ $transaction->payment_status }}</strong>
                                    </div>
                                </div>

                            </div>

                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">Product</th>
                                            <th class="align-middle">Net Unit Price</th>
                                            <th class="align-middle">Quantity</th>
                                            <th class="align-middle">Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($transaction->transactionDetails as $key => $detail)
                                            <tr>
                                                <td class="align-middle">
                                                    {{ $detail->productFitting?->yearFrom?->name . ',' . $detail->productFitting?->car?->CarCompany?->name . ',' . $detail->productFitting?->car?->name . ',' . $detail->productFitting?->glass?->name }}
                                                    <br>
                                                    <span class="badge badge-success">
                                                        {{ $detail->product?->part_number }}
                                                    </span>
                                                </td>

                                                <td class="align-middle">{{ $detail->rate }}</td>

                                                <td class="align-middle">
                                                    {{ $detail->quantity }}
                                                </td>

                                                <td class="align-middle">
                                                    {{ $detail->rate * $detail->quantity }}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    <span class="text-danger">
                                                        Please search &amp; select products!
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-5 ml-md-auto">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="left"><strong>Discount
                                                        ({{ $transaction->discount }}%)</strong></td>
                                                <td class="right">
                                                    ${{ ($transaction->discount / 100) * $transaction->sub_total_amount }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="left"><strong>Tax ({{ $transaction->order_tax }}%)</strong>
                                                </td>
                                                <td class="right">
                                                    ${{ ($transaction->order_tax / 100) * $transaction->sub_total_amount }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="left"><strong>Shipping</strong></td>
                                                <td class="right">${{ $transaction->shipping }}</td>
                                            </tr>
                                            <tr>
                                                <td class="left"><strong>Grand Total</strong></td>
                                                <td class="right"><strong>${{ $transaction->total_amount }}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- door glass info -->
        @if(!empty($transaction->glass_issue))
            <div class="card card-danger direct-chat direct-chat-danger" style="margin: 10px;">

                <!-- /.card-header -->
                <div class="card-header">
                    Door Glass Info
                </div>
                <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div class="card-content">
                        <p><b>Glass Issue: </b> {{ $transaction->glass_issue }} </p>
                        <p><b>Glass Issue Cause: </b> {{ implode(', ', json_decode($transaction->glass_issue_cause)) }} </p>
                    </div>

                    @if($transaction->glass_issue_image)
                        <div class="card-content">
                            <h2>Issue Picture</h2>
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ asset('storage/' . $transaction->glass_issue_image) }}" alt="" width="100%">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endif


        <!-- comments -->

        <div class="card card-danger direct-chat direct-chat-danger" style="margin: 10px;">

            <!-- /.card-header -->
            <div class="card-body">
                <!-- Conversations are loaded here -->


                <div class="card-content">
                    <h2>Add Comments</h2>
                    <form id="commentForm" action="#" method="post">
                        <div class="comment-area">
                            <input id="x" type="hidden" name="content">
                            <trix-editor input="x"></trix-editor>
                        </div>
                        <p style="margin-top:20px;">
                            <input class="btn btn-primary"
                                type="submit" value="Submit"></p>
                    </form>


                </div>




                <livewire:dashboard.workorder.comment :transaction_id="$transaction->id" />


            </div>
        </div>
        <!--/.direct-chat -->

    </main>



</div>







@endsection
@push('scripts')


<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <script>
        document.getElementById("printButton").addEventListener("click", function() {
            var element = document.getElementById("printDiv");
            var opt = {
                margin: [5, 0],
                filename: 'document.pdf',
                //  image:        { type: 'jpeg', quality: 0.98 },
                //  html2canvas:  { scale: 2, letterRendering: true },
                // pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }
            };
            document.getElementById("printButton").style.visibility = "hidden";

            html2pdf().set(opt).from(element).save();

            document.getElementById("printButton").style.visibility = "visible";
        });

        document.getElementById('commentForm').addEventListener('submit', function(event) {

            let trixElement = document.querySelector("trix-editor");

            event.preventDefault(); // Prevent the form from submitting

            // Get the form input value
            var formInput = document.getElementById('x').value;

            // Send the form data to the Livewire component
            Livewire.emit('commentFormDataSubmitted', formInput);

            // Reset the form input
            trixElement.editor.loadHTML("")
        });
    </script>
@endpush
