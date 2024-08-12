<?php
class ConvenioController extends AppController{
    public $uses = array('Convenios');
    public function index(){
        $this->layout = 'ajax';
        $conv = $this->Conve->find('all');
        $this->set('Conves', $conv);
    }
}
