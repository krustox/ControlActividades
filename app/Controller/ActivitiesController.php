<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class ActivitiesController extends AppController {
	public $helpers=array('PhpExcel.PhpExcel'); 
	public $uses = array('Archive','User','Proyect','Platform','Activity');
	
    public function index() {
		if($this->Session->read('Actividades')!= 1) {
			if($this->Session->read('Usuario')== 1) {return $this->redirect(array('controller'=>'users','action' => 'index'));}
			if($this->Session->read('Historicos')== 1) {return $this->redirect(array('controller'=>'historicos','action' => 'index'));}
			if($this->Session->read('Proyectos')== 1) {return $this->redirect(array('controller'=>'proyects','action' => 'index'));}
			if($this->Session->read('Tipos')== 1) {return $this->redirect(array('controller'=>'types','action' => 'index'));}
			if($this->Session->read('Plataformas')== 1) {return $this->redirect(array('controller'=>'platforms','action' => 'index'));}
			if($this->Session->read('Clientes')== 1) {return $this->redirect(array('controller'=>'clients','action' => 'index'));}
			if($this->Session->read('Archivos')== 1) {return $this->redirect(array('controller'=>'archives','action' => 'index'));}
			if($this->Session->read('Perfiles')== 1) {return $this->redirect(array('controller'=>'profiles','action' => 'index'));}
			if($this->Session->read('Permisos')== 1) {return $this->redirect(array('controller'=>'permissions','action' => 'index'));}
			if($this->Session->read('Actividadesreview')== 1) {return $this->redirect(array('controller'=>'activities','action' => 'review'));}
			return $this->redirect(array('controller'=>'users','action' => 'login'));
		}
//echo APP;
//echo WWW_ROOT;
        $this->set('actividades', $this->Activity->find('all',array('conditions'=>array('activity_user'=>$this->Session->read('Auth.User.id')))));
	}

    public function view($id = null) {
		if($this->Session->read('Actividadesview')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->Activity->id = $id;
        if (!$this->Activity->exists()) {
            throw new NotFoundException(__($this->NOK()));
        }
		$this->set('archivos',$this->Archive->find('all',array('conditions'=>array('archive_activity'=>$id))));
        $this->set('Actividades', $this->Activity->read());
    }

    public function add() {
		if($this->Session->read('Actividadesadd')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
    	$this->set('usuario', $this->Activity->User->find('list', array('fields' => array('username') )));
		$this->set('plataforma', $this->Activity->Platform->find('list', array('fields' => array('platform_name') )));
		$this->set('tipo', $this->Activity->Type->find('list', array('fields' => array('type_name') )));
		$this->set('proyecto', $this->Activity->Proyect->find('list', array('fields' => array('proyect_name'))));
		$this->set('cliente', $this->Activity->Proyect->Client->find('list', array('fields' => array('client_name') )));
		if ($this->request->is('post')) {
            $this->Activity->create();
			//echo $this->request->data['Activity']['activity_start'];
			if($this->request->data['Activity']['activity_update'] == null){
				$activity = new Activity();
				$activity->activity_tema = $this->data['Activity']['activity_tema'];
				$activity->activity_start = $this->data['Activity']['activity_start'];
				$activity->activity_update = $this->data['Activity']['activity_start'];
				$activity->activity_end = $this->data['Activity']['activity_end'];
				$activity->activity_user = $this->data['Activity']['activity_user'];
				$activity->activity_platform = $this->data['Activity']['activity_platform'];
				$activity->activity_type = $this->data['Activity']['activity_type'];
				$activity->activity_state = $this->data['Activity']['activity_state'];
				$activity->activity_proyect = $this->data['Activity']['activity_proyect'];
				$activity->activity_description = $this->data['Activity']['activity_description'];
				if ($this->Activity->save($activity)) {
                		$this->Session->setFlash(__("OK"));
						$this->Session->setFlash(__($this->OK()));
						$this->archivo($this->Activity->id,$this->request->data);
						return $this->redirect(array('action' => 'index'));
					}
			}
            if ($this->Activity->save($this->request->data)) {
              $this->Session->setFlash(__($this->OK()));
				$this->archivo($this->Activity->id,$this->request->data);
				
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(_($this->NOK()));
        }
    }

   
   	public function edit($id = null) {
		if($this->Session->read('Actividadesedit')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
   		$this->set('usuario', $this->Activity->User->find('list', array('fields' => array('username') )));
		$this->set('plataforma', $this->Activity->Platform->find('list', array('fields' => array('platform_name') )));
		$this->set('tipo', $this->Activity->Type->find('list', array('fields' => array('type_name') )));
		$this->set('proyecto', $this->Activity->Proyect->find('list', array('fields' => array('proyect_name') )));
		$this->set('cliente', $this->Activity->Proyect->Client->find('list', array('fields' => array('client_name') )));
		if (!$id) {
        throw new NotFoundException(__($this->NOK()));
    }

    $post = $this->Activity->findById($id);
    if (!$post) {
        throw new NotFoundException(__($this->NOK()));
    }
    if ($this->request->is(array('post', 'put'))) {
        $this->Activity->id = $id;
		if($this->request->data['Activity']['activity_start'] >= $this->request->data['Activity']['activity_update']){
			$fecha = new DateTime();
				$this->Activity->activity_tema = $this->data['Activity']['activity_tema'];
				$this->Activity->activity_start = $this->data['Activity']['activity_start'];
				$this->Activity->activity_update = date_format($fecha,'Y-m-d H:m:s');
				$this->Activity->activity_end = $this->data['Activity']['activity_end'];
				$this->Activity->activity_user = $this->data['Activity']['activity_user'];
				$this->Activity->activity_platform = $this->data['Activity']['activity_platform'];
				$this->Activity->activity_type = $this->data['Activity']['activity_type'];
				$this->Activity->activity_state = $this->data['Activity']['activity_state'];
				$this->Activity->activity_proyect = $this->data['Activity']['activity_proyect'];
				$this->Activity->activity_description = $this->data['Activity']['activity_description'];
				if ($this->Activity->save($this->Activity)) {
                		$this->Session->setFlash(__("OK"));
						$this->Session->setFlash(__($this->OK()));
						$this->archivo($this->Activity->id,$this->request->data);
						return $this->redirect(array('action' => 'index'));
					}
			//echo $this->request->data['Activity']['activity_start'] ." ";
			//echo date_format($fecha,'Y-m-d H:m:s');
		}
        if ($this->Activity->save($this->request->data)) {
            $this->Session->setFlash(__($this->OK()));
			$this->archivo($id,$this->request->data);
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__($this->NOK()));
    }

    if (!$this->request->data) {
        $this->request->data = $post;
    }
		 
}

    public function delete($id = null) {
		if($this->Session->read('Actividadesdelete')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->request->onlyAllow('post');

        $this->Activity->id = $id;
        if (!$this->Activity->exists()) {
            throw new NotFoundException(__($this->NOK()));
        }
        if ($this->Activity->delete()) {
            $this->Session->setFlash(__($this->OK()));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__($this->NOK()));
        return $this->redirect(array('action' => 'index'));
    }
	
public function review(){
if($this->Session->read('Actividadesreview')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
	if ($this->request->is(array('post'))) {
		$this->set('actividades', $this->Activity->find('all',array('conditions'=>array('activity_update BETWEEN ? and ?'=>array($this->request->data['Activity']['start'],$this->request->data['Activity']['end'])))));
	}else{
	   $this->set('actividades', $this->Activity->find('all'));
	}
}

public function report(){
		$fecha = new DateTime();
		$end = date_format($fecha,'Y/m/d H:m:s');
		$final = strtotime(date_format($fecha,'Y-m-d H:m:s').' -1 months');
		if($this->request->data['Activity']['start']==""){
			$this->set('actividades', $this->Activity->find('all'));
		}
		else if($this->request->data['Activity']['end']==""){
			$this->set('actividades', $this->Activity->find('all',array('conditions'=>array('activity_update BETWEEN ? and ?'=>array($this->request->data['Activity']['start'],$end)))));
		}
		else{
			$this->set('actividades', $this->Activity->find('all',array('conditions'=>array('activity_update BETWEEN ? and ?'=>array($this->request->data['Activity']['start'],$this->request->data['Activity']['end'])))));
		}
		$files=WWW_ROOT."reporte_".date_format($fecha,'Y-m-d_H-i-s').".xlsx";
		$this->Session->write('ruta',$files);
		$this->set('file',$files);		
}

public function email(){
	$Email = new CakeEmail('gmail');
		$Email->from('tivoli@bancoestado.cl');
		$Email->to('rfadul@externos.bancoestado.cl');
		$Email->subject("Prueba");
		$Email->attachments(array('ReporteMensual.xlsx' => $this->Session->read('ruta')));
		$Email->send('Prueba');
}

public function nameUser($id){
		$query = $this->Activity->User->findById($id);
	return  $query['User']['username'];
}
public function namePlatform($id){
		$query = $this->Activity->Platform->findById($id);
	return  $query['Platform']['platform_name'];
}
public function nameProyect($id){
		$query = $this->Activity->Proyect->findById($id);
	return  $query['Proyect']['proyect_name'];
}
public function nameType($id){
		$query = $this->Activity->Type->findById($id);
	return  $query['Type']['type_name'];
}

public function nameClient($id){
	$query = $this->Activity->Proyect->findById($id);
	$query2= $this->Activity->Proyect->Client->findById($query['Proyect']['proyect_client']);
	return $query2['Client']['client_name'];
}

function ajax_proy() {
    // Fill select form field after Ajax request.
    $this->set('options',
        $this->Activity->Proyect->find('list',
            array('fields' => array('proyect_name'),
                'conditions' => array(
                    'proyect_client' => $this->data['Activity']['Cliente']
                )
            )
        )
    );
	//echo $this->data['Activity']['Cliente'];
    $this->render('/elements/ajax_dropdown');
}


function archivo($id,$archivos){
				$proyecto = $this->Activity->Proyect->findById($archivos['Activity']['activity_proyect']);
				if(!is_dir(WWW_ROOT."files/".$this->Session->read('Auth.User.username'))){
            		mkdir(WWW_ROOT."files/".$this->Session->read('Auth.User.username'));
				}
				if(!is_dir(WWW_ROOT."files/".$this->Session->read('Auth.User.username')."/".$proyecto['Proyect']['proyect_name'])){
					mkdir(WWW_ROOT."files/".$this->Session->read('Auth.User.username')."/".$proyecto['Proyect']['proyect_name']);
				}
			$files = $archivos['Activity']['archivos'];
			foreach($files as $files){
				$nombrearchivo = WWW_ROOT."files/".$this->Session->read('Auth.User.username')."/".$proyecto['Proyect']['proyect_name']."/".$files['name'];
/* copiamos el archivo*/
				if (move_uploaded_file($files['tmp_name'],$nombrearchivo)) {
					$this->loadModel('Archive');
					$archivo = new Archive();
					$archivo->archive_name= $files['name'];
					$archivo->archive_activity= $id;
					$archivo->archive_archive=$nombrearchivo;
					
					if ($this->Archive->save($archivo)) {
                		$this->Session->setFlash(__("OK"));
					}
				}

		}
}

}

?>