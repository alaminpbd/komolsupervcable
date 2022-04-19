@extends('backend.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Maintain & Manage Bill</div>
        <div class="card-body">
          <form action="{{ route('admin.bill.searchbyzone') }}" method="GET">
            <div class="row mt-2 mb-2 ml-2">
              <div class="col-md-6">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Select Zone Name</label>
                    <select class="form-control select-zone" name="zone_id" id="zone-name">
                      <option value="" disabled selected>Select a zone...</option>
                      @foreach (App\Models\Zone::orderBy('zone_name', 'asc')->get() as $zone)
                          <option id="zone_name" value="{{ $zone->id }}"> {{ $zone->zone_name }}</option> 
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Select Subzone Name</label>
                    <select class="form-control" name="subzone_id" id="subzone-name">
                      
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Month's Select</label>
                    <select class="form-control month" name="months">
                      <option value="" disabled selected>Select a month's....</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Operation Select</label>
                    <select class="form-control" name="status">
                      <option value="" disabled selected>Select a operation...</option>
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-2 mb-2 ml-2">
              <div class="col text-right">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </div>
          </form>

          <div class="table-responsive">
            <table class="table edit-table-bill">
              <thead class="thead-light">
                <tr>
                  <th>Sl/No.</th>
                  <th>Connection Name</th>
                  <th>Ip Address</th>
                  <th>Connection Type</th>
                  <th>Bill Type</th>
                  <th>Zone Name</th>
                  <th>Subzone Name</th>
                  <th>Amount</th>
                  <th>Collection Date</th>
                  <th>Year</th>
                  <th>Month</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($bills as $bill)
                  <tr data-href='{{ route('admin.bill.manage', $bill->id) }}'>
                    <td> {{$bill->id}} </td>
                    <td> {{$bill->connection_name}} </td>
                    <td> {{$bill->ip_address}} </td>
                    <td> {{$bill->connection_type}} </td>
                    <td> {{$bill->bill_type}} </td>
                    <td> {{$bill->zone_name}} </td>
                    <td> {{$bill->subzone_name}} </td>
                    <td> {{$bill->amount}} </td>
                    <td> {{$bill->collection_date}} </td>

                    <td> {{$bill->year}} </td>
                    <td> {{$bill->month}} </td>
                    <td>
                      @if ($bill->status == "Active" || $bill->status == "Newly Added")
                        <span class="badge badge-success">{{$bill->status}}</span>
                      @else
                        <span class="badge badge-danger">{{$bill->status}}</span>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
@endsection