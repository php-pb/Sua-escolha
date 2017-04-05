<?php

use Phalcon\Mvc\Model\Relation;

class Postagem extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $nome;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $descricao;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $criacao;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $usuario_id;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field nome
     *
     * @param string $nome
     * @return $this
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Method to set the value of field descricao
     *
     * @param string $descricao
     * @return $this
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Method to set the value of field criacao
     *
     * @param string $criacao
     * @return $this
     */
    public function setCriacao($criacao)
    {
        $this->criacao = $criacao;

        return $this;
    }

    /**
     * Method to set the value of field usuario_id
     *
     * @param integer $usuario_id
     * @return $this
     */
    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Returns the value of field descricao
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Returns the value of field criacao
     *
     * @return string
     */
    public function getCriacao($format=null)
    {
        if ($format === null) {
            return $this->criacao;
        }
        
        $date = \DateTime::createFromFormat('Y-m-d H:i:s', $this->criacao);
        return $date->format($format);
    }

    /**
     * Returns the value of field usuario_id
     *
     * @return integer
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('usuario_id', '\Usuario', 'id', ['alias' => 'Usuario']);
        $this->hasMany(
            'id', 
            '\Comentario', 
            'postagem_id', 
            [
                'alias'      => 'Comentarios',
                'foreignKey' => [
                    'action' => Relation::ACTION_CASCADE,
                ]
            ]);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'postagem';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Postagem[]|Postagem
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Postagem
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function beforeSave()
    {
        $this->setCriacao(date('Y-m-d H:i:s'));
    }
    
}
