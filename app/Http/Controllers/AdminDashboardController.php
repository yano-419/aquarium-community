<?php

namespace App\Http\Controllers;

use App\Models\Aquarium;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $aquariumsCount = Aquarium::count();

        $staffCount = User::where(
            'role',
            'staff'
        )->count();

        $memberCount = User::where(
            'role',
            'user'
        )->count();

        return view(
            'admin.dashboard',
            compact(
                'aquariumsCount',
                'staffCount',
                'memberCount'
            )
        );
    }
}