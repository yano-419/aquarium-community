<?php

namespace App\Http\Controllers;

use App\Models\AquariumStaff;
use Illuminate\Support\Facades\Auth;

class StaffProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        $staff = AquariumStaff::with('aquarium')
            ->where('user_id', $user->id)
            ->first();

        return view(
            'staff.profile.show',
            compact(
                'user',
                'staff'
            )
        );
    }
}