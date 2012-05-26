<?php

class PostagemController extends AppController {

    public function index() {
        $postagens = $this->Postagem->getAll(array(), 0, 10);
        $this->postagens = $this->dividirPorLinha($postagens);
    }

    public function ver($titulo) {
        $this->postagem = $this->Postagem->getByTitulo(urldecode($titulo));
    }

    public function author($author) {
        $postagens = $this->Postagem->getByAuthor(urldecode($author), 0, 10);
        $this->postagens = $this->dividirPorLinha($postagens);
        $this->display('index');
    }

    private function dividirPorLinha($postagens, $qtdePorLinha = 3) {
        $postagens = array_chunk($postagens, $qtdePorLinha);
        $this->total = count($postagens);
        return $postagens;
    }

}
