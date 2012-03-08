<?php
	header('Content-type: application/rss+xml');
    echo $rss->header();
    if (!isset($channel)) {
        $channel = array();
    }
    if (!isset($channel['title'])) {
        $channel['title'] = $title_for_layout . ' - ' . Configure::read('Site.title');
    }
    
    $channel['atom:link'] = array(
    	'attrib'=>array(
    		'href'=>'http://'.$_SERVER['SERVER_NAME'].$this->here,
    		'rel'=>'self',
    		'type'=>'application/rss+xml'
    	)
    );
?>
<?php echo '<?'; ?>xml-stylesheet type="text/xsl" href="<?php echo $rss->webroot('css/feed.xsl') ?>" ?>
<?php
    $channelEl = $rss->channel(array(), $channel, $items);
    echo $rss->document(array('xmlns:atom'=>'http://www.w3.org/2005/Atom'), $channelEl);
?>