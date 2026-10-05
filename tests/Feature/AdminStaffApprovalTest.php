<?php

namespace Tests\Feature;

use App\Models\Aquarium;
use App\Models\AquariumStaff;
use App\Models\StaffRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminStaffApprovalTest extends TestCase
{
    use RefreshDatabase;

    public function test_approval_creates_staff_and_links_the_aquarium(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);
        $aquarium = Aquarium::create([
            'name' => '海の水族館',
            'prefecture' => '東京都',
            'address' => '東京都港区',
        ]);
        $staffRequest = StaffRequest::create([
            'name' => '山田太郎',
            'email' => 'staff@example.com',
            'password' => Hash::make('password123'),
            'aquarium_name' => $aquarium->name,
            'status' => 'pending',
        ]);

        $response = $this->actingAs($admin)->post(
            route('admin.staff.requests.approve', $staffRequest)
        );

        $response->assertRedirect();
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('users', [
            'email' => 'staff@example.com',
            'role' => 'staff',
        ]);

        $staff = User::where('email', 'staff@example.com')->firstOrFail();

        $this->assertDatabaseHas('aquarium_staffs', [
            'aquarium_id' => $aquarium->id,
            'user_id' => $staff->id,
        ]);
        $this->assertDatabaseHas('staff_requests', [
            'id' => $staffRequest->id,
            'status' => 'approved',
        ]);
        $this->assertSame($staff->id, AquariumStaff::firstOrFail()->user_id);

        $this->actingAs($admin)
            ->get(route('admin.staff.index'))
            ->assertOk()
            ->assertSee('山田太郎')
            ->assertSee('海の水族館')
            ->assertSee('staff@example.com');
    }

    public function test_approval_does_not_create_a_staff_without_an_existing_aquarium(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);
        $staffRequest = StaffRequest::create([
            'name' => '山田太郎',
            'email' => 'staff@example.com',
            'password' => Hash::make('password123'),
            'aquarium_name' => '削除済み水族館',
            'status' => 'pending',
        ]);

        $response = $this->actingAs($admin)->post(
            route('admin.staff.requests.approve', $staffRequest)
        );

        $response->assertRedirect();
        $response->assertSessionHasErrors('aquarium_name');
        $this->assertDatabaseMissing('users', [
            'email' => 'staff@example.com',
        ]);
        $this->assertDatabaseMissing('aquarium_staffs', [
            'user_id' => $staffRequest->id,
        ]);
        $this->assertDatabaseHas('staff_requests', [
            'id' => $staffRequest->id,
            'status' => 'pending',
        ]);
    }
}