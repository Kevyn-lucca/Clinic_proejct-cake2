<?php
class Paciente extends AppModel {
    public $hasMany = array(
        'Consulta' => array(
            'className' => 'Consulta',
            'foreignKey' => 'paciente_id'
        )
    );
}