@extends('layouts.web')

@section('title', 'Stockmate | Inventory')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Inventory</h1>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <button class="btn btn-success" data-toggle="modal" data-target="#addProduct">Add Product</button>

        <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('inventory.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="productName">Product Name</label>
                                <input type="text" class="form-control" name="productName" required>
                            </div>
                            <div class="form-group">
                                <label for="productName">Product SKU</label>
                                <input type="text" class="form-control" name="productSKU">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="inventory" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product SKU</th>
                        <th>Product Name</th>
                        <th>Total Qty</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->product_id}}</td>
                        <td>{{$product->product_sku}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->product_qty ? : 0}}</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editProduct{{$product->product_id}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>

                            <div class="modal fade" id="editProduct{{$product->product_id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('inventory.update', $product->product_id)}}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="productName">Product Name</label>
                                                    <input type="text" class="form-control" name="productName" value="{{$product->product_name}}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="productName">Product SKU</label>
                                                    <input type="text" class="form-control" name="productSKU" value="{{$product->product_sku}}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="productName">Product Quantity</label>
                                                    <input type="text" class="form-control" name="productQuantity" value="{{$product->product_qty ? : 0}}" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Update Product</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

{{--                            <form method="POST" style="display:inline;" action="{{route('inventory.destroy', $product->product_id)}}">--}}
{{--                                {{ method_field('DELETE') }}--}}
{{--                                {{ csrf_field() }}--}}
{{--                                <button onclick="return confirm('Are you sure to delete product \'{{$product->product_name}}\'?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>--}}
{{--                            </form>--}}
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
