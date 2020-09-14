@extends('frontend.layouts.app')

@section('content')
            <!--================================= Hero Area ===================================== -->
            <section class="hero-area hero-slider-4 ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            Bank Account <br><br><br><br>
                            @foreach($banks as $bank)
                                {{$bonk->id}}
                                {{$bonk->name}}
                                {{$bonk->no}}
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
@endsection
