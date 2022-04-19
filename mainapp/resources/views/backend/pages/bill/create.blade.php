@extends('backend.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
        Create New Bill
        </div>
        <div class="card-body">
            <form action=" {{ route('admin.bill.store') }} " method="POST" enctype="multipart/form-data">
                @csrf
                 
                @include('backend.partials.messages')
                
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Connection Name</label>
                        <input list="brow" class="form-control" name="connection_name" id="connection-id" placeholder="search connection name">
                        <datalist id="brow">
                          @foreach ($connections as $connection)
                              <option id="{{$connection->id}}" value="{{$connection->user_name}}">
                          @endforeach
                        </datalist>
                        <input type="hidden" id="user-id" name="connection_id">
                        <input type="hidden" id="zone-name" name="zone_name">
                        <input type="hidden" id="zone-id" name="zone_id">
                        <input type="hidden" id="subzone-name" name="subzone_name">
                        <input type="hidden" id="subzone-id" name="subzone_id">
                        <input type="hidden" id="status-field" name="status">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Ip Address</label>
                        <input type="text" class="form-control" name="ip_address" id="ip-address" placeholder="Ip address....">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Connection Type</label>
                        <input type="text" class="form-control" name="connection_type" id="connection-type" readonly="readonly">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Bill Type</label>
                        <select class="form-control" name="bill_type">
                            <option value="Connection Fee">Connection Fee</option>
                            <option value="Monthly Fee" selected>Monthly Fee</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Amount</label>
                        <input type="text" class="form-control" name="amount" placeholder="Enter amount">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Collection Date</label>
                        <input type="text" class="form-control" placeholder="Select Collection Date...." name="collection_date" id="datepicker">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Year</label>
                        <select name="year" class="form-control year">
                            <option value="" disabled selected>Select year.....</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Month</label>
                        <select name="month" class="form-control month">
                            <option value="" disabled selected>Select month.....</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4"></label>
                       <div class="text-right"><button type="submit" class="btn btn-success">Create Bill</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>  
@endsection