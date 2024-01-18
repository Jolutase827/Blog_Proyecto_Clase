<nav>
    <div class="d-flex align-items-center mb-3">
        <h4 class="ms-3 me-4">Blog</h4>
        <a class="me-2 " href="{{route('inicio')}}">Inicio</a>
        <a class="me-2" href="{{route('posts.index')}}">Mostrar</a>
        @if((auth()->check()))
            <a class="me-2 " href="{{route('posts.create')}}">Crear</a>
            <a class="me-2 " href="{{route('logout')}}">Logout</a>
        @endif
        @if(!(auth()->check()))
            <a class="me-2" href="{{route('login')}}">Login</a>
        @endif
    </div>
</nav>