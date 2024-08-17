<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public function beforeFilter() {
       parent::beforeFilter();
    $this->Auth->allow('login', 'add'); // Permitir acesso às ações de login e add

    if ($this->request->is('ajax') && !$this->Auth->loggedIn() && $this->request->params['action'] != 'login') {
        // Se a requisição for AJAX e o usuário não estiver autenticado, retorna um erro
        $this->response->statusCode(401); // Código de status HTTP para não autorizado
        $this->response->body(json_encode(array('status' => 'error', 'message' => 'Usuário não autenticado.')));
        $this->set('_serialize', array('response'));
        $this->render('ajax_error'); // Renderizar um layout específico para erros AJAX
        return false; // Impedir que o método continue
    }
    }
    
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                if ($this->request->is('ajax')) {
                    // Resposta JSON para AJAX
                    $this->set('response', array('status' => 'success', 'message' => 'Login bem-sucedido.'));
                    $this->layout = 'ajax'; // Usar um layout de AJAX, se necessário
                } else {
                    // Redirecionamento normal para não-AJAX
                    return $this->redirect($this->Auth->redirectUrl());
                }
            } else {
                if ($this->request->is('ajax')) {
                    // Resposta JSON para AJAX
                    $this->set('response', array('status' => 'error', 'message' => 'Usuário ou senha incorretos.'));
                    $this->layout = 'ajax'; // Usar um layout de AJAX, se necessário
                } else {
                    // Redirecionamento normal para não-AJAX
                    $this->Flash->error(__('Usuário ou senha incorretos.'));
                }
            }
        }
        if ($this->request->is('ajax')) {
            // Definir o layout para AJAX, se necessário
            $this->layout = 'ajax';
        }
    }
    
    public function logout() {
        return $this->Auth->logout();
    }

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            $this->User->save($this->request->data);
            $this->redirect(array('controller' => 'Users', 'action' => 'login'));
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('O usuário foi salvo com sucesso'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('O usuário não pôde ser salvo. Por favor, tente novamente.'));
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }
    
    public function delete($id = null) {
        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('Usuário excluído'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('Usuário não pôde ser excluído'));
        return $this->redirect(array('action' => 'index'));
    }
}
?>
