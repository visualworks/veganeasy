<?php
/*
 Template Name: Home-01
 */
get_template_part( 'header-home-01', 'none' ); ?>
	<section id="main-page">
		<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'beauthemes' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post -->
			<?php endwhile; ?>
<?php
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if (is_plugin_active('specific-plugin-directory/specific-plugin-name.php')){
		get_search_form();
	}
?>
<?php get_footer(); ?>