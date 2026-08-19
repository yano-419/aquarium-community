<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Aquarium;
use App\Models\AquariumStaff;

class AquariumStaffSeeder extends Seeder
{
    public function run(): void
    {
        $staff = User::where(
            'email',
            'staff@example.com'
        )->first();

        $aquarium = Aquarium::where(
            'name',
            '海遊館'
        )->first();

        AquariumStaff::create([
            'user_id' => $staff->id,
            'aquarium_id' => $aquarium->id,
        ]);
    }
}
