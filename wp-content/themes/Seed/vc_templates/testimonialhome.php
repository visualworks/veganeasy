<?php
$direction_slide = $option  = '';
extract(shortcode_atts(array(
    'total_product' => '15',
    'speed_product' => '4000',
    'space_product' => '50',
    'colum_product' => '5',
    'option' => ''
), $atts));
$img = shortcode_atts(array(
            'image_bg' => 'image_bg',
        ), $atts);
  $img = wp_get_attachment_image_src($img["image_bg"], "full");
  $bg_img = $img[0];
?>
<?php
$args = array(
        'post_type' => 'Testimonial',
        'posts_per_page' => $atts['total_product'],
    );
  $postType = new WP_Query( $args);
  $user_info = get_userdata(1);
  $post_id = 0;

if($option=='style 2'){
?>
<article id="organic-introduce-scroll" class="style2"  >
   <div class="row">
     <div class="introduce-scroll">
         <div class="text-scroll">
          <div class="icon-top-srcoll"></div>
            <div class="swiper-testimonial">
            <div class="parallax-bg" style="background-image:url(<?php echo esc_attr($bg_img); ?>)" data-swiper-parallax="-10%"></div>
                <div class="swiper-wrapper style2">

                    <?php
                      if ($postType->have_posts()) {
                      while ($postType->have_posts()) {
                          $postType->the_post();
                          $content_blog = strip_tags(get_the_content());
                       ?>
                       <div class="swiper-slide">
                        <div class="content-testimonial">

                         <div class="text-description"><?php echo the_excerpt(); ?></div>
                         <div class="avatar-scroll">
                           <div class="avatar-right">
                             <p class="name-auther"><?php echo the_title(); ?></p>
                             <?php
                              if (function_exists('rwmb_meta')){
                             ?>
                                  <p class="job-auther">/ <?php echo rwmb_meta( 'origanic_jobs' ); ?></p>
                             <?php }?>
                             
                           </div>
                         </div>
                       </div>
                       </div>
                       <?php }
                    }?>
                    <?php wp_reset_postdata(); ?>
                 </div>
                 <div class="swiper-pagination"></div>
            </div>
          </div>
   </div>
 </div>
</article>
<script type="text/javascript">
  (function($) {  
  "use strict";
  var swiper = new Swiper('.swiper-testimonial', {
    speed: 700,
    <?php
      if(!$atts['auto_slide']==''){
     ?>
      autoplay: 4000,
      <?php } ?>
     <?php if(!$atts['pagination_slide']==''){
     ?>
      pagination: '.swiper-pagination',
      <?php } ?>
      slidesPerView: <?php echo esc_attr($atts['colum_product']); ?>,
      paginationClickable: true,

      <?php
      if($direction_slide=='vertical'){
     ?>
      direction: 'vertical',
      <?php } 
      else{?>
        direction: 'horizontal',
      <?php }?>
      spaceBetween: 1000,
      effect: 'slide',
      parallax: true,
  });
  })(jQuery); 
</script>
<?php } ?>

<?php 
if($option=='style 3'){
?>
<article id="organic-introduce-scroll" class="style3"  >
   <div class="container">
     <div class="introduce-scroll">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <div class="text-scroll">
          <div class="icon-top-srcoll"></div>
            <div class="swiper-testimonial">
            <div class="parallax-bg" style="background-image:url(<?php echo esc_attr($bg_img); ?>)" data-swiper-parallax="-10%"></div>
                <div class="swiper-wrapper style3">

                    <?php
                      if ($postType->have_posts()) {
                      while ($postType->have_posts()) {
                          $postType->the_post();
                          $content_blog = strip_tags(get_the_content());
                       ?>
                       <div class="swiper-slide">
                        <div class="content-testimonial">

                         <div class="text-description"><?php echo the_excerpt(); ?></div>
                         <div class="avatar-scroll">
                         <div class="avatar-left"><?php echo get_the_post_thumbnail(); ?></div>
                           <div class="avatar-right">
                             <p class="name-auther"><?php echo the_title(); ?></p>
                             <?php
                              if (function_exists('rwmb_meta')){
                             ?>
                                  <p class="job-auther"><?php echo rwmb_meta( 'origanic_jobs' ); ?></p>
                             <?php }?>
                             
                           </div>
                         </div>
                       </div>
                       </div>
                       <?php }
                    }?>
                    <?php wp_reset_postdata(); ?>
                 </div>
                 <div class="swiper-pagination"></div>
            </div>
          </div>
         </div>
   </div>
 </div>
</article>
<script type="text/javascript">
  (function($) {  
  "use strict";
  var swiper = new Swiper('.swiper-testimonial', {
    speed: 700,
    <?php
      if(!$atts['auto_slide']==''){
     ?>
      autoplay: 4000,
      <?php } ?>
     <?php if(!$atts['pagination_slide']==''){
     ?>
      pagination: '.swiper-pagination',
      <?php } ?>
      slidesPerView: <?php echo esc_attr($atts['colum_product']); ?>,
      paginationClickable: true,

      <?php
      if($direction_slide=='vertical'){
     ?>
      direction: 'vertical',
      <?php } 
      else{?>
        direction: 'horizontal',
      <?php }?>
      spaceBetween: 1000,
      effect: 'slide',
      parallax: true,
  });
  })(jQuery); 
</script>
<?php } 
if($option=='style 1'){
?>
<article id="organic-introduce-scroll" class="style1"  >
   <div class="row">
     <div class="introduce-scroll">
         <div class="text-scroll">
          <div class="icon-top-srcoll"></div>
            <div class="swiper-testimonial">
            <div class="parallax-bg" style="background-image:url(<?php echo esc_attr($bg_img); ?>)" data-swiper-parallax="-10%"></div>
                <div class="swiper-wrapper style1">

                    <?php
                      if ($postType->have_posts()) {
                      while ($postType->have_posts()) {
                          $postType->the_post();
                          $content_blog = strip_tags(get_the_content());
                       ?>
                       <div class="swiper-slide">
                        <div class="content-testimonial">

                         <div class="text-description"><?php echo the_excerpt(); ?></div>
                         <div class="avatar-scroll">
                           <div class="avatar-left"><?php echo get_the_post_thumbnail(); ?></div>
                           <div class="avatar-right">
                             <p class="name-auther"><?php echo the_title(); ?></p>
                             <?php
                              if (function_exists('rwmb_meta')){
                             ?>
                                  <p class="job-auther"><?php echo rwmb_meta( 'origanic_jobs' ); ?></p>
                             <?php }?>
                           </div>
                         </div>
                       </div>
                       </div>
                       <?php }
                    }?>
                    <?php wp_reset_postdata(); ?>
                 </div>
                 <div class="swiper-pagination"></div>
            </div>
          </div>
   </div>
 </div>
</article>
<script type="text/javascript">
  (function($) {  
  "use strict";
  var swiper = new Swiper('.swiper-testimonial', {
    speed: 700,
    <?php
      if(!$atts['auto_slide']==''){
     ?>
      autoplay: 4000,
      <?php } ?>
     <?php if(!$atts['pagination_slide']==''){
     ?>
      pagination: '.swiper-pagination',
      <?php } ?>
      slidesPerView: <?php echo esc_attr($atts['colum_product']); ?>,
      paginationClickable: true,

      <?php
      if($direction_slide=='vertical'){
     ?>
      direction: 'vertical',
      <?php } 
      else{?>
        direction: 'horizontal',
      <?php }?>
      spaceBetween: 1000,
      effect: 'slide',
      parallax: true,
  });
  })(jQuery); 
</script>
<?php }