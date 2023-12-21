@extends('plantilla')
@section('titulo','Mostrar posts')

@section('contenido')
    <h1 class="col-12 text-center mb-2">Numero de post {{$post->id}}</h1>
    <h2 class="col-12 text-center">{{$post->titulo}}</h2>
    <h5 class="col-12 text-center">{{$post->contenido}}</h5>
@endsection