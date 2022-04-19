<?php

namespace App\Http\Controllers\Backend;

use App\Models\Zone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subzone;

class ZoneController extends Controller
{

    // Authentication Method

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
       return view('backend.pages.zone.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'zone_name'              => 'required|max:150',
        ],

        [
            'zone_name.required'   =>    'User name is not empty !!',
        ]);

        $zone = new Zone();
        $zone->zone_name = $request->zone_name;
        $zone->zone_code = $request->zone_code;
        $zone->save();

        session()->flash('success', 'A Zone has added successfully !!');
        return redirect()->route('admin.zone.show');

    }

    public function show(Zone $zone)
    {
        $zones = Zone::orderBy('id', 'asc')->get();
        return view('backend.pages.zone.show', compact('zones'));
    }


    public function edit($id)
    {
        $zone = Zone::find($id);
        if (!is_null($zone)){
            return view('backend.pages.zone.edit', compact('zone'));
        }
        else
        {
            return redirect()->route('backend.pages.zone.show');
        }

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'zone_name'              => 'required|max:150',
        ],

        [
            'zone_name.required'   =>    'User name is not empty !!',
        ]);

        $zone = Zone::find($id);
        $zone->zone_name = $request->zone_name;
        $zone->zone_code = $request->zone_code;
        $zone->save();

        session()->flash('success', 'Zone has Updated successfully !!');
        return redirect()->route('admin.zone.show');

    }

    public function delete(Zone $zone, $id)
    {
        $zone = Zone::find($id);
        $subzone = Subzone::orderBy('id', 'asc')->where('zone_id', $zone->id)->get();
        if (!is_null($zone)){
            if(!is_null($subzone)){
                foreach ($subzone as $sub) {
                    $sub->delete();
                 }
            }

            $zone->delete();
        }

        session()->flash('success', 'Zone has deleted successfully !!');
        return back();
    }
}
