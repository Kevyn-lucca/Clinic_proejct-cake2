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
    
        // Carregar os convênios para o formulário
        $convenio = $this->Convenios->find("all");
        $this->set('Convenios', $convenio);
    
        if ($this->request->is('post')) {
            $this->Paciente->create();
            
            // Definir as regras de validação
            $this->Paciente->set($this->request->data);
            
            // Regras de validação
            $this->Paciente->validate = [
                'nome' => [
                    'rule' => 'notBlank',
                    'message' => 'O campo Nome é obrigatório.'
                ],
                'nascimento' => [
                    'rule' => ['date', 'ymd'],
                    'message' => 'Por favor, insira uma data de nascimento válida.'
                ],
                'convenio_id' => [
                    'rule' => 'notBlank',
                    'message' => 'Por favor, selecione um convênio.'
                ]
            ];
            
            // Validar os dados antes de salvar
            if ($this->Paciente->validates()) {
                if ($this->Paciente->save($this->request->data)) {
                    $response = ['success' => true, 'message' => 'Paciente adicionado com sucesso.'];
                } else {
                    $response = ['success' => false, 'message' => 'Ocorreu um erro ao salvar o paciente.'];
                }
            } else {
                // Retornar mensagens de erro de validação
                $errors = $this->Paciente->validationErrors;
                $response = ['success' => false, 'errors' => $errors];
            }
            
            // Retornar resposta em JSON
            $this->set('response', $response);
            $this->set('_serialize', 'response');
        }
    }
    

    public function edit($id = null) {
        $this->layout = 'ajax';
    
        // Obter todos os convênios e configurar para a view
        $convenio = $this->Convenios->find("all");  
        $this->set('convenios', $convenio);
    
        // Verificar se o ID foi passado
        if (!$id) {
            throw new NotFoundException(__('Dados inválidos'));
        }
    
        // Buscar paciente pelo ID
        $paciente = $this->Paciente->findById($id);
        if (!$paciente) {
            throw new NotFoundException(__('Paciente não encontrado'));
        }
    
        $this->set('paciente', $paciente);
    
        // Regras de validação
        $this->Paciente->validate = [
            'nome' => [
                'rule' => 'notBlank',
                'message' => 'O campo Nome é obrigatório.'
            ],
            'nascimento' => [
                'rule' => ['date', 'ymd'],
                'message' => 'Por favor, insira uma data de nascimento válida.'
            ],
            'convenio_id' => [
                'rule' => 'notBlank',
                'message' => 'Por favor, selecione um convênio.'
            ]
        ];
    
        // Verificar se o formulário foi submetido com os métodos POST ou PUT
        if ($this->request->is(array('post', 'put'))) {
            $this->Paciente->id = $id;
            $this->Paciente->set($this->request->data);
    
            // Validar os dados antes de salvar
            if ($this->Paciente->validates()) {
                if ($this->Paciente->save($this->request->data)) {
                    $response = ['success' => true, 'message' => 'Paciente atualizado com sucesso.'];
                } else {
                    $response = ['success' => false, 'message' => 'Ocorreu um erro ao salvar o paciente.'];
                }
            } else {
                // Retornar mensagens de erro de validação
                $errors = $this->Paciente->validationErrors;
                $response = ['success' => false, 'errors' => $errors];
            }
    
            // Retornar resposta em JSON
            $this->set('response', $response);
            $this->set('_serialize', 'response');
        }
    
        // Preencher os dados do formulário com as informações do paciente se o formulário não foi submetido
        if (!$this->request->data) {
            $this->request->data = $paciente;
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
