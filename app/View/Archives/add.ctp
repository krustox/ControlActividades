<?php
$this->layout = 'prime';
?>
 
<section id="perfil">
<h4>Agregar Archivos</h4>
<div class="posts form">
<?php echo $this->Form->create('Archive',array('id' => 'formulario','class'=>'center','type' => 'file')); ?>
    <fieldset>
    	<table width="100%">
    		<thead>
    			<td>Actividad</td>
    			<td>Archivo</td>
    		</thead>
    		<tr>
    		<td><?php echo $this->Form->input('archive_activity',array('label'=>'','options'=>$actividad,'width'=>'100%','empty' => '-- Seleccione Actividad --'));?></td>
    	<td><?php echo $this->Form->input('archivos.',array('label'=>'','type' => 'file','multiple'=>'multiple'));?></td>
    </tr>
    </table>
    </fieldset>
<?php echo $this->Form->end(__('Subir Archivo')); 
echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'archives', 'action' => 'index')));
?>
</div>   
</section>