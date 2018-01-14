<?php
$this->layout = 'prime';
?>
<section id="perfil">
<h4>Agregar Perfil</h4>
<?php
echo $this->Form->create('Profile', array('class' => 'center'));
?>
<table width="100%">
	<thead>
		<td>
			Nombre del Perfil
		</td>
	</thead>
	<tr>
		<td>
<?php
echo $this->Form->input('profile_name', array('label' => '', 'class'=>'text-input'));
?>
</td>
</tr>
</table>
<?php
echo $this->Form->end('Guardar Perfil');
?>
<?php echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'profiles', 'action'=>'index'))); ?>
</section>