<?php

namespace App\Http\Controllers;

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

    $species = $species->get();

    return view('user.species.index', compact('species'));
    }

    public function show(Species $species)
    {
        return view('user.species.show', compact('species'));
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
    $species->load('areas.aquarium');

    return view(
        'user.species.areas',
        compact('species')
    );
    }
}