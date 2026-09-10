<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aquarium;

class AquariumController extends Controller
{
   public function index()
{
    $aquariums = Aquarium::query();

    if (request('keyword')) {

        $keyword = request('keyword');

        $aquariums->where(function ($query) use ($keyword) {

            $query->where(
                'name',
                'like',
                "%{$keyword}%"
            )
            ->orWhere(
                'prefecture',
                'like',
                "%{$keyword}%"
            )
            ->orWhere(
                'address',
                'like',
                "%{$keyword}%"
            );

        });
    }

    $aquariums = $aquariums->paginate(10);

    return view(
    'user.aquariums.index',
    compact('aquariums')
    );
}

   public function show(Aquarium $aquarium)
    {
    $areas = $aquarium->areas()
        ->inRandomOrder()
        ->take(3)
        ->get();

    $species = $aquarium->aquariumSpecies()
        ->inRandomOrder()
        ->take(3)
        ->get();

    $prevAquarium = Aquarium::where(
        'id',
        '<',
        $aquarium->id
    )
    ->orderByDesc('id')
    ->first();

    $nextAquarium = Aquarium::where(
        'id',
        '>',
        $aquarium->id
    )
    ->orderBy('id')
    ->first();

    return view(
        'user.aquariums.show',
        compact(
            'aquarium',
            'areas',
            'species',
            'prevAquarium',
            'nextAquarium'
        )
    );
    }

    public function species(Aquarium $aquarium)
    {
    $aquarium->load(
    'aquariumSpecies'
     );

    return view(
    'user.aquariums.species',
    compact('aquarium')
    );
    }
}