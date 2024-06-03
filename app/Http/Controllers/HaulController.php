<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHaulRequest;
use App\Models\Fish;
use App\Models\Fisherman;
use App\Models\Fishery;
use App\Models\Haul;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HaulController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        if ($user->isAdmin()){
            $hauls = Haul::with('fisherman', 'fish', 'fishery')->get();
        }else{
            $hauls = Haul::where('fisherman_id', $user->fisherman_id)
                ->with('fisherman', 'fish', 'fishery')
                ->get();
        }

        return view('haul.index', compact('hauls'));
    }

    public function add()
    {
        $fishermen = Fisherman::all();
        $fish = Fish::all();
        $fisheries = Fishery::all();

        return view('haul.add', compact('fishermen', 'fish', 'fisheries'));
    }

    public function create()
    {
        if (Gate::allows('create')){
            return redirect()->back();
        }
        $fishermen = Fisherman::all();
        $fish = Fish::all();
        $fisheries = Fishery::all();

        return view('haul.create', compact('fishermen', 'fish', 'fisheries'));
    }


    public function store(StoreHaulRequest $request)
    {
        $input = $request->all();

        Haul::create($input);

        return redirect()->route('haul.index')->with('success', 'Połów został zapisany.');
    }

    public function edit(Haul $haul)
    {
        if (! Gate::allows('update', $haul)) {
            return redirect()->back();
        }
        $fishermen = Fisherman::all();
        $fish = Fish::all();
        $fisheries = Fishery::all();

        return view('haul.edit', compact('haul', 'fishermen', 'fish', 'fisheries'));
    }

    public function update(StoreHaulRequest $request, Haul $haul)
    {
        if (! Gate::allows('update', $haul)) {
            return redirect()->back();
        }
        $input = $request->all();
        $haul->update($input);
        return redirect()->route('haul.index')->with('success', 'Dane połowu zostały zaktualizowane.');
    }

    public function destroy(Haul $haul){
        if (! Gate::allows('delete', $haul)) {
            return redirect()->back();
        }

        $haul->delete();
        return redirect()->route('haul.index')->with('success', 'Usunięto połów');
    }
}
