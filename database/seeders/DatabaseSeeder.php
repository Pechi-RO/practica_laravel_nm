<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //ponemos primero el delete para que se borren los ficheros de imagen si volvemos a correr las migraciones
        Storage::deleteDirectory('public/posts');
        //con esto creamos la carpeta que necesitamos
        Storage::makeDirectory('public/posts');
        //con esto llamamos los seeder para crear los datos personalizados
        $this->call(CategorySeeder::class);
        $this->call(TagSeeder::class);
        $this->call(PostSeeder::class);
        
        
    }
}
