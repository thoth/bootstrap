<div id="menu-<?php echo $menu['Menu']['id']; ?>" class="menu">
<?php
    echo $custom->nestedLinks($menu['threaded'], $options, 1, $this->Layout, $this->Html);
?>
</div>