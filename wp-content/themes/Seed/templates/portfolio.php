<?php
/*
 Template Name: Portfolio
 */
get_template_part( 'header-border-bottom', 'none' ); 
global $wp, $post;
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
$cate_name = explode( '/',$wp->request);
$category_name = '';
?>

	<section id="main-page">
		<article id="organic-portfolio">
			<div class="container">
				<div class="category-list">
					<?php the_breadcrumb(); ?>
				</div>
				<div class="text-top">
					<div class="name-category"><?php _e('Portfolio','beautheme') ?></div>
					<div class="description-category"><?php _e('Preview of work placed in full width','beautheme') ?></div>
				</div>
			</div>
		</article>
		<?php 
			if ( is_plugin_active( 'beautheme-seed/init.php' ) ) {
		?>
		<article>
			<div class="container">
				<div class="list">
					<?php
						$pagging = '';
						$args = array(
			                  'post_type' => 'Portfolio',
			                  'posts_per_page' => $pagging,
			                  'paged' => $paged,
			            );
			            $args = array( 'taxonomy' => 'portfolio' );
			            $terms = get_terms('portfolio', $args);
			            if (count($terms) > 0) {
			            	foreach ($terms as $term) {}
					?>
					<div class="total-article">
					<?php 
					foreach ($terms as $term) {
						if(!strcasecmp ( $term->name, $category_name )){
							echo esc_attr($term->count).' Projects';
						}
					}
					if(empty($category_name)){
						echo wp_count_posts('portfolio')->publish.' Projects';
					}
					?></div>
					<div class="galery-list" id="content-list">
						<?php 
							$active = '';
							if($category_name==''){
								$active = 'active';
							}
						?>	
						<span class="title-galery <?php echo esc_attr($active); ?> "><a href="<?php echo get_home_url(); ?>/portfolio" title="View all post filed under Application">All</a></span>
						<?php 

							
			                foreach ($terms as $term) {
			                    $term_link = get_term_link( $term );
			                    $active = '';
			                    if(!strcasecmp ( $term->name, $category_name ))
			                    {
			                    	$active = 'active';
			                    }
			                    echo '<span class="title-galery '.$active.'"><a href="'.$term_link.'" title="' . sprintf(__('View all post filed under %s', 'my_localization_domain'), $term->name) . '">' . $term->name . '</a></span>';
			                }
			            }
						?>
					</div>
					<div class="border-galery-list"></div>
				</div>

			</div>
		</article>

		<article>
			<div class="container">
				<div class="organic-portfolio-galery">
					<ul>
					<?php 
					if ( is_plugin_active( 'ajax-load-more/ajax-load-more.php' ) ) {
					  	if ( is_plugin_active( 'ajax-load-more-repeaters-v2/ajax-load-more-repeaters-v2.php' ) ) {
						echo do_shortcode( '[ajax_load_more repeater="template_4" scroll="false"  button_label="LOAD MORE" post_type="portfolio" taxonomy="portfolio"]' );
						}
					}
					else{
					  	
						    $args = array(
						        'post_type' => 'Portfolio',
						    );
						     $loop = new WP_Query( $args );
						    while ( $loop->have_posts() ) : $loop->the_post();
							$contents = strip_tags(get_the_content());
							  echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							    <li>
							        <div class="content-portfolio">
							          <div class="hover-img">';
							            echo get_the_post_thumbnail(get_the_ID(),'medium');
							            echo '<div data-toggle="modal" data-target="#myModal'; echo get_the_ID(); echo'" class="icon-quickview" id="item';echo get_the_ID();echo'"></div>
							          </div>            
							          <div class="image">
							            <div class="title-image">';echo the_title(); echo'</div>
							            <div class="date-image">';echo get_the_date(); echo'</div>
							            <div class="content-image">';
											echo $contents;
										echo '</div>
							          </div>
							        </div>
							    </li>
							  </div>
							  <div class="modal fade" id="myModal'; echo get_the_ID(); echo'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							        <div class="img-thumb">';
							        echo get_the_post_thumbnail();
									echo'</div>
							        </div>
							      <div class="modal-body">';
									echo'<h3 class="title-portfolio">';
									echo the_title();
									echo'</h3>';
							echo'<div class="content-portfolio">';
									echo get_the_content();
							      echo'</div>
							      </div>
							      <div class="modal-footer">
							      </div>
							    </div>
							  </div>
							</div>';
							endwhile;
						}
					?>
					</ul>
					
					
				</div>
			</div>
		</article>
		<?php } ?>
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