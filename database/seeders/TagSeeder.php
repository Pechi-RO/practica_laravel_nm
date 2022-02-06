<?php

namespace Database\Seeders;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'nombre'=>'General',
            'descripcion'=>'Etiqueta para inclasificables',
            'color'=>'#4fc3f7'

        ]);
        Tag::create([
            'nombre'=>'Frontend',
            'descripcion'=>'Etiqueta desarrollo frontend',
            'color'=>'#006064'

        ]);
        Tag::create([
            'nombre'=>'Backend',
            'descripcion'=>'Etiqueta desarrollo Backend',
            'color'=>'#7cb342'

        ]);
        Tag::create([
            'nombre'=>'Estilos',
            'descripcion'=>'Etiqueta estilos web, tailwind, bootstrap, font-awesome',
            'color'=>'#795548'

        ]);
    }
}
