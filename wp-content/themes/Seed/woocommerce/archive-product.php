<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header( 'shop' ); 
get_template_part( 'header-grid', 'none' ); 

?>
<section id="main-page">
	
		<article id="organic-header-grid">
			<div class="row">
				<?php 
				if (is_product_category()){

				global $wp_query;
				// get the query object
				$cat = $wp_query->get_queried_object();
				// get the thumbnail id user the term_id
				$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
				// get the image URL
				$image = wp_get_attachment_url( $thumbnail_id );
				// print the IMG HTML
				?>
				<div class="img-fix">
					<?php echo '<img src="'.$image.'" alt=""/>'; ?>
				</div>
				<?php } 
				else{
					echo '<div class="img-fix">';
					if( is_shop() ) {
				    $shop = get_option( 'woocommerce_shop_page_id' );
				    if( has_post_thumbnail( $shop ) ) {
				      echo get_the_post_thumbnail( $shop );
				    }
				    echo '</div>';
				  }
				?>
				<?php }?>
				<div class="row" id="bg-cover">
					<div class="container">	
						<div class="cover-top">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="category-list">
										<?php woocommerce_breadcrumb(  );?>
								</div>
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
								<div class="category-name">
									<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
										<?php woocommerce_page_title(); ?>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
		<div class="container">	
		<article id="organic-content-grid">
			<div class="container">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="sidebar-product">
					<?php 
			            if ( is_active_sidebar( 'sidebar-product' ) ){
			                if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-product') ) ;
			            }
			        ?>
					</div>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				<div class="product-right">
					
				<?php do_action( 'woocommerce_archive_description' ); ?>

				<?php if ( have_posts() ) : ?>
					
					<?php
						/**
						 * woocommerce_before_shop_loop hook
						 *
						 * @hooked woocommerce_result_count - 20
						 * @hooked woocommerce_catalog_ordering - 30
						 */
						do_action( 'woocommerce_before_shop_loop' );
					?>

					<?php woocommerce_product_loop_start(); ?>

						<?php woocommerce_product_subcategories(); ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php wc_get_template_part( 'content', 'product' ); ?>

						<?php endwhile; // end of the loop. ?>

					<?php woocommerce_product_loop_end(); ?>

					<?php
						/**
						 * woocommerce_after_shop_loop hook
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );
					?>
					

				<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

					<?php wc_get_template( 'loop/no-products-found.php' ); ?>

				<?php endif; ?>
			<?php
				/**
				 * woocommerce_after_main_content hook
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action( 'woocommerce_after_main_content' );
			?>
				</div>
				</div>
			</div>
		</article>
		
	</div>
</section>

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
