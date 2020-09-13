
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
                            <img src="{{ asset('frontend/image/others/brand-1.jpg') }}" alt="">
                        </div>
                        <div class="single-slide">
                            <img src="{{ asset('frontend/image/others/brand-2.jpg') }}" alt="">
                        </div>
                        <div class="single-slide">
                            <img src="{{ asset('frontend/image/others/brand-3.jpg') }}" alt="">
                        </div>
                        <div class="single-slide">
                            <img src="{{ asset('frontend/image/others/brand-4.jpg') }}" alt="">
                        </div>
                        <div class="single-slide">
                            <img src="{{ asset('frontend/image/others/brand-5.jpg') }}" alt="">
                        </div>
                        <div class="single-slide">
                            <img src="{{ asset('frontend/image/others/brand-6.jpg') }}" alt="">
                        </div>
                        <div class="single-slide">
                            <img src="{{ asset('frontend/image/others/brand-1.jpg') }}" alt="">
                        </div>
                        <div class="single-slide">
                            <img src="{{ asset('frontend/image/others/brand-2.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </section>
            <!--================================= Footer Area ===================================== -->
            <footer class="site-footer">
                <div class="container">
                    <div class="row justify-content-between  section-padding">
                        <div class=" col-xl-3 col-lg-4 col-sm-6">
                            <div class="single-footer pb--40">
                                <div class="brand-footer footer-title">
                                    <img src="{{ asset('frontend/image/logo--footer.png') }}" alt="">
                                </div>
                                <div class="footer-contact">
                                    <p><span class="label">Address:</span><span class="text">Tunas 2 Blok A No. 2, Batam</span></p>
                                    <p><span class="label">Phone:</span><span class="text">0813 8908 4342</span></p>
                                    <p><span class="label">Email:</span><span class="text">admin@bookhorizonlibrary.com</span></p>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-3 col-lg-2 col-sm-6">
                            <div class="single-footer pb--40">
                                <div class="footer-title">
                                    <h3>Information</h3>
                                </div>
                                <ul class="footer-list normal-list">
                                    <li><a href="">Prices drop</a></li>
                                    <li><a href="">New products</a></li>
                                    <li><a href="">Best sales</a></li>
                                    <li><a href="">Contact us</a></li>
                                    <li><a href="">Sitemap</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=" col-xl-3 col-lg-2 col-sm-6">
                            <div class="single-footer pb--40">
                                <div class="footer-title">
                                    <h3>Extras</h3>
                                </div>
                                <ul class="footer-list normal-list">
                                    <li><a href="">Delivery</a></li>
                                    <li><a href="">About Us</a></li>
                                    <li><a href="">Stores</a></li>
                                    <li><a href="">Contact us</a></li>
                                    <li><a href="">Sitemap</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=" col-xl-3 col-lg-4 col-sm-6">
                            <div class="footer-title">
                                <h3>Newsletter Subscribe</h3>
                            </div>
                            <div class="newsletter-form mb--30">
                                <input id="subcribeEmail" type="email" class="form-control" placeholder="Enter Your Email Address Here...">
                                <button onclick="subcribeEmail()" class="btn btn--primary w-100">Subscribe</button>
                            </div>
                            <div class="social-block">
                                <h3 class="title">STAY CONNECTED</h3>
                                <ul class="social-list list-inline">
                                    <li class="single-social facebook"><a href=""><i class="ion ion-social-facebook"></i></a></li>
                                    <li class="single-social twitter"><a href=""><i class="ion ion-social-twitter"></i></a></li>
                                    <li class="single-social google"><a href=""><i class="ion ion-social-googleplus-outline"></i></a></li>
                                    <li class="single-social youtube"><a href=""><i class="ion ion-social-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <p class="copyright-heading">Suspendisse in auctor augue. Cras fermentum est ac fermentum tempor. Etiam
                            vel
                            magna volutpat, posuere eros</p>
                        <a href="#" class="payment-block">
                            <img src="{{ asset('frontend/image/icon/payment.png') }}" alt="">
                        </a>
                        <p class="copyright-text">Copyright © {{ date("Y") }} <a href="#" class="author">PrimeXovers</a>. All Right Reserved.
                            <br>
                            Design By PrimeXovers</p>
                    </div>
                </div>
            </footer>