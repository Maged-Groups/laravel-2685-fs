<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
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

        User::factory(100)->create();
    }
}
