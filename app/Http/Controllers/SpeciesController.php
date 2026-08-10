<?php

namespace App\Http\Controllers;

use App\Models\Species;

class SpeciesController extends Controller
{
    public function index()
    {
        $species = Species::all();

        return view('species.index', compact('species'));
    }
}