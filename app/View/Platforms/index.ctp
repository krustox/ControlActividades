<?php
$this->layout = 'prime';
?>
<section id="perfil">
<h4>Plataformas</h4>
<?php echo $this->Html->para(null,$this->Html->link("Agregar Plataforma", array('action' => 'add'))); ?>
<table id="myTable">
	<thead>
	<?php echo $this->Html->tableHeaders(array
	('Nombre','Acción'));
	?></thead><?php
	foreach ($plataformas as $plataforma): 
	echo $this->Html->tableCells(array(
	//$usuario['Platform']['id'],
	$this->Html->para(null,$this->Html->link($plataforma['Platform']['platform_name'],array('action' => 'view', $plataforma['Platform']['id']))),
	$this->Form->postLink(
                'Eliminar',
                array('action' => 'delete', $plataforma['Platform']['id']),
                array('confirm' => 'Are you sure?')
	) . "  " .
	$this->Html->link('Editar', array('action' => 'edit', $plataforma['Platform']['id']))
	));
 endforeach; ?>
</table>
<?php
	echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'activities', 'action' => 'index')));
?>
</section>