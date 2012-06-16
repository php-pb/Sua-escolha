<?php

class Application_Model_Postagem
{

    /**
     * Busca registros de postagens
     *
     * @param string|array|Zend_Db_Table_Select $where  OPTIONAL An SQL WHERE clause or Zend_Db_Table_Select object.
     * @param string|array                      $order  OPTIONAL An SQL ORDER clause.
     * @param int                               $count  OPTIONAL An SQL LIMIT count.
     * @param int                               $offset OPTIONAL An SQL LIMIT offset.
     * @return Zend_Db_Table_Rowset_Abstract The row results per the Zend_Db_Adapter fetch mode.
     */
    public function consultaTodas($where = null, $order = null, $count = null, $offset = null)
    {
        $tbPostagem = new Application_Model_DbTable_Postagem();
        return $tbPostagem->fetchAll($where, $order, $count, $offset);
    }

    /**
     * Retorna um único registro de postagem baseado no id
     *
     * @param  int $id.
     * @return Zend_Db_Table_Row
     * @throws Zend_Db_Table_Exception
     */
    public function consulta($id)
    {
        $tbPostagem = new Application_Model_DbTable_Postagem();
        $postagem = $tbPostagem->find($id);

        return $postagem ? $postagem->current() : null;
    }

    /**
     * Insere ou atualiza os dados de uma postagem.
     * Caso $dados contenha o id, atualiza, senão, insere
     *
     * @param array $dados
     * @return int Id da postagem
     */
    public function salvar(array $dados)
    {
        $tbPostagem = new Application_Model_DbTable_Postagem();

        if (isset($dados['id'])) {
            $id = $dados['id']; 
            unset($dados['id'], $dados['criacao']);

            if ($tbPostagem->update($dados, array('id = ?' => $id))) {
                return $id;
            }
        } else {
            $dados['criacao'] = Zend_Date::now()->get('yyyy-MM-dd HH:mm:ss');
            return $tbPostagem->insert($dados);
        }
    }

    /**
     * Exclui uma postagem baseado no id.
     * 
     * @param int $id Id da postagem
     * @return int Número de registros excluídos
     */
    public function excluir($id)
    {
        $tbPostagem = new Application_Model_DbTable_Postagem();
        return $tbPostagem->delete(array('id = ?' => $id));
    }

    /****** COMENTÁRIOS *******/

    /**
     * Retorna um único registro de postagem baseado no id
     *
     * @param  int $id.
     * @return Zend_Db_Table_Row
     * @throws Zend_Db_Table_Exception
     */
    public function getComentario($id)
    {
        $tbComentarios = new Application_Model_DbTable_Comentario();
        $comentario = $tbComentarios->find($id);

        return $comentario ? $comentario->current() : null;
    }

    /**
     * Insere um comentário em uma postagem
     *
     * @param array $dados
     * @return int Id do comentário
     */
    public function inserirComentario($dados)
    {
        $tbComentarios = new Application_Model_DbTable_Comentario();
        return $tbComentarios->insert($dados);
    }

    /**
     * Exclui um comentário de uma postagem
     *
     * @param int $id Id do comentário
     * @return int Número de registros excluídos
     */
    public function excluirComentario($id)
    {
        $tbComentarios = new Application_Model_DbTable_Comentario();
        return $tbComentarios->delete(array('id = ?' => $id));
    }

}

