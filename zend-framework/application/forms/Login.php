<?php

class Application_Form_Login extends Zend_Form
{
    public function init()
    {
        $this->setMethod('POST');
        $this->setAttrib('id', 'form_login');

        // email
        $email = $this->createElement('text', 'email');
        $email->setAttrib('placeholder', 'E-mail')
                ->addValidator('EmailAddress')
                ->setAttrib('class', 'span2')
                ->setRequired(true)
                ->removeDecorator('Label');
        $this->addElement($email);

        // senha
        $senha = $this->createElement('password', 'senha');
        $senha->setAttrib('placeholder', 'Senha')
                ->setAttrib('class', 'span2')
                ->setRequired(true)
                ->removeDecorator('Label');
        $this->addElement($senha);

        // submit
        $submit = $this->createElement('submit', 'submit');
        $submit->setLabel('Entrar')
                ->setIgnore(true)
                ->setAttrib('class', 'btn btn-primary')
                ->setDecorators(array('ViewHelper'));
        $this->addElement($submit);
    }


}

