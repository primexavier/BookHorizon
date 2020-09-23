@extends('frontend.layouts.app')

@section('content')
<div class="site-wrapper" id="top">
    <div class="page-section inner-page-sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <!-- My Account Tab Menu Start -->
                        <div class="col-lg-3 col-12">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="{{route('profile')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                                <a href="{{route('order.list')}}"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                                <!-- <a href="{{route('download.list')}}"><i class="fas fa-download"></i> Download</a> -->
                                <a href="{{route('bill.list')}}"><i class="fa fa-credit-card"></i>Bill</a>
                                <a href="{{route('rented.list')}}"><i class="fa fa-credit-card"></i>Rented</a>
                                <a href="{{route('payment.method')}}"><i class="fa fa-credit-card"></i>Payment                                    Method</a>
                                <!-- <a href="{{route('payment.list')}}"><i class="fa fa-credit-card"></i>Payment History</a> -->
                                <a href="{{route('address.list')}}"><i class="fa fa-map-marker"></i>address</a>
                                <a href="{{route('profile.edit')}}" class="active"><i class="fa fa-user"></i>Account                                    Details</a>
                                <a href="{{route('privacy.setting')}}"><i class="fa fa-user"></i> Privacy </a>
                                <a href="{{route('logout')}}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        class="fas fa-sign-out-alt"></i> Logout</a>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->
                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-12 mt--30 mt-lg--0">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="account-info" role="tabpanel">
                                    <div class="myaccount-content">
                                        <form method="post" action="{{route('profile.update')}}" enctype="multipart/form-data">
                                        <h3>Pictures Details</h3>
                                            @if(!empty($fromMembership))
                                            <input name="fromMember" value="1" placeholder="Last Name" type="hidden" >
                                            @endif
                                            <div class="account-details-form">
                                                <div class="row">
                                                    @csrf
                                                    <div class="col-lg-6 col-12  mb--30">
                                                        <p class="mb-0">Profile Picture</p>
                                                        @if ($userDetail->photo_profile)
                                                        <img id="imageShow"
                                                            src="../storage/{{$userDetail->photo_profile}}"
                                                            alt="">
                                                        @else
                                                        <img id="imageShow"
                                                            src="{{ asset('frontend/image/book') }}/empty.jpg" alt=""
                                                            width="150px">
                                                        @endif
                                                        <br />
                                                        <br />
                                                        <input onchange="readURL(this)" type="file" name="profilePic">
                                                    </div>
                                                    <div class="col-lg-6 col-12  mb--30">
                                                        <p class="mb-0">Photo ID</p>
                                                        @if ($userDetail->photo_id)
                                                        <img id="imageShow2"
                                                            src="../storage/{{$userDetail->photo_id}}"
                                                            alt="">
                                                        @else
                                                        <img id="imageShow2"
                                                            src="{{ asset('frontend/image/book') }}/empty.jpg" alt=""
                                                            width="300px" height="150px">
                                                        @endif
                                                        <br />
                                                        <br />
                                                        <input onchange="readURL2(this)" type="file" name="photoId">
                                                    </div>
                                                    <div class="col-12  mb--30">
                                                        <h4>Account Detail</h4>
                                                    </div>
                                                    <div class="col-lg-6 col-12  mb--30">
                                                        <input name="fname" id="first-name"
                                                            value="{{$userDetail->first_name}}" placeholder="First Name"
                                                            type="text" required="required">
                                                    </div>
                                                    <div class="col-lg-6 col-12  mb--30">
                                                        <input name="lname" id="last-name"
                                                            value="{{$userDetail->last_name}}" placeholder="Last Name"
                                                            type="text" required="required">
                                                    </div>
                                                    <div class="col-12  mb--30">
                                                        <input name="dname" id="display-name" placeholder="Display Name"
                                                            type="text" value="{{$userDetail->display_name}}" required="required">
                                                    </div>
                                                    <div class="col-12  mb--30">
                                                        <input name="phone" id="phone-number" placeholder="+6212345678"
                                                            type="text" value="{{$userDetail->phone_no}}" required="required"> 
                                                    </div>
                                                    <div class="col-6  mb--30">
                                                        <input name="bod" id="birth-day" type="date"
                                                            value="{{$userDetail->bod}}" required="required" >
                                                    </div>
                                                    <div class="col-6  mb--30">
                                                        <input name="occupation" placeholder="Occupation"
                                                            id="occupation" type="text"
                                                            value="{{$userDetail->occupation}}" required="required">
                                                    </div>
                                                    <div class="col-6  mb--30">
                                                        <div class="form-group">
                                                            <select name="gender" class="form-control" id="gender" required="required">
																@if($userDetail->gender)
                                                                <option value="{{$userDetail->gender}}">Pick One</option>
																@else
                                                                <option value="">Pick One</option>
																@endif
                                                                <option value="1">Laki - Laki</option>
                                                                <option value="2">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12  mb--30">
                                                        <input name="email" id="email" placeholder="Email Address"
                                                            type="email" readonly value="{{$userDetail->email}}" required="required">
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn--primary">Save
                                                            Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <form action="{{route('profile.changePassword')}}}" post="post">
                                            <div class="account-details-form">
                                                <div class="row">
                                                    <div class="col-12  mb--30">
                                                        <br>
                                                        <br>
                                                        <h4>Password change</h4>
                                                    </div>
                                                    <div class="col-12  mb--30">
                                                        <input name="password" id="current-pwd"
                                                            placeholder="Current Password" type="password" required="required">
                                                    </div>
                                                    <div class="col-lg-6 col-12  mb--30">
                                                        <input name="newpassword1" id="new-pwd"
                                                            placeholder="New Password" type="password" required="required">
                                                    </div>
                                                    <div class="col-lg-6 col-12  mb--30">
                                                        <input name="newpassword2" id="confirm-pwd"
                                                            placeholder="Confirm Password" type="password" required="required">
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn--primary">Save
                                                            Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->
                    </div>
                </div>
                <!-- My Account Tab Content End -->
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

@section("custom.script")
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imageShow').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imageShow2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

</script>
@endsection
