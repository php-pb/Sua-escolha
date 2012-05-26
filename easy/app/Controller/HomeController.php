<?php

class HomeController extends AppController {

    public $uses = array('Postagem');

    public function index() {
        $maisRecentes = $this->Postagem->getRecentes(0, 6);

        $qtdePorLinha = 3;
        $postagens = array_chunk($maisRecentes, $qtdePorLinha);

        $this->total = count($postagens);
        $this->postagens = $postagens;
    }

    /**
     * @Authorized('Administrador') 
     */
    public function admin_index() {
        
    }

}
