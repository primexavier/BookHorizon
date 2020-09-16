@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Transaction Detail</div>

                <div class="card-body">
                    No Transaction : {{$transaction->id}} <br>
                    Total : Rp {{$transaction->grand_total}}<br>
                    Status : <br>
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
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
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
                                <td>Rp <?php if($membership->transaction()->shipping_cost) {echo $membership->transaction()->shipping_cost; }else{ echo '0'; } ?></td>
                            </tr>
                            <tr>
                                <th scope="row" colspan="2">Total</th>
                                <td>Rp {{$membership->transaction()->grand_total}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
@endpush