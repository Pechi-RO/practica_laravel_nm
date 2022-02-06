@extends('layouts.uno')
@section('titulo')
Etiquetas
@endsection
@section('cabecera')
Listado de etiquetas
@endsection
@section('contenido')
<!-- This example requires Tailwind CSS v2.0+ -->
<x-tabla1>
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Id
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Nombre
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Descripción
                </th>
                <th scope="col" colspan="2">
                  Role
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach($tags as $item)
                <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{$item->id}}
                      </div>
                     

                    </div>

                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{$item->nombre}}</div>
                  
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    {{$item->descripcion}}
                  </span>
                </td>
               
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a href="{{route('tags.edit'),$item}}" class="text-indigo-600 hover:text-indigo-900"><i class="fas fa-edit"></i> Edit</a>
                </td>
              </tr>
  
              <!-- More people... -->
            </tbody>
          </table>
    
</x-tabla1>




@endsection