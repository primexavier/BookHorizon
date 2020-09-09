@extends('frontend.layouts.app')

@section('content')
            <!--================================= Hero Area ===================================== -->
            <section class="hero-area hero-slider-4 ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            @foreach($banks as $bank)

                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
@endsection
