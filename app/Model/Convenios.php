<?php
class Convenios extends AppModel {
     public $useTable = 'convenios';
     public $hasMany = array(
          'Consulta' => array(
              'className' => 'Consulta',
              'foreignKey' => 'convenio_id',
          ),
          'Paciente' => array(
               'className' => 'paciente',
               'foreignKey' => 'convenio_id',
           ),
      );
     
}