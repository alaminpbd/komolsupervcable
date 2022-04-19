<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Connection;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function report(){
        $totalAmount = 0;
        $totalAmount = DB::table('bills')->select(DB::raw('*'))
        ->sum('amount');

        $bills = Bill::orderBy('id', 'asc')->get();
        return view('backend.pages.report.report', compact('bills', 'totalAmount'));
    }

    public function reportZonSubzone(){
        $totalAmount = 0;
        $totalAmount = DB::table('bills')->select(DB::raw('*'))
        ->sum('amount');
        
        $bills = Bill::orderBy('id', 'asc')->get();
        return view('backend.pages.report.reportzonesubzone', compact('bills', 'totalAmount'));
    }

    public function billHistory(){
        $totalAmount = 0;
        $totalAmount = DB::table('bills')->select(DB::raw('*'))
        ->sum('amount');

        $connection = Connection::orderBy('id', 'asc')->get();
        return view('backend.pages.report.billhistory', compact('totalAmount', 'connection'));
    }


    public function searchByYM(Request $request){
        $month = $request->get('months');
        $year = $request->get('year');
        $totalAmount = 0;

        if(empty($month) && empty($year)){
            $bills = Bill::where('month', 'like', '%'.$month.'%')
            ->where('year', 'like', '%'.$year.'%')
            ->orderBy('id', 'asc')
            ->get();

            $totalAmount = DB::table('bills')->select(DB::raw('*'))
            ->sum('amount');
        }
        else if(!empty($month) && !empty($year)){
            $bills = Bill::where('month', 'like', '%'.$month.'%')
            ->where('year', 'like', '%'.$year.'%')
            ->orderBy('id', 'desc')
            ->get();

            $totalAmount = DB::table('bills')->select(DB::raw('*'))
            ->where('year', 'like', '%'.$year.'%')
            ->where('month', 'like', '%'.$month.'%')
            ->sum('amount');
        }
        else if(!empty($year) && empty($month)){
            $bills = Bill::where('year', 'like', '%'.$year.'%')
            ->orderBy('id', 'asc')
            ->get();

            $totalAmount = DB::table('bills')->select(DB::raw('*'))
            ->where('year', 'like', '%'.$year.'%')
            ->sum('amount');
        }
        else if(!empty($month) && empty($year)){
            $bills = Bill::where('month', 'like', '%'.$month.'%')
            ->orderBy('id', 'asc')
            ->get();

            $totalAmount = DB::table('bills')->select(DB::raw('*'))
            ->where('month', 'like', '%'.$month.'%')
            ->sum('amount');
        }

        return view('backend.pages.report.report', compact('bills', 'totalAmount'));

    }

    public function searchByZoneSubzone(Request $request){
        $zone_id = $request->get('zone_id');
        $subzone_id = $request->get('subzone_id');
        $totalAmount = 0;

        if (empty($zone_id) && empty($subzone_id)) {
            $bills = Bill::orderBy('id', 'asc')->get();

            $totalAmount = DB::table('bills')->select(DB::raw('*'))
            ->sum('amount');
        } 
        else if (!empty($zone_id) && !empty($subzone_id)){
            $bills = Bill::where('zone_id', 'like', '%'.$zone_id.'%')
            ->where('subzone_id', 'like', '%'.$subzone_id.'%')
            ->orderBy('id', 'asc')
            ->get();

            $totalAmount = DB::table('bills')->select(DB::raw('*'))
            ->where('zone_id', 'like', '%'.$zone_id.'%')
            ->where('subzone_id', 'like', '%'.$subzone_id.'%')
            ->sum('amount');
        }
        else if(!empty($zone_id) && empty($subzone_id)){
            $bills = Bill::where('zone_id', 'like', '%'.$zone_id.'%')
            ->orderBy('id', 'asc')
            ->get();

            $totalAmount = DB::table('bills')->select(DB::raw('*'))
            ->where('zone_id', 'like', '%'.$zone_id.'%')
            ->sum('amount');
        }

        return view('backend.pages.report.reportzonesubzone', compact('bills', 'totalAmount'));
    }


    public function index()
    {
        // Monthly Collect Amount
        $currentMonth = date('m');
        $totalNetbillMonth = DB::table('bills')->select(DB::raw('*'))
        ->whereRaw('MONTH(collection_date) = ?',[$currentMonth])
        ->where('connection_type', '=', 'Net Bill')
        ->sum('amount');

         $totalDishbillMonth = DB::table('bills')->select(DB::raw('*')) 
        ->whereRaw('MONTH(collection_date) = ?',[$currentMonth])
        ->where('connection_type', '=', 'Dish Bill')
        ->sum('amount');

        // Total Collect Amount

        $totalNetbill = DB::table('bills')->select(DB::raw('*'))
        ->where('connection_type', '=', 'Net Bill')
        ->sum('amount');

         $totalDishbill = DB::table('bills')->select(DB::raw('*'))
        ->where('connection_type', '=', 'Dish Bill')
        ->sum('amount');

        //This Month Connection
        $thisMonthNetConActive = DB::table('connections')
        ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
        ->where('connection_type', '=', 'Net Bill')
        ->where('status', '=', 'Active')
        ->count();

        $thisMonthNetConInactive = DB::table('connections')
        ->whereRaw('MONTH(updated_at) = ?',[$currentMonth])
        ->where('connection_type', '=', 'Net Bill')
        ->where('status', '=', 'Inactive')
        ->count();

        $thisMonthDishConActive = DB::table('connections')
        ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
        ->where('connection_type', '=', 'Dish Bill')
        ->where('status', '=', 'Active')
        ->count();

        $thisMonthDishConInactive = DB::table('connections')
        ->whereRaw('MONTH(updated_at) = ?',[$currentMonth])
        ->where('connection_type', '=', 'Dish Bill')
        ->where('status', '=', 'Inactive')
        ->count();

        // Count connection
        $totalNetCon = DB::table('connections')
        ->where('connection_type', '=', 'Net Bill')
        ->count();

        $totalDishCon = DB::table('connections')
        ->where('connection_type', '=', 'Dish Bill')
        ->count();

        // Count Zone & Subzone
        $totalNetZone = DB::table('zones')->count();

        $totalNetSubZone = DB::table('subzones')->count();

        $totalDishZone = DB::table('zones')->count();

        $totalDishSubZone = DB::table('subzones')->count();

        // Count Total Bill

        $totalDishBill = DB::table('bills')
        ->where('connection_type', '=', 'Dish Bill')
        ->count();

        $totalNetBill = DB::table('bills')
        ->where('connection_type', '=', 'Net Bill')
        ->count();

        return view('backend.pages.index', compact('totalDishbillMonth', 'totalNetbillMonth',
        'totalNetbill', 'totalDishbill', 'totalNetCon', 'totalDishCon', 'totalNetZone', 'totalNetSubZone',
        'totalDishZone', 'totalDishSubZone', 'totalDishBill', 'totalNetBill', 'thisMonthNetConActive',
        'thisMonthNetConInactive', 'thisMonthDishConActive', 'thisMonthDishConInactive'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
