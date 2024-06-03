<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFishermanRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateFishermanRequest;
use App\Models\Fisherman;
use App\Models\Haul;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FishermanController extends Controller
{
    public function index(Fisherman $fisherman)
    {
        if(!Gate::allows('view', $fisherman)){
            return redirect()->back();
        }

        $fishermans = Fisherman::all();
        return view('fisherman.index', compact('fishermans'));
    }

    public function create(Fisherman $fisherman)
    {
        if (!Gate::allows('create', $fisherman)) {
            return redirect()->back();
        }
        return view('fisherman.create');
    }

    public function store(StoreUserRequest $request)
    {
        $fisherman = Fisherman::create([
            'name' => $request->fisherman_name,
            'surname' => $request->surname,
            'age' => $request->age,
            'phone_number' => $request->phone_number,
            'pesel' => $request->pesel,
        ]);

        $user = User::create([
            'name' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'u',
            'fisherman_id' => $fisherman->id,
        ]);


        $user->fisherman()->associate($fisherman);
        $user->save();

        return redirect()->route('fisherman.index');
    }

    public function edit(Fisherman $fisherman)
    {
        return view('fisherman.edit', ['fisherman' => $fisherman, 'hauls' => Haul::all()]);
    }

    public function update(UpdateFishermanRequest $request, Fisherman $fisherman)
    {
        if (!Gate::allows('update', $fisherman)) {
            return redirect()->back();
        }

        $input = $request->all();
        $fisherman->update($input);
        return redirect()->route('fisherman.index')->with('success', 'Zaktualizowano dane rybaka.');
    }

    public function destroy(Fisherman $fisherman)
    {
        if (!Gate::allows('delete', $fisherman)) {
            return redirect()->back();
        }

        if ($fisherman->relatedRecordsExist()) {
            return back()->with('error', 'Nie można usunąć rybaka, ponieważ istnieją powiązane rekordy w innych tabelach.');
        }

        $fisherman->delete();
        return redirect()->route('fisherman.index')->with('success', 'Usunięto rybaka.');
    }

}
