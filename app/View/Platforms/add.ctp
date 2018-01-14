<?php
$this->layout = 'prime';
?>
<section id="perfil">
<h4>Agregar Plataforma</h4>
<?php
echo $this->Form->create('Platform', array('class' => 'center'));
?>
<table width="100%">
	<thead>
		<td>Nombre de la Plataforma</td>
	</thead>
	<tr>
		<td>
<?php
echo $this->Form->input('platform_name', array('label' => '', 'class'=>'text-input'));
?>
</td>
</tr>
</table>
<?php
echo $this->Form->end('Guardar Plataforma');
?>
<?php echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'platforms', 'action'=>'index'))); ?>
</section>