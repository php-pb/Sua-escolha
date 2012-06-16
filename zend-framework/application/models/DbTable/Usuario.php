<?php

class Application_Model_DbTable_Usuario extends Zend_Db_Table_Abstract
{

    protected $_name = 'usuario';
    protected $_primary = 'id';

    protected $_dependentTables = array(
        'Application_Model_DbTable_Postagem',
        'Application_Model_DbTable_Comentario'
    );

}

