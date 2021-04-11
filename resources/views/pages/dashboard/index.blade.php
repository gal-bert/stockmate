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
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Valuation
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 154.400.000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Month Transaction
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">127 Transactions</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-exchange-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Expiring in 3 month
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">220 Items</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-hourglass fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Expiring in 1 month
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">12 Items</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-exclamation-triangle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr style="margin-top: -5px">

    <!-- Content Row -->
    <div class="row">

        <div class="col-lg-6 mb-4">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Recent Transaction</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="transactions" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Transaction ID</th>
                                        <th>Transaction Date</th>
                                        <th>Transaction Type</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--@foreach()--}}
                                    <tr>
                                        <td>HPX001923</td>
                                        <td>11-04-2021 / 13.50</td>
                                        <td>Inbound</td>
                                    </tr>
                                    {{--@endforeach--}}
                                    <tr>
                                        <td>HPX001923</td>
                                        <td>11-04-2021 / 13.50</td>
                                        <td>Inbound</td>
                                    </tr>
                                    <tr>
                                        <td>HPX001923</td>
                                        <td>11-04-2021 / 13.50</td>
                                        <td>Inbound</td>
                                    </tr>
                                    <tr>
                                        <td>HPX001923</td>
                                        <td>11-04-2021 / 13.50</td>
                                        <td>Inbound</td>
                                    </tr>
                                    <tr>
                                        <td>HPX001923</td>
                                        <td>11-04-2021 / 13.50</td>
                                        <td>Inbound</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Merchant Activities</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="activities" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Merchant Name</th>
                                        <th>Transactions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--@foreach()--}}
                                    <tr>
                                        <td>PT. Krama Yudha Berlian Motor</td>
                                        <td>54</td>
                                    </tr>
                                    {{--@endforeach--}}
                                    <tr>
                                        <td>PT. Krama Yudha Berlian Motor</td>
                                        <td>54</td>
                                    </tr>
                                    <tr>
                                        <td>PT. Krama Yudha Berlian Motor</td>
                                        <td>54</td>
                                    </tr>
                                    <tr>
                                        <td>PT. Krama Yudha Berlian Motor</td>
                                        <td>54</td>
                                    </tr>
                                    <tr>
                                        <td>PT. Krama Yudha Berlian Motor</td>
                                        <td>54</td>
                                    </tr>
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
                ordering: false,
                searching: false,
                paging: false,
                bInfo: false
            });
        });
        $(document).ready(function () {
            $('#activities').DataTable({
                responsive: true,
                ordering: false,
                searching: false,
                paging: false,
                bInfo: false
            });
        });
    </script>
@endsection
