<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Yalero',
            'email' => 'yalero@example.com',
            'password' => bcrypt('password'),
            'rol' => 'comercial',
        ]);

        User::create([
            'name' => 'Jorge',
            'email' => 'jorge@example.com',
            'password' => bcrypt('password'),
            'rol' => 'administrativo',
        ]);

        User::create([
            'name' => 'Markel',
            'email' => 'markel.onaindia@ikasle.egibide.org',
            'password' => bcrypt('password'),
            'rol' => 'responsable',
        ]);
    }
}
