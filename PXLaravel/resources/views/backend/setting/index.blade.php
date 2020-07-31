@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Setting Index</div>
                <div class="card-body">
                <form method="POST" action="{{route('backend.setting.update')}}">
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <input type="checkbox" name="mtmode" id="mtmode">
                                <label class="form-check-label" for="mtmode" >Maintenance Mode</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
@endpush