@extends('dashboard.layouts.master') @section('title', 'Autoglass depot')@push('styles')
<style>
  label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 400 !important;
  }

  .card-header::after {
    display:none !important
  }

</style>

@endpush @section('content')
<div style="padding: 20px">

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex flex-wrap align-items-center" style="justify-content:space-between">
                    <div>
                        Reference: <strong>PR-00001</strong>
                    </div>
                    <div >

                  
                    <a target="_blank" class="btn btn-sm btn-secondary mfs-auto mfe-1 d-print-none"
                        href="https://inventory.allstateautoglassinc.com/purchases/pdf/2">
                        <i class="bi bi-printer"></i> Print
                    </a>
                    <a target="_blank" class="btn btn-sm btn-info mfe-1 d-print-none"
                        href="https://inventory.allstateautoglassinc.com/purchases/pdf/2">
                        <i class="bi bi-save"></i> Save
                    </a>
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
                            <h5 class="mb-2 border-bottom pb-2">Supplier Info:</h5>
                            <div><strong>xyz Glass manufacturer</strong></div>
                            <div>also optional field</div>
                            <div>Email: chan@xyzglass.com</div>
                            <div>Phone: 86234876</div>
                        </div>

                        <div class="col-sm-4 mb-3 mb-md-0">
                            <h5 class="mb-2 border-bottom pb-2">Invoice Info:</h5>
                            <div>Invoice: <strong>INV/PR-00001</strong></div>
                            <div>Date: 13 Jun, 2023</div>
                            <div>
                                Status: <strong>Returned</strong>
                            </div>
                            <div>
                                Payment Status: <strong>Returned</strong>
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
                                    <th class="align-middle">Discount</th>
                                    <th class="align-middle">Tax</th>
                                    <th class="align-middle">Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="align-middle">
                                        2020,Audi,A5,Windshield <br>
                                        <span class="badge badge-success">
                                            FW4726 GTY
                                        </span>
                                    </td>

                                    <td class="align-middle">$1.00</td>

                                    <td class="align-middle">
                                        1
                                    </td>

                                    <td class="align-middle">
                                        $0.00
                                    </td>

                                    <td class="align-middle">
                                        $0.00
                                    </td>

                                    <td class="align-middle">
                                        $1.00
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5 ml-md-auto">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="left"><strong>Discount (0%)</strong></td>
                                        <td class="right">$0.00</td>
                                    </tr>
                                    <tr>
                                        <td class="left"><strong>Tax (0%)</strong></td>
                                        <td class="right">$0.00</td>
                                    </tr>
                                    <tr>
                                        <td class="left"><strong>Shipping)</strong></td>
                                        <td class="right">$40.00</td>
                                    </tr>
                                    <tr>
                                        <td class="left"><strong>Grand Total</strong></td>
                                        <td class="right"><strong>$41.00</strong></td>
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

@endsection @push('scripts') @endpush