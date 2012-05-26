<?php

class Usuario extends AppModel {

    public function getById($id) {
        $options = array(
            "conditions" => array("id" => $id)
        );
        return $this->entityManager->find($options);
    }

    public function getByUsername($username) {
        $options = array(
            "conditions" => array("username" => $username)
        );
        return $this->entityManager->find($options);
    }

}
