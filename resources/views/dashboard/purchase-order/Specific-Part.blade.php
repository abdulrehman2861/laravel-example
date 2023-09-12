@extends('dashboard.layouts.master')

@section('title', 'Autoglass depot')@push('styles')
<style>
  label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 400 !important
  }
</style>


@endpush

@section('content')
<div style="padding:20px">
  <div class="container-fluid">
    <div>
      <div class="row">
        <div class="col-12">
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <form action="" method="GET">
                <div class="form-row">
                  <div class="col-md-1">
                    <div class="form-group">
                    <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                    <label class="custom-control-label" for="customSwitch1" style="width:200px;margin:10px 0px">Search By Supplier</label>
                  </div>
                  </div>
                  </div>

                </div>
                <div class="form-row">

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Reference No#</label>
                      <input id="reference" type="text" class="form-control" name="reference" required="">

                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="supplier_id">Supplier </label>
                      <select class="form-control" name="supplier_id" id="supplier_id" disabled="disabled">
                        <option value="0" selected="" disabled="">Select Supplier</option>
                        <option value="2">xyz Glass manufacturer</option>
                      </select>
                    </div>
                  </div>
                </div>



                <div class="form-group mb-0">
                  <button type="submit" class="btn btn-primary">
                    <i class="bi bi-shuffle"></i>
                    Search
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <div class="alert-body">
                            <span>No Data Found</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>

  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">

                        </div>
                        <div class="col-sm-4">
                            <a class="btn btn-sm btn-success  recmulti text-white mfs-auto"
                                style="display: none; justify-content: center;" id="multiall" onclick="receivep('all')">
                                Receive Parts
                            </a>
                        </div>
                        <div class="col-sm-4">

                        </div>
                    </div>

                    <br>
                    <br>
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="align-middle">
                                        <div>
                                            <input class="form-check-input multicheckall" style="margin-top: -7px"
                                                type="checkbox" name="multicheckall">
                                        </div>
                                    </th>
                                    <th class="align-middle">Reference</th>
                                    <th class="align-middle">Product</th>
                                    <th class="align-middle">Net Unit Price</th>
                                    <th class="align-middle">Total Qty</th>
                                    <th class="align-middle">Recieved Qty</th>
                                    <th class="align-middle">Discount</th>
                                    <th class="align-middle">Tax</th>
                                    <th class="align-middle">Sub Total</th>
                                    <th class="align-middle rec">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td></td>
                                    <td><strong>PR-00001 </strong></td>
                                    <td class="align-middle">
                                        2020,Audi,A5,Windshield <br>
                                        <span class="badge badge-success">
                                            FW4726 GTY
                                        </span>
                                    </td>

                                    <td class="align-middle">$1.00</td>

                                    <td class="align-middle">1</td>

                                    <td class="align-middle">


                                        <div style="margin: 8px">( 0 )</div>
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
                                    <td>
                                        <span class="badge badge-info">
                                            Received
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><strong>PR-00003 </strong></td>
                                    <td class="align-middle">
                                        2020,Audi,A5,Windshield <br>
                                        <span class="badge badge-success">
                                            FW4726 GTY
                                        </span>
                                    </td>

                                    <td class="align-middle">$1.00</td>

                                    <td class="align-middle">1</td>

                                    <td class="align-middle">


                                        <div style="margin: 8px">( 1 )</div>
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
                                    <td>
                                        <span class="badge badge-info">
                                            Received
                                        </span>
                                    </td>
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
@endsection

@push('scripts')

@endpush