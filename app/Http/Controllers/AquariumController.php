<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aquarium;

class AquariumController extends Controller
{
    public function index()
    {
        $aquariums = Aquarium::all();

       return view('aquariums.index', compact('aquariums'));
    }

    public function show(Aquarium $aquarium)
    {
        return view('aquariums.show', compact('aquarium'));
    }
}