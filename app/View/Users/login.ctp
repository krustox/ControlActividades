<section id="log-in">
<div class="users form">
<?php $this->layout = 'prime';
echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User',array('class'=>'center')); ?>
    <fieldset>
     <!--   <legend>
            <?php echo __('Please enter your username and password'); ?>
     </legend>-->
        <?php 
        //echo $this->Form->input('nombre', array('label' => 'Nit', 'class'=>'text-input'));
        echo $this->Form->input('username', array('label'=>'Nombre de Usuario','class'=>'text-input'));
        echo $this->Form->input('password', array('label'=>'Contraseña','class'=>'text-input'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>
</section>