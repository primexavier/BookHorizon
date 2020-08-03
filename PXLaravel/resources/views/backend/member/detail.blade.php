@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Detail Index</div>

                <div class="card-body">
                    Name : {{$member->name}}<br>
                    Email : {{$member->email}}<br>
                    Status : {{$member->email}}<br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
@endpush
