<?php
/*
 Template Name: Blog full
 */
get_header();
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
get_template_part( 'header-blog-full', 'index' ); ?>
<?php 
if ( is_plugin_active('ajax-load-more/ajax-load-more.php') ) {
?>
	<section id="main-page" class="organic-full-blog">
		<div class="fix-cover full-blog">
			<?php 
				$args = array(
			    'post_type' => 'page',
			    'post_status' => 'publish'
			); 
			$pages = get_pages($args); 
			echo get_the_post_thumbnail( $id, 'full' );
			?>
		</div>
		<article id="organic-full-blog" class="full-blog">
			<div class="row">

					<div class="category-list">
						<?php the_breadcrumb(); ?>
						<div class="category-name"><?php _e('Blog','beautheme') ?></div>
					</div>
					
			</div>
			<div class="container">
				<div class="content-blog-full">
					<?php /* The loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="entry-content">
								<?php the_content(); ?>
								<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'beautheme' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
							</div><!-- .entry-content -->
						</article><!-- #post -->
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
					<div class="top-blog">
						<?php 
						if ( is_plugin_active( 'ajax-load-more/ajax-load-more.php' ) ) {
						  	if ( is_plugin_active( 'ajax-load-more-repeaters-v2/ajax-load-more-repeaters-v2.php' ) ) {
								echo do_shortcode( '[ajax_load_more repeater="template_3" post_type="post" posts_per_page="5" scroll="false" button_label="LOAD MORE"]' );
							}
						}
						?>
					</div>
				</div>

			</div>
		</article>
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
<?php }
else {
?>
<section id="main-page" class="organic-full-blog">
		<div class="fix-cover full-blog">
			<?php 
			echo get_the_post_thumbnail( $id, 'full' );
			?>
		</div>
		<article id="organic-full-blog" class="full-blog">
			<div class="row">

					<div class="category-list">
						<?php the_breadcrumb(); ?>
						<div class="category-name"><?php _e('Blog','beautheme'); ?></div>
					</div>
					
			</div>
			<div class="container">
				<div class="content-blog-full">
					<?php /* The loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="entry-content">
								<?php the_content(); ?>
								<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'beautheme' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
							</div><!-- .entry-content -->
						</article><!-- #post -->
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
					<div class="top-blog">

						<?php if ( have_posts() ) : ?>

                        <?php /* The loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                        	<?php
						         $args = array(
						              'post_type' => 'post',
						        );
						         $loop = new WP_Query( $args );
						      ?>
						    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
                            <?php 
								$featuredID = wp_get_attachment_image_src(get_post_thumbnail_id(), 'single-post-thumbnail');
								if ( has_post_thumbnail() ) {
								$img = '<div class="img-blog"><img src="'.$featuredID[0].'"></div>';
								}
								else{
								$img = ''; 
								}
								$contents = strip_tags(get_the_content());
								$category =  get_the_category();
								$get_comments_number = get_comments_number( get_the_ID() );
								echo '<div class="blog-full">
								            <div class="blog-left">
								            <div class="month">'.get_the_time('M').'.</div>
								            <div class="day btn-menu btn-outlined">
								                    '.get_the_time('d').'
								                    <span class="line top"></span>
								                    <span class="line right"></span>
								                    <span class="line bottom"></span>
								                    <span class="line left"></span>
								                </div>
								            </div>
								            <div class="blog-right">
								            <div class="title-content-blog">
								                    <a href="'.get_post_permalink().'">'.get_the_title().'</a>
								                  </div>
								            <div class="auther-blog">
								                    <p>Posted by '.get_the_author().' / '.$category[0]->cat_name.' / '.$get_comments_number.' Comments</p>
								                  </div>
								            </div>
								            
								            <a href="'.get_post_permalink().'">
								            '.$img.'
								            </a>
								            
								            <div class="description-blog">
								                  <div>'.$contents.'</div>
								            </div>
								            <div class="more-info-blog">
								              <a href="'.get_post_permalink().'">More info</a>
								            </div>
								          </div>';
							?>
                        <?php endwhile; ?>
                        <?php endwhile; ?>
                        <?php endif; ?>

				        <?php wp_reset_postdata(); ?>
					</div>
				</div>

			</div>
		</article>
		<article id="organic-send-mail">
			<div class="container">
				<?php 
                    if ( is_active_sidebar( 'email-subscribe' ) ){
                        if ( is_plugin_active( 'email-subscribers/email-subscribers.php' ) ) {
                            if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('email-subscribe') ) ;
                        }
                    }
                ?>
			</div>
		</article>
<?php } ?>
<?php get_footer(); ?>