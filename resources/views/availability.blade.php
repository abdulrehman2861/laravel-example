@extends('layouts.master')
@section('title', 'Auto Glass Part')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<style>
    .contact-img{
        width:50% !important;
        padding-right:10px
    }
</style>
@endpush

@section('content')


<div class="contact-form-area section-space-bottom-100 section-space-y-axis-100">
    <div class="container ">
        <div class="row select-">
            <div class="col-lg-12">
                <div class="contact-form-wrap glass-main-div">
                    
                    <form id="contact-form" class="contact-form quotes-div" action="https://whizthemes.com/mail-php/mamunur/tromic/tromic.php">
                        <h4 class="contact-form-title mb-7">Which one of options best describes the Windshield Glass feature of your car?</h4>
                        <div class="select-input adjusting-width">
                            <input class="availability-radio-button" type="radio" name="basic" id="" checked>
                            <label for="basic">I'm not sure what I have? I just need a quote for a basic <br/> windshield!</label>
                        </div>
                        <div class="select-input adjusting-width">
                            <input class="availability-radio-button" type="radio" name="basic" id="">
                            <label for="basic">Windshield with <span>Acoustic Interlayer , Rain Sensor</span> and <span>Third <br/> Visor Frit</span>.</label>
                        </div>
                        <!-- <div class="button-wrap mt-8">
                            <button class="btn btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0"  onclick="location.href='{{ route('vehicle') }}'">back</button>
                            <button type="submit" value="submit" class="btn btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0" name="submit"  onclick="location.href='{{ route('quote') }}'">Next</button>

                            <p class="form-message mt-3 mb-0"></p>
                        </div> -->
                        <h4 class="contact-form-title mb-7 mt-8">Which one of options best describes the Windshield Glass feature of your car?</h4>
                        <div class="select-input adjusting-width">
                            <input class="availability-radio-button" type="radio" name="basic" id="" checked>
                            <label for="basic">I'm not sure what I have? I just need a quote for a basic <br/> windshield!</label>
                        </div>
                        <div class="select-input adjusting-width">
                            <input class="availability-radio-button" type="radio" name="basic" id="">
                            <label for="basic">Windshield with <span>Acoustic Interlayer , Rain Sensor</span> and <span>Third <br/> Visor Frit</span>.</label>
                        </div>
                        <!-- <div class="button-wrap mt-8">
                            <button class="btn btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0"  onclick="location.href='{{ route('vehicle') }}'">back</button>
                            <button type="submit" value="submit" class="btn btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0" name="submit"  onclick="location.href='{{ route('quote') }}'">Next</button>

                            <p class="form-message mt-3 mb-0"></p>
                        </div> -->
                        <h4 class="contact-form-title mb-7 mt-8">Which one of options best describes the Windshield Glass feature of your car?</h4>
                        <div class="select-input adjusting-width">
                            <input class="availability-radio-button" type="radio" name="basic" id="" checked>
                            <label for="basic">I'm not sure what I have? I just need a quote for a basic <br/> windshield!</label>
                        </div>
                        <div class="select-input adjusting-width">
                            <input class="availability-radio-button" type="radio" name="basic" id="">
                            <label for="basic">Windshield with <span>Acoustic Interlayer , Rain Sensor</span> and <span>Third <br/> Visor Frit</span>.</label>
                        </div>
                        <div class="button-wrap mt-8">
                            <button class="btn btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0"  onclick="location.href='{{ route('vehicle') }}'">back</button>
                            <button type="submit" value="submit" class="btn btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0" name="submit"  onclick="location.href='{{ route('quote') }}'">Next</button>

                            <p class="form-message mt-3 mb-0"></p>
                        </div>
                        
                    </form>
                    <div class="contact-img image-sizes">
                        <div class="center">
                            <img  src="assets/images/newsletter/car-wash.png" alt="Contact Images">
                            
                            <p>Pay for service once completed</p>
                        </div>
                        <div class="center center-2 background-1">
                            <img src="assets/images/newsletter/credit-card.png" alt="Contact Images">
                            <p>We come to you at no extra cost</p>
                        </div>
                        <div class="center center-2 background-2">
                            <img src="assets/images/newsletter/warranty.png" alt="Contact Images">
                            <p>National lifetime warranty</p>
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