<?php

class Usuario extends AppModel
{

    public $hasMany = array(
        'Postagens' => array(
            'className' => 'Postagem',
            'foreignKey' => 'usuario_id'
        )
    );

    public function getById($id)
    {
        $options = array(
            "conditions" => array("id" => $id)
        );
        return $this->entityManager->find($options);
    }

    public function getByUsername($username)
    {
        $options = array(
            "conditions" => array("username" => $username)
        );
        return $this->entityManager->find($options);
    }

}
