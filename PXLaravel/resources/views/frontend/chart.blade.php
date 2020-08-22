@extends('frontend.layouts.app')

@section('content')
<div class="site-wrapper" id="top">
    <div class="page-section inner-page-sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-12 col-12 mt--30 mt-lg--0">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <form action="{{route('checkout')}}" medhod="post">
                                    <div class="tab-pane fade show active" id="download" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Chart</h3>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Book</th>
                                                            <th>Quantity</th>
                                                            <th>Rent / Buy</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if(count($charts) > 0)
                                                        @foreach($charts as $chart)
                                                        <tr>
                                                            <td>{!!chunk_split($chart->book()->title, 40, "<br>")!!}
                                                            </td>
                                                            <input type="hidden" name="bookId[]"
                                                                value="{{$chart->book_id}}">
                                                            <td>
                                                                <div class="form-group">
                                                                    <select name="quantityTransaction[]"
                                                                        class="form-control"
                                                                        id="quantityTransaction">
                                                                        <option>1</option>
                                                                        <option>2</option>
                                                                        <option>3</option>
                                                                        <option>4</option>
                                                                        <option>5</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <select name="typeTransaction[]" class="form-control"
                                                                        id="typeTransaction">
                                                                        <option>Rent</option>
                                                                        <option>Buy</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                            <td>Rp {{$chart->total()}}</td>
                                                            <input type="hidden" name="book-id"
                                                                value="{{$chart->total()}}">
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <tr>
                                                            <td colspan=4>Data Chart kosong!</td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="d-flex flex-row-reverse">
                                                <button type="submit" class="btn btn--primary"><i
                                                        class="fa fa-money"></i>Pay!</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- Single Tab Content End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
