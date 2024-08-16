<?php
class Tipos extends AppModel {
    public $useTable = 'tipo_consulta';
    public $validate = array(
        'nome' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'O nome não pode ser nulo ou vazio.',
            ),
        ),
    );
}