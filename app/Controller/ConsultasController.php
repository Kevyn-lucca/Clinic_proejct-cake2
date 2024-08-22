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
        
            if ($this->request->is('post')) {
                $this->Consulta->create();
                $this->Consulta->set($this->request->data);
        
                // Regras de validação
                $this->Consulta->validate = [
                    'paciente_id' => [
                        'rule' => 'notBlank',
                        'message' => 'O campo Paciente é obrigatório.'
                    ],
                    'doutor_id' => [
                        'rule' => 'notBlank',
                        'message' => 'O campo Doutor é obrigatório.'
                    ],
                    'tipo_id' => [
                        'rule' => 'notBlank',
                        'message' => 'O campo Tipo é obrigatório.'
                    ],
                    'convenio_id' => [
                        'rule' => 'notBlank',
                        'message' => 'O campo Convênio é obrigatório.'
                    ],
                    'data' => [
                        'rule' => ['date', 'ymd'],
                        'message' => 'Por favor, insira uma data válida.'
                    ]
                ];
        
                // Validar os dados antes de salvar
                if ($this->Consulta->validates()) {
                    if ($this->Consulta->save($this->request->data)) {
                        $response = ['success' => true, 'message' => 'Consulta adicionada com sucesso.'];
                    } else {
                        $response = ['success' => false, 'message' => 'Ocorreu um erro ao salvar a consulta.'];
                    }
                } else {
                    // Retornar mensagens de erro de validação
                    $errors = $this->Consulta->validationErrors;
                    $response = ['success' => false, 'errors' => $errors];
                }
        
                // Retornar resposta em JSON
                $this->set('response', $response);
                $this->set('_serialize', 'response');
            }
        
            // Preparar os dados para o formulário
            $pacientes = $this->Paciente->find('all');
            $medicos = $this->Medics->find('all');
            $tipos = $this->Tipos->find('all');
            $convenios = $this->Convenios->find('all');
            $this->set(compact('pacientes', 'medicos', 'tipos', 'convenios'));
        }
        

    public function edit($id = null) {
        $this->layout = 'ajax';
    
        if (!$id) {
            throw new NotFoundException(__('Dados inválidos'));
        }
    
        // Buscar consulta pelo ID
        $consulta = $this->Consulta->findById($id);
        if (!$consulta) {
            throw new NotFoundException(__('Consulta não encontrada'));
        }
    
        $this->set('consultas', $consulta);
    
        // Buscar dados para dropdowns
        $pacientes = $this->Paciente->find('all');
        $medicos = $this->Medics->find('all');
        $tipos = $this->Tipos->find('all');
        $convenios = $this->Convenios->find('all');
        $this->set(compact('pacientes', 'medicos', 'tipos', 'convenios'));
    
        // Regras de validação
        $this->Consulta->validate = [
            'paciente_id' => [
                'rule' => 'notBlank',
                'message' => 'O campo Paciente é obrigatório.'
            ],
            'doutor_id' => [
                'rule' => 'notBlank',
                'message' => 'O campo Doutor é obrigatório.'
            ],
            'tipo_id' => [
                'rule' => 'notBlank',
                'message' => 'O campo Tipo é obrigatório.'
            ],
            'convenio_id' => [
                'rule' => 'notBlank',
                'message' => 'O campo Convênio é obrigatório.'
            ],
            'data' => [
                'rule' => ['date', 'ymd'],
                'message' => 'Por favor, insira uma data válida.'
            ]
        ];
    
        if ($this->request->is(array('post', 'put'))) {
            $this->Consulta->id = $id;
            $this->Consulta->set($this->request->data);
    
            // Validar os dados antes de salvar
            if ($this->Consulta->validates()) {
                if ($this->Consulta->save($this->request->data)) {
                    $response = ['success' => true, 'message' => 'Consulta atualizada com sucesso.'];
                } else {
                    $response = ['success' => false, 'message' => 'Ocorreu um erro ao salvar a consulta.'];
                }
            } else {
                // Retornar mensagens de erro de validação
                $errors = $this->Consulta->validationErrors;
                $response = ['success' => false, 'errors' => $errors];
            }
    
            // Retornar resposta em JSON
            $this->set('response', $response);
            $this->set('_serialize', 'response');
        } else {
            // Preencher os dados do formulário com as informações da consulta se o formulário não foi submetido
            $this->request->data = $consulta;
        }
    }
    

    public function toggle($id = null) {
        $this->layout = 'ajax';
        $this->Consulta->id = $id;
    
        if (!$this->Consulta->exists()) {
            throw new NotFoundException(__('Consulta inválida'));
        }
    
        $this->request->onlyAllow('post');
    
        // Obtem o valor atual do campo 'marcado'
        $consulta = $this->Consulta->findById($id);
        $marcado = $consulta['Consulta']['marcado'];
    
        // Alterna o valor de 'marcado'
        $novoValor = $marcado ? 0 : 1;
        $this->Consulta->saveField('marcado', $novoValor);
    }
    
    

}
