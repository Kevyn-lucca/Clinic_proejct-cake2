<?php
class Paciente extends AppModel {
    public $useTable = 'pacientes';
    public $hasMany = array(
        'Consulta' => array(
            'className' => 'Consulta',
            'foreignKey' => 'paciente_id',
        )
    );

}