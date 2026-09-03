<?php

namespace App\Http\Controllers;

use App\Models\Species;
use App\Models\AquariumSpecies;
use Illuminate\Http\Request;

class AdminUnregisteredSpeciesController extends Controller
{
    public function index()
    {
        $species = AquariumSpecies::with('aquarium')
         ->whereNull('species_id')
         ->whereNotNull('name')
         ->where('name', '!=', '')
         ->latest()
         ->paginate(10);

        return view(
            'admin.unregistered-species.index',
            compact('species')
        );
    }

    public function approve(
    AquariumSpecies $aquariumSpecies
    )
    {
    return view(
        'admin.unregistered-species.approve',
        compact('aquariumSpecies')
    );
    }

    public function store(
    Request $request,
    AquariumSpecies $aquariumSpecies
    )
    {
    $request->validate([
        'name' => ['required'],
        'scientific_name' => ['nullable'],
        'classification' => ['nullable'],
        'order_name' => ['nullable'],
        'family_name' => ['nullable'],
        'description' => ['required'],
    ]);

    $species = Species::create([
        'name' => $request->name,
        'scientific_name' => $request->scientific_name,
        'classification' => $request->classification,
        'order_name' => $request->order_name,
        'family_name' => $request->family_name,
        'description' => $request->description,
        'image_path' => $aquariumSpecies->image_path,
    ]);

    $aquariumSpecies->update([
        'species_id' => $species->id,
    ]);

    return redirect()
        ->route('admin.unregistered-species.index')
        ->with(
            'success',
            '図鑑へ登録しました'
        );
    }

    public function destroy(
    AquariumSpecies $aquariumSpecies
    )
    {
    $aquariumSpecies->delete();

    return redirect()
        ->route(
            'admin.unregistered-species.index'
        )
        ->with(
            'success',
            '未登録生物を削除しました'
        );
    }

}