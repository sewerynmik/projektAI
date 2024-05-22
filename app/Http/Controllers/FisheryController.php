<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFisheryRequest;
use App\Models\Fishery;
use App\Models\Haul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FisheryController extends Controller
{
    public function index()
    {
        $fisheries = Fishery::all();
        return view('fishery.index', compact('fisheries'));
    }

    public function create()
    {
        if (!Gate::allows('create')) {
            return redirect()->back();
        }
        return view('fishery.create');
    }

    public function store(StoreFisheryRequest $request)
    {
        if (!Gate::allows('create')) {
            return redirect()->back();
        }

        $input = $request->all();

        Fishery::create($input);

        return redirect()->route('fishery.index')->with('success', 'Łowisko zostało pomyślnie dodane.');
    }

    public function edit(Fishery $fishery)
    {
        if (!Gate::allows('edit')) {
            return redirect()->back();
        }

        return view('fishery.edit', ['fishery' => $fishery,
            'houl' => Haul::all()]);
    }

    public function update(Request $request, Fishery $fishery)
    {

        $input = $request->all();
        $fishery->update($input);
        return redirect()->route('fishery.index');
    }

    public function destroy(Fishery $fishery)
    {
        if (!Gate::allows('delete')) {
            return redirect()->back();
        }

        if ($fishery->relatedRecordsExist()) {
            return back()->with('error', 'Nie można usunąć łowiska, ponieważ istnieją powiązane rekordy w innych tabelach.');
        }

        $fishery->delete();
        return redirect()->route('fishery.index');
    }
}
