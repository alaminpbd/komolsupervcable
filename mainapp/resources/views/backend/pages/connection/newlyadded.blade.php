@extends('backend.layouts.master')

@section('content')
    <div class="container-fluid">

        <style type="text/css">
            body
            {
                font-family: Arial;
                font-size: 10pt;
            }
            table
            {
                border: 1px solid #ccc;
                border-collapse: collapse;
            }
            table th
            {
                background-color: #F7F7F7;
                color: #333;
                font-weight: bold;
            }
            table th, table td
            {
                padding: 5px;
                border: 1px solid #ccc;
            }
        </style>

        <form action=" {{ route('admin.connection.searchByZoneSubNewlyAdded') }} " method="GET">
            <div class="row mt-2 mb-2 ml-2 border-bottom">
                <div class="col-md-9">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="inputEmail4">Select Zone Name</label>
                          <select class="form-control select-zone" name="zone_id" id="zone-name">
                            <option value="" disabled selected>Select a zone...</option>
                            @foreach (App\Models\Zone::orderBy('zone_name', 'asc')->get() as $zone)
                                <option id="zone_name" value="{{ $zone->id }}"> {{ $zone->zone_name }}</option> 
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group col-md-4">
                          <label for="inputPassword4">Select Subzone Name</label>
                          <select class="form-control" name="subzone_id" id="subzone-name">
                            
                          </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Operation Select</label>
                            <select class="form-control" name="status">
                              <option value="" disabled selected>Select a operation...</option>
                              <option value="Active">Active</option>
                              <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="col" style="margin-top: 30px">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </form>
        
        <div class="table-responsive">
            <div class="brand-category bg-primary">
                <div class="text-center text-white">Total Newly Added Connection</div>
            </div>

            <table class="table bg-white mt-3" cellspacing="0" cellpadding="0">
              <thead class="thead-light">
                <tr>
                  <th>Connection Name</th>
                  <th>Ip Address</th>
                  <th>Connection Type</th>
                  <th>Number of Tv</th>
                  <th>Number of Mbps</th>
                  <th>Connection Area Name</th>
                  <th>Zone Name</th>
                  <th>Subzone Name</th>
                  <th>Previous Zone Name</th>
                  <th>Previous Subzone Name</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($connections as $connection)
                    <tr data-href='{{ route('admin.connection.manage', $connection->id) }}'>
                      <td> {{$connection->user_name}} </td>
                      <td> {{$connection->connection_type}} </td>
                      <td> {{$connection->ip_address}} </td>
                      <td>
                        @if ($connection->number_of_tv != "")
                            <span class="badge badge-primary">{{$connection->number_of_tv}} TV </span>
                        @else
                            <span class="badge badge-danger"> No Tv Added </span>
                        @endif 
                      </td>
                      <td>
                        @if ($connection->number_of_mbps != "")
                            <span class="badge badge-primary">{{$connection->number_of_mbps}} MBPS </span>
                        @else
                            <span class="badge badge-danger"> No MBPS Added </span>
                        @endif  
                      </td>
                      <td> {{$connection->connection_area_name}} </td>
                      <td> {{$connection->zone_name}} </td>
                      <td> {{$connection->subzone_name}} </td>
                      <td> {{$connection->prev_zone_name}} </td>
                      <td> {{$connection->prev_subzone_name}} </td>
                      <td>
                        @if ($connection->status == "Active")
                          <span class="badge badge-success">{{$connection->status}}</span>
                        @else
                          <span class="badge badge-danger">{{$connection->status}}</span>
                        @endif
                      </td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="font-weight-bold">Total Connection</td>
                    <td class="font-weight-bold"> {{ $totalConnection }} </td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
    
@endsection