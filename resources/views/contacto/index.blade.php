@extends('layouts.uno')
@section('titulo')
    Formulario de contacto
@endsection
@section('cabecera')
Formulario de contacto

@endsection
@section('contenido')
<div class="bg-gray-300 rounded py-4 px-2 w-3/4 mx-auto">
    <form action="{{ route('contacto.enviar') }}" method="POST">
        @csrf
        <div>
            <label for="tit" class="block text-sm font-medium text-gray-700 mb-2">Nombre de contacto</label>
            <input type="text" name="nombre" id="nombre"
                class="py-2 px-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full  sm:text-sm border-gray-300 rounded-md"
                placeholder="Nombre" required>
            @error('nombre')
                <p class="text-sm text-orange-900 mt-1">*** {{ $message }}</p>
            @enderror
        </div>
        <div class="mt-2">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Correo de contacto</label>
            <input type="email" name="email" id="email"
                class="px-2 py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full  sm:text-sm border-gray-300 rounded-md"
                placeholder="email" required>
            @error('email')
                <p class="text-sm text-orange-900 mt-1">*** {{ $message }}</p>
            @enderror
        </div>
        <div class="mt-2">
            <label for="cont" class="block text-sm font-medium text-gray-700 mb-2">Contenido del mensaje</label>
            <textarea name="contenido" id="cont"
                class="px-2 py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full  sm:text-sm border-gray-300 rounded-md"></textarea>
            @error('contenido')
                <p class="text-sm text-orange-900 mt-1">*** {{ $message }}</p>
            @enderror
        </div>
        <div class="mt-2">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-envelope"></i>Enviar</button>
        </div>
    </form>
</div>

@endsection