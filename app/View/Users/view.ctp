<?php
$this->layout = 'prime';
?>
<section id="perfil">
	<table width="100%">
		<thead>
			<tr>
				<th>Usuario</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Perfil</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $usuarios['User']['username']?></td>
				<td><?php echo $usuarios['User']['user_nombre']?></td>
				<td><?php echo $usuarios['User']['user_apellido']?></td>
				<td><?php $nombrePerfil= $this->requestAction('/Users/nombrePerfil/' . $usuarios['User']['user_perfil']);
					echo $nombrePerfil;
					?></td>
			</tr>
		</tbody>
	</table>
<?php echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'users', 'action'=>'index'))); ?>
</section>