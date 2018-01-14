<?php
$this->layout = 'prime';
?>
<section id="perfil">
<h4>Perfiles</h4>
<?php echo $this->Html->para(null,$this->Html->link("Agregar Perfil", array('action' => 'add'))); ?>
<table id="myTable">
	<thead>
	<?php echo $this->Html->tableHeaders(array
	('Nombre','Acción'));
	?></thead><?php
	foreach ($perfiles as $perfiles): 
	echo $this->Html->tableCells(array(
	//$usuario['Profile']['id'],
	$this->Html->para(null,$this->Html->link($perfiles['Profile']['profile_name'],array('action' => 'view', $perfiles['Profile']['id']))),
	$this->Form->postLink(
                'Eliminar',
                array('action' => 'delete', $perfiles['Profile']['id']),
                array('confirm' => 'Are you sure?')
	) . "  " .
	$this->Html->link('Editar', array('action' => 'edit', $perfiles['Profile']['id']))
	));
 endforeach; ?>
</table>
<?php
	echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'activities', 'action' => 'index')));
?>
</section>