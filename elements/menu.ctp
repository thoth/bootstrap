<div id="menu-<?php echo $menu['Menu']['id']; ?>" class="menu">
<?php
    echo $this->Custom->nestedLinks($menu['threaded'], $options, 1, $this->Layout, $this->Html);
?>
</div>