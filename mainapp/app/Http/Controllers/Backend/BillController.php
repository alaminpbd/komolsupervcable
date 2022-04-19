<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Connection;
use Illuminate\Support\Facades\DB;


class BillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $id){
        $bill = Bill::find($id);
        $billHistory = Bill::where('connection_id', '=', $bill->connection_id)->get();
        return view('backend.pages.bill.manage', compact('bill', 'billHistory'));
    }
   
    public function create()
    {
        $connections = Connection::orderBy('id', 'asc')->get();
        return view('backend.pages.bill.create', compact('connections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'connection_name'              => 'required',
        ]);

        $bill = new Bill();
        $bill->connection_id = $request->connection_id;
        $bill->connection_name = $request->connection_name;
        $bill->zone_id = $request->zone_id;
        $bill->zone_name = $request->zone_name;
        $bill->subzone_id = $request->subzone_id;
        $bill->subzone_name = $request->subzone_name;
        $bill->connection_type = $request->connection_type;
        $bill->status = $request->status;
        $bill->ip_address = $request->ip_address;
        $bill->bill_type = $request->bill_type;
        $bill->amount = $request->amount;
        $bill->collection_date = $request->collection_date;
        $bill->year = $request->year;
        $bill->month = $request->month;
        
        if ($request->month == 'January') {
            $bill->January = $request->amount;
        }
        else if($request->month == 'February'){
            $bill->February = $request->amount;
        }
        else if($request->month == 'March'){
            $bill->March = $request->amount;
        }
        else if($request->month == 'April'){
            $bill->April = $request->amount;
        }
        else if($request->month == 'May'){
            $bill->May = $request->amount;
        }
        else if($request->month == 'June'){
            $bill->June = $request->amount;
        }
        else if($request->month == 'July'){
            $bill->July = $request->amount;
        }
        else if($request->month == 'August'){
            $bill->August = $request->amount;
        }
        else if($request->month == 'September'){
            $bill->September = $request->amount;
        }
        else if($request->month == 'October'){
            $bill->October = $request->amount;
        }
        else if($request->month == 'November'){
            $bill->November = $request->amount;
        }
        else if($request->month == 'December'){
            $bill->December = $request->amount;
        }

        $bill->save();

        session()->flash('success', 'A Bill has Create successfully !!');
        return redirect()->route('admin.bill.show');
    }

   
    public function show(Bill $bills)
    {
        $bills = Bill::orderBy('id', 'asc')->get();
        return view('backend.pages.bill.show', compact('bills'));
    }

    public function search(Request $request){
        $search = $request->get('search');
        $bills = DB::table('bills')->where('connection_name', 'like', '%'.$search.'%')
        ->orWhere('connection_type', 'like', '%'.$search.'%')
        ->orWhere('zone_name', 'like', '%'.$search.'%')
        ->orWhere('subzone_name', 'like', '%'.$search.'%')
        ->orderBy('id', 'asc')
        ->get();

        return view('backend.pages.bill.show', compact('bills'));
    }


    public function searchByZoneName(Request $request){
        $zone_id = $request->get('zone_id');
        $subzone_id = $request->get('subzone_id');
        $status = $request->get('status');
        $month = $request->get('months');

        if (empty($zone_id) && empty($subzone_id) && empty($status) && empty($month)){
            $bills = Bill::orderBy('id', 'asc')->get();
        }
        else if (!empty($zone_id) && !empty($subzone_id) && !empty($status) && !empty($month)){
            $bills = Bill::where('zone_id', 'like', '%'.$zone_id.'%')
            ->where('subzone_id', 'like', '%'.$subzone_id.'%')
            ->where('status', 'like', '%'.$status.'%')
            ->where('month', 'like', '%'.$month.'%')
            ->orderBy('id', 'asc')
            ->get();
        }
        else if (!empty($zone_id) && !empty($subzone_id) && empty($status) && empty($month)){
            $bills = Bill::where('zone_id', 'like', '%'.$zone_id.'%')
            ->where('subzone_id', 'like', '%'.$subzone_id.'%')
            ->orderBy('id', 'asc')
            ->get();
        }
        else if (!empty($zone_id) && !empty($subzone_id) && !empty($status) && empty($month)){
            $bills = Bill::where('zone_id', 'like', '%'.$zone_id.'%')
            ->where('subzone_id', 'like', '%'.$subzone_id.'%')
            ->where('status', 'like', '%'.$status.'%')
            ->orderBy('id', 'asc')
            ->get();
        }
        else if (!empty($zone_id) && !empty($subzone_id) && empty($status) && !empty($month)){
            $bills = Bill::where('zone_id', 'like', '%'.$zone_id.'%')
            ->where('subzone_id', 'like', '%'.$subzone_id.'%')
            ->where('month', 'like', '%'.$month.'%')
            ->orderBy('id', 'asc')
            ->get();
        }
        else if (!empty($zone_id) && empty($subzone_id) && !empty($status) && !empty($month)){
            $bills = Bill::where('zone_id', 'like', '%'.$zone_id.'%')
            ->where('status', 'like', '%'.$status.'%')
            ->where('month', 'like', '%'.$month.'%')
            ->orderBy('id', 'asc')
            ->get();
        }
        else if(!empty($zone_id) && empty($subzone_id) && empty($status) && empty($month)){
            $bills = Bill::where('zone_id', 'like', '%'.$zone_id.'%')
            ->orderBy('id', 'asc')
            ->get();
        }
        else if(!empty($status) && empty($zone_id) && empty($subzone_id) && empty($month)){
            $bills = Bill::where('status', 'like', '%'.$status.'%')
            ->orderBy('id', 'asc')
            ->get();
        }
        else if(!empty($month) && empty($status) && empty($zone_id) && empty($subzone_id)){
            $bills = Bill::where('month', 'like', '%'.$month.'%')
            ->orderBy('id', 'asc')
            ->get();
        }

        return view('backend.pages.bill.maintain', compact('bills'));
    }


    public function maintain(Bill $bills)
    {
        $bills = Bill::orderBy('id', 'asc')->get();
        return view('backend.pages.bill.maintain', compact('bills'));
    }

    public function edit(Bill $bill, $id)
    {
        $bill = Bill::find($id);
        $connections = Connection::orderBy('id', 'asc')->get();
        return view('backend.pages.bill.edit', compact('bill', 'connections'));
    }

    public function update(Request $request, Bill $bill, $id)
    {
        {
            $request->validate([
                'connection_name'              => 'required',
            ]);
    
            $bill = Bill::find($id);
            $bill->connection_id = $request->connection_id;
            $bill->connection_name = $request->connection_name;
            $bill->zone_id = $request->zone_id;
            $bill->zone_name = $request->zone_name;
            $bill->subzone_id = $request->subzone_id;
            $bill->subzone_name = $request->subzone_name;
            $bill->connection_type = $request->connection_type;
            $bill->status = $request->status;
            $bill->ip_address = $request->ip_address;
            $bill->bill_type = $request->bill_type;
            $bill->amount = $request->amount;
            $bill->collection_date = $request->collection_date;
            $bill->year = $request->year;
            $bill->month = $request->month;
            
            $bill->January = null;
            $bill->February = null;
            $bill->March = null;
            $bill->April = null;
            $bill->May = null;
            $bill->June = null;
            $bill->July = null;
            $bill->August = null;
            $bill->September = null;
            $bill->October = null;
            $bill->November = null;
            $bill->December = null;

            if ($request->month == 'January') {
                $bill->January = $request->amount;
            }
            else if($request->month == 'February'){
                $bill->February =  $request->amount;
            }
            else if($request->month == 'March'){
                $bill->March = $request->amount;
            }
            else if($request->month == 'April'){
                $bill->April = $request->amount;
            }
            else if($request->month == 'May'){
                $bill->May = $request->amount;
            }
            else if($request->month == 'June'){
                $bill->June = $request->amount;
            }
            else if($request->month == 'July'){
                $bill->July = $request->amount;
            }
            else if($request->month == 'August'){
                $bill->August = $request->amount;
            }
            else if($request->month == 'September'){
                $bill->September = $request->amount;
            }
            else if($request->month == 'October'){
                $bill->October = $request->amount;
            }
            else if($request->month == 'November'){
                $bill->November = $request->amount;
            }
            else if($request->month == 'December'){
                $bill->December = $request->amount;
            }
    
            $bill->save();
    
            session()->flash('success', 'Bill has Updated successfully !!');
            return redirect()->route('admin.bill.show');
        }
    }


    public function delete(Bill $bill, $id)
    {
        $bill = Bill::find($id);
        if (!is_null($bill)){
            $bill->delete();
        }

        session()->flash('success', 'Bill has deleted successfully !!');
        return back();
    }
}
