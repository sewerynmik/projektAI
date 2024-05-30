<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Fisherman;
use App\Models\Haul;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $hauls = Haul::where('fisherman_id', $user->fisherman_id)
            ->with('fish')
            ->select('fish_id', DB::raw('count(*) as total'))
            ->groupBy('fish_id')
            ->get();

        $fisheries = Haul::where('fisherman_id', $user->fisherman_id)
            ->with('fishery')
            ->select('fishery_id', DB::raw('count(*) as total'))
            ->groupBy('fishery_id')
            ->get();


        return view('user.index', compact('user', 'hauls', 'fisheries'));
    }

}
