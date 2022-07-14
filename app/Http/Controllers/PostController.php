<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        echo "{#$post->id}Title: {$post->title}<br>";
        echo "Subtitulo: {$post->subtitle}<br>";
        echo "Descrição: {$post->description}<br>";
        echo "Data de criação: {$post->createdFmt}<br><hr>";


//        $post->title = "Titulo de teste do meu artigo!";
//        $post->save();


        $postAuthor = $post->author()->get()->first();
        if ($postAuthor){
            echo "<h1>Dados do Usuario</h1><br>";
            echo "Nome do Usuario: {$postAuthor->name}<br>";
            echo "Email: {$postAuthor->email}<br>";
        }

        $postCategories = $post->categories()->get();
        if ($postCategories){
            echo "<h1>Categorias</h1><br>";
            foreach ($postCategories as $category){
                echo "Categoria: #{$category->id} - {$category->name}<br>";
            }
        }
        //$post->categories()->attach([4,5]);
        //$post->categories()->detach([5]);
        //$post->categories()->sync([5,2]);
        //$post->categories()->syncWithoutDetaching([3,9]);

        $post->comments()->create([
            'content' => 'Comentario 123'
        ]);

        $comments = $post->comments()->get();
        if ($comments){
            echo "<h1>Comentarios</h1><br>";
            foreach ($comments as $comment){
                echo "Categoria: #{$comment->id} - {$comment->content}<br>";
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
