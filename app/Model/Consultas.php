<?php 
class Consultas extends AppModel {
    public $useTable = 'consultas';

    public $belongsTo = array(
        'Paciente' => array(
            'className' => 'Paciente',
            'foreignKey' => 'paciente_id'
        ),
        'Medico' => array(
            'className' => 'Medics', // Ou 'Doutor', se o nome do modelo for 'Doutor'
            'foreignKey' => 'doutor_id' // Nome correto da chave estrangeira
        )
    );


}
