@extends('backend.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Show All Connection</div>
        <div class="card-body">
          <div class="row mb-3">
            <div class="col-sm-4">
              <form action="{{ route('admin.connection.search') }}" method="GET">
                <div class="input-group">
                  <input type="search" name="search"  class="form-control" placeholder="ex: search name, type, zone, area....">
                  <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Search</button>
                  </span>
                </div>
              </form>
            </div>
          </div>

          @include('backend.partials.messages')
          <div class="table-responsive">
            <table class="table edit-table-connection">
              <thead class="thead-light">
                <tr>
                  <th>Sl/No.</th>
                  <th>Connection Name</th>
                  <th>Connection Type</th>
                  <th>Number of Tv</th>
                  <th>Number of Mbps</th>
                  <th>Connection Area Name</th>
                  <th>Zone Name</th>
                  <th>Subzone Name</th>
                  <th>Previous Zone Name</th>
                  <th>Previous Subzone Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($connections as $connection)
                    <tr data-href='{{ route('admin.connection.manage', $connection->id) }}'>
                      <td> {{$connection->id}} </td>
                      <td> {{$connection->user_name}} </td>
                      <td> {{$connection->connection_type}} </td>
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
                      <td style="width: 200px; display: inline-block;"> {{$connection->zone_name}} </td>
                      <td> {{$connection->subzone_name}} </td>
                      <td style="width: 200px; display: inline-block;"> {{$connection->prev_zone_name}} </td>
                      <td> {{$connection->prev_subzone_name}} </td>
                      <td>
                        @if ($connection->status == "Active" || $connection->status == "Newly Added")
                          <span class="badge badge-success">{{$connection->status}}</span>
                        @else
                          <span class="badge badge-danger">{{$connection->status}}</span>
                        @endif
                      </td>
                      <td style="width: 150px; display: inline-block;" class="dont-toch-me">
                        <a href=" {{ route('admin.connection.edit', $connection->id) }} " class="btn btn-success icon-padding"><i class="fas fa-edit"></i></a>
                        <a href=" {{ route('admin.connection.create') }} " class="btn btn-primary icon-padding"><i class="fas fa-plus-square"></i></a>
                        <a href="#deleteModal{{ $connection->id }}" data-toggle="modal" class="btn btn-danger icon-padding"><i class="fa fa-trash"></i></a>
                        <div class="modal fade" id="deleteModal{{ $connection->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <form action=" {{ route('admin.connection.delete', $connection->id) }} " method="POST">
                                @csrf
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                      {{ $connection->user_name }}
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