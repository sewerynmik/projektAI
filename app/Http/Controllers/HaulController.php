<?php

namespace App\Http\Controllers;

use App\Models\Haul;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HaulController extends Controller
{
    public function index()
    {
        $hauls = Haul::with('fisherman', 'fish', 'fishery')->get();

        return view('haul.index', compact('hauls'));
    }
}
