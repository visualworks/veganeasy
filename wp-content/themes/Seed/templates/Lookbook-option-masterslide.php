<?php
/*
 Template Name: Look book Masterslide
 */
get_template_part( 'header', 'none' ); 
global $wp, $post;
$cate_name = explode( '/',$wp->request);
$category_name = '';
?>
<header id="header" class="organic-header lb-masterslide">
  <div class="menu-right">
      <a class="link-menu trigger closed"><span class="a">Menu</span></a>
      <div class="menu-right-layout">
        <div style="clear: both;"></div>
        <?php
          if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        ?>
        <div class="main-menu-right">
          <div id="organic-main-menu">
            <?php origanic_menu( 'primary-menu' ); ?>
        </div>
        </div>
        <?php } ?>
      </div>
    </div>
</header>
<div id="lookbook" class="lb-masterslide">
	<div id="logo">
      <a href="<?php echo get_home_url(); ?>">
        <?php
          if ( class_exists( 'ReduxFramework' ) && is_plugin_active( 'beautheme-seed/init.php' )) {
                      echo '<img src="'.$redux_demo['logo']['url'].'">';
          }
          else{ ?>
          <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Logo seed">
        <?php } ?>
      </a>
    </div>
	<?php while ( have_posts() ) : the_post(); ?>
    <div class="organic-lookbook-masterslide">
        <?php the_content(); ?>
    </div>

		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'beauthemes' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	<?php endwhile; ?>
  <?php 
      if ( is_active_sidebar( 'footer-lookbook-widget' ) ){
          if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer-lookbook-widget') ) ;
      }
  ?>
</div>
	
<?php get_template_part( 'footer', 'lb' ); 