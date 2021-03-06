@extends('frontend.layouts.app')

@section('content')
<section class="section-padding">
            <h2 class="sr-only">Membership</h2>
            <div class="container">
                <div class="sb-custom-tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="shop-tab" data-toggle="tab" href="#shop" role="tab"
                                aria-controls="shop" aria-selected="true">
                                Membership
                            </a>
                            <span class="arrow-icon"></span>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane show active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                            <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider"
                                data-slick-setting='{
                            "autoplay": true,
                            "autoplaySpeed": 8000,
                            "slidesToShow": 5,
                            "rows":2,
                            "dots":true
                        }' data-slick-responsive='[
                            {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1} },
                            {"breakpoint":320, "settings": {"slidesToShow": 1} }
                        ]'>
                            @if(count($memberships))
                                @foreach($memberships as $membership)
                                <div class="single-slide">
                                    <div class="product-card">
                                        <div class="product-header">
                                            <h3><a href="{{route('checkout.membership',$membership->id)}}">{{$membership->name}}</a></h3>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                <p><strong>Duration <br> {{$membership->duration}} days</strong></p>
                                                <p><strong>Description <br> {{$membership->description}}</strong></p>
                                                <div class="hover-contents">
                                                    <div class="hover-btns">
                                                        <a href="{{route('checkout.membership',$membership->id)}}" class="single-btn">
                                                            <i class="fas fa-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-block">
                                                <span class="price">Rp {{$membership->price}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class="single-slide">
                                    <div class="product-card">
                                    Curently Nothing Here
                                    </div>
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection