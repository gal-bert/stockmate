@extends('layouts.web')

@section('title', 'Stockmate | Merchants')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Merchant List</h1>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <button class="btn btn-success" data-toggle="modal" data-target="#addMerchant">Add Merchant</button>

        <div class="modal fade" id="addMerchant" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Merchant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('merchants.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="merchantName">Merchant Name</label>
                                <input type="text" class="form-control" name="merchantName" required>
                            </div>
                            <div class="form-group">
                                <label for="merchantName">Merchant Address</label>
                                <input type="text" class="form-control" name="merchantAddress">
                            </div>
                            <div class="form-group">
                                <label for="merchantName">Merchant Contact</label>
                                <input type="text" class="form-control" name="merchantContact">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Add Merchant</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="merchants" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Merchant ID</th>
                        <th>Merchant Name</th>
                        <th>Merchant Address</th>
                        <th>Merchant Contact</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($merchants as $merchant)
                    <tr>
                        <td>{{$merchant->merchant_id}}</td>
                        <td>{{$merchant->merchant_name}}</td>
                        <td>{{$merchant->merchant_address}}</td>
                        <td>{{$merchant->merchant_contact}}</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editMerchant{{$merchant->merchant_id}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>

                            <div class="modal fade" id="editMerchant{{$merchant->merchant_id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Merchant</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('merchants.update', $merchant->merchant_id)}}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="merchantName">Merchant Name</label>
                                                    <input type="text" class="form-control" name="merchantName" value="{{$merchant->merchant_name}}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="merchantName">Merchant Address</label>
                                                    <input type="text" class="form-control" name="merchantAddress" value="{{$merchant->merchant_address}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="merchantName">Merchant Contact</label>
                                                    <input type="text" class="form-control" name="merchantContact" value="{{$merchant->merchant_contact}}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Update Merchant</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <form method="POST" style="display:inline;" action="{{route('merchants.destroy', $merchant->merchant_id)}}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button onclick="return confirm('Are you sure to delete merchant \'{{$merchant->merchant_name}}\'?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                            </form>
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
            $('#merchants').DataTable({
                ordering: true,
                searching: true,
                paging: true
            });
        });
    </script>
@endsection
