<?php
class Convenios extends AppModel {
     public $useTable = 'convenios';
     public $hasMany = array(
          'Consulta' => array(
              'className' => 'Consulta',
              'foreignKey' => 'convenio_id',
              'dependent' => true // Configura a exclusão em cascata
          ),
          'Paciente' => array(
               'className' => 'paciente',
               'foreignKey' => 'convenio_id',
               'dependent' => true // Configura a exclusão em cascata
           ),
      );
     
}