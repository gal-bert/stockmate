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
                            <th>No.</th>
                            <th>Transaction ID</th>
                            <th>Transaction Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    {{--@foreach()--}}
                        <tr>
                            <td>1</td>
                            <td>HPX001923</td>
                            <td>11-04-2021</td>
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
            $('#transactions').DataTable({
                ordering: true,
                searching: true,
                paging: true
            });
        });
    </script>
@endsection
