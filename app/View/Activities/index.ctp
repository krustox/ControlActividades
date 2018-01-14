<?php
$this->layout = 'prime';
?>
<section id="perfil">
<h4>Actividades</h4>
<?php echo $this->Html->para(null,$this->Html->link("Agregar Actividad", array('action' => 'add'))); ?>
<table id="myTable1">
	<thead>
	<?php echo $this->Html->tableHeaders(array
	('Tema',/*'Inicio',*/'Actualización','Usuario','Cliente',/*'Proyecto',*/'Plataforma','Estado','Estado 2','Tipo','Acción'));
	?></thead><?php
	foreach ($actividades as $actividad): 
		$nameUser = $this->requestAction('/Activities/nameUser/' . $actividad['Activity']['activity_user']);
		$namePlatform = $this->requestAction('/Activities/namePlatform/' . $actividad['Activity']['activity_platform']);
		$nameType = $this->requestAction('/Activities/nameType/' . $actividad['Activity']['activity_type']);
		$nameProyect = $this->requestAction('/Activities/nameProyect/' . $actividad['Activity']['activity_proyect']);
		$nameClient = $this->requestAction('/Activities/nameClient/' . $actividad['Activity']['activity_proyect']);
	//if($actividad['Activity']['activity_user'] === $this->Session->read('Auth.User.id')){
		if($actividad['Activity']['activity_state'] == 0){
			$estado="Abierto"; 
		}elseif ($actividad['Activity']['activity_state'] == 100){
			$estado="Cerrado"; 
		}else{
			$estado="Progreso"; 
		}
		if($estado!="Cerrado" || $actividad['Activity']['activity_end'] != null){
	echo $this->Html->tableCells(array(
	//$usuario['Activity']['id'],
	
	$this->Html->para(null,$this->Html->link($actividad['Activity']['activity_tema'],array('action' => 'view', $actividad['Activity']['id']))),
	//$this->Html->para(null,$actividad['Activity']['activity_start']),
	$this->Html->para(null,$actividad['Activity']['activity_update']),
	$this->Html->para(null,$nameUser),
	$this->Html->para(null,$nameClient),
	//$this->Html->para(null,$nameProyect),
	$this->Html->para(null,$namePlatform),
	$this->Html->para(null,$actividad['Activity']['activity_state']."%"),
	$this->Html->para(null,$estado),
	$this->Html->para(null,$nameType),
	$this->Form->postLink(
                'Eliminar',
                array('action' => 'delete', $actividad['Activity']['id']),
                array('confirm' => 'Are you sure?')
	) . "  " .
	$this->Html->link('Editar', array('action' => 'edit', $actividad['Activity']['id']))
	));
		}else{
		echo $this->Html->tableCells(array(
	//$usuario['Activity']['id'],
	
	$this->Html->para(null,$this->Html->link($actividad['Activity']['activity_tema'],array('action' => 'view', $actividad['Activity']['id']))),
	//$this->Html->para(null,$actividad['Activity']['activity_start']),
	$this->Html->para(null,$actividad['Activity']['activity_update']),
	$this->Html->para(null,$nameUser),
	$this->Html->para(null,$nameClient),
	//$this->Html->para(null,$nameProyect),
	$this->Html->para(null,$namePlatform),
	$this->Html->para(null,$actividad['Activity']['activity_state']."%"),
	$this->Html->para(null,$estado),
	$this->Html->para(null,$nameType),
	" "
	));	
		}
	
 endforeach; ?>
</table>
<?php echo $this->Html->para(null,$this->Html->link('Reporte', array('controller' => 'activities', 'action' => 'review')));?>
</section>