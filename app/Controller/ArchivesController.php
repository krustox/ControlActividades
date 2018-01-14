<?php
App::uses('File', 'Utility');
App::uses('AppController', 'Controller');


class ArchivesController extends AppController {

    public function index($id = null) {
    		if($this->Session->read('Archivos')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
			$this->set('archives', $this->Archive->find('all'));
	}

    public function add($id = null) {
    	if($this->Session->read('Archivosadd')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
    	$this->set("actividad",$this->Archive->Activity->find('list', array('fields' => array('activity_tema'))));
        if ($this->request->is('post')) {
        	$actividad = $this->Archive->Activity->findById($this->request->data['Archive']['archive_activity']);
			$proyecto = $this->Archive->Activity->Proyect->findById($actividad['Activity']['activity_proyect']);
            if(!is_dir(WWW_ROOT."files/".$this->Session->read('Auth.User.username'))){
            	mkdir(WWW_ROOT."files/".$this->Session->read('Auth.User.username'));
			}
			if(!is_dir(WWW_ROOT."files/".$this->Session->read('Auth.User.username')."/".$proyecto['Proyect']['proyect_name'])){
				mkdir(WWW_ROOT."files/".$this->Session->read('Auth.User.username')."/".$proyecto['Proyect']['proyect_name']);
			}
			$files = $this->request->data['Archive']['archivos'];
			foreach($files as $files){
				$name =$files['name'];
            	$nombrearchivo = WWW_ROOT."files/".$this->Session->read('Auth.User.username')."/".$proyecto['Proyect']['proyect_name']."/".$files['name'];
/* copiamos el archivo*/
			//echo $name;
				if (move_uploaded_file($files['tmp_name'],$nombrearchivo)) {
					$archivo = new Archive();
					$archivo->archive_name= $name;
					$archivo->archive_activity= $this->data['Archive']['archive_activity'];
					$archivo->archive_archive=$nombrearchivo;
					
					if ($this->Archive->save($archivo)) {
                		$this->Session->setFlash(__("OK"));
					}
					$this->Session->setFlash('Archivo subido satisfactoriamente');
				}
			}
					return $this->redirect(array('action' => 'index'));
				} else {
/* mensaje al usaurio */
					$this->Session->setFlash('Error al subir el archivo, verificar.');
				}
		}

    public function delete($id = null) {
    	if($this->Session->read('Archivosdelete')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->request->onlyAllow('post');

        $this->Archive->id = $id;
        if (!$this->Archive->exists()) {
            throw new NotFoundException(__("Error"));
        }
		$archivo = $this->Archive->findById($id);
		if(is_file($archivo['Archive']['archive_archive'])){
			if(unlink($archivo['Archive']['archive_archive'])){
        		if ($this->Archive->delete()) {
            		$this->Session->setFlash(__("OK"));
            		return $this->redirect(array('action' => 'index'));
        		}
			}
		}else{
			if ($this->Archive->delete()) {
            		$this->Session->setFlash(__("OK"));
            		return $this->redirect(array('action' => 'index'));
        		}
		}
        $this->Session->setFlash(__("Error"));
        return $this->redirect(array('action' => 'index'));
    }
	
	public function nameActivity($id){
		$query = $this->Archive->Activity->findById($id);
	return  $query['Activity']['activity_tema'];
}
	
	public function download($id) {
    $path = $this->Archive->findById($id);
    $this->response->file($path['Archive']['archive_archive'], array(
        'download' => true,
        'name' => $path['Archive']['archive_name'],
    ));
    return $this->response;
}
	
}
?>