<?php
$this->layout = 'prime';
?>
<section id="perfil">
<h4>Permisos</h4>
<?php echo $this->Html->para(null,$this->Html->link("Agregar Permisos", array('action' => 'add'))); ?>
<table id="myTable">
    <thead>
    <?php echo $this->Html->tableHeaders(array
    ('Perfil','Usuario','Cliente','Plataforma','Archivos','Tipos','Proyectos','Historicos','Perfil','Actividades','Permisos','Acción'));
    ?></thead><?php
    foreach ($permisos as $permiso): 
    $nombrePerfil= $this->requestAction('/Permissions/namePerfil/' . $permiso['Permission']['permiso_perfil']);
        if($permiso['Permission']['permiso_user']==0){$user="No Accede";}else{$user="Accede";}
        if($permiso['Permission']['permiso_client']==0){$cliente="No Accede";}else{$cliente="Accede";}
        if($permiso['Permission']['permiso_plataforma']==0){$plataforma="No Accede";}else{$plataforma="Accede";}
        if($permiso['Permission']['permiso_tipo']==0){$tipo="No Accede";}else{$tipo="Accede";}
        if($permiso['Permission']['permiso_archivo']==0){$archivo="No Accede";}else{$archivo="Accede";}
        if($permiso['Permission']['permiso_proyecto']==0){$proyecto="No Accede";}else{$proyecto="Accede";}
        if($permiso['Permission']['permiso_historico']==0){$historico="No Accede";}else{$historico="Accede";}
        if($permiso['Permission']['permiso_profile']==0){$profile="No Accede";}else{$profile="Accede";}
        if($permiso['Permission']['permiso_actividades']==0){$actividades="No Accede";}else{$actividades="Accede";}
        if($permiso['Permission']['permiso_permiso']==0){$perm="No Accede";}else{$perm="Accede";}
    echo $this->Html->tableCells(array(
    //$permiso['Permission']['id'],
    $this->Html->para(null,$nombrePerfil),
    $this->Html->para(null,$user),
    $this->Html->para(null,$cliente),
    $this->Html->para(null,$plataforma),
    $this->Html->para(null,$archivo),
    $this->Html->para(null,$tipo),
    $this->Html->para(null,$proyecto),
    $this->Html->para(null,$historico),
    $this->Html->para(null,$profile),
    $this->Html->para(null,$actividades),
    $this->Html->para(null,$perm),
    $this->Form->postLink(
                'Eliminar',
                array('action' => 'delete', $permiso['Permission']['id']),
                array('confirm' => 'Are you sure?')
    ) . "  " .
    $this->Html->link('Editar', array('action' => 'edit', $permiso['Permission']['id']))
    ));
 endforeach; ?>
</table>
<?php
    echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'activities', 'action' => 'index')));
?>
</section>