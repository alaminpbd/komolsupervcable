@extends('backend.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit Zone
        </div>
        <div class="card-body">
            <form action=" {{ route('admin.zone.update', $zone->id) }} " method="POST" enctype="multipart/form-data">
                @csrf
                @include('backend.partials.messages')

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Zone Code</label>
                        <input type="text" class="form-control" value=" {{ $zone->zone_code }} " name="zone_code" placeholder="Enter zone code">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Zone Name</label>
                        <input type="text" class="form-control" name="zone_name" value=" {{ $zone->zone_name }} " placeholder="Enter zone name">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update Zone</button>
            </form>
        </div>
    </div>  
@endsection