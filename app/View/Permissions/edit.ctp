<?php
$this->layout = 'prime';
?>
 
<section id="perfil1">
<h4>Asignar Permisos</h4>
<?php
echo $this->Form->create('Permission', array('url'=>array('action'=>'edit'),'class'=>'center','width'=>'100%'));
?>
<table width="100%">
    <thead>
        <td width="70%">
            Perfil
        </td>
        <td width="30%">
            Permisos
        </td>
        </thead>
        <tr>
            <td><?php echo $this->Form->input('permiso_perfil',array('options'=>$perfil,'label'=>'','width'=>'100%')); ?></td>
            <td><?php //echo $this->Form->input('permiso_permiso', array('type'=>'checkbox','label'=>'','width'=>'100%')); 
            	echo $this->Form->input('permiso_permiso',array('type'=>'checkbox','label'=>'Listado   ','width'=>'100%'));
				echo $this->Form->input('permiso_permiso_add',array('type'=>'checkbox','label'=>'Agregar   ','width'=>'100%'));
				echo $this->Form->input('permiso_permiso_edit',array('type'=>'checkbox','label'=>'Editar    ','width'=>'100%'));
				echo $this->Form->input('permiso_permiso_delete',array('type'=>'checkbox','label'=>'Eliminar  ','width'=>'100%'));
            	?></td>
        </tr>
        </table>
    <table width="100%">
        <thead>
        <td width="33%">
            Usuario
        </td>
        <td width="33%">
            Actividades
        </td>
        <td width="33%">
            Historicos
        </td>   
    </thead>
    <tr>
<td>
<?php //echo $this->Form->input('permiso_user', array('type'=>'checkbox','label'=>'','width'=>'100%'));
echo $this->Form->input('permiso_user', array('type'=>'checkbox','label'=>'Listado ','width'=>'100%'));
echo $this->Form->input('permiso_user_add', array('type'=>'checkbox','label'=>'Agregar ','width'=>'100%'));
echo $this->Form->input('permiso_user_edit', array('type'=>'checkbox','label'=>'Editar  ','width'=>'100%'));
echo $this->Form->input('permiso_user_delete', array('type'=>'checkbox','label'=>'Eliminar','width'=>'100%'));
echo $this->Form->input('permiso_user_view', array('type'=>'checkbox','label'=>'Ver     ','width'=>'100%'));
 ?>
</td>
<td>
<?php //echo $this->Form->input('permiso_actividades', array('type'=>'checkbox','label'=>'','width'=>'100%'));
echo $this->Form->input('permiso_actividades', array('type'=>'checkbox','label'=>'Listado   ','width'=>'100%'));
echo $this->Form->input('permiso_actividades_add', array('type'=>'checkbox','label'=>'Agregar   ','width'=>'100%'));
echo $this->Form->input('permiso_actividades_edit', array('type'=>'checkbox','label'=>'Editar    ','width'=>'100%'));
echo $this->Form->input('permiso_actividades_delete', array('type'=>'checkbox','label'=>'Eliminar  ','width'=>'100%'));
echo $this->Form->input('permiso_actividades_view', array('type'=>'checkbox','label'=>'Ver       ','width'=>'100%'));
echo $this->Form->input('permiso_actividades_review', array('type'=>'checkbox','label'=>'Reporte       ','width'=>'100%'));
 ?>
</td>
<td>
<?php //echo $this->Form->input('permiso_historico', array('type'=>'checkbox','label'=>'','width'=>'100%')); 
echo $this->Form->input('permiso_historico', array('type'=>'checkbox','label'=>'Listado','width'=>'100%'));
?>
</td>
</tr>
</table>

<table width="100%">
    <thead>
        <td width="33%">
            Cliente
        </td>
        <td width="33%">
            Plataforma
        </td>
        <td width="33%">
            Proyecto
        </td>
    </thead>
    <tr>
<td>
<?php //echo $this->Form->input('permiso_client',array('type'=>'checkbox','label'=>'','width'=>'100%'));
echo $this->Form->input('permiso_client',array('type'=>'checkbox','label'=>'Listado','width'=>'100%'));
echo $this->Form->input('permiso_client_add',array('type'=>'checkbox','label'=>'Agregar','width'=>'100%'));
echo $this->Form->input('permiso_client_edit',array('type'=>'checkbox','label'=>'Editar','width'=>'100%'));
echo $this->Form->input('permiso_client_delete',array('type'=>'checkbox','label'=>'Eliminar','width'=>'100%'));
echo $this->Form->input('permiso_client_view',array('type'=>'checkbox','label'=>'Ver','width'=>'100%'));
 ?> 
