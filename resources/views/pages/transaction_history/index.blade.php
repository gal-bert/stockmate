@extends('layouts.web')

@section('title', 'Stockmate | Transaction History')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Transaction History</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="transactions" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Transaction Date</th>
                            <th>Transaction Type</th>
                            <th>Handler</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($headers as $header)
                        <tr>
                            <td>{{$header->transaction_id}}</td>
                            <td>{{$header->created_at}}</td>
                            <td>{{$header->status == 1 ? 'Inbound' : 'Outbound'}}</td>
                            <td>{{$header->Staff->staff_name}}</td>
                            <td>
                                <a href="{{route('transactions.show', $header->transaction_id)}}" class="btn btn-warning btn-xs"><i class="fa fa-list"></i></a>
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
            $('#transactions').DataTable({
                ordering: true,
                searching: true,
                paging: true
            });
        });
    </script>
@endsection
