<?php
$this->layout = 'prime';
?>
<section id="perfil">
<h4>Archivos</h4>
<?php echo $this->Html->para(null,$this->Html->link("Agregar Archivo", array('action' => 'add'))); ?>
<table id="myTable">
	<thead>
	<?php echo $this->Html->tableHeaders(array
	('Tema','Ruta','Nombre','Acción'));
	?></thead><?php
	foreach ($archives as $archives): 
		$nameActivity = $this->requestAction('/Archives/nameActivity/' . $archives['Archive']['archive_activity']);
	echo $this->Html->tableCells(array(
	//$usuario['Archive']['id'],
	$this->Html->para(null,$nameActivity),
	$this->Html->para(null,$archives['Archive']['archive_archive']),
	$this->Html->para(null,$archives['Archive']['archive_name']),
	$this->Form->postLink(
                'Eliminar',
                array('action' => 'delete', $archives['Archive']['id']),
                array('confirm' => 'Are you sure?'))
	. "  " .
	$this->Html->link('Descargar', array('action' => 'download', $archives['Archive']['id']))
	) );
 endforeach; ?>
</table>
<?php
echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'activities', 'action' => 'index')));
?>
</section>