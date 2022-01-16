<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion extra-toggle" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('index')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Stockmate</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{(request()->segment(1)) == '' ? 'active' : ''}}">
        <a class="nav-link" href="{{route('index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Actions
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{request()->is('inbound*') || request()->is('outbound*') ? 'active' : ''}}">
        <a class="nav-link {{request()->is('inbound*') || request()->is('outbound*') ? '' : 'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="{{request()->is('inbound*') || request()->is('outbound*') ? 'false' : 'true'}}" aria-controls="collapseTwo">
            <i class="fas fa-exchange-alt"></i>
            <span>&nbsp;Log Transactions</span>
        </a>
        <div id="collapseTwo" class="{{request()->is('inbound*') || request()->is('outbound*') ? 'collapse show' : 'collapse'}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Transaction Type:</h6>
                <a class="collapse-item {{request()->is('inbound*') ? 'active' : ''}}" href="{{route('inbound.index')}}">Inbound</a>
                <a class="collapse-item {{request()->is('outbound*') ? 'active' : ''}}" href="{{route('outbound.index')}}">Outbound</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{(request()->is('transactions*'))? 'active' : ''}}">
        <a class="nav-link" href="{{route('transactions.index')}}">
            <i class="fas fa-fw fa-history"></i>
            <span>Transaction History</span>
        </a>
    </li>

    <li class="nav-item {{(request()->is('inventory*')) ? 'active' : ''}}">
        <a class="nav-link" href="{{route('inventory.index')}}">
            <i class="fas fa-fw fa-warehouse"></i>
            <span>Inventory</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Others
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{(request()->is('merchants*')) ? 'active' : ''}}">
        <a class="nav-link" href="{{route('merchants.index')}}">
            <i class="fas fa-fw fa-address-book"></i>
            <span>Merchants</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('staffs.index')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Staffs</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
