@extends('backend.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
        Edit Connection
        </div>
        <div class="card-body">
            <form action=" {{ route('admin.connection.update', $connection->id) }} " method="POST" enctype="multipart/form-data">
                @csrf
                @include('backend.partials.messages')
                
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Connection Name</label>
                        <input type="text" class="form-control" name="user_name" value="{{$connection->user_name}}" placeholder="Enter unique name">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">User Full Name</label>
                        <input type="text" class="form-control" name="full_name" value=" {{ $connection->full_name }} " placeholder="Enter full name">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">User Mobile Number</label>
                        <input type="text" class="form-control" name="user_mobile_number" value=" {{ $connection->user_mobile_number }} " placeholder="Enter mobile number">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">User Email</label>
                        <input type="email" class="form-control" name="user_email" value=" {{ $connection->user_email }} " placeholder="Enter Email">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Connection Area Name</label>
                        <input type="text" class="form-control" name="connection_area_name" value=" {{ $connection->connection_area_name }} " placeholder="Enter area name">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Connection Type</label>
                        <select class="form-control select-connection" name="connection_type">
                            <option value="{{$connection->connection_type}}" selected>{{$connection->connection_type}}</option>
                            <option value="Net Bill">Net Bill</option>
                            <option value="Dish Bill">Dish Bill</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Previous Zone Name</label>
                        <select class="form-control prev-select-zone" name="prev_zone_id" id="prev-zone-name">
                            <option value="" disabled selected></option>
                            @foreach (App\Models\Zone::orderBy('id', 'asc')->get() as $zone)
                                <option value="{{$zone->id}}" {{$zone->id == $connection->prev_zone_id ? 'selected' : '' }} >{{$zone->zone_name}}</option>
                            @endforeach
                            <input type="hidden" class="prev-value-zone-name" name="prev_zone_name">
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Previous Subzone</label>
                        <select class="form-control prev-select-subzone" name="prev_subzone_id" id="prev-subzone-name">

                        </select>
                        <input type="hidden" id="prev-value-subzone-name" name="prev_subzone_name">
                        <input type="hidden" id="prev-subzone-data-id" value="{{ $connection->prev_subzone_id }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Zone Name</label>
                        <select class="form-control select-zone" name="zone_id" id="zone-name">
                            @foreach (App\Models\Zone::orderBy('id', 'asc')->get() as $zone)
                                <option value="{{$zone->id}}" {{$zone->id == $connection->zone_id ? 'selected' : '' }}>{{$zone->zone_name}}</option>
                            @endforeach
                            <input type="hidden" class="value-zone-name" name="zone_name">
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Subzone</label>
                        <select class="form-control select-subzone" name="subzone_id" id="subzone-name">

                        </select>
                        <input type="hidden" id="value-subzone-name" name="subzone_name">
                        <input type="hidden" id="subzone-data-id" value="{{ $connection->subzone_id }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Status</label>
                        <select class="form-control" name="status">
                            <option value=" {{ $connection->status }} " selected>{{ $connection->status }}</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">IP Address</label>
                        <input type="text" class="form-control" name="ip_address" value="{{$connection->ip_address}}">
                    </div>

                    <div class="form-group col-md-4 number-of-tv">
                        <label for="inputPassword4">Number Of TV</label>
                        <input type="number" class="form-control" name="number_of_tv" value="{{$connection->number_of_tv}}" placeholder="Ex: 1, 2, 3.....">
                    </div>

                    <div class="form-group col-md-4 number-of-mbps">
                        <label for="inputPassword4">Number Of MBPS</label>
                        <input type="number" class="form-control" name="number_of_mbps" value="{{$connection->number_of_mbps}}" placeholder="Ex: 1, 2, 3.....">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update Connection</button>
            </form>
        </div>
    </div>  
@endsection