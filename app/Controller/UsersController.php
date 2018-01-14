<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {
    
    public $uses = array('User','Permission');

   public function beforeFilter() {
    	parent::beforeFilter();
    	// Allow Usuarios to register and logout.
   		$this->Auth->allow('login','add', 'logout');
	}

    public function index($id = null) {
    	if($this->Session->read('Usuario')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
			$this->set('usuarios', $this->User->find('all'));
	}

    public function view($id = null) {
    	if($this->Session->read('Usuarioview')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__("Error"));
        }
        $this->set('usuarios', $this->User->read());
    }

    public function add($id = null) {
    	//if($this->Session->read('Usuarioadd')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
    	$this->set('perfil', $this->User->Profile->find('list', array('fields' => array('profile_name') )));
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__("OK"));
				return $this->redirect(array('controller' => 'pages', 'action' => 'perfil'));
            }
            $this->Session->setFlash(
                __("Error")
            );
        }
    }

    public function edit($id = null) {
    	if($this->Session->read('Usuarioedit')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
    	$this->set('perfil', $this->User->Profile->find('list', array('fields' => array('profile_name') )));
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__("Error"));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__("OK"));
				return $this->redirect(array('controller' => 'pages', 'action' => 'perfil'));
            }
            $this->Session->setFlash(
                __("Error")
            );
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
    	if($this->Session->read('Usuariodelete')!= 1) {return $this->redirect(array('controller'=>'activities','action' => 'index'));}
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__("Error"));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__("OK"));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__("Error"));
        return $this->redirect(array('action' => 'index'));
    }
	
	
public function display(){
	return $this->redirect(array('action' => 'login'));
}

public function login() {
    if ($this->request->is('post')) {
    	if ($this->Auth->login()) {
    	    $this->Varses($this->Session->read('Auth.User.user_perfil'));        		
         	return $this->redirect(array('controller' => 'Activities', 'action' => 'index'));
	}
    }
    $this->Session->setFlash(__("Error"));
    }


public function logout() {
    return $this->redirect($this->Auth->logout());
}

public function nombrePerfil($id){
	$query = $this->User->Profile->findById($id);
	return $query['Profile']['profile_name'];
}

public function Varses($id){
    $query = $this->Permission->find('first',array('conditions'=>array('permiso_perfil'=>$id)));
    $user = $query['Permission']['permiso_user'];
    $actividades = $query['Permission']['permiso_actividades'];
    $historicos = $query['Permission']['permiso_historico'];
    $proyectos = $query['Permission']['permiso_proyecto'];
    $tipos = $query['Permission']['permiso_tipo'];
    $plataformas = $query['Permission']['permiso_plataforma'];
    $clientes = $query['Permission']['permiso_client'];
    $archivos = $query['Permission']['permiso_archivo'];
    $perfil = $query['Permission']['permiso_profile'];
    $permisos =  $query['Permission']['permiso_permiso'];
    $this->Session->write('Usuario',$user);
	$this->Session->write('Usuarioadd',$query['Permission']['permiso_user_add']);
	$this->Session->write('Usuarioedit',$query['Permission']['permiso_user_edit']);
	$this->Session->write('Usuariodelete',$query['Permission']['permiso_user_delete']);
	$this->Session->write('Usuarioview',$query['Permission']['permiso_user_view']);
    $this->Session->write('Actividades',$actividades);
	$this->Session->write('Actividadesadd',$query['Permission']['permiso_actividades_add']);
	$this->Session->write('Actividadesedit',$query['Permission']['permiso_actividades_edit']);
	$this->Session->write('Actividadesdelete',$query['Permission']['permiso_actividades_delete']);
	$this->Session->write('Actividadesview',$query['Permission']['permiso_actividades_view']);
	$this->Session->write('Actividadesreview',$query['Permission']['permiso_actividades_review']);
    $this->Session->write('Historicos',$historicos);
    $this->Session->write('Proyectos',$proyectos);
	$this->Session->write('Proyectosadd',$query['Permission']['permiso_proyecto_add']);
	$this->Session->write('Proyectosedit',$query['Permission']['permiso_proyecto_edit']);
	$this->Session->write('Proyectosdelete',$query['Permission']['permiso_proyecto_delete']);
	$this->Session->write('Proyectosview',$query['Permission']['permiso_proyecto_view']);
    $this->Session->write('Tipos',$tipos);
	$this->Session->write('Tiposadd',$query['Permission']['permiso_tipo_add']);
	$this->Session->write('Tiposedit',$query['Permission']['permiso_tipo_edit']);
	$this->Session->write('Tiposdelete',$query['Permission']['permiso_tipo_delete']);
	$this->Session->write('Tiposview',$query['Permission']['permiso_tipo_view']);
    $this->Session->write('Plataformas',$plataformas);
	$this->Session->write('Plataformasadd',$query['Permission']['permiso_plataforma_add']);
	$this->Session->write('Plataformasedit',$query['Permission']['permiso_plataforma_edit']);
	$this->Session->write('Plataformasdelete',$query['Permission']['permiso_plataforma_delete']);
	$this->Session->write('Plataformasview',$query['Permission']['permiso_plataforma_view']);
    $this->Session->write('Clientes',$clientes);
	$this->Session->write('Clientesadd',$query['Permission']['permiso_client_add']);
	$this->Session->write('Clientesedit',$query['Permission']['permiso_client_edit']);
	$this->Session->write('Clientesdelete',$query['Permission']['permiso_client_delete']);
	$this->Session->write('Clientesview',$query['Permission']['permiso_client_view']);
    $this->Session->write('Archivos',$archivos);
	$this->Session->write('Archivosadd',$query['Permission']['permiso_archivo_add']);
	$this->Session->write('Archivosedit',$query['Permission']['permiso_archivo_edit']);
	$this->Session->write('Archivosdelete',$query['Permission']['permiso_archivo_delete']);
	$this->Session->write('Archivosview',$query['Permission']['permiso_archivo_view']);
    $this->Session->write('Permisos',$permisos);
	$this->Session->write('Permisosadd',$query['Permission']['permiso_permiso_add']);
	$this->Session->write('Permisosedit',$query['Permission']['permiso_permiso_edit']);
	$this->Session->write('Permisosdelete',$query['Permission']['permiso_permiso_delete']);
	//$this->Session->write('Permisosview',$query['Permission']['permiso_permiso_view']);
    $this->Session->write('Perfiles',$perfil);
	$this->Session->write('Perfilesadd',$query['Permission']['permiso_profile_add']);
	$this->Session->write('Perfilesedit',$query['Permission']['permiso_profile_edit']);
	$this->Session->write('Perfilesdelete',$query['Permission']['permiso_profile_delete']);
	$this->Session->write('Perfilesview',$query['Permission']['permiso_profile_view']);
}

}
?>