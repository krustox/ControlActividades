<?php
$this->layout = 'prime';
?>
<section id="perfil">
<h4>Agregar Tipos</h4>
<?php
echo $this->Form->create('Type', array('class' => 'center'));
?>
<table width="100%">
	<thead>
		<td>Nombre del Tipo</td>
	</thead>
	<tr>
		<td>
<?php
echo $this->Form->input('type_name', array('label' => '', 'class'=>'text-input'));
?>
</td>
</tr>
</table>
<?php
echo $this->Form->end('Guardar Tipo');
?>
<?php echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'types', 'action'=>'index'))); ?>
</section>