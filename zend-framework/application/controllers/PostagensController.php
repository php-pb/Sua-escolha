<?php

class PostagensController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->_forward('listar');
    }

    public function exibirAction()
    {
        $id = $this->_getParam('id');
        
        if (!$id) {
            $this->_helper->redirector('listar');
        }
        
        $modelPostagem = new Application_Model_Postagem();
        $postagem = $modelPostagem->consulta($id);

        if (!$postagem) {
            $this->_helper->redirector('listar');
        }

        $this->view->postagem = $postagem;
        $this->view->comentarios = $postagem->getComentarios();
    }

    public function listarAction()
    {
        $modelPostagem = new Application_Model_Postagem();
        $this->view->postagens = $modelPostagem->consultaTodas(null, 'criacao DESC');
    }

    public function ultimasAction()
    {
        $qtde = $this->_getParam('qtde', 5);

        $modelPostagem = new Application_Model_Postagem();
        $this->view->postagens = $modelPostagem->consultaTodas(null, 'criacao DESC', $qtde);
    }

    public function comentarAction()
    {
        $form = new Application_Form_Comentario();
        $form->setAction($this->view->baseUrl('postagens/comentar'));

        $request = $this->getRequest();
        if ($request->isPost()) {
            $dados = $request->getPost();
            if ($form->isValid($dados)) {
                if ($form->persistData()) {
                    $this->_redirect('postagens/exibir/id/' . $form->getValue('postagem_id') . '#comentarios');
                }
            }
        }
        
        $postagem_id = $this->_getParam('postagem_id');
        $form->populate(array('postagem_id' => $postagem_id));

        $this->view->form = $form;
    }

    public function cadastrarAction()
    {
        if (!Zend_Auth::getInstance()->hasIdentity()) {
            $this->_helper->redirector('listar');
        }

        $form = new Application_Form_Postagem();
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $dados = $request->getPost();

            if (isset($dados['cancelar'])) {
                $this->_helper->redirector('listar');
            }

            if ($form->isValid($dados)) {
                if ($form->persistData()) {
                    $this->_redirect('postagens/exibir/id/' . $form->getValue('id') . '#comentarios');
                }
            }
        }

        $this->view->form = $form;
    }

    public function editarAction()
    {
        $id = $this->_getParam('id');

        if (!$id) {
            $this->_helper->redirector('listar');
        }

        if (!Zend_Auth::getInstance()->hasIdentity()) {
            $this->_helper->redirector('exibir', 'postagens', null, array('id' => $id));
        }

        $form = new Application_Form_Postagem();

        $request = $this->getRequest();

        if ($request->isPost()) {
            $dados = $request->getPost();
            $dados['postagem_id'] = $id;

            if (isset($dados['cancelar'])) {
                $this->_helper->redirector('exibir', 'postagens', null, array('id' => $id));
            }

            if ($form->isValid($dados)) {
                if ($form->persistData()) {
                    $this->_redirect('postagens/exibir/id/' . $form->getValue('id') . '#comentarios');
                }
            }
        } else {
            $modelPostagem = new Application_Model_Postagem();
            $postagem = $modelPostagem->consulta($id);
            $dados = $postagem->toArray();
            $dados['postagem_id'] = $dados['id'];
            $form->populate($dados);
        }

        $this->view->form = $form;
    }

    public function excluirAction()
    {
        $id = $this->_getParam('id', $id = $this->getRequest()->getPost('postagem_id'));
        
        if (!$id) {
            $this->_helper->redirector('listar');
        }

        if (!Zend_Auth::getInstance()->hasIdentity()) {
            $this->_helper->redirector('exibir', 'postagens', null, array('id' => $id));
        }

        $modelPostagem = new Application_Model_Postagem();
        $postagem = $modelPostagem->consulta($id);
        
        if (!$postagem) {
            $this->_helper->redirector('listar');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            if($modelPostagem->excluir($id)) {
                $this->_helper->redirector('listar');
            }
        }

        $form = new Zend_Form();
        $form->setAction($this->view->baseUrl('postagens/excluir'));
        $form->setMethod(Zend_Form::METHOD_POST);

        $postagem_id = $form->createElement('hidden', 'postagem_id');
        $postagem_id->setValue($id)
            ->setDecorators(array('ViewHelper'));
        $form->addElement($postagem_id);

        $excluir = $form->createElement('submit', 'excluir');
        $excluir->setLabel('Excluir Postagem')
            ->setAttrib('class', 'btn btn-large btn-danger');

        $form->addElement($excluir);

        $this->view->postagem = $postagem;
        $this->view->form = $form;
    }

    public function excluirComentarioAction()
    {
        $id = $this->_getParam('id');

        if (!$id) {
            $this->_helper->redirector('listar');
        }

        if (!Zend_Auth::getInstance()->hasIdentity()) {
            $this->_helper->redirector('exibir', 'postagens', null, array('id' => $id));
        }

        $modelPostagem = new Application_Model_Postagem();
        $comentario = $modelPostagem->getComentario($id);

        if (!$comentario) {
            $this->_helper->redirector('listar');
        }

        $modelPostagem->excluirComentario($id);

        $this->_redirect('postagens/exibir/id/' . $comentario->postagem_id . '#comentarios');
    }


}







