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
									<a href="{{route('bill.list')}}" class="active"><i class="fa fa-credit-card"></i>Bill</a>
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
									<div class="tab-pane fade show active" id="payment-method" role="tabpanel">
										<div class="myaccount-content">
                                            <h3>Bill</h3>
											Upload Bill - {{$bill->id}} <br>
											Name : {{$bill->name}} <br>
											Total : {{$bill->total}} <br>
											Transaction No : {{$bill->transaction()->id}} <br>
											
											@if($bill->photo)
												<img id="imageShow" src="{{route('index')}}/storage/{{$bill->photo}}" alt="your image" width="200px" height="250px" />		
											@else
												<img id="imageShow" src="{{ asset('frontend/image/book') }}/empty.jpg" alt="your image" width="200px" height="250px" />		
											@endif
											<form method="post" enctype="multipart/form-data" action="{{route('upload.bill',$bill->id)}}">
												@csrf
												<br>
												<input onchange="readURL(this)" type="file" name="receipt" required="required">						  
												<br>
												<br>
												<button type="submit" class="btn btn-secondary">Upload</button>
											</form>
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
    
    reader.onload = function(e) {
      $('#imageShow').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}
</script>
@endsection