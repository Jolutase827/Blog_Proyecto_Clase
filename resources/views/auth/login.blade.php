@extends('plantilla')
@section('titulo', 'Login')

@section('contenido')
    <h1>Log in</h1>
    <form action="{{route('login')}}" method="POST" class="col-12 p-1">
        @csrf
        <strong>Nombre</strong>
        <input type="text" class="col-12 " name='login' />
        <strong class="mt-2">Password</strong>
        <input type="password" class="col-12 " name='password' />
        @if (!empty($error))
        <div class="text-danger col-12 text-center" >
            {{ $error }}
        </div>
        @endif
        <button class="mt-3 btn btn-dark col-12">Log In</button>
    </form>

@endsection