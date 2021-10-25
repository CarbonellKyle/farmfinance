<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charts\ProgressChart;

class ProgressController extends Controller
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
        $seasons = DB::table('seasons')->get();
        $noOfSeasons = count($seasons);
        return view('progress.index', compact('noOfSeasons'));
    }

    public function lastfive()
    {
        $seasons = DB::table('seasons')->get();
        $noOfSeasons = count($seasons);
        return view('progress.lastfive', compact('noOfSeasons'));
    }

    public function comparefromlast()
    {
        $seasons = DB::table('seasons')->get();
        $noOfSeasons = count($seasons);
        return view('progress.comparefromlast', compact('noOfSeasons'));
    }
}
