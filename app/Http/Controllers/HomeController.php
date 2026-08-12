<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aquarium;
use App\Models\Species;


class HomeController extends Controller
{
    public function index()
{
    $species = Species::inRandomOrder()
        ->take(4)
        ->get();

    $aquariums = Aquarium::inRandomOrder()
        ->take(3)
        ->get();

    return view('home', compact(
        'species',
        'aquariums'
    ));
}
}