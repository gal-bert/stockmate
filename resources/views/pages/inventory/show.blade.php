@extends('layouts.web')

@section('title', 'Product Detail')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Detail of - {{$product->product_sku}} / {{$product->product_name}}</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="inventory" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Product Expiry Date</th>
                        <th>Product Qty</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($product->Expiry as $expiry)
                            <tr>
                                <td>{{$expiry->expiry_date}}</td>
                                <td>{{$expiry->product_qty}}</td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#editProduct{{$expiry->expiry_date_id}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>

                                    <div class="modal fade" id="editProduct{{$expiry->expiry_date_id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Adjust Quantity</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{route('inventory.updateQty', [$product->product_id, $expiry->expiry_date_id] )}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="productName">Product Qty</label>
                                                            <input type="text" class="form-control" name="productQuantity" value="{{$expiry->product_qty}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Update Quantity</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
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
            $('#inventory').DataTable({
                ordering: true,
                searching: true,
                paging: true
            });
        });
    </script>
@endsection
