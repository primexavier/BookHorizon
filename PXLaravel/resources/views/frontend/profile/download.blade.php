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
									<a href="{{route('download.list')}}" class="active"><i class="fas fa-download"></i> Download</a>
									<a href="{{route('bill.list')}}"><i class="fa fa-credit-card"></i>Bill</a>
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
									<div class="tab-pane fade show active" id="download" role="tabpanel">
										<div class="myaccount-content">
											<h3>Downloads</h3>
											<div class="myaccount-table table-responsive text-center">
												<table class="table table-bordered">
													<thead class="thead-light">
														<tr>
															<th>Product</th>
															<th>Date</th>
															<th>Expire</th>
															<th>Download</th>
														</tr>
													</thead>
													<tbody>
                                                        @if(count($download) > 0)
                                                            <tr>
                                                                <td>Mostarizing Oil</td>
                                                                <td>Aug 22, 2018</td>
                                                                <td>Yes</td>
                                                                <td><a href="#" class="btn">Download File</a></td>
                                                            </tr>
                                                        @else                                                            
                                                            <tr>                                                                
                                                                <td colspan="4">No Dowload Available!</td>
                                                            </tr>
                                                        @endif
													</tbody>
												</table>
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