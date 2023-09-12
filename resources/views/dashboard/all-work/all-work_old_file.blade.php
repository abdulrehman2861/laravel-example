@extends('dashboard.layouts.master')

@section('title', 'Autoglass depot')@push('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Berkshire+Swash&family=Chewy&family=Lobster&family=Maven+Pro:wght@400;500;700;900&family=Nabla&family=Noto+Sans:ital,wght@0,500;0,900;1,800&family=Poppins&family=Rubik+Puddles&display=swap" rel="stylesheet">
<link href="\assets\css\style.css" rel="stylesheet">



@endpush

@section('content')

<livewire:dashboard.widget.search-product />

<section class="content" >
        <div class="container-fluid" >
            <h2 class="text-center display-4"> Search</h2>
            <form action="enhanced-results.html" >
              
                    <div class="col-md-10 offset-md-1">
                      
                        <div class="row">
                    <div class="input-group mb-3 ">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fe fe-search"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                    </div>
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

                                        <table class="table my-search-table" style="margin-top:30px;">
                                        <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">Part Number</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Sale Price</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Discount</th>
                                        <th scope="col">Tax</th>
                                        <th scope="col">Sub Total</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                        </thead>
                                            <tbody>
                                                <tr>
                                                <th scope="row">FW05520</th>
                                                <td>2017,Kia,Optima Hybrid,Windshield | <img class="hover" src="/assets/images/edit.png"> </td>
                                                <td><input class="form-control" id="numberInput"   min="0" max="100" step="1"></td>
                                                <td>5</td>
                                                
                                                <td><input type="number" class="form-control" id="numberInput" value="0"  min="0" max="100" step="1"></td>

                                                <td>$0.00</td>
                                                <td>$0.00</td>
                                                <td>$0.00</td>
                                                <td class="hover"><img src="/assets/images/recent-posts/multiply (1).png"></td>

                                                </tr>
                                            
                                            </tbody>
                                            </table>

                                            <div class="full-amount-div">
                                                <ul>
                                                    <li>Order Tax (0%)	<span>(+) $0.00</span></li>
                                                    <li>Discount (0%)	<span>(-) $0.00</span></li>
                                                    <li>Shipping	<span>(+) $0.00</span></li>
                                                    <li>Grand Total	<span style="font-weight:bolder">(=) $55.00</span></li>

                                                </ul>
                                            </div>

                                            <div class="row row-sm mg-b-20 mg-t-20"  style="margin-top:10px;">
											<div class="col-lg-4">
												<p class="mg-b-10">Discount (%)</p>
                                                <input type="number" class="form-control" id="numberInput" value="0"  min="0" max="100" step="1">

											</div><!-- col-4 -->
											<div class="col-lg-4 mg-t-50 mg-lg-t-0" >
												<p class="mg-b-10">Shipping</p>
                                                <input type="number" class="form-control" id="numberInput" value="0"  min="0" max="100" step="1">
											</div><!-- col-4 -->
											<div class="col-lg-4 mg-t-20 mg-lg-t-0">
												<p class="mg-b-10">Tax *</p>
												<select class="form-control select2" >
													<option value="select Feature">
                                                    Default
													</option>
                                                    <option value="Exempt">
                                                    Exempt
													</option>
													
												</select>
										
                                           
											</div>
										</div>

                </div>

                
            </form>
            
        </div>

        
    </section>
    

@endsection

@push('scripts')
@endpush
