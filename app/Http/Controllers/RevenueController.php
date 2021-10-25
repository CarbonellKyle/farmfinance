<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RevenueController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        $lastSeason = DB::table('seasons')->orderBy('start_date', 'DESC')->first();
        //if no seasons yet
        if(empty($lastSeason)){
            return view('revenue.index', ['inactive' => 'You need to start a season first!', 'numRows' => 0, 'monthly_count' => 0]);
        }

        //if season is not started yet
        if($lastSeason->end_date!=null){
            return view('revenue.index', ['inactive' => 'You need to start a season first!', 'numRows' => 0, 'monthly_count' => 0]);
        }

        //Get revenue this month only
        $now = Carbon::now();
        $monthly_revenues = DB::table('revenues')->where('season_id', $lastSeason->season_id)->whereMonth('date', $now->month)->orderBy('date', 'DESC')->paginate(5);
        $monthly_count = count($monthly_revenues);

        //Get All Revenue this Season
        $revenues = DB::table('revenues')->where('season_id', $lastSeason->season_id)->orderBy('date', 'DESC')->paginate(5);
        $numRows = count($revenues);

        //Get total revenue this season
        $total = DB::table('revenues')->where('season_id', $lastSeason->season_id)->sum('total_price'); //Total Income of Current Season

        return view('revenue.index', compact('revenues', 'numRows', 'monthly_revenues', 'monthly_count', 'total'));
    }

    public function addRevenue()
    {
        $lastSeason = DB::table('seasons')->orderBy('start_date', 'DESC')->first(); //current season
        $season_id = $lastSeason->season_id;
        return view('revenue.add', compact('season_id'));
    }

    public function addRevenueSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'season_id' => 'required',
            'unit' => 'required',
            'quantity' => 'required',
            'price_per_unit' => 'required',
            'total_price' => 'required',
            'date' => 'required'
        ]);

        DB::table('revenues')->insert([
            'season_id' => $request->season_id,
            'unit' => $request->unit,
            'quantity' => $request->quantity,
            'price_per_unit' => $request->price_per_unit,
            'total_price' => $request->total_price,
            'date' => $request->date
        ]);
        return back()->with('record_added', 'Purchase has been recorded!');
    }

    public function editRevenue($id)
    {
        $revenue = DB::table('revenues')->where('revenue_id', $id)->first();
        return view('revenue.edit', compact('revenue'));
    }

    public function updateRevenue(Request $request)
    {
        $validatedData = $request->validate([
            'unit' => 'required',
            'quantity' => 'required',
            'price_per_unit' => 'required',
            'total_price' => 'required',
            'date' => 'required'
        ]);

        DB::table('revenues')->where('revenue_id', $request->id)->update([
            'unit' => $request->unit,
            'quantity' => $request->quantity,
            'price_per_unit' => $request->price_per_unit,
            'total_price' => $request->total_price,
            'date' => $request->date
        ]);
        return back()->with('record_updated', 'Record Updated Successfully!');
    }

    public function deleteRevenue($id){
        DB::table('revenues')->where('revenue_id', $id)->delete();
        return back()->with('record_deleted', 'Record has been deleted!');
    }
}
