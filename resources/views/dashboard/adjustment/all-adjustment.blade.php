@extends('dashboard.layouts.master') 

@section('title', 'Autoglass depot')@push('styles') 

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
	}

	.selectstyle {
		margin-left:5px;
		margin-right:5px;
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
		background: #428bca !important;
		color: white !important;
	}
	.table-setting{
    margin:0px !important;
    padding-left: 15px !important;
    width: 100%;
}
.sidebar{
    width: 100% !important;
}

#my-all-items-table th,tr,td{
	text-align:center;
	background:white !important

}

.modal.fade .modal-dialog {
	transform: translate(0,-3%) !important; 
}
.show {
	opacity: 1 !important;
}
.modal{
    background: rgba(0, 0, 0, 0.4) !important;
}

.button-to-table button{
	background:#ced2d8 !important;
	color:black !important;
	border-right:1px solid #636f83;
	box-shadow: 0 1px 1px 0 rgba(60,75,100,.14), 0 2px 1px -1px rgba(60,75,100,.12), 0 1px 3px 0 rgba(60,75,100,.2);
	
}

.button-to-table button:hover{
	color:white !important;
	background:#636f83 !important
}


.fade:not(.show) {
	opacity: 1 !important;
}
</style>
@endpush 
@section('content')
  <div style="margin:40px">
  <div style="background:white;padding:20px 10px ;border: 1px solid #d8dbe0;
    border-radius: 0.25rem;">


<div class="mb-4 d-flex justify-content-between" >
	
		<a href="create-adjustment" class="btn btn-primary" >
			Add Adjustment + <i class="bi bi-plus"></i>
		</a>
		
		<!-- Livewire Component wire-end:9raAFqBcsnUfYwZ4Athu -->
		
	</div>
	<hr class="hrstyle">

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
			
			<table id="my-all-items-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
				<tr>
					
						<th>Data</th>
						
						<th>Reference</th>
                        <th>Products</th>
						<th>Action</th>
						
					</tr>
				</thead>

				

				<tbody>
                    <tr>
                        <td  valign="top" colspan="4" class="dataTables_empty" >

                            No data available in table
                        </td>
                    </tr>
				
					
					
				</tbody>
			</table>


		</div>
	</div>
</div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Create Glass</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Glass *</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Create</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Delete</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	 <h4>Are you sure? It will delete the data permanently!</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>








  @endsection 

@push('scripts') 
<script>

 $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})  
</script>
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/fullcalendar/main.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>



@endpush
