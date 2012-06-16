<?php

class Application_Model_DbTable_Postagem extends Zend_Db_Table_Abstract
{

    protected $_name = 'postagem';
    protected $_primary = 'id';
    protected $_rowClass = 'Application_Model_DbTable_Row_Postagem';

    protected $_dependentTables = array(
        'Application_Model_DbTable_Comentario'
    );

    protected $_referenceMap    = array(
        'Usuario' => array(
            'columns'           => array('usuario_id'),
            'refTableClass'     => 'Application_Model_DbTable_Usuario',
            'refColumns'        => array('id')
        )
    );

}

