<?php

namespace App\Http\Controllers;

use App\Models\AquariumSpecies;
use App\Models\Species;
use Illuminate\Http\Request;

class StaffAquariumSpeciesController extends Controller
{
    public function index()
    {
        $aquariumId = auth()->user()
            ->aquariumStaff
            ->aquarium_id;

        $species = AquariumSpecies::with([
           'species',
           'species.areas'
        ])
        ->where(
            'aquarium_id',
            $aquariumId
        )
        ->latest()
        ->get();

        return view(
            'staff.species.index',
            compact('species')
        );
    }
    public function create()
    {
    $species = Species::orderBy('name')
        ->get();

    return view(
        'staff.species.create',
        compact('species')
    );
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => ['required', 'max:100'],
        'scientific_name' => ['nullable', 'max:255'],
        'classification' => ['nullable', 'max:100'],
        'order_name' => ['nullable', 'max:100'],
        'family_name' => ['nullable', 'max:100'],
        'dictionary_description' => ['nullable'],
        'image' => ['nullable', 'image'],
    ]);

    $path = null;

    if ($request->hasFile('image')) {

        $path = $request
            ->file('image')
            ->store(
                'aquarium-species',
                'public'
            );

        $path = 'storage/' . $path;
    }

    AquariumSpecies::create([
        'aquarium_id' => auth()->user()
            ->aquariumStaff
            ->aquarium_id,

        'species_id' => 1,

        'name' => $request->name,
        'scientific_name' => $request->scientific_name,
        'classification' => $request->classification,
        'order_name' => $request->order_name,
        'family_name' => $request->family_name,
        'dictionary_description' => $request->dictionary_description,

        'description' => null,

        'image_path' => $path,
    ]);

    return redirect()
        ->route('staff.species.index')
        ->with(
            'success',
            '生き物を登録しました'
        );
    }

    public function edit(
    AquariumSpecies $species
    )
    {
    return view(
        'staff.species.edit',
        compact('species')
    );
    }
    
    public function update(
    Request $request,
    AquariumSpecies $species
    )
    {
    $request->validate([
        'name' => ['required', 'max:100'],
        'scientific_name' => ['nullable'],
        'classification' => ['nullable'],
        'order_name' => ['nullable'],
        'family_name' => ['nullable'],
        'dictionary_description' => ['nullable'],
        'image' => ['nullable', 'image'],
    ]);

    $data = [
        'name' => $request->name,
        'scientific_name'
            => $request->scientific_name,
        'classification'
            => $request->classification,
        'order_name'
            => $request->order_name,
        'family_name'
            => $request->family_name,
        'dictionary_description'
            => $request->dictionary_description,
    ];

    if ($request->hasFile('image')) {

        $path = $request
            ->file('image')
            ->store(
                'aquarium-species',
                'public'
            );

        $data['image_path']
            = 'storage/' . $path;
    }

    $species->update($data);

    return redirect()
        ->route('staff.species.index')
        ->with(
            'success',
            '生き物情報を更新しました'
        );
    }

    public function destroy(
    AquariumSpecies $species
    )
    {
    $species->delete();

    return redirect()
        ->route('staff.species.index')
        ->with(
            'success',
            '生き物を削除しました'
        );
    }
}