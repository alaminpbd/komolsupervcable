<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Connection;
use Illuminate\Support\Facades\DB;

class ConnectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $connection = Connection::find($id);
        return view('backend.pages.connection.manage', compact('connection'));
    }

    public function create()
    {
        return view('backend.pages.connection.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'user_name'              => 'required|unique:connections|max:255',
            'user_mobile_number'        => 'required|max:15',
            'zone_name'             => 'required',
        ]);

        $connection = new Connection();
        $connection->user_name = $request->user_name;
        $connection->full_name = $request->full_name;
        $connection->user_mobile_number = $request->user_mobile_number;
        $connection->user_email = $request->user_email;
        $connection->connection_area_name = $request->connection_area_name;
        $connection->zone_id = $request->zone_id;
        $connection->zone_name = $request->zone_name;
        $connection->subzone_id = $request->subzone_id;
        $connection->subzone_name = $request->subzone_name;
        $connection->connection_type = $request->connection_type;
        $connection->number_of_tv = $request->number_of_tv;
        $connection->number_of_mbps = $request->number_of_mbps;
        $connection->status = $request->status;
        $connection->ip_address = $request->ip_address;
        $connection->save();

        session()->flash('success', 'A Connection has added successfully !!');
        return redirect()->route('admin.connection.show');

    }

    public function show()
    {
        $connections = Connection::orderBy('id', 'asc')->get();
        return view('backend.pages.connection.show', compact('connections'));
    }

    public function edit($id)
    {
        $connection = Connection::find($id);
        if (!is_null($connection)){
            return view('backend.pages.connection.edit', compact('connection'));
        }
        else {
            return redirect()->route('backend.pages.connection.show');
        }
    }

   
    public function update(Request $request, Connection $connection, $id)
    {
        $request->validate([
            'user_mobile_number'        => 'required|max:15',
            'zone_name'             => 'required',
            'user_name'              => 'unique:connections,user_name,'.$id
        ]);

        $connection = Connection::find($id);
        $connection->user_name = $request->user_name;
        $connection->full_name = $request->full_name;
        $connection->user_mobile_number = $request->user_mobile_number;
        $connection->user_email = $request->user_email;
        $connection->connection_area_name = $request->connection_area_name;
        $connection->zone_id = $request->zone_id;
        $connection->zone_name = $request->zone_name;
        $connection->subzone_id = $request->subzone_id;
        $connection->subzone_name = $request->subzone_name;
        $connection->prev_zone_id = $request->prev_zone_id;
        $connection->prev_zone_name = $request->prev_zone_name;
        $connection->prev_subzone_id = $request->prev_subzone_id;
        $connection->prev_subzone_name = $request->prev_subzone_name;
        $connection->connection_type = $request->connection_type;
        $connection->number_of_tv = $request->number_of_tv;
        $connection->number_of_mbps = $request->number_of_mbps;
        $connection->status = $request->status;
        $connection->ip_address = $request->ip_address;
        $connection->save();

        session()->flash('success', 'Connection has Updated successfully !!');
        return redirect()->route('admin.connection.show');
    }

    public function delete($id)
    {
        $connection = Connection::find($id);
        if (!is_null($connection)){
            $connection->delete();
        }

        session()->flash('success', 'Connection has deleted successfully !!');
        return back();
    }

    public function searchBycon(Request $request){
        $search = $request->get('search');
        $connections = DB::table('connections')->where('user_name', 'like', '%'.$search.'%')
        ->orWhere('connection_type', 'like', '%'.$search.'%')
        ->orWhere('zone_name', 'like', '%'.$search.'%')
        ->orWhere('subzone_name', 'like', '%'.$search.'%')
        ->orWhere('connection_area_name', 'like', '%'.$search.'%')
        ->orderBy('id', 'asc')
        ->get();

        return view('backend.pages.connection.show', compact('connections'));
    }

    public function newlyadded(Request $request){

        $currentMonth = date('m');
        $connections = DB::table('connections')->select(DB::raw('*'))
        ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
        ->get();

        $totalConnection = 0;
        $totalConnection = DB::table('connections')->select(DB::raw('*'))
        ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
        ->count();

        return view('backend.pages.connection.newlyadded', compact('connections', 'totalConnection'));
    }

    public function searchByZoneSubNewlyAdded(Request $request){
        $zone_id = $request->get('zone_id');
        $subzone_id = $request->get('subzone_id');
        $operation_name = $request->get('status');
        $totalConnection = 0;

        $currentMonth = date('m');
        if (empty($zone_id) && empty($subzone_id) && empty($operation_name)) {
            $connections = DB::table('connections')->select(DB::raw('*'))
            ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
            ->get();

            $totalConnection = 0;
            $totalConnection = DB::table('connections')->select(DB::raw('*'))
            ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
            ->count();
        } 
        else if (!empty($zone_id) && !empty($subzone_id) && !empty($operation_name)){
            $connections = DB::table('connections')->select(DB::raw('*'))
            ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
            ->where('zone_id', 'like', '%'.$zone_id.'%')
            ->where('subzone_id', 'like', '%'.$subzone_id.'%')
            ->where('status', 'like', '%'.$operation_name.'%')
            ->orderBy('id', 'asc')
            ->get();

            $totalConnection = 0;
            $totalConnection = DB::table('connections')->select(DB::raw('*'))
            ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
            ->where('zone_id', 'like', '%'.$zone_id.'%')
            ->where('subzone_id', 'like', '%'.$subzone_id.'%')
            ->where('status', 'like', '%'.$operation_name.'%')
            ->count();
        }
        else if (!empty($zone_id) && !empty($subzone_id) && empty($operation_name)){
            $connections = DB::table('connections')->select(DB::raw('*'))
            ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
            ->where('zone_id', 'like', '%'.$zone_id.'%')
            ->where('subzone_id', 'like', '%'.$subzone_id.'%')
            ->orderBy('id', 'asc')
            ->get();

            $totalConnection = 0;
            $totalConnection = DB::table('connections')->select(DB::raw('*'))
            ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
            ->where('zone_id', 'like', '%'.$zone_id.'%')
            ->where('subzone_id', 'like', '%'.$subzone_id.'%')
            ->count();
        }
        else if(!empty($zone_id) && empty($subzone_id) && empty($operation_name)){
            $connections = DB::table('connections')->select(DB::raw('*'))
            ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
            ->where('zone_id', 'like', '%'.$zone_id.'%')
            ->orderBy('id', 'asc')
            ->get();

            $totalConnection = 0;
            $totalConnection = DB::table('connections')->select(DB::raw('*'))
            ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
            ->where('zone_id', 'like', '%'.$zone_id.'%')
            ->count();
        }
        else if(!empty($operation_name) && empty($zone_id) && empty($subzone_id)){
            $connections = DB::table('connections')->select(DB::raw('*'))
            ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
            ->where('status', 'like', '%'.$operation_name.'%')
            ->orderBy('id', 'asc')
            ->get();

            $totalConnection = 0;
            $totalConnection = DB::table('connections')->select(DB::raw('*'))
            ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
            ->where('status', 'like', '%'.$operation_name.'%')
            ->count();
        }

        return view('backend.pages.connection.newlyadded', compact('connections', 'totalConnection'));
    }

}
