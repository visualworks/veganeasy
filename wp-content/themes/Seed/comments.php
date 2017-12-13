<?php
if ( post_password_required() )
	return;
?>
 
<div id="comments" class="comments-area">
 	
	
		<div class="form-comment">
							<?php if ( have_comments() ) : ?>
							<div class="title-total">Comment (<?php echo get_comments_number(); ?>)</div>
							
							<div class="comment-form">
								<?php
									wp_list_comments( array(
										'style'       => 'div',
										'short_ping'  => true,
										'avatar_size' => 70,
									) );
								?>
							</div><!-- .comment-list -->
							<?php endif; // have_comments() ?>
						</div>

						<div class="form-reply">
							<div class="row">
								<?php $comment_args = array( 'title_reply'=>'Leave a reply:',

										'fields' => apply_filters( 'comment_form_default_fields', array(

										'name' => '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class="input-name">' . '<label for="author">' . __( 'Name:','beautheme') . '</label> ' . ( $req ? '<span>*</span>' : '' ) .

										        '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" /></p></div></div>',   

										    'email'  => '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class="input-email">' .

										                '<label for="email">' . __( 'Email:','beautheme' ) . '</label> ' .

										                ( $req ? '<span>*</span>' : '' ) .

										                '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" />'.'</div></div>',

										    'url'    => '' ) ),

										    'comment_field' => '<p>' .

										                '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"placeholder="Your comment"></textarea>' .

										                '</p>',

										    'comment_notes_after' => '',
										    'label_submit' => __('submit comment','beautheme')
										);

										comment_form($comment_args); ?>
										<?php
											// Are there comments to navigate through?
											if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
										?>
									</div>
								</div>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'beautheme' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'beautheme' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'beautheme' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>
 
		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'beautheme' ); ?></p>
		<?php endif; ?>
 		 <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
	
 
	
 
</div><!-- #comments -->