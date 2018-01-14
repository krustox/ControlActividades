<?php
$this->layout = 'prime';
?>
<section id="perfil">
<h4>Editar Usuario</h4>
<?php
    echo $this->Form->create('User', array('url'=>array('action' => 'edit'), 'class'=>'center'));
	?>
<table width="100%">
	<thead>
	<td>Nombre</td>
	<td>Apellido</td>
	</thead>
	<tr>
		<td>
<?php
echo $this->Form->input('user_nombre', array('label' => '', 'class'=>'text-input'));
?>
</td>
<td>
<?php
echo $this->Form->input('user_apellido', array('label' => '', 'class'=>'text-input'));
?>
</td>
</tr>
</table>
<table width="100%">
	<thead>
	<td>Usuario</td>
	<td>Contraseña</td>
	<td>Confimre Contraseña</td>
	</thead>
	<tr>
		<td>
<?php
echo $this->Form->input('username', array('label' => '', 'class'=>'text-input'));
?>
</td>
<td>
<?php
echo $this->Form->input('password', array('label' => '', 'class'=>'text-input'));
?>
</td>
<td>
<?php
echo $this->Form->input('password_repeat', array('type'=>'password','label' => '', 'class'=>'text-input'));
?>
</td>
</table>
<table width="100%">
	<thead>
	<td>Perfil</td>
	<td>Correo</td>
	</thead>
	<tr>
		<td>
<?php
echo $this->Form->input('user_perfil', array('label' => '','options'=>$perfil, 'class'=>'text-input'));
?>
</td>
<td>
<?php
echo $this->Form->input('user_correo', array('label' => '', 'class'=>'text-input'));
?>
</td>
</tr>
</table>
<?php
	echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Guardar Usuario');
	echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'users')));
?>
</section>