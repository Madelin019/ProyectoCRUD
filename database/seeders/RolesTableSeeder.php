<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create([

            'user_id' => 1,
            'name' => 'Administrador',
            'permissions' => '{"ver":"on","crear":"on"}',
            'created_at' => now(),
            'updated_at' => now(),

        ]);
    }
}
