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
									<a href="{{route('download.list')}}"><i class="fas fa-download"></i> Download</a>
									<a href="{{route('bill.list')}}" ><i class="fa fa-credit-card"></i>Bill</a>
									<a href="{{route('rented.list')}}" class="active"><i class="fa fa-credit-card"></i>Rented</a>
									<a href="{{route('payment.method')}}"><i class="fa fa-credit-card"></i>Payment Method</a>
									<a href="{{route('payment.list')}}"><i class="fa fa-credit-card"></i>Payment History</a>
									<a href="{{route('address.list')}}"><i class="fa fa-map-marker"></i>address</a>                                        
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
									<div class="tab-pane fade show active" id="payment-method" role="tabpanel">
										<div class="myaccount-content">
											<h3>Book Rented</h3>
											@if($bookRenteds->count() > 0)											
												<div class="myaccount-table table-responsive text-center">
													<table class="table table-bordered">
														<thead class="thead-light">
															<tr>
																<th>No</th>
																<th>Title</th>
																<th>Expire</th>
															</tr>
														</thead>
														<tbody>
															<!-- @foreach($bookRenteds as $bookRented)
																<tr>
																	<td>{{$bookRented->id}}</td>
																	<td>{{$bookRented->created_at}}</td>
																	<td>{{$bookRented->created_at}}</td>
																</tr>
															@endforeach -->
																<tr>
																	<td colspan="3">No Book Rented Yet!</td>
																</tr>
														</tbody>
													</table>
												</div>
											@else
											<p class="saved-message">No Book Rented Yet!</p>
											@endif
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