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
            'name' => 'Madelin Fuentes', // Nombre del usuario campo inicial
            'username' => 'mlfuentes123', // campo de user name
            'email' => 'madefuentes123@gmail.com', // campo para correo electronico del usuario
            'email_verified_at' => now(), // Lo genera laravel, sirve para verificar el correo 
            'password' => \Hash::make('mlfuentes'), // Hash sirve para encriptar el texto que se almacene en password
            'status' => 1, // Es el estado del usuario
            'admin' => 1, // Define si es administrador o no
            'remember_token' => \Str::random(10), // Genera un token aleatorio para recordar sesión
            'created_at' => now(), // FECHA DE CREACIÓN DEL REGISTRO 
            'updated_at' => now(), // FECHA DE ACTUALIZACIÓN DEL REGISTRO 
        ]);
    }
}
