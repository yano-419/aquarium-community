<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffLoginController extends Controller
{
    public function store(Request $request)
    {
        if (
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'staff',
            ])
        ) {

            $request->session()->regenerate();

            return redirect()
                ->route('staff.dashboard');
        }

        return back()->withErrors([
            'email' => '担当者アカウントではありません。',
        ]);
    }
}