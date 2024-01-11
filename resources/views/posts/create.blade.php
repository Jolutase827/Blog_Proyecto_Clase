@extends('plantilla')
@section('titulo','Crear')

@section('contenido')
    <h1>Crear post</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control col-12" name="titulo" value="{{old('titulo')}}" id="titulo">
            @if ($errors->has('titulo'))
                <div class="text-danger">
                    {{ $errors->first('titulo') }}
                </div>
            @endif
        </div>
        <div class="form-group mt-3">
            <label for="Contenido">Contenido:</label>
            <input type="text" class="form-control col-12" name="contenido" id="contenido" value="{{old('contenido')}}">
            @if ($errors->has('contenido'))
                <div class="text-danger">
                    {{ $errors->first('contenido') }}
                </div>
            @endif
        </div>
        <input type="submit" name="enviar" value="Enviar" class="btn btn-dark btn-block col-12  mt-4">
    </form>
@endsection