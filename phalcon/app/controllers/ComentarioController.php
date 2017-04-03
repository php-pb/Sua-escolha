<?php
 

class ComentarioController extends ControllerBase
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
     * Creates a new comentario
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

        $postagemId = $this->request->getPost('postagem_id');
        
        $comentario = new Comentario();
        $comentario->setPostagemId($postagemId);
        $comentario->setNome($this->request->getPost('nome'));
        $comentario->setDescricao($this->request->getPost('descricao'));

        if (!$comentario->save()) {
            foreach ($comentario->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->response->redirect("postagem/view/{$postagemId}#comentarios");

            return;
        }

        $this->flash->success('Comentário publicado com sucesso');

        $this->response->redirect("postagem/view/{$postagemId}#comentarios");
    }

    /**
     * Deletes a comentario
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $comentario = Comentario::findFirstByid($id);
        if (!$comentario) {
            $this->flash->error('Comentário inválido');

            $this->dispatcher->forward([
                'controller' => 'postagem',
                'action'     => 'index'
            ]);

            return;
        }

        $postagemId = $comentario->getPostagemId();
        
        if (!$comentario->delete()) {

            foreach ($comentario->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->response->redirect("postagem/view/{$postagemId}#comentarios");

            return;
        }

        $this->flash->success('Comentário excluído com sucesso');

        $this->response->redirect("postagem/view/{$postagemId}#comentarios");
    }

}
