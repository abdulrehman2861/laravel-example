@extends('dashboard.layouts.master') @section('title', 'Autoglass depot')@push('styles')
<style>
  label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 400 !important;
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
		font-weight:400 !important
	}
	tfoot {
		display:none !important
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
	.table-setting{
    margin:0px !important;
    
    width: 100%;
}
.sidebar{
    width: 100% !important;
}

.modal-open .modal {
    overflow-x: hidden;
    overflow-y: auto;
    background: rgba(0,0,0,.5) !important;
}
</style>

@endpush @section('content')
<div style="padding: 20px">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <a href="order-parts" class="btn btn-primary">
              Order Stock +
            </a>

            <a class="btn btn-sm btn-success rec text-white float-right" id="recall" style="display: none"
              onclick="receive(0)">
              <i class="bi bi-list-check"></i> Receive All
            </a>

            <hr />

                    <div class="row table-setting" style="padding:10px">
                        <div class="col-md-12 ">
                            <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="" id="datatable_length"><label style="font-weight: 400;" class="labelstyle">Show <select
                                    name="datatable_length" aria-controls="datatable" class="form-control input-sm col-md-2 selectstyle"
                                    style="padding:0px">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    </select> entries</label></div>
                            </div>
                            <div class="col-md-5">
                                <div class="dt-buttons btn-group flex-wrap button-to-table"> <button class="btn btn-secondary buttons-excel"
                                    tabindex="0" aria-controls="product-table" type="button"><span>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" style="width:17px">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                                    </svg>


                                    Excel</span></button> <button class="btn btn-secondary buttons-print" tabindex="0"
                                    aria-controls="product-table" type="button"><span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" style="width:17px">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                    </svg>



                                    Print</span></button> <button class="btn btn-secondary buttons-reset" tabindex="0"
                                    aria-controls="product-table" type="button"><span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" style="width:17px">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>


                                    Reset</span></button> <button class="btn btn-secondary buttons-reload" tabindex="0"
                                    aria-controls="product-table" type="button"><span>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" style="width:17px">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>

                                    Reload</span></button> </div>
                            </div>
                            <div class="col-md-3">
                                <div style="display: flex; justify-content: end;" id="datatable_filter" class=""><label
                                    class="labelstyle">Search: <input type="search" class="form-control input-sm" placeholder=""
                                    aria-controls="datatable"></label></div>
                            </div>
                            </div>
                <table class="table table-bordered dataTable" id="purchases-table" role="grid"
                  aria-describedby="purchases-table_info" style="width: 988px">
                  <thead>
                    <tr role="row">
                      <th title="Reference" class="text-center align-middle sorting" tabindex="0"
                        aria-controls="purchases-table" rowspan="1" colspan="1"
                        aria-label="Reference: activate to sort column ascending" style="width: 66px">
                        Reference
                      </th>
                      <th title="Supplier" class="text-center align-middle sorting" tabindex="0"
                        aria-controls="purchases-table" rowspan="1" colspan="1"
                        aria-label="Supplier: activate to sort column ascending" style="width: 102px">
                        Supplier
                      </th>
                      <th title="Status" class="text-center align-middle sorting_disabled" rowspan="1" colspan="1"
                        aria-label="Status" style="width: 54px">
                        Status
                      </th>
                      <th title="Total Amount" class="text-center align-middle sorting_disabled" rowspan="1" colspan="1"
                        aria-label="Total Amount" style="width: 77px">
                        Total Amount
                      </th>
                      <th title="Paid Amount" class="text-center align-middle sorting_disabled" rowspan="1" colspan="1"
                        aria-label="Paid Amount" style="width: 74px">
                        Paid Amount
                      </th>
                      <th title="Due Amount" class="text-center align-middle sorting_disabled" rowspan="1" colspan="1"
                        aria-label="Due Amount" style="width: 73px">
                        Due Amount
                      </th>
                      <th title="Payment Status" class="text-center align-middle sorting_disabled" rowspan="1"
                        colspan="1" aria-label="Payment Status" style="width: 86px">
                        Payment Status
                      </th>
                      <th title="Ship To" class="text-center align-middle sorting_disabled" rowspan="1" colspan="1"
                        aria-label="Ship To" style="width: 63px">
                        Ship To
                      </th>
                      <th title="Action" class="text-center align-middle sorting_disabled sorting_desc" rowspan="1"
                        colspan="1" aria-label="Action" style="width: 132px">
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="odd">
                      <td class="text-center align-middle">PR-00001</td>
                      <td class="text-center align-middle">
                        xyz Glass manufacturer
                      </td>
                      <td class="text-center align-middle">
                        <span class="badge badge-success"> Returned </span>
                      </td>
                      <td class="text-center align-middle">$41.00</td>
                      <td class="text-center align-middle">$200.00</td>
                      <td class="text-center align-middle">$-159.00</td>
                      <td class="text-center align-middle">
                        <span class="badge badge-danger"> Returned </span>
                      </td>
                      <td class="text-center align-middle">Falls Church</td>
                      <td class="text-center align-middle sorting_1" style="padding:0px">
                        <div class="btn-group dropleft" style="width: 100%;">
                          <div class="d-flex flex-wrap align-items-center" style="margin-left:12px">
                            <a target="_blank" class="btn btn-sm btn-secondary mfs-auto mfe-1 d-print-none"
                              href="https://inventory.allstateautoglassinc.com/purchases/pdf/2">
                              <i class="bi bi-printer"></i> Print
                            </a>
                            <a target="_blank" class="btn btn-sm btn-info mfe-1 d-print-none"
                              href="https://inventory.allstateautoglassinc.com/purchases/pdf/2" style="margin-left:2px">
                             Save
                            </a>
                          </div>
                          <button type="button" class="btn btn-ghost-primary dropdown rounded" data-toggle="dropdown"
                            aria-expanded="false" style="padding:0px !important">
                            <img src="\assets\images\dashboard\search\dots.png">
                          </button>
                          <div class="dropdown-menu">
                            <a href="view-payment"
                              class="dropdown-item">
                              <i class="bi bi-cash-coin mr-2 text-warning" style="line-height: 1"></i>
                              Show Payments
                            </a>
                            <a href="order-parts" class="dropdown-item">
                              <i class="bi bi-pencil mr-2 text-primary" style="line-height: 1"></i>
                              Edit
                            </a>
                            <a href="order-details" class="dropdown-item">
                              <i class="bi bi-eye mr-2 text-info" style="line-height: 1"></i>
                              Details
                            </a>
                            <button id="delete" class="dropdown-item" onclick="
                event.preventDefault();
                if (confirm('Are you sure? It will delete the data permanently!')) {
                document.getElementById('destroy2').submit()
                }">
                              <i class="bi bi-trash mr-2 text-danger" style="line-height: 1"></i>
                              Delete
                              <form id="destroy2" class="d-none"
                                action="https://inventory.allstateautoglassinc.com/purchases/2" method="POST">
                                <input type="hidden" name="_token" value="qf9Xnt75Nb9qyiLma6oAkPDDeRmZEkGG3Lcm8G1H" />
                                <input type="hidden" name="_method" value="delete" />
                              </form>
                            </button>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr class="even">
                      <td class="text-center align-middle">PR-00003</td>
                      <td class="text-center align-middle">
                        xyz Glass manufacturer
                      </td>
                      <td class="text-center align-middle">
                        <span class="badge badge-info"> Pending </span>
                      </td>
                      <td class="text-center align-middle">$1.00</td>
                      <td class="text-center align-middle">$22.22</td>
                      <td class="text-center align-middle">$-21.22</td>
                      <td class="text-center align-middle">
                        <span class="badge badge-success"> Paid </span>
                      </td>
                      <td class="text-center align-middle">Manassas</td>
                      <td class="text-center align-middle sorting_1" style="padding:0px">
                        <div class="btn-group dropleft" style="width: 100%;">
                          <div class="d-flex flex-wrap align-items-center" style="margin-left:12px">
                            <a target="_blank" class="btn btn-sm btn-secondary mfs-auto mfe-1 d-print-none"
                              href="https://inventory.allstateautoglassinc.com/purchases/pdf/2">
                              <i class="bi bi-printer"></i> Print
                            </a>
                            <a target="_blank" class="btn btn-sm btn-info mfe-1 d-print-none"
                              href="https://inventory.allstateautoglassinc.com/purchases/pdf/2" style="margin-left:2px">
                             Save
                            </a>
                          </div>
                          <button type="button" class="btn btn-ghost-primary dropdown rounded" data-toggle="dropdown"
                            aria-expanded="false" style="padding:0px !important">
                            <img src="\assets\images\dashboard\search\dots.png">
                          </button>
                          <div class="dropdown-menu">
                            <a href="view-payment"
                              class="dropdown-item">
                              <i class="bi bi-cash-coin mr-2 text-warning" style="line-height: 1"></i>
                              Show Payments
                            </a>
                            <a href="order-parts" class="dropdown-item">
                              <i class="bi bi-pencil mr-2 text-primary" style="line-height: 1"></i>
                              Edit
                            </a>
                            <a href="order-details" class="dropdown-item">
                              <i class="bi bi-eye mr-2 text-info" style="line-height: 1"></i>
                              Details
                            </a>
                            <button id="delete" class="dropdown-item" onclick="
                event.preventDefault();
                if (confirm('Are you sure? It will delete the data permanently!')) {
                document.getElementById('destroy3').submit()
                }">
                              <i class="bi bi-trash mr-2 text-danger" style="line-height: 1"></i>
                              Delete
                              <form id="destroy3" class="d-none"
                                action="https://inventory.allstateautoglassinc.com/purchases/3" method="POST">
                                <input type="hidden" name="_token" value="qf9Xnt75Nb9qyiLma6oAkPDDeRmZEkGG3Lcm8G1H" />
                                <input type="hidden" name="_method" value="delete" />
                              </form>
                            </button>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th class="text-center align-middle" rowspan="1" colspan="1"></th>
                      <th class="text-center align-middle" rowspan="1" colspan="1"></th>
                      <th class="text-center align-middle" rowspan="1" colspan="1"></th>
                      <th class="text-center align-middle" rowspan="1" colspan="1"></th>
                      <th class="text-center align-middle" rowspan="1" colspan="1"></th>
                      <th class="text-center align-middle" rowspan="1" colspan="1"></th>
                      <th class="text-center align-middle" rowspan="1" colspan="1"></th>
                      <th class="text-center align-middle" rowspan="1" colspan="1"></th>
                      <th class="text-center align-middle" rowspan="1" colspan="1"></th>
                    </tr>
                  </tfoot>
                </table>
                <div id="purchases-table_processing" class="dataTables_processing card" style="display: none">
                  Processing...
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <div class="dataTables_info" id="purchases-table_info" role="status" aria-live="polite">
                      Showing 1 to 2 of 2 entries
                    </div>
                  </div>
                  <div class="col-md-7 mt-2" style="
                      display: flex;
                      justify-content: end;
                      padding-right: 0px;
                    ">
                    <div class="dataTables_paginate paging_simple_numbers" id="purchases-table_paginate">
                      <ul class="pagination">
                        <li class="paginate_button page-item previous disabled" id="purchases-table_previous">
                          <a href="#" aria-controls="purchases-table" data-dt-idx="0" tabindex="0"
                            class="page-link">Previous</a>
                        </li>
                        <li class="paginate_button page-item active">
                          <a href="#" aria-controls="purchases-table" data-dt-idx="1" tabindex="0"
                            class="page-link">1</a>
                        </li>
                        <li class="paginate_button page-item next disabled" id="purchases-table_next">
                          <a href="#" aria-controls="purchases-table" data-dt-idx="2" tabindex="0"
                            class="page-link">Next</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection @push('scripts') @endpush