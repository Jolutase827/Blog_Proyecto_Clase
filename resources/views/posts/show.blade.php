@extends('plantilla')
@section('titulo','Mostrar posts')

@section('contenido')
    <h1 class="col-12 text-center mb-2">Numero de post {{$post->id}}</h1>
    <p class="col-12 text-center"><i>Escrito por {{$post->usuario->login}} el {{ Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</i></p>
    <h2 class="col-12 text-center">{{$post->titulo}}</h2>
    <h5 class="col-12 text-center">{{$post->contenido}}</h5>
    <h1 class="ms-2 col-12 mt-2">Comentarios</h1>
    <div class=" contenedor-comentarios rounded">
        @forelse ($post->comentarios as $comentario)
            <div class="p-3 col-12 ps-5">
                {{$comentario->contenido}}
            </div>
        @empty
            <i>No hay comentarios</i>
        @endforelse
    </div>
@endsection