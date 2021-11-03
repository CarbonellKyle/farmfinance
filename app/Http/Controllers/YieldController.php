<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class YieldController extends Controller
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
            return view('yield.index', ['inactive' => 'You need to start a season first!', 'numRows' => 0, 'monthly_count' => 0]);
        }

        //if season is not started yet
        if($lastSeason->end_date!=null){
            return view('yield.index', ['inactive' => 'You need to start a season first!', 'numRows' => 0, 'monthly_count' => 0]);
        }

        $season_id = $lastSeason->season_id;

        //Get yields this month only
        $now = Carbon::now();
        $monthly_yields = DB::table('yields')->where('season_id', $season_id)->whereMonth('date', $now->month)->orderBy('date', 'DESC')->paginate(5);
        $monthly_count = count($monthly_yields);
        $month = '';
        switch($now->month){
            case 1: $month = 'January'; break;
            case 2: $month = 'February'; break;
            case 3: $month = 'March'; break;
            case 4: $month = 'April'; break;
            case 5: $month = 'May'; break;
            case 6: $month = 'June'; break;
            case 7: $month = 'July'; break;
            case 8: $month = 'August'; break;
            case 9: $month = 'September'; break;
            case 10: $month = 'October'; break;
            case 11: $month = 'November'; break;
            case 12: $month = 'December'; break;
        }

        //Get All Yields Records this Season
        $yields = DB::table('yields')->where('season_id', $season_id)->orderBy('date', 'DESC')->paginate(5);
        $numRows = count($yields);

        //Get total yields this season
        $total = DB::table('yields')->where('season_id', $season_id)->sum('quantity');

        return view('yield.index', compact('yields', 'numRows', 'monthly_yields', 'monthly_count', 'total', 'month', 'season_id'));
    }

    public function addYield()
    {
        $lastSeason = DB::table('seasons')->orderBy('start_date', 'DESC')->first(); //current season
        $season_id = $lastSeason->season_id;
        return view('yield.add', compact('season_id'));
    }

    public function addYieldSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'season_id' => 'required',
            'unit' => 'required',
            'quantity' => 'required',
            'date' => 'required'
        ]);

        DB::table('yields')->insert([
            'season_id' => $request->season_id,
            'unit' => $request->unit,
            'quantity' => $request->quantity,
            'date' => $request->date
        ]);
        return back()->with('record_added', 'Purchase has been recorded!');
    }

    public function editYield($id)
    {
        $yield = DB::table('yields')->where('yield_id', $id)->first();
        return view('yield.edit', compact('yield'));
    }

    public function updateYield(Request $request)
    {
        $validatedData = $request->validate([
            'unit' => 'required',
            'quantity' => 'required',
            'date' => 'required'
        ]);

        DB::table('yields')->where('yield_id', $request->id)->update([
            'unit' => $request->unit,
            'quantity' => $request->quantity,
            'date' => $request->date
        ]);
        return back()->with('record_updated', 'Record Updated Successfully!');
    }

    public function deleteYield($id){
        DB::table('yields')->where('yield_id', $id)->delete();
        return back()->with('record_deleted', 'Record has been deleted!');
    }
}
