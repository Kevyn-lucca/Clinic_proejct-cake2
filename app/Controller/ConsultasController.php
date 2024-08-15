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
            $consultasDesmarcadas = $this->ConsultaDesmarcada->find('all', array(
                'joins' => array(
                    array(
                        'table' => 'pacientes', // Nome da tabela do paciente
                        'alias' => 'Paciente',   // Alias para facilitar o acesso
                        'type' => 'INNER',
                        'conditions' => array(
                            'ConsultaDesmarcada.paciente_id = Paciente.id' // Condição do JOIN
                        )
                    ),
                    array(
                        'table' => 'doutor', // Nome da tabela do médico
                        'alias' => 'Medico',    // Alias para facilitar o acesso
                        'type' => 'INNER',
                        'conditions' => array(
                            'ConsultaDesmarcada.doutor_id = Medico.id' // Condição do JOIN
                        )
                    ),
                    array(
                        'table' => 'tipo_consulta', // Nome da tabela do tipo de consulta
                        'alias' => 'Tipo',    // Alias para facilitar o acesso
                        'type' => 'INNER',
                        'conditions' => array(
                            'ConsultaDesmarcada.tipo_id = Tipo.id' // Condição do JOIN
                        )
                    ),
                    array(
                        'table' => 'convenios', // Nome da tabela do convênio
                        'alias' => 'Convenio',   // Alias para facilitar o acesso
                        'type' => 'INNER',
                        'conditions' => array(
                            'ConsultaDesmarcada.convenio_id = Convenio.id' // Condição do JOIN
                        )
                    )
                ),
                'fields' => array(
                    'ConsultaDesmarcada.*',     // Seleciona todos os campos da tabela de consultas desmarcadas
                    'Paciente.nome AS paciente_nome',  // Seleciona o campo nome da tabela paciente
                    'Medico.nome AS medico_nome',    // Seleciona o campo nome da tabela médico
                    'Convenio.nome AS convenio_nome',
                    'Tipo.nome AS tipo_nome'   // Seleciona o campo nome da tabela convênio
                )
            ));
        
            // Combina as duas consultas
            $resultado = array_merge($consultas, $consultasDesmarcadas);
        

            // echo "<pre>";
            // print_r($resultado);exit;
            // Define a variável de resultado para a visão
            $this->set('consultas', $resultado);
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

    // Obtém os dados da consulta que será "desmarcada"
    $consulta = $this->Consulta->findById($id);
    if (!$consulta) {
        throw new NotFoundException(__('Consulta não encontrada.'));
    }

    // Verifica se a consulta já está desmarcada
    $consultaDesmarcada = $this->ConsultaDesmarcada->find('first', array(
        'conditions' => array('ConsultaDesmarcada.paciente_id' => $consulta['Consulta']['paciente_id'], 'ConsultaDesmarcada.doutor_id' => $consulta['Consulta']['doutor_id'], 'ConsultaDesmarcada.tipo_id' => $consulta['Consulta']['tipo_id'], 'ConsultaDesmarcada.convenio_id' => $consulta['Consulta']['convenio_id'], 'ConsultaDesmarcada.data_consulta' => $consulta['Consulta']['data_consulta'], 'ConsultaDesmarcada.hora' => $consulta['Consulta']['hora'])
    ));

    if ($consultaDesmarcada) {
        // Se a consulta já está desmarcada, remova da tabela de desmarcadas e remarque a consulta
        if ($this->ConsultaDesmarcada->delete($consultaDesmarcada['ConsultaDesmarcada']['id'])) {
            // Remarque a consulta original
            $this->Session->setFlash(__('Consulta reativada com sucesso.'));
        } else {
            $this->Session->setFlash(__('Não foi possível reativar a consulta. Por favor, tente novamente.'));
        }
    } else {
        // Prepara os dados para a tabela de consultas desmarcadas
        $consultaDesmarcadaData = array(
            'ConsultaDesmarcada' => array(
                'paciente_id' => $consulta['Consulta']['paciente_id'],
                'doutor_id' => $consulta['Consulta']['doutor_id'],
                'tipo_id' => $consulta['Consulta']['tipo_id'],
                'convenio_id' => $consulta['Consulta']['convenio_id'],
                'data_consulta' => $consulta['Consulta']['data_consulta'],
                'hora' => $consulta['Consulta']['hora'],
                'data_delecao' => date('Y-m-d H:i:s') // Adiciona a data da desmarcação
            )
        );

        // Salva a consulta na tabela de consultas desmarcadas
        if ($this->ConsultaDesmarcada->save($consultaDesmarcadaData)) {
            // Deleta a consulta original
            $this->Consulta->delete($id);
            $this->Session->setFlash(__('Consulta desmarcada com sucesso.'));
        } else {
            $this->Session->setFlash(__('Não foi possível desmarcar a consulta. Por favor, tente novamente.'));
        }
    }

    return $this->redirect(array('action' => 'index'));
}

public function rebook($id = null) {
    $this->layout = 'ajax';
    $this->ConsultaDesmarcada->id = $id;

    // Verifica se a consulta desmarcada existe
    if (!$this->ConsultaDesmarcada->exists()) {
        throw new NotFoundException(__('Consulta desmarcada inválida'));
    }

    // Obtém os dados da consulta desmarcada
    $consultaDesmarcada = $this->ConsultaDesmarcada->findById($id);
    if (!$consultaDesmarcada) {
        throw new NotFoundException(__('Consulta desmarcada não encontrada.'));
    }

    // Prepara os dados para a tabela de consultas
    $consultaData = array(
        'Consulta' => array(
            'paciente_id' => $consultaDesmarcada['ConsultaDesmarcada']['paciente_id'],
            'doutor_id' => $consultaDesmarcada['ConsultaDesmarcada']['doutor_id'],
            'tipo_id' => $consultaDesmarcada['ConsultaDesmarcada']['tipo_id'],
            'convenio_id' => $consultaDesmarcada['ConsultaDesmarcada']['convenio_id'],
            'data_consulta' => $consultaDesmarcada['ConsultaDesmarcada']['data_consulta'],
            'hora' => $consultaDesmarcada['ConsultaDesmarcada']['hora']
        )
    );

    // Salva a consulta na tabela de consultas
    if ($this->Consulta->save($consultaData)) {
        // Deleta a consulta da tabela de consultas desmarcadas
        $this->ConsultaDesmarcada->delete($id);
        $this->Session->setFlash(__('Consulta remarcada com sucesso.'));
    } else {
        $this->Session->setFlash(__('Não foi possível remarcar a consulta. Por favor, tente novamente.'));
    }

    return $this->redirect(array('action' => 'index'));
}



}
