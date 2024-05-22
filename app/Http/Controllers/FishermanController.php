<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFishermanRequest;
use App\Models\Fisherman;
use App\Models\Haul;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class FishermanController extends Controller
{
    public function index()
    {
        $fishermans = Fisherman::all();
        return view('fisherman.index', compact('fishermans'));
    }

    public function create()
    {
        if (!Gate::allows('create')) {
            return redirect()->back();
        }
        return view('fisherman.create');
    }

    public function store(StoreFishermanRequest $request)
    {
        if (!Gate::allows('create')) {
            return redirect()->back();
        }
        $input = $request->all();

        Fisherman::create($input);

        return redirect()->route('fisherman.index')->with('success', 'Ryba została pomyślnie dodana.');
    }

    public function edit(Fisherman $fisherman)
    {
        return view('fisherman.edit', ['fisherman' => $fisherman, 'hauls' => Haul::all()]);
    }

    public function update(Request $request, Fisherman $fisherman)
    {

        $input = $request->all();
        $fisherman->update($input);
        return redirect()->route('fisherman.index');
    }

    public function destroy(Fisherman $fisherman)
    {
        if (!Gate::allows('delete')) {
            return redirect()->back();
        }

        if ($fisherman->relatedRecordsExist()) {
            return back()->with('error', 'Nie można usunąć rybaka, ponieważ istnieją powiązane rekordy w innych tabelach.');
        }

        $fisherman->delete();
        return redirect()->route('fisherman.index');
    }
}
