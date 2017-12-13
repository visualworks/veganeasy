<?php
/**
 * Single Product Thumbnails
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();
global $redux_demo;
$style = $redux_demo['style-details'];
if($style =='detail1'){

	if ( $attachment_ids ) {
		$loop 		= 0;
		$columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 12 );
		$i =1;
		?>

		<ul>
		<div class="thumbnails <?php echo 'columns-' . $columns; ?>">
		<li>
		<?php

			foreach ( $attachment_ids as $attachment_id ) {

				$classes = array( 'zoom' );

				if ( $loop == 0 || $loop % $columns == 0 )
					$classes[] = 'first';

				if ( ( $loop + 1 ) % $columns == 0 )
					$classes[] = 'last';

				$image_link = wp_get_attachment_url( $attachment_id );

				if ( ! $image_link )
					continue;
				
				$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) );
				$image_class = esc_attr( implode( ' ', $classes ) );
				$image_title = esc_attr( get_the_title( $attachment_id ) );

				echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a href="%s" class="%s" title="%s" data-rel="prettyPhoto[product-gallery]"><span class="item-'.$i.'">%s<span></a>', $image_link, $image_class, $image_title, $image ), $attachment_id, $post->ID, $image_class );
				$i ++;
				$loop++;
			}
			if($i==3){
			echo'</li>';
		}
		?></div>
		</ul>
		<?php
	}
}

if($style =='detail2'){
	if ( $attachment_ids ) {
		$loop 		= 0;
		$columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 12 );
		$i =1;
		?>
		<div class="thumbnails <?php echo 'columns-' . $columns; ?>">
			<div class="bg-detail-image">
		<?php

			foreach ( $attachment_ids as $attachment_id ) {

				$classes = array( 'zoom' );

				if ( $loop == 0 || $loop % $columns == 0 )
					$classes[] = 'first';

				if ( ( $loop + 1 ) % $columns == 0 )
					$classes[] = 'last';

				$image_link = wp_get_attachment_url( $attachment_id );

				if ( ! $image_link )
					continue;
				
				$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) );
				$image_class = esc_attr( implode( ' ', $classes ) );
				$image_title = esc_attr( get_the_title( $attachment_id ) );

				echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<div class="detail-images"><a href="%s" class="%s" title="%s" data-rel="prettyPhoto[product-gallery]"><span class="item-'.$i.'">%s<span></a></div>', $image_link, $image_class, $image_title, $image ), $attachment_id, $post->ID, $image_class );
				$i ++;
				$loop++;
			}

		?></div></div>
		<?php
	}
}