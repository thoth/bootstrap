<?php
class CustomHelper extends Helper {

	//Have to subvert the default Croogo menuing to work with bootstrap
	public function nestedLinks($links, $options = array(), $depth = 1, $layout, $html) {
	    	
	        $_options = array();
	        $options = array_merge($_options, $options);
	
	        $output = '';
	        foreach ($links AS $link) {
	            $linkAttr = array(
	                'id' => 'link-' . $link['Link']['id'],
	                'rel' => $link['Link']['rel'],
	                'target' => $link['Link']['target'],
	                'title' => $link['Link']['description'],
	                'class' => $link['Link']['class'],
	                'escape'=> false
	            );
	
	            foreach ($linkAttr AS $attrKey => $attrValue) {
	                if ($attrValue == null) {
	                    unset($linkAttr[$attrKey]);
	                }
	            }
	
	            // if link is in the format: controller:contacts/action:view
	            if (strstr($link['Link']['link'], 'controller:')) {
	                $link['Link']['link'] = $layout->linkStringToArray($link['Link']['link']);
	            }
	
	            // Remove locale part before comparing links
	            if (!empty($layout->params['locale'])) {
	                $currentUrl = substr($layout->params['url']['url'], strlen($layout->params['locale']));
	            } else {
	                $currentUrl = $layout->params['url']['url'];
	            }
	
	            if (Router::url($link['Link']['link']) == Router::url('/' . $currentUrl)) {
	                if (!isset($linkAttr['class'])) {
	                    $linkAttr['class'] = '';
	                }
	                $linkAttr['class'] .= ' ' . $options['selected'];
	            }
				$linkAttr['escape'] = false;
				
	            $parentTag = '';
	            if (isset($link['children']) && count($link['children']) > 0) {
	            	$linkAttr['class'] .= ' dropdown-toggle';
	            	$linkAttr['data-toggle'] = 'dropdown';
		            $linkOutput = $html->link($link['Link']['title'].' <b class="caret"></b>', $link['Link']['link'], $linkAttr);
	                $linkOutput .= $this->nestedLinks($link['children'], $options, $depth + 1, $layout, $html);
	                $parentTag = 'dropdown';
	            } else {
		            $linkOutput = $html->link($link['Link']['title'], $link['Link']['link'], $linkAttr);
	            
	            }
	            $linkOutput = $html->tag('li', $linkOutput, array('class'=>$parentTag));
	            $output .= $linkOutput;
	        }
	        if ($output != null) {
	            $tagAttr = $options['tagAttributes'];
	            if ($options['dropdown'] && $depth == 1) {
	                $tagAttr['class'] = $options['dropdownClass'];
	            }
	            if($options['dropdown'] && $depth > 1){
		            $tagAttr['class'] = " dropdown-menu";
	            }
            	$output = $html->tag($options['tag'], $output, $tagAttr);
	        }
	
	        return $output;
	    }
}
?>