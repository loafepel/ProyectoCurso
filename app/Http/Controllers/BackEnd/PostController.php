<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Laravel\Ui\AuthCommand;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //para mostrar todos los datos 
        $posts=Post::get();
        return view('posts.index', compact('posts'));//['post' => $posts]);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*Post::create([
            'title'=>'sssssssssssss',
            'body'=> 'vbbv',
            'user_id' => auth()->user()->id
        ]);*/
        //valida los datos de entrada, dandoles condiciones
        $request->validate([
            'title'=>'required',
            'body' => 'required',

        ]);

       

        //dd($request);
        //almacena los datos solicitados
        $post=new Post;
        $post->title=$request->title;
        $post->body=$request->body;
        $post->user_id=auth()->user()->id;

        if ($request->file('file')){
            $post->image=$request->file('file')->store('posts', 'public');
            $post->save();
        }

        $post->save();
        return redirect()->route('posts.index')->with('success', 'Post Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //$post=Post::find($post);
        return view('posts.show', ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

     //modificar los datos de la tabla
    public function update(Request $request, $post)
    {
        $post = Post::find($post);
        $post->title= $request->title;
        $post->body=$request->body;
        if ($request->file('file')){
            Storage::disk('public')->delete($post->image);
            $post->image=$request->file('file')->store('posts', 'public');
            $post->save();
        }
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post=Post::find($post);
        
        //Storage::disk('public')->delete($post->image);

        $post->each->delete();
        return redirect()->route('posts.index');
    }
}
