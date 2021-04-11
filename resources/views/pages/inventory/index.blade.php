@extends('layouts.web')

@section('title', 'Stockmate | Inventory')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Inventory</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="inventory" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Qty</th>
                        <th>Expiry Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--@foreach()--}}
                    <tr>
                        <td>1</td>
                        <td>CTT1234</td>
                        <td>Chitato BBQ</td>
                        <td>11-04-2021</td>
                        <td>200</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-list"></i></a>
                        </td>
                    </tr>
                    {{--@endforeach--}}
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
