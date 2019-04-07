<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Postagem;

class PostagemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postagens = Postagem::withCount('comentarios')->orderBy('id', 'desc')->paginate(10);
        return view('postagem.index', compact('postagens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('postagem.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required'
        ], [
            'nome.required' => 'O preenchimento do nome é obrigatório.',
            'descricao.required' => 'O preenchimento da descrição é obrigatório.',
        ]);

        $post = new Postagem();
        $post->nome = $request->nome;
        $post->descricao = $request->descricao;
        $post->user_id = Auth::id();
        $post->save();

        return redirect('admin/postagem')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postagem = Postagem::find($id);
        if (!$postagem) {
            return response('Postagem inválida', 404);
        }
        return view('postagem.show', compact('postagem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Postagem::find($id);
        if (!$post) {
            return redirect('admin/postagem');
        }

        return view('postagem.edit', compact('post'));
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
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required'
        ], [
            'nome.required' => 'O preenchimento do nome é obrigatório.',
            'descricao.required' => 'O preenchimento da descrição é obrigatório.',
        ]);

        $post = Postagem::find($id);
        if ($post) {
            $post->nome = $request->nome;
            $post->descricao = $request->descricao;
            $post->update();
        }

        return redirect('admin/postagem');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postagem = Postagem::find($id);
        if ($postagem) {
            $postagem->delete();
        }
        return redirect('admin/postagem');
    }
}
