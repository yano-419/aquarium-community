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

    $aquariums = $aquariums->get();

    return view(
        'aquariums.index',
        compact('aquariums')
    );
}

    public function show(Aquarium $aquarium)
    {
    $aquarium->load([
        'species',
        'areas',
    ]);

    return view('aquariums.show', compact('aquarium'));
    }

    public function species(Aquarium $aquarium)
    {
    $aquarium->load('species');

    return view(
        'aquariums.species',
        compact('aquarium')
    );
    }
}