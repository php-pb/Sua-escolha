<?php

class AuthController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->_forward('login');
    }

    public function loginAction()
    {
        // se já estiver logado redireciona para a página inicial
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $this->_helper->redirector('index', 'index');
        }

        $loginForm = new Application_Form_Login();

        $request = $this->getRequest();
        $mensagemDeErro = '';

        if ($request->isPost()) {

            if ($loginForm->isValid($request->getPost())) {

                // Pega o adaptador de autenticação a partir de uma tabela do banco
                $dbAdapter = Zend_Db_Table::getDefaultAdapter();
                $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
                // Define os campos para verificação
                $authAdapter->setTableName('usuario')
                        ->setIdentityColumn('email')
                        ->setCredentialColumn('senha')
                        ->setCredentialTreatment('MD5(?)');

                // pega o usuário e senha enviado via form
                $email = $loginForm->getValue('email');
                $senha = $loginForm->getValue('senha');

                // passa para o adapter os parâmetros a serem validados
                $authAdapter->setIdentity($email)
                            ->setCredential($senha);

                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);

                // se o usuário for válido
                if ($result->isValid()) {

                    // armazena todas as informações do usuário com exceção da senha
                    $userInfo = $authAdapter->getResultRowObject(null, 'senha');

                    // prepara armazenamento das informações da sessão
                    $authStorage = $auth->getStorage();
                    $authStorage->write($userInfo);

                    // redireciona para a página inicial
                    $this->_helper->redirector('index', 'index');
                } else {
                    $mensagemDeErro = "Usuário ou senha incorretos";
                }
            }
        }
        $this->view->mensagemDeErro = $mensagemDeErro;
        $this->view->form = $loginForm;
    }

    public function logoutAction()
    {
        // limpa a sessão e redireciona para a página inicial da gerência
        Zend_Auth::getInstance()->clearIdentity();
        $this->_helper->redirector('index', 'index');
    }

}





