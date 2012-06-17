<?php

class Postagem extends AppModel
{

    public $table = "postagens";
    public $hasMany = array(
        'Comentarios' => array(
            'className' => 'Comentario',
            'foreignKey' => 'postagem_id'
        )
    );
    public $hasOne = "Usuario";

    public function getAll($options = array(), $limit = 0, $offset = 10)
    {
        $options = Hash::merge(array(
                    "limit" => $limit,
                    "offset" => $offset
                        ), $options);
        $result = $this->entityManager->find($options, EntityManager::FIND_ALL);
        return $result;
    }

    public function getRecentes($limit = 0, $offset = 3)
    {
        return $this->getAll(array(), $limit = 0, $offset = 10);
    }

    public function getByAuthor($author, $limit = 0, $offset = 10)
    {
        $options = array(
            "conditions" => array("usuario_id" => $author->id),
        );
        return $this->getAll($options, $limit = 0, $offset = 10);
    }

    public function getByTitulo($titulo)
    {
        $options = array(
            "conditions" => array("titulo" => $titulo)
        );
        return $this->entityManager->find($options);
    }

    public function getById($id)
    {
        $options = array(
            "conditions" => array("id" => $id)
        );
        return $this->entityManager->find($options);
    }

}
