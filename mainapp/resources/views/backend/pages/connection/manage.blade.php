@extends('backend.layouts.master')

@section('content')
    <div class="brand-category bg-danger">
        <div class="text-center text-white">User Profile Data</div>
    </div>
    <div class="row mt-2 mr-2 ml-2">
        <div class="col-sm-3">
            <div class="card" style="width: 15rem;">
                <img class="card-img-top" src="{{ asset('img/boy.png') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{ $connection->user_name }}</h5>
                  <p class="card-text">
                    {{ $connection->user_mobile_number }}
                  </p>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Details</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row mt-2 ml-auto">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">IP Address :</div>
                                        <div class="col-sm-6">{{ $connection->ip_address }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">Full Name :</div>
                                        <div class="col-sm-6">{{ $connection->full_name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">Connection Type :</div>
                                        <div class="col-sm-6"><span class="badge badge-primary">{{ $connection->connection_type }}</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">Zone Name :</div>
                                        <div class="col-sm-6">{{ $connection->zone_name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">Subzone Name :</div>
                                        <div class="col-sm-6">{{ $connection->subzone_name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">Previous Zone :</div>
                                        <div class="col-sm-6">{{ $connection->prev_zone_name }}</div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">User Email :</div>
                                        <div class="col-sm-6">{{ $connection->user_email }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">Connection Area :</div>
                                        <div class="col-sm-6">{{ $connection->connection_area_name }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">Status :</div>
                                        <div class="col-sm-6">
                                            @if ($connection->status == "Active" || $connection->status == "Newly Added")
                                                <span class="badge badge-success">{{$connection->status}}</span>
                                            @else
                                                <span class="badge badge-danger">{{$connection->status}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">Number of Tv :</div>
                                        <div class="col-sm-6">
                                            @if ($connection->number_of_tv != "")
                                                <span class="badge badge-primary">{{$connection->number_of_tv}} TV </span>
                                            @else
                                                <span class="badge badge-danger"> No Tv Added </span>
                                            @endif 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">Number of Mbps :</div>
                                        <div class="col-sm-6">
                                            @if ($connection->number_of_mbps != "")
                                                <span class="badge badge-primary">{{$connection->number_of_mbps}} MBPS </span>
                                            @else
                                                <span class="badge badge-danger"> No MBPS Added </span>
                                            @endif 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">Previous Subzone :</div>
                                        <div class="col-sm-6">{{ $connection->prev_subzone_name }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection