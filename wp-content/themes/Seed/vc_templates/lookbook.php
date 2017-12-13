<?php
$option = $id_lookbook = $number_lookbook = $title_lookbook = $content_lookbook = $year_lookbook = $list_slide ='';
extract(shortcode_atts(array(
    'id_lookbook' => '',
    'option' => '',
    'title_lookbook' => '',
    'content_lookbook' => '',
    'year_lookbook' => '',
    'list_slide' => '',
), $atts));
$img = shortcode_atts(array(
    'image_left' => 'image_left',
), $atts);
$img_left = wp_get_attachment_image_src($img["image_left"], "large");
$img_grid = $img_left[0];
?>
<?php
if($option=='Style three column'){
?>
  <article id="organic-lookbook-1" >
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="left-lb">
          <div class="center-div">
            <?php 
              $args = array(
                  'post_type' => 'lookbook'
              );
              $custom_query = new WP_query( $args );

              if( $custom_query->have_posts() ) {
                 $custom_query->the_post();
            ?>
              <div class="title-lookbook"><?php echo $title_lookbook; ?></div>
              <div class="content-lookbook">
                <?php echo $content_lookbook; ?>
              </div>
            <?php
                 wp_reset_postdata();
              }
              wp_reset_query();
            ?>
            <div class="scroll-item"><?php _e('scroll to discover', 'beautheme') ?></div>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="swiper-lookbook-01" id="style1">
              <div class="swiper-wrapper">
                <?php 
                  $slideList  = get_field('look_book', $id_lookbook);
                  $count = count($slideList);
                  for ($i=0; $i < $count; $i++) { 
                  $item = $slideList[$i];
                  $img = $item['image_product'];
                  $id_product = $item['id_product'];
                  ?>
                  <div class="swiper-slide">
                    <div class="row">
                      <div class="img-item">
                          <img src="<?php echo esc_attr($img['url']); ?>" alt="" />
                          <?php 
                          $product = new WC_Product( $id_product );
                          $price = $product->get_price_html();
                          $categories = $product->get_categories();
                          $content_product = $product->get_categories();
                          $product_description = get_post($id_product)->post_content;
                          ?>
                          <div class="details-lb">
                            <div class="category-name"><?php echo esc_url($categories) ; ?></div>
                            <div class="product-name"><?php echo get_the_title($id_product); ?></div>
                            <div class="content-product"><?php echo esc_attr($product_description) ; ?></div>
                            
                            <?php 
                              $type = '';
                              // if( $product->is_type( 'simple' ) ){
                              //   $type = 'product_type_simple';
                              ?>
                              <span class="price"><?php print $product->get_price_html(); ?></span>
                              <div class="add-to-cart">
                                <a href="<?php echo get_permalink($id_product); ?>" rel="nofollow" data-product_id="<?php echo esc_attr($id_product); ?>" class="button add_to_cart_button added">
                                <span><?php echo __('Add to cart','beautheme');?></span>
                                </a>
                              </div>
                              <?php 
                                //}
                                //else{
                              ?>
                              <!-- <span class="price"><?php //print $product->max_variation_price ?></span>
                              <div class="add-to-cart">
                                <a href="<?php //echo get_permalink($id_product) ?>" class="button add_to_cart_button">
                                    <span><?php //echo __('Add to cart','beautheme'); ?></span>
                                </a>
                              </div> -->
                              <?php //} ?>
                          </div>
                      </div>
                    </div>
                  </div>
                  <?php 
                    }
                  ?>
              </div>
          </div>
      </div>
    </div>
    <div class="copy">
      <ul>
        <li>© 2015 seeds template ®</li>
        <li>Infor@beautheme.com</li>
      </ul>
    </div>
  </article>
  <script type="text/javascript">
  (function($) {  
  "use strict";
    var col = 1;
    if ($(window).width() > 768) {
      col = 2;
    }
    else{
      col = 1;
    }
    var swiper = new Swiper('.swiper-lookbook-01', {
        slidesPerView: col,
        mousewheelControl: true,
        paginationClickable: true,
        spaceBetween: 0
    });
    })(jQuery); 
  </script>
<?php
}
if($option=='Style Grid'){
?>
  <article id="organic-lookbook-2">
    <div class="row">
      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
        <div class="left-lb">
          <div class="center-div">
            <img src="<?php echo esc_attr($img_grid); ?>" alt="" />
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
        <div class="swiper-lookbook-01">
            <div class="swiper-wrapper">
              <?php 
                $slideList  = get_field('look_book', $id_lookbook);
                $count = count($slideList);
                for ($i=0; $i < $count; $i++) { 
                  $item = $slideList[$i];
                  $img = $item['image_product'];
                  $id_product = $item['id_product'];
                  ?>
                  <div class="swiper-slide">
                    <div class="row">
                        <div class="img-item">
                          <a href="<?php echo get_permalink($id_product); ?>">
                            <img src="<?php echo esc_attr($img['url']); ?>" alt="" />
                          </a>
                          <?php 
                          $product = new WC_Product( $id_product );
                          $price = $product->get_price_html();
                          $categories = $product->get_categories();
                          $content_product = $product->get_categories();
                          $product_description = get_post($id_product)->post_content;
                          ?>
                          <div class="details-lb">
                            <div class="product-name"><?php echo get_the_title($id_product); ?></div>
                            <span class="price"><?php print $product->get_price_html(); ?></span>
                          </div>
                        </div>
                    </div>
                  </div>
                  <?php 
                }
              ?>
            </div>
        </div>
      </div>
    </div>
  </article>
  <script type="text/javascript">
  (function($) {  
    "use strict";
    var swiper = new Swiper('.swiper-lookbook-01', {
        slidesPerView: 2,
        mousewheelControl: true,
        slidesPerColumn: 2,
        paginationClickable: true,
        spaceBetween: 15
    });
    })(jQuery); 
  </script>
<?php
}
if($option=='Style full'){
?>
<article id="organic-lookbook-3">
  <div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
      <div class="left-lb">
        <div class="year-lookbook"><?php echo $year_lookbook; ?></div>
        <div class="center-div">
          <?php 
            $args = array(
                'post_type' => 'lookbook'
            );
            $custom_query = new WP_query( $args );

            if( $custom_query->have_posts() ) {
               $custom_query->the_post();
          ?>
            <div class="content-lookbook">
              <?php echo $content_lookbook; ?>
            </div>
            <div class="title-lookbook"><?php echo $title_lookbook; ?></div>
          <?php
               wp_reset_postdata();
            }
            wp_reset_query();
          ?>
          <div class="scroll-item"><?php _e('scroll to discover', 'beautheme') ?></div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
      <div class="swiper-lookbook-01">
            <div class="swiper-wrapper">
              <?php 
                $slideList  = get_field('look_book', $id_lookbook);
                $count = count($slideList);
                for ($i=0; $i < $count; $i++) { 
                $item = $slideList[$i];
                $img = $item['image_product'];
                $id_product = $item['id_product'];
                ?>
                <div class="swiper-slide">
                  <div class="row">
                    <div class="img-item">
                        <img src="<?php echo esc_attr($img['url']); ?>" alt="" />
                        <?php 
                        $product = new WC_Product( $id_product );
                        $price = $product->get_price_html();
                        $categories = $product->get_categories();
                        $content_product = $product->get_categories();
                        $product_description = get_post($id_product)->post_content;
                        ?>
                        <div class="details-lb">
                          <div class="product-name"><?php echo get_the_title($id_product); ?></div>
                          <div class="text-center">
                            <span class="price"><?php print $product->get_price_html(); ?></span>
                            <div class="add-to-cart">
                              <a href="<?php echo get_permalink($id_product); ?>" rel="nofollow" data-product_id="<?php echo esc_attr($id_product); ?>" class="button add_to_cart_button added">
                              <span><?php echo __('Add to cart','beautheme'); ?></span>
                              </a>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                <?php 
                  }
                ?>
            </div>
        </div>
    </div>
  </div>
  <div class="copy">© 2015 seeds template ®</div>
</article>
  <script type="text/javascript">
  (function($) {  
    "use strict";
    var swiper = new Swiper('.swiper-lookbook-01', {
        slidesPerView: 1,
        mousewheelControl: true,
        paginationClickable: true,
        spaceBetween: 0
    });
    })(jQuery); 
  </script>
<?php
}

