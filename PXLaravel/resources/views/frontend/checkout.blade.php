@extends('frontend.layouts.app')

@section('content')
<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="\">Home</a></li>
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
                            <form method="post" action="{{route('pay.confirmation')}}">              
                            @csrf
                            <h1 class="quick-title">Checkout</h1>
                            <!-- Slide Down Trigger  -->
                            <!-- <div class="checkout-quick-box">
                                <p><i class="far fa-sticky-note"></i>Returning customer? <a href="javascript:"
                                        class="slide-trigger" data-target="#quick-login">Click
                                        here to login</a></p>
                            </div> -->
                            <!-- Slide Down Blox ==> Login Box  -->
                            <!-- <div class="checkout-slidedown-box" id="quick-login">
                                <form action="./">
                                    <div class="quick-login-form">
                                        <p>If you have shopped with us before, please enter your details in the
                                            boxes below. If you are a new
                                            customer
                                            please
                                            proceed to the Billing & Shipping section.</p>
                                        <div class="form-group">
                                            <label for="quick-user">Username or email *</label>
                                            <input type="text" placeholder="" id="quick-user">
                                        </div>
                                        <div class="form-group">
                                            <label for="quick-pass">Password *</label>
                                            <input type="text" placeholder="" id="quick-pass">
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center flex-wrap">
                                                <a href="#" class="btn btn-outlined mr-3">Login</a>
                                                <div class="d-inline-flex align-items-center">
                                                    <input type="checkbox" id="accept_terms" class="mb-0 mr-1">
                                                    <label for="accept_terms" class="mb-0">I’ve read and accept
                                                        the terms &amp; conditions</label>
                                                </div>
                                            </div>
                                            <p><a href="javascript:" class="pass-lost mt-3">Lost your
                                                    password?</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                            <!-- Slide Down Trigger  -->
                            <!-- <div class="checkout-quick-box">
                                <p><i class="far fa-sticky-note"></i>Have a coupon? <a href="javascript:"
                                        class="slide-trigger" data-target="#quick-cupon">
                                        Click here to enter your code</a></p>
                            </div> -->
                            <!-- Slide Down Blox ==> Cupon Box -->
                            <!-- <div class="checkout-slidedown-box" id="quick-cupon">
                                <form action="./">
                                    <div class="checkout_coupon">
                                        <input type="text" class="mb-0" placeholder="Coupon Code">
                                        <a href="" class="btn btn-outlined">Apply coupon</a>
                                    </div>
                                </form>
                            </div> -->
                        </div>
                        <div class="col-lg-7 mb--20">
                            <!-- Billing Address -->
                            <div id="billing-form" class="mb-40">
                                <h4 class="checkout-title">Billing Address</h4>
                                <div id="oldViewAddress" >    
                                <div class="row">                
                                        <?php 
                                        $no = 0;
                                        ?>            
                                        @foreach($addresses as $address)
                                            <div class="col-sm-12">
                                                <div class="form-check">                                                
                                                    <input onchange="changeOldAddress(this.value)" class="form-check-input" @if($no < 1) checked @endif type="radio" id="oldAddress{{$address->id}}" name="oldAddress" value="{{$address->id}}">
                                                    <?php $no++; ?>
                                                    <label class="form-check-label" for="oldAddress{{$address->id}}">															
                                                        <address>
                                                            Full Address : <i id="FullOldAddress{{$address->id}}">{{$address->full_address}}</i>
                                                            <br>
                                                            Phone No : <i id="PhoneOldAddress{{$address->id}}">{{$address->phone_no}}</i>
                                                            <br>
                                                            Postal Code : <i id="PostalCodeOldAddress{{$address->id}}">{{$address->zip_code}}</i>
                                                            <br>
                                                            Country ID : <i id="CountryOldAddress{{$address->id}}">{{$address->country_id}}</i>
                                                            <br>
                                                            Province ID : <i id="ProvinceOldAddress{{$address->id}}">{{$address->province_id}}</i>
                                                            <br>
                                                            City ID : <i id="CityOldAddress{{$address->id}}">{{$address->city_id}}</i   >
                                                        </address>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach     
                                    </div>  
                                </div>
                            </div>                                  
                            <div class="col-12 mb--20 ">
                                <div class="block-border check-bx-wrapper">
                                    <!-- <div class="check-box">
                                        <input type="checkbox" id="create_account">
                                        <label for="create_account">Create an Acount?</label>
                                    </div> -->
                                    <div class="check-box">
                                        <input onchange="newAddress(this.checked,1)" type="checkbox" id="shiping_address" data-shipping name="newShippingAddress">
                                        <label for="shiping_address">Ship to New Address</label>
                                    </div>
                                    <div class="check-box">
                                        <input onchange="newAddress(this.checked,2)" type="checkbox" id="is_regional_address" name="is_regional">
                                        <label for="is_regional_address">Sent To Batam</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Shipping Address -->
                            <div id="shipping-form-regional" class="mb--40">                                
                                <div class="col-12 mb--20">
                                    <label>Address*</label>
                                    @if($addresses->count() > 0)
                                        <input id="newAddressInput" required="required" name="address" type="text" placeholder="Address line 1" value="{{$addresses[0]->full_address}}">
                                    @else
                                        <input id="newAddressInput" required="required" name="address" type="text" placeholder="Address line 1">
                                    @endif
                                </div>
                            </div>
                            <div id="shipping-form" class="mb--40">
                                <h4 class="checkout-title">Shipping Address</h4>
                                <div class="row"> 
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>First Name*</label>
                                        <input id="fname" name="first_name" type="text" placeholder="First Name" value="{{Auth::User()->first_name}}">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Last Name*</label>
                                        <input id="lname" name="last_name" type="text" placeholder="Last Name" value="{{Auth::User()->last_name}}">
                                    </div>
                                    <div class="col-12 col-12 mb--20">
                                        <label>Country*</label>
                                        <select class="nice-select" name="country_id">
                                            <option  value="1">Indonesia</option>
                                            {{-- <option>Bangladesh</option>
                                            <option>China</option>
                                            <option>country</option>
                                            <option>India</option>
                                            <option>Japan</option> --}}
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Email Address*</label>
                                        <input required="required" name="email" type="email" placeholder="Email Address" value="{{Auth::User()->email}}">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Phone no*</label>
                                        <input required="required" name="phone_no"  type="text" placeholder="Phone number" value="{{Auth::User()->phone_no}}">
                                    </div>
                                    <div class="col-12 mb--20">
                                        <label>Address*</label>
                                        @if($addresses->count() > 0)
                                            <input id="newAddressInput" required="required" name="address" type="text" placeholder="Address line 1" value="{{$addresses[0]->full_address}}">
                                        @else
                                            <input id="newAddressInput" required="required" name="address" type="text" placeholder="Address line 1">
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Town/City*</label>
                                        @if($addresses->count() > 0)
                                            <select onchange="getZipCode(this.value)" required="required" name="city_id" class="form-control" class="nice-select" id="cityName">
                                                <option value="{{$addresses[0]->city_id}}">{{$addresses[0]->city_id}}</option>
                                            </select>
                                        @else
                                            <select onchange="getZipCode(this.value)" required="required" name="city_id" class="form-control" disabled="disabled" id="cityName">
                                                <option value="">Pilih City</option>
                                            </select>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>State*</label>
                                        @if($addresses->count() > 0)
                                            <select id="province_id" onchange="getCity(this.value)" required="required" name="province_id" class="nice-select">
                                                <option value="{{$addresses[0]->province_id}}">{{$addresses[0]->province_id}}</option>
                                                @foreach($provinces as $province)
                                                    <option value="{{$province->province_id}}">{{$province->province}}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <select required="required" id="province_id" onchange="getCity(this.value)" name="province_id" o class="nice-select">
                                                <option value="">Pick State</option>
                                                @foreach($provinces as $province)
                                                    <option value="{{$province->province_id}}">{{$province->province}}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Zip Code*</label>
                                        @if($addresses->count() > 0)s
                                            <input id="zipCode" required="required" name="zipCode" type="number" placeholder="Address line 1" value="{{$addresses[0]->zip_code}}" readonly>
                                        @else
                                            <input id="zipCode" required="required" name="zipCode" type="number" placeholder="Address line 1"  readonly>
                                        @endif
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
                                            <?php $totalSum = 0; ?> 
                                            <?php $totalBuy = 0; ?>
                                            <?php $totalRent = 0; ?>
    
                                            @foreach($charts as $chart)
                                            <li>
                                                <span class="left">{{$chart->book()->title}} ({{$chart->transactionType()->name}} <?php if($chart->transaction_type_id != 1){ ?>{{$chart->duration}} day<?php }  ?>)</span>
                                                @if($chart->transactionType()->id == 1)
                                                    <span class="right">Rp {{$chart->book()->price}}</span>
                                                @else
                                                    <span class="right">Rp 0</span>
                                                @endif
                                            </li>
                                            @if($chart->transactionType()->id == 1)
                                                <?php $totalSum += $chart->book()->price; ?> 
                                                <?php $totalBuy++; ?>
                                            @else
                                                <?php $totalSum + 0; ?> 
                                            @endif
                                            @endforeach
                                        </ul>          
                                            <div class="method-notice mt--25">          
                                                <fieldset class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-12">   
                                                            <label class="form-check-label">How would you like to receive the books?</label>
                                                        </div> 
                                                        <div class="col-sm-12">     
                                                            <div class="form-check">                                                       
                                                                <input onchange="ChangeShipping(!this.checked)" checked type="radio" class="form-check-input" id="isShippingFalse" name="isShipping" value="2">
                                                                <label class="form-check-label" for="isShippingFalse">Visit Store</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">     
                                                            <div class="form-check">                                                       
                                                                <input onchange="ChangeShipping(this.checked)" type="radio" class="form-check-input" id="isShipping" name="isShipping" value="1">
                                                                <label class="form-check-label" for="isShipping">Shipping</label>
                                                            </div>
                                                            <div class="row" id="ShippingPick" style="display:none;" >
                                                                @foreach($couriers as $courier)
                                                                    <div class="col-sm-2">
                                                                    </div>
                                                                    <div class="col-sm-10">
                                                                        <div class="form-check">
                                                                            <input required="required" onclick="getShippingCost('{{$courier->code}}')" disabled="disabled" class="form-check-input" type="radio" name="couriers" id="couriers" value="{{$courier->id}}">
                                                                            <label class="form-check-label" for="courier{{$courier->id}}">
                                                                                {{$courier->name}}
                                                                            </label>
                                                                            <div class="row" id="ongkir">                                                    
                                                                                <select required="required" onchange="setShippingMethod(this.text)" required="required" name="shippingMethod" class="form-control" class="nice-select" id="shippingMethod" disabled="disabled">
                                                                                    <option value="">Pick Shipping</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>              
                                         <input type="hidden" name="shippingCost" id="shippingCost" value="0">
                                         <input type="hidden" name="shippingCourier" id="shippingCourier" value="">
                                         <input type="hidden" name="shippingCode" id="shippingCode" value="">
                                        <p>Sub Total <span>Rp {{$totalSum}}</span></p>
                                        <?php $membershipDiscount = 0; ?>
                                        @if($userMembership)
                                            @if($totalSum > 0)
                                                <p>Membership Discount <span id="membershipDiscount">Rp {{($userMembership->membership()->buy_discount*$totalBuy)}}</span></p>
                                            <?php $membershipDiscount += $userMembership->membership()->buy_discount*$totalBuy; ?>
                                            @endif
                                        @endif
                                        <p>Shipping Fee <span id="shippingFee">Rp 0 </span></p>
                                        @if($totalSum > 0)
                                            <h4>Grand Total <span id="grandTotal">Rp {{($totalSum+0-$membershipDiscount)}}</span></h4>
                                        @else
                                            <h4>Grand Total <span id="grandTotal">Rp {{($totalSum+0)}}</span></h4>
                                        @endif
                                        <input type="hidden" id="grandTotalInput" value="{{($totalSum+0)}}" name="grandTotalInput">
                                        <input type="hidden" id="subTotalInput" value="{{$totalSum}}" name="subTotalInput">
                                        <input type="hidden" id="membershipDiscount" value="{{$membershipDiscount}}" name="membershipDiscount">
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