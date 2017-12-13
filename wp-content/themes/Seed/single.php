<?php get_template_part( 'header-home-01', 'none' );
	$cats = get_the_category();
	$cat_name = $cats[0]->name;

?>
	<section id="main-page">
		<?php /* The loop  */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<article id="organic-details-blog">
			<div class="container">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="category-list">
						<?php the_breadcrumb(); ?>
						<span class="category-detail active"><?php _e('Blog','beautheme'); ?></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="bottom-category">
					<div class="container">
							<?php 
							if ( has_post_thumbnail() ) {
								$post_id = $post->ID;
								echo '<div class="fix-cover"><a href="' . $large_image_url[0] . '" title="' . the_title_attribute( 'echo=0' ) . '" >';
								echo get_the_post_thumbnail( $post_id, 'full' ); 
								echo '</a></div>';
							}
							?>
					</div>
				</div>
				<div class="bg-blog-header">
					<div class="container">
						<?php 
							if (! has_post_thumbnail() ) {
						?>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="blog-header">
								<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
								  <div class="blog-left">
									<div class="month"><?php echo get_the_time('M'); ?></div>
									<div class="day"><?php echo get_the_time('d'); ?></div>
								  </div>
								</div>
							  <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
								  <div class="blog-right no-thumb">
									<div class="title-content-blog">
										<a href="<?php echo the_permalink();?>"><?php echo the_title();?></a>
									</div>
									<div class="auther-blog">
										<p>Posted by <?php echo get_the_author(); ?> / <?php echo esc_attr($cat_name); ?> / <?php echo get_comments_number(); ?> <?php _e('Comments', 'beautheme') ?></p>
									</div>
								  </div>
							  </div>
							</div>
						</div>
						<?php } 
						else{
						?>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
							<div class="blog-header">
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
								  <div class="blog-left">
									<div class="month"><?php echo get_the_time('M'); ?></div>
									<div class="day"><?php echo get_the_time('d'); ?></div>
								  </div>
								</div>
							  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
								  <div class="blog-right">
									<div class="title-content-blog">
										<a href="<?php echo the_permalink();?>"><?php echo the_title();?></a>
									</div>
									<div class="auther-blog">
										<p>Posted by <?php echo get_the_author(); ?> / <?php echo esc_attr($cat_name); ?> / <?php echo get_comments_number(); ?><?php _e('Comments', 'beautheme') ?></p>
									</div>
								  </div>
							  </div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="container">
					<div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
					<div class="blog-content">
						<div class="content-details">
							<div class="description-blog"><?php echo the_excerpt();?></div>
							<?php echo the_content();?>
						</div>
						<div class="tag">
							<?php the_tags(); ?>
						</div>
						<div class="author"><?php _e('By','beautheme'); ?>:<span><?php echo get_the_author(); ?></span></div>
						
						<?php comments_template(); ?>
					</div>
					</div>
				</div>
				
			</div>
		</article>
		<?php endwhile; ?>
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