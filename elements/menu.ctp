<div id="menu-<?php echo $menu[ 'Menu' ][ 'id' ]; ?>" class="menu">
	<?php
    echo $this->Custom->nestedLinks($menu['threaded'], $options, 1);
//	echo $this->Layout->nestedLinks( $menu[ 'threaded' ], $options );
	?>
</div>