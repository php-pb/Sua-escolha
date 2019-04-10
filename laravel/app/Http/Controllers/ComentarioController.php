<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postagem;
use App\Comentario;

class ComentarioController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postagem = Postagem::find($request->postagem_id);
        if (isset($postagem)) {
            $comentario = new Comentario();
            $comentario->postagem_id = $request->postagem_id;
            $comentario->nome = $request->nome;
            $comentario->descricao = $request->descricao;
            $comentario->save();
            
            return redirect("/postagem/{$request->postagem_id}");
        }

        return 404;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comentario = Comentario::find($id);
        if (isset($comentario)) {
            $postagemId = $comentario->postagem_id;
            $comentario->delete();
            
            return redirect("/postagem/{$postagemId}");
        }

        return 404;
    }
}
