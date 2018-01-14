<?php
App::uses('AppController', 'Controller');

class ProfilesController extends AppController {

    public function index($id = null) {
    	if($this->Session->read('Perfiles')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
			$this->set('perfiles', $this->Profile->find('all'));
	}

    public function view($id = null) {
    	if($this->Session->read('Perfilesview')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->Profile->id = $id;
        if (!$this->Profile->exists()) {
            throw new NotFoundException(__("Error"));
        }
        $this->set('perfiles', $this->Profile->read());
    }

    public function add($id = null) {
    	if($this->Session->read('Perfilesadd')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        if ($this->request->is('post')) {
            $this->Profile->create();
            if ($this->Profile->save($this->request->data)) {
                $this->Session->setFlash(__("OK"));
				return $this->redirect(array('controller' => 'Profiles', 'action' => 'index'));
            }
            $this->Session->setFlash(
                __("Error")
            );
        }
    }

    public function edit($id = null) {
    	if($this->Session->read('Perfilesedit')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->Profile->id = $id;
        if (!$this->Profile->exists()) {
            throw new NotFoundException(__("Error"));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Profile->save($this->request->data)) {
                $this->Session->setFlash(__("OK"));
				return $this->redirect(array('controller' => 'Profiles', 'action' => 'index'));
            }
            $this->Session->setFlash(
                __("Error")
            );
        } else {
            $this->request->data = $this->Profile->read(null, $id);
        }
    }

    public function delete($id = null) {
    	if($this->Session->read('Perfilesdelete')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->request->onlyAllow('post');

        $this->Profile->id = $id;
        if (!$this->Profile->exists()) {
            throw new NotFoundException(__("Error"));
        }
        if ($this->Profile->delete()) {
            $this->Session->setFlash(__("OK"));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__("Error"));
        return $this->redirect(array('action' => 'index'));
    }
}
?>