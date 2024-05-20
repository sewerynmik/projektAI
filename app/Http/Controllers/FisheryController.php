<?php

namespace App\Http\Controllers;

use App\Models\Fishery;
use App\Models\Haul;
use Illuminate\Http\Request;

class FisheryController extends Controller
{
    public function index()
    {
        $fisheries = Fishery::all();
        return view('fishery.index', compact('fisheries'));
    }

    public function create()
    {
        return view('fishery.create');
    }

    public function store(Request $request)
    {
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
        $fishery = Fishery::findORFail($id);
        return view('fishery.edit', ['fishery' => $fishery,
            'houl' => Haul::all()]);
    }

    public function update(Request $request, $id)
    {

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
        $fishery = Fishery::findORFail($id);

        if ($fishery->relatedRecordsExist()) {
            return back()->with('error', 'Nie można usunąć łowiska, ponieważ istnieją powiązane rekordy w innych tabelach.');
        }

        $fishery->delete();
        return redirect()->route('fishery.index');
    }
}
