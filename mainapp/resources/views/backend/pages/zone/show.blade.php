@extends('backend.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Show All Zone</div>
        <div class="card-body">
          @include('backend.partials.messages')
            <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th>Sl/No.</th>
                    <th>Zone Name</th>
                    <th>Zone Code</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($zones as $zone)
                    <tr>
                      <td> {{$zone->id}} </td>
                      <td> {{$zone->zone_name}} </td>
                      <td> {{$zone->zone_code}} </td>
                      <td style="width: 150px; display:inline-block">
                        <a href=" {{ route('admin.zone.edit', $zone->id) }} " class="btn btn-success icon-padding"><i class="fas fa-edit"></i></a>
                        <a href=" {{ route('admin.zone.create') }} " class="btn btn-primary icon-padding"><i class="fas fa-plus-square"></i></a>
                        <a href="#deleteModal{{ $zone->id }}" data-toggle="modal" class="btn btn-danger icon-padding"><i class="fa fa-trash"></i></a>
                        <div class="modal fade" id="deleteModal{{ $zone->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <form action=" {{ route('admin.zone.delete', $zone->id) }} " method="POST">
                                @csrf
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                      {{ $zone->zone_name }}
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
@endsection