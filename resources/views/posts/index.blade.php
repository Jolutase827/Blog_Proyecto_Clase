@extends('plantilla')
@section('titulo','Inicio posts')

@section('contenido')
    <h1 class="mb-4">Listado de posts</h1>
    @forelse ($blogs as $blog)
        <h4 class="ms-5">Post nº {{$blog->id}}</h4>
        <div class="d-flex justify-content-between align-items-center mb-5 ms-5 col-5">
            <div>
                {{$blog->titulo}}
            </div>
            <div class="col-5 d-flex justify-content-between">
                <a href="{{route('posts.show',$blog)}}" class="col-3 btn btn-primary mb-3 p-3">Ver</a>
                <a href="{{route('editarPrueba',$blog)}}" class="col-3 btn btn-success p-3 mb-3">Editar</a>
                <form action="{{ route('posts.destroy', $blog) }}" method="POST" class="col-3">
                    @method('DELETE')
                    @csrf
                    <button class="col-12 btn btn-danger p-3">Borrar</button>
                </form>
            </div>
        </div>
        
    @empty
        <p>No hay blogs disponibles</p>
    @endforelse
    {{$blogs->links()}}
@endsection