<?php

namespace App\Http\Controllers;

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
        if (! Gate::allows('create')){
            return redirect()->back();
        }
        return view('fishery.create');
    }

    public function store(Request $request)
    {
        if (! Gate::allows('create')){
            return redirect()->back();
        }
        $validatedData = $request->validate([
            'name' => 'required|string|unique:fish,name,',
            'voivodeship' => 'required|string',
            'parish' => 'required|string',
            'locality' => 'required|string',
        ]);

        $fishery = new Fishery();
        $fishery->name = $validatedData['name'];
        $fishery->voivodeship = $validatedData['voivodeship'];
        $fishery->parish = $validatedData['parish'];
        $fishery->locality = $validatedData['locality'];


        $fishery->save();

        return redirect()->route('fishery.index')->with('success', 'Łowisko zostało pomyślnie dodane.');
    }

    public function edit($id)
    {
        if (! Gate::allows('edit')){
            return redirect()->back();
        }
        $fishery = Fishery::findORFail($id);
        return view('fishery.edit', ['fishery' => $fishery,
            'houl' => Haul::all()]);
    }

    public function update(Request $request, $id)
    {
        if (! Gate::allows('edit')){
            return redirect()->back();
        }

        $request->validate([
            'name' => 'required|string|unique:fish,name,' . $id,
            'voivodeship' => 'required|string',
            'parish' => 'required|string',
            'locality' => 'required|string',
        ]);

        $fishery = Fishery::findOrFail($id);
        $input = $request->all();
        $fishery->update($input);
        return redirect()->route('fishery.index');
    }

    public function destroy($id)
    {
        if (! Gate::allows('delete')){
            return redirect()->back();
        }
        $fishery = Fishery::findORFail($id);

        if ($fishery->relatedRecordsExist()) {
            return back()->with('error', 'Nie można usunąć łowiska, ponieważ istnieją powiązane rekordy w innych tabelach.');
        }

        $fishery->delete();
        return redirect()->route('fishery.index');
    }
}
