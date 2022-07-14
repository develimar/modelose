<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use function PHPUnit\Framework\fileExists;

class UserController extends Controller
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
        $user = User::find($id);
        echo "<h1>Dados do Usuario</h1><br>";
        echo "Nome do Usuario: {$user->name}<br>";
        echo "Email: {$user->email}<br>";

        $enderecoUsuario = $user->enderecoEntrega()->get()->first();
        if ($enderecoUsuario){
            echo "<h1>Endereço do Usuario</h1><br>";
            echo "Endereço: {$enderecoUsuario->address} - Nº: {$enderecoUsuario->number}<br>";
            echo "Complemento: {$enderecoUsuario->complement} - CEP: {$enderecoUsuario->zipcode}<br>";
            echo "Cidade: {$enderecoUsuario->city}/{$enderecoUsuario->state}<br>";
        }

//        $address = new Address([
//            'address' => 'Joaquim Rodrigues',
//            'number' => '36',
//            'complement' => 'casa',
//            'zipcode' => '35702359',
//            'city' => 'Sete Lagoas',
//            'state' => 'Minas Gerais'
//        ]);

//        $address = new Address();
//        $address->address = 'Av Marechal Casteloaaa';
//        $address->number = '3795';
//        $address->complement = 'Empresasss';
//        $address->zipcode = '35702134';
//        $address->city = 'Sete Lagoasas';
//        $address->state = 'MGfff';
//
//        $addressTest = new Address();
//        $addressTest->address = 'Av Marechal Casteloddd';
//        $addressTest->number = '379';
//        $addressTest->complement = 'Empresa';
//        $addressTest->zipcode = '35702134';
//        $addressTest->city = 'Sete Lagoasasddf';
//        $addressTest->state = 'MGeee';

//        $user->enderecoEntrega()->saveMany([$address, $addressTest]);
//        $user->enderecoEntrega()->saveMany([$address, $addressTest]);
//        $user->enderecoEntrega()->create([
//            'address' => 'Joaquim Rodrigues Almeida',
//            'number' => '3636',
//            'complement' => 'casass',
//            'zipcode' => '35702359aa',
//            'city' => 'Sete Lagoasdd',
//            'state' => 'Minas Geraisaaddssssd'
//        ]);

//        $user->enderecoEntrega()->createMany([[
//            'address' => 'Joaquim Rodrigues Almeida',
//            'number' => '444',
//            'complement' => 'casass',
//            'zipcode' => '35702359aa',
//            'city' => 'Sete Lagoasdd',
//            'state' => 'Minas Geraisaaddssadsfadsfadsfssd'
//        ],
//            [
//                'address' => 'Joaquim Rodrigues fdsadsfaafsdAlmeida',
//                'number' => '3856',
//                'complement' => '234',
//                'zipcode' => '35702asdfadsf359aa',
//                'city' => 'Sete asdfa',
//                'state' => 'Minas Geraisaadsafdsafaddssssd'
//            ]
//        ]);


//        $users = User::with('enderecoEntrega')->get();
//        dd($users);



        $posts = $user->posts()->orderBy('id','desc')->get();
        //dd($posts);
        if ($posts){
            echo "<h1>Artigos</h1><br>";
            foreach ($posts as $post) {
                echo "{#$post->id}Title: {$post->title}<br>";
                echo "Subtitulo: {$post->subtitle}<br>";
                echo "Descrição: {$post->description}<br><hr>";
            }
        }


//        $comments = $user->commentsOnMyPost()->get();
//        if ($comments){
//            echo "<h1>Comentarios no meu artigo</h1><br>";
//            foreach ($comments as $comment){
//                echo "Post: {$comment->id} Usuario: {$comment->user}";
//                echo "Comentario: {$comment->content}<br>";
//            }
//        }

        //var_dump($comments);

//        $user->comments()->create([
//            'content' => 'Comentario 563'
//        ]);

        $comments = $user->comments()->get();
        if ($comments){
            echo "<h1>Comentarios</h1><br>";
            foreach ($comments as $comment){
                echo "Categoria: #{$comment->id} - {$comment->content}<br>";
            }
        }

        $students = User::students()->get();
        if ($students){
            echo "<h1>Estudantes</h1><br>";
            foreach ($students as $student){
                echo "Nome do Usuario: {$student->name}<br>";
                echo "Email: {$student->email}<br><hr>";
            }
        }

        $admins = User::admins()->get();
        if ($admins){
            echo "<h1>Administradores</h1><br>";
            foreach ($admins as $admin){
                echo "Nome do Usuario: {$admin->name}<br>";
                echo "Email: {$admin->email}<br><hr>";
            }
        }

        $users = User::all();
        var_dump($users->makeHidden(['created_at'])->toArray());
        dd($users->makeVisible(['created_at'])->toJson(JSON_PRETTY_PRINT));




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
