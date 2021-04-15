@extends('layouts.web')

@section('title', 'Stockmate | Dashboard')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="btn btn-sm btn-primary shadow-sm mobile-mt-10"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Month Transaction
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total}} Transactions</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-exchange-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Inbound
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$inbound}} Transactions</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-box-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Outbound
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$outbound}} Transactions</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-dolly fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <hr style="margin-top: -5px">

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12 mb-4">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Recent Transaction and Merchant Activities</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="transactions" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Transaction ID</th>
                                        <th>Transaction Date</th>
                                        <th>Merchant</th>
                                        <th>Handler</th>
                                        <th>Type</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions->take(10) as $transaction)
                                    <tr>
                                        <td>{{$transaction->transaction_id}}</td>
                                        <td>{{$transaction->created_at}}</td>
                                        <td>{{$transaction->Merchant->merchant_name}}</td>
                                        <td>{{$transaction->Staff->staff_name}}</td>
                                        <td>{{$transaction->status == 0 ? 'Outbound' : 'Inbound'}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('additional-js')
    <script>
        $(document).ready(function () {
            $('#transactions').DataTable({
                responsive: true,
                ordering: true,
                searching: false,
                paging: false,
                bInfo: true
            });
        });
    </script>
@endsection
