@extends('frontend.layouts.app')

@section('content')
<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Book Details</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<main class="inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row mb--60">
            <div class="col-lg-5 mb--30">
                <!-- Product Details Slider Big Image-->
                <div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
              "slidesToShow": 1,
              "arrows": false,
              "fade": true,
              "draggable": false,
              "swipe": false,
              "asNavFor": ".product-slider-nav"
              }'>
                    <div class="single-slide">
                        @if ($bookDetail->bookimage())
                            <img src="/storage/{{$bookDetail->bookimage()->image()->url}}" style="margin:auto; min-width: 300px; max-width:350px; max-height:300px; min-height:450px" alt="">
                        @else
                            <img src="{{ asset('frontend/image/book') }}/empty.jpg" alt="" style="margin:auto; min-width: 300px; max-width:350px; max-height:300px; min-height:450px">
                        @endif
                    </div>
                </div>
                <!-- Product Details Slider Nav -->
                <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two" data-slick-setting='{
                    "infinite":true,
                    "autoplay": true,
                    "autoplaySpeed": 8000,
                    "slidesToShow": 4,
                    "arrows": true,
                    "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
                    "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
                    "asNavFor": ".product-details-slider",
                    "focusOnSelect": true
                    }'>

                    <div class="single-slide">
                        @if ($bookDetail->bookimage())
                            <img src="/storage/{{$bookDetail->bookimage()->image()->url}}" alt="">
                        @else
                            <img src="{{ asset('frontend/image/book') }}/empty.jpg" alt="">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="product-details-info pl-lg--30 ">
                    <!-- <p class="tag-block">Tags: <a href="#">Movado</a>, <a href="#">Omega</a></p> -->
                    <h3 class="product-title">{{$bookDetail->title}}</h3>
                    <ul class="list-unstyled">
                        <li>{{$bookDetail->format." | "}}{{$bookDetail->language()->name}}</li>
                        <li>By Author: <span class="list-value">{{$bookDetail->author()}}</span></li>
                        <li>Publication City: <span class="list-value">{{$bookDetail->publication_city}}</span></li>
                        <li>Isbn: <span class="list-value">{{$bookDetail->isbn}}</span></li>
                        <li>Weight: <span class="list-value">{{$bookDetail->weight}}</span></li>
                        <li>Dimension: <span class="list-value">{{$bookDetail->dimension}}</span></li>
                        <li>Pages: <span class="list-value">{{$bookDetail->pages}}</span></li>
                        <!-- <li>Ex Tax: <span class="list-value"> {{$bookDetail->price}}</span></li> -->
                        <!-- <li>Brands: <a href="#" class="list-value font-weight-bold"> Canon</a></li> -->
                        <!-- <li>Product Code: <span class="list-value"> model1</span></li> -->
                        <!-- <li>Reward Points: <span class="list-value"> 200</span></li> -->
                        <li>Availability: <span class="list-value"> In Stock</span></li>
                    </ul>
                    <div class="price-block">
                        <span class="price-new">Rp {{$bookDetail->price}}</span>
                        <del class="price-old">You Save Rp {{$bookDetail->price+10}}</del>
                    </div>
                    <div class="rating-widget">
                        @if($reviews->count() > 0)
							<div class="rating-block">
								<span class="fas fa-star star_on"></span>
								<span class="fas fa-star star_on"></span>
								<span class="fas fa-star star_on"></span>
								<span class="fas fa-star star_on"></span>
								<span class="fas fa-star "></span>
							</div>
                        @else
							<div class="rating-block">
								<span class="fas fa-star"></span>
								<span class="fas fa-star"></span>
								<span class="fas fa-star"></span>
								<span class="fas fa-star"></span>
								<span class="fas fa-star"></span>
							</div>

                        @endif
								<div class="review-widget">
									<a href="">({{$reviews->count()}} Reviews)</a>
								</div>
							</div>
                    <article class="product-details-article">
                        <h4 class="sr-only">book Summery</h4>
                        <p>{{$bookDetail->summary}}</p>
                    </article>
                    <div class="add-to-cart-row">
                        <!-- 
							<div class="count-input-block">
								<span class="widget-label">Qty</span>
								<input type="number" class="form-control text-center" value="1">
							</div> 
						-->
                        <div class="add-cart-btn">
                            <button onclick="addChart('book','{{ $bookDetail->id }}')"
                                class="btn btn-outlined--primary">Buy Now</button>
                        </div>&nbsp;
                        <div class="add-cart-btn">
                            <a onclick="addChart('rent','{{ $bookDetail->id }}')" class="btn btn-outlined--primary">Rent
                                Now</a>
                        </div>
                    </div>
                    <div class="compare-wishlist-row">
                        <button onclick="addWishlist('book','{{ $bookDetail->id }}')" class="add-link"><i
                                class="fas fa-heart"></i>Add to Wish List</button>
                        <!-- <a href="" class="add-link"><i class="fas fa-random"></i>Add to Compare</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="sb-custom-tab review-tab section-padding">
            <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="tab1" data-toggle="tab" href="#tab-1" role="tab"
                        aria-controls="tab-1" aria-selected="true">
                        DESCRIPTION
                    </a>
                </li>
                <li class="nav-item">
							<a class="nav-link" id="tab2" data-toggle="tab" href="#tab-2" role="tab"
								aria-controls="tab-2" aria-selected="true">
								REVIEWS ({{$comments->count()}})
							</a>
						</li>
            </ul>
            <div class="tab-content space-db--20" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                    <article class="review-article">
                        <h1 class="sr-only">Tab Article</h1>
                        <p>{{$bookDetail->description}}</p>
                    </article>
                </div>
                <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2">
                    <div class="review-wrapper">
                            @if($comments->count() > 0)
                                <h2 class="title-lg mb--20">{{$comments->count()}} REVIEW FOR {{$bookDetail->title}}</h2>
                                @foreach($comments as $comment)
                                <div class="review-comment mb--20">
                                    <div class="avatar">
                                        <img src="{{ asset('frontend/image/icon/author-logo.png') }}" alt="">
                                    </div>
                                    <div class="text">
                                        <!-- <div class="rating-block mb--15">
                                            <span class="ion-android-star-outline star_on"></span>
                                            <span class="ion-android-star-outline star_on"></span>
                                            <span class="ion-android-star-outline star_on"></span>
                                            <span class="ion-android-star-outline"></span>
                                            <span class="ion-android-star-outline"></span>
                                        </div> -->
                                        <h6 class="author">{{$comment->comment()->user()->name}} – <span class="font-weight-400">{{$comment->created_at}}</span>
                                        </h6>
                                        <p>{{$comment->comment()->comment}}</p>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                            @if(Auth::User())
                            <h2 class="title-lg mb--20 pt--15">ADD A Comment</h2>
                            <div class="rating-row pt-2">
                                <p class="d-block">Your Rating</p>
                                <span class="rating-widget-block">
                                    <input type="radio" name="star" id="star1">
                                    <label for="star1"></label>
                                    <input type="radio" name="star" id="star2">
                                    <label for="star2"></label>
                                    <input type="radio" name="star" id="star3">
                                    <label for="star3"></label>
                                    <input type="radio" name="star" id="star4">
                                    <label for="star4"></label>
                                    <input type="radio" name="star" id="star5">
                                    <label for="star5"></label>
                                </span>
                                <form action="{{route('add.comment',$bookDetail->id)}}" method="post" class="mt--15 site-form ">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="message">Comment</label>
                                                <textarea required="required" name="message" id="message" cols="30" rows="10"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="name">Name *</label>
                                                <input type="text" id="name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="email">Email *</label>
                                                <input type="text" id="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="website">Website</label>
                                                <input type="text" id="website" class="form-control">
                                            </div>
                                        </div> -->
                                        <div class="col-lg-4">
                                            <div class="submit-btn">
                                                <button type="submit" class="btn btn-black">Post Comment</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @else                        
                            <h2 class="title-lg mb--20 pt--15">Login to Comment / Reviews</h2>
                            @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="tab-product-details">
            <div class="brand">
                <img src="image/others/review-tab-product-details.jpg') }}" alt="">
            </div>
            <h5 class="meta">Reference <span class="small-text">demo_5</span></h5>
            <h5 class="meta">In stock <span class="small-text">297 Items</span></h5>
            <section class="product-features">
                <h3 class="title">Data sheet</h3>
                <dl class="data-sheet">
                <dt class="name">Compositions</dt>
                <dd class="value">Viscose</dd>
                <dt class="name">Styles</dt>
                <dd class="value">Casual</dd>
                <dt class="name">Properties</dt>
                <dd class="value">Maxi Dress</dd>
                </dl>
            </section>
        </div> -->
    </div>
    <!--================================= RELATED PRODUCTS BOOKS ===================================== -->
    <section class="">
        <div class="container">
            <div class="section-title section-title--bordered">
                <h2>RELATED PRODUCTS</h2>
            </div>
            <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
							"autoplay": true,
							"autoplaySpeed": 8000,
							"slidesToShow": 4,
							"dots":true
						}' data-slick-responsive='[
							{"breakpoint":1200, "settings": {"slidesToShow": 4} },
							{"breakpoint":992, "settings": {"slidesToShow": 3} },
							{"breakpoint":768, "settings": {"slidesToShow": 2} },
							{"breakpoint":480, "settings": {"slidesToShow": 1} }
						]'>
                @forelse ($booklist as $book)
                <div class="single-slide">
                    <div class="product-card">
                        <div class="product-header">
                            <a href="" class="author">
                                {{$book->author()}}
                            </a>
                            <h3><a
                                    href="{{ route('book.detail',$book->id) }}">{{ \Illuminate\Support\Str::limit($book->title, 25, $end='...')}}</a>
                            </h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <div class="single-slide">
                                    @if ($book->bookimage())
                                    <img src="/storage/{{$book->bookimage()->image()->url}}"
                                        style="margin:auto; min-width: 100px; max-width:150px; max-height:250px; min-height:200px"
                                        alt="">
                                    @else
                                    <img src="{{ asset('frontend/image/book') }}/empty.jpg" alt=""
                                        style="margin:auto; min-width: 100px; max-width:150px; max-height:250px; min-height:200px">
                                    @endif
                                </div>
                                <div class="hover-contents">
                                    <div class="single-slide">
                                        @if ($book->bookimage())
                                        <img src="/storage/{{$book->bookimage()->image()->url}}"
                                            style="margin:auto; min-width: 100px; max-width:150px; max-height:250px; min-height:200px"
                                            alt="">
                                        @else
                                        <img src="{{ asset('frontend/image/book') }}/empty.jpg" alt=""
                                            style="margin:auto; min-width: 100px; max-width:150px; max-height:250px; min-height:200px">
                                        @endif
                                    </div>
                                    <div class="hover-btns">
                                        <a onclick="addChart('book',{{$book->id}})" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a onclick="addWishlist('book',{{$book->id}})" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a onclick="addChart('book',{{$book->id}})" class="single-btn">
                                            <i class="fas fa-clock"></i>
                                        </a>
                                        <!-- <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a> -->
                                        <a onclick="toggleDetail({{$book->id}})" data-toggle="modal"
                                            data-target="#quickModal" class="single-btn">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price-block">
                                <span class="price">{{$book->price}}</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p>There is no book!</p>
                @endforelse
            </div>
        </div>
    </section>
</main>
@endsection
