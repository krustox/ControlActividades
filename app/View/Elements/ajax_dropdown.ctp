<?php $this->layout ='ajax';
foreach($options as $key => $val) { ?>
<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
<?php } ?>