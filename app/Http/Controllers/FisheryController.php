<?php

namespace App\Http\Controllers;

use App\Models\Fishery;
use Illuminate\Http\Request;

class FisheryController extends Controller
{
    public function index()
    {
        $fisheries = Fishery::all();
        return view('fishery.index', compact('fisheries'));
    }
}
