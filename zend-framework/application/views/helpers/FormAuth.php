<?php

/**
 * Formulário de autenticação
 *
 * @author Jaime Neto
 */
class Application_View_Helper_FormAuth extends Zend_View_Helper_Abstract
{
    public function formAuth()
    {
        if (Zend_Auth::getInstance()->hasIdentity()) {

            $auth = Zend_Auth::getInstance()->getIdentity();
            echo 'Olá, <strong>' . $this->view->escape($auth->nome) . '</strong>'
                 . ' | <a href="' . $this->view->baseUrl('auth/logout') . '">Sair</a>';

        } else {

            $form = new Application_Form_Login();
            $form->setAction($this->view->baseUrl('auth/login'));
            echo $form;
        }
    }
}
