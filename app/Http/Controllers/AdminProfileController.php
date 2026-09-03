<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return view(
            'admin.profile.show',
            compact('user')
        );
    }
}