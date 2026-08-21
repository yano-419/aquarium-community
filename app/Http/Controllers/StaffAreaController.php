<?php

namespace App\Http\Controllers;

use App\Models\Species;
use App\Models\Area;
use Illuminate\Http\Request;


class StaffAreaController extends Controller
{
    public function index()
    {
        $aquariumId = auth()->user()
            ->aquariumStaff
            ->aquarium_id;

        $areas = Area::with('species')
            ->where(
                'aquarium_id',
                $aquariumId
            )
            ->latest()
            ->get();

        return view(
            'staff.areas.index',
            compact('areas')
        );
    }

    public function create()
    {
    $species = Species::orderBy('name')
        ->get();

    return view(
        'staff.areas.create',
        compact('species')
    );
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => ['required', 'max:100'],
        'description' => ['required'],
        'image' => ['required', 'image'],
    ]);

    $path = $request
        ->file('image')
        ->store('areas', 'public');

    $area = Area::create([
    'aquarium_id' => auth()->user()
        ->aquariumStaff
        ->aquarium_id,

    'name' => $request->name,

    'description' => $request->description,

    'image_path' => 'storage/' . $path,
    ]);
    if ($request->filled('species_ids')) {

    $area->species()->attach(
        $request->species_ids
    );
    }

    return redirect()
        ->route('staff.areas.index')
        ->with(
            'success',
            '展示エリアを登録しました'
        );
    }
    public function edit(Area $area)
    {
    $species = Species::orderBy('name')
        ->get();

    return view(
        'staff.areas.edit',
        compact('area', 'species')
    );

    }
    public function update(
    Request $request,
    Area $area
   )
   {
    $request->validate([
        'name' => 'required|max:100',
        'description' => 'required',
    ]);

    $data = [
        'name' => $request->name,
        'description' => $request->description,
    ];

    if ($request->hasFile('image')) {

        $path = $request
            ->file('image')
            ->store('areas', 'public');

        $data['image_path'] =
            'storage/' . $path;
    }

    $area->update($data);

    $area->species()->sync(
        $request->species_ids ?? []
    );

    return redirect()
        ->route('staff.areas.index')
        ->with(
            'success',
            '展示エリアを更新しました'
        );
}

public function destroy(Area $area)
{
    $area->delete();

    return redirect()
        ->route('staff.areas.index')
        ->with(
            'success',
            '展示エリアを削除しました'
        );
}
}