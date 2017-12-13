<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header( 'shop' ); 
get_template_part( 'header-details', 'none' ); 
global $redux_demo;
$style = $redux_demo['style-details'];
?>
<?php 
	if($style =='detail1'){
?>
<article id="organic-detail">
	<div class="container">
	
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>
		
	</div>
	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
</article>
<?php } ?>

<?php 
	if($style =='detail2'){
?>
<article id="organic-detail" class="detail2">
	<div class="container">
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>
		<?php wp_reset_postdata(); ?>
	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
	</div>
</article>
<?php } ?>

<?php 
	if($style =='detail3'){
?>
<article id="organic-detail" class="detail3">
	<div class="container">
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>
		<?php wp_reset_postdata(); ?>
	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
	</div>
</article>
<?php } ?>
<article id="organic-send-mail">
	<div class="container">
	<?php 
		global $redux_demo;
	?>
		<div class="bg-subcribe" style="background:url('<?php echo $redux_demo['bg-subcribe']['url']; ?>')">
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
<?php get_footer( 'shop' ); ?>
