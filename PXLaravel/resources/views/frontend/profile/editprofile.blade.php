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
									<a href="{{route('profile')}}" ><i class="fas fa-tachometer-alt"></i>Dashboard</a>
									<a href="{{route('order.list')}}"><i class="fa fa-cart-arrow-down"></i> Orders</a>
									<a href="{{route('download.list')}}"><i class="fas fa-download"></i> Download</a>
									<a href="{{route('bill.list')}}"><i class="fa fa-credit-card"></i>Bill</a>
									<a href="{{route('payment.method')}}"><i class="fa fa-credit-card"></i>Payment Method</a>
									<a href="{{route('payment.list')}}"><i class="fa fa-credit-card"></i>Payment History</a>
									<a href="{{route('address.list')}}"><i class="fa fa-map-marker"></i>address</a>                                        
									<a href="{{route('profile.edit')}}" class="active"><i class="fa fa-user"></i>Account Details</a>
									<a href="{{route('privacy.setting')}}"><i class="fa fa-user"></i> Privacy </a>
									<a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>
								</div>
							</div>
							<!-- My Account Tab Menu End -->
							<!-- My Account Tab Content Start -->
							<div class="col-lg-9 col-12 mt--30 mt-lg--0">
								<div class="tab-content" id="myaccountContent">
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade show active" id="account-info" role="tabpanel">
										<div class="myaccount-content">
											<h3>Account Details</h3>
											<div class="account-details-form">
												<form action="{{route('profile.update')}}}">
													<div class="row">
														<div class="col-lg-6 col-12  mb--30">
                                                            <input id="first-name" value="{{$userDetail->first_name}}" placeholder="First Name" type="text">
														</div>
														<div class="col-lg-6 col-12  mb--30">
															<input id="last-name" value="{{$userDetail->last_name}}" placeholder="Last Name" type="text">
														</div>
														<div class="col-12  mb--30">
															<input id="display-name" placeholder="Display Name" type="text" value="{{$userDetail->display_name}}">
														</div>
														<div class="col-12  mb--30">
															<input id="email" placeholder="Email Address" type="email" readonly value="{{$userDetail->email}}">
														</div>
														<div class="col-12  mb--30">
															<h4>Password change</h4>
														</div>
														<div class="col-12  mb--30">
															<input id="current-pwd" placeholder="Current Password"
																type="password">
														</div>
														<div class="col-lg-6 col-12  mb--30">
															<input id="new-pwd" placeholder="New Password"
																type="password">
														</div>
														<div class="col-lg-6 col-12  mb--30">
															<input id="confirm-pwd" placeholder="Confirm Password"
																type="password">
														</div>
														<div class="col-12">
															<button class="btn btn--primary">Save Changes</button>
														</div>
													</div>
												</form>
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