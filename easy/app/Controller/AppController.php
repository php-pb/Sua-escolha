<?php

class AppController extends Controller {

    public $components = array('Auth');

    public function beforeFilter() {
        $this->_configAuth();
        $this->isGuest = !$this->Auth->isAuthenticated();
    }

    public function beforeRender() {
        
    }

    private function _configAuth() {
        $this->Auth->setGuestMode(true);
        // Setamos o Modelo
        $this->Auth->setUsermodel('Usuario');
        // Definimos os campos que serão retornados pelo componente
        $this->Auth->setUserProperties(array('id', 'username', 'role'));
        // Definimos a página de login
        $this->Auth->setLoginAction('/login');
        // Definimos a página para ser redirecionada caso o login tenha sucesso
        $this->Auth->setLoginRedirect('/');
        // Definimos a página de logout
        $this->Auth->setLogoutRedirect('/');
        // Definimos a página de logout
        $this->Auth->setLoginError(__('Usuário e/ou senha incorreto(s)!'));
        // Passamos uma variável sessao para a view, contendo as informações da sessão atual.
        $usuario = $this->Auth->getUser();
        $this->User = $usuario;

        if ($usuario) {
            $this->Auth->getAcl()->createRoles(array('Administrador', 'Usuario'));
            $this->Auth->getAcl()->addUserToRole($usuario->username, $usuario->role);
        }
    }

}
