<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aquarium;

class AdminAquariumController extends Controller
{
    public function index(Request $request)
    {
        $query = Aquarium::withCount(
            'aquariumStaffs'
        );

        if ($keyword = $request->keyword) {

            $query->where(function ($q) use ($keyword) {

                $q->where(
                    'name',
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

        $aquariums = $query
            ->latest()
            ->paginate(10);

        return view(
            'admin.aquariums.index',
            compact('aquariums')
        );
    }
    public function create()
   {
    return view(
        'admin.aquariums.create'
    );
   }

   public function store(Request $request)
   {
    $request->validate([
        'name' => ['required', 'max:100'],
        'prefecture' => ['required', 'max:50'],
        'address' => ['required'],
        'official_url' => ['nullable', 'url'],
        'description' => ['required'],
        'image' => ['required', 'image'],
    ]);

    $path = $request
        ->file('image')
        ->store('aquariums', 'public');

    Aquarium::create([
        'name' => $request->name,
        'prefecture' => $request->prefecture,
        'address' => $request->address,
        'description' => $request->description,
        'official_url' => $request->official_url,
        'image_path' => 'storage/' . $path,
    ]);

    return redirect()
        ->route('admin.aquariums.index')
        ->with(
            'success',
            '水族館を登録しました'
        );
    }

    public function edit(Aquarium $aquarium)
    {
    return view(
        'admin.aquariums.edit',
        compact('aquarium')
    );
    }

    public function update(
    Request $request,
    Aquarium $aquarium
    )
    {
    $request->validate([
        'name' => ['required', 'max:100'],
        'prefecture' => ['required', 'max:50'],
        'address' => ['required'],
        'official_url' => ['nullable', 'url'],
        'description' => ['required'],
    ]);

    $data = [
        'name' => $request->name,
        'prefecture' => $request->prefecture,
        'address' => $request->address,
        'official_url' => $request->official_url,
        'description' => $request->description,
    ];

    if ($request->hasFile('image')) {

        $path = $request
            ->file('image')
            ->store('aquariums', 'public');

        $data['image_path'] =
            'storage/' . $path;
    }

    $aquarium->update($data);

    return redirect()
        ->route('admin.aquariums.index')
        ->with(
            'success',
            '水族館情報を更新しました'
        );
    }  

    public function destroy(Aquarium $aquarium)
    {
    $aquarium->delete();

    return redirect()
        ->route('admin.aquariums.index')
        ->with(
            'success',
            '水族館を削除しました'
        );
    }
}