@extends('frontend.layouts.app')

@section('content')
    <section class="breadcrumb-section">
      <h2 class="sr-only">Site Breadcrumb</h2>
      <div class="container">
        <div class="breadcrumb-contents">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Blog</li>
            </ol>
          </nav>
        </div>
      </div>
    </section>
    <section class="inner-page-sec-padding-bottom space-db--30">
      <div class="container">
        <div class="row space-db-lg--60 space-db--30">
          @forelse ($blogList as $blog)
            <div class="col-lg-4 col-md-6 mb-lg--60 mb--30">
              <div class="blog-card card-style-grid">
                <a href="{{ route('blog.detail',$blog->id) }}" class="image d-block">                                                                                                                                                                                                      
                  @if ($blog->photo)
                    <img src="{{ asset('frontend/image/blog') }}/{{$blog->photo}}" alt="">
                  @endif
                </a>
                <div class="card-content">
                  <h3 class="title"><a href="{{ route('blog.detail',$blog->id) }}/">{{ \Illuminate\Support\Str::limit($blog->title, 40, $end='...')}}</a></h3>
                <p class="post-meta"><span>{{$blog->created_at}} </span> | <a href="#">{{$blog->users()}}</a></p>
                  <article>
                    <h2 class="sr-only">
                      Blog Article
                    </h2>
                    <p>{{ \Illuminate\Support\Str::limit($blog->content, 70, $end='...')}}</p>
                    <a href="{{ route('blog.detail',$blog->id) }}" class="blog-link">Read More</a>
                  </article>
                </div>
              </div>
            </div>
          @empty
            <p>There is No Blog!</p>
          @endforelse
        </div>
      </div>
    </section>
@endsection
