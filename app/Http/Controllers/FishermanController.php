<?php

namespace App\Http\Controllers;

use App\Models\Fisherman;
use App\Models\Haul;
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
        return view('fisherman.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'age' => 'required|numeric|digits_between:1,3',
            'phone_number' => 'required|numeric|digits:9|unique:fishermen,phone_number,',
            'address' => 'required'
        ]);

        $fisherman = new Fisherman();
        $fisherman->name = $validatedData['name'];
        $fisherman->surname = $validatedData['surname'];
        $fisherman->age = $validatedData['age'];
        $fisherman->phone_number = $validatedData['phone_number'];
        $fisherman->address = $validatedData['address'];

        $fisherman->save();

        return redirect()->route('fisherman.index')->with('success', 'Ryba została pomyślnie dodana.');
    }

    public function edit($id)
    {
        $fisherman = Fisherman::findORFail($id);
        return view('fisherman.edit', ['fisherman' => $fisherman, 'hauls' => Haul::all()]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'age' => 'required|numeric|digits_between:1,3',
            'phone_number' => 'required|numeric|digits:9|unique:fishermen,phone_number,'.$id,
            'address' => 'required',
        ]);

        $fisherman = Fisherman::findOrFail($id);
        $input = $request->all();
        $fisherman->update($input);
        return redirect()->route('fisherman.index');
    }

    public function destroy($id)
    {
        $fisherman = Fisherman::findORFail($id);

        if ($fisherman->relatedRecordsExist()) {
            return back()->with('error', 'Nie można usunąć rybaka, ponieważ istnieją powiązane rekordy w innych tabelach.');
        }

        $fisherman->delete();
        return redirect()->route('fisherman.index');
    }
}
