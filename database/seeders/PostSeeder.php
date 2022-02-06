<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $misposts=\App\Models\Post::factory(50)->create();
        $tagsId=Tag::pluck('id')->toArray();//[1,2,3,4,5,6,7,8]
        //pluck arranca el parametr(id) de un array que le mandemos y lo hace coleccion,
//vamos  a tener que pasarlo por attach para hacer la relacion N:M, pide un array asi que lo pasamos a array
//con $a hacemos que se consigan varios tags del array $tagsid y los atachemos a los post
        foreach($misposts as $post){
            $a=array_slice($tagsId,0,random_int(1,count($tagsId)));
            $post->tags()->attach($a);
        }
    }
}