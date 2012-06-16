<?php

class Application_Form_Comentario extends Zend_Form
{

    public function init()
    {
        $this->setMethod(self::METHOD_POST);

        // postagem_id
        $postagem_id = $this->createElement('hidden', 'postagem_id');
        $postagem_id->setDecorators(array('ViewHelper'));
        $this->addElement($postagem_id);

        // nome
        $nome = $this->createElement('text', 'nome');
        $nome->setLabel('Nome')
                ->setRequired(true)
                ->addFilter('stripTags')
                ->addFilter('StringTrim')
                ->setAttrib('maxlength', 255)
                ->setAttrib('class', 'span6')
                ->addValidator('StringLength', false, array(0, 60));
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $nome->setValue(Zend_Auth::getInstance()->getIdentity()->nome)
                 ->setAttrib('readonly', 'readonly');
        }
        $this->addElement($nome);

        // descricao
        $descricao = $this->createElement('textarea', 'descricao');
        $descricao->setLabel('Comentários')
                ->setRequired(true)
                ->setAttrib('class', 'span6')
                ->setAttrib('rows', 5);
        $this->addElement($descricao);

        // submit
        $submit = $this->createElement('submit', 'submit');
        $submit->setLabel('Salvar Comentário')
                ->setIgnore(true)
                ->setAttrib('class', 'btn btn-primary');
        $this->addElement($submit);
    }

    public function persistData()
    {
        $values = $this->getValues();

        if ($values) {
            $modelPostagem = new Application_Model_Postagem();
            return $modelPostagem->inserirComentario($values);
        }
    }

}

