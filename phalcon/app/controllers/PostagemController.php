<?php
 
class PostagemController extends ControllerBase
{
    
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->dispatcher->forward([
            'controller' => 'postagem',
            'action'     => 'list'
        ]);
    }
    
    public function listAction()
    {
        $this->tag->appendTitle('Postagens');
        
        $parameters = [
            'order' => 'id DESC',
            'limit' => 10
        ];
        $this->view->list = Postagem::find($parameters);
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {
        $this->tag->appendTitle('Cadastrar postagem');
    }

    /**
     * Edits a postagem
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {

            $postagem = Postagem::findFirstByid($id);
            if (!$postagem) {
                $this->flash->error('Postagem inválida');

                $this->dispatcher->forward([
                    'controller' => 'postagem',
                    'action'     => 'index'
                ]);

                return;
            }

            $this->view->id = $postagem->id;

            $this->tag->setDefault('id', $postagem->getId());
            $this->tag->setDefault('nome', $postagem->getNome());
            $this->tag->setDefault('descricao', $postagem->getDescricao());
            
            $this->tag->appendTitle('Editar postagem');
        }
    }

    /**
     * Creates a new postagem
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => 'postagem',
                'action'     => 'index'
            ]);

            return;
        }

        $postagem = new Postagem();
        $postagem->setNome($this->request->getPost('nome'));
        $postagem->setDescricao($this->request->getPost('descricao'));
        $postagem->setUsuarioId($this->session->get('auth')->id);

        if (!$postagem->save()) {
            foreach ($postagem->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => 'postagem',
                'action'     => 'index'
            ]);

            return;
        }

        $this->flash->success('Postagem cadastrada com sucesso');

        $this->dispatcher->forward([
            'controller' => 'postagem',
            'action'     => 'index'
        ]);
    }

    /**
     * Saves a postagem edited
     *
     */
    public function saveAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => 'postagem',
                'action'     => 'index'
            ]);

            return;
        }

        $id = $this->request->getPost('id');
        $postagem = Postagem::findFirstByid($id);

        if (!$postagem) {
            $this->flash->error('Postagem inválida');

            $this->dispatcher->forward([
                'controller' => 'postagem',
                'action'     => 'index'
            ]);

            return;
        }

        $postagem->setNome($this->request->getPost('nome'));
        $postagem->setDescricao($this->request->getPost('descricao'));
        

        if (!$postagem->save()) {

            foreach ($postagem->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => 'postagem',
                'action'     => 'index',
                'params'     => [$postagem->getId()]
            ]);

            return;
        }

        $this->flash->success('Postagem atualizada com sucesso');

        $this->dispatcher->forward([
            'controller' => 'postagem',
            'action'     => 'index'
        ]);
    }

    /**
     * Deletes a postagem
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $postagem = Postagem::findFirstByid($id);
        if (!$postagem) {
            $this->flash->error('postagem inválida');

            $this->dispatcher->forward([
                'controller' => 'postagem',
                'action'     => 'index'
            ]);

            return;
        }
        
        if ($this->request->isPost()) {
            if (!$postagem->delete()) {
                foreach ($postagem->getMessages() as $message) {
                    $this->flash->error($message);
                }

                $this->dispatcher->forward([
                    'controller' => 'postagem',
                    'action'     => 'index'
                ]);

                return;
            }

            $this->flash->success('postagem excluída com sucesso');

            $this->dispatcher->forward([
                'controller' => 'postagem',
                'action'     => 'index'
            ]);
        }
        
        $this->view->id = $postagem->id;

        $this->tag->setDefault('nome', $postagem->getNome());
        $this->tag->setDefault('descricao', $postagem->getDescricao());
        
        $this->tag->appendTitle('Excluir postagem');
    }
    
    public function viewAction($id)
    {
        $postagem = Postagem::findFirstByid($id);
        if (!$postagem) {
            $this->flash->error('postagem inválida');

            $this->dispatcher->forward([
                'controller' => 'postagem',
                'action'     => 'index'
            ]);

            return;
        }
        
        $this->view->postagem = $postagem;
        
        $this->tag->appendTitle($postagem->getNome());
    }
    
}
