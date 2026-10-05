<?php

namespace App\Http\Controllers;

use App\Models\Aquarium;
use App\Models\StaffRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffRequestController extends Controller
{
    public function create()
    {
        $aquariums = Aquarium::orderBy('name')
            ->get();

        return view(
            'auth.staff-request',
            compact('aquariums')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'unique:users,email',
                'unique:staff_requests,email',
            ],
            'password' => ['required', 'min:8'],
            'aquarium_name' => [
                'required',
                'string',
                'exists:aquariums,name',
            ],
        ]);

        StaffRequest::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'aquarium_name' => $request->aquarium_name,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('staff.login')
            ->with(
                'success',
                '担当者申請を受け付けました。管理者の承認をお待ちください。'
            );
    }
}