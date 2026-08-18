<?php

namespace App\Http\Controllers;
use App\Models\Aquarium;
use App\Models\Area;

class AreaController extends Controller
{
    public function index(Aquarium $aquarium)
    {
    $aquarium->load('areas');

    return view(
        'areas.index',
        compact('aquarium')
    );
    }
    public function show(Area $area)
    {
        $area->load('species');

        return view(
            'areas.show',
            compact('area')
        );
    }

    public function species(Area $area)
    {
    $area->load('species');

    return view(
        'areas.species',
        compact('area')
    );
    }
}