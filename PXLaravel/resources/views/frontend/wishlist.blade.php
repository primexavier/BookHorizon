@extends('frontend.layouts.app')

@section('content')
	<div class="site-wrapper" id="top">
		<div class="page-section inner-page-sec-padding">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="row">                        
							<div class="col-lg-12 col-12 mt--30 mt-lg--0">
								<div class="tab-content" id="myaccountContent">
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade show active" id="download" role="tabpanel">
										<div class="myaccount-content">
											<h3>Wishlist</h3>
											<div class="myaccount-table table-responsive text-center">
												<table class="table table-bordered">
													<thead class="thead-light">
														<tr>
															<th>Book</th>
															<th>Add To Chart</th>
														</tr>
													</thead>
													<tbody>
														@if(count($wishlists) > 0)
															@foreach($wishlists as $wishlist)															
															<form action="{{route('wishlist.chart')}}" medhod="get">
																<input type="hidden" name='wishlistId' value="{{$wishlist->id}}" >
																<tr>
																	<td>{!!chunk_split($wishlist->book()->title, 40, "<br>")!!}</td>
																	<td><button type="submit" class="btn btn--primary"><i class="fa fa-money"></i>Add To Chart!</a></td>
																</tr>
															</form>
															@endforeach
														@else
															<tr>
																<td colspan=4>Data Chart kosong!</td>
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection