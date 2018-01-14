<?php
$this->layout = 'prime';
?>
<section id="perfil">
<h4>Editar Cliente</h4>
<?php
    echo $this->Form->create('Client', array('url'=>array('action' => 'edit'), 'class'=>'center'));
	?>
<table width="100%">
	<thead>
		<td>Nombre del Cliente</td>
	</thead>
	<tr>
		<td>
<?php
echo $this->Form->input('client_name', array('label' => '', 'class'=>'text-input'));
?>
</td>
</tr>
</table>
<?php
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Guardar Cliente');
	echo $this->Html->para(null,$this->Html->link('Regresar', array('controller' => 'clients', 'action' => 'index')));
?>
</section>