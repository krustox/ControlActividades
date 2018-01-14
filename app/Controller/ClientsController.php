<?php
App::uses('AppController', 'Controller');

class ClientsController extends AppController {

    public function index($id = null) {
    	if($this->Session->read('Clientes')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
			$this->set('clientes', $this->Client->find('all'));
	}

    public function view($id = null) {
    	if($this->Session->read('Clientesview')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->Client->id = $id;
        if (!$this->Client->exists()) {
            throw new NotFoundException(__("Error"));
        }
        $this->set('clientes', $this->Client->read());
    }

    public function add($id = null) {
    	if($this->Session->read('Clientesadd')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        if ($this->request->is('post')) {
            $this->Client->create();
            if ($this->Client->save($this->request->data)) {
                $this->Session->setFlash(__("OK"));
				return $this->redirect(array('controller' => 'Clients', 'action' => 'index'));
            }
            $this->Session->setFlash(
                __("Error")
            );
        }
    }

    public function edit($id = null) {
    	if($this->Session->read('Clientesedit')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->Client->id = $id;
        if (!$this->Client->exists()) {
            throw new NotFoundException(__("Error"));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Client->save($this->request->data)) {
                $this->Session->setFlash(__("OK"));
				return $this->redirect(array('controller' => 'Clients', 'action' => 'index'));
            }
            $this->Session->setFlash(
                __("Error")
            );
        } else {
            $this->request->data = $this->Client->read(null, $id);
        }
    }

    public function delete($id = null) {
    	if($this->Session->read('Clientesdelete')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->request->onlyAllow('post');

        $this->Client->id = $id;
        if (!$this->Client->exists()) {
            throw new NotFoundException(__("Error"));
        }
        if ($this->Client->delete()) {
            $this->Session->setFlash(__("OK"));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__("Error"));
        return $this->redirect(array('action' => 'index'));
    }
}
?>