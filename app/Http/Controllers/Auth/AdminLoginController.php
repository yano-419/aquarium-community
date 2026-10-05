<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function store(Request $request)
    {
        if (
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'admin',
            ])
        ) {
            $request->session()->regenerate();

            return redirect()
                ->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => '管理者アカウントではありません。',
        ]);
    }
}