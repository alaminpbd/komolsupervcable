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
                  <h5 class="card-title"><span class="badge badge-primary">Name:</span> {{ $bill->connection_name }}</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Details</a>
                          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Bill History</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row mt-2 ml-auto">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">IP Address :</div>
                                        <div class="col-sm-6">{{ $bill->ip_address }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">User Name :</div>
                                        <div class="col-sm-6">{{ $bill->connection_name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">Connection Type :</div>
                                        <div class="col-sm-6">{{ $bill->connection_type }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">Zone Name :</div>
                                        <div class="col-sm-6">{{ $bill->zone_name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">Subzone Name :</div>
                                        <div class="col-sm-6">{{ $bill->subzone_name }}</div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">Bill Type :</div>
                                        <div class="col-sm-6">{{ $bill->bill_type }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">Amount :</div>
                                        <div class="col-sm-6">{{ $bill->amount }} <span class="badge badge-warning">Tk</span></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">Status :</div>
                                        <div class="col-sm-6">
                                            @if ($bill->status == "Active" || $bill->status == "Newly Added")
                                                <span class="badge badge-success">{{$bill->status}}</span>
                                            @else
                                                <span class="badge badge-danger">{{$bill->status}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">Collection Date :</div>
                                        <div class="col-sm-6">{{ $bill->collection_date }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">Month :</div>
                                        <div class="col-sm-6">{{ $bill->month }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 font-weight-bold">Year :</div>
                                        <div class="col-sm-6">{{ $bill->year }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="table-responsive mt-2">
                                <table class="table">
                                    <thead>
                                      <tr class="thead-light">
                                        <th scope="col">Collection Date</th>
                                        <th scope="col">Month Name</th>
                                        <th scope="col">Paid Amount</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($billHistory as $item)
                                            <tr>
                                                <td> {{$item->collection_date}} </td>
                                                <td> {{$item->month}} </td>
                                                <td> {{$item->amount}} </td>
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
    </div>
@endsection