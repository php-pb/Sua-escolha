<?php

App::uses("Usuario", "Model");

class Comentario extends AppModel {

    protected $usuario;

    public function __construct() {
        parent::__construct();
        $this->usuario = new Usuario();
    }

    public function getUsuario() {
        return $this->usuario->getById($this->usuario_id);
    }

    public function getAll($options = array()) {
        return $this->entityManager->find($options);
    }

}
