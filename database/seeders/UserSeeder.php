<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'role_id' => Role::where('name', 'admin')->first()->id,
            'name' => 'Admin',
            'email' => 'admin@admin.com'
        ]);
        User::factory()->count(10)->create();
    }
}
