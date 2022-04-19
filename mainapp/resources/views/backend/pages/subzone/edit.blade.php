@extends('backend.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
        Edit Subzone
        </div>
        <div class="card-body">
            <form action=" {{ route('admin.subzone.update', $subzone->id) }} " method="POST" enctype="multipart/form-data">

                @csrf
                @include('backend.partials.messages')

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Subzone Code</label>
                        <input type="text" class="form-control" name="subzone_code" value=" {{ $subzone->subzone_code }} " placeholder="Enter zone code">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Zone Name</label>
                        <select name="zone_id" class="form-control">
                            <option value="" disabled selected>Select Zone Name</option>
                            @foreach ($zones as $zone)
                                <option value=" {{ $zone->id }} " {{ $zone->id == $subzone->zone_id ? 'selected' : '' }}> {{ $zone->zone_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Subzone Name</label>
                        <input type="text" class="form-control" name="subzone_name" value=" {{ $subzone->subzone_name }} " placeholder="Enter zone name">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update Subzone</button>
            </form>
        </div>
    </div>  
@endsection