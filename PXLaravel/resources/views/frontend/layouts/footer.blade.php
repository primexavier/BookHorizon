
            <!--================================= Footer ===================================== -->
            <!--================================= Brands Slider ===================================== -->
            <section class="section-margin">  
                <h2 class="sr-only">Brand Slider</h2>
                <div class="container">
                    <div class="brand-slider sb-slick-slider border-top border-bottom" data-slick-setting='{
                                                    "autoplay": true,
                                                    "autoplaySpeed": 8000,
                                                    "slidesToShow": 6
                                                    }' data-slick-responsive='[
                        {"breakpoint":992, "settings": {"slidesToShow": 4} },
                        {"breakpoint":768, "settings": {"slidesToShow": 3} },
                        {"breakpoint":575, "settings": {"slidesToShow": 3} },
                        {"breakpoint":480, "settings": {"slidesToShow": 2} },
                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                    ]'>
                        <div class="single-slide">
                            <img src="{{ asset('frontend/image/logo--footer.png') }}" alt="">
                        </div>
                        <div class="single-slide">
                            <img src="{{ asset('frontend/image/logo--footer.png') }}" alt="">
                        </div>
                        <div class="single-slide">
                            <img src="{{ asset('frontend/image/logo--footer.png') }}" alt="">
                        </div>
                        <div class="single-slide">
                            <img src="{{ asset('frontend/image/logo--footer.png') }}" alt="">
                        </div>
                        <div class="single-slide">
                            <img src="{{ asset('frontend/image/logo--footer.png') }}" alt="">
                        </div>
                        <div class="single-slide">
                            <img src="{{ asset('frontend/image/logo--footer.png') }}" alt="">
                        </div>
                        <div class="single-slide">
                            <img src="{{ asset('frontend/image/logo--footer.png') }}" alt="">
                        </div>
                        <div class="single-slide">
                            <img src="{{ asset('frontend/image/logo--footer.png ') }}" alt="">
                        </div>
                    </div>
                </div>
            </section>
            <!--================================= Footer Area ===================================== -->
            <footer class="site-footer">
                <div class="footer-bottom">
                    <div class="container">                    
                        <div class="row justify-content-between  section-padding" style="color:white;">
                            <div class=" col-xl-3 col-lg-4 col-sm-6">
                                <div class="single-footer pb--40">
                                    <div class="brand-footer footer-title">
                                        <img src="{{ asset('frontend/image/logo--footer.png') }}" alt="">
                                    </div>
                                    <div class="footer-contact">
                                        <p><span class="label" style="color:white;">Address:</span><span class="text">Tunas 2 Blok A No. 2, Batam</span></p>
                                        <p><span class="label" style="color:white;">Phone:</span><span class="text">0813 8908 4342</span></p>
                                        <p><span class="label" style="color:white;">Email:</span><span class="text">admin@bookhorizonlibrary.com</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-xl-3 col-lg-2 col-sm-6">
                                <div class="single-footer pb--40">
                                    <div class="footer-title">
                                        <h3 style="color:white;">Information</h3>
                                    </div>
                                    <ul class="footer-list normal-list">
                                        <li><a href="{{route('index')}}">New Releases</a></li>
                                        <li><a href="{{route('index')}}">Best sellers</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class=" col-xl-3 col-lg-2 col-sm-6">
                                <div class="single-footer pb--40">
                                    <div class="footer-title">
                                        <h3 style="color:white;">Extras</h3>
                                    </div>
                                    <ul class="footer-list normal-list">
                                        <li><a href="{{route('index')}}">About Us</a></li>
                                        <li><a href="{{route('index')}}">Stores</a></li>
                                        <li><a href="{{route('contact.index')}}">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class=" col-xl-3 col-lg-4 col-sm-6">
                                <div class="social-block">
                                    <h3 class="title" style="color:white;">STAY CONNECTED</h3>
                                    <ul class="social-list list-inline">
                                        <li class="single-social facebook"><a href="https://www.facebook.com/bookhorizon/"><i class="ion ion-social-facebook"></i></a></li>
                                        <li class="single-social google"><a href="https://www.instagram.com/bookhorizon/?hl=en"><i class="ion ion-social-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <p class="copyright-text">Copyright © {{ date("Y") }} <a href="#" class="author">BookHorizonLibary</a>. All Right Reserved. <br> Design By BookHorizonLibary</p>
                            </div>
                        </div>
                        <!-- <p class="copyright-heading">Copyright : </p>
                        <a href="#" class="payment-block">
                            <img src="{{ asset('frontend/image/icon/payment.png') }}" alt="">
                        </a> -->
                    </div>
                </div>
            </footer>