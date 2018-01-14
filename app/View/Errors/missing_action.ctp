 <?php
 $this->layout = 'prime';
 ?>
 <div id= "perfil" align="center">
 <h3>La Página solicitada no se encuentra en nuestros servidores</h3>
 <?php echo $this->Html->image("simpson404.jpg", array( "alt" => "Control de Actividades", 'url' => array('controller' => 'users', 'action' => 'login', 6)));?>
</div>