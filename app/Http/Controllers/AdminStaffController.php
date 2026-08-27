<?php

namespace App\Http\Controllers;

use App\Models\AquariumStaff;
use Illuminate\Http\Request;

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
}