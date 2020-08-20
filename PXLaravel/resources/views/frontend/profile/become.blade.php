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
                                <div class="single-slide">
                                    <div class="product-card">
                                        <div class="product-header">
                                            <a href="" class="author">
                                                Membership
                                            </a>
                                            <h3><a href="">Ultra Membership</a></h3>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                <img src="{{ asset('frontend/image/book') }}/empty.jpg" alt="">
                                                <div class="hover-contents">
                                                    <a href="" class="hover-image">
                                                        <img src="{{ asset('frontend/image/book') }}/empty.jpg" alt="">
                                                    </a>
                                                    <div class="hover-btns">
                                                        <a href="#" data-toggle="modal" data-target="#quickModal"
                                                            class="single-btn">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-block">
                                                <span class="price">Rp 10.000</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection