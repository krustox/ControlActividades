<?php
$this->layout = 'prime';
?>
 
<section id="perfil">
<h4>Editar Proyecto</h4>
<?php
echo $this->Form->create('Proyect', array('url'=>array('action' => 'edit'),'class'=>'center'));
?>
<table width="100%">
	<thead>
		<td>Nombre del Proyecto</td>
	</thead>
	<tr>
		<td>
<?php echo $this->Form->input('proyect_name',array('label'=>'','width'=>'100%')); ?>
</td>
</tr>
</table>
<table width="100%">
	<thead>
		<td>Fecha de Inicio</td>
		<td>Fecha de Finalización</td>
	</thead>
	<tr>
		<td>
<?php echo $this->Form->input('proyect_start', array('label'=>'','id'=>'datetimepicker1','type'=>'text')); ?>
</td>
<td>
<?php echo $this->Form->input('proyect_end', array('label'=>'','id'=>'datetimepicker11','type'=>'text')); ?>
</td>
</tr>
</table>
<table width="100%">
	<thead>
		<td>Administrador</td>
		<td>Cliente</td>
	</thead>
	<tr>
		<td>
<?php echo $this->Form->input('proyect_admin',array('label'=>'','options'=>$usuario,'width'=>'100%')); ?>
</td>
<td>
<?php echo $this->Form->input('proyect_client',array('label'=>'','options'=>$cliente,'width'=>'100%')); ?>
</td>
</tr>
</table>
<?php echo $this->Form->input('id', array('type' => 'hidden'));
?>

<?php
	echo $this->Form->end('Guardar Proyecto');
?>

<?php

echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'proyects', 'action' => 'index')));

?>
</section>