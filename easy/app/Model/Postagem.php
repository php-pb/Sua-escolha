<?php

App::uses("Comentario", "Model");
App::uses("Usuario", "Model");

class Postagem extends AppModel {

    public $table = "postagens";
    protected $comentarios;
    protected $usuario;

    public function __construct() {
        parent::__construct();
        $this->comentarios = new Comentario();
        $this->usuario = new Usuario();
    }

    public function getUsuario() {
        return $this->usuario->getById($this->usuario_id);
    }

    public function getComentarios() {
        if (isset($this->comentario_id)) {
            return $this->comentarios->getAll();
        } else {
            return $this->comentarios;
        }
    }

    public function getAll($options = array(), $limit = 0, $offset = 10) {
        $options = Hash::merge(array(
                    "limit" => $limit,
                    "offset" => $offset
                        ), $options);
        $result = $this->entityManager->find($options, EntityManager::FIND_ALL);
        return $result;
    }

    public function getRecentes($limit = 0, $offset = 3) {
        return $this->getAll(array(), $limit = 0, $offset = 10);
    }

    public function getByAuthor($author, $limit = 0, $offset = 10) {
        $usuario = $this->usuario->getByUsername($author);
        $options = array(
            "conditions" => array("usuario_id" => $usuario->id),
        );
        return $this->getAll($options, $limit = 0, $offset = 10);
    }

    public function getByTitulo($titulo) {
        $options = array(
            "conditions" => array("titulo" => $titulo)
        );
        return $this->entityManager->find($options);
    }

}
