<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]> <html <?php language_attributes(); ?>> <![endif]
-->
 
<head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <link rel="profile" href="http://gmgp.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <?php wp_head() ?>
</head>
<?php
    global $beau_option;
    $megamenu_setting = $beau_option['megamenu-type'];
    if ($megamenu_setting == '') {
        $megamenu_setting = 'No';
    }
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
?>
<header id="header" class="organic-header">
			<div id="logo">
				<a href="<?php echo get_home_url(); ?>">
					<?php
						include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
						if ( class_exists( 'ReduxFramework' ) && is_plugin_active( 'beautheme-seed/init.php' )) {
						global $redux_demo;
		                    echo '<img src="'.$redux_demo['logo']['url'].'">';
						}
						else{	?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Logo seed">
					<?php } ?>
				</a>
			</div>
			<div class="row">
					<div id="organic-main-menu">
							<?php origanic_menu( 'primary-menu' ); ?>
							
					</div>
					<a class="menu-mb"><span class="a"><?php _e('Menu', 'beautheme'); ?></span></a>
			</div>
		<div class="menu-right">
			<a class="link-menu trigger closed"><span class="a"><?php _e('Menu', 'beautheme'); ?></span></a>
			<div class="menu-right-layout">
				<div class="search-right">
				<?php
				if( file_exists( plugins_url( "ajax-search-pro/ajax-search-pro.php", __FILE__ ) ) && is_plugin_active( 'ajax-search-pro/ajax-search-pro.php' )){

					echo do_shortcode('[wpdreams_ajaxsearchpro id=3]');
				}
				?>
				</div>
				<div style="clear: both;"></div>
				<?php
					if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
				?>
				<div class="main-menu-right">
					<ul>
						
						<li>
							<?php 
							if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
							?>
							<a href="<?php echo WC()->cart->get_cart_url(); ?>"><?php _e('My cart ', 'beautheme'); ?> ( <?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?> )</a>
							<?php } ?>
						</li>
						<li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','beautheme'); ?>"><?php _e('My Account','beautheme'); ?></a></li>
						<?php
							if( function_exists( 'YITH_WCWL' ) ){
							    $wishlist_url = YITH_WCWL()->get_wishlist_url();
							}
						 ?>
						<li><a href="<?php echo esc_attr($wishlist_url); ?>"><?php _e('My Wishlist', 'beautheme'); ?></a></li>
						<?php do_action( 'woocommerce_before_customer_login_form' ); ?>
						<?php 
							if( !is_user_logged_in()) {
						?>
						<div class="form-login">
						<li class="poup-login"><a href="#"><?php _e('Log in', 'beautheme'); ?></a></li>
						<div style="clear: both;"></div>

						<div class="login">
							<?php do_action( 'woocommerce_before_customer_login_form' ); ?>
								<?php do_action( 'woocommerce_login_form_start' ); ?>
								<form method="post" class="login" action="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">

									

									<p class="form-row form-row-wide">
										<input type="text" class="input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
									</p>
									<div style="clear: both;"></div>
									<p class="form-row form-row-wide">
										<input class="input-text" type="password" name="password" id="password" />
									</p>

									<?php do_action( 'woocommerce_login_form' ); ?>

									<p class="form-row">
										<?php wp_nonce_field( 'woocommerce-login' ); ?>
										<label for="rememberme" class="inline remember">
											<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Check agrement', 'beautheme' ); ?>
										</label>
										<div style="clear: both;"></div>
										<input type="submit" class="button" name="login" value="<?php _e( 'Sign In', 'beautheme' ); ?>" />
										
									</p>
								</form>
								<?php do_action( 'woocommerce_login_form_end' ); ?>
							<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
						</div>
						</div>
						<div style="clear: both;"></div>
						<li class=""><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php _e('Sign Up', 'beautheme'); ?></a></li>
						<?php 
							}
							else{
								echo '<li><a href="'. wp_logout_url( get_permalink( woocommerce_get_page_id( 'myaccount' ) ) ) .'">'.__( 'Log Out', 'beautheme').'</a></li>';
								
							}
						?>
						<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
					</ul>
				</div>
				<?php } ?>
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