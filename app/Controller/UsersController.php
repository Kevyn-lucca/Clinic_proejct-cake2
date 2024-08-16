<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        // Permite que usuários se registrem e façam logout.
        $this->Auth->allow('add', 'logout');
    }
    
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl('/'));
            }
            $this->Flash->error(__('Senha ou nome de usuário incorreto'));
        }
    }
    
    public function logout() {
        return $this->redirect($this->Auth->logout());
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
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('Usuário registrado com sucesso'));
                return $this->redirect(array('action' => 'login'));
            }
            $this->Flash->error(__('Ocorreu um erro, tente novamente por favor'));
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
