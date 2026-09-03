<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Aquarium;
use App\Models\AquariumStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminStaffController extends Controller
{
    public function index(Request $request)
    {
        $query = AquariumStaff::with([
            'user',
            'aquarium',
        ]);

        if ($keyword = $request->keyword) {

            $query->whereHas(
                'user',
                function ($q) use ($keyword) {

                    $q->where(
                        'name',
                        'like',
                        "%{$keyword}%"
                    )
                    ->orWhere(
                        'email',
                        'like',
                        "%{$keyword}%"
                    );

                }
            );

        }

        $staffs = $query
            ->latest()
            ->paginate(10);

        return view(
            'admin.staff.index',
            compact('staffs')
        );
    }
    public function create()
    {
    $aquariums = Aquarium::orderBy('name')
        ->get();

    return view(
        'admin.staff.create',
        compact('aquariums')
    );
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => ['required', 'max:100'],
        'email' => ['required', 'email', 'unique:users,email'],
        'password' => ['required', 'confirmed', 'min:8'],
        'aquarium_id' => ['required'],
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make(
            $request->password
        ),
        'role' => 'staff',
    ]);

    AquariumStaff::create([
     'aquarium_id' => $request->aquarium_id,
     'user_id' => $user->id,
     'memo' => $request->memo,
    ]);
    return redirect()
        ->route('admin.staff.index')
        ->with(
            'success',
            '担当者を登録しました'
        );
    }

    public function edit(AquariumStaff $staff)
    {
    $staff->load([
        'user',
        'aquarium',
    ]);

    $aquariums = Aquarium::orderBy('name')
        ->get();

    return view(
        'admin.staff.edit',
        compact(
            'staff',
            'aquariums'
        )
    );
    }

    public function update(
    Request $request,
    AquariumStaff $staff
    )
    {
    $request->validate([
        'name' => ['required', 'max:100'],
        'email' => [
            'required',
            'email',
            'unique:users,email,' .
            $staff->user_id,
        ],
        'aquarium_id' => ['required'],
    ]);

    $staff->user->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    if ($request->filled('password')) {

        $staff->user->update([
            'password' => Hash::make(
                $request->password
            ),
        ]);

    }

    $staff->update([
     'aquarium_id' => $request->aquarium_id,
     'memo' => $request->memo,
    ]);

    return redirect()
        ->route('admin.staff.index')
        ->with(
            'success',
            '担当者情報を更新しました'
        );
    }

    public function destroy(AquariumStaff $staff)
    {
    $staff->user->delete();

    $staff->delete();

    return redirect()
        ->route('admin.staff.index')
        ->with(
            'success',
            '担当者を削除しました'
        );
    }
}