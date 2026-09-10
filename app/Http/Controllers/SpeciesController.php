<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Species;

class SpeciesController extends Controller
{
   public function index()
    {
    $species = Species::query();

    if (request('keyword')) {

        $species->where(
            'name',
            'like',
            '%' . request('keyword') . '%'
        );

    }

    $species = $species->paginate(12);
    return view('user.species.index', compact('species'));
    }

    public function show(Species $species)
{
    $areas = Area::whereHas(
        'species',
        function ($query) use ($species) {

            $query->where(
                'species_id',
                $species->id
            );

        }
    )
    ->with('aquarium')
    ->take(2)
    ->get();

    if (request('from') === 'favorites') {

    $favoriteIds = auth()->user()
        ->favorites()
        ->pluck('species_id')
        ->toArray();

    $prevSpecies = Species::whereIn('id', $favoriteIds)
        ->where('id', '<', $species->id)
        ->orderByDesc('id')
        ->first();

    $nextSpecies = Species::whereIn('id', $favoriteIds)
        ->where('id', '>', $species->id)
        ->orderBy('id')
        ->first();

} else {

    $prevSpecies = Species::where(
        'id',
        '<',
        $species->id
    )
    ->orderByDesc('id')
    ->first();

    $nextSpecies = Species::where(
        'id',
        '>',
        $species->id
    )
    ->orderBy('id')
    ->first();

}

    return view(
        'user.species.show',
        compact(
            'species',
            'areas',
            'prevSpecies',
            'nextSpecies'
        )
    );
}
    public function aquariums(Species $species)
    { 
    $species->load('aquariums');

    return view(
        'user.species.aquariums',
        compact('species')
    );
    }

   public function areas(Species $species)
    {
    $areas = Area::whereHas(
        'species',
        function ($query) use ($species) {

            $query->where(
                'species_id',
                $species->id
            );

        }
    )
    ->with('aquarium')
    ->get();

    return view(
        'user.species.areas',
        compact(
            'species',
            'areas'
        )
    );
    }
}