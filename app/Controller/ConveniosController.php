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

    public function add(){
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $this->Convenios->create();
            $this->Convenios->save($this->request->data);  
        }
    }

    public function edit($id = null)
    {
        $this->layout = 'ajax';
        if (!$id) {
            throw new NotFoundException(__('Invalid data'));
        }
        
        $convenios = $this->Convenios->findById($id);
        $this->set('convenios', $convenios);

        if ($this->request->is(array('post', 'put'))) {
            $this->Convenios->id = $id;
            $this->Convenios->save($this->request->data); 
        }
        if (!$this->request->data) {
            $this->request->data = $convenios;
        }
    }

    public function delete($id){
    if(!$id){
        throw new NotFoundException(__('Invalid data'));
    }
    $this->layout = "ajax";
    $convenios = $this->Convenios->findById($id);
    $this->Convenios->delete($id); 
    }    
}
