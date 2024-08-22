<?php
class Medics extends AppModel {
     public $useTable = 'doutor';
     public $hasMany = array(
        'Consulta' => array(
            'className' => 'Consulta',
            'foreignKey' => 'doutor_id',
        )
    );

}