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
            'name' => 'Madelin Fuentes', // CAMPO NOMBRE DEL USUARIO
            'username' => 'mlfuentes123', // CAMPO USER NAME DEL USUARIO
            'email' => 'madefuentes123@gmail.com', // CAMPO EMAIL DEL CORREO DEL USUARIOS
            'email_verified_at' => now(), // LO GENERA EL MISMO LARAVEL, SIRVE PARA VERIFICAR EL CORREO
            'password' => \Hash::make('mlfuentes'), // HASH SIRVE PARA ENCRIPTAR EL TEXTO QUE SE ALMACENE EN PASSWORD
            'status' => 1, // ES EL ESTADO DEL USUARIO
            'admin' => 1, // DEFINE SI ES ADMINISRTRADOR O NO
            'remember_token' => \Str::random(10), // Genera un token aleatorio para recordar sesión
            'created_at' => now(), // FECHA DE CREACIÓN DEL REGISTRO 
            'updated_at' => now(), // FECHA DE ACTUALIZACIÓN DEL REGISTRO 
        ]);
    }
}
