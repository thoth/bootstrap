      <footer>
      	<div class="row">
	      	<div class="span3">
        		<p>&copy; <?php echo Configure::read('Site.title').' '.date('Y'); ?></p>
        	</div>
	      	<div class="span9">
          	<?php
          		echo $this->Layout->menu('footer', array( 'dropdownClass'=>'nav'));
          	?>
        	</div>
        </div>
      </footer>