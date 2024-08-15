<?php
class PacientesController extends AppController {
    public $uses = array('Paciente', 'Convenios'); // Inclui os modelos necessários

    public function index() {
        $this->layout = 'ajax';
        $pacientes = $this->Convenios->find('all', array(
            'joins' => array(
                array(
                    'table' => 'pacientes', 
                    'alias' => 'Paciente',
                    'type' => 'INNER',
                    'conditions' => array(
                        'Paciente.convenio_id = Convenios.id' // Conecta convênios aos pacientes
                    )
                )
            ),
            'fields' => array(
                'Paciente.nome',        // Nome do paciente
                'Paciente.id',          // ID do paciente
                'Paciente.nascimento',  // Data de nascimento do paciente
                'Convenios.nome'        // Nome do convênio
            )
        ));
        
        // echo "<pre>";
        // print_r($pacientes);
        // exit;
        
        $this->set('pacientes', $pacientes); // Defina a variável para a view
    }

    public function add() {
        $this->layout = 'ajax';
        
        $convenio = $this->Convenios->find("all");  
        $this->set('Convenios', $convenio);

        if ($this->request->is('post')) {
            $this->Paciente->create();
            if ($this->Paciente->save($this->request->data)) {
                // Mensagem de sucesso ou redirecionamento, se necessário
            } else {
                // Mensagem de erro, se necessário
            }    
        }
    }
    

    public function edit($id = null) {
        $this->layout = 'ajax';
        $convenio = $this->Convenios->find("all");  
        $this->set('Convenios', $convenio);

        if (!$id) {
            throw new NotFoundException(__('Invalid data'));
        }

        $paciente = $this->Paciente->findById($id); // Usar 'paciente' no singular
        if (!$paciente) {
            throw new NotFoundException(__('Paciente não encontrado'));
        }

        $this->set('paciente', $paciente); // Usar 'paciente' no singular

        if ($this->request->is(array('post', 'put'))) {
            $this->Paciente->id = $id;
            if ($this->Paciente->save($this->request->data)) {
                // Mensagem de sucesso ou redirecionamento, se necessário
            } else {
                // Trate os erros de validação
            }
        }

        if (!$this->request->data) {
            $this->request->data = $paciente; // Usar 'paciente' no singular
        }
    }

    public function delete($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid data'));
        }

        $this->layout = "ajax";
        if ($this->Paciente->exists($id)) {
            if ($this->Paciente->delete($id)) {
                // Mensagem de sucesso ou redirecionamento, se necessário
            } else {
                // Mensagem de erro
            }
        } else {
            throw new NotFoundException(__('Paciente não encontrado'));
        }
    }
}
