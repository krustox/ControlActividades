<?php
$this->layout = 'prime';
?>
<section id="perfil">
<h4>Historico</h4>
<table id="myTable">
	<thead>
	<?php echo $this->Html->tableHeaders(array
	('id','Usuario','Actividad','Fecha','Descripción'));
	?></thead><?php
	foreach ($historicos as $historico): 
		$nameUser = $this->requestAction('/historicos/nameUser/' . $historico['Historico']['historico_user']);
		$nameActivity = $this->requestAction('/historicos/nameActivity/' . $historico['Historico']['historico_actividad']);
	echo $this->Html->tableCells(array(
	$this->Html->para(null,$historico['Historico']['id']),
	$this->Html->para(null,$nameUser),
	$this->Html->para(null,$nameActivity),
	$this->Html->para(null,$historico['Historico']['historico_fecha']),
	$this->Html->para(null,$historico['Historico']['historico_descripcion'])
	));
	
 endforeach; ?>
</table>
<?php
	echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'Activities', 'action' => 'index')));
?>
</section>