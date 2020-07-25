@extends('backend.layouts.app')

@push('scripts')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Book Create</div>
                <form method="POST" action="{{route('backend.book.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">       
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Photo</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1" accept="image/x-png,image/gif,image/jpeg">
                                        </div>    
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" placeholder="Book Email">
                                        </div>              
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="isbn">ISBN</label>
                                            <input type="text" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="product_code">Product Code</label>
                                            <input type="text" class="form-control" placeholder="Product Code">
                                        </div>
                                        <div class="form-group">
                                            <label for="isbn">Pages</label>
                                            <input type="text" class="form-control" placeholder="Pages">
                                        </div>
                                        <div class="form-group">
                                            <label for="isbn">Dimension</label>
                                            <input type="text" class="form-control" placeholder="Dimension">
                                        </div>
                                        <div class="form-group">
                                            <label for="isbn">Weight</label>
                                            <input type="text" class="form-control" placeholder="Weight">
                                        </div>
                                        <div class="form-group">
                                            <label for="isbn">Vendor</label>
                                            <input type="text" class="form-control" placeholder="Vendor">
                                        </div>                            
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="publication City">Publication City</label>
                                            <input type="text" class="form-control" placeholder="Publication City">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Format</label>
                                            <input type="text" class="form-control" placeholder="Format">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Purchase Price</label>
                                            <input type="text" class="form-control" placeholder="Purchase Price">
                                        </div>    
                                        <div class="form-group">
                                            <label for="">Start Qty</label>
                                            <input type="text" class="form-control" placeholder="Start Qty">
                                        </div>       
                                        <div class="form-group">
                                            <label for="">Price</label>
                                            <input type="text" class="form-control" placeholder="Price">
                                        </div>       
                                        <div class="form-group">
                                            <label for="">Purchase Date</label>
                                            <input type="date" class="form-control" placeholder="Purchase Date">
                                        </div>        
                                    </div>
                                    <div class="col-md-12">        
                                        <div class="form-group">
                                            <label for="title">Description</label>
                                            <input type="text" class="form-control" placeholder="Book Email">
                                        </div>              
                                    </div>           
                                </div>        
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
