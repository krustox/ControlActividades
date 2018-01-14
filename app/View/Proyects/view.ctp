<?php
$this->layout = 'prime';
?>
<section id="perfil">
	<table width="100%">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Fecha Inicio</th>
				<th>Fecha Fin</th>
				<th>Administrador</th>
				<th>Cliente</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $proyectos['Proyect']['proyect_name']?></td>
				<td><?php echo $proyectos['Proyect']['proyect_start']?></td>
				<td><?php echo $proyectos['Proyect']['proyect_end']?></td>
				<td><?php $nameUser = $this->requestAction('/proyects/nameUser/' . $proyectos['Proyect']['proyect_admin']);
				echo $nameUser ?></td>
				<td><?php $nameClient = $this->requestAction('/proyects/nameClient/' . $proyectos['Proyect']['proyect_client']);
				echo $nameClient ?></td>
			</tr>
		</tbody>
	</table>
<?php echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'Proyects', 'action'=>'index'))); ?>
</section>