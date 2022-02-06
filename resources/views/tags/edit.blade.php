@extends('layouts.uno')
@section('titulo')
Editar etiqueta
@endsection
@section('cabecera')
Editar Etiqueta ({{$tag->id}})
@endsection
@section('contenido')
<div class="mx-auto bg-indigo-400 w-3/4 p-4">
    <form action="d" action="{{route('tags.update')}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">
          Nombre
        </label>
        <input value="{{$tag->nombre}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nombre" type="text" placeholder="Nombre" name="nombre">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="descripcion">
          Descripción
        </label>
        <input value="{{$tag->descripcion}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="descripcion" type="text" placeholder="Descripcion" name="descripcion">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="descripcion">
          Color
        </label>
        <input value="{{$tag->color}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="color" type="color"  name="color">
    </div>

    <div class="mb-4">
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-edit"></i>Editar</button>
    </div>
    
    </form>
    </div>
    @endsection