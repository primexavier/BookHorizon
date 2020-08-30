@extends('frontend.layouts.app')

@section('content')
		<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active">Shop</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<main class="inner-page-sec-padding-bottom">
			<div class="container">
				<div class="shop-toolbar mb--30">
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-2 col-sm-6">
							<!-- Product View Mode -->
							<div class="product-view-mode">
								<a href="#" class="sorting-btn" data-target="grid"><i class="fas fa-th"></i></a>
								<a href="#" class="sorting-btn" data-target="grid-four">
									<span class="grid-four-icon">
										<i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
									</span>
								</a>
								<a href="#" class="sorting-btn active" data-target="list "><i class="fas fa-list"></i></a>
							</div>
						</div>
						<!-- <div class="col-xl-5 col-md-4 col-sm-6  mt--10 mt-sm--0">
							<span class="toolbar-status">
								Showing 1 to 9 of 14 (2 Pages)
							</span>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-6  mt--10 mt-md--0">
							<div class="sorting-selection">
								<span>Show:</span>
								<select class="form-control nice-select sort-select">
									<option value="" selected="selected">3</option>
									<option value="">9</option>
									<option value="">5</option>
									<option value="">10</option>
									<option value="">12</option>
								</select>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
							<div class="sorting-selection">
								<span>Sort By:</span>
								<select class="form-control nice-select sort-select mr-0">
									<option value="" selected="selected">Default Sorting</option>
									<option value="">Sort
										By:Name (A - Z)</option>
									<option value="">Sort
										By:Name (Z - A)</option>
									<option value="">Sort
										By:Price (Low &gt; High)</option>
									<option value="">Sort
										By:Price (High &gt; Low)</option>
									<option value="">Sort
										By:Rating (Highest)</option>
									<option value="">Sort
										By:Rating (Lowest)</option>
									<option value="">Sort
										By:Model (A - Z)</option>
									<option value="">Sort
										By:Model (Z - A)</option>
								</select>
							</div>
						</div> -->
					</div>
				</div>
				<div class="shop-toolbar d-none">
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-2 col-sm-6">
							<!-- Product View Mode -->
							<div class="product-view-mode">
								<a href="#" class="sorting-btn active" data-target="grid"><i class="fas fa-th"></i></a>
								<a href="#" class="sorting-btn" data-target="grid-four">
									<span class="grid-four-icon">
										<i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
									</span>
								</a>
								<a href="#" class="sorting-btn" data-target="list "><i class="fas fa-list"></i></a>
							</div>
						</div>
						<!-- <div class="col-xl-5 col-md-4 col-sm-6  mt--10 mt-sm--0">
							<span class="toolbar-status">
								Showing 1 to 9 of 14 (2 Pages)
							</span>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-6  mt--10 mt-md--0">
							<div class="sorting-selection">
								<span>Show:</span>
								<select class="form-control nice-select sort-select">
									<option value="" selected="selected">3</option>
									<option value="">9</option>
									<option value="">5</option>
									<option value="">10</option>
									<option value="">12</option>
								</select>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
							<div class="sorting-selection">
								<span>Sort By:</span>
								<select class="form-control nice-select sort-select mr-0">
									<option value="" selected="selected">Default Sorting</option>
									<option value="">Sort
										By:Name (A - Z)</option>
									<option value="">Sort
										By:Name (Z - A)</option>
									<option value="">Sort
										By:Price (Low &gt; High)</option>
									<option value="">Sort
										By:Price (High &gt; Low)</option>
									<option value="">Sort
										By:Rating (Highest)</option>
									<option value="">Sort
										By:Rating (Lowest)</option>
									<option value="">Sort
										By:Model (A - Z)</option>
									<option value="">Sort
										By:Model (Z - A)</option>
								</select>
							</div>
						</div> -->
					</div>
				</div>
				<div class="shop-product-wrap list with-pagination row space-db--30 shop-border">
                    @if(count($searchBooks) > 0)
                        @foreach($searchBooks as $book)
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-card card-style-list">
                                <div class="product-grid-content">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            {{$book->author()}}
                                        </a>
                                        <h3><a href="{{ route('book.detail',$book->id) }}">Here Is A Quick Cure For Book</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            @if ($book->photo)
                                                <img src="{{ asset('frontend/image/book') }}/{{$book->photo}}" alt="">
                                            @else
                                                <img src="{{ asset('frontend/image/book') }}/empty.jpg" alt="">
                                            @endif
                                            <div class="hover-contents">
                                                <a href="{{ route('book.detail',$book->id) }}" class="hover-image">
                                                        @if ($book->photo)
                                                        <img src="{{ asset('frontend/image/book') }}/{{$book->photo}}" alt="">
                                                        @else
                                                        <img src="{{ asset('frontend/image/book') }}/empty.jpg" alt="">
                                                        @endif
                                                </a>
                                                <div class="hover-btns">
                                                    <a onclick="addChart('book',{{$book->id}})" class="single-btn">
                                                        <i  class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a onclick="addWishlist('book',{{$book->id}})" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <!-- <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a> -->
                                                    <a onclick="toggleDetail({{$book->id}})" data-toggle="modal" data-target="#quickModal"
                                                        class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">Rp {{$book->price}}</span>
                                            <!-- <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="product-list-content">
                                    <div class="card-image">
                                                        @if ($book->photo)
                                                        <img src="{{ asset('frontend/image/book') }}/{{$book->photo}}" alt="">
                                                        @else
                                                        <img src="{{ asset('frontend/image/book') }}/empty.jpg" alt="">
                                                        @endif
                                    </div>
                                    <div class="product-card--body">
                                        <div class="product-header">
                                            <a href="" class="author">
                                                {{$book->author()}}
                                            </a>
                                            <h3><a href="{{ route('book.detail',$book->id) }}" tabindex="0">{{$book->title}}</a></h3>
                                        </div>
                                        <article>
                                            <h2 class="sr-only">Card List Article</h2>
                                            <p>{{$book->description}}</p>
                                        </article>
                                        <div class="price-block">
                                            <span class="price">Rp {{$book->price}}</span>
                                            <!-- <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span> -->
                                        </div>
                                        <!-- <div class="rating-block">
                                            <span class="fas fa-star star_on"></span>
                                            <span class="fas fa-star star_on"></span>
                                            <span class="fas fa-star star_on"></span>
                                            <span class="fas fa-star star_on"></span>
                                            <span class="fas fa-star "></span>
                                        </div> -->
                                        <div class="btn-block">
                                            <a onclick="addChart('book',{{$book->id}})" class="btn btn-outlined">Add To Cart</a>
                                            <a onclick="addWishlist('book',{{$book->id}})" class="card-link"><i class="fas fa-heart"></i> Add To Wishlist</a>
                                            <a onclick="addChart('book',{{$book->id}})" class="card-link"><i class="fas fa-random"></i> Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="col-lg-12 col-sm-12">
                            <div class="product-card card-style-list">
                                <div class="product-grid-content">
                                    <div class="product-header">
                                        There Nothing Here
                                    </div>
                                </div>
                                <div class="product-list-content">
                                    <div class="product-card--body">
                                         <div class="product-header">
                                             <h3> There Nothing Here</h3>
                                         </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    @endif
				</div>
				<!-- Pagination Block -->
				<!-- <div class="row pt--30">
					<div class="col-md-12">
						<div class="pagination-block">
							<ul class="pagination-btns flex-center">
								<li><a href="" class="single-btn prev-btn ">|<i class="zmdi zmdi-chevron-left"></i> </a>
								</li>
								<li><a href="" class="single-btn prev-btn "><i class="zmdi zmdi-chevron-left"></i> </a>
								</li>
								<li class="active"><a href="" class="single-btn">1</a></li>
								<li><a href="" class="single-btn">2</a></li>
								<li><a href="" class="single-btn">3</a></li>
								<li><a href="" class="single-btn">4</a></li>
								<li><a href="" class="single-btn next-btn"><i class="zmdi zmdi-chevron-right"></i></a>
								</li>
								<li><a href="" class="single-btn next-btn"><i class="zmdi zmdi-chevron-right"></i>|</a>
								</li>
							</ul>
						</div>
					</div>
				</div> -->
			</div>
		</main>
@endsection
