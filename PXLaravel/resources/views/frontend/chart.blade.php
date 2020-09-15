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
                                    <div class="tab-pane fade show active" id="download" role="tabpanel">
                                        <div class="myaccount-content">
                                            <form method="post" action="{{route('checkout')}}">
                                            @csrf
                                            <h3>Chart</h3>
                                                @if(count($charts) > 0)
                                                    <div class="alert alert-danger" role="alert">
                                                        <h4 class="alert-heading">Membership</h4>
                                                        <p>Only Member can Rent!</p>
                                                    </div>
                                                @endif
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Action</th>
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
												            <td class="pro-remove">
                                                                <a href="{{route('chart.delete',$chart->id)}}" style="cursor:pointer">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </a>
                                                            </td>
                                                            <td>{!!chunk_split($chart->book()->title, 40, "<br>")!!}
                                                            </td>
                                                            <input type="hidden" name="bookId[{{$chart->id}}]" value="{{$chart->book_id}}">
                                                            <input type="hidden" name="charId[{{$chart->id}}]" value="{{$chart->id}}">
                                                            <td>
                                                                <div class="form-group">
                                                                    <select name="quantityTransaction[{{$chart->id}}]"
                                                                        class="form-control"
                                                                        id="quantityTransaction{{$chart->id}}">
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
                                                                    <select name="typeTransaction[{{$chart->id}}]" onchange="TransactionTypeChange(this.value,{{$chart->id}})" class="form-control" id="typeTransaction{{$chart->id}}">
                                                                        @foreach($transactionTypes as $transactionType)
                                                                            <option value="{{$transactionType->id}}">{{$transactionType->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </td>
                                                            <td>Rp <span id="totalPrice{{$chart->id}}">{{$chart->total()}}</span></td>
                                                            <input type="hidden" id="initialPrice{{$chart->id}}" name="initialPrice[{{$chart->id}}]" value="{{$chart->total()}}">
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <tr>
                                                            <td colspan=5>Data Chart kosong!</td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                            @if(count($charts) > 0)
                                                <div class="d-flex flex-row-reverse">
                                                    <button type="submit" class="btn btn--primary"><i class="fa fa-money"></i>Pay!</a>
                                                </div>
                                            @endif
                                            </form>
                                        </div>
                                    </div>
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
