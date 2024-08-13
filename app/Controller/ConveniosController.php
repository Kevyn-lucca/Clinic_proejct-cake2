<?php
class ConveniosController extends AppController{
    public $uses = array('Convenios');

    public function index() {
        $this->layout = 'ajax';
        $convenios = $this->Convenios->find('all');
        // echo "<pre>";
        // print_r($convenios);exit;

        $this->set('convenios', $convenios);
    }
}
