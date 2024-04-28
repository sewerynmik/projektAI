<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE App\Models\Fish;

class FishController extends Controller
{
    public function index()
    {
        $fishes = Fish::all();
        return view('fish.index', compact('fishes'));
    }
}
