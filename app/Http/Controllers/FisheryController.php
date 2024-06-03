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

    public function create(Fishery $fishery)
    {
        if (!Gate::allows('create', $fishery)) {
            return redirect()->back();
        }
        return view('fishery.create');
    }

    public function store(StoreFisheryRequest $request, Fishery $fishery)
    {
        if (!Gate::allows('create', $fishery)) {
            return redirect()->back();
        }

        $input = $request->all();

        Fishery::create($input);

        return redirect()->route('fishery.index')->with('success', 'Łowisko zostało pomyślnie dodane.');
    }

    public function edit(Fishery $fishery)
    {
        if (!Gate::allows('update', $fishery)) {
            return redirect()->back();
        }

        return view('fishery.edit', ['fishery' => $fishery,
            'houl' => Haul::all()]);
    }

    public function update(Request $request, Fishery $fishery)
    {
        if (!Gate::allows('update', $fishery)) {
            return redirect()->back();
        }

        $input = $request->all();
        $fishery->update($input);
        return redirect()->route('fishery.index')->with('success', 'Dane łowiska zostały zaktualizowane.');
    }

    public function destroy(Fishery $fishery)
    {
        if (!Gate::allows('delete', $fishery)) {
            return redirect()->back();
        }

        if ($fishery->relatedRecordsExist()) {
            return back()->with('error', 'Nie można usunąć łowiska, ponieważ istnieją powiązane rekordy w innych tabelach.');
        }

        $fishery->delete();
        return redirect()->route('fishery.index')->with('success', 'Usunięto łowsiko');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $searchBy = $request->input('search_by');

        $query = Fishery::query();

        if (!empty($searchTerm) && !empty($searchBy)) {
            switch ($searchBy) {
                case 'name':
                    $query->where('name', 'like', "%$searchTerm%");
                    break;
                case 'voivodeship':
                    $query->where('voivodeship', 'like', "%$searchTerm%");
                    break;
                case 'parish':
                    $query->where('parish', 'like', "%$searchTerm%");
                    break;
                case 'locality':
                    $query->where('locality', 'like', "%$searchTerm%");
                    break;
                default:
                    break;
            }
        }

        $fisheries = $query->get();

        return view('fishery.search', compact('fisheries'));
    }

}
