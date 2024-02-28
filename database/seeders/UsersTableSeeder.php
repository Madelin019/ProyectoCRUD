<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Madelin Fuentes',
            'username' => 'mlfuentes123',
            'email' => 'madefuentes123@gmail.com',
            'email_verified_at' => now(),
            'password' => \Hash::make('mlfuentes'),
            'status' => 1,
            'remember_token' => \Str::random(10), // Genera un token aleatorio para recordar sesión
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
