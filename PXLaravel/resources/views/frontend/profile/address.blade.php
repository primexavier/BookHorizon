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
									<!-- <a href="{{route('payment.method')}}"><i class="fa fa-credit-card"></i>Payment Method</a> -->
									<a href="{{route('payment.list')}}"><i class="fa fa-credit-card"></i>Payment History</a>
									<a href="{{route('address.list')}}" class="active"><i class="fa fa-map-marker"></i>address</a>                                        
									<a href="{{route('profile.edit')}}"><i class="fa fa-user"></i>Account Details</a>
									<a href="{{route('privacy.setting')}}"><i class="fa fa-user"></i> Privacy </a>
									<a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>
								</div>
							</div>
							<!-- My Account Tab Menu End -->
							<!-- My Account Tab Content Start -->
							<div class="col-lg-9 col-12 mt--30 mt-lg--0">
								<div class="tab-content" id="myaccountContent">
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade show active" id="address-edit" role="tabpanel">
										<div class="myaccount-content">
											<h3>Billing Address</h3>
											@if($addresses->count() > 0)
												@foreach($addresses as $address)
													<div class="form-group row">
														<div class="col-sm-2">Address</div>
														<div class="col-sm-10">
														<div class="form-check">
															<input class="form-check-input" type="checkbox" id="gridCheck{{$address->id}}">
															<label class="form-check-label" for="gridCheck{{$address->id}}">															
																<address>
																	Full Address : {{$address->full_address}}
																	<br>
																	Phone No : {{$address->phone_no}}
																	<br>
																	Postal Code : {{$address->zip_code}}
																	<br>
																	Country ID : {{$address->country_id}}
																	<br>
																	Province ID : {{$address->province_id}}
																	<br>
																	City ID : {{$address->city_id}}
																</address>
															</label>
														</div>
														</div>
													</div>
												@endforeach
											@else
											<address>
                                                No Address
											</address>
											@endif
											<a href="#" class="btn btn--primary"><i class="fa fa-edit"></i>Add Address</a>
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