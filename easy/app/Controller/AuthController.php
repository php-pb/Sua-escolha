<?php

class AuthController extends AppController
{

    public $uses = array();

    /**
     * @Layout('Login')
     */
    public function login()
    {
        try {
            if (!empty($this->data)) {
                if (isset($this->data['remember'])) {
                    if ($this->data['remember'] === 'on' || $this->data['remember'] === 'true') {
                        $this->Auth->allowAutoLogin = true;
                    }
                }
                $redirect = $this->Auth->authenticate($this->data ['username'], $this->data ['password'], '2 Years');

                $this->redirect($redirect);
            }
        } catch (invalidLoginException $exc) {
            $this->Session->setFlash($exc->getMessage(), 'auth');
        }
    }

    public function logout()
    {
        $this->redirect($this->Auth->logout());
    }

}