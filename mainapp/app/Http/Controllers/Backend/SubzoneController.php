<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Models\Subzone;
use App\Http\Controllers\Controller;
use App\Models\Zone;

class SubzoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $zone = Zone::orderBy('id', 'asc')->get();
        return view('backend.pages.subzone.create', compact('zone'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subzone_name'              => 'required|max:150',
        ],

        [
            'subzone_name.required'   =>    'User name is not empty !!',
        ]);

        $subzone = new Subzone();
        $subzone->subzone_name = $request->subzone_name;
        $subzone->zone_id = $request->zone_id;
        $subzone->subzone_code = $request->subzone_code;
        $subzone->save();

        session()->flash('success', 'A Subzone has added successfully !!');
        return redirect()->route('admin.subzone.show');

    }

    
    public function show(Subzone $subzone)
    {
        $subzones = Subzone::orderBy('id', 'asc')->get();
        return view('backend.pages.subzone.show', compact('subzones'));
    }

    
    public function edit(Subzone $subzone, $id)
    {
        $zones = Zone::orderBy('id', 'asc')->get();
        $subzone = Subzone::find($id);

        if (!is_null($subzone)){
            return view('backend.pages.subzone.edit', compact('subzone', 'zones'));
        }
        else
        {
            return view('backend.pages.subzone.show');
        }

    }

    
    public function update(Request $request, Subzone $subzone, $id)
    {
        $request->validate([
            'subzone_name'              => 'required|max:150',
        ],

        [
            'subzone_name.required'   =>    'User name is not empty !!',
        ]);

        $subzone = Subzone::find($id);
        $subzone->subzone_name = $request->subzone_name;
        $subzone->zone_id = $request->zone_id;
        $subzone->subzone_code = $request->subzone_code;
        $subzone->save();

        session()->flash('success', 'Subzone has Update successfully !!');
        return redirect()->route('admin.subzone.show');
    }

   
    public function delete(Subzone $subzone, $id)
    {
        $subzone = Subzone::find($id);
        if (!is_null($subzone)){
            $subzone->delete();
        }

        session()->flash('success', 'Subzone has deleted successfully !!');
        return back();
    }
}
