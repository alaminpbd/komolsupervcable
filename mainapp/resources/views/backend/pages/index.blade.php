@extends('backend.layouts.master')

@section('content')
    <!-- Container Fluid-->

    <div class="container-fluid mt-4">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <hr class="sidebar-divider">

        <div class="border bg-white text-center mb-2">
          <h5 class="text-primary"><i class="fas fa-wifi"></i> &nbsp; Net Bill Section</h5>
        </div>

        <!-- Content Row -->
        <div class="row">
          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Collected Amount</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">&#2547;  {{ $totalNetbill }}</div>
                  </div>
                  <div class="col-auto">
                    <i class="fa-2x text-gray-300">&#2547;</i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">This Month Collected Amount</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">&#2547; {{ $totalNetbillMonth }} </div>
                  </div>
                  <div class="col-auto">
                    <i class="fa-2x text-gray-300">&#2547;</i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Connection</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$totalNetCon}} </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-network-wired fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Pending Requests Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">This Month Connection</div>
                    <div class="mb-0 font-weight-bold text-success">Newly Added</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $thisMonthNetConActive }} </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-network-wired fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Zone</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$totalNetZone}} </div>
                  </div>
                  <div class="col-auto">
                    <i class="fa fa-list-alt fa-2x text-gray-300"></i>
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
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Subzone</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$totalNetSubZone}} </div>
                  </div>
                  <div class="col-auto">
                    <i class="fa fa-list-alt fa-2x text-gray-300"></i>
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
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Bill</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $totalNetBill }} </div>
                  </div>
                  <div class="col-auto">
                    <i class="fa fa-list-alt fa-2x text-gray-300"></i>
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
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">This Month Connection</div>
                    <div class="text-danger mb-0 font-weight-bold">Shutted Down</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $thisMonthNetConInactive }} </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-network-wired fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="border bg-white text-center mb-2">
          <h5 class="text-primary"><i class="fas fa-satellite-dish"></i> &nbsp; Dish Bill Section</h5>
        </div>

        <!-- Content Row -->
        <div class="row">
          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Collected Amount</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">&#2547;  {{ $totalDishbill }}</div>
                  </div>
                  <div class="col-auto">
                    <i class="fa-2x text-gray-300">&#2547;</i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">This Month Collected Amount</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">&#2547; {{ $totalDishbillMonth }}</div>
                  </div>
                  <div class="col-auto">
                    <i class="fa-2x text-gray-300">&#2547;</i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Connection</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$totalDishCon}} </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-network-wired fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Pending Requests Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">This Month Connection</div>
                    <div class="mb-0 font-weight-bold text-success">Newly Added</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $thisMonthDishConActive }} </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-network-wired fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Zone</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $totalDishZone }} </div>
                  </div>
                  <div class="col-auto">
                    <i class="fa fa-list-alt fa-2x text-gray-300"></i>
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
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Subzone</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $totalDishSubZone }} </div>
                  </div>
                  <div class="col-auto">
                    <i class="fa fa-list-alt fa-2x text-gray-300"></i>
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
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Bill</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $totalDishBill }} </div>
                  </div>
                  <div class="col-auto">
                    <i class="fa fa-list-alt fa-2x text-gray-300"></i>
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
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">This Month Connection</div>
                    <div class="text-danger mb-0 font-weight-bold">Shutted Down</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $thisMonthDishConInactive }} </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-network-wired fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- Container Fluid-->
@endsection