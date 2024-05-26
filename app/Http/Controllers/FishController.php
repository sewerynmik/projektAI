<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFishRequest;
use App\Http\Requests\UpdateFishRequest;
use App\Models\Haul;
use App\Models\Fish;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class FishController extends Controller
{

    public function index()
    {
        $fishes = DB::table('fish')->paginate(10);
        return view('fish.index', compact('fishes'));
    }

    public function create(fish $fish)
    {
        if (!Gate::allows('create', $fish)) {
            return redirect()->back();
        }
        return view('fish.create');
    }

    public function show(Fish $fish)
    {
        return view('fish.show', ['fish' => $fish]);
    }

    public function edit(Fish $fish)
    {
        if (!Gate::allows('update', $fish)) {
            return redirect()->back();
        }
        return view('fish.edit', ['fish' => $fish,
            'houl' => Haul::all()]);
    }

    public function update(UpdateFishRequest $request, Fish $fish)
    {
        if (!Gate::allows('update', $fish)) {
            return redirect()->back();
        }
        $input = $request->all();
        $fish->update($input);
        return redirect()->route('fish.index');
    }

    public function destroy(Fish $fish)
    {
        if (!Gate::allows('delete', $fish)) {
            return redirect()->back();
        }
        if ($fish->relatedRecordsExist()) {
            return back()->with('error', 'Nie można usunąć ryby, ponieważ istnieją powiązane rekordy w innych tabelach.');
        }

        $fish->delete();
        return redirect()->route('fish.index');
    }

    public function store(StoreFishRequest $request, Fish $fish)
    {
        if (!Gate::allows('create', $fish)) {
            return redirect()->back();
        }
        $input = $request->all();

        Fish::create($input);

        return redirect()->route('fish.index')->with('success', 'Ryba została pomyślnie dodana.');
    }
}
