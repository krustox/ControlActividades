<?php
$this->layout = 'prime';
?>
<section id="perfil">
<h4>Clientes</h4>
<?php echo $this->Html->para(null,$this->Html->link("Agregar Cliente", array('action' => 'add'))); ?>
<table id="myTable">
	<thead>
	<?php echo $this->Html->tableHeaders(array
	('Nombre','Acción'));
	?></thead><?php
	foreach ($clientes as $cliente): 
	echo $this->Html->tableCells(array(
	//$usuario['Client']['id'],
	$this->Html->para(null,$this->Html->link($cliente['Client']['client_name'],array('action' => 'view', $cliente['Client']['id']))),
	$this->Form->postLink(
                'Eliminar',
                array('action' => 'delete', $cliente['Client']['id']),
                array('confirm' => 'Are you sure?')
	) . "  " .
	$this->Html->link('Editar', array('action' => 'edit', $cliente['Client']['id']))
	));
 endforeach; ?>
</table>
<?php
	echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'activities', 'action' => 'index')));
?>
</section>