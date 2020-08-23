@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Book Detail</div>
                <div class="card-body">
                    @if ($book->photo)
						<div class="single-slide">
							<img src="{{ asset('frontend/image/book') }}/{{$book->photo}}" width="150px" alt="">
						</div>
					@else
						<div class="single-slide">
							<img src="{{ asset('frontend/image/book') }}/empty.jpg" alt="" width="150px">
						</div>
					@endif
                    </br>
                    Name : {{$book->title}} </br>
                    ISBN : {{$book->isbn}} </br>
                    Publication City : {{$book->publication_city}} </br>
                    Format : {{$book->format}} </br>
                    pages : {{$book->pages}} </br>
                    weight : {{$book->weight}} </br>
                    dimension : {{$book->dimension}} </br>
                    purchase_price : {{$book->purchase_price}} </br>
                    price : {{$book->price}} </br>
                    start_qty : {{$book->start_qty}} </br>
                    purchase_date : {{$book->purchase_date}} </br>
                    vendor : {{$book->vendor}} </br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
@endpush