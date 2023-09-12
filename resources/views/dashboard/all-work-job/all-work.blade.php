@extends('dashboard.layouts.master')

@section('title', 'Auto Glass depo')

@push('styles')



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
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="create-all-work" class="btn btn-primary">
                            Add Work Order +
                        </a>

                        <hr>

                        <div class="row table-setting" style="padding:10px">
		<div class="col-md-12 ">
			<div class="row mb-3">
				<div class="col-md-4">
					<div class="" id="datatable_length" ><label style="font-weight: 400;" class="labelstyle" >Show <select name="datatable_length"
								aria-controls="datatable" class="form-control input-sm col-md-2 selectstyle" style="padding:0px">
								<option value="10">10</option>
								<option value="25">25</option>
								<option value="50">50</option>
								<option value="100">100</option>
							</select> entries</label></div>
				</div>
				<div class="col-md-5">
					<div class="dt-buttons btn-group flex-wrap button-to-table"> <button class="btn btn-secondary buttons-excel"
							tabindex="0" aria-controls="product-table" type="button"><span>

								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
									stroke-width="1.5" stroke="currentColor" style="width:17px">
									<path stroke-linecap="round" stroke-linejoin="round"
										d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
								</svg>


								Excel</span></button> <button class="btn btn-secondary buttons-print" tabindex="0"
							aria-controls="product-table" type="button"><span>
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
									stroke-width="1.5" stroke="currentColor" style="width:17px">
									<path stroke-linecap="round" stroke-linejoin="round"
										d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
								</svg>



								Print</span></button> <button class="btn btn-secondary buttons-reset" tabindex="0"
							aria-controls="product-table" type="button"><span>
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
									stroke-width="1.5" stroke="currentColor" style="width:17px">
									<path stroke-linecap="round" stroke-linejoin="round"
										d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
								</svg>


								Reset</span></button> <button class="btn btn-secondary buttons-reload" tabindex="0"
							aria-controls="product-table" type="button"><span>

								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
									stroke-width="1.5" stroke="currentColor" style="width:17px">
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
			
                                <table class="table table-bordered dataTable no-footer" id="sales-table" role="grid" aria-describedby="sales-table_info" style="width: 987px;">
                                    <thead>
                                        <tr role="row">
                                            <th title="Date" class="text-center align-middle sorting" tabindex="0" aria-controls="sales-table" rowspan="1" colspan="1" style="width: 127px;" aria-label="Date: activate to sort column ascending">Date</th>
                                            <th title="Reference" class="text-center align-middle sorting" tabindex="0" aria-controls="sales-table" rowspan="1" colspan="1" style="width: 139px;" aria-label="Reference: activate to sort column ascending">Reference</th>
                                            <th title="Customer" class="text-center align-middle sorting" tabindex="0" aria-controls="sales-table" rowspan="1" colspan="1" style="width: 136px;" aria-label="Customer: activate to sort column ascending">Customer</th>
                                            <th title="Status" class="text-center align-middle sorting_disabled" rowspan="1" colspan="1" style="width: 122px;" aria-label="Status">Status</th>
                                            <th title="Total Amount" class="text-center align-middle sorting_disabled" rowspan="1" colspan="1" style="width: 169px;" aria-label="Total Amount">Total Amount</th>
                                            <th title="Action" class="text-center align-middle sorting_disabled" rowspan="1" colspan="1" style="width: 90px;" aria-label="Action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd">
                                            <td class=" text-center align-middle">17 Jan, 2023</td>
                                            <td class=" text-center align-middle">QT-00169</td>
                                            <td class=" text-center align-middle">Cust_2</td>
                                            <td class=" text-center align-middle"><span class="badge badge-info">
                                                    Pending
                                                </span>
                                            </td>
                                            <td class=" text-center align-middle">$55.00</td>
                                            <td class=" text-center align-middle">
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn btn-ghost-primary dropdown rounded" data-toggle="dropdown" aria-expanded="false">
                                                        <img src="./assets/images/dashboard/search/dots.png">
                                                    </button>
                                                    <div class="dropdown-menu">

                                                        <a href="https://inventory.allstateautoglassinc.com/quotation/mail/170" class="dropdown-item">
                                                            <i class="bi bi-cursor mr-2 text-warning" style="line-height: 1;"></i> Send On Email
                                                        </a>

                                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#exampleModalLong">
                                                            <i class="bi bi-check-lg mr-2 text-success" style="line-height: 1;"></i> Complete &amp; Invoice
                                                        </a>
                                                        <a href="create-all-work" class="dropdown-item">
                                                            <i class="bi bi-pencil mr-2 text-primary" style="line-height: 1;"></i> Edit
                                                        </a>
                                                        <a href="order-details" class="dropdown-item">
                                                            <i class="bi bi-eye mr-2 text-info" style="line-height: 1;"></i> Details
                                                        </a>
                                                        <button id="delete" class="dropdown-item" onclick="
                                                event.preventDefault();
                                                if (confirm('Are you sure? It will delete the data permanently!')) {
                                                document.getElementById('destroy170').submit()
                                                }">
                                                            <i class="bi bi-trash mr-2 text-danger" style="line-height: 1;"></i> Delete
                                                            <form id="destroy170" class="d-none" action="https://inventory.allstateautoglassinc.com/quotations/170" method="POST">
                                                                <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln"> <input type="hidden" name="_method" value="delete">
                                                            </form>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                    <div class="modal-dialog qouteInvoiceModal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <!-- <h5 class="modal-title" id="eventCreateModalLabel">Job Details</h5> -->
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="row mt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <form id="quotation-invoice-form" action="https://inventory.allstateautoglassinc.com/payment" method="POST">
                                                                                                <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln">
                                                                                                <h5 class="mb-4 "><i>Payment Information</i></h5>

                                                                                                <h5 class="mb-4 "><i class="bi bi-cash p-2"></i>Total Amount <span id="amt"></span></h5>

                                                                                                <h5 class="mb-4 "><i class="bi bi-cash p-2"></i>Due Amount <span id="due"></span></h5>

                                                                                                <div class="form-row">
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="pay_status">Work Order Status<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="work_status" id="work_status" required="">
                                                                                                                    <option value="0" selected="" disabled="">Select Work Order Status</option>
                                                                                                                    <option value="Pending">Pending</option>
                                                                                                                    <option value="Completed">Completed</option>

                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="pay_status">Payment Status<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="pay_status" id="pay_status" onchange="appear()" required="">
                                                                                                                    <option value="0" selected="" disabled="">Select Payment Status</option>
                                                                                                                    <option value="Paid">Paid</option>
                                                                                                                    <option value="Partial">Partial Paid</option>
                                                                                                                    <option value="UnPaid">UnPaid</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <input type="hidden" name="pay_id" id="pay_id">
                                                                                                    <div class="col-md-6 paid" style="display: none">
                                                                                                        <div class="form-group">
                                                                                                            <label for="pay_type">Payment Type </label>
                                                                                                            <select class="form-control" name="pay_type" id="pay_type" onchange="appear_type()">
                                                                                                                <option value="0" selected="" disabled="">Select Payment Type</option>
                                                                                                                <option value="Credit Card">Credit Card</option>
                                                                                                                <option value="Check">Check</option>
                                                                                                                <option value="Cash">Cash</option>
                                                                                                                <option value="Debit Card">Debit Card</option>
                                                                                                                <option value="Gift Card">Gift Card</option>

                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 check" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="check_num">Check Number<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="check_num" id="check_num">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="credit_num">Credit Card Number<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="credit_num" id="credit_num">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="expire_date">Expire Date<span class="text-danger">*</span></label>
                                                                                                                <input type="date" class="form-control " name="expire_date" id="expire_date">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="card_name">Name on Card<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="card_name" id="card_name">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="card_type">Card Type<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="card_type" id="card_type">
                                                                                                                    <option value="0" selected="" disabled="">Select Card Type</option>
                                                                                                                    <option value="N/A">N/A</option>
                                                                                                                    <option value="Visa">Visa</option>
                                                                                                                    <option value="Master Card">Master Card</option>
                                                                                                                    <option value="American Express">American Express</option>
                                                                                                                    <option value="Discover">Discover</option>
                                                                                                                    <option value="Internal">Internal</option>
                                                                                                                    <option value="Union Pay">Union Pay</option>
                                                                                                                    <option value="Other">Other</option>

                                                                                                                </select>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="zip_code">Zip Code<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="zip_code" id="zip_code">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <input type="hidden" name="total_am" id="total_am">
                                                                                                    <div class="col-lg-6 paid">
                                                                                                        <div class="form-group">
                                                                                                            <label for="paid_amount">Amount Received <span class="text-danger">*</span></label>
                                                                                                            <div class="input-group">
                                                                                                                <input id="paid_amount" type="text" class="form-control" name="paid_amount" onchange="check()">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>






                                                                                                </div>

                                                                                                <div class="mt-3">
                                                                                                    <button type="submit" class="btn btn-primary">
                                                                                                        Create Payment <i class="bi bi-check"></i>
                                                                                                    </button>
                                                                                                </div>




                                                                                            </form>
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
                                            </td>
                                        </tr>
                                        <tr class="even">
                                            <td class=" text-center align-middle">14 Jan, 2023</td>
                                            <td class=" text-center align-middle">QT-00168</td>
                                            <td class=" text-center align-middle">Cust_3</td>
                                            <td class=" text-center align-middle"><span class="badge badge-info">
                                                    Pending
                                                </span>
                                            </td>
                                            <td class=" text-center align-middle">$55.00</td>
                                            <td class=" text-center align-middle">
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn btn-ghost-primary dropdown rounded" data-toggle="dropdown" aria-expanded="false">
                                                        <img src="./assets/images/dashboard/search/dots.png">
                                                    </button>
                                                    <div class="dropdown-menu">

                                                        <a href="https://inventory.allstateautoglassinc.com/quotation/mail/168" class="dropdown-item">
                                                            <i class="bi bi-cursor mr-2 text-warning" style="line-height: 1;"></i> Send On Email
                                                        </a>

                                                        <a href="#" class="dropdown-item" onclick="modalopen(168 , 55 , 55 )  ">
                                                            <i class="bi bi-check-lg mr-2 text-success" style="line-height: 1;"></i> Complete &amp; Invoice
                                                        </a>
                                                        <a href="create-all-work" class="dropdown-item">
                                                            <i class="bi bi-pencil mr-2 text-primary" style="line-height: 1;"></i> Edit
                                                        </a>
                                                        <a href="order-details" class="dropdown-item">
                                                            <i class="bi bi-eye mr-2 text-info" style="line-height: 1;"></i> Details
                                                        </a>
                                                        <button id="delete" class="dropdown-item" onclick="
                event.preventDefault();
                if (confirm('Are you sure? It will delete the data permanently!')) {
                document.getElementById('destroy168').submit()
                }">
                                                            <i class="bi bi-trash mr-2 text-danger" style="line-height: 1;"></i> Delete
                                                            <form id="destroy168" class="d-none" action="https://inventory.allstateautoglassinc.com/quotations/168" method="POST">
                                                                <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln"> <input type="hidden" name="_method" value="delete">
                                                            </form>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="qouteInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="qouteInvoiceModal" aria-hidden="true">
                                                    <div class="modal-dialog qouteInvoiceModal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <!-- <h5 class="modal-title" id="eventCreateModalLabel">Job Details</h5> -->
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="row mt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <form id="quotation-invoice-form" action="https://inventory.allstateautoglassinc.com/payment" method="POST">
                                                                                                <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln">
                                                                                                <h5 class="mb-4 "><i>Payment Information</i></h5>

                                                                                                <h5 class="mb-4 "><i class="bi bi-cash p-2"></i>Total Amount <span id="amt"></span></h5>

                                                                                                <h5 class="mb-4 "><i class="bi bi-cash p-2"></i>Due Amount <span id="due"></span></h5>

                                                                                                <div class="form-row">
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="pay_status">Work Order Status<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="work_status" id="work_status" required="">
                                                                                                                    <option value="0" selected="" disabled="">Select Work Order Status</option>
                                                                                                                    <option value="Pending">Pending</option>
                                                                                                                    <option value="Completed">Completed</option>

                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="pay_status">Payment Status<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="pay_status" id="pay_status" onchange="appear()" required="">
                                                                                                                    <option value="0" selected="" disabled="">Select Payment Status</option>
                                                                                                                    <option value="Paid">Paid</option>
                                                                                                                    <option value="Partial">Partial Paid</option>
                                                                                                                    <option value="UnPaid">UnPaid</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <input type="hidden" name="pay_id" id="pay_id">
                                                                                                    <div class="col-md-6 paid" style="display: none">
                                                                                                        <div class="form-group">
                                                                                                            <label for="pay_type">Payment Type </label>
                                                                                                            <select class="form-control" name="pay_type" id="pay_type" onchange="appear_type()">
                                                                                                                <option value="0" selected="" disabled="">Select Payment Type</option>
                                                                                                                <option value="Credit Card">Credit Card</option>
                                                                                                                <option value="Check">Check</option>
                                                                                                                <option value="Cash">Cash</option>
                                                                                                                <option value="Debit Card">Debit Card</option>
                                                                                                                <option value="Gift Card">Gift Card</option>

                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 check" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="check_num">Check Number<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="check_num" id="check_num">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="credit_num">Credit Card Number<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="credit_num" id="credit_num">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="expire_date">Expire Date<span class="text-danger">*</span></label>
                                                                                                                <input type="date" class="form-control " name="expire_date" id="expire_date">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="card_name">Name on Card<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="card_name" id="card_name">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="card_type">Card Type<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="card_type" id="card_type">
                                                                                                                    <option value="0" selected="" disabled="">Select Card Type</option>
                                                                                                                    <option value="N/A">N/A</option>
                                                                                                                    <option value="Visa">Visa</option>
                                                                                                                    <option value="Master Card">Master Card</option>
                                                                                                                    <option value="American Express">American Express</option>
                                                                                                                    <option value="Discover">Discover</option>
                                                                                                                    <option value="Internal">Internal</option>
                                                                                                                    <option value="Union Pay">Union Pay</option>
                                                                                                                    <option value="Other">Other</option>

                                                                                                                </select>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="zip_code">Zip Code<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="zip_code" id="zip_code">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <input type="hidden" name="total_am" id="total_am">
                                                                                                    <div class="col-lg-6 paid">
                                                                                                        <div class="form-group">
                                                                                                            <label for="paid_amount">Amount Received <span class="text-danger">*</span></label>
                                                                                                            <div class="input-group">
                                                                                                                <input id="paid_amount" type="text" class="form-control" name="paid_amount" onchange="check()">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>






                                                                                                </div>

                                                                                                <div class="mt-3">
                                                                                                    <button type="submit" class="btn btn-primary">
                                                                                                        Create Payment <i class="bi bi-check"></i>
                                                                                                    </button>
                                                                                                </div>




                                                                                            </form>
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
                                            </td>
                                        </tr>
                                        <tr class="odd">
                                            <td class=" text-center align-middle">11 Jan, 2023</td>
                                            <td class=" text-center align-middle">QT-00167</td>
                                            <td class=" text-center align-middle">Cust_2</td>
                                            <td class=" text-center align-middle"><span class="badge badge-info">
                                                    Pending
                                                </span>
                                            </td>
                                            <td class=" text-center align-middle">$55.00</td>
                                            <td class=" text-center align-middle">
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn btn-ghost-primary dropdown rounded" data-toggle="dropdown" aria-expanded="false">
                                                        <img src="./assets/images/dashboard/search/dots.png">
                                                    </button>
                                                    <div class="dropdown-menu">

                                                        <a href="https://inventory.allstateautoglassinc.com/quotation/mail/167" class="dropdown-item">
                                                            <i class="bi bi-cursor mr-2 text-warning" style="line-height: 1;"></i> Send On Email
                                                        </a>

                                                        <a href="#" class="dropdown-item" onclick="modalopen(167 , 55 , 55 )  ">
                                                            <i class="bi bi-check-lg mr-2 text-success" style="line-height: 1;"></i> Complete &amp; Invoice
                                                        </a>
                                                        <a href="create-all-work" class="dropdown-item">
                                                            <i class="bi bi-pencil mr-2 text-primary" style="line-height: 1;"></i> Edit
                                                        </a>
                                                        <a href="order-details" class="dropdown-item">
                                                            <i class="bi bi-eye mr-2 text-info" style="line-height: 1;"></i> Details
                                                        </a>
                                                        <button id="delete" class="dropdown-item" onclick="
                event.preventDefault();
                if (confirm('Are you sure? It will delete the data permanently!')) {
                document.getElementById('destroy167').submit()
                }">
                                                            <i class="bi bi-trash mr-2 text-danger" style="line-height: 1;"></i> Delete
                                                            <form id="destroy167" class="d-none" action="https://inventory.allstateautoglassinc.com/quotations/167" method="POST">
                                                                <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln"> <input type="hidden" name="_method" value="delete">
                                                            </form>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="qouteInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="qouteInvoiceModal" aria-hidden="true">
                                                    <div class="modal-dialog qouteInvoiceModal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <!-- <h5 class="modal-title" id="eventCreateModalLabel">Job Details</h5> -->
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="row mt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <form id="quotation-invoice-form" action="https://inventory.allstateautoglassinc.com/payment" method="POST">
                                                                                                <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln">
                                                                                                <h5 class="mb-4 "><i>Payment Information</i></h5>

                                                                                                <h5 class="mb-4 "><i class="bi bi-cash p-2"></i>Total Amount <span id="amt"></span></h5>

                                                                                                <h5 class="mb-4 "><i class="bi bi-cash p-2"></i>Due Amount <span id="due"></span></h5>

                                                                                                <div class="form-row">
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="pay_status">Work Order Status<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="work_status" id="work_status" required="">
                                                                                                                    <option value="0" selected="" disabled="">Select Work Order Status</option>
                                                                                                                    <option value="Pending">Pending</option>
                                                                                                                    <option value="Completed">Completed</option>

                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="pay_status">Payment Status<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="pay_status" id="pay_status" onchange="appear()" required="">
                                                                                                                    <option value="0" selected="" disabled="">Select Payment Status</option>
                                                                                                                    <option value="Paid">Paid</option>
                                                                                                                    <option value="Partial">Partial Paid</option>
                                                                                                                    <option value="UnPaid">UnPaid</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <input type="hidden" name="pay_id" id="pay_id">
                                                                                                    <div class="col-md-6 paid" style="display: none">
                                                                                                        <div class="form-group">
                                                                                                            <label for="pay_type">Payment Type </label>
                                                                                                            <select class="form-control" name="pay_type" id="pay_type" onchange="appear_type()">
                                                                                                                <option value="0" selected="" disabled="">Select Payment Type</option>
                                                                                                                <option value="Credit Card">Credit Card</option>
                                                                                                                <option value="Check">Check</option>
                                                                                                                <option value="Cash">Cash</option>
                                                                                                                <option value="Debit Card">Debit Card</option>
                                                                                                                <option value="Gift Card">Gift Card</option>

                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 check" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="check_num">Check Number<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="check_num" id="check_num">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="credit_num">Credit Card Number<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="credit_num" id="credit_num">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="expire_date">Expire Date<span class="text-danger">*</span></label>
                                                                                                                <input type="date" class="form-control " name="expire_date" id="expire_date">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="card_name">Name on Card<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="card_name" id="card_name">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="card_type">Card Type<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="card_type" id="card_type">
                                                                                                                    <option value="0" selected="" disabled="">Select Card Type</option>
                                                                                                                    <option value="N/A">N/A</option>
                                                                                                                    <option value="Visa">Visa</option>
                                                                                                                    <option value="Master Card">Master Card</option>
                                                                                                                    <option value="American Express">American Express</option>
                                                                                                                    <option value="Discover">Discover</option>
                                                                                                                    <option value="Internal">Internal</option>
                                                                                                                    <option value="Union Pay">Union Pay</option>
                                                                                                                    <option value="Other">Other</option>

                                                                                                                </select>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="zip_code">Zip Code<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="zip_code" id="zip_code">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <input type="hidden" name="total_am" id="total_am">
                                                                                                    <div class="col-lg-6 paid">
                                                                                                        <div class="form-group">
                                                                                                            <label for="paid_amount">Amount Received <span class="text-danger">*</span></label>
                                                                                                            <div class="input-group">
                                                                                                                <input id="paid_amount" type="text" class="form-control" name="paid_amount" onchange="check()">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>






                                                                                                </div>

                                                                                                <div class="mt-3">
                                                                                                    <button type="submit" class="btn btn-primary">
                                                                                                        Create Payment <i class="bi bi-check"></i>
                                                                                                    </button>
                                                                                                </div>




                                                                                            </form>
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
                                            </td>
                                        </tr>
                                        <tr class="even">
                                            <td class=" text-center align-middle">13 Jan, 2023</td>
                                            <td class=" text-center align-middle">QT-00166</td>
                                            <td class=" text-center align-middle">Cus_1</td>
                                            <td class=" text-center align-middle"><span class="badge badge-info">
                                                    Pending
                                                </span>
                                            </td>
                                            <td class=" text-center align-middle">$55.00</td>
                                            <td class=" text-center align-middle">
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn btn-ghost-primary dropdown rounded" data-toggle="dropdown" aria-expanded="false">
                                                        <img src="./assets/images/dashboard/search/dots.png">
                                                    </button>
                                                    <div class="dropdown-menu">

                                                        <a href="https://inventory.allstateautoglassinc.com/quotation/mail/166" class="dropdown-item">
                                                            <i class="bi bi-cursor mr-2 text-warning" style="line-height: 1;"></i> Send On Email
                                                        </a>

                                                        <a href="#" class="dropdown-item" onclick="modalopen(166 , 55 , 55 )  ">
                                                            <i class="bi bi-check-lg mr-2 text-success" style="line-height: 1;"></i> Complete &amp; Invoice
                                                        </a>
                                                        <a href="create-all-work" class="dropdown-item">
                                                            <i class="bi bi-pencil mr-2 text-primary" style="line-height: 1;"></i> Edit
                                                        </a>
                                                        <a href="order-details" class="dropdown-item">
                                                            <i class="bi bi-eye mr-2 text-info" style="line-height: 1;"></i> Details
                                                        </a>
                                                        <button id="delete" class="dropdown-item" onclick="
                                                            event.preventDefault();
                                                            if (confirm('Are you sure? It will delete the data permanently!')) {
                                                            document.getElementById('destroy166').submit()
                                                            }">
                                                            <i class="bi bi-trash mr-2 text-danger" style="line-height: 1;"></i> Delete
                                                            <form id="destroy166" class="d-none" action="https://inventory.allstateautoglassinc.com/quotations/166" method="POST">
                                                                <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln"> <input type="hidden" name="_method" value="delete">
                                                            </form>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="qouteInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="qouteInvoiceModal" aria-hidden="true">
                                                    <div class="modal-dialog qouteInvoiceModal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <!-- <h5 class="modal-title" id="eventCreateModalLabel">Job Details</h5> -->
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="row mt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <form id="quotation-invoice-form" action="https://inventory.allstateautoglassinc.com/payment" method="POST">
                                                                                                <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln">
                                                                                                <h5 class="mb-4 "><i>Payment Information</i></h5>

                                                                                                <h5 class="mb-4 "><i class="bi bi-cash p-2"></i>Total Amount <span id="amt"></span></h5>

                                                                                                <h5 class="mb-4 "><i class="bi bi-cash p-2"></i>Due Amount <span id="due"></span></h5>

                                                                                                <div class="form-row">
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="pay_status">Work Order Status<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="work_status" id="work_status" required="">
                                                                                                                    <option value="0" selected="" disabled="">Select Work Order Status</option>
                                                                                                                    <option value="Pending">Pending</option>
                                                                                                                    <option value="Completed">Completed</option>

                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="pay_status">Payment Status<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="pay_status" id="pay_status" onchange="appear()" required="">
                                                                                                                    <option value="0" selected="" disabled="">Select Payment Status</option>
                                                                                                                    <option value="Paid">Paid</option>
                                                                                                                    <option value="Partial">Partial Paid</option>
                                                                                                                    <option value="UnPaid">UnPaid</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <input type="hidden" name="pay_id" id="pay_id">
                                                                                                    <div class="col-md-6 paid" style="display: none">
                                                                                                        <div class="form-group">
                                                                                                            <label for="pay_type">Payment Type </label>
                                                                                                            <select class="form-control" name="pay_type" id="pay_type" onchange="appear_type()">
                                                                                                                <option value="0" selected="" disabled="">Select Payment Type</option>
                                                                                                                <option value="Credit Card">Credit Card</option>
                                                                                                                <option value="Check">Check</option>
                                                                                                                <option value="Cash">Cash</option>
                                                                                                                <option value="Debit Card">Debit Card</option>
                                                                                                                <option value="Gift Card">Gift Card</option>

                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 check" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="check_num">Check Number<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="check_num" id="check_num">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="credit_num">Credit Card Number<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="credit_num" id="credit_num">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="expire_date">Expire Date<span class="text-danger">*</span></label>
                                                                                                                <input type="date" class="form-control " name="expire_date" id="expire_date">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="card_name">Name on Card<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="card_name" id="card_name">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="card_type">Card Type<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="card_type" id="card_type">
                                                                                                                    <option value="0" selected="" disabled="">Select Card Type</option>
                                                                                                                    <option value="N/A">N/A</option>
                                                                                                                    <option value="Visa">Visa</option>
                                                                                                                    <option value="Master Card">Master Card</option>
                                                                                                                    <option value="American Express">American Express</option>
                                                                                                                    <option value="Discover">Discover</option>
                                                                                                                    <option value="Internal">Internal</option>
                                                                                                                    <option value="Union Pay">Union Pay</option>
                                                                                                                    <option value="Other">Other</option>

                                                                                                                </select>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="zip_code">Zip Code<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="zip_code" id="zip_code">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <input type="hidden" name="total_am" id="total_am">
                                                                                                    <div class="col-lg-6 paid">
                                                                                                        <div class="form-group">
                                                                                                            <label for="paid_amount">Amount Received <span class="text-danger">*</span></label>
                                                                                                            <div class="input-group">
                                                                                                                <input id="paid_amount" type="text" class="form-control" name="paid_amount" onchange="check()">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>






                                                                                                </div>

                                                                                                <div class="mt-3">
                                                                                                    <button type="submit" class="btn btn-primary">
                                                                                                        Create Payment <i class="bi bi-check"></i>
                                                                                                    </button>
                                                                                                </div>




                                                                                            </form>
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
                                            </td>
                                        </tr>
                                        <tr class="odd">
                                            <td class=" text-center align-middle">12 Jan, 2023</td>
                                            <td class=" text-center align-middle">QT-00165</td>
                                            <td class=" text-center align-middle">Cust_2</td>
                                            <td class=" text-center align-middle"><span class="badge badge-success">
                                                    Completed
                                                </span>
                                            </td>
                                            <td class=" text-center align-middle">$55.00</td>
                                            <td class=" text-center align-middle">
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn btn-ghost-primary dropdown rounded" data-toggle="dropdown" aria-expanded="false">
                                                        <img src="./assets/images/dashboard/search/dots.png">
                                                    </button>
                                                    <div class="dropdown-menu">

                                                        <a href="https://inventory.allstateautoglassinc.com/quotation/mail/165" class="dropdown-item">
                                                            <i class="bi bi-cursor mr-2 text-warning" style="line-height: 1;"></i> Send On Email
                                                        </a>
                                                        <a href="https://inventory.allstateautoglassinc.com/invoice/165" target="_blank" class="dropdown-item">
                                                            <i class="bi bi-check-lg mr-2 text-success" style="line-height: 1;"></i> Invoice
                                                        </a>
                                                        <a href="create-all-work" class="dropdown-item">
                                                            <i class="bi bi-pencil mr-2 text-primary" style="line-height: 1;"></i> Edit
                                                        </a>
                                                        <a href="order-details" class="dropdown-item">
                                                            <i class="bi bi-eye mr-2 text-info" style="line-height: 1;"></i> Details
                                                        </a>
                                                        <button id="delete" class="dropdown-item" onclick="
                                                            event.preventDefault();
                                                            if (confirm('Are you sure? It will delete the data permanently!')) {
                                                            document.getElementById('destroy165').submit()
                                                            }">
                                                            <i class="bi bi-trash mr-2 text-danger" style="line-height: 1;"></i> Delete
                                                            <form id="destroy165" class="d-none" action="https://inventory.allstateautoglassinc.com/quotations/165" method="POST">
                                                                <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln"> <input type="hidden" name="_method" value="delete">
                                                            </form>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="qouteInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="qouteInvoiceModal" aria-hidden="true">
                                                    <div class="modal-dialog qouteInvoiceModal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <!-- <h5 class="modal-title" id="eventCreateModalLabel">Job Details</h5> -->
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="row mt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <form id="quotation-invoice-form" action="https://inventory.allstateautoglassinc.com/payment" method="POST">
                                                                                                <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln">
                                                                                                <h5 class="mb-4 "><i>Payment Information</i></h5>

                                                                                                <h5 class="mb-4 "><i class="bi bi-cash p-2"></i>Total Amount <span id="amt"></span></h5>

                                                                                                <h5 class="mb-4 "><i class="bi bi-cash p-2"></i>Due Amount <span id="due"></span></h5>

                                                                                                <div class="form-row">
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="pay_status">Work Order Status<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="work_status" id="work_status" required="">
                                                                                                                    <option value="0" selected="" disabled="">Select Work Order Status</option>
                                                                                                                    <option value="Pending">Pending</option>
                                                                                                                    <option value="Completed">Completed</option>

                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="pay_status">Payment Status<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="pay_status" id="pay_status" onchange="appear()" required="">
                                                                                                                    <option value="0" selected="" disabled="">Select Payment Status</option>
                                                                                                                    <option value="Paid">Paid</option>
                                                                                                                    <option value="Partial">Partial Paid</option>
                                                                                                                    <option value="UnPaid">UnPaid</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <input type="hidden" name="pay_id" id="pay_id">
                                                                                                    <div class="col-md-6 paid" style="display: none">
                                                                                                        <div class="form-group">
                                                                                                            <label for="pay_type">Payment Type </label>
                                                                                                            <select class="form-control" name="pay_type" id="pay_type" onchange="appear_type()">
                                                                                                                <option value="0" selected="" disabled="">Select Payment Type</option>
                                                                                                                <option value="Credit Card">Credit Card</option>
                                                                                                                <option value="Check">Check</option>
                                                                                                                <option value="Cash">Cash</option>
                                                                                                                <option value="Debit Card">Debit Card</option>
                                                                                                                <option value="Gift Card">Gift Card</option>

                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 check" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="check_num">Check Number<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="check_num" id="check_num">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="credit_num">Credit Card Number<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="credit_num" id="credit_num">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="expire_date">Expire Date<span class="text-danger">*</span></label>
                                                                                                                <input type="date" class="form-control " name="expire_date" id="expire_date">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="card_name">Name on Card<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="card_name" id="card_name">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="card_type">Card Type<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="card_type" id="card_type">
                                                                                                                    <option value="0" selected="" disabled="">Select Card Type</option>
                                                                                                                    <option value="N/A">N/A</option>
                                                                                                                    <option value="Visa">Visa</option>
                                                                                                                    <option value="Master Card">Master Card</option>
                                                                                                                    <option value="American Express">American Express</option>
                                                                                                                    <option value="Discover">Discover</option>
                                                                                                                    <option value="Internal">Internal</option>
                                                                                                                    <option value="Union Pay">Union Pay</option>
                                                                                                                    <option value="Other">Other</option>

                                                                                                                </select>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="zip_code">Zip Code<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="zip_code" id="zip_code">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <input type="hidden" name="total_am" id="total_am">
                                                                                                    <div class="col-lg-6 paid">
                                                                                                        <div class="form-group">
                                                                                                            <label for="paid_amount">Amount Received <span class="text-danger">*</span></label>
                                                                                                            <div class="input-group">
                                                                                                                <input id="paid_amount" type="text" class="form-control" name="paid_amount" onchange="check()">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>






                                                                                                </div>

                                                                                                <div class="mt-3">
                                                                                                    <button type="submit" class="btn btn-primary">
                                                                                                        Create Payment <i class="bi bi-check"></i>
                                                                                                    </button>
                                                                                                </div>




                                                                                            </form>
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
                                            </td>
                                        </tr>
                                        <tr class="even">
                                            <td class=" text-center align-middle">12 Jan, 2023</td>
                                            <td class=" text-center align-middle">QT-00164</td>
                                            <td class=" text-center align-middle">Cus_1</td>
                                            <td class=" text-center align-middle"><span class="badge badge-success">
                                                    Completed
                                                </span>
                                            </td>
                                            <td class=" text-center align-middle">$55.00</td>
                                            <td class=" text-center align-middle">
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn btn-ghost-primary dropdown rounded" data-toggle="dropdown" aria-expanded="false">
                                                        <img src="./assets/images/dashboard/search/dots.png">
                                                    </button>
                                                    <div class="dropdown-menu">

                                                        <a href="https://inventory.allstateautoglassinc.com/quotation/mail/164" class="dropdown-item">
                                                            <i class="bi bi-cursor mr-2 text-warning" style="line-height: 1;"></i> Send On Email
                                                        </a>
                                                        <a href="https://inventory.allstateautoglassinc.com/invoice/164" target="_blank" class="dropdown-item">
                                                            <i class="bi bi-check-lg mr-2 text-success" style="line-height: 1;"></i> Invoice
                                                        </a>
                                                        <a href="create-all-work" class="dropdown-item">
                                                            <i class="bi bi-pencil mr-2 text-primary" style="line-height: 1;"></i> Edit
                                                        </a>
                                                        <a href="order-details" class="dropdown-item">
                                                            <i class="bi bi-eye mr-2 text-info" style="line-height: 1;"></i> Details
                                                        </a>
                                                        <button id="delete" class="dropdown-item" onclick="
                                                            event.preventDefault();
                                                            if (confirm('Are you sure? It will delete the data permanently!')) {
                                                            document.getElementById('destroy164').submit()
                                                            }">
                                                            <i class="bi bi-trash mr-2 text-danger" style="line-height: 1;"></i> Delete
                                                            <form id="destroy164" class="d-none" action="https://inventory.allstateautoglassinc.com/quotations/164" method="POST">
                                                                <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln"> <input type="hidden" name="_method" value="delete">
                                                            </form>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="qouteInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="qouteInvoiceModal" aria-hidden="true">
                                                    <div class="modal-dialog qouteInvoiceModal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <!-- <h5 class="modal-title" id="eventCreateModalLabel">Job Details</h5> -->
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="row mt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <form id="quotation-invoice-form" action="https://inventory.allstateautoglassinc.com/payment" method="POST">
                                                                                                <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln">
                                                                                                <h5 class="mb-4 "><i>Payment Information</i></h5>

                                                                                                <h5 class="mb-4 "><i class="bi bi-cash p-2"></i>Total Amount <span id="amt"></span></h5>

                                                                                                <h5 class="mb-4 "><i class="bi bi-cash p-2"></i>Due Amount <span id="due"></span></h5>

                                                                                                <div class="form-row">
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="pay_status">Work Order Status<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="work_status" id="work_status" required="">
                                                                                                                    <option value="0" selected="" disabled="">Select Work Order Status</option>
                                                                                                                    <option value="Pending">Pending</option>
                                                                                                                    <option value="Completed">Completed</option>

                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="pay_status">Payment Status<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="pay_status" id="pay_status" onchange="appear()" required="">
                                                                                                                    <option value="0" selected="" disabled="">Select Payment Status</option>
                                                                                                                    <option value="Paid">Paid</option>
                                                                                                                    <option value="Partial">Partial Paid</option>
                                                                                                                    <option value="UnPaid">UnPaid</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <input type="hidden" name="pay_id" id="pay_id">
                                                                                                    <div class="col-md-6 paid" style="display: none">
                                                                                                        <div class="form-group">
                                                                                                            <label for="pay_type">Payment Type </label>
                                                                                                            <select class="form-control" name="pay_type" id="pay_type" onchange="appear_type()">
                                                                                                                <option value="0" selected="" disabled="">Select Payment Type</option>
                                                                                                                <option value="Credit Card">Credit Card</option>
                                                                                                                <option value="Check">Check</option>
                                                                                                                <option value="Cash">Cash</option>
                                                                                                                <option value="Debit Card">Debit Card</option>
                                                                                                                <option value="Gift Card">Gift Card</option>

                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 check" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="check_num">Check Number<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="check_num" id="check_num">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="credit_num">Credit Card Number<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="credit_num" id="credit_num">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="expire_date">Expire Date<span class="text-danger">*</span></label>
                                                                                                                <input type="date" class="form-control " name="expire_date" id="expire_date">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="card_name">Name on Card<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="card_name" id="card_name">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="card_type">Card Type<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="card_type" id="card_type">
                                                                                                                    <option value="0" selected="" disabled="">Select Card Type</option>
                                                                                                                    <option value="N/A">N/A</option>
                                                                                                                    <option value="Visa">Visa</option>
                                                                                                                    <option value="Master Card">Master Card</option>
                                                                                                                    <option value="American Express">American Express</option>
                                                                                                                    <option value="Discover">Discover</option>
                                                                                                                    <option value="Internal">Internal</option>
                                                                                                                    <option value="Union Pay">Union Pay</option>
                                                                                                                    <option value="Other">Other</option>

                                                                                                                </select>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="zip_code">Zip Code<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="zip_code" id="zip_code">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <input type="hidden" name="total_am" id="total_am">
                                                                                                    <div class="col-lg-6 paid">
                                                                                                        <div class="form-group">
                                                                                                            <label for="paid_amount">Amount Received <span class="text-danger">*</span></label>
                                                                                                            <div class="input-group">
                                                                                                                <input id="paid_amount" type="text" class="form-control" name="paid_amount" onchange="check()">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>






                                                                                                </div>

                                                                                                <div class="mt-3">
                                                                                                    <button type="submit" class="btn btn-primary">
                                                                                                        Create Payment <i class="bi bi-check"></i>
                                                                                                    </button>
                                                                                                </div>




                                                                                            </form>
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
                                            </td>
                                        </tr>
                                        <tr class="odd">
                                            <td class=" text-center align-middle">12 Jan, 2023</td>
                                            <td class=" text-center align-middle">QT-00163</td>
                                            <td class=" text-center align-middle">Cust_3</td>
                                            <td class=" text-center align-middle"><span class="badge badge-success">
                                                    Completed
                                                </span>
                                            </td>
                                            <td class=" text-center align-middle">$33.00</td>
                                            <td class=" text-center align-middle">
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn btn-ghost-primary dropdown rounded" data-toggle="dropdown" aria-expanded="false">
                                                        <img src="./assets/images/dashboard/search/dots.png">
                                                    </button>
                                                    <div class="dropdown-menu">

                                                        <a href="https://inventory.allstateautoglassinc.com/quotation/mail/163" class="dropdown-item">
                                                            <i class="bi bi-cursor mr-2 text-warning" style="line-height: 1;"></i> Send On Email
                                                        </a>
                                                        <a href="https://inventory.allstateautoglassinc.com/invoice/163" target="_blank" class="dropdown-item">
                                                            <i class="bi bi-check-lg mr-2 text-success" style="line-height: 1;"></i> Invoice
                                                        </a>
                                                        <a href="create-all-work" class="dropdown-item">
                                                            <i class="bi bi-pencil mr-2 text-primary" style="line-height: 1;"></i> Edit
                                                        </a>
                                                        <a href="order-details" class="dropdown-item">
                                                            <i class="bi bi-eye mr-2 text-info" style="line-height: 1;"></i> Details
                                                        </a>
                                                        <button id="delete" class="dropdown-item" onclick="
                                                            event.preventDefault();
                                                            if (confirm('Are you sure? It will delete the data permanently!')) {
                                                            document.getElementById('destroy163').submit()
                                                            }">
                                                            <i class="bi bi-trash mr-2 text-danger" style="line-height: 1;"></i> Delete
                                                            <form id="destroy163" class="d-none" action="https://inventory.allstateautoglassinc.com/quotations/163" method="POST">
                                                                <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln"> <input type="hidden" name="_method" value="delete">
                                                            </form>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="qouteInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="qouteInvoiceModal" aria-hidden="true">
                                                    <div class="modal-dialog qouteInvoiceModal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <!-- <h5 class="modal-title" id="eventCreateModalLabel">Job Details</h5> -->
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="row mt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <form id="quotation-invoice-form" action="https://inventory.allstateautoglassinc.com/payment" method="POST">
                                                                                                <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln">
                                                                                                <h5 class="mb-4 "><i>Payment Information</i></h5>

                                                                                                <h5 class="mb-4 "><i class="bi bi-cash p-2"></i>Total Amount <span id="amt"></span></h5>

                                                                                                <h5 class="mb-4 "><i class="bi bi-cash p-2"></i>Due Amount <span id="due"></span></h5>

                                                                                                <div class="form-row">
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="pay_status">Work Order Status<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="work_status" id="work_status" required="">
                                                                                                                    <option value="0" selected="" disabled="">Select Work Order Status</option>
                                                                                                                    <option value="Pending">Pending</option>
                                                                                                                    <option value="Completed">Completed</option>

                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="pay_status">Payment Status<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="pay_status" id="pay_status" onchange="appear()" required="">
                                                                                                                    <option value="0" selected="" disabled="">Select Payment Status</option>
                                                                                                                    <option value="Paid">Paid</option>
                                                                                                                    <option value="Partial">Partial Paid</option>
                                                                                                                    <option value="UnPaid">UnPaid</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <input type="hidden" name="pay_id" id="pay_id">
                                                                                                    <div class="col-md-6 paid" style="display: none">
                                                                                                        <div class="form-group">
                                                                                                            <label for="pay_type">Payment Type </label>
                                                                                                            <select class="form-control" name="pay_type" id="pay_type" onchange="appear_type()">
                                                                                                                <option value="0" selected="" disabled="">Select Payment Type</option>
                                                                                                                <option value="Credit Card">Credit Card</option>
                                                                                                                <option value="Check">Check</option>
                                                                                                                <option value="Cash">Cash</option>
                                                                                                                <option value="Debit Card">Debit Card</option>
                                                                                                                <option value="Gift Card">Gift Card</option>

                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 check" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="check_num">Check Number<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="check_num" id="check_num">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="credit_num">Credit Card Number<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="credit_num" id="credit_num">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="expire_date">Expire Date<span class="text-danger">*</span></label>
                                                                                                                <input type="date" class="form-control " name="expire_date" id="expire_date">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="card_name">Name on Card<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="card_name" id="card_name">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="card_type">Card Type<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="card_type" id="card_type">
                                                                                                                    <option value="0" selected="" disabled="">Select Card Type</option>
                                                                                                                    <option value="N/A">N/A</option>
                                                                                                                    <option value="Visa">Visa</option>
                                                                                                                    <option value="Master Card">Master Card</option>
                                                                                                                    <option value="American Express">American Express</option>
                                                                                                                    <option value="Discover">Discover</option>
                                                                                                                    <option value="Internal">Internal</option>
                                                                                                                    <option value="Union Pay">Union Pay</option>
                                                                                                                    <option value="Other">Other</option>

                                                                                                                </select>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="zip_code">Zip Code<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="zip_code" id="zip_code">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <input type="hidden" name="total_am" id="total_am">
                                                                                                    <div class="col-lg-6 paid">
                                                                                                        <div class="form-group">
                                                                                                            <label for="paid_amount">Amount Received <span class="text-danger">*</span></label>
                                                                                                            <div class="input-group">
                                                                                                                <input id="paid_amount" type="text" class="form-control" name="paid_amount" onchange="check()">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>






                                                                                                </div>

                                                                                                <div class="mt-3">
                                                                                                    <button type="submit" class="btn btn-primary">
                                                                                                        Create Payment <i class="bi bi-check"></i>
                                                                                                    </button>
                                                                                                </div>




                                                                                            </form>
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
                                            </td>
                                        </tr>
                                        <tr class="even">
                                            <td class=" text-center align-middle">12 Jan, 2023</td>
                                            <td class=" text-center align-middle">QT-00162</td>
                                            <td class=" text-center align-middle">Cust_3</td>
                                            <td class=" text-center align-middle"><span class="badge badge-info">
                                                    Pending
                                                </span>
                                            </td>
                                            <td class=" text-center align-middle">$35.00</td>
                                            <td class=" text-center align-middle">
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn btn-ghost-primary dropdown rounded" data-toggle="dropdown" aria-expanded="false">
                                                        <img src="./assets/images/dashboard/search/dots.png">
                                                    </button>
                                                    <div class="dropdown-menu">

                                                        <a href="https://inventory.allstateautoglassinc.com/quotation/mail/162" class="dropdown-item">
                                                            <i class="bi bi-cursor mr-2 text-warning" style="line-height: 1;"></i> Send On Email
                                                        </a>

                                                        <a href="#" class="dropdown-item" onclick="modalopen(162 , 35 , 35 )  ">
                                                            <i class="bi bi-check-lg mr-2 text-success" style="line-height: 1;"></i> Complete &amp; Invoice
                                                        </a>
                                                        <a href="create-all-work" class="dropdown-item">
                                                            <i class="bi bi-pencil mr-2 text-primary" style="line-height: 1;"></i> Edit
                                                        </a>
                                                        <a href="order-details" class="dropdown-item">
                                                            <i class="bi bi-eye mr-2 text-info" style="line-height: 1;"></i> Details
                                                        </a>
                                                        <button id="delete" class="dropdown-item" onclick="
                event.preventDefault();
                if (confirm('Are you sure? It will delete the data permanently!')) {
                document.getElementById('destroy162').submit()
                }">
                                                            <i class="bi bi-trash mr-2 text-danger" style="line-height: 1;"></i> Delete
                                                            <form id="destroy162" class="d-none" action="https://inventory.allstateautoglassinc.com/quotations/162" method="POST">
                                                                <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln"> <input type="hidden" name="_method" value="delete">
                                                            </form>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="qouteInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="qouteInvoiceModal" aria-hidden="true">
                                                    <div class="modal-dialog qouteInvoiceModal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <!-- <h5 class="modal-title" id="eventCreateModalLabel">Job Details</h5> -->
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="row mt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <form id="quotation-invoice-form" action="https://inventory.allstateautoglassinc.com/payment" method="POST">
                                                                                                <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln">
                                                                                                <h5 class="mb-4 "><i>Payment Information</i></h5>

                                                                                                <h5 class="mb-4 "><i class="bi bi-cash p-2"></i>Total Amount <span id="amt"></span></h5>

                                                                                                <h5 class="mb-4 "><i class="bi bi-cash p-2"></i>Due Amount <span id="due"></span></h5>

                                                                                                <div class="form-row">
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="pay_status">Work Order Status<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="work_status" id="work_status" required="">
                                                                                                                    <option value="0" selected="" disabled="">Select Work Order Status</option>
                                                                                                                    <option value="Pending">Pending</option>
                                                                                                                    <option value="Completed">Completed</option>

                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="pay_status">Payment Status<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="pay_status" id="pay_status" onchange="appear()" required="">
                                                                                                                    <option value="0" selected="" disabled="">Select Payment Status</option>
                                                                                                                    <option value="Paid">Paid</option>
                                                                                                                    <option value="Partial">Partial Paid</option>
                                                                                                                    <option value="UnPaid">UnPaid</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <input type="hidden" name="pay_id" id="pay_id">
                                                                                                    <div class="col-md-6 paid" style="display: none">
                                                                                                        <div class="form-group">
                                                                                                            <label for="pay_type">Payment Type </label>
                                                                                                            <select class="form-control" name="pay_type" id="pay_type" onchange="appear_type()">
                                                                                                                <option value="0" selected="" disabled="">Select Payment Type</option>
                                                                                                                <option value="Credit Card">Credit Card</option>
                                                                                                                <option value="Check">Check</option>
                                                                                                                <option value="Cash">Cash</option>
                                                                                                                <option value="Debit Card">Debit Card</option>
                                                                                                                <option value="Gift Card">Gift Card</option>

                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 check" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="check_num">Check Number<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="check_num" id="check_num">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="credit_num">Credit Card Number<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="credit_num" id="credit_num">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="expire_date">Expire Date<span class="text-danger">*</span></label>
                                                                                                                <input type="date" class="form-control " name="expire_date" id="expire_date">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="card_name">Name on Card<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="card_name" id="card_name">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="card_type">Card Type<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="card_type" id="card_type">
                                                                                                                    <option value="0" selected="" disabled="">Select Card Type</option>
                                                                                                                    <option value="N/A">N/A</option>
                                                                                                                    <option value="Visa">Visa</option>
                                                                                                                    <option value="Master Card">Master Card</option>
                                                                                                                    <option value="American Express">American Express</option>
                                                                                                                    <option value="Discover">Discover</option>
                                                                                                                    <option value="Internal">Internal</option>
                                                                                                                    <option value="Union Pay">Union Pay</option>
                                                                                                                    <option value="Other">Other</option>

                                                                                                                </select>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="zip_code">Zip Code<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="zip_code" id="zip_code">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <input type="hidden" name="total_am" id="total_am">
                                                                                                    <div class="col-lg-6 paid">
                                                                                                        <div class="form-group">
                                                                                                            <label for="paid_amount">Amount Received <span class="text-danger">*</span></label>
                                                                                                            <div class="input-group">
                                                                                                                <input id="paid_amount" type="text" class="form-control" name="paid_amount" onchange="check()">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>






                                                                                                </div>

                                                                                                <div class="mt-3">
                                                                                                    <button type="submit" class="btn btn-primary">
                                                                                                        Create Payment <i class="bi bi-check"></i>
                                                                                                    </button>
                                                                                                </div>




                                                                                            </form>
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
                                            </td>
                                        </tr>
                                        <tr class="odd">
                                            <td class=" text-center align-middle">12 Jan, 2023</td>
                                            <td class=" text-center align-middle">QT-00161</td>
                                            <td class=" text-center align-middle">Cust_3</td>
                                            <td class=" text-center align-middle"><span class="badge badge-info">
                                                    Pending
                                                </span>
                                            </td>
                                            <td class=" text-center align-middle">$83.00</td>
                                            <td class=" text-center align-middle">
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn btn-ghost-primary dropdown rounded" data-toggle="dropdown" aria-expanded="false">
                                                        <img src="./assets/images/dashboard/search/dots.png">
                                                    </button>
                                                    <div class="dropdown-menu">

                                                        <a href="https://inventory.allstateautoglassinc.com/quotation/mail/161" class="dropdown-item">
                                                            <i class="bi bi-cursor mr-2 text-warning" style="line-height: 1;"></i> Send On Email
                                                        </a>

                                                        <a href="#" class="dropdown-item" onclick="modalopen(161 , 83 , 83 )  ">
                                                            <i class="bi bi-check-lg mr-2 text-success" style="line-height: 1;"></i> Complete &amp; Invoice
                                                        </a>
                                                        <a href="create-all-work" class="dropdown-item">
                                                            <i class="bi bi-pencil mr-2 text-primary" style="line-height: 1;"></i> Edit
                                                        </a>
                                                        <a href="order-details" class="dropdown-item">
                                                            <i class="bi bi-eye mr-2 text-info" style="line-height: 1;"></i> Details
                                                        </a>
                                                        <button id="delete" class="dropdown-item" onclick="
                event.preventDefault();
                if (confirm('Are you sure? It will delete the data permanently!')) {
                document.getElementById('destroy161').submit()
                }">
                                                            <i class="bi bi-trash mr-2 text-danger" style="line-height: 1;"></i> Delete
                                                            <form id="destroy161" class="d-none" action="https://inventory.allstateautoglassinc.com/quotations/161" method="POST">
                                                                <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln"> <input type="hidden" name="_method" value="delete">
                                                            </form>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="qouteInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="qouteInvoiceModal" aria-hidden="true">
                                                    <div class="modal-dialog qouteInvoiceModal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <!-- <h5 class="modal-title" id="eventCreateModalLabel">Job Details</h5> -->
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="row mt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <form id="quotation-invoice-form" action="https://inventory.allstateautoglassinc.com/payment" method="POST">
                                                                                                <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln">
                                                                                                <h5 class="mb-4 "><i>Payment Information</i></h5>

                                                                                                <h5 class="mb-4 "><i class="bi bi-cash p-2"></i>Total Amount <span id="amt"></span></h5>

                                                                                                <h5 class="mb-4 "><i class="bi bi-cash p-2"></i>Due Amount <span id="due"></span></h5>

                                                                                                <div class="form-row">
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="pay_status">Work Order Status<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="work_status" id="work_status" required="">
                                                                                                                    <option value="0" selected="" disabled="">Select Work Order Status</option>
                                                                                                                    <option value="Pending">Pending</option>
                                                                                                                    <option value="Completed">Completed</option>

                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="pay_status">Payment Status<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="pay_status" id="pay_status" onchange="appear()" required="">
                                                                                                                    <option value="0" selected="" disabled="">Select Payment Status</option>
                                                                                                                    <option value="Paid">Paid</option>
                                                                                                                    <option value="Partial">Partial Paid</option>
                                                                                                                    <option value="UnPaid">UnPaid</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <input type="hidden" name="pay_id" id="pay_id">
                                                                                                    <div class="col-md-6 paid" style="display: none">
                                                                                                        <div class="form-group">
                                                                                                            <label for="pay_type">Payment Type </label>
                                                                                                            <select class="form-control" name="pay_type" id="pay_type" onchange="appear_type()">
                                                                                                                <option value="0" selected="" disabled="">Select Payment Type</option>
                                                                                                                <option value="Credit Card">Credit Card</option>
                                                                                                                <option value="Check">Check</option>
                                                                                                                <option value="Cash">Cash</option>
                                                                                                                <option value="Debit Card">Debit Card</option>
                                                                                                                <option value="Gift Card">Gift Card</option>

                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 check" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="check_num">Check Number<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="check_num" id="check_num">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="credit_num">Credit Card Number<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="credit_num" id="credit_num">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="expire_date">Expire Date<span class="text-danger">*</span></label>
                                                                                                                <input type="date" class="form-control " name="expire_date" id="expire_date">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="card_name">Name on Card<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="card_name" id="card_name">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="card_type">Card Type<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="card_type" id="card_type">
                                                                                                                    <option value="0" selected="" disabled="">Select Card Type</option>
                                                                                                                    <option value="N/A">N/A</option>
                                                                                                                    <option value="Visa">Visa</option>
                                                                                                                    <option value="Master Card">Master Card</option>
                                                                                                                    <option value="American Express">American Express</option>
                                                                                                                    <option value="Discover">Discover</option>
                                                                                                                    <option value="Internal">Internal</option>
                                                                                                                    <option value="Union Pay">Union Pay</option>
                                                                                                                    <option value="Other">Other</option>

                                                                                                                </select>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="zip_code">Zip Code<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="zip_code" id="zip_code">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <input type="hidden" name="total_am" id="total_am">
                                                                                                    <div class="col-lg-6 paid">
                                                                                                        <div class="form-group">
                                                                                                            <label for="paid_amount">Amount Received <span class="text-danger">*</span></label>
                                                                                                            <div class="input-group">
                                                                                                                <input id="paid_amount" type="text" class="form-control" name="paid_amount" onchange="check()">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>






                                                                                                </div>

                                                                                                <div class="mt-3">
                                                                                                    <button type="submit" class="btn btn-primary">
                                                                                                        Create Payment <i class="bi bi-check"></i>
                                                                                                    </button>
                                                                                                </div>




                                                                                            </form>
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
                                            </td>
                                        </tr>
                                        <tr class="even">
                                            <td class=" text-center align-middle">13 Jan, 2023</td>
                                            <td class=" text-center align-middle">QT-00001</td>
                                            <td class=" text-center align-middle">Cust_3</td>
                                            <td class=" text-center align-middle"><span class="badge badge-info">
                                                    Pending
                                                </span>
                                            </td>
                                            <td class=" text-center align-middle">$33.00</td>
                                            <td class=" text-center align-middle">
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn btn-ghost-primary dropdown rounded" data-toggle="dropdown" aria-expanded="false">
                                                        <img src="./assets/images/dashboard/search/dots.png">
                                                    </button>
                                                    <div class="dropdown-menu">

                                                        <a href="https://inventory.allstateautoglassinc.com/quotation/mail/160" class="dropdown-item">
                                                            <i class="bi bi-cursor mr-2 text-warning" style="line-height: 1;"></i> Send On Email
                                                        </a>

                                                        <a href="#" class="dropdown-item" onclick="modalopen(160 , 33 , 33 )  ">
                                                            <i class="bi bi-check-lg mr-2 text-success" style="line-height: 1;"></i> Complete &amp; Invoice
                                                        </a>
                                                        <a href="create-all-work" class="dropdown-item">
                                                            <i class="bi bi-pencil mr-2 text-primary" style="line-height: 1;"></i> Edit
                                                        </a>
                                                        <a href="order-details" class="dropdown-item">
                                                            <i class="bi bi-eye mr-2 text-info" style="line-height: 1;"></i> Details
                                                        </a>
                                                        <button id="delete" class="dropdown-item" onclick="
                event.preventDefault();
                if (confirm('Are you sure? It will delete the data permanently!')) {
                document.getElementById('destroy160').submit()
                }">
                                                            <i class="bi bi-trash mr-2 text-danger" style="line-height: 1;"></i> Delete
                                                            <form id="destroy160" class="d-none" action="https://inventory.allstateautoglassinc.com/quotations/160" method="POST">
                                                                <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln"> <input type="hidden" name="_method" value="delete">
                                                            </form>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="qouteInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="qouteInvoiceModal" aria-hidden="true">
                                                    <div class="modal-dialog qouteInvoiceModal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <!-- <h5 class="modal-title" id="eventCreateModalLabel">Job Details</h5> -->
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="row mt-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <form id="quotation-invoice-form" action="https://inventory.allstateautoglassinc.com/payment" method="POST">
                                                                                                <input type="hidden" name="_token" value="oWyOXbvJbWuSJZT80pXbZF0DvlBPsXwD2Q4S9Qln">
                                                                                                <h5 class="mb-4 "><i>Payment Information</i></h5>

                                                                                                <h5 class="mb-4 "><i class="bi bi-cash p-2"></i>Total Amount <span id="amt"></span></h5>

                                                                                                <h5 class="mb-4 "><i class="bi bi-cash p-2"></i>Due Amount <span id="due"></span></h5>

                                                                                                <div class="form-row">
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="pay_status">Work Order Status<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="work_status" id="work_status" required="">
                                                                                                                    <option value="0" selected="" disabled="">Select Work Order Status</option>
                                                                                                                    <option value="Pending">Pending</option>
                                                                                                                    <option value="Completed">Completed</option>

                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="pay_status">Payment Status<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="pay_status" id="pay_status" onchange="appear()" required="">
                                                                                                                    <option value="0" selected="" disabled="">Select Payment Status</option>
                                                                                                                    <option value="Paid">Paid</option>
                                                                                                                    <option value="Partial">Partial Paid</option>
                                                                                                                    <option value="UnPaid">UnPaid</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <input type="hidden" name="pay_id" id="pay_id">
                                                                                                    <div class="col-md-6 paid" style="display: none">
                                                                                                        <div class="form-group">
                                                                                                            <label for="pay_type">Payment Type </label>
                                                                                                            <select class="form-control" name="pay_type" id="pay_type" onchange="appear_type()">
                                                                                                                <option value="0" selected="" disabled="">Select Payment Type</option>
                                                                                                                <option value="Credit Card">Credit Card</option>
                                                                                                                <option value="Check">Check</option>
                                                                                                                <option value="Cash">Cash</option>
                                                                                                                <option value="Debit Card">Debit Card</option>
                                                                                                                <option value="Gift Card">Gift Card</option>

                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 check" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="check_num">Check Number<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="check_num" id="check_num">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="credit_num">Credit Card Number<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="credit_num" id="credit_num">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="expire_date">Expire Date<span class="text-danger">*</span></label>
                                                                                                                <input type="date" class="form-control " name="expire_date" id="expire_date">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="card_name">Name on Card<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="card_name" id="card_name">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="card_type">Card Type<span class="text-danger">*</span></label>
                                                                                                                <select class="form-control" name="card_type" id="card_type">
                                                                                                                    <option value="0" selected="" disabled="">Select Card Type</option>
                                                                                                                    <option value="N/A">N/A</option>
                                                                                                                    <option value="Visa">Visa</option>
                                                                                                                    <option value="Master Card">Master Card</option>
                                                                                                                    <option value="American Express">American Express</option>
                                                                                                                    <option value="Discover">Discover</option>
                                                                                                                    <option value="Internal">Internal</option>
                                                                                                                    <option value="Union Pay">Union Pay</option>
                                                                                                                    <option value="Other">Other</option>

                                                                                                                </select>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 credit" style="display: none">
                                                                                                        <div class="from-group">
                                                                                                            <div class="form-group">
                                                                                                                <label for="zip_code">Zip Code<span class="text-danger">*</span></label>
                                                                                                                <input type="text" class="form-control " name="zip_code" id="zip_code">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <input type="hidden" name="total_am" id="total_am">
                                                                                                    <div class="col-lg-6 paid">
                                                                                                        <div class="form-group">
                                                                                                            <label for="paid_amount">Amount Received <span class="text-danger">*</span></label>
                                                                                                            <div class="input-group">
                                                                                                                <input id="paid_amount" type="text" class="form-control" name="paid_amount" onchange="check()">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>






                                                                                                </div>

                                                                                                <div class="mt-3">
                                                                                                    <button type="submit" class="btn btn-primary">
                                                                                                        Create Payment <i class="bi bi-check"></i>
                                                                                                    </button>
                                                                                                </div>




                                                                                            </form>
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
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div id="sales-table_processing" class="dataTables_processing card" style="display: none;">Processing...</div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="dataTables_info" id="sales-table_info" role="status" aria-live="polite">Showing 1 to 10 of 10 entries</div>
                                    </div>
                                    <div class="col-md-7 mt-2">
                                        <div class="dataTables_paginate paging_simple_numbers" id="sales-table_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled" id="sales-table_previous"><a href="#" aria-controls="sales-table" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                <li class="paginate_button page-item active"><a href="#" aria-controls="sales-table" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                <li class="paginate_button page-item next disabled" id="sales-table_next"><a href="#" aria-controls="sales-table" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
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






@endsection

@push('scripts')

@endpush