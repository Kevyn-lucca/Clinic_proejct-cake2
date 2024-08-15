<?php
class TiposController extends AppController{
    public $uses = array('Tipos');

    public function index() {
        $this->layout = 'ajax';
        $tipo = $this->Tipos->find('all');        
        $this->set('tipos', $tipo); // Alterado para 'tipos' (com 's' minúsculo)
    }

    public function add(){
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $this->Tipos->create();
            $this->Tipos->save($this->request->data);  
        }
    }

    public function edit($id = null)
    {
        $this->layout = 'ajax';
        if (!$id) {
            throw new NotFoundException(__('Invalid data'));
        }
        
        $tipo = $this->Tipos->findById($id);
        $this->set('tipos', $tipo);

        if ($this->request->is(array('post', 'put'))) {
            $this->Tipos->id = $id;
            $this->Tipos->save($this->request->data); 
        }
        if (!$this->request->data) {
            $this->request->data = $tipo;
        }
    }

    public function delete($id){
    if(!$id){
        throw new NotFoundException(__('Invalid data'));
    }
    $this->layout = "ajax";
    $tipo = $this->Tipos->findById($id);
    $this->Tipos->delete($id); 
    }    
}
