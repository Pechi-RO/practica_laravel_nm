<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=['titulo','resumen','contenido','image','category_id'];
    //relacion 1:N con categories
    public function category(){
        return $this->belongsTo(Category::class);
    }
    //relacion N:M con tags, un post puede tener muchos tags
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //metodos scopes
    //por convenio se escribe scopeCampoabuscar()
    public function scopeTitulo($query,$v){
        if(!isset($v)){
            //el titulo sera como % develve todos los posts, el % lo asimila como cualquier caracter
            return $query->where('titulo','like','%');
        }
        //devuelve el titulo que contenga la cadena $v
        return $query->where('titulo','like','%$v%');
    }

    public function scopeCategoryId($query,$v){
        if ($v=="-10" ||!isset($v)){
            return $query->where('category_id','like','%');
        }
        return $query->where('category_id',$v);
    }

}
