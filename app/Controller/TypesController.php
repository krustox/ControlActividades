<?php
App::uses('AppController', 'Controller');

class TypesController extends AppController {

    public function index($id = null) {
    	if($this->Session->read('Tipos')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
			$this->set('tipos', $this->Type->find('all'));
	}

    public function view($id = null) {
    	if($this->Session->read('Tiposview')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->Type->id = $id;
        if (!$this->Type->exists()) {
            throw new NotFoundException(__("Error"));
        }
        $this->set('tipos', $this->Type->read());
    }

    public function add($id = null) {
    	if($this->Session->read('Tiposadd')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        if ($this->request->is('post')) {
            $this->Type->create();
            if ($this->Type->save($this->request->data)) {
                $this->Session->setFlash(__("OK"));
				return $this->redirect(array('controller' => 'types', 'action' => 'index'));
            }
            $this->Session->setFlash(
                __("Error")
            );
        }
    }

    public function edit($id = null) {
    	if($this->Session->read('Tiposedit')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->Type->id = $id;
        if (!$this->Type->exists()) {
            throw new NotFoundException(__("Error"));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Type->save($this->request->data)) {
                $this->Session->setFlash(__("OK"));
				return $this->redirect(array('controller' => 'types', 'action' => 'index'));
            }
            $this->Session->setFlash(
                __("Error")
            );
        } else {
            $this->request->data = $this->Type->read(null, $id);
        }
    }

    public function delete($id = null) {
    	if($this->Session->read('Tiposdelete')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->request->onlyAllow('post');

        $this->Type->id = $id;
        if (!$this->Type->exists()) {
            throw new NotFoundException(__("Error"));
        }
        if ($this->Type->delete()) {
            $this->Session->setFlash(__("OK"));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__("Error"));
        return $this->redirect(array('action' => 'index'));
    }
}
?>