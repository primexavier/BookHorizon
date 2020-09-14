@extends('frontend.layouts.app')

@section('content') 
            <!--================================= Hero Area ===================================== -->
            <section class="hero-area hero-slider-4 ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 offset-lg-3">
                            <div class="sb-slick-slider" data-slick-setting='{
                                                                        "autoplay": true,
                                                                        "autoplaySpeed": 8000,
                                                                        "slidesToShow": 1,
                                                                        "dots":true
                                                                        }'>
                                <div class="single-slide bg-image bg-overlay--white" data-bg="{{ asset('frontend/image/bg-images/home-4-slider-1.png') }}">
                                    <div class="home-content text-left pl--30">
                                        <div class="row">
                                            <!-- <div class="col-lg-5">
                                                <span class="title-small">Magazine Cover</span>
                                                <h1>Mockup.</h1>
                                                <p>Cover up front of book and <br>leave summary</p>
                                                <a href="{{route('index')}}" class="btn btn-outlined--pink">
                                                    Shop Now
                                                </a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide bg-image bg-overlay--dark" data-bg="{{ asset('frontend/image/bg-images/home-4-slider-2.png') }}">
                                    <div class="home-content text-center">
                                        <div class="row justify-content-end">
                                            <!-- <div class="col-lg-8">
                                                <h1 class="v2">I Love This Idea!</h1>
                                                <h2>Cover up front of book and
                                                    leave summary</h2>
                                                <a href="{{route("index")}}" class="btn btn--yellow">
                                                    Shop Now
                                                </a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--================================= Home Features Section ===================================== -->
            <section class="mb--30">
                <h2 class="sr-only">Feature Section</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mt--30">
                            <div class="feature-box h-100">
                                <div class="icon">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                                <div class="text">
                                    <h5>Shipping to</h5>
                                    <p> all over Indonesia </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mt--30">
                            <div class="feature-box h-100">
                                <div class="icon">
                                    <i class="fas fa-redo-alt"></i>
                                </div>
                                <div class="text">
                                    <h5>Rent & Return</h5>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mt--30">
                            <div class="feature-box h-100">
                                <div class="icon">
                                    <i class="fas fa-piggy-bank"></i>
                                </div>
                                <div class="text">
                                    <h5>Membership</h5>
                                    <p>join our membership plans.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mt--30">
                            <div class="feature-box h-100">
                                <div class="icon">
                                    <i class="fas fa-life-ring"></i>
                                </div>
                                <div class="text">
                                    <h5>Help & Support</h5>
                                    <p>Call us : +62 813 8908 4342</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- <section class="section-margin">
                <h2 class="sr-only">Category Gallery Section</h2>
                <div class="container">
                    <div class="category-gallery-block">
                        <a href="#" class="single-block hr-large">
                            <img src="{{ asset('frontend/image/others/cat-gal-large.png') }}" alt="">
                        </a>
                        <div class="single-block inner-block-wrapper">
                            <a href="#" class="single-image mid-image">
                                <img src="{{ asset('frontend/image/others/cat-gal-mid.png') }}" alt="">
                            </a>
                            <a href="#" class="single-image small-image">
                                <img src="{{ asset('frontend/image/others/cat-gal-small.png') }}" alt="">
                            </a>
                            <a href="#" class="single-image small-image">
                                <img src="{{ asset('frontend/image/others/cat-gal-small-2.jpg') }}" alt="">
                            </a>
                            <a href="#" class="single-image mid-image">
                                <img src="{{ asset('frontend/image/others/cat-gal-mid-2.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </section> -->
            <!--================================= Home Two Column Section ===================================== -->
            <section class="section-margin">
                <h1 class="sr-only">Promotion Section</h1>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="home-left-side text-center text-lg-left">
                                <div class="single-block">
                                    <h3 class="home-sidebar-title">
                                        BEST SELLERS
                                    </h3>
                                    <div class="product-slider product-list-slider multiple-row sb-slick-slider home-4-left-sidebar" data-slick-setting='{
                                                "autoplay": true,
                                                "autoplaySpeed": 8000,
                                                "slidesToShow":1,
                                                "rows":4,
                                                "dots":true
                                            }' data-slick-responsive='[
                                                {"breakpoint":1200, "settings": {"slidesToShow": 1} },
                                                {"breakpoint":992, "settings": {"slidesToShow": 2, "rows":2} },
                                                {"breakpoint":768, "settings": {"slidesToShow": 2, "rows":2} },
                                                {"breakpoint":575, "settings": {"slidesToShow": 1} },
                                                {"breakpoint":490, "settings": {"slidesToShow": 1} }
                                            ]'>
                                        @forelse ($booklist as $book)
                                        <div class="single-slide">
                                            <div class="product-card card-style-list">
                                                <div class="card-image">
                                                    @if ($book->bookimage())
                                                        <img src="/storage/{{$book->bookimage()->image()->url}}" style="min-width: 150px; max-width:150px; max-height:250px; min-height:250px" alt="">
                                                    @else
                                                        <img src="{{ asset('frontend/image/book') }}/empty.jpg" style="min-width: 150px; max-width:150px; max-height:250px; min-height:250px" alt="">
                                                    @endif
                                                </div>
                                                <div class="product-card--body">
                                                    <div class="product-header">
                                                        <!-- <a href="#" class="author">
                                                            {{$book->author()}} 
                                                        </a> -->
                                                        <h3><a href="{{ route('book.detail',$book->id) }}">{{ \Illuminate\Support\Str::limit($book->title, 20, $end='...')}}</a></h3>
                                                    </div>
                                                    <div class="price-block">
                                                        <span class="price">Rp {{$book->price}}</span>
                                                        <!-- <del class="price-old">{{$book->price+($book->price*0.2)}}</del> -->
                                                        <!-- <span class="price-discount">20%</span> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <p>There is no book!</p>
                                        @endforelse
                                    </div>
                                </div>
                                <!-- <div class="single-block text-center">
                                    <a href="" class="promo-image home-sidebar-promo promo-overlay">
                                        <img src="{{ asset('frontend/image/others/home-side-promo.jpg') }}" alt="">
                                    </a>
                                </div> -->
                                <div class="single-block text-center">
                                    <h3 class="home-sidebar-title style-2">
                                        Special offer
                                    </h3>
                                    <div class="product-slider countdown-single with-countdown sb-slick-slider product-border-reset" data-slick-setting='{
                                                    "autoplay": true,
                                                    "autoplaySpeed": 8000,
                                                    "slidesToShow": 1,
                                                    "dots":true
                                                }' data-slick-responsive='[
                                                {"breakpoint":1200, "settings": {"slidesToShow": 1} },
                                                {"breakpoint":992, "settings": {"slidesToShow": 2} },
                                                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                                {"breakpoint":575, "settings": {"slidesToShow": 1} },
                                                {"breakpoint":490, "settings": {"slidesToShow": 1} }
                                            ]'>
                                        @forelse ($spesialOffers as $spesialOffer)
                                        <div class="single-slide">
                                            <div class="product-card">
                                                <div class="product-header">
                                                    <!-- <a href="" class="author">                                                        
                                                        {{$spesialOffer->author()}}
                                                    </a> -->
                                                    <h3><a href="{{ route('book.detail',$spesialOffer->id) }}"></a>{{ \Illuminate\Support\Str::limit($spesialOffer->title, 40, $end='...')}}</h3>
                                                </div>
                                                <div class="product-card--body">
                                                    <div class="card-image">
                                                        @if ($spesialOffer->bookimage())                                                    
                                                            <img src="/storage/{{$spesialOffer->bookimage()->image()->url}}" style="margin:auto; min-width: 150px; max-width:150px; max-height:250px; min-height:250px;" alt="">
                                                        @else
                                                            <img src="{{ asset('frontend/image/book') }}/empty.jpg" alt="" style="margin:auto; min-width: 150px; max-width:150px; max-height:250px; min-height:250px;" >
                                                        @endif
                                                        <div class="hover-contents">
                                                            <a href="{{ route('book.detail',$spesialOffer->id) }}" class="hover-image">
                                                            @if ($spesialOffer->bookimage())
                                                                <img src="/storage/{{$spesialOffer->bookimage()->image()->url}}" style="min-width: 150px; max-width:150px; max-height:250px; min-height:250px" alt="">
                                                            @else
                                                                <img src="{{ asset('frontend/image/book') }}/empty.jpg" alt="" style="min-width: 150px; max-width:150px; max-height:250px; min-height:250px" >
                                                            @endif
                                                            </a>
                                                            <div class="hover-btns">
                                                                <a onclick="addChart('book',{{$spesialOffer->id}})" class="single-btn">
                                                                    <i class="fas fa-shopping-basket"></i>
                                                                </a>
                                                                <a onclick="addWishlist('book',{{$spesialOffer->id}})" class="single-btn">
                                                                    <i class="fas fa-heart"></i>
                                                                </a>
                                                                <a onclick="addChart('rent',{{$spesialOffer->id}})" class="single-btn">
                                                                    <i class="fas fa-clock"></i>
                                                                </a>
                                                                <!-- <a href="compare.html" class="single-btn">
                                                                    <i class="fas fa-random"></i>
                                                                </a> -->
                                                                <a onclick="toggleDetail({{$spesialOffer->id}})" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="price-block">
                                                        <span class="price">Rp {{$spesialOffer->price}}</span>
                                                        <!-- <del class="price-old">£51.20</del>
                                                            <span class="price-discount">20%</span> -->
                                                    </div>
                                                    <div class="count-down-block">
                                                        <div class="product-countdown" data-countdown="08/08/2020"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <div class="single-slide">
                                            <div class="product-card">
                                                <div class="product-card--body">
                                                    We will let You know when new Offers arrives!
                                                </div>
                                            </div>
                                        </div>
                                        @endforelse
                                    </div>
                                </div>
                                <!-- <div class="single-block">
                                    <h3 class="home-sidebar-title">
                                        CLIENT TESTIMONIALS
                                    </h3>
                                    <div class="sb-slick-slider testimonial-slider slider-one-column" data-slick-setting='{
                                                            "autoplay": true,
                                                            "autoplaySpeed": 8000,
                                                            "slidesToShow":1,
                                                            "dots":true
                                                            }'
                                                            data-slick-responsive='[
                                                            {"breakpoint":1200, "settings": {"slidesToShow": 1} },
                                                            {"breakpoint":992, "settings": {"slidesToShow": 2} },
                                                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                                            {"breakpoint":575, "settings": {"slidesToShow": 1} },
                                                            {"breakpoint":490, "settings": {"slidesToShow": 1} }
                                            ]'>
                                        <div class="single-slide">
                                            <div class="testimonial-card">
                                                <div class="testimonial-image">
                                                    <img src="{{ asset('frontend/image/others/client-1.png') }}" alt="">
                                                </div>
                                                <div class="testimonial-body">
                                                    <article>
                                                        <h2 class="sr-only">Testimonial Article</h2>
                                                        <p>version This is Photoshops of Lorem Ipsum. Proin gravida nibh vel
                                                            velit.Lorem ipsum dolor
                                                            sit amet, consectetur
                                                            adipiscing elit. In molestie augue magna. Pell..</p>
                                                        <span class="d-block client-name">Rebecka Filson</span>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-slide">
                                            <div class="testimonial-card">
                                                <div class="testimonial-image">
                                                    <img src="{{ asset('frontend/image/others/client-2.png') }}" alt="">
                                                </div>
                                                <div class="testimonial-body">
                                                    <article>
                                                        <h2 class="sr-only">Testimonial Article</h2>
                                                        <p>In molestie augue magna.This is Photoshops version of Lorem
                                                            Ipsum. Proin gravida nibh vel
                                                            velit.Lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit. Pell..</p>
                                                        <span class="d-block client-name">Rebecka Filson</span>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-slide">
                                            <div class="testimonial-card">
                                                <div class="testimonial-image">
                                                    <img src="{{ asset('frontend/image/others/client-3.png') }}" alt="">
                                                </div>
                                                <div class="testimonial-body">
                                                    <article>
                                                        <h2 class="sr-only">Testimonial Article</h2>
                                                        <p>Lorem Ipsum This is Photoshops version of . Proin gravida nibh
                                                            vel velit.Lorem ipsum
                                                            dolor sit amet, consectetur
                                                            adipiscing elit. In molestie augue magna. Pell..</p>
                                                        <span class="d-block client-name">Rebecka Filson</span>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-slide">
                                            <div class="testimonial-card">
                                                <div class="testimonial-image">
                                                    <img src="{{ asset('frontend/image/others/client-4.png') }}" alt="">
                                                </div>
                                                <div class="testimonial-body">
                                                    <article>
                                                        <h2 class="sr-only">Testimonial Article</h2>
                                                        <p>elit. In molestie This is Photoshops version of Lorem Ipsum.
                                                            Proin gravida nibh vel
                                                            velit.Lorem ipsum dolor sit amet, consectetur
                                                            adipiscing augue magna. Pell..</p>
                                                        <span class="d-block client-name">Rebecka Filson</span>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-slide">
                                            <div class="testimonial-card">
                                                <div class="testimonial-image">
                                                    <img src="{{ asset('frontend/image/others/client-5.png') }}" alt="">
                                                </div>
                                                <div class="testimonial-body">
                                                    <article>
                                                        <h2 class="sr-only">Testimonial Article</h2>
                                                        <p>Pell Photoshops version of Lorem Ipsum. Proin gravida nibh vel
                                                            velit.Lorem ipsum dolor
                                                            sit amet, consectetur
                                                            adipiscing elit. In molestie augue magna. This is..</p>
                                                        <span class="d-block client-name">Rebecka Filson</span>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="home-right-side">
                                <div class="single-block">
                                    <div class="sb-custom-tab text-lg-left text-center">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="shop-tab" data-toggle="tab" href="#shop" role="tab" aria-controls="shop" aria-selected="true">
                                                    Featured Books
                                                </a>
                                                <span class="arrow-icon"></span>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="men-tab" data-toggle="tab" href="#men" role="tab" aria-controls="men" aria-selected="true">
                                                    New Arrivals
                                                </a>
                                                <span class="arrow-icon"></span>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="woman-tab" data-toggle="tab" href="#woman" role="tab" aria-controls="woman" aria-selected="false">
                                                    Most view Books
                                                </a>
                                                <span class="arrow-icon"></span>
                                            </li>
                                        </ul>
                                        <div class="tab-content space-db--30" id="myTabContent">
                                            <div class="tab-pane active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                                                <div class="product-slider multiple-row slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                                        "autoplay": true,
                                                        "autoplaySpeed": 8000,
                                                        "slidesToShow": 3,
                                                        "rows":2,
                                                        "dots":true
                                                    }' data-slick-responsive='[
                                                        {"breakpoint":992, "settings": {"slidesToShow": 3} },
                                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                                    ]'>
                                                    @forelse ($booklist as $book)
                                                    <div class="single-slide">
                                                        <div class="product-card">
                                                            <div class="product-header">
                                                                <!-- <a class="author">
                                                                    {{$book->author()}}
                                                                </a> -->
                                                                <h3><a href="{{ route('book.detail',$book->id) }}">{{ \Illuminate\Support\Str::limit($book->title, 20, $end='...')}}</a></h3>
                                                            </div>
                                                            <div class="product-card--body">
                                                                <div class="card-image">
                                                                    @if ($book->bookimage())                                                    
                                                                        <img src="/storage/{{$book->bookimage()->image()->url}}" style="margin:auto; min-width: 150px; max-width:150px; max-height:250px; min-height:250px" alt="">
                                                                    @else
                                                                        <img src="{{ asset('frontend/image/book') }}/empty.jpg" alt="" style="margin:auto; min-width: 150px; max-width:150px; max-height:250px; min-height:250px" >
                                                                    @endif
                                                                    <div class="hover-contents">
                                                                        <a href="{{ route('book.detail',$book->id) }}" class="hover-image">
                                                                        @if ($book->bookimage())                                                    
                                                                            <img src="/storage/{{$book->bookimage()->image()->url}}" style="margin:auto; min-width: 150px; max-width:150px; max-height:250px; min-height:250px" alt="">
                                                                        @else
                                                                            <img src="{{ asset('frontend/image/book') }}/empty.jpg" alt="" style="margin:auto; min-width: 150px; max-width:150px; max-height:250px; min-height:250px" >
                                                                        @endif
                                                                        </a>
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
                                                                            <a onclick="toggleDetail({{$book->id}})" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
                                                    </div>
                                                    @empty
                                                    <p>There is no book!</p>
                                                    @endforelse
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="men" role="tabpanel" aria-labelledby="men-tab">
                                                <div class="product-slider multiple-row slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                                                "autoplay": true,
                                                                "autoplaySpeed": 8000,
                                                                "slidesToShow": 3,
                                                                "rows":2,
                                                                "dots":true
                                                                }' data-slick-responsive='[
                                                                    {"breakpoint":992, "settings": {"slidesToShow": 3} },
                                                                    {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                                                    {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                                                    {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                                                ]'>
                                                    @forelse ($newArrivals as $book)
                                                    <div class="single-slide">
                                                        <div class="product-card">
                                                            <div class="product-header">
                                                                <!-- <a href="" class="author">
                                                                    {{$book->author()}}
                                                                </a> -->
                                                                <h3><a href="{{ route('book.detail',$book->id) }}">{{ \Illuminate\Support\Str::limit($book->title, 20, $end='...')}}</a></h3>
                                                            </div>
                                                            <div class="product-card--body">
                                                                <div class="card-image">
                                                                    @if ($book->bookimage())                                                    
                                                                        <img src="/storage/{{$book->bookimage()->image()->url}}" style="margin:auto; min-width: 150px; max-width:150px; max-height:250px; min-height:250px" alt="">
                                                                    @else
                                                                        <img src="{{ asset('frontend/image/book') }}/empty.jpg" alt="" style="margin:auto; min-width: 150px; max-width:150px; max-height:250px; min-height:250px" >
                                                                    @endif
                                                                    <div class="hover-contents">
                                                                        <a href="{{ route('book.detail',$book->id) }}" class="hover-image">
                                                                            @if ($book->bookimage())                                                    
                                                                                <img src="/storage/{{$book->bookimage()->image()->url}}" style="margin:auto; min-width: 150px; max-width:150px; max-height:250px; min-height:250px" alt="">
                                                                            @else
                                                                                <img src="{{ asset('frontend/image/book') }}/empty.jpg" alt="" style="margin:auto; min-width: 150px; max-width:150px; max-height:250px; min-height:250px" >
                                                                            @endif
                                                                        </a>
                                                                        <div class="hover-btns">
                                                                            <a onclick="addChart('book',{{$book->id}})" class="single-btn">
                                                                                <i class="fas fa-shopping-basket"></i>
                                                                            </a>
                                                                            <a onclick="addWishlist('book',{{$book->id}})" class="single-btn">
                                                                                <i class="fas fa-heart"></i>
                                                                            </a>
                                                                            <a onclick="addChart('rent',{{$book->id}})" class="single-btn">
                                                                                <i class="fas fa-clock"></i>
                                                                            </a>
                                                                            <!-- <a href="compare.html" class="single-btn">
                                                                                <i class="fas fa-random"></i>
                                                                            </a> -->
                                                                            <a onclick="toggleDetail({{$book->id}})" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
                                                    </div>
                                                    @empty
                                                    <p>There is no book!</p>
                                                    @endforelse
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="woman" role="tabpanel" aria-labelledby="woman-tab">
                                                <div class="product-slider multiple-row slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                                        "autoplay": true,
                                                        "autoplaySpeed": 8000,
                                                        "slidesToShow": 3,
                                                        "rows":2,
                                                        "dots":true
                                                    }' data-slick-responsive='[
                                                        {"breakpoint":992, "settings": {"slidesToShow": 3} },
                                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                                    ]'>
                                                    @forelse ($booklist as $book)
                                                    <div class="single-slide">
                                                        <div class="product-card">
                                                            <div class="product-header">
                                                                <!-- <a href="" class="author">
                                                                    {{$book->author()}}
                                                                </a> -->
                                                                <h3><a href="{{ route('book.detail',$book->id) }}">{{ \Illuminate\Support\Str::limit($book->title, 20, $end='...')}}</a></h3>
                                                            </div>
                                                            <div class="product-card--body">
                                                                <div class="card-image">
                                                                    @if ($book->bookimage())                                                    
                                                                        <img src="/storage/{{$book->bookimage()->image()->url}}" style="margin:auto; min-width: 150px; max-width:150px; max-height:250px; min-height:250px" alt="">
                                                                    @else
                                                                        <img src="{{ asset('frontend/image/book') }}/empty.jpg" alt="" style="margin:auto; min-width: 150px; max-width:150px; max-height:250px; min-height:250px" >
                                                                    @endif
                                                                    <div class="hover-contents">
                                                                        <a href="{{ route('book.detail',1) }}" class="hover-image">
                                                                            @if ($book->bookimage())                                                    
                                                                                <img src="/storage/{{$book->bookimage()->image()->url}}" style="margin:auto; min-width: 150px; max-width:150px; max-height:250px; min-height:250px" alt="">
                                                                            @else
                                                                                <img src="{{ asset('frontend/image/book') }}/empty.jpg" alt="" style="margin:auto; min-width: 150px; max-width:150px; max-height:250px; min-height:250px" >
                                                                            @endif
                                                                        </a>
                                                                        <div class="hover-btns">
                                                                            <a onclick="addChart('book',{{$book->id}})" class="single-btn">
                                                                                <i class="fas fa-shopping-basket"></i>
                                                                            </a>
                                                                            <a onclick="addWishlist('book',{{$book->id}})" class="single-btn">
                                                                                <i class="fas fa-heart"></i>
                                                                            </a>
                                                                            <a onclick="addChart('rent',{{$book->id}})" class="single-btn">
                                                                                <i class="fas fa-clock"></i>
                                                                            </a>
                                                                            <!-- <a href="compare.html" class="single-btn">
                                                                                <i class="fas fa-random"></i>
                                                                            </a> -->
                                                                            <a onclick="toggleDetail({{$book->id}})" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
                                                    </div>
                                                    @empty
                                                    <p>There is no book!</p>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="single-block">
                                    <div class="row space-db--30">
                                        <div class="col-lg-8 mb--30">
                                            <a href="" class="promo-image promo-overlay">
                                                <img src="{{ asset('frontend/image/bg-images/promo-banner-with-text-big.jpg') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="col-lg-4 mb--30">
                                            <a href="" class="promo-image promo-overlay">
                                                <img src="{{ asset('frontend/image/bg-images/promo-banner-with-text-2--small.jpg') }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="single-block">
                                    <div class="home-right-block bg-white">
                                        <div class="sb-custom-tab text-lg-left text-center">
                                            <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="shop-tab2" data-toggle="tab" href="#shop2" role="tab" aria-controls="shop2" aria-selected="true">
                                                        ARTS & PHOTOGRAPHY
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="men-tab2" data-toggle="tab" href="#men2" role="tab" aria-controls="men2" aria-selected="true">
                                                        CHILDREN'S BOOKS
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="woman-tab2" data-toggle="tab" href="#woman2" role="tab" aria-controls="woman2" aria-selected="false">
                                                        BIOGRAPHIES
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent2">
                                                <div class="tab-pane active" id="shop2" role="tabpanel" aria-labelledby="shop-tab2">
                                                    <div class="product-slider product-list-slider multiple-row slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                                            "autoplay": true,
                                                            "autoplaySpeed": 8000,
                                                            "slidesToShow": 2,
                                                            "rows":4,
                                                            "dots":true
                                                        }' data-slick-responsive='[
                                                            {"breakpoint":992, "settings": {"slidesToShow": 2,"rows": 3} },
                        
                                                            {"breakpoint":768, "settings": {"slidesToShow": 1} }
                                                        ]'>
                                                        @forelse ($booklist as $book)
                                                        <div class="single-slide">
                                                            <div class="product-card card-style-list">
                                                                <div class="card-image">
                                                                    @if ($book->bookimage())                                                    
                                                                        <img src="/storage/{{$book->bookimage()->image()->url}}" style="min-width: 150px; max-width:150px; max-height:250px; min-height:250px" alt="">
                                                                    @else
                                                                        <img src="{{ asset('frontend/image/book') }}/empty.jpg" alt="" style="min-width: 100p150pxx; max-width:150px; max-height:250px; min-height:250px" >
                                                                    @endif
                                                                </div>
                                                                <div class="product-card--body">
                                                                    <div class="product-header">
                                                                        <!-- <a href="" class="author">
                                                                            {{$book->author()}}
                                                                        </a> -->
                                                                        <h3><a href="{{ route('book.detail',$book->id) }}">{{ \Illuminate\Support\Str::limit($book->title, 20, $end='...')}}</a></h3>
                                                                    </div>
                                                                    <div class="price-block">
                                                                        <span class="price">Rp {{$book->price}}</span>
                                                                        <!-- <del class="price-old">£51.20</del>
                                                                            <span class="price-discount">20%</span> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @empty
                                                        <p>There is no book!</p>
                                                        @endforelse
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="men2" role="tabpanel" aria-labelledby="men-tab2">
                                                    <div class="product-slider product-list-slider multiple-row slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                                            "autoplay": true,
                                                            "autoplaySpeed": 8000,
                                                            "slidesToShow": 2,
                                                            "rows":4,
                                                            "dots":true
                                                        }' data-slick-responsive='[
                                                            {"breakpoint":992, "settings": {"slidesToShow": 2,"rows": 3} },
                        
                                                            {"breakpoint":768, "settings": {"slidesToShow": 1} }
                                                        ]'>
                                                        @forelse ($booklist as $book)
                                                        <div class="single-slide">
                                                            <div class="product-card card-style-list">
                                                                <div class="card-image">
                                                                    @if ($book->bookimage())                                                    
                                                                        <img src="/storage/{{$book->bookimage()->image()->url}}" style="min-width: 150px; max-width:150px; max-height:250px; min-height:250px" alt="">
                                                                    @else
                                                                        <img src="{{ asset('frontend/image/book') }}/empty.jpg" alt="" style="min-width: 100p150pxx; max-width:150px; max-height:250px; min-height:250px" >
                                                                    @endif
                                                                </div>
                                                                <div class="product-card--body">
                                                                    <div class="product-header">
                                                                        <!-- <a href="" class="author">
                                                                            Hpple
                                                                        </a> -->
                                                                        <h3><a href="{{ route('book.detail',$book->id) }}">{{ \Illuminate\Support\Str::limit($book->title, 20, $end='...')}}</a></h3>
                                                                    </div>
                                                                    <div class="price-block">
                                                                        <span class="price">Rp {{$book->price}}</span>
                                                                        <!-- <del class="price-old">£51.20</del>
                                                                            <span class="price-discount">20%</span> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @empty
                                                        <p>There is no book!</p>
                                                        @endforelse
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="woman2" role="tabpanel" aria-labelledby="woman-tab2">
                                                    <div class="product-slider product-list-slider multiple-row slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                                                "autoplay": true,
                                                                "autoplaySpeed": 8000,
                                                                "slidesToShow": 2,
                                                                "rows":4,
                                                                "dots":true
                                                            }' data-slick-responsive='[
                                                                {"breakpoint":992, "settings": {"slidesToShow": 2,"rows": 3} },
                            
                                                                {"breakpoint":768, "settings": {"slidesToShow": 1} }
                                                            ]'>
                                                        @forelse ($booklist as $book)
                                                        <div class="single-slide">
                                                            <div class="product-card card-style-list">
                                                                <div class="card-image">
                                                                    @if ($book->bookimage())                                                    
                                                                        <img src="/storage/{{$book->bookimage()->image()->url}}" style="min-width: 150px; max-width:150px; max-height:250px; min-height:250px" alt="">
                                                                    @else
                                                                        <img src="{{ asset('frontend/image/book') }}/empty.jpg" alt="" style="min-width: 100p150pxx; max-width:150px; max-height:250px; min-height:250px" >
                                                                    @endif
                                                                </div>
                                                                <div class="product-card--body">
                                                                    <div class="product-header">
                                                                        <!-- <a href="" class="author">
                                                                            Gpple
                                                                        </a> -->
                                                                        <h3><a href="{{ route('book.detail',$book->id) }}">{{ \Illuminate\Support\Str::limit($book->title, 20, $end='...')}}</a></h3>
                                                                    </div>
                                                                    <div class="price-block">
                                                                        <span class="price">Rp {{$book->price}}</span>
                                                                        <!-- <del class="price-old">£51.20</del>
                                                                            <span class="price-discount">20%</span> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @empty
                                                        <p>There is no book!</p>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="single-block">
                                    <div class="blog-slider sb-slick-slider slider-one-column" data-slick-setting='{
                                            "autoplay": false,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow": 1,
                                            "dots": true
                                        }'>
                                        <div class="single-slide">
                                            <div class="blog-card">
                                                <div class="image">
                                                    <img src="{{ asset('frontend/image/others/home-blog-1.jpg') }}" alt="">
                                                </div>
                                                <div class="content">
                                                    <div class="content-header">
                                                        <div class="date-badge">
                                                            <span class="date">
                                                                30
                                                            </span>
                                                            <span class="month">
                                                                OCT
                                                            </span>
                                                        </div>
                                                        <h3 class="title"><a href="blog-details.html">How to Water and Care
                                                                for Mounted</a></h3>
                                                    </div>
                                                    <p class="meta-para"><i class="fas fa-user-edit"></i>Post by <a href="#">Hastech</a></p>
                                                    <article class="blog-paragraph">
                                                        <h2 class="sr-only">blog-paragraph</h2>
                                                        <p>Virtual reality and 3-D technology are already well-established
                                                            in the entertainment...</p>
                                                    </article>
                                                    <a href="blog-details.html" class="card-link">Read More <i class="fas fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-slide">
                                            <div class="blog-card">
                                                <div class="image">
                                                    <img src="{{ asset('frontend/image/others/home-blog-2.jpg') }}" alt="">
                                                </div>
                                                <div class="content">
                                                    <div class="content-header">
                                                        <div class="date-badge">
                                                            <span class="date">
                                                                30
                                                            </span>
                                                            <span class="month">
                                                                OCT
                                                            </span>
                                                        </div>
                                                        <h3 class="title"><a href="blog-details.html">How to Grow Epiphytic
                                                                Tropical Plants</a></h3>
                                                    </div>
                                                    <p class="meta-para"><i class="fas fa-user-edit"></i>Post by <a href="#">Hastech</a></p>
                                                    <article class="blog-paragraph">
                                                        <h2 class="sr-only">blog-paragraph</h2>
                                                        <p>Virtual reality and 3-D technology are already well-established
                                                            in the entertainment...</p>
                                                    </article>
                                                    <a href="blog-details.html" class="card-link">Read More <i class="fas fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-slide">
                                            <div class="blog-card">
                                                <div class="image">
                                                    <img src="{{ asset('frontend/image/others/home-blog-1.jpg') }}" alt="">
                                                </div>
                                                <div class="content">
                                                    <div class="content-header">
                                                        <div class="date-badge">
                                                            <span class="date">
                                                                30
                                                            </span>
                                                            <span class="month">
                                                                OCT
                                                            </span>
                                                        </div>
                                                        <h3 class="title"><a href="blog-details.html">How To Pot Up and Care
                                                                For Juvenile</a></h3>
                                                    </div>
                                                    <p class="meta-para"><i class="fas fa-user-edit"></i>Post by <a href="#">Hastech</a></p>
                                                    <article class="blog-paragraph">
                                                        <h2 class="sr-only">blog-paragraph</h2>
                                                        <p>Virtual reality and 3-D technology are already well-established
                                                            in the entertainment...</p>
                                                    </article>
                                                    <a href="blog-details.html" class="card-link">Read More <i class="fas fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@endsection
