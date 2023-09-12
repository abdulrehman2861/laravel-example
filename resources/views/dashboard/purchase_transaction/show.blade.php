@extends('dashboard.layouts.master') @section('title', 'Auto Glass depo')
@push('styles')
    <style>
        label:not(.form-check-label):not(.custom-file-label) {
            font-weight: 400 !important;
        }

        .card-header::after {
            display: none !important
        }
    </style>
    @endpush @section('content')
    <div style="padding: 20px">

        <div class="container-fluid">
            <div class="row" id="printDiv">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex flex-wrap align-items-center" style="justify-content:space-between">
                            <div>
                                Reference: <strong>{{ $transaction->so_no }}</strong>
                            </div>
                            <div>


                                <button  class="btn btn-sm btn-secondary mfs-auto mfe-1 d-print-none"
                                     id="printButton">
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
                                    <div>Invoice: <strong>{{ $transaction->so_no }}</strong></div>
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
                                                    {{ $detail->productFitting?->yearFrom?->name  . ',' . $detail->productFitting?->car?->CarCompany?->name . ',' . $detail->productFitting?->car?->name . ',' . $detail->productFitting?->glass?->name }} <br>
                                                    <span class="badge badge-success">
                                                        {{ $detail->product?->part_number }}
                                                    </span>
                                                </td>

                                                <td class="align-middle">{{ $detail->cost }}</td>

                                                <td class="align-middle">
                                                    {{ $detail->quantity }}
                                                </td>

                                                <td class="align-middle">
                                                    {{ $detail->cost * $detail->quantity }}
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
                                                <td class="left"><strong>Discount ({{ $transaction->discount }}%)</strong></td>
                                                <td class="right">${{($transaction->discount / 100) * $transaction->sub_total_amount}}</td>
                                            </tr>
                                            <tr>
                                                <td class="left"><strong>Tax ({{ $transaction->order_tax }}%)</strong></td>
                                                <td class="right">${{($transaction->order_tax / 100) * $transaction->sub_total_amount}}</td>
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

    </div>

    @endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <script>
        document.getElementById("printButton").addEventListener("click", function() {
            var element = document.getElementById("printDiv");
            var opt = {
             margin: [5,0],
             filename: 'document.pdf',
            //  image:        { type: 'jpeg', quality: 0.98 },
            //  html2canvas:  { scale: 2, letterRendering: true },
            // pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }
          };
            document.getElementById("printButton").style.visibility = "hidden";

            html2pdf().set(opt).from(element).save();

            document.getElementById("printButton").style.visibility = "visible";
        });
    </script>
@endpush
