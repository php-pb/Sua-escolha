<?php
 
class UsuarioController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->dispatcher->forward([
            'controller' => 'postagem',
            'action'     => 'index'
        ]);
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {
        $this->tag->appendTitle('Cadastrar-se');
    }

    /**
     * Edits a usuario
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {

            $usuario = Usuario::findFirstByid($id);
            if (!$usuario) {
                $this->flash->error('Usuário não encontrado');

                $this->dispatcher->forward([
                    'controller' => 'usuario',
                    'action'     => 'index'
                ]);

                return;
            }

            $this->view->id = $usuario->id;

            $this->tag->setDefault('id', $usuario->getId());
            $this->tag->setDefault('nome', $usuario->getNome());
            $this->tag->setDefault('senha', $usuario->getSenha());
            $this->tag->setDefault('email', $usuario->getEmail());
            $this->tag->setDefault('perfil', $usuario->getPerfil());
            
        }
    }

    /**
     * Creates a new usuario
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => 'usuario',
                'action'     => 'index'
            ]);

            return;
        }

        $usuario = new Usuario();
        $usuario->setNome($this->request->getPost('nome'));
        $usuario->setSenha(md5($this->request->getPost('senha')));
        $usuario->setEmail($this->request->getPost('email'));
        $usuario->setPerfil($this->request->getPost('perfil'));
        

        if (!$usuario->save()) {
            foreach ($usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => 'usuario',
                'action'     => 'new'
            ]);

            return;
        }

        $this->flash->success('Usuário cadastrado com sucesso');

        $this->response->redirect('usuario/login');
    }

    /**
     * Saves a usuario edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => 'usuario',
                'action'     => 'index'
            ]);

            return;
        }

        $id = $this->request->getPost('id');
        $usuario = Usuario::findFirstByid($id);

        if (!$usuario) {
            $this->flash->error('Usuário não existe ' . $id);

            $this->dispatcher->forward([
                'controller' => 'usuario',
                'action'     => 'index'
            ]);

            return;
        }

        $usuario->setNome($this->request->getPost('nome'));
        $usuario->setSenha($this->request->getPost('senha'));
        $usuario->setEmail($this->request->getPost('email', 'email'));
        $usuario->setPerfil($this->request->getPost('perfil'));
        

        if (!$usuario->save()) {

            foreach ($usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => 'usuario',
                'action'     => 'edit',
                'params'     => [$usuario->getId()]
            ]);

            return;
        }

        $this->flash->success('Usuário atualizado com sucesso');

        $this->dispatcher->forward([
            'controller' => 'usuario',
            'action'     => 'index'
        ]);
    }

    /**
     * Deletes a usuario
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $usuario = Usuario::findFirstByid($id);
        if (!$usuario) {
            $this->flash->error('Usuario não encontrado');

            $this->dispatcher->forward([
                'controller' => 'usuario',
                'action'     => 'index'
            ]);

            return;
        }

        if (!$usuario->delete()) {

            foreach ($usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => 'usuario',
                'action'     => 'search'
            ]);

            return;
        }

        $this->flash->success('Usuário excluído com sucesso');

        $this->dispatcher->forward([
            'controller' => 'usuario',
            'action'     => 'index'
        ]);
    }

    public function loginAction()
    {
        $this->tag->appendTitle('Login');
        
        if ($this->request->isPost()) {
            $email = $this->request->getPost('email');
            $senha = $this->request->getPost('senha');

            $usuario = Usuario::findFirst([
                'email = :email: AND senha = :senha:',
                'bind' => [
                    'email' => $email, 
                    'senha' => md5($senha)
                ]
            ]);
            if ($usuario != false) {
                $this->session->set('auth', (object) [
                    'id'     => $usuario->getId(),
                    'nome'   => $usuario->getNome(),
                    'email'  => $usuario->getEmail(),
                    'perfil' => $usuario->getPerfil()
                ]);
                $this->flash->success('Bem vindo ' . $usuario->getNome());

                return $this->dispatcher->forward([
                    'controller' => 'index',
                    'action'     => 'index',
                ]);
            }

            $this->flash->error('E-mail ou senha inválidos');
        } else {
            $this->tag->setDefault('email', 'blog@sua-escolha.com');
            $this->tag->setDefault('senha', 'admin');
        }
    }
    
    public function logoutAction()
    {
        $this->session->remove('auth');

        return $this->dispatcher->forward([
            'controller' => 'index',
            'action'     => 'index',
        ]);
    }
    
}
