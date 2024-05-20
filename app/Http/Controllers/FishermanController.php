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

    }

    public function edit($id)
    {
        $fisherman = Fisherman::findORFail($id);
        return view('fisherman.edit', ['fisherman' => $fisherman, 'hauls' => Haul::all()]);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        $fisherman = Fisherman::findORFail($id);

        if ($fisherman->relatedRecordsExist()) {
            return back()->with('error', 'Nie można usunąć ryby, ponieważ istnieją powiązane rekordy w innych tabelach.');
        }

        $fisherman->delete();
        return redirect()->route('fisherman.index');
    }
}
