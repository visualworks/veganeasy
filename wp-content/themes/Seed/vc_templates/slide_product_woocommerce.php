<?php
$auto_slide = $look_next_slide = $look_prev_slide = $space_product = $mousewheel_slide = $title_product = $speed_product = '';

extract(shortcode_atts(array(
    'total_product' => '15',
    'space_product' => '50',
    'speed_product' => '500',
    'colum_product' => '5',
    'title_product' => ''
), $atts));
?>
<?php
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
if($atts['option']=='style 1'){
?>
<div class="row">
<div class="title-trending-item"><?php print $title_product;?></div>

  <div class="swiper">
      <div class="swiper-wrapper style1">
      <?php
          $args = array( 'post_type' => 'product', 'stock' => 1, 'posts_per_page' => $atts['total_product'], 'tag_ID' => 15, 'orderby' =>'rand','order' => 'DESC' , 'category'=>'');
          $loop = new WP_Query( $args );
          ?>

          <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                    <?php 
                      $average = $product->get_average_rating();
                    ?>
                    <div class="swiper-slide">
                      <a href="<?php echo get_permalink($loop->post->ID) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                          <div class="img">
                            <div class="bg-img">
                              <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="65px" height="115px" />'; ?>
                            </div>
                          </div>
                          <div class="info-product">
                              <div class="title-product">
                                <h3><?php the_title(); ?></h3>
                              </div>
                              <span class="price"><?php print $product->get_price_html(); ?></span>
                              <div class="star-rating"><span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%"><strong itemprop="ratingValue" class="rating"><?php echo esc_html($average); ?></strong><?php echo __( 'out of 5', 'beautheme' ); ?></span></div>  
                          </div>
                      </a>
                      <div class="add-to-cart">
                        <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
                      </div>
                      <div class="add-to-cart-hover">
                        <?php 
                        $id = intval($loop->post->ID);
                        $type = '';
                        if( $product->is_type( 'simple' ) ){
                          $type = 'product_type_simple';
                        ?>
                        <div class="add-hover">
                          <a href="/?add-to-cart=<?php echo esc_attr($id); ?>" rel="nofollow" data-product_id="<?php echo esc_attr($id); ?>" class="button add_to_cart_button <?php echo esc_attr($type); ?> added">
                          <span><?php echo __('Add to cart','beautheme');?></span>
                          </a>
                        </div>
                        <?php 
                          }
                          else{
                        ?>
                        <div class="add-hover">
                          <a href="<?php echo get_permalink($loop->post->ID) ?>" class="button add_to_cart_button">
                              <span><?php echo __('Select options','beautheme'); ?></span>
                          </a>
                        </div>
                        <?php } ?>
                        <div class="button-product">
                          <?php 
                          echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
                            $id = intval($loop->post->ID);
                          ?>
                          
                          <a href="<?php echo home_url(); ?>/?wc-api=WC_Quick_View&amp;product=<?php echo esc_attr($id); ?>&amp;width=60%&amp;height=60%&amp;ajax=true" class="quick-view-button button"><span></span>Quick View</a> 
                          <div class="compane-over">
                            <?php
                            echo do_shortcode( '[yith_compare_button product="'.$id.'"]' );
                            
                          ?>
                          </div>
                        </div>
                      </div>
                    </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
        </div>
        <!-- Add Pagination -->
        <!-- <div class="swiper-pagination"></div> -->
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
<?php }
if($atts['option']=='style 2'){
?>
<div class="row">
<div class="title-trending-item"><?php print $title_product;?></div>
<div class="swiper">
      <div class="swiper-wrapper style2" >
      <?php
          $args = array( 'post_type' => 'product', 'stock' => 1, 'posts_per_page' => $atts['total_product'], 'tag_ID' => 15, 'orderby' =>'rand','order' => 'DESC' , 'category'=>'');
          $loop = new WP_Query( $args );
          ?>

          <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                   <?php 
                   global $woocommerce, $product;
                   $average = $product->get_average_rating();
                   $category_name = $product->get_categories();
                  ?>
                    <div class="swiper-slide">
                      <a href="<?php echo get_permalink($loop->post->ID) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                          <div class="img">
                            <div class="bg-img">
                              <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="65px" height="115px" />'; ?>
                            </div>
                          </div>
                          <div class="info-product">
                              <div class="category-product"><?php echo esc_url($category_name);?></div>
                              <div class="title-product">
                                <h3><?php the_title(); ?></h3>
                              </div>
                              <div class="content-product">
                              <span class="price"><?php print $product->get_price_html(); ?></span>
                              </div>
                          </div>
                      </a>
                      <div class="add-to-cart">
                        <a href="<?php echo get_permalink($loop->post->ID) ?>"><?php echo __('Add to cart','beautheme'); ?></a>
                      </div>
                      <div class="add-to-cart-hover">
                        <?php 
                        $id = intval($loop->post->ID);
                        $type = '';
                        if( $product->is_type( 'simple' ) ){
                          $type = 'product_type_simple';
                        ?>
                        <div class="add-hover">
                          <a href="/?add-to-cart=<?php echo esc_attr($id); ?>" rel="nofollow" data-product_id="<?php echo esc_attr($id); ?>" class="button add_to_cart_button <?php echo esc_attr($type); ?> added">
                          <span><?php echo __('Add to cart','beautheme'); ?></span>
                          </a>
                        </div>
                        <?php 
                          }
                          else{
                        ?>
                        <div class="add-hover">
                          <a href="<?php echo get_permalink($loop->post->ID) ?>" class="button add_to_cart_button">
                              <span><?php echo __('Select options','beautheme'); ?></span>
                          </a>
                        </div>
                        <?php } ?>
                        <div class="button-product">
                          <?php 
                          echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
                            $id = intval($loop->post->ID);
                          ?>
                          
                          <a href="<?php echo home_url(); ?>/?wc-api=WC_Quick_View&amp;product=<?php echo esc_attr($id); ?>&amp;width=60%&amp;height=60%&amp;ajax=true" title="Dried Perilla Leaves w Plum 24g" class="quick-view-button button"><span></span>Quick View</a> 
                          <div class="compane-over">
                            <?php
                            echo do_shortcode( '[yith_compare_button product="'.$id.'"]' );
                          ?>
                          </div>
                        </div>
                          
                        
                      </div>
                    </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
        </div>
        <!-- Add Pagination -->
        <!-- <div class="swiper-pagination"></div> -->
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
<?php } ?>

