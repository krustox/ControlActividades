<?php
$this->layout = 'prime';
$this->Html->script('prototype', array('inline' => false));
?>
 
<section id="perfil">
<h4>Agregar Actividades</h4>

<?php
$fecha = new DateTime();
echo $this->Form->create('Activity', array('class'=>'center','type' => 'file'));
?>
<table width="100%">
	<thead>
		<td width="100%">
			Tema
		</td>
		</thead>
		<tr>
		    <td><?php echo $this->Form->input('activity_tema',array('label'=>'','width'=>'100%')); ?></td>
		</tr>
		</table>
	<table width="100%">
		<thead>
		<td width="33%">
			Fecha de Inicio
		</td>
		<td width="33%">
			Fecha de Actualización
		</td>
		<td width="33%">
            Fecha de Fin
        </td>	
	</thead>
	<tr>
<td>
<?php echo $this->Form->input('activity_start', array('label'=>'','id'=>'datetimepicker3','type'=>'text')); ?>
</td>
<td>
<?php echo $this->Form->input('activity_update', array('label'=>'','id'=>'datetimepicker31','type'=>'text')); ?>
</td>
<td>
<?php echo $this->Form->input('activity_end', array('label'=>'','id'=>'datetimepicker32','type'=>'text')); ?>
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
<?php echo $this->Form->input('activity_user',array('label'=>'','default'=>$this->Session->read('Auth.User.id'),'options'=>$usuario,'width'=>'100%','empty' => '-- Seleccione Usuario --')); ?>	
</td>
<td>
<?php echo $this->Form->input('activity_platform',array('label'=>'','options'=>$plataforma,'width'=>'100%','empty' => '-- Seleccione Plataforma --')); ?>	
</td>
<td>
<?php echo $this->Form->input('activity_type',array('label'=>'','options'=>$tipo,'width'=>'100%','empty' => '-- Seleccione Tipo --')); ?>	
</td>
<td>
<?php echo $this->Form->input('activity_state', array('label'=>'','width'=>'100%')); ?>
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
<?php echo $this->Form->input('Cliente',array('label'=>'','id'=>'cliente','options'=>$cliente,'width'=>'100%','empty' => '-- Seleccione Cliente --')); ?>
</td>
<td>
<?php echo $this->Form->input('activity_proyect',array('label'=>'','id'=>'proy','options'=>$proyecto,'width'=>'100%','empty' => '-- Seleccione Proyecto --')); ?>
</td>
</tr>
</table>
<table width="100%">
	<thead>
		<td>Descripción</td>
	</thead>
	<tr>
	<td>
<?php echo $this->Form->input('activity_description', array('label'=>'','type'=>'textarea','width'=>'100%')); ?>
</td>
</tr>
</table>
<table width="100%">
	<thead>
		<td>Archivos</td>
		
	</thead>
	<tr>
	<td>
<?php echo $this->Form->input('archivos.',array('label'=>'','type' => 'file','multiple'=>'multiple','id'=>'archiv'));?>
</td>
</tr>
</table>
<?php
	echo $this->Form->end('Guardar Actividad');
?>
<?php echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'activities', 'action' => 'index')));?>

<?php
$this->Js->get('#cliente')->event('change', 
$this->Js->request(array(
'controller'=>'Activities',
'action'=>'ajax_proy'
), array(
'update'=>'#proy',
'async' => true,
'method' => 'post',
'dataExpression'=>true,
'data'=> $this->Js->serializeForm(array(
'/Elements/ajax_dropdown' => true,
'inline' => true
))
))
);
?>
</section>
