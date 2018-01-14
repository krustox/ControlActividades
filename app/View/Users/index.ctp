<?php
$this->layout = 'prime';
?>
<section id="perfil">
<h4>Usuarios</h4>
<?php echo $this->Html->para(null,$this->Html->link("Agregar Usuario", array('action' => 'add'))); ?>
<table id="myTable">
	<thead>
	<?php echo $this->Html->tableHeaders(array
	('Usuario','Nombre','Apellido','Perfil','Correo','Acción'));
	?></thead><?php
	foreach ($usuarios as $usuario): 
	$nombrePerfil= $this->requestAction('/Users/nombrePerfil/' . $usuario['User']['user_perfil']);
	echo $this->Html->tableCells(array(
	//$usuario['User']['id'],
	$this->Html->para(null,$this->Html->link($usuario['User']['username'],array('action' => 'view', $usuario['User']['id']))),
	$this->Html->para(null,$usuario['User']['user_nombre']),
	$this->Html->para(null,$usuario['User']['user_apellido']),
	$this->Html->para(null,$nombrePerfil),
	$this->Html->para(null,$usuario['User']['user_correo']),
	$this->Form->postLink(
                'Eliminar',
                array('action' => 'delete', $usuario['User']['id']),
                array('confirm' => 'Are you sure?')
	) . "  " .
	$this->Html->link('Editar', array('action' => 'edit', $usuario['User']['id']))
	));
 endforeach; ?>
</table>
<?php
	echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'activities', 'action' => 'index')));
?>
</section>