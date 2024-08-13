<?php

class MedicosController extends AppController
{
    public $helpers = array('Html', 'Form', 'Flash');
    public $uses = array('Medics');

    public function index()
    {
        $this->layout = 'ajax';

        $medics = $this->Medics->find('all');

        // echo "<pre>";
        // print_r($medics);exit;

        $this->set('medics', $medics);
    }

    public function add()
    {
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $this->Medics->create();
            if ($this->Medics->save($this->request->data)) {
                $this->Flash->success(__('saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to add your data.'));
        }
    }

    public function edit($id = null)
    {
        $this->layout = 'ajax';
        if (!$id) {
            throw new NotFoundException(__('Invalid data'));
        }
        
        $medic = $this->Medisc->findById($id);
        $this->set('medics', $medic);

        if ($this->request->is(array('post', 'put'))) {
            $this->Medic->id = $id;
            $this->Medic->save($this->request->data); 
        }
        if (!$this->request->data) {
            $this->request->data = $medic;
        }
    }

    public function delete($id = null) {
        $this->layout = "ajax";
        $medic = $this->Medics->findById($id);
        $this->Medics->delete($id); 
    }
}

   //usar essa mesma logica para o desmarque de consultas
   
// $MedicData = array(
//     'Deletado' => array(
//         'id' => $medic['Medics']['id'],
//         'nome' => $medic['Medics']['nome'],
//         'crm' => $medic['Medics']['crm'],
//         'data_delecao' => date('Y-m-d H:i:s')
//     )
// );