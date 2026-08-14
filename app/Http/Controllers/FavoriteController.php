<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Species;

class FavoriteController extends Controller
{
    public function store(Species $species)
    {
        Favorite::firstOrCreate([
            'user_id' => auth()->id(),
            'species_id' => $species->id,
        ]);

        return back();
    }

    public function destroy(Species $species)
    {
        Favorite::where('user_id', auth()->id())
            ->where('species_id', $species->id)
            ->delete();

        return back();
    }

    public function index()
   {
    $favorites = auth()->user()
        ->favorites()
        ->with('species')
        ->latest()
        ->get();

    return view(
        'favorites.index',
        compact('favorites')
    );
   }
}