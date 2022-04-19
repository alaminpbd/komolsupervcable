@extends('backend.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Show All Bill</div>

        <div class="row mt-2 mb-2 ml-2">
          <div class="col-sm-4">
            <form action="{{ route('admin.bill.search') }}" method="GET">
              <div class="input-group">
                <input type="search" name="search"  class="form-control" placeholder="ex: search name, type, zone, area....">
                <span class="input-group-prepend">
                  <button type="submit" class="btn btn-primary">Search</button>
                </span>
              </div>
            </form>
          </div>
          <div class="col-sm-4">
          </div>
          <div class="col-sm-4 text-right">
            <a href=" {{ route('admin.bill.create') }} " class="btn btn-primary mr-4"><i class="fas fa-plus-square"> Add New Bill </i></a>
          </div>
        </div>

        <div class="card-body">
          @include('backend.partials.messages')

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
                  <th>Action</th>
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
                    <td style="width: 200px; display: inline-block;"> {{$bill->zone_name}} </td>
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
                    <td style="width: 120px; display: inline-block;">
                      <a href=" {{ route('admin.bill.edit', $bill->id) }} " class="btn btn-success icon-padding"><i class="fas fa-edit"></i></a>
                      <a href="#deleteModal{{ $bill->id }}" data-toggle="modal" class="btn btn-danger icon-padding"><i class="fa fa-trash"></i></a>
                      <div class="modal fade" id="deleteModal{{ $bill->id }}">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <form action=" {{ route('admin.bill.delete', $bill->id) }} " method="POST">
                              @csrf
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                    {{ $bill->connection_name }}
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">Yes Delete</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Canel</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
@endsection