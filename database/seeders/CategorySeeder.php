<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'nombre'=>"Programación",
            'descripcion'=>'Cateogría para programadores',
        ]);
        Category::create([
            'nombre'=>"Bases de Datos",
            'descripcion'=>'Categoría para todo lo que tenga que ver con las BBDD',
        ]);Category::create([
            'nombre'=>"Juegos",
            'descripcion'=>'Categoría para jugones',
        ]);Category::create([
            'nombre'=>"Deportes",
            'descripcion'=>'Categoría para los deportistas',
        ]);Category::create([
            'nombre'=>"Libros",
            'descripcion'=>'Categoría para los lectores',
        ]);
    }
}
