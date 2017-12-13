<?php
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php print $product->get_categories( ', ', '<span class="posted_in title-detail">' . ' ', '</span>' ); ?>

	<?php print $product->get_tags( ', ', '<span class="tagged_as title-detail">' . _n( 'Tag:', 'Tags:', $tag_count, 'beautheme' ) . ' ', '</span>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
<h1 itemprop="name" class="product_title entry-title name-detail"><?php the_title(); ?></h1>
