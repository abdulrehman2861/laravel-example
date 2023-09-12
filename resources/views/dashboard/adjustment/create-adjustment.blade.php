@extends('dashboard.layouts.master')

@section('title', 'Autoglass depot')@push('styles')

<style>
	.border-class {
    border: 1px solid #d8dbe0;
}

.padding-class{
    
     border-radius: 0.25rem;
    padding: 40px !important;
}
</style>



@endpush

@section('content')

<livewire:dashboard.widget.search-product />

<section class="content" >
        
         
            <form action="enhanced-results.html" >
              
                    
                <div class="padding-class">

                <div style="background:white;padding:20px;border-radius:6px" class="border-class">

              
                    
                        <div class="row">
                    <div class="input-group mb-3 ">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fe fe-search"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                    </div>
                    
                   
                <div class=" padding-class">

                        <h6 style="color:black">Vehicle Information</h6>
                    <div class="row row-sm mg-b-20">
											<div class="col-lg-4">
												<p class="mg-b-10">years</p>
												<select class="form-control select2">
													
													<option value="2019">
														2019
													</option>
													<option value="2020">
														2020
													</option>
													<option value="2021">
														2021
													</option>
													<option value="2022">
														2022
													</option>
													<option value="2023">
														2023
													</option>
												</select>
											</div><!-- col-4 -->
											<div class="col-lg-4 mg-t-20 mg-lg-t-0">
												<p class="mg-b-10">Make</p>
												<select class="form-control select2-with-search">
													
													<option value="Firefox">
													Acura
													</option>
                                                    <option value="Audi">
													Audi
													</option>
                                                    <option value="Audi">
													BMW
													</option>
													<option value="GMC">
														GMC
													</option>
													<option value="HONDA">
														HONDA
													</option>
													<option value="Opera">
														Opera
													</option>
													<option value="Internet Explorer">
														Geo
													</option>
												</select>
											</div><!-- col-4 -->
											<div class="col-lg-4 mg-t-20 mg-lg-t-0">
												<p class="mg-b-10">Model </p>
												<select class="form-control select2" >
                                                <option value="Firefox">
													Acura
													</option>
                                                    <option value="Audi">
													Audi
													</option>
                                                    <option value="Audi">
													BMW
													</option>
													<option value="GMC">
														GMC
													</option>
													<option value="HONDA">
														HONDA
													</option>
													<option value="Opera">
														Opera
													</option>
													<option value="Internet Explorer">
														Geo
													</option>
												</select>
											</div><!-- col-4 -->

                                            
										</div>

                                        <div class="row row-sm mg-b-20 mg-t-20"  style="margin-top:30px;">
											<div class="col-lg-4">
												<p class="mg-b-10">Body Style</p>
												<select class="form-control select2">
													<option label="select Body Style">
													</option>
													
												</select>
											</div><!-- col-4 -->
											<div class="col-lg-4 mg-t-50 mg-lg-t-0" >
												<p class="mg-b-10">Glass</p>
												<select class="form-control select2-with-search">
													<option label="select Glass">
													</option>
													
												</select>
											</div><!-- col-4 -->
											<div class="col-lg-4 mg-t-20 mg-lg-t-0">
												<p class="mg-b-10">Feature </p>
												<select class="form-control select2" >
													<option label="select Feature">
													</option>
													
												</select>
											</div><!-- col-4 -->
										
                                        </div>


                                    </section> 
                                        

                                        

                                       
                                                                
                                  <section class="content" >                  
                                        <div class="padding-class">
                                            <div style="background:white;padding:20px;border-radius:6px" class="border-class">
                                                <!-- Row -->
						<div class="row row-sm">
							<div class="col-lg-12 col-md-12">
								<div class="card custom-card" style="box-shadow:none">
									<div class="card-body " >
										
										<div class="row row-sm mg-b-20">

                                        <div class="col-lg-6 mg-t-20 mg-lg-t-0">
												<p class="mg-b-10">Reference *</p>
												
                                                <input type="text" placeholder="ADJ" class="form-control" id="recipient-name" disabled>
											
											</div><!-- col-4 -->

											<div class="col-lg-6 col-md-6">
                                            <p class="mg-b-10">Date *</p>

										<div class="row row-sm">
											<div class="col-lg-12">
												<div class="input-group">
													<input value="2013-06-12"  type="date" style="width: 100%;
                                                        height: 38px;
                                                        border: 1px solid #d8dbe0;
                                                        padding-left: 14px;
                                                        border-radius: 6px;
                                                        padding-right: 12px;">
												</div>
										
									</div>
								</div>
							</div>
                            <table id="my-all-items-table" class="table table-striped table-bordered" cellspacing="0" width="100%" style="margin-top:30px">
				<thead>
				<tr>
					
						<th>#</th>
						
						<th>Product Name</th>
                        <th>Code</th>
                        <th>Stock</th>
                        <th>Quantity</th>
                        <th>Type</th>
						<th>Action</th>
						
					</tr>
				</thead>
				<tbody>
                    <tr>
                        <td  valign="top" colspan="7" class="dataTables_empty" style="color:red;background:white" >

                        Please search & select products!
                        </td>
                    </tr>

				

				
					
					
				</tbody>
			</table>

            `                           <div class="col-md-12 ">
												<div class="form-group mb-0">
													<p class="mg-b-10">Note (If Needed)</p>
													<textarea class="form-control" name="example-textarea-input" rows="4" placeholder="text here.."></textarea>
												</div>
											</div>

                                            <button type="button" class="btn btn-primary" style="margin:25px 10px 0px 10px">Create Adjustment</button>

						</div>
						<!-- End Row -->

										</div>

							</div>
                     
                            </div>
								</div>
                                </div>
										</div>
									
											
										</div>
										
											
                                      </div>
                                      </div>

                                      </section>




                                               
                                            
                                            


                                            

            
                                        

   

@endsection

@push('scripts')


@endpush
