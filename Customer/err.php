<?php  if (count($err) > 0) : ?>
  <div class="error">
  	<?php foreach ($err as $error) : ?>
  	  <h3  style="color:"><b><?php echo $error ?></b></h3>
  	<?php endforeach ?>
  </div>
<?php  endif ?>