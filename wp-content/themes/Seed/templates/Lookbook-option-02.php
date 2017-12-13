<?php
/*
 Template Name: Look book grid
 */
get_template_part( 'header-border-bottom', 'none' ); 
global $wp, $post;
$cate_name = explode( '/',$wp->request);
$category_name = '';
?>

<section id="main-page" class="lookbook">
  <div id="lookbook" class="option02">
  	<?php while ( have_posts() ) : the_post(); ?>
  		<?php the_content(); ?>
  		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'beauthemes' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
  	<?php endwhile; ?>
  </div>
	
<?php get_footer(); ?>