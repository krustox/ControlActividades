<?php
App::uses('AppController', 'Controller');

class ProyectsController extends AppController {

    public function index() {
    	if($this->Session->read('Proyectos')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->set('proyectos', $this->Proyect->find('all'));
		
	}

    public function view($id = null) {
    	if($this->Session->read('Proyectosview')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->Proyect->id = $id;
        if (!$this->Proyect->exists()) {
            throw new NotFoundException(__($this->NOK()));
        }
        $this->set('proyectos', $this->Proyect->read());
    }

    public function add() {
    	if($this->Session->read('Proyectosadd')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
    	$this->set('usuario', $this->Proyect->User->find('list', array('fields' => array('username') )));
		$this->set('cliente', $this->Proyect->Client->find('list', array('fields' => array('client_name') )));
		if ($this->request->is('post')) {
            $this->Proyect->create();
            if ($this->Proyect->save($this->request->data)) {
                $this->Session->setFlash(__($this->OK()));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __($this->NOK())
            );
        }
    }

   
   	public function edit($id = null) {
   		if($this->Session->read('Proyectosedit')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
   		$this->set('usuario', $this->Proyect->User->find('list', array('fields' => array('username') )));
		$this->set('cliente', $this->Proyect->Client->find('list', array('fields' => array('client_name') )));
		if (!$id) {
        throw new NotFoundException(__($this->NOK()));
    }

    $post = $this->Proyect->findById($id);
    if (!$post) {
        throw new NotFoundException(__($this->NOK()));
    }
    if ($this->request->is(array('post', 'put'))) {
        $this->Proyect->id = $id;
        if ($this->Proyect->save($this->request->data)) {
            $this->Session->setFlash(__($this->OK()));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__($this->NOK()));
    }

    if (!$this->request->data) {
        $this->request->data = $post;
    }
}

    public function delete($id = null) {
    	if($this->Session->read('Proyectosdelete')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->request->onlyAllow('post');

        $this->Proyect->id = $id;
        if (!$this->Proyect->exists()) {
            throw new NotFoundException(__($this->NOK()));
        }
        if ($this->Proyect->delete()) {
            $this->Session->setFlash(__($this->OK()));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__($this->NOK()));
        return $this->redirect(array('action' => 'index'));
    }

public function nameUser($id){
		$query = $this->Proyect->User->findById($id);
	return  $query['User']['username'];
}

public function nameClient($id){
		$query = $this->Proyect->Client->findById($id);
	return  $query['Client']['client_name'];
}

}
?>