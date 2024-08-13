<?php
class ConsultasController extends AppController{
    public $layout = 'ajax'; 
    public $uses = array('Consulta', 'Paciente', 'Medics'); // Carrega os modelos necessários

    public function index() {
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
        'Paciente.nome',  // Seleciona o campo nome da tabela paciente
        'Medico.nome',    // Seleciona o campo nome da tabela médico
        'Convenio.nome'   // Seleciona o campo nome da tabela convênio
    )
        ));

        // echo "<pre>";
        // print_r($consultas);exit;
        $this->set('consultas', $consultas);
    }
}
