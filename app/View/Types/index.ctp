<?php
$this->layout = 'prime';
?>
<section id="perfil">
<h4>Tipos</h4>
<?php echo $this->Html->para(null,$this->Html->link("Agregar Tipo", array('action' => 'add'))); ?>
<table id="myTable">
	<thead>
	<?php echo $this->Html->tableHeaders(array
	('Nombre','Acción'));
	?></thead><?php
	foreach ($tipos as $tipo): 
	echo $this->Html->tableCells(array(
	//$usuario['Type']['id'],
	$this->Html->para(null,$this->Html->link($tipo['Type']['type_name'],array('action' => 'view', $tipo['Type']['id']))),
	$this->Form->postLink(
                'Eliminar',
                array('action' => 'delete', $tipo['Type']['id']),
                array('confirm' => 'Are you sure?')
	) . "  " .
	$this->Html->link('Editar', array('action' => 'edit', $tipo['Type']['id']))
	));
 endforeach; ?>
</table>
<?php
	echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'activities', 'action' => 'index')));
?>
</section>