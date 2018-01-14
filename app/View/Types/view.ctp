<?php
$this->layout = 'prime';
?>
<section id="perfil">
	<table width="100%">
		<thead>
			<tr>
				<th>Nombre</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $tipos['Type']['type_name']?></td>
			</tr>
		</tbody>
	</table>
<?php echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'types', 'action'=>'index'))); ?>
</section>