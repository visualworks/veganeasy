<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]> <html <?php language_attributes(); ?>> <![endif]-->
 
<head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <link rel="profile" href="http://gmgp.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <?php wp_head() ?>
</head>

<body <?php body_class() ?> >
    <?php
			global $redux_demo;
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
			global $woocommerce;
			$string = get_woocommerce_currency();
			$cart_url = $woocommerce->cart->get_cart_url();
			}
			else{
				$string = '';
			}
        ?>   
	<header id="header" class="organic-header">
		
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					<div id="logo">
				<a href="<?php echo get_home_url(); ?>">
					<?php
						if ( class_exists( 'ReduxFramework' ) && is_plugin_active( 'beautheme-seed/init.php' )) {
						global $redux_demo;
		                    echo '<img src="'.$redux_demo['logo']['url'].'">';
						}
						else{	?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Logo seed">
					<?php } ?>
				</a>
			</div>
				</div>
				<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">

					<div class="row">
						<div id="organic-header-menu">
						<div id="currency"><?php echo esc_attr($string); ?></div>
						<div id="welcome-mess">
							<?php
								if ( is_user_logged_in() ) {
								    $current_user = wp_get_current_user();
								    echo _e('Welcome','beautheme').', ' . $current_user->user_login . '!';
								} else {
								    _e('Welcome, visitor!','beautheme');
								}
							?>
						</div>
							<ul id="header-menu">
								<li>
									 <?php if ( is_user_logged_in() ) { ?>
									 	<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','beautheme'); ?>"><?php _e('My Account','beautheme'); ?></a>
									
								</li>
								<?php
									if( function_exists( 'YITH_WCWL' ) ){
									    $wishlist_url = YITH_WCWL()->get_wishlist_url();
									}
								 ?>
								<li><a href="<?php print $wishlist_url; ?>"><?php _e('My Wishlist','beautheme') ?></a></li>
								<li>
									 <?php } 
									 else { ?>
									 	<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login','beautheme'); ?>"><?php _e('Login','beautheme'); ?></a>
									 <?php } ?>
								</li>
								<li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Sign up','beautheme'); ?>"><?php _e('Sign up','beautheme'); ?></a></li>
							</ul>
					</div>
					</div>

					<div id="organic-main-menu">
							<?php origanic_menu( 'primary-menu' ); ?>
							
					</div>
					<a class="menu-mb"><span class="a"><?php _e('Menu','beautheme') ?></span></a>
					<div class="cart-top">
						<a href="#"><div id="search-header"></div></a>
						<div id="cart-header" data-toggle="modal" data-target="#myModalcart"></div>
						<div class="icon">( <?php echo $woocommerce->cart->cart_contents_count; ?> )</div>
					</div>
					<div class="search-header">
						<a href="#"><div class="close"></div></a>
						<?php echo do_shortcode('[wpdreams_ajaxsearchpro id=1]') ?>
					</div>
					
				</div>
			</div>
		</div>
	</header><!--/header -->
	<div id="organic-mobile-menu">
			<?php wp_nav_menu( array( // show menu mobile
			        'theme_location' => 'mobile-menu',
			        'container' => 'nav',
			        'container_class' => 'mobile-menu'
			 ) ); ?>
	</div>
