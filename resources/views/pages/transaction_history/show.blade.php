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
                        <th>Product Expiry Date</th>
{{--                        <th>Action</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($expiries as $expiry)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$expiry->Product->product_name}}</td>
                            <td>{{$expiry->product_qty}}</td>
                            <td>{{$expiry->expiry_date}}</td>
{{--                            <td>--}}
{{--                                <a href="#" data-toggle="modal" data-target="#editProduct{{$expiry->expiry_date_id}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>--}}

{{--                                <div class="modal fade" id="editProduct{{$expiry->expiry_date_id}}" tabindex="-1" role="dialog" aria-hidden="true">--}}
{{--                                    <div class="modal-dialog" role="document">--}}
{{--                                        <div class="modal-content">--}}
{{--                                            <div class="modal-header">--}}
{{--                                                <h5 class="modal-title" id="exampleModalLabel">Adjust Quantity</h5>--}}
{{--                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                    <span aria-hidden="true">&times;</span>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                            <form action="{{route('inventory.updateQty', [$product->product_id, $expiry->expiry_date_id] )}}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                @method('put')--}}
{{--                                                <div class="modal-body">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label for="productName">Product Qty</label>--}}
{{--                                                        <input type="text" class="form-control" name="productQuantity" value="{{$expiry->product_qty}}" required>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="modal-footer">--}}
{{--                                                    <button type="submit" class="btn btn-primary">Update Quantity</button>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
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

