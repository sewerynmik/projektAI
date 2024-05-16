<?php

namespace App\Http\Controllers;

use App\Models\Haul;
use Illuminate\Http\Request;
use App\Models\Fish;
use Illuminate\Support\Facades\DB;

class FishController extends Controller
{
    public function index()
    {
        $fishes = DB::table('fish')->paginate(10);
        return view('fish.index', compact('fishes'));
    }

    public function create()
    {
        return view('fish.create');
    }

    public function show($id)
    {
        return view('fish.show', ['fish' => Fish::findOrFail($id)]);
    }

    public function edit($id)
    {
        $fish = Fish::findORFail($id);
        return view('fish.edit', ['fish' => $fish,
            'houl' => Haul::all()]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:fish,name,'.$id,
            'species' => 'required|string',
            'description' => 'required|string',
            'image' => 'required',
        ]);

        $fish = Fish::findOrFail($id);
        $input = $request->all();
        $fish->update($input);
        return redirect()->route('fish.index');
    }
}
