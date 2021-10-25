<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function currentSeason()
    {
        $isCurrent = false;

        $lastSeason = DB::table('seasons')->orderBy('start_date', 'DESC')->first(); //latest inserted

        //if no seasons yet
        if(empty($lastSeason)){
            return view('guest.currentSeason')->with('isCurrent', false)->with('profit', 0);
        }

        if($lastSeason->end_date==null){
            $isCurrent = true;
        }

        $wage = DB::table('labor_wages')->where('season_id', $lastSeason->season_id)->sum('wage');
        $matExpense = DB::table('material_expenses')->where('season_id', $lastSeason->season_id)->sum('cost');
        $tax = DB::table('taxes')->where('season_id', $lastSeason->season_id)->sum('amount');
        $totalExpenses = $wage + $matExpense + $tax; //Total Expenses of Current Season

        $totalYield = DB::table('yields')->where('season_id', $lastSeason->season_id)->sum('quantity'); //Total Yield of Current Season
        $totalRevenue = DB::table('revenues')->where('season_id', $lastSeason->season_id)->sum('total_price'); //Total Income of Current Season
        $profit = $totalRevenue - $totalExpenses; //Profit of Current Season

        return view('guest.currentSeason', compact('isCurrent', 'lastSeason', 'totalExpenses', 'totalYield', 'totalRevenue', 'profit', 'wage', 'matExpense', 'tax'));
    }

    public function history()
    {
        $seasons = DB::table('seasons')->orderBy('start_date', 'DESC')->paginate(5);
        $numRows = count($seasons);
        return view('guest.history', compact('seasons', 'numRows'));
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

        return view('guest.viewSeason', compact('season', 'totalExpenses', 'totalYield', 'totalRevenue', 'profit', 'wage', 'matExpense', 'tax'));
        
    }

    public function progress()
    {
        $seasons = DB::table('seasons')->get();
        $noOfSeasons = count($seasons);
        return view('guest.progress', compact('noOfSeasons'));
    }

    public function lastfive()
    {
        $seasons = DB::table('seasons')->get();
        $noOfSeasons = count($seasons);
        return view('guest.lastfive', compact('noOfSeasons'));
    }

    public function comparefromlast()
    {
        $seasons = DB::table('seasons')->get();
        $noOfSeasons = count($seasons);
        return view('guest.comparefromlast', compact('noOfSeasons'));
    }
}
