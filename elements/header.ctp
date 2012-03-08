    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="/"><?php echo Configure::read('Site.title'); ?></a>
          <div class="nav-collapse">
          	<?php
          		echo $layout->menu('main', array('dropdown'=>true, 'dropdownClass'=>'nav'));
          	?>
          	
          	 <div class="navbar-text pull-right remove-lineheight">
				<form id="searchform" method="post" class="form-search remove-margins search-box" action="javascript: document.location.href=''+Croogo.basePath+'search/q:'+encodeURI($('#searchform #q').val());">
					<div class="control-group remove-margins">
						<div class="controls">
							<div class="input-append">
								<input class="span2" name="q" id="iconInput" type="text" />
								<span class="add-on" onclick="jQuery('#searchform').submit();"><i class="icon-search"></i></span>
							</div>
						</div>
					</div>
				</form>
          	 </div>
          	
	       	<div class="social-like-links pull-right remove-lineheight">
          	<?php
          		//if you are using the way cool SEO plugin for Croogo, uncomment the following
          		//echo $this->element('google_plusone_tag', array('plugin'=>'seo'));
          		//echo $this->element('twitter_share_button', array('plugin'=>'seo'));
          	?>
          	</div>
          </div>
        </div>
      </div>
    </div>