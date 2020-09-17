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
									<a href="{{route('profile')}}" class="active"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
									<a href="{{route('order.list')}}"><i class="fa fa-cart-arrow-down"></i> Orders</a>
									<a href="{{route('download.list')}}"><i class="fas fa-download"></i> Download</a>
									<a href="{{route('bill.list')}}"><i class="fa fa-credit-card"></i>Bill</a>
									<a href="{{route('rented.list')}}"><i class="fa fa-credit-card"></i>Rented</a>
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
									<div class="tab-pane fade show active" id="dashboad" role="tabpanel">
										<div class="myaccount-content">
											<h3>Dashboard</h3>
											<div class="welcome mb-20">
												<p>Hello, <strong>{{ $userDetail->name }}</strong> (If Not <strong>{{ $userDetail->name }}
														!</strong><a href="{{ route('logout') }}" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
														Logout</a>)</p>
											</div>
											<p class="mb-0">From your account dashboard. you can easily check &amp; view
												your
												recent orders, manage your shipping and billing addresses and edit your
                                                password and account details.</p>    
                                            <br>
												<div class="alert alert-info" role="alert">
													@if($userMembership)
													<h6>Membership Valid</h6>
													<ul>
														<li><span id="days"></span> days <span id="hours"></span> Hours <span id="minutes"></span> Minutes <span id="seconds"></span> Seconds</li>
													</ul>
													@else
														<h6>You are Not Valid Membership</h6>
													@endif
												</div>
												@if($books->count() > 0)
													<div class="alert alert-secondary" role="alert">
														Recomendation
														<table class="table table-bordered">
															<thead class="thead-light">
																<tr>
																	<th>Title</th>
																	<th>Share</th>
																</tr>
															</thead>
															<tbody>
																@foreach($books as $book)
																	<tr>
																		<td>{{ \Illuminate\Support\Str::limit($book->title, 50, $end='...')}}</td>
																		<td><a href="{{route('book.detail',$book->id)}}">Share</a> <i class="fas fa-share-alt-square"></i></td>
																	</tr>
																@endforeach
															</tbody>
														</table>
													</div>
												@endif
												@if($bookRented->count() > 0)
												<div class="alert alert-danger" role="alert">
													Book Rented
													<table class="table table-bordered">
														<thead class="thead-light">
															<tr>
																<th>Title</th>
																<th>Expired</th>
															</tr>
														</thead>
														<tbody>
															@foreach($bookRented as $book)
																<tr>
																	<td>{{ \Illuminate\Support\Str::limit($book->book()->title, 50, $end='...')}}</td>
																	<td>{{$book->expired_at}}</td>
																</tr>
															@endforeach
														</tbody>
													</table>
												</div>
												@endif
												{{-- <div class="alert alert-success" role="alert">
													<h4 class="alert-heading">Well done!</h4>
													<p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
													<hr>
													<p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
												</div> --}}

                                            <div class="form-group row mb-0">
												@if(empty($userMembership))
                                                <div class="col-md-6">
                                                   <a href="{{route('become.member',Auth::user()->id)}}" class="btn btn--primary">
                                                        {{ __('Become a Member') }}
                                                    </a>
												</div>
												@else
												<div class="col-md-6">
                                                   <a href="{{route('extend.member',Auth::user()->id)}}" class="btn btn--primary">
                                                        {{ __('Extend Member') }}
                                                    </a>
                                                </div>
												@endif
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

@section('custom.script')
<script>
const second = 1000,
      minute = second * 60,
      hour = minute * 60,
      day = hour * 24;
	  @if(!empty($userMembership))
let countDown = new Date('{{$userMembership->expired}}').getTime(),
    x = setInterval(function() {    

      let now = new Date().getTime(),
          distance = countDown - now;

      document.getElementById('days').innerText = Math.floor(distance / (day)),
        document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
        document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
        document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);

      //do something later when date is reached
      //if (distance < 0) {
      //  clearInterval(x);
      //  'IT'S MY BIRTHDAY!;
      //}

    }, second)
	@endif
</script>
@endsection