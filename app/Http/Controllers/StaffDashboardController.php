<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\AquariumSpecies;

class StaffDashboardController extends Controller
{
    public function index()
    {
        $aquariumId = auth()->user()
            ->aquariumStaff
            ->aquarium_id;

        $areaCount = Area::where(
            'aquarium_id',
            $aquariumId
        )->count();

       return view('staff.dashboard', [
        'areaCount' => $areaCount,

        'speciesCount' => AquariumSpecies::where(
        'aquarium_id',
        $aquariumId
       )->count(),
       ]);

    }
}