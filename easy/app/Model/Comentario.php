<?php

class Comentario extends AppModel
{

    public $hasOne = "Usuario";

    public function getAll($options = array())
    {
        return $this->entityManager->find($options);
    }

}
