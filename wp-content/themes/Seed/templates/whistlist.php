<?php
/*
 Template Name: Whistlist, Cart, My account, Checkout
 */
get_template_part( 'header-grid', 'index' ); ?>
	<section id="main-page">
			<div class="container">
				<?php /* The loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div class="entry-content">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'beautheme' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
						</div><!-- .entry-content -->

						<footer class="entry-meta">
							<?php edit_post_link( __( 'Edit', 'beautheme' ), '<span class="edit-link">', '</span>' ); ?>
						</footer><!-- .entry-meta -->
					</article><!-- #post -->
				<?php endwhile; ?>
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
<?php get_footer(); ?>