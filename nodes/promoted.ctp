<div class="nodes promoted">
    <?php
        if (count($nodes) == 0) {
            __('No items found.');
        } else {
            foreach ($this->params['named'] AS $nn => $nv) {
                $paginator->options['url'][$nn] = $nv;
            }
        }
    ?>
      <div class="row-fluid">

    <?php 
    	//keep counter and wrap after every 3
    	$block_num = 0;
        foreach ($nodes AS $node) {
        	if($block_num % 3 == 0){
        		echo '</div><div class="row-fluid">';
        	}
            $this->Layout->setNode($node);
    ?>
        <div id="node-<?php echo $this->Layout->node('id'); ?>" class="span4 node node-type-<?php echo $this->Layout->node('type'); ?>">
	        <h2><?php echo $this->Html->link($this->Layout->node('title'), $this->Layout->node('url')); ?></h2>
	        <?php
	            echo $this->Layout->nodeInfo();
	            echo $this->Layout->nodeBody();
	            echo $this->Layout->nodeMoreInfo();
	        ?>
        </div>

    <?php 
	    	$block_num++;
        }
    	if($block_num % 3 == 0){
    		echo '</div><div class="row-fluid">';
    	}
        
        
    ?>
		<div class="span4 paging"><?php echo $paginator->numbers(); ?></div>
      </div>

    </div>