<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
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
        $isCurrent = false;

        $lastSeason = DB::table('seasons')->orderBy('start_date', 'DESC')->first(); //latest inserted
        $reminder = DB::table('reminders')->first();

        //if no seasons yet
        if(empty($lastSeason)){
            return view('dashboard.index')->with('isCurrent', false)->with('profit', 0)->with('reminder', $reminder);
        }

        //If last season has ended, therefore, there is no active season
        if($lastSeason->end_date!=null){
            return view('dashboard.index')->with('isCurrent', false)->with('profit', 0)->with('reminder', $reminder);
        }

        $isCurrent = true;

        $wage = DB::table('labor_wages')->where('season_id', $lastSeason->season_id)->sum('wage');
        $matExpense = DB::table('material_expenses')->where('season_id', $lastSeason->season_id)->sum('cost');
        $tax = DB::table('taxes')->where('season_id', $lastSeason->season_id)->sum('amount');
        $totalExpenses = $wage + $matExpense + $tax; //Total Expenses of Current Season

        $totalYield = DB::table('yields')->where('season_id', $lastSeason->season_id)->sum('quantity'); //Total Yield of Current Season
        $totalRevenue = DB::table('revenues')->where('season_id', $lastSeason->season_id)->sum('total_price'); //Total Income of Current Season
        $profit = $totalRevenue - $totalExpenses; //Profit of Current Season

        return view('dashboard.index', compact('isCurrent', 'lastSeason', 'totalExpenses', 'totalYield', 'totalRevenue', 'profit', 'wage', 'matExpense', 'tax', 'reminder')); 
    }

    public function startSeason(Request $request)
    {
        DB::table('seasons')->insert([
            'start_date' => $request->created_at
        ]);

        return back();
    }

    public function endSeason(Request $request)
    {
        $lastSeason = DB::table('seasons')->orderBy('start_date', 'DESC')->first();

        $wage = DB::table('labor_wages')->where('season_id', $lastSeason->season_id)->sum('wage');
        $matExpense = DB::table('material_expenses')->where('season_id', $lastSeason->season_id)->sum('cost');
        $tax = DB::table('taxes')->where('season_id', $lastSeason->season_id)->sum('amount');
        $totalExpenses = $wage + $matExpense + $tax; //Total Expenses of Current Season
        $totalRevenue = DB::table('revenues')->where('season_id', $lastSeason->season_id)->sum('total_price'); //Total Income of Current Season
        $profit = $totalRevenue - $totalExpenses; //Profit of Current Season

        DB::table('seasons')->where('season_id', $lastSeason->season_id)->update([
            'end_date' => now(),
        ]);

        return back();
    }

    public function updateReminder(Request $request)
    {
        DB::table('reminders')->where('reminder_id', $request->id)->update([
            'reminder' => $request->reminder
        ]);
        return back();
    }
}