<?php 
if($atts['option']=='style 3'){
?>
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="swiper">
      <div class="swiper-wrapper style3" >
      <?php
          $args = array( 'post_type' => 'product', 'stock' => 1, 'posts_per_page' => $atts['total_product'], 'tag_ID' => 15, 'orderby' =>'rand','order' => 'DESC' , 'category'=>'');
          $loop = new WP_Query( $args );
          ?>

          <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                   <?php 
                   global $woocommerce, $product;
                   $average = $product->get_average_rating();
                   $category_name = $product->get_categories();
                  ?>
                    <div class="swiper-slide">
                      <a href="<?php echo get_permalink($loop->post->ID) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                          <div class="img">
                            <div class="bg-img">
                              <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="65px" height="115px" />'; ?>
                            </div>
                          </div>
                          <div class="info-product">
                              <div class="category-product"><?php echo esc_url($category_name);?></div>
                              <div class="content-product">
                                   <h3><?php the_content(); ?></h3>
                              </div>
                              
                          </div>
                      </a>
                      <div class="add-to-cart">
                        <a href="<?php echo get_permalink($loop->post->ID) ?>"><?php echo __('View detail','beautheme'); ?></a>
                      </div>
                    </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
        </div>
        <!-- Add Pagination -->
        <!-- <div class="swiper-pagination"></div> -->
        <!-- Add Arrows -->
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
</div>
<?php } ?>

<?php 
if($atts['option']!='style 3'){
?>
<script>
(function($) {  
"use strict";
    var col = 1;
    if ($(window).width() > 1024) {
      col = 5;
    }
    else if ($(window).width() > 765) {
      col = 3;
      <?php 
      $atts['space_product'] = 50;
      ?>
    }
    else{
      col = 1;
    }

  var swiper = new Swiper('.swiper', {
    slidesPerGroup: col,
    slidesPerView: col,
    initialSlide: 1,
      <?php
        if(!$auto_slide==''){
      ?>
      autoplay: <?php echo esc_attr($speed_product);?>,
      
      speed: <?php echo esc_attr($speed_product);?>,
      <?php } ?>

      <?php
      if($look_next_slide==''){
     ?>
      nextButton: '.swiper-button-next',
      <?php } ?>

      <?php
      if($look_prev_slide==''){
     ?>
      prevButton: '.swiper-button-prev',
      <?php } ?>
      
      paginationClickable: true,
      spaceBetween: <?php echo esc_attr($space_product);?>,
      
      <?php
      if(!$atts['loop_slide']==''){
     ?>
      loop: true,
      <?php } ?>
      <?php
      if(!$mousewheel_slide==''){
     ?>
      mousewheelControl: true,
      <?php } ?>
      effect: 'slide',
  });
  })(jQuery); 
</script>

<?php } ?>
<?php 
if($atts['option']=='style 3'){
?>
<script>
(function($) {  
"use strict";
  var swiperhome4 = new Swiper('.swiper', {
    slidesPerView: 1,
    
    <?php
      if(!$auto_slide==''){
     ?>
      autoplay: <?php echo esc_attr($speed_product);?>,
      speed: <?php echo esc_attr($speed_product);?>,
      <?php } ?>

      <?php
      if($look_next_slide==''){
     ?>
      nextButton: '.swiper-button-next',
      <?php } ?>

      <?php
      if($look_prev_slide==''){
     ?>
      prevButton: '.swiper-button-prev',
      <?php } ?>
      
      paginationClickable: true,
      spaceBetween: <?php echo esc_attr($space_product);?>,
      <?php
      if(!$atts['loop_slide']==''){
     ?>
      loop: true,
      <?php } ?>
      <?php
      if(!$mousewheel_slide==''){
     ?>
      mousewheelControl: true,
      <?php } ?>
      effect: 'slide'

  });
  })(jQuery); 
</script>
<?php } 
}
?>
