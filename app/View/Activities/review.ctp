<?php
$this->layout = 'prime';
?>
<section id="perfil">
<h4>Actividades</h4>
<?php 
echo $this->Form->create('Activity', array('url'=>array('action'=>'review'),'class'=>'center','type' => 'file'));?>
<table width="100%">
	<thead>
		<td width="50%">
			Fecha Inicial
		</td>
		<td width="50%">
			Fecha Final
		</td>
		</thead>
		<tr>
		    <td>
		<?php	echo $this->Form->input('start', array('label'=>'','id'=>'datetimepicker3','type'=>'text')); ?>
			</td>
			<td>
		<?php	echo $this->Form->input('end', array('label'=>'','id'=>'datetimepicker31','type'=>'text')); ?>
			</td>
		</tr>
</table>
<?php	echo $this->Form->end('Buscar');?>
<table id="myTable2">
	<thead>
	<?php echo $this->Html->tableHeaders(array
	('Fecha','Plataforma','Tema','Usuario',/*'Proyecto',*/'Estado','Estado 2','Tipo','Descripción'));
	?></thead><?php
	foreach ($actividades as $actividad): 
		$nameUser = $this->requestAction('/Activities/nameUser/' . $actividad['Activity']['activity_user']);
		$namePlatform = $this->requestAction('/Activities/namePlatform/' . $actividad['Activity']['activity_platform']);
		$nameType = $this->requestAction('/Activities/nameType/' . $actividad['Activity']['activity_type']);
		$nameProyect = $this->requestAction('/Activities/nameProyect/' . $actividad['Activity']['activity_proyect']);
		$nameClient = $this->requestAction('/Activities/nameClient/' . $actividad['Activity']['activity_proyect']);
		if($actividad['Activity']['activity_state'] == 0){
			$estado="Abierto"; 
		}elseif ($actividad['Activity']['activity_state'] == 100){
			$estado="Cerrado"; 
		}else{
			$estado="Progreso"; 
		}
	echo $this->Html->tableCells(array(
	
	$this->Html->para(null,$actividad['Activity']['activity_update']),
	$this->Html->para(null,$namePlatform),
	$this->Html->para(null,$actividad['Activity']['activity_tema']),
	$this->Html->para(null,$nameUser),
	$this->Html->para(null,$actividad['Activity']['activity_state']."%"),
	$this->Html->para(null,$estado),
	$this->Html->para(null,$nameType),
	$this->Html->para(null,$actividad['Activity']['activity_description'])
	));
 endforeach; ?>
</table>
<h5>Reporte</h5>
<?php 
echo $this->Form->create('Activity', array('url'=>array('action'=>'report'),'class'=>'center','type' => 'file'));?>
<table width="100%">
	<thead>
		<td width="50%">
			Fecha Inicial
		</td>
		<td width="50%">
			Fecha Final
		</td>
		</thead>
		<tr>
		    <td>
		<?php	echo $this->Form->input('start', array('label'=>'','id'=>'datetimepicker1','type'=>'text')); ?>
			</td>
			<td>
		<?php	echo $this->Form->input('end', array('label'=>'','id'=>'datetimepicker11','type'=>'text')); ?>
			</td>
		</tr>
</table>
<?php	echo $this->Form->end('Reporte');?>
<?php 
if($this->Session->read('Actividades')==1) {
echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'activities', 'action' => 'index')));
}?>
</section>