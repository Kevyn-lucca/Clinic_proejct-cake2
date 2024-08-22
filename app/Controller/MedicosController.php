<?php

class MedicosController extends AppController
{
    public $helpers = array('Html', 'Form', 'Flash');
    public $uses = array('Medics');

    public function index()
    {
        $this->layout = 'ajax';

        $medics = $this->Medics->find('all');

        // echo "<pre>";
        // print_r($medics);exit;

        $this->set('medics', $medics);
    }

    public function add()
    {
        $this->layout = 'ajax';
    
        if ($this->request->is('post')) {
            $this->Medics->create();
            $this->Medics->set($this->request->data,'teste');
    
            // Regras de validação
            $this->Medics->validate = [
                'nome' => [
                    'rule' => 'notBlank',
                    'message' => 'O campo Nome é obrigatório.'
                ],
                'crm' => [
                    'rule' => 'notBlank',
                    'message' => 'O campo CRM é obrigatório.'
                ]
            ];
    
            // Validar os dados antes de salvar
            if ($this->Medics->validates()) {
                if ($this->Medics->save($this->request->data)) {
                    $response = ['success' => true, 'message' => 'Médico adicionado com sucesso.'];
                    // Não redireciona automaticamente, apenas retorna a resposta JSON
                } else {
                    $response = ['success' => false, 'message' => 'Ocorreu um erro ao salvar o médico.'];
                }
            } else {
                // Retornar mensagens de erro de validação
                $errors = $this->Medics->validationErrors;
                $response = ['success' => false, 'errors' => $errors];
            }
    
            // Retornar resposta em JSON
            $this->set('response', $response);
            $this->set('_serialize', 'response');
        }
    }
    
    public function edit($id = null) {
        $this->layout = 'ajax';
    
        if (!$id) {
            throw new NotFoundException(__('Dados inválidos'));
        }
    
        $medic = $this->Medics->findById($id);
        if (!$medic) {
            throw new NotFoundException(__('Médico não encontrado'));
        }
    
        $this->set('medics', $medic);
    
        if ($this->request->is(array('post', 'put'))) {
            $this->Medics->id = $id;
            $this->Medics->set($this->request->data);
    
            // Regras de validação
            $this->Medics->validate = [
                'nome' => [
                    'rule' => 'notBlank',
                    'message' => 'O campo Nome é obrigatório.'
                ],
                'crm' => [
                    'rule' => 'notBlank',
                    'message' => 'O campo CRM é obrigatório.'
                ]
            ];
    
            // Validar os dados antes de salvar
            if ($this->Medics->validates()) {
                if ($this->Medics->save($this->request->data)) {
                    $response = ['success' => true, 'message' => 'Médico atualizado com sucesso.'];
                } else {
                    $response = ['success' => false, 'message' => 'Ocorreu um erro ao salvar o médico.'];
                }
            } else {
                // Retornar mensagens de erro de validação
                $errors = $this->Medics->validationErrors;
                $response = ['success' => false, 'errors' => $errors];
            }
    
            // Retornar resposta em JSON
            $this->set('response', $response);
            $this->set('_serialize', 'response');
        }
    
        // Preencher os dados do formulário com as informações do médico se o formulário não foi submetido
        if (!$this->request->data) {
            $this->request->data = $medic;
        }
    }
    

    public function delete($id = null) {
        if(!$id){
            throw new NotFoundException(__('Invalid data'));
        }
        $this->layout = "ajax";
        $medic = $this->Medics->findById($id);
        $this->Medics->delete($id); 
    }
}

   //usar essa mesma logica para o desmarque de consultas
