@extends('frontend.layouts.app')

@section('content')
<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Checkout Form s-->
                <div class="checkout-form">
                    <div class="row row-40">
                        <div class="col-12">
                            <form method="post" action="{{route('pay.membership')}}">              
                            @csrf
                            <h1 class="quick-title">Checkout</h1>
                            <button onclick="location.href='{{url()->previous()}}'" class="place-order w-20"><strong>Pay Later</strong></button>
                            </br>
                        </div>
                        <div class="col-lg-7 mb--20">
                            <!-- Billing Address -->
                            <div id="billing-form" class="mb-40">
                                <h4 class="checkout-title">Billing Address</h4>
                                <div class="row">
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>First Name*</label>
                                        <input required="required" name="first_name" type="text" placeholder="First Name" value="{{Auth::User()->first_name}}">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Last Name*</label>
                                        <input required="required" name="last_name" type="text" placeholder="Last Name" value="{{Auth::User()->last_name}}">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Email Address*</label>
                                        <input required="required" name="email" type="email" placeholder="Email Address" value="{{Auth::User()->email}}">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Phone no*</label>
                                        <input required="required" name="phone_no"  type="text" placeholder="Phone number" value="{{Auth::User()->phone_no}}">
                                    </div>
                                </div>
                            </div>
                            <div class="order-note-block mt--30">
                                <label for="order-note">Order notes</label>
                                <textarea name="note" id="order-note" cols="30" rows="10" class="order-note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="row">
                                <!-- Cart Total -->
                                <div class="col-12">
                                    <div class="checkout-cart-total">
                                        <h2 class="checkout-title">YOUR ORDER</h2>
                                        <h4>Product <span>Total</span></h4>
                                        <ul>
                                            <li>
                                                <span class="left">{{$membership->name}} ({{$membership->duration}}) days</span>
                                                <span class="right">Rp {{$membership->price}}</span>
                                            </li>
                                        </ul>                
                                        <p>Sub Total <span>Rp {{$membership->price}}</span></p>
                                        <h4>Grand Total <span id="grandTotal">Rp {{$membership->price}}</span></h4>
                                        <input type="hidden" id="grandTotalInput" value="{{($membership->price+0)}}" name="grandTotalInput">
                                        <input type="hidden" value="{{($membership->id)}}" name="membershipId">
                                        <input type="hidden" id="subTotalInput" value="{{$membership->price}}" name="subTotalInput">
                                            <div class="method-notice mt--25">                 
                                                <fieldset class="form-group">
                                                    <div class="row">
                                                        @foreach($paymentMethods as $paymentMethod)
                                                            <div class="col-sm-12">
                                                                <div class="form-check">
                                                                    <label class="form-check-label" for="paymentMethod{{$paymentMethod->id}}">
                                                                        {{$paymentMethod->name}}
                                                                    </label>
                                                                    <input required="required" class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod{{$paymentMethod->id}}" value="{{$paymentMethod->id}}">
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </fieldset>
                                            </div>
                                        <div class="term-block">
                                            <input required="required" type="checkbox" id="accept_terms2">
                                            <label for="accept_terms2">I’ve read and accept the terms &
                                                conditions</label>
                                        </div>
                                            <button type="submit" class="place-order w-100">Place order</button>
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
</main>
@endsection