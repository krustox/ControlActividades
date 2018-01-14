<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>WiseVisionCorp</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<?php
		//libreria
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('Jquery');
		//css
		echo $this->Html->css('layout');
		echo $this->Html->css('forms');
		echo $this->Html->css('navi');
		//echo $this->Html->css('//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css');
		echo $this->Html->css('jquery-ui');
		//echo $this->Html->css('//cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css');
		echo $this->Html->css('jquery.dataTables');
		//echo $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/foundation/4.3.1/css/foundation.min.css');
		//echo $this->Html->css('//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/foundation/dataTables.foundation.css');
		echo $this->Html->css('foundation.css');
		echo $this->Html->css('logport');
		echo $this->Html->css('jquery.datetimepicker.css');
		
		//js
		//echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
		echo $this->Html->script('jquery.js');
 	   	echo $this->Html->script('foundation.min.js');
 	   	echo $this->Html->script('vendor/custom.modernizr.js');
		//echo $this->Html->script('//code.jquery.com/jquery-1.10.2.js');
		echo $this->Html->script('jquery-1.10.2.js');
		echo $this->Html->script('jquery-ui');
		echo $this->Html->script('jquery.datetimepicker.full.min.js');
		echo $this->Html->script('tinymce/tinymce.min.js');
		echo $this->Html->script('my');
		//echo $this->Html->script('//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js');
		echo $this->Html->script('jquery.dataTables.js');
		
		?>
</head>
<body id="top">
<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1><?php //echo $this->Html->link('Control de Actividades', array('controller' => 'activities', 'action' => 'index')); ?>
      	<?php echo $this->Html->image("logoWiseTransparente.png", array( "alt" => "Control de Actividades", 'url' => array('controller' => 'users', 'action' => 'login', 6)));?>	
      </h1>
    </div>
    <div id="usuario">
    	<h3><?php if($this->Session->check('Auth.User')){
            	echo $this->Html->para(null,$this->Html->link($this->Session->read('Auth.User.user_nombre')." ".$this->Session->read('Auth.User.user_apellido'),array('controller' => 'activities', 'action' => 'index')));  
			}
            ?></h3>
    </div>
    <div id="newsletter">
          <?php if(!$this->Session->check('Auth.User')){
          		echo $this->Html->link('Iniciar Sesión','/users/login');
            }else{ 
            	echo $this->Html->link('Cerrar Sesión', array('controller' => 'users', 'action' => 'logout')); 
			}
            ?>
    </div>
    <br class="clear" />
  </div>
</div>
<div class="wrapper col2">
  <div id="topbar">
    <div id="topnav">
    	<?php if($this->Session->check('Auth.User')){ ?>
    	<ul>
    	<?php if($this->Session->read('Usuario')== 1) {  ?>
        <li><?php echo $this->Html->link('Usuarios', array('controller' => 'users', 'action' => 'index'))?></li>
        <?php }  if($this->Session->read('Actividades')==1) {?>
        <li><?php echo $this->Html->link('Actividades',array('controller'=>'activities','action'=>'index'))?></li>
        <?php }  if($this->Session->read('Historicos')==1) {?>
        <li><?php echo $this->Html->link('Historicos',array('controller'=>'historicos','action'=>'index'))?></li>
        <?php }  if($this->Session->read('Proyectos')==1) {?>
        <li><?php echo $this->Html->link('Proyectos',array('controller'=>'proyects','action'=>'index'))?></li>
        <?php }  if($this->Session->read('Tipos')==1) {?>
        <li><?php echo $this->Html->link('Tipos',array('controller'=>'types','action'=>'index'))?></li>
        <?php }  if($this->Session->read('Plataformas')==1) {?>
        <li><?php echo $this->Html->link('Plataformas',array('controller'=>'platforms','action'=>'index'))?></li>
        <?php }  if($this->Session->read('Clientes')==1) {?>
        <li><?php echo $this->Html->link('Clientes',array('controller'=>'clients','action'=>'index'))?></li>
        <?php }  if($this->Session->read('Archivos')==1) {?>
        <li><?php echo $this->Html->link('Archivos',array('controller'=>'archives','action'=>'index'))?></li>
        <?php }  if($this->Session->read('Perfiles')==1) {?>
        <li><?php echo $this->Html->link('Perfiles',array('controller'=>'profiles','action'=>'index'))?></li>
        <?php }  if($this->Session->read('Permisos')==1) {?>
        <li><?php echo $this->Html->link('Permisos',array('controller'=>'permissions','action'=>'index'))?></li>
        <?php }?>
      </ul>
      <?php } ?>
    </div>
    <br class="clear" />
  </div>
</div>

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		<div class="wrapper col7">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2016 - All Rights Reserved - <a href="">WiseVision</a></p>
    <p class="fl_right">Template by <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <br class="clear" />
  </div>
</div>
<?php
if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) echo $this->Js->writeBuffer();
// Writes cached scripts
?>
</body>
</html>
