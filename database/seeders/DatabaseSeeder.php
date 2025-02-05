<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Maged Yaseen',
            'email' => 'magedyaseengroups@gmail.com',
            'mobile' => '01024750245',
            'roles' => 'admin',
            'password' => 'password',
        ]);

    }
}
