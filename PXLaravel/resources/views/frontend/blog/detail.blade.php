@extends('frontend.layouts.app')

@section('content')
        <section class="breadcrumb-section">
            <h2 class="sr-only">Site Breadcrumb</h2>
            <div class="container">
                <div class="breadcrumb-contents">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Blog Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <section class="inner-page-sec-padding-bottom">
            <div class="container">
                <div class="blog-post post-details mb--50">
                    <div class="blog-image">
                        <img src="{{ asset('frontend/image/blog') }}/{{$blog->photo}}" alt="">
                    </div>
                    <div class="blog-content mt--30">
                        <header>
                            <h3 class="blog-title"> {{$blog->title}}</h3>
                            <div class="post-meta">
                                <span class="post-author">
                                    <i class="fas fa-user"></i>
                                    <span class="text-gray">Posted by : </span>
                                    admin
                                </span>
                                <span class="post-separator">|</span>
                                <span class="post-date">
                                    <i class="far fa-calendar-alt"></i>
                                    <span class="text-gray">On : </span>
                                    March 10, 2015
                                </span>
                            </div>
                        </header>
                        <article>
                            <h3 class="d-none sr-only">blob-article</h3>
                            <p class="p-0">{{$blog->content}}</p>
                            <blockquote>
                                <p>{{$blog->content}}</p>
                            </blockquote>
                            <p>{{$blog->content}}</p>
                            <p>{{$blog->content}}</p>
                        </article>
                        <!-- <footer class="blog-meta">
                            <div> <a href="#">3 comments </a> / TAGS: <a href="#">fashion</a>, <a href="#">t-shirt</a>,
                                <a href="#">white</a></div>
                        </footer> -->
                    </div>
                </div>
                <div class="share-block mb--50">
                    <h3>Share Now</h3>
                    <div class="social-links  justify-content-center  mt--10">
                        <a href="#" class="single-social social-rounded"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="single-social social-rounded"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="single-social social-rounded"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#" class="single-social social-rounded"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="single-social social-rounded"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <!-- <div class="comment-block-wrapper mb--50">
                    <h3>3 Comments</h3>
                    <div class="single-comment">
                        <div class="comment-avatar">
                            <img src="image/icon/author-logo.png" alt="">
                        </div>
                        <div class="comment-text">
                            <h5 class="author"> <a href="#"> Author</a></h5>
                            <span class="time">October 8, 2014 at 12:38 pm</span>
                            <p>Ame No Parade</p>
                        </div>
                        <a href="#" class="btn btn-outlined--primary btn-rounded reply-btn">Reply</a>
                    </div>
                    <div class="single-comment">
                        <div class="comment-avatar">
                            <img src="image/icon/author-logo.png" alt="">
                        </div>
                        <div class="comment-text">
                            <h5 class="author"> <a href="#">Jack</a></h5>
                            <span class="time">January 19, 2018 at 3:00 am</span>
                            <p>just a nice post</p>
                        </div>
                        <a href="#" class="btn btn-outlined--primary btn-rounded reply-btn">Reply</a>
                    </div>
                    <div class="single-comment">
                        <div class="comment-avatar">
                            <img src="image/icon/author-logo.png" alt="">
                        </div>
                        <div class="comment-text">
                            <h5 class="author"> <a href="#">Dexter</a></h5>
                            <span class="time">august 31, 2021 at 3:30 am</span>
                            <p>Awesome Post </p>
                        </div>
                        <a href="#" class="btn btn-outlined--primary btn-rounded reply-btn">Reply</a>
                    </div>
                </div> -->
                <!-- <div class="replay-form-wrapper">
                    <h3 class="mt-0">LEAVE A REPLY</h3>
                    <p>Your email address will not be published. Required fields are marked *</p>
                    <form action="./" class="blog-form">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="message">Comment</label>
                                    <textarea name="message" id="message" cols="30" rows="10"
                                        class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-4">
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
                            </div>
                            <div class="col-lg-4">
                                <div class="submit-btn">
                                    <a href="#" class="btn btn-black">Post Comment</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> -->
            </div>
        </section>
@endsection