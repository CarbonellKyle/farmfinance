<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
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
        $seasons = DB::table('seasons')->orderBy('start_date', 'DESC')->paginate(5);
        $numRows = count($seasons);
        return view('history.index', compact('seasons', 'numRows'));
    }

    public function viewSeason($id)
    {
        $season = DB::table('seasons')->where('season_id', $id)->first();

        $wage = DB::table('labor_wages')->where('season_id', $id)->sum('wage');
        $matExpense = DB::table('material_expenses')->where('season_id', $id)->sum('cost');
        $tax = DB::table('taxes')->where('season_id', $id)->sum('amount');
        $totalExpenses = $wage + $matExpense + $tax; //Total Expenses of Current Season

        $totalYield = DB::table('yields')->where('season_id', $id)->sum('quantity'); //Total Yield of Current Season
        $totalRevenue = DB::table('revenues')->where('season_id', $id)->sum('total_price'); //Total Income of Current Season
        $profit = $totalRevenue - $totalExpenses; //Profit of Current Season

        return view('history.view', compact('season', 'totalExpenses', 'totalYield', 'totalRevenue', 'profit', 'wage', 'matExpense', 'tax'));
        
    }
}
