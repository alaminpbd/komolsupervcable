<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center border-right" href=" {{ route('admin.index') }} ">
      <div class="sidebar-brand-icon">
        <img src="{{ asset('img/logo/logonew.png') }}">
      </div>
      <div class="sidebar-brand-text mx-3"></div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
      <a class="nav-link" href="{{ route('admin.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
      Bill Collection
    </div>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap1"
        aria-expanded="true" aria-controls="collapseBootstrap1">
        <i class="fas fa-map"></i>
        <span>Manage Zone</span>
      </a>
      <div id="collapseBootstrap1" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ route('admin.zone.create') }}">Create Zone</a>
          {{-- <a class="collapse-item" href="{{ route('admin.zone.edit') }}">Edit Zone</a> --}}
          <a class="collapse-item" href="{{ route('admin.zone.show') }}">Show Zone</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap2"
        aria-expanded="true" aria-controls="collapseBootstrap2">
        <i class="fas fa-map"></i>
        <span>Manage Sub Zone</span>
      </a>
      <div id="collapseBootstrap2" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ route('admin.subzone.create') }}">Create Sub Zone</a>
          {{-- <a class="collapse-item" href="{{ route('admin.subzone.edit') }}">Edit Sub Zone</a> --}}
          <a class="collapse-item" href="{{ route('admin.subzone.show') }}">Show Sub Zone</a>
        </div>
      </div>
    </li>

    <li class="nav-item mt-2">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
        aria-expanded="true" aria-controls="collapseBootstrap">
        <i class="fas fa-network-wired"></i>
        <span>Manage Connection</span>
      </a>
      <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href=" {{ route('admin.connection.create') }}">Create Connection</a>
          <a class="collapse-item" href="{{ route('admin.connection.show') }}">Show Connection</a>
          <a class="collapse-item" href="{{ route('admin.connection.newlyadded') }}">Connection Overview </a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap3"
        aria-expanded="true" aria-controls="collapseBootstrap3">
        <i class="fas fa-money-bill"></i>
        <span>Manage Bill</span>
      </a>
      <div id="collapseBootstrap3" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ route('admin.bill.create') }}">Create Bill</a>
          <a class="collapse-item" href="{{ route('admin.bill.show') }}">Show Bill</a>
          <a class="collapse-item" href="{{ route('admin.bill.maintain') }}">Maintain</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap4"
        aria-expanded="true" aria-controls="collapseBootstrap4">
        <i class="fa fa-file" aria-hidden="true"></i>
        <span>Generate Report</span>
      </a>
      <div id="collapseBootstrap4" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ route('admin.report') }}">Report Month Year</a>
          <a class="collapse-item" href="{{ route('admin.report.zonesubzone') }}">Report Zone Subzone</a>
          <a class="collapse-item" href=" {{ route('admin.report.billhistory') }} ">Report Bill History</a>
        </div>
      </div>
    </li>
</ul>