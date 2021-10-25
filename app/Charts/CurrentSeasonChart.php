<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrentSeasonChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */


    public function handler(Request $request): Chartisan
    {
        $lastSeason = DB::table('seasons')->orderBy('start_date', 'DESC')->first();

        $wage = DB::table('labor_wages')->where('season_id', $lastSeason->season_id)->sum('wage');
        $matExpense = DB::table('material_expenses')->where('season_id', $lastSeason->season_id)->sum('cost');
        $tax = DB::table('taxes')->where('season_id', $lastSeason->season_id)->sum('amount');
        $expenses = $wage + $matExpense + $tax; //Total Expenses of Current Season
        //$yield = DB::table('yields')->where('season_id', $lastSeason->season_id)->sum('quantity'); //Total Yield of Current Season
        $revenue = DB::table('revenues')->where('season_id', $lastSeason->season_id)->sum('total_price'); //Total Income of Current Season
        $profit = $revenue - $expenses; //Profit of Current Season

        return Chartisan::build()
            ->labels(['Current Season'])
            ->dataset('Expenses', [$expenses])
            ->dataset('Revenue', [$revenue])
            ->dataset('Profit', [$profit]);
    }
}