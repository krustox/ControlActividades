<?php
$this->layout = 'prime';
?>
<section id="perfil">
<table width="100%">
	<thead>
		<td width="60%">
			Tema
		</td>
		<td width="20%">
			Fecha de Inicio
		</td>
		<td width="20%">
			Fecha de Actualización
		</td>	
	</thead>
	<tr>
	<td>
<?php echo $this->Html->para(null,$Actividades['Activity']['activity_tema']); ?>
</td>
<td>
<?php echo $this->Html->para(null,$Actividades['Activity']['activity_start']); ?>
</td>
<td>
<?php echo $this->Html->para(null,$Actividades['Activity']['activity_update']); ?>
</td>
</tr>
</table>

<table width="100%">
	<thead>
		<td width="25%">
			Usuario
		</td>
		<td width="25%">
			Plataforma
		</td>
		<td width="25%">
			Tipo
		</td>
		<td width="25%">
			Estado
		</td>
	</thead>
	<tr>
<td>
<?php $nombre= $this->requestAction('/activities/nameUser/' .$Actividades['Activity']['activity_user']); 
echo $this->Html->para(null,$nombre); ?>	
</td>
<td>
<?php $nombre= $this->requestAction('/activities/namePlatform/' .$Actividades['Activity']['activity_platform']);
 echo $this->Html->para(null,$nombre); ?>	
</td>
<td>
<?php $nombre= $this->requestAction('/activities/nameType/' .$Actividades['Activity']['activity_type']);
echo $this->Html->para(null,$nombre); ?>	
</td>
<td>
<?php echo $this->Html->para(null,$Actividades['Activity']['activity_state']); ?>
</td>
</tr>
</table>
<table width="100%">
	<thead>
		<td width="50%">
			Cliente
		</td>
		<td width="50%">
			Proyecto
		</td>	
	</thead>
	<tr>
	<td>
<?php $nombre= $this->requestAction('/activities/nameClient/' .$Actividades['Activity']['activity_proyect']); 
echo $this->Html->para(null,$nombre); ?>
</td>
<td>
<?php $nombre= $this->requestAction('/activities/nameProyect/' .$Actividades['Activity']['activity_proyect']);
echo $this->Html->para(null,$nombre); ?>
</td>
</tr>
</table>
<table width="100%">
	<thead>
		<td>Descripción</td>
	</thead>
	<tr>
	<td>
<?php echo $this->Html->para(null,$Actividades['Activity']['activity_description']); ?>
</td>
</tr>
</table>
<table width="100%">
	<thead>
		<td>Archivos</td>
		
	</thead>
	<tr>
	<td>
		<?php
foreach ($archivos as $archivo):
echo $this->Html->para(null,"Archivo: ".$this->Html->link($archivo['Archive']['archive_name'], array('controller'=>'archives','action' => 'download', $archivo['Archive']['id'])));
endforeach;
?>
</td>
</tr>
</table>
<?php echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'Activities', 'action'=>'index'))); ?>
</section>