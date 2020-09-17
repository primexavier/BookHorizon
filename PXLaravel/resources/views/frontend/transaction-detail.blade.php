@extends('frontend.layouts.app')

@section('content')
<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Order Complete</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- order complete Page Start -->
<section class="order-complete inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="order-complete-message text-center">
                    <h1>Thank you !</h1>
                    <p>Your order has been received.</p>
                </div>
                <ul class="order-details-list">
                    <li>Order Number: <strong>{{$transaction->id}}</strong></li>
                    <li>Date: <strong>{{$transaction->created_at}}</strong></li>
                    <li>Status: <strong>Waiting Payment</strong></li>
                    <li>Total: <strong>Rp {{$transaction->grand_total}}</strong></li>
                    <li>Payment Method: <strong> Bank Transfer {{$transaction->transaction_type_id}}</strong></li>
                </ul>
                <p>Pay with cash upon delivery.</p>
                <h3 class="order-table-title">Order Details</h3>
                <div class="table-responsive">
                    <table class="table order-details-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($transactionBooks)
                                @foreach($transactionBooks as $transactionBook)
                                <tr>
                                    <td>
                                        <a href="{{route('book.detail',$transactionBook->book_id)}}">{{$transactionBook->book()->title}}</a> 
                                        <strong> 
                                            @if($transactionBook->transaction_type_id != 1)
                                                ({{$transactionBook->transactionType()->name}} {{$transactionBook->duration}} Days)
                                            @else
                                                {{$transactionBook->transactionType()->name}}
                                            @endif 
                                        </strong>
                                    </td>
                                    <td><span>{{$transactionBook->price}}</span></td>
                                </tr>
                                @endforeach
                            @endif
                            @if($transactionMemberships)
                                @foreach($transactionMemberships as $membeship)
                                <tr>
                                    <td><a href="#">{{$membeship->name}}</a> <strong>{{$transactionMembership[0]->transaction_type_id}}</strong></td>
                                    <td><span>{{$membeship->price}}</span></td>
                                </tr>
                                @endforeach

                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Subtotal:</th>
                                <td><span>Rp {{$transaction->sub_total}}</span></td>
                            </tr>
                            <tr>
                                <th>Payment Method:</th>
                                <td>{{$transaction->payment_method_id}} Bank Transfer </td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td><span>Rp {{$transaction->grand_total}}</span></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- order complete Page End -->
@endsection