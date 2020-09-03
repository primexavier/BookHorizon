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
                                <div class="single-slide bg-image bg-overlay--white" data-bg="{{ asset('frontend/image/bg-images/home-4-slider-1.jpg') }}">
                                    <div class="home-content text-left pl--30">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <span class="title-small">Magazine Cover</span>
                                                <h1>Mockup.</h1>
                                                <p>Cover up front of book and
                                                    <br>leave summary</p>
                                                <a href="{{route("index")}}" class="btn btn-outlined--pink">
                                                    Shop Now
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide bg-image bg-overlay--dark"
                                    data-bg="{{ asset('frontend/image/bg-images/home-4-slider-2.jpg') }}">
                                    <div class="home-content text-center">
                                        <div class="row justify-content-end">
                                            <div class="col-lg-8">
                                                <h1 class="v2">I Love This Idea!</h1>
                                                <h2>Cover up front of book and
                                                    leave summary</h2>
                                                <a href="{{route("index")}}" class="btn btn--yellow">
                                                    Shop Now
                                                </a>
                                            </div>
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
                                    <h5>Free Shipping Item</h5>
                                    <p> Orders over $500</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mt--30">
                            <div class="feature-box h-100">
                                <div class="icon">
                                    <i class="fas fa-redo-alt"></i>
                                </div>
                                <div class="text">
                                    <h5>Money Back Guarantee</h5>
                                    <p>100% money back</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mt--30">
                            <div class="feature-box h-100">
                                <div class="icon">
                                    <i class="fas fa-piggy-bank"></i>
                                </div>
                                <div class="text">
                                    <h5>Cash On Delivery</h5>
                                    <p>Lorem ipsum dolor amet</p>
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
                                    <p>Call us : + 0123.4567.89</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@endsection
