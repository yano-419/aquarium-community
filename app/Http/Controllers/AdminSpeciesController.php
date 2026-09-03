<?php

namespace App\Http\Controllers;

use App\Models\Species;
use App\Models\AquariumSpecies;
use Illuminate\Http\Request;

class AdminSpeciesController extends Controller
{
    public function index(Request $request)
    {
        $query = Species::query();

        if ($keyword = $request->keyword) {

            $query->where(
                'name',
                'like',
                "%{$keyword}%"
            );

        }

        $species = $query
            ->latest()
            ->paginate(10);

        return view(
            'admin.species.index',
            compact('species')
        );
    }

    public function create()
    {
    return view(
        'admin.species.create'
    );
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => ['required', 'max:100'],
        'scientific_name' => ['nullable', 'max:255'],
        'classification' => ['nullable', 'max:100'],
        'order_name' => ['nullable', 'max:100'],
        'family_name' => ['nullable', 'max:100'],
        'description' => ['required'],
        'image' => ['required', 'image'],
    ]);

    $path = $request
        ->file('image')
        ->store('species', 'public');

    Species::create([
        'name' => $request->name,
        'scientific_name' => $request->scientific_name,
        'classification' => $request->classification,
        'order_name' => $request->order_name,
        'family_name' => $request->family_name,
        'description' => $request->description,
        'image_path' => 'storage/' . $path,
    ]);

    return redirect()
        ->route('admin.species.index')
        ->with(
            'success',
            '生き物を登録しました'
        );
    }

    public function edit(Species $species)
    {
    return view(
        'admin.species.edit',
        compact('species')
    );
    }

    public function update(
    Request $request,
    Species $species
    )
    {
    $request->validate([
        'name' => ['required', 'max:100'],
        'scientific_name' => ['nullable', 'max:255'],
        'classification' => ['nullable', 'max:100'],
        'order_name' => ['nullable', 'max:100'],
        'family_name' => ['nullable', 'max:100'],
        'description' => ['required'],
    ]);

    $data = [
        'name' => $request->name,
        'scientific_name' => $request->scientific_name,
        'classification' => $request->classification,
        'order_name' => $request->order_name,
        'family_name' => $request->family_name,
        'description' => $request->description,
    ];

    if ($request->hasFile('image')) {

        $path = $request
            ->file('image')
            ->store('species', 'public');

        $data['image_path'] =
            'storage/' . $path;
    }

    $species->update($data);

    return redirect()
        ->route('admin.species.index')
        ->with(
            'success',
            '生き物情報を更新しました'
        );
    }

   public function destroy(Species $species)
    {
    $species->delete();

    return redirect()
        ->route('admin.species.index')
        ->with(
            'success',
            '生き物を削除しました'
        );
    }
}