<?php

namespace App\Http\Controllers;
use \App\Models\Category;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Tag $tag)
    {
        $posts=Post::orderBy('id', 'desc')
        ->titulo($request->titulo)
        ->categoryId($request->category_id)
        ->where(!isset($tag))
        ->paginate(4)->withQueryString();
        $control=true;
        $categorias = Category::orderBy('nombre')->get();
        
        return view('posts.index', compact('posts', 'request', 'categorias','control'));
    }

    public function index1(Request $request, Tag $tag){
        
        $posts=$tag->posts()::orderBy('id', 'desc')
        ->titulo($request->titulo)
        ->categoryId($request->category_id)
        ->where(!isset($tag))
        ->paginate(4)->withQueryString();
        $control=false;
        $categorias = Category::orderBy('nombre')->get();
        
        return view('posts.index', compact('posts', 'request', 'categorias','control','tag'));
 

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Category::orderBy('nombre')->get();
        $tags=Tag::orderBy('nombre')->get();
        return view('posts.create',compact('categorias','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo'=>['required','string','min:3','unique:posts,titulo'],
            'resumen'=>['required','string','min:6'],
            'contenido'=>['required','string','min:10'],
            'image'=>['required','image','max:1024'],
            'tags'=>['required']
        ]);
        //hemos pasado las validaciones, guardamos
        //1.- Guardamos el post con su imagen
if($request->file('image')){
    //se ha guardado la imagen, la almaceno físicamente
    $url=Storage::put('public/posts',$request->file('image'));
    //$url=public/posts/nombre.jpg
    //basename($url)=>nombre.jpg
    $urlbuena="posts/".basename($url);
}
    //guardamos el post en la BBDD
    //cambiamos la ruta temporal por la ruta de storage
    $post=Post::create($request->all());
    $post->update([
        'image'=>$urlbuena
    ]);
    //almacenamos en la tabla post_tag los tags de este post
    $post->tags()->attach($request->tags);
    //------
    return redirect()->route('posts.index')->with('mensaje','post creado');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags=Tag::Orderby('nombre')->get();
        $categorias=Category::OrderBy('nombre')->get();
        $array =$post->tags->pluck('id')->toArray();
        return view('posts.edit',compact('post','tags','categorias','array'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'titulo'=>['required','string','min:3','unique:posts,titulo,'.$post->id],
            'resumen'=>['required','string','min:6'],
            'contenido'=>['required','string','min:10'],
            'image'=>['nullable','image','max:1024'],
            'tags'=>['required']
        ]);

        if($request->file('image')){
            //queremos cambiar la imagen
            //debemos borrar la imagen antigua
            Storage::delete("public/".$post->image);
            //se ha guardado la imagen, la almaceno físicamente
            $url=Storage::put('public/posts',$request->file('image'));
            //$url=public/posts/nombre.jpg
            //basename($url)=>nombre.jpg
            $urlbuena="posts/".basename($url);

            $post->update($request->all());
            $post->update(['image'=>$urlbuena]);

        }
        else{
            //no queremos cambiar la imagen
            $post->update($request->all());
        }
        //ahora asociamos a este psot sus etiquetas
        //utilizamos el metodo sync en vez de attach
        //se utiliza para el update. comprueba la tabla y revisa los valores cambiandolos
        //segun lo que le enviemos,
        //si usasemos el attach no quitaria etiquetas y duplicaria las ya seleccionadas.
        $post->tags()->sync($request->tags);
        return redirect()->route('posts.index')->with("mensaje",'post actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //1.-Borro la imagen asociada al post
        //$post->image=nombre.jpg
        Storage::delete("public/".$post->image);
        //2.-borro el post
        $post->delete();
        //3.-Volvemos al index con el mensaje de post borrado
        return redirect()->route('posts.index')->with("mensaje",'post borrado');

    }
}
