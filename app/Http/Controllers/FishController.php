<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFishRequest;
use App\Http\Requests\UpdateFishRequest;
use App\Models\Haul;
use App\Models\Fish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class FishController extends Controller
{

    public function index()
    {
        $fishes = DB::table('fish')->paginate(10);
        return view('fish.index', compact('fishes'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $searchBy = $request->input('search_by');

        $query = Fish::query();

        if (!empty($searchTerm) && !empty($searchBy)) {
            switch ($searchBy) {
                case 'name':
                    $query->where('name', 'like', "%$searchTerm%");
                    break;
                case 'species':
                    $query->where('species', 'like', "%$searchTerm%");
                    break;
                case 'description':
                    $query->where('description', 'like', "%$searchTerm%");
                    break;
                case 'image':
                    $query->where('image', 'like', "%$searchTerm%");
                    break;
                default:
                    break;
            }
        }

        $fishes = $query->paginate(10);

        return view('fish.search', compact('fishes'));
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
        return redirect()->route('fish.index')->with('success', 'Dane ryby zostały zaktualizowane');
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
        return redirect()->route('fish.index')->with('success', 'Usunięto rybę.');
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

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $originalName = $request->file('image')->getClientOriginalName();

        $request->file('image')->storeAs('public/img', $originalName);

        return back()->with('success','Zdjęcie zostało pomyślnie dodane.');
    }
}