</td>
<td>
<?php echo $this->Form->input('permiso_plataforma',array('type'=>'checkbox','label'=>'Listado','width'=>'100%'));
echo $this->Form->input('permiso_plataforma_add',array('type'=>'checkbox','label'=>'Agregar','width'=>'100%'));
echo $this->Form->input('permiso_plataforma_edit',array('type'=>'checkbox','label'=>'Editar','width'=>'100%'));
echo $this->Form->input('permiso_plataforma_delete',array('type'=>'checkbox','label'=>'Eliminar','width'=>'100%'));
echo $this->Form->input('permiso_plataforma_view',array('type'=>'checkbox','label'=>'Ver','width'=>'100%')); ?>   
</td>
<td>
<?php echo $this->Form->input('permiso_proyecto',array('type'=>'checkbox','label'=>'Listado','width'=>'100%'));
echo $this->Form->input('permiso_proyecto_add',array('type'=>'checkbox','label'=>'Agregar','width'=>'100%'));
echo $this->Form->input('permiso_proyecto_edit',array('type'=>'checkbox','label'=>'Editar','width'=>'100%'));
echo $this->Form->input('permiso_proyecto_delete',array('type'=>'checkbox','label'=>'Eliminar','width'=>'100%'));
echo $this->Form->input('permiso_proyecto_view',array('type'=>'checkbox','label'=>'Ver','width'=>'100%'));
 ?>   
</td>
</tr>
</table>
<table width="100%">
    <thead>
        <td width="33%">
            Archivos
        </td>
        <td width="33%">
            Perfiles
        </td>
        <td width="33%">
            Tipo
        </td>   
    </thead>
    <tr>
    <td>
<?php echo $this->Form->input('permiso_archivo',array('type'=>'checkbox','label'=>'Listado','width'=>'100%'));
echo $this->Form->input('permiso_archivo_add',array('type'=>'checkbox','label'=>'Agregar','width'=>'100%'));
echo $this->Form->input('permiso_archivo_edit',array('type'=>'checkbox','label'=>'Editar','width'=>'100%'));
echo $this->Form->input('permiso_archivo_delete',array('type'=>'checkbox','label'=>'Eliminar','width'=>'100%'));
echo $this->Form->input('permiso_archivo_view',array('type'=>'checkbox','label'=>'Ver','width'=>'100%')); ?>
</td>
<td>
<?php echo $this->Form->input('permiso_profile',array('type'=>'checkbox','label'=>'Listado','width'=>'100%'));
echo $this->Form->input('permiso_profile_add',array('type'=>'checkbox','label'=>'Agregar','width'=>'100%'));
echo $this->Form->input('permiso_profile_edit',array('type'=>'checkbox','label'=>'Editar','width'=>'100%'));
echo $this->Form->input('permiso_profile_delete',array('type'=>'checkbox','label'=>'Eliminar','width'=>'100%'));
echo $this->Form->input('permiso_profile_view',array('type'=>'checkbox','label'=>'Ver','width'=>'100%'));
 ?>
</td>
<td>
<?php echo $this->Form->input('permiso_tipo',array('type'=>'checkbox','label'=>'Listado','width'=>'100%'));
echo $this->Form->input('permiso_tipo_add',array('type'=>'checkbox','label'=>'Agregar','width'=>'100%'));
echo $this->Form->input('permiso_tipo_edit',array('type'=>'checkbox','label'=>'Editar','width'=>'100%'));
echo $this->Form->input('permiso_tipo_delete',array('type'=>'checkbox','label'=>'Eliminar','width'=>'100%'));
echo $this->Form->input('permiso_tipo_view',array('type'=>'checkbox','label'=>'Ver','width'=>'100%')); ?>
</td>
</tr>
</table>
<?php
    echo $this->Form->input('id',array('type'=>'hidden'));
    echo $this->Form->end('Guardar Permisos');
?>

<p><?php

echo $this->Html->link('Regresar', array('controller' => 'permissions', 'action' => 'index'));

?></p>
</section>