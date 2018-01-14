<?php
$this->layout = 'prime';
?>
<section id="perfil">
<h4>Editar Perfil</h4>
<?php
    echo $this->Form->create('Profile', array('url'=>array('action' => 'edit'), 'class'=>'center'));
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
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Guardar perfil');
	?>
	
<?php echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'profiles', 'action'=>'index'))); ?>
</section>