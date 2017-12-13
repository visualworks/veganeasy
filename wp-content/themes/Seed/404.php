<?php get_header(); ?>
<?php
global $redux_demo;
$style = $redux_demo['style-404'];
if($style =='style1'){
?>
<body>
	<img src="<?php print(get_template_directory_uri()); ?>/images/bg-404.png" id="full-screen-background-image" /> 
	  <div id="wrapper">
	    <div class="organic-notice">
			<div class="text-noti-top">oops, this page could not be found!</div>
			<div class="text-noti">The page you are looking might have been removed, had its name changed, or is temporarily unavaible.</div>
			<div class="img-404">
				<img src="<?php print(get_template_directory_uri()); ?>/images/bg-404-1.png">
			</div>
			<div class="row">
				<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
					<div class="input-group search-404">
					       <?php echo do_shortcode('[wpdreams_ajaxsearchpro id=2]') ?>
					   </div>
				</div>
			</div>
		</div>
	  </div>
</body>	
</html>
<?php }?>
<?php
if($style =='style2'){
?>
<body>
	<img src="<?php print(get_template_directory_uri()); ?>/images/bg-404-02.png" id="full-screen-background-image" /> 
	  <div id="wrapper" class="style2-404">
	    <div class="organic-notice">
			<div class="text-noti-top">oops, this page could not be found!</div>
			<div class="text-noti">The page you are looking might have been removed, had its name changed, or is temporarily unavaible.</div>
			<div class="img-404">
				<img src="<?php print(get_template_directory_uri()); ?>/images/404-02.png">
			</div>
			<div class="row">
				<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
					<div class="input-group search-404">
					       <?php echo do_shortcode('[wpdreams_ajaxsearchpro id=2]') ?>
					   </div>
				</div>
			</div>
		</div>
	  </div>
</body>	
</html>
<?php }?>