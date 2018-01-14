<?php
$this->layout = 'prime';
?>
<section id="perfil">
	<table width="100%">
		<thead>
			<tr>
				<th>Nombre del Perfil</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $perfiles['Profile']['profile_name']?></td>
			</tr>
		</tbody>
	</table>
<?php echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'profiles', 'action'=>'index'))); ?>
</section>