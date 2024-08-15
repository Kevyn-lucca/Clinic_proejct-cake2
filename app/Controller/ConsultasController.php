<?php
class ConsultasController extends AppController {
    public $layout = 'ajax'; 
    public $uses = array('Consulta', 'Paciente', 'Medics', 'Tipos', 'Convenios','ConsultaDesmarcada'); // Carrega os modelos necessários
        public function index() {
            // Consulta as consultas agendadas
            $consultas = $this->Consulta->find('all', array(
                'joins' => array(
                    array(
                        'table' => 'pacientes', // Nome da tabela do paciente
                        'alias' => 'Paciente',   // Alias para facilitar o acesso
                        'type' => 'INNER',
                        'conditions' => array(
                            'Consulta.paciente_id = Paciente.id' // Condição do JOIN
                        )
                    ),
                    array(
                        'table' => 'doutor', // Nome da tabela do médico
                        'alias' => 'Medico',    // Alias para facilitar o acesso
                        'type' => 'INNER',
                        'conditions' => array(
                            'Consulta.doutor_id = Medico.id' // Condição do JOIN
                        )
                    ),
                    array(
                        'table' => 'tipo_consulta', // Nome da tabela do tipo de consulta
                        'alias' => 'Tipo',    // Alias para facilitar o acesso
                        'type' => 'INNER',
                        'conditions' => array(
                            'Consulta.tipo_id = Tipo.id' // Condição do JOIN
                        )
                    ),
                    array(
                        'table' => 'convenios', // Nome da tabela do convênio
                        'alias' => 'Convenio',   // Alias para facilitar o acesso
                        'type' => 'INNER',
                        'conditions' => array(
                            'Consulta.convenio_id = Convenio.id' // Condição do JOIN
                        )
                    )
                ),
                'fields' => array(
                    'Consulta.*',     // Seleciona todos os campos da tabela consultas
                    'Paciente.nome AS paciente_nome',  // Seleciona o campo nome da tabela paciente
                    'Medico.nome AS medico_nome',    // Seleciona o campo nome da tabela médico
                    'Convenio.nome AS convenio_nome',
                    'Tipo.nome AS tipo_nome'   // Seleciona o campo nome da tabela convênio
                )
            ));
        
            // Consulta as consultas desmarcadas
            $this->set('consultas', $consultas);
        }

    public function add() {
        $this->layout = 'ajax';
        if($this->request->is('post')){ 
            $this->Consulta->create();
           $this->Consulta->save($this->request->data); 
        
        }

        
        // Prepara os dados para o formulário
        $pacientes = $this->Paciente->find('all');
        $medicos = $this->Medics->find('all');
        $tipos = $this->Tipos->find('all');
        $convenios = $this->Convenios->find('all');
        $this->set(compact('pacientes', 'medicos', 'tipos', 'convenios'));
    }

    public function edit($id = null) {
        $this->layout = 'ajax';
        if (!$id) {
            throw new NotFoundException(__('Invalid data'));
        }
        
        if ($this->request->is(array('post', 'put'))) {
            $this->Consulta->id = $id;
            $this->Consulta->save($this->request->data); 
        }

        $consultas = $this->Consulta->findById($id);
        $this->set('consultas', $consultas);
        $pacientes = $this->Paciente->find('all');
        $medicos = $this->Medics->find('all');
        $tipos = $this->Tipos->find('all');
        $convenios = $this->Convenios->find('all');
        $this->set(compact('pacientes', 'medicos', 'tipos', 'convenios'));
    }

    public function delete($id = null) {
        $this->layout = 'ajax';
        $this->Consulta->id = $id;
    
        if (!$this->Consulta->exists()) {
            throw new NotFoundException(__('Consulta inválida'));
        }
    
        $this->request->onlyAllow('post', 'delete');
    
        // Atualiza o valor booleano da consulta original para 1 (desmarcada)
        if ($this->Consulta->saveField('desmarcada', 1)) {
            $this->Session->setFlash(__('Consulta desmarcada com sucesso.'));
        } else {
            $this->Session->setFlash(__('Não foi possível desmarcar a consulta. Por favor, tente novamente.'));
        }
    
        return $this->redirect(array('action' => 'index'));
    }
    

}
