<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Comentario;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Usuario;


class PostController extends Controller
{



    public function __construct()
    {
        $this->middleware(
            'auth',
            ['only' => ['create', 'store', 'edit', 'update', 'destroy']]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Post::with('usuario')->orderBy('titulo', 'ASC')->paginate(5);
        return view('posts.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->titulo = $request->get('titulo');
        $post->contenido = $request->get('contenido');
        $post->usuario()->associate(Usuario::inRandomOrder()->first());
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if(auth()->user()->id===$post->usuario_id||auth()->user()->rol==='admin')
            return view('posts.edit', compact('post'));
        else
            return redirect()->route('posts.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        if(auth()->user()->id===$post->usuario_id||auth()->user()->rol==='admin'){
            $post->update($request->all());
        }
        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if(auth()->user()->id===$post->usuario_id||auth()->user()->rol==='admin'){
            Comentario::where('post_id', $id)->delete();
            $post->delete();
        }
        return redirect()->route('posts.index');
    }

    public function nuevoPrueba()
    {
        $post = new Post();
        $post->titulo = 'Titulo ' . rand();
        $post->contenido = 'Contenido ' . rand();
        $post->save();
        return redirect()->route('posts.index');
    }
    public function editarPrueba($id)
    {
        $post = Post::findOrFail($id);
        $post->titulo = 'Titulo ' . rand();
        $post->contenido = 'Contenido ' . rand();
        $post->save();
        return redirect()->route('posts.index');
    }
}
