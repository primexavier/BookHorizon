@extends('backend.layouts.app')

@section('headScripts')
<style>
    .progressbar {
      counter-reset: step !important;
  }
  .progressbar li {
      list-style-type: none !important;
      width: 25% !important;
      float: left !important;
      font-size: 12px !important;
      position: relative !important;
      text-align: center !important;
      text-transform: uppercase !important;
      color: #7d7d7d !important;
  }
  .progressbar li:before {
      width: 30px !important;
      height: 30px !important;
      content: counter(step) !important;
      counter-increment: step !important;
      line-height: 30px !important;
      border: 2px solid #7d7d7d !important;
      display: block !important;
      text-align: center !important;
      margin: 0 auto 10px auto !important;
      border-radius: 50% !important;
      background-color: white !important;
  }
  .progressbar li:after {
      width: 100% !important;
      height: 2px !important;
      content: '' !important;
      position: absolute !important;
      background-color: #7d7d7d !important;
      top: 15px !important;
      left: -50% !important;
      z-index: -1 !important;
  }
  .progressbar li:first-child:after {
      content: none !important;
  }
  .progressbar li.active {
      color: green !important;
  }
  .progressbar li.active:before {
      border-color: #55b776 !important;
  }
  .progressbar li.active + li:after {
      background-color: #55b776 !important;
  }
</style>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Transaction Detail</div>
                <?php 
                
                $transactionStatus = false;
                $waitingPayment = false;
                $paymentApprove = false;
                $paymentShipping = false;
                $finishPayment = false;
                $waitingApprove = false;

                if($transaction->status == 1 
                || $transaction->status == 0 
                || !$transaction->status){
                    $waitingPayment = true;
                }

                if($transaction->status == 2){
                    $waitingApprove = true;
                }

                if($transaction->status == 4){
                    $paymentApprove = true;
                }

                if( Carbon\Carbon::now() > $transaction->created_at->addDays(1) 
                && ($transaction->status == 0 
                || $transaction->status == 1
                || $transaction->status == 2
                || $transaction->status == 3)){
                    $transactionStatus = true;
                    $waitingPayment = false;
                }
                ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            No Transaction : {{$transaction->id}} <br>
                            Date : {{$transaction->created_at}} <br>
                            Total : Rp {{$transaction->grand_total}}<br><br>
                            Status :  
                            <button type="button" class="btn <?php if($waitingPayment ){ ?> btn-success <?php } ?>">Waiting Payment</button>
                            <button type="button" class="btn <?php if($waitingApprove ){ ?> btn-success <?php } ?>">Waiting Approve</button>
                            <button type="button" class="btn <?php if($paymentApprove ){ ?> btn-success <?php } ?>">Reupload Receipt</button>
                            <button type="button" class="btn <?php if($paymentApprove ){ ?> btn-success <?php } ?>">Payment Approve</button>
                            <button type="button" class="btn <?php if($paymentShipping ){ ?> btn-success <?php } ?>">Shipping</button>
                            <button type="button" class="btn <?php if($finishPayment ){ ?> btn-success <?php } ?>">Finish</button>
                            <button type="button" class="btn <?php if($transactionStatus ){ ?> btn-danger <?php } ?>">Expired</button><br><br>
                        </div>
                        <div class="col-md-6">
                            Receipt : 
                            <br>
                            @if($bill->photo)
                            <img src="{{asset('storage/'.$bill->photo)}}" width="300px" height="300px">
                            @else
                            Receipt Not Uploaded yet
                            @endif
                        </div>
                        <div class="col-md-12">                    
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no = 0; ?>
                                    @foreach($transactionBook as $book)
                                    <?php $no++; ?>
                                    <tr>
                                        <th scope="row">{{$no}}</th>
                                        <td>{{$book->book()->title}}</td>
                                        <td>Rp {{$book->price}}</td>
                                    </tr>
                                    @endforeach
                                    @foreach($transactionMember as $membership)
                                    <?php $no++; ?>
                                    <tr>
                                        <th scope="row">{{$no}}</th>
                                        <td>{{$membership->membership()->name}}</td>
                                        <td>Rp {{$membership->transaction()->grand_total}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th scope="row" colspan="2">Shipment</th>
                                        <td>Rp <?php if($transaction->shipping_cost) {echo $transaction->shipping_cost; }else{ echo '0'; } ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="2">Total</th>
                                        <td>Rp {{$transaction->grand_total}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            @if(!$transactionStatus)
                            Transaction Action : <br>
                            <button onclick="alert('approve Payment')" type="button" class="btn btn-success">Approve</button>
                            <button  onclick="alert('Cancel Payment')"  type="button" class="btn btn-danger">Cancel</button>
                            <button  onclick="alert('Decline Payment')"  type="button" class="btn btn-info">Decline Receipt</button>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
@endpush