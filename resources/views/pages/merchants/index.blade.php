@extends('layouts.web')

@section('title', 'Stockmate | Merchants')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Merchant List</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="merchants" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Merchant ID</th>
                        <th>Merchant Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--@foreach()--}}
                    <tr>
                        <td>1</td>
                        <td>MCT0001</td>
                        <td>PT. Matahari Bersama</td>
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
            $('#merchants').DataTable({
                ordering: true,
                searching: true,
                paging: true
            });
        });
    </script>
@endsection
