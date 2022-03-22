<?php  

if (count($success) > 0) : ?>
  <div class="display-form-success">
  	<?php foreach ($success as $good) : ?>
  	  <p><?php echo $good ?></p>
  	<?php endforeach ?>
  </div>

<?php  endif ?>