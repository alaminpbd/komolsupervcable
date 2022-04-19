@extends('backend.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
        Create New Zone
        </div>
        <div class="card-body">
            <form action=" {{ route('admin.zone.store') }} " method="POST" enctype="multipart/form-data">
                @csrf
                @include('backend.partials.messages')

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Zone Code</label>
                        <input type="text" class="form-control" name="zone_code" placeholder="Enter zone code">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Zone Name</label>
                        <input type="text" class="form-control" name="zone_name" placeholder="Enter zone name">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Add Zone</button>
            </form>
        </div>
    </div>  
@endsection