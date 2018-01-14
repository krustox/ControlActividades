<?php
App::uses('AppController', 'Controller');

class PlatformsController extends AppController {

    public function index($id = null) {
    	if($this->Session->read('Plataformas')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
			$this->set('plataformas', $this->Platform->find('all'));
	}

    public function view($id = null) {
    	if($this->Session->read('Plataformasview')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->Platform->id = $id;
        if (!$this->Platform->exists()) {
            throw new NotFoundException(__("Error"));
        }
        $this->set('plataformas', $this->Platform->read());
    }

    public function add($id = null) {
    	if($this->Session->read('Plataformasadd')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        if ($this->request->is('post')) {
            $this->Platform->create();
            if ($this->Platform->save($this->request->data)) {
                $this->Session->setFlash(__("OK"));
				return $this->redirect(array('controller' => 'Platforms', 'action' => 'index'));
            }
            $this->Session->setFlash(
                __("Error")
            );
        }
    }

    public function edit($id = null) {
    	if($this->Session->read('Plataformasedit')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->Platform->id = $id;
        if (!$this->Platform->exists()) {
            throw new NotFoundException(__("Error"));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Platform->save($this->request->data)) {
                $this->Session->setFlash(__("OK"));
				return $this->redirect(array('controller' => 'Platforms', 'action' => 'index'));
            }
            $this->Session->setFlash(
                __("Error")
            );
        } else {
            $this->request->data = $this->Platform->read(null, $id);
        }
    }

    public function delete($id = null) {
    	if($this->Session->read('Plataformasdelete')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->request->onlyAllow('post');

        $this->Platform->id = $id;
        if (!$this->Platform->exists()) {
            throw new NotFoundException(__("Error"));
        }
        if ($this->Platform->delete()) {
            $this->Session->setFlash(__("OK"));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__("Error"));
        return $this->redirect(array('action' => 'index'));
    }
}
?>