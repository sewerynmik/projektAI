<?php

namespace App\Http\Controllers;

use App\Models\Haul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HaulController extends Controller
{
    public function index()
    {
        //DB::enableQueryLog();

        //$hauls = Haul::all();
        $hauls = Haul::with('fisherman', 'fish', 'fishery')->get();

        //$queries = DB::getQueryLog();
        //dd($queries);

        return view('haul.index', compact('hauls'));
    }
}
