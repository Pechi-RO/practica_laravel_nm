<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo'=>ucfirst($this->faker->unique()->words(4, true)),
            'resumen'=>ucfirst($this->faker->sentence()),
            'contenido'=>ucfirst($this->faker->text(250)),
            'category_id'=>Category::all()->random()->id,
            //ruta de imagen, tamaño, null es por la categoria, se deja asi, y si ponemos false solodevuelve el nombre
            //si ponemos true da la ruta completa
            //lo ponemos asi porque si no duplica la ruta
            //nombre ruta(posts)+ donde se va a gardar(public/storage/posts) que en realidad es un enlace simbolico, a storage
            //estas cosas se `ponen en public redireccionadas a storage SIEMPRE
            'image'=>"posts/".$this->faker->image('public/storage/posts',640,480,null,false)
                //posts/nombreimagen.jpg
        ];
    }
}
