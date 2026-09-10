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
    'user.areas.index',
    compact('aquarium')
    );
    }
    public function show(Area $area)
    {
    $prevArea = Area::where(
        'aquarium_id',
        $area->aquarium_id
    )
    ->where(
        'id',
        '<',
        $area->id
    )
    ->orderByDesc('id')
    ->first();

    $nextArea = Area::where(
        'aquarium_id',
        $area->aquarium_id
    )
    ->where(
        'id',
        '>',
        $area->id
    )
    ->orderBy('id')
    ->first();

    return view(
        'user.areas.show',
        compact(
            'area',
            'prevArea',
            'nextArea'
        )
    );
    }

    public function species(Area $area)
    {
    $area->load('species');

    return view(
        'user.areas.species',
        compact('area')
    );
    }
}