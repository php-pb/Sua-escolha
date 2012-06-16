<?php

class Application_Model_DbTable_Comentario extends Zend_Db_Table_Abstract
{

    protected $_name = 'comentario';
    protected $_primary = 'id';

    protected $_referenceMap    = array(
        'Postagem' => array(
            'columns'           => array('postagem_id'),
            'refTableClass'     => 'Application_Model_DbTable_Postagem',
            'refColumns'        => array('id')
        ),
        'Usuario' => array(
            'columns'           => array('usuario_id'),
            'refTableClass'     => 'Application_Model_DbTable_Usuario',
            'refColumns'        => array('id')
        )
    );

}

