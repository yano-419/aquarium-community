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

    $query = AquariumSpecies::with('areas')
    ->where(
        'aquarium_id',
        $aquariumId
    );

    if ($keyword = request('keyword')) {

        $query->where(function ($q) use ($keyword) {

            $q->where(
                'name',
                'like',
                "%{$keyword}%"
            )
            ->orWhere(
                'scientific_name',
                'like',
                "%{$keyword}%"
            )
            ->orWhere(
                'classification',
                'like',
                "%{$keyword}%"
            );

        });
    }

    $species = $query
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
        'description' => ['nullable'],
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

    $masterSpecies = Species::where(
     'name',
     $request->name
     )->first();

     AquariumSpecies::create([
     'aquarium_id' => auth()->user()
        ->aquariumStaff
        ->aquarium_id,

     'species_id' => $masterSpecies?->id,

     'name' => $request->name,
     'scientific_name' => $request->scientific_name,
     'classification' => $request->classification,
     'order_name' => $request->order_name,
     'family_name' => $request->family_name,

     'description' => $request->description,

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
        'description' => ['nullable'],
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
        'description'
            => $request->description,
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