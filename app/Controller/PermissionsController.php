<?php
App::uses('AppController', 'Controller');

class PermissionsController extends AppController {

    public function index() {
    	if($this->Session->read('Permisos')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->set('permisos', $this->Permission->find('all'));
        
    }

    public function view($id = null) {
    	if($this->Session->read('Permisosview')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->Permission->id = $id;
        if (!$this->Permission->exists()) {
            throw new NotFoundException(__($this->NOK()));
        }
        $this->set('permisos', $this->Permission->read());
    }

    public function add() {
    	if($this->Session->read('Permisosadd')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->set('perfil', $this->Permission->Profile->find('list', array('fields' => array('profile_name') )));
        //$this->set('opts', array(1 => 'Accede', 0 => 'No Accede'));
        if ($this->request->is('post')) {
            $this->Permission->create();
            if ($this->Permission->save($this->request->data)) {
                $this->Session->setFlash(__($this->OK()));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __($this->NOK())
            );
        }
    }

   
    public function edit($id = null) {
    	if($this->Session->read('Permisosedit')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->set('perfil', $this->Permission->Profile->find('list', array('fields' => array('profile_name') )));
        //$this->set('opts', [1 => 'Accede', 0 => 'No Accede']);
        if (!$id) {
        throw new NotFoundException(__($this->NOK()));
    }

    $post = $this->Permission->findById($id);
    if (!$post) {
        throw new NotFoundException(__($this->NOK()));
    }
    if ($this->request->is(array('post', 'put'))) {
        $this->Permission->id = $id;
        if ($this->Permission->save($this->request->data)) {
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
    	if($this->Session->read('Permisosdelete')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->request->onlyAllow('post');

        $this->Permission->id = $id;
        if (!$this->Permission->exists()) {
            throw new NotFoundException(__($this->NOK()));
        }
        if ($this->Permission->delete()) {
            $this->Session->setFlash(__($this->OK()));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__($this->NOK()));
        return $this->redirect(array('action' => 'index'));
    }

public function namePerfil($id){
        $query = $this->Permission->Profile->findById($id);
    return  $query['Profile']['profile_name'];
}

}
?>