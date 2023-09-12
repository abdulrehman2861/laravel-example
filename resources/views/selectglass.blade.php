@extends('layouts.master')
@section('title', 'Auto Glass Part')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endpush

@section('content')


            <div class="contact-form-area section-space-bottom-100 section-space-y-axis-100">
                <div class="container ">
                    <div class="row select-">
                        <div class="col-lg-12">
                            <div class="contact-form-wrap glass-main-div justify-content-between">
                                
                                <form id="contact-form" class="contact-form quotes-div" action="https://whizthemes.com/mail-php/mamunur/tromic/tromic.php">
                                    <h4 class="contact-form-title mb-7">What do you need fixed?</h4>
                                   <div class="select-input">
                                   <label for="188582" class="d-flex justify-content-between align-items-center cursor-pointer">
                                    <div class="form-group form-group-nlg-sm mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <div>
                                    <input id="188582" type="checkbox" rel="Windshield" class="custom-control-input" value="[object Object]">
                                        </div>
                                     <div class="custom-control-label pl-2"> Windshield</div>
                                     </div>
                                    </div>                      
                                                               
                                    <img src="/assets/images/newsletter/one.png" alt="Windshield" class="need-fix-img"></label>
                                </div>


                                <div class="select-input">
                                   <label for="188582" class="d-flex justify-content-between align-items-center cursor-pointer">
                                    <div class="form-group form-group-nlg-sm mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <div>
                                    <input id="188582" type="checkbox" rel="Windshield" class="custom-control-input" value="[object Object]">
                                        </div>
                                     <div class="custom-control-label pl-2"> Passenger Front - Door Glass</div>
                                     </div>
                                    </div>                      
                                                               
                                    <img  src="/assets/images/newsletter/two.png" alt="Windshield" class="need-fix-img"></label>
                                </div>


                                <div class="select-input">
                                   <label for="188582" class="d-flex justify-content-between align-items-center cursor-pointer">
                                    <div class="form-group form-group-nlg-sm mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <div>
                                    <input id="188582" type="checkbox" rel="Windshield" class="custom-control-input" value="[object Object]">
                                        </div>
                                     <div class="custom-control-label pl-2"> Driver Front - Door Glass</div>
                                     </div>
                                    </div>                      
                                                               
                                    <img src="/assets/images/newsletter/three.png" alt="Windshield" class="need-fix-img"></label>
                                </div>


                                <div class="select-input">
                                   <label for="188582" class="d-flex justify-content-between align-items-center cursor-pointer">
                                    <div class="form-group form-group-nlg-sm mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <div>
                                    <input id="188582" type="checkbox" rel="Windshield" class="custom-control-input" value="[object Object]">
                                        </div>
                                     <div class="custom-control-label pl-2">Passenger Back - Door Glass</div>
                                     </div>
                                    </div>                      
                                                               
                                    <img src="/assets/images/newsletter/four.png" alt="Windshield" class="need-fix-img"></label>
                                </div>


                                <div class="select-input">
                                   <label for="188582" class="d-flex justify-content-between align-items-center cursor-pointer">
                                    <div class="form-group form-group-nlg-sm mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <div>
                                    <input id="188582" type="checkbox" rel="Windshield" class="custom-control-input" value="[object Object]">
                                        </div>
                                     <div class="custom-control-label pl-2"> Driver Back - Door Glass</div>
                                     </div>
                                    </div>                      
                                    <img src="/assets/images/newsletter/five.png"alt="Windshield" class="need-fix-img"></label>
                                                               
                                </div>

                                <div class="select-input">
                                   <label for="188582" class="d-flex justify-content-between align-items-center cursor-pointer">
                                    <div class="form-group form-group-nlg-sm mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <div>
                                    <input id="188582" type="checkbox" rel="Windshield" class="custom-control-input" value="[object Object]">
                                        </div>
                                     <div class="custom-control-label pl-2"> Passenger Quarter</div>
                                     </div>
                                    </div>                      
                                    <img src="/assets/images/newsletter/six.png" alt="Windshield" class="need-fix-img"></label>
                                                               
                                </div>

                                <div class="select-input">
                                   <label for="188582" class="d-flex justify-content-between align-items-center cursor-pointer">
                                    <div class="form-group form-group-nlg-sm mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <div>
                                    <input id="188582" type="checkbox" rel="Windshield" class="custom-control-input" value="[object Object]">
                                        </div>
                                     <div class="custom-control-label pl-2"> Driver Quarter</div>
                                     </div>
                                    </div>                      
                                    <img src="/assets/images/newsletter/eight.png" alt="Windshield" class="need-fix-img"></label>
                        
                                </div>

                                <div class="select-input">
                                   <label for="188582" class="d-flex justify-content-between align-items-center cursor-pointer">
                                    <div class="form-group form-group-nlg-sm mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <div>
                                    <input id="188582" type="checkbox" rel="Windshield" class="custom-control-input" value="[object Object]">
                                        </div>
                                     <div class="custom-control-label pl-2">Back Glass</div>
                                     </div>
                                    </div>                      
                                                               
                                    <img src="/assets/images/newsletter/seven.png" alt="Windshield" class="need-fix-img"></label>
                                </div>

                                    <div class="button-wrap mt-8">
                                        <button class="btn btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0"  onclick="location.href='{{ route('vehicle') }}'">back</button>
                                        <button type="submit" value="submit" class="btn btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0" name="submit"  onclick="location.href='{{ route('availability') }}'">Next</button>

                                        <p class="form-message mt-3 mb-0"></p>
                                    </div>
                                </form>
                                <div style="display: flex; flex-direction: column; width: auto;" class="contact-img">
                                    <img src="assets/images/newsletter/image-1.webp" alt="Contact Images">
                                    <img src="assets/images/newsletter/image-2.webp" alt="Contact Images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
       
        </main>


@endsection

@push('scripts')

@endpush