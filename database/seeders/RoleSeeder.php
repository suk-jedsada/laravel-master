<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::factory()->create([
            'name' =>'admin'

        ]);
        Role::factory()->create([
            'name' =>'user'

        ]);
        Role::factory()->create([
            'name' =>'manager'

        ]);

        $roles = Role::all();
        foreach ($roles as $role) {
            $role->addMedia(storage_path('seed/role-image.jpg'))->preservingOriginal()
                ->toMediaCollection(Role::MEDIA_COLLECTION_IMAGE);
        }
    }
}
