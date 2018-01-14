<?php
$this->layout = 'prime';
?>
<section id="perfil">
<h4>Proyectos</h4>
<p><?php echo $this->Html->link("Agregar Proyecto", array('action' => 'add')); ?></p>
<table id="myTable">
	<thead>
	<?php echo $this->Html->tableHeaders(array
	('Nombre','Cliente','Inicio','Fin','Administrador','Acción'));
	?></thead><?php
	foreach ($proyectos as $proyecto): 
	$nameUser = $this->requestAction('/proyects/nameUser/' . $proyecto['Proyect']['proyect_admin']);
	$nameClient = $this->requestAction('/proyects/nameClient/' . $proyecto['Proyect']['proyect_client']);
	echo $this->Html->tableCells(array(
	//$usuario['Proyect']['id'],
	$this->Html->para(null,$this->Html->link($proyecto['Proyect']['proyect_name'],array('action' => 'view', $proyecto['Proyect']['id']))),
	$this->Html->para(null,$nameClient),
	$this->Html->para(null,$proyecto['Proyect']['proyect_start']),
	$this->Html->para(null,$proyecto['Proyect']['proyect_end']),
	$this->Html->para(null,$nameUser),
	$this->Form->postLink(
                'Eliminar',
                array('action' => 'delete', $proyecto['Proyect']['id']),
                array('confirm' => 'Are you sure?')
	) . "  " .
	$this->Html->link('Editar', array('action' => 'edit', $proyecto['Proyect']['id']))
	));
 endforeach; ?>
</table>
<?php
	echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'activities', 'action' => 'index')));
?>
</section>