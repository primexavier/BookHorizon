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
                    <li>Order Number: <strong>{{$transaction->no}}</strong></li>
                    <li>Date: <strong>{{$transaction->created_at}}</strong></li>
                    <li>Total: <strong>$117.00</strong></li>
                    <li>Payment Method: <strong>{{$transaction->paymeny_type}}</strong></li>
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
                            @foreach($books as $book)
                            <tr>
                                <td><a href="{{route('book.detail',$book->id)}}">{{$book->title}}</a> <strong>1</strong></td>
                                <td><span>{{$book->price}}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Subtotal:</th>
                                <td><span>$117.00</span></td>
                            </tr>
                            <tr>
                                <th>Payment Method:</th>
                                <td>Cash on Delivery</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td><span>$117.00</span></td>
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