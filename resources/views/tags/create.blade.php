@extends('layouts.uno')
@section('titulo')
Nueva etiqueta
@endsection
@section('cabecera')
Etiqueta nueva
@endsection
@section('contenido')
<div class="mx-auto bg-indigo-400 w-3/4 p-4">
<form action="d" action="{{route('tags.store')}}" method="POST">
@csrf
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">
      Nombre
    </label>
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nombre" type="text" placeholder="Nombre" name="nombre">
</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="descripcion">
      Descripción
    </label>
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="descripcion" type="text" placeholder="Descripcion" name="descripcion">
</div>
<div class="mb-4">
    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-save"></i>Enviar</button>
</div>

</form>
</div>
@endsection