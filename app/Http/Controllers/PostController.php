<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Comentario;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Usuario;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Post::with('usuario')->orderBy('titulo', 'ASC')->paginate(5);
        return view('posts.index',compact('blogs'));
        
        
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
        return view('posts.show',compact('post'));
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
        return view('posts.edit',compact('post'));
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
        Post::findOrFail($id)->update($request->all());
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
        Comentario::where('post_id',$id)->delete();
        Post::findOrFail($id)->delete();
        return redirect()->route('posts.index');
    }

    public function nuevoPrueba(){
        $post = new Post();
        $post->titulo= 'Titulo '.rand();
        $post->contenido = 'Contenido '.rand();
        $post->save();
        return redirect()->route('posts.index');
    }
    public function editarPrueba($id){
        $post = Post::findOrFail($id);
        $post->titulo= 'Titulo '.rand();
        $post->contenido = 'Contenido '.rand();
        $post->save();
        return redirect()->route('posts.index');
    }
}
