<?php

namespace App\Http\Controllers;

use App\Models\AquariumSpecies;

class AquariumSpeciesController extends Controller
{
    public function show(
    AquariumSpecies $aquariumSpecies
    )
    {
    $prevSpecies = AquariumSpecies::where(
        'aquarium_id',
        $aquariumSpecies->aquarium_id
    )
    ->where(
        'id',
        '<',
        $aquariumSpecies->id
    )
    ->orderByDesc('id')
    ->first();

    $nextSpecies = AquariumSpecies::where(
        'aquarium_id',
        $aquariumSpecies->aquarium_id
    )
    ->where(
        'id',
        '>',
        $aquariumSpecies->id
    )
    ->orderBy('id')
    ->first();

    return view(
        'user.aquarium-species.show',
        compact(
            'aquariumSpecies',
            'prevSpecies',
            'nextSpecies'
        )
    );
    }
}