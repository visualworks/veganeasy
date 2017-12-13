<?php 
$img = shortcode_atts(array(
            'bg_subcribe' => 'bg_subcribe',
        ), $atts);
  $img = wp_get_attachment_image_src($img["bg_subcribe"], "full");
  $bg_img = $img[0];
?>
<article id="organic-send-mail">
	<div class="container">
		<div class="bg-subcribe" 
			<?php if(!$bg_img=='') {?>
			style="background: url('<?php echo esc_attr($bg_img); ?>');"
			<?php } ?>
		>
			<?php 
                if ( is_active_sidebar( 'email-subscribe' ) ){
                    if ( is_plugin_active( 'email-subscribers/email-subscribers.php' ) ) {
                        if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('email-subscribe') ) ;
                    }
                }
            ?>
		</div>
	</div>
</article>