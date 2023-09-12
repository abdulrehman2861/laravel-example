@extends('layouts.master')
@section('title', 'Auto Glass depo')

@push('styles')
<style>
    .thanks-order{
        width: 1000px;
        height: 600px;
        margin: 20px auto;
        
        display: flex;
    }
    .thanks-order-left{
    width: 50%;
    height: 100%;
    background:url('assets/images/about/pngegg (2).png');

    background-size: 100%;
    background-position: center;
    background-repeat: no-repeat;

    }
    .thanks-order-right{
    width: 50%;
    height: 100%;

    }
    .thanks-order-right h2{
        font-size: 24px;
        text-align: center;
    }

    .thanks-order-right  p{
        font-size: 13px;
        text-align: center;
        font-weight: 600;
        width: 50%;
        margin: 20px auto;
    }

    .thanks-order-right  p span{
        font-weight: bold;
    }
    .time-and-date-opp{
        display: flex;
        justify-content: space-around;
        text-align: center;
    }
</style>

@endpush

@php
    if (session()->has('saleTransaction')) {
        $saleTransaction = session()->get('saleTransaction');
        if (request()->has('redirect_status') == 'succeeded') {
            \App\Models\SaleTransaction::where('id', $saleTransaction->id)->update([
                'payment_status' => 'paid',
                'payment_log' => json_encode(request()->all()),
            ]);
        }
        session()->forget('saleTransaction');
    }else{
        // redirect to home page
        header('Location: ' . route('index'));
        exit;
    }
@endphp

@section('content')

<div class="thanks-order">
    <div class="thanks-order-left">

    </div>


    <div class="thanks-order-right">
        <h2>Thanks You For Your Order</h2>

        <p>We'll contact you shortly,if any Additional information is needed</p>

        <h2 style="color:#ed5217;margin:50px 0px;margin-bottom:20px"> Order#{{ $saleTransaction->id }}</h2>

        <p style="margin-top:0px">You have requested services for <br/><span> {{ $saleTransaction->appointment_date }} From {{ $saleTransaction->appointment_time }} </span></p>
        <p style="margin-top:10px">Our technician will call you <span> 30 minutes</span> prior to their arrival,if you have any question about this qppointement please call our dispatch department</p>

        <h2 style="color:#ed5217;margin:50px 0px;margin-bottom:20px"> (123) 456-789</h2>

        <div class="time-and-date-opp">
        <div>
            <h6 style="color:#ed5217"> MON TO FRI</h6>
            <p ><span>09:00 AM to 05:00 PM</span></p>

        </div>
        <div>
        <h6 style="color:#ed5217"> SAT</h6>
            <p ><span>09:00 AM to 05:00 PM</span></p>
        </div>
        <div>
        <h6 style="color:#ed5217">SUN</h6>
            <p ><span>09:00 AM to 05:00 PM</span></p>
        </div>
        </div>
       
    </div>

</div>

@endsection @push('scripts') @endpush