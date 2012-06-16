<?php

class Application_Model_DbTable_Row_Postagem extends Zend_Db_Table_Row_Abstract
{
    public function getUsuario()
    {
        return $this->findParentRow('Application_Model_DbTable_Usuario');
    }

    public function getComentarios($select=null)
    {
        return $this->findDependentRowset('Application_Model_DbTable_Comentario',
                     'Postagem', $select);
    }

    public function countComentarios()
    {
        $select = $this->select()->from('comentario', array('count' => 'COUNT(*)'));
        $result = $this->findDependentRowset('Application_Model_DbTable_Comentario',
                     'Postagem', $select);

        return $result->current()->count;
    }

    public function getCriacao($format)
    {
        $date = new Zend_Date($this->criacao);
        return $date->get($format);
    }

}

