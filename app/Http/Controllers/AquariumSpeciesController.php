<?php

namespace App\Http\Controllers;

use App\Models\AquariumSpecies;

class AquariumSpeciesController extends Controller
{
    public function show(
        AquariumSpecies $aquariumSpecies
    )
    {
        return view(
            'user.aquarium-species.show',
            compact('aquariumSpecies')
        );
    }
}