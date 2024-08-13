<?php
class Medics extends AppModel {
     public $useTable = 'doutor';
     public $hasMany = array(
          'consulta' => array(
              'className' => 'consultas',
              'foreignKey' => 'doutor_id', 
              'dependent' => true 
          )
      );

}