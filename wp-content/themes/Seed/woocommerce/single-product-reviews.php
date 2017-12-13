<?php
/**
 * Display single product reviews (comments)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.2
 */
global $product;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	<div id="comments">
		<div class="text-title-review"><?php _e('Write Your Own Review', 'beautheme'); ?></div>
		<h2><?php
			if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_review_count() ) )
				printf( _n( 'You are reviewing: <span>%s</span>', 'You are reviewing: <span>%s</span>', 'beautheme' ), get_the_title() );
			else
				_e( ' ', 'beautheme' );
		?></h2>
		<div class="text-question-review"><?php _e('How do you rate this product? *', 'beautheme'); ?></div>
		<?php if ( have_comments() ) : ?>

			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'beautheme' ); ?></p>

		<?php endif; ?>
	</div>
</div>
	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<div id="review_form_wrapper">
			<div id="review_form">
			<div class="table-review">
								<table>
									<tr>
										<th></th>
										<th>1 <?php _e('Star', 'beautheme'); ?></th>
										<th>2 <?php _e('Star', 'beautheme'); ?></th>
										<th>3 <?php _e('Star', 'beautheme'); ?></th>
										<th>4 <?php _e('Star', 'beautheme'); ?></th>
										<th>5 <?php _e('Star', 'beautheme'); ?></th>
									</tr>
									<tr>
										<td class="text-table"><?php _e('Value', 'beautheme'); ?></td>
										<td>
											<input class="beaut-value" type="radio" name="Value" value="1" />
										</td>
										<td>
											<input class="beaut-value" type="radio" name="Value" value="2" />
										</td>
										<td>
											<input class="beaut-value" type="radio" name="Value" value="3" />
										</td>
										<td>
											<input class="beaut-value" type="radio" name="Value" value="4" />
										</td>
										<td>
											<input class="beaut-value" type="radio" name="Value" value="5" />
										</td>
									</tr>
									<tr>
										<td class="text-table"><?php _e('Quality', 'beautheme'); ?></td>
										<td>
											<input class="beau-quality" type="radio" name="Quality" value="1" />
										</td>
										<td>
											<input class="beau-quality" type="radio" name="Quality" value="2" />
										</td>
										<td>
											<input class="beau-quality" type="radio" name="Quality" value="3" />
										</td>
										<td>
											<input class="beau-quality" type="radio" name="Quality" value="4" />
										</td>
										<td>
											<input class="beau-quality" type="radio" name="Quality" value="5" />
										</td>
									</tr>
									<tr>
										<td class="text-table"><?php _e('Price', 'beautheme'); ?></td>
										<td>
											<input class="beau-price" type="radio" name="Price" value="1" />
										</td>
										<td>
											<input class="beau-price" type="radio" name="Price" value="2" />
										</td>
										<td>
											<input class="beau-price" type="radio" name="Price" value="3" />
										</td>
										<td>
											<input class="beau-price" type="radio" name="Price" value="4" />
										</td>
										<td>
											<input class="beau-price" type="radio" name="Price" value="5" />
										</td>
									</tr>
								</table>
							</div>
				<?php
					$commenter = wp_get_current_commenter();

					$comment_form = array(
						'title_reply'          => have_comments() ? __( ' ', 'beautheme' ) : __( 'Be the first to review', 'beautheme' ) . ' &ldquo;' . get_the_title() . '&rdquo;',
						'title_reply_to'       => __( 'Leave a Reply to %s', 'beautheme' ),
						'comment_notes_before' => '',
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'beautheme' ) . ' <span class="required">*</span></label> ' .
							            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></p>',
							'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'beautheme' ) . ' <span class="required">*</span></label> ' .
							            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></p>',
						),
						'label_submit'  => __( 'Send', 'beautheme' ),
						'logged_in_as'  => '',
						'comment_field' => ''
					);

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<p class="comment-form-rating" style="display:none;"><label for="rating">' . __( 'Your Rating', 'beautheme' ) .'</label><select name="rating" id="rating">
							<option value="">' . __( 'Rate&hellip;', 'beautheme' ) . '</option>
							<option value="5">' . __( 'Perfect', 'beautheme' ) . '</option>
							<option value="4">' . __( 'Good', 'beautheme' ) . '</option>
							<option value="3">' . __( 'Average', 'beautheme' ) . '</option>
							<option value="2">' . __( 'Not that bad', 'beautheme' ) . '</option>
							<option value="1">' . __( 'Very Poor', 'beautheme' ) . '</option>
						</select></p>';
						
					}

					$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . __( 'Your Review', 'beautheme' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>
</div>
	<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'beautheme' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>

<script type="text/javascript">
jQuery(document).ready(function($) {


	$("#submit").click(function(){  
		$("p.stars a").removeClass('active');
        var value = parseInt($("input[name='Value']:checked").val());
        var quality = parseInt($("input[name='Quality']:checked").val());
        var price = parseInt($("input[name='Price']:checked").val());
        var sum = parseInt((value+quality+price)/3);
        $("a.star-"+sum).click();
    });
});
</script>