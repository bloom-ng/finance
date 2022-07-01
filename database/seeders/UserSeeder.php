<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\USer;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = \App\Models\Role::all();
            foreach ($roles as $role) {
                User::factory()->create(['role_id' => $role->id]);
            }
    }
}
