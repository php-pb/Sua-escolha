<?php

class Application_Form_Postagem extends Zend_Form
{

    public function init()
    {
        $this->setMethod('POST');

        // postagem_id
        $postagem_id = $this->createElement('hidden', 'postagem_id');
        $postagem_id->setDecorators(array('ViewHelper'));
        $this->addElement($postagem_id);

        // nome
        $nome = $this->createElement('text', 'nome');
        $nome->setLabel('Título')
                ->setRequired(true)
                ->addFilter('stripTags')
                ->addFilter('StringTrim')
                ->setAttrib('maxlength', 255)
                ->setAttrib('class', 'span12')
                ->addValidator('StringLength', false, array(0, 60));
        $this->addElement($nome);

        // descricao
        $descricao = $this->createElement('textarea', 'descricao');
        $descricao->setLabel('Texto')
                ->setRequired(true)
                ->setAttrib('class', 'span12');
        $this->addElement($descricao);

        // submit
        $submit = $this->createElement('submit', 'submit');
        $submit->setLabel('Salvar e publicar postagem')
                ->setIgnore(true)
                ->setAttrib('class', 'btn btn-primary')
                ->setDecorators(array('ViewHelper'));
        $this->addElement($submit);

        // cancelar
        $cancelar = $this->createElement('submit', 'cancelar');
        $cancelar->setLabel('Cancelar')
                ->setIgnore(true)
                ->setAttrib('class', 'btn btn-danger')
                ->setDecorators(array('ViewHelper'));
        $this->addElement($cancelar);
    }

    public function persistData()
    {
        $values = $this->getValues();

        if ($values) {

            $values['id'] = $values['postagem_id'];
            unset($values['postagem_id']);

            $values['usuario_id'] = Zend_Auth::getInstance()->getIdentity()->id;

            $modelPostagem = new Application_Model_Postagem();
            return $modelPostagem->salvar($values);
        }
    }

}

