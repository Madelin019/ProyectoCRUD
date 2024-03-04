<?php
//Se utiliza para iniciar el proceso de sembrado de datos en la base de datos de la aplicación.
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            //RolesTableSeeder::class,
        ]);
    }
}
