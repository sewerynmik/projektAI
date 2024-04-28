<?php

namespace App\Http\Controllers;

use App\Models\Fisherman;
use Illuminate\Http\Request;

class FishermanController extends Controller
{
    public function index()
    {
        $fishermans = Fisherman::all();
        return view('fisherman.index', compact('fishermans'));
    }
}