if($option=='Style two column'){
?>
    <article id="organic-lookbook-4">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="background-lookbook">
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
              <div class="background-gray"> 
              </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
              <div class="look-book">
                <div class="bg-content-lb">
                  <div class="bg-category-list">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-lookbook-01">
              <div class="swiper-wrapper">
                <?php 
                  $slideList  = get_field('look_book', $id_lookbook);
                  $count = count($slideList);
                  for ($i=0; $i < $count; $i++) { 
                  $item = $slideList[$i];
                  $img = $item['image_product'];
                  $id_product = $item['id_product'];
                  ?>
                  <div class="swiper-slide">
                    <div class="row">
                      <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <div class="background-image"> 
                            <img src="<?php echo esc_attr($img['url']); ?>" alt="" />
                        </div>
                      </div>
                      <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                      <?php 
                        $product = new WC_Product( $id_product );
                        $price = $product->get_price_html();
                        $categories = $product->get_categories();
                        $content_product = $product->get_categories();
                        $product_description = get_post($id_product)->post_content;
                        ?>
                        <div class="look-book">
                          <div class="content-lb">
                            <div class="category-list">
                              <?php woocommerce_breadcrumb(  );?>
                            </div>
                            <div class="title-lb"><?php echo get_the_title($id_product); ?></div>
                            <div class="price-lb"><?php print $product->get_price_html(); ?></div>
                            <div class="description-lb"><?php echo esc_attr($product_description) ; ?></div>
                            <a href="<?php echo get_permalink($id_product); ?>" class="bt"><?php _e('BUY ITEM', 'beautheme') ?></a>
                            
                            <div class="yith-wcwl-add-to-wishlist add-to-wishlist-<?php echo $id_product; ?>">
                              <div class="yith-wcwl-add-button show" style="display:block">
                                <a href="<?php echo get_permalink($id_product); ?>?add_to_wishlist=<?php echo $id_product; ?>" rel="nofollow" data-product-id="<?php echo $id_product; ?>" data-product-type="simple" class="add_to_wishlist single_add_to_wishlist button alt">
                                  <?php _e('/ WISHLIST') ?>
                                </a>
                                <img src="<?php echo site_url(); ?>/wp-admin/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden"></div>

                                  <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                      <a href="<?php echo site_url(); ?>/wishlistview/view/">
                                          <?php _e('/ Browse Wishlist') ?>         
                                      </a>
                                  </div>

                                  <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                      <span class="feedback"></span>
                                      <a href="<?php echo site_url(); ?>/wishlistview/view/">
                                          <?php _e('/ Browse Wishlist') ?>          
                                      </a>
                                  </div>

                                  <div style="clear:both"></div>
                                  <div class="yith-wcwl-wishlistaddresponse"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php 
                    }
                  ?>
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
        </div>
      </div>
      <div class="copy">
      <ul>
        <li>© 2015 seeds template ®</li>
        <li>Infor@beautheme.com</li>
      </ul>
    </div>

    </article>
    <script type="text/javascript">
    (function($) {  
      "use strict";
        var swiper = new Swiper('.swiper-lookbook-01', {
          nextButton: '.swiper-button-next',
          prevButton: '.swiper-button-prev',
          effect: 'coverflow',
          slidesPerView: 1,
          spaceBetween: 0
        });
      })(jQuery); 
    </script>
<?php
}
if($option=='Style Masterslide'){
  masterslider($list_slide);
?>
<div class="cbutton cbutton--effect-radomir">
</div>

<div class="ms-tooltip-point">
  <div class="ms-point-center"></div>
  <div class="ms-point-border"></div>
</div>
<?php 
  $slideList  = get_field('look_book', $id_lookbook);
  $count = count($slideList);
  for ($i=0; $i < $count; $i++) { 
  $item = $slideList[$i];
  $img = $item['image_product'];
  $id_product = $item['id_product'];
?>

<div id="product-<?php echo $id_product; ?>" class="product-show">
  <div id="close"><?php _e('close','beautheme') ?></div>
  <div class="item">
    <div class="img-item">
      <img src="<?php echo esc_attr($img['url']); ?>" alt="" />
    </div>
    <?php 
    $product = new WC_Product( $id_product );
    $price = $product->get_price_html();
    $categories = $product->get_categories();
    $content_product = $product->get_categories();
    $product_description = get_post($id_product)->post_content;
    ?>
    <div class="details-lb">
      <div class="product-name"><a href="get_permalink($id_product);"><?php echo get_the_title($id_product); ?></a></div>
      <div class="content-product"><?php echo esc_attr($product_description) ; ?></div>
      <div class="text-center">
        <span class="text-price"><?php _e('Price','beautheme') ?></span>
        <span class="price"><?php print $product->get_price_html(); ?></span>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php } ?>