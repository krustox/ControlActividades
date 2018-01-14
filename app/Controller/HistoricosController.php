<?php
App::uses('AppController', 'Controller');

class HistoricosController extends AppController {

    public function index() {
    	if($this->Session->read('Historicos')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->set('historicos', $this->Historico->find('all'));
		
	}

    public function view($id = null) {
    	if($this->Session->read('Historicos')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->Historico->id = $id;
        if (!$this->Historico->exists()) {
            throw new NotFoundException(__($this->NOK()));
        }
        $this->set('historicos', $this->Historico->read());
    }
	
public function nameUser($id){
		$query = $this->Historico->User->findById($id);
	return  $query['User']['username'];
}
public function nameActivity($id){
		$query = $this->Historico->Activity->findById($id);
	return  $query['Activity']['activity_tema'];
}

}
?>