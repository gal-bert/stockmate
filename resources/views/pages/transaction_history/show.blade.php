@extends('layouts.web')

@section('title', 'Transaction Detail')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Detail of - {{$header->transaction_id}} on {{$header->created_at}}</h1>
    <hr>
    <h3 class="text-gray-800 mb-4">Merchant: {{$header->Merchant->merchant_name}}</h3>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="product" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Product Name</th>
                        <th>Product Qty</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($details as $detail)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$detail->Product->product_name}}</td>
                                <td>{{$detail->product_qty}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
@section('additional-js')
    <script>
        $(document).ready(function() {
            $('#product').DataTable({
                ordering: true,
                searching: true,
                paging: true
            });
        });
    </script>
@endsection

