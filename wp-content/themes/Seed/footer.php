</section><!--End #main-page-->
<?php
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	global $woocommerce; 
?>
<!-- Modal -->
<div id="myModalcart" class="modal modal-cart fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    	
      <div class="modal-body">
        	<table class="shop_table cart" cellspacing="0">
				<thead>
					<tr>
						
						<th class="product-thumbnail">&nbsp;</th>
						<th class="product-name"><?php _e( 'Product', 'beautheme' ); ?></th>
						<th class="product-price"><?php _e( 'Price', 'beautheme' ); ?></th>
						<th class="product-quantity"><?php _e( 'Quantity', 'beautheme' ); ?></th>
						<th class="product-subtotal"><?php _e( 'Total', 'beautheme' ); ?></th>

					</tr>
				</thead>
				<tbody>

					<?php
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
							?>
							<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

								<td class="product-thumbnail" >
									<?php
										$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

										if ( ! $_product->is_visible() )
											echo esc_attr($thumbnail);
										else
											printf( '<a href="%s">%s</a>', $_product->get_permalink( $cart_item ), $thumbnail );
									?>
								</td>

								<td class="product-name">
									<?php
										if ( ! $_product->is_visible() )
											echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
										else
											echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s </a>', $_product->get_permalink( $cart_item ), $_product->get_title() ), $cart_item, $cart_item_key );

										// Meta data
										echo WC()->cart->get_item_data( $cart_item );

			               				// Backorder notification
			               				if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
			               					echo '<p class="backorder_notification">' . __( 'Available on backorder', 'beautheme' ) . '</p>';
									?>
								</td>

								<td class="product-price">
									<?php
										echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
									?>
								</td>

								<td class="product-quantity">
									<?php
										echo esc_attr($cart_item['quantity']);
									?>
								</td>

								<td class="product-subtotal">
									<?php
										echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
									?>
								</td>
							</tr>
							<?php
						}
					}
					?>
				</tbody>
			</table>

			<?php 
				if($woocommerce->cart->cart_contents_count == '0'){
					echo '<div class="no-product">No product in cart.</div>';
				}
			?>
			<div class="cart-total">
				
				<p>Total: <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'beautheme'), $woocommerce->cart->cart_contents_count);?> - <?php print $woocommerce->cart->get_cart_total(); ?></p>
				
			</div>
			<div class="cart-checkout">
				<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
			</div>
      </div>
    </div>

  </div>
</div>
<?php } ?>
<footer>
	<div class="container">
		<?php wp_link_pages(); ?>
		<?php edit_post_link(); ?>
		<div class="organic-footer">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			
			<?php 
				if ( is_active_sidebar( 'footer-left-widget' ) ){
					if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer-left-widget') ) ;
				}
			?>
			

		</div>
		<div class="ft-right">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<?php
				if ( class_exists( 'ReduxFramework' ) ) {
					global $redux_demo, $col;
					$col = $redux_demo['footer-columns'];
					for ($i=0; $i <= $col; $i++) {
						if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-footer-'.$i) ) {
						}
					}
				}
				?>
			</div>
		</div>
		</div>
	</div>
</footer>
</div> <!--end #container -->
<a href="#" class="back-to-top">Top</a>
<?php wp_footer(); ?>
</body> <!--end body-->
</html> <!--end html -->