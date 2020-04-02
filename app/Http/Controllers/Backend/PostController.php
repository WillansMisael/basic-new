<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //primero se lista todos los posts
        $posts = Post::get();
        //enviamos los datos a nuestras vistas
        //compact logra un array
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //retornamos la vista
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //ponemos la validacion PostRequest que creamos... 
    public function store(PostRequest $request)
    {  /* mio
        //salvar
        $post = Post::create([
            'user_id' => auth()->user()->id
        ] + $request->all());
        
        //image
        if($request->file('file')){
            //guardamos el archivo y generamos una ruta y no un archivo en una carpeta publica
            $post->image = $request->file('file')->store('posts','public');//store crea una carpeta postss en public
            $post->save();
        }

        //retornar
        return back()->with('status', 'Creado con exito');
        */
          //dd($request->all());
        //salvar
        $post = Post::create([
            'user_id' => auth()->user()->id
        ] + $request->all());

        //image
        if ($request->file('file')) {
            $post->image = $request->file('file')->store('posts', 'public');
            $post->save();
        }

        //retornar
        return back()->with('status', 'Creado con éxito');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
