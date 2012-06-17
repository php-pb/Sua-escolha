<?php

/**
 * @property Postagem $Postagem
 * @property Usuario $Usuario 
 */
class PostagemController extends AppController
{

    public $uses = array('Postagem', 'Usuario');

    public function index()
    {
        $postagens = $this->Postagem->getAll(array(), 0, 10);
        $this->postagens = $this->dividirPorLinha($postagens);
    }

    public function view($titulo)
    {
        if ((int) $titulo !== 0) {
            $this->postagem = $this->Postagem->getById($titulo);
        } else {
            $this->postagem = $this->Postagem->getByTitulo(urldecode($titulo));
        }
    }

    public function author($author)
    {
        $usuario = $this->Usuario->getByUsername(urldecode($author));
        $postagens = $this->Postagem->getByAuthor($usuario, 0, 10);
        $this->postagens = $this->dividirPorLinha($postagens);
        $this->display('index');
    }

    private function dividirPorLinha($postagens, $qtdePorLinha = 3)
    {
        $postagens = array_chunk($postagens, $qtdePorLinha);
        $this->total = count($postagens);
        return $postagens;
    }

}
