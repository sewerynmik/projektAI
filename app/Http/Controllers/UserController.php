<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFishermanRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Fish;
use App\Models\Fisherman;
use App\Models\Haul;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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


    public function editPass()
    {
        $user = Auth::user();

        return view('user.editPass', compact('user'));
    }

    public function updatePass(UpdateUserRequest $request, User $user)
    {
        $user->update([
            'password' => Hash::make($request->newpass),
        ]);

        return redirect()->route('users.index')->with('success', 'Hasło zostało pomyślnie zaktualizowane!');
    }


    public function editName()
    {
        $user = Auth::user();

        return view('user.editName', compact('user'));
    }

    public function updateName(UpdateUserRequest $request, User $user)
    {
        $input = $request->all();
        $user->update($input);

        return redirect()->route('users.index');
    }

    public function editEmail()
    {
        $user = Auth::user();

        return view('user.editEmail', compact('user'));
    }

    public function updateEmail(UpdateUserRequest $request, User $user)
    {
        $input = $request->all();
        $user->update($input);
        return redirect()->route('users.index');
    }

    public function edit()
    {
        $user = Auth::user();

        return view('user.edit', compact('user'));
    }

    public function update(UpdateFishermanRequest $request, Fisherman $fisherman)
    {
        $input = $request->all();
        $fisherman->update($input);
        return redirect()->route('users.index');
    }
}
