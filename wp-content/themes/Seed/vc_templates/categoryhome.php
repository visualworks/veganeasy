<?php
extract(shortcode_atts(array(
    'title' => '',
    'title_left' => '',
    'title_right' => '',
    'url_left' => '',
    'url_right' => '',
), $atts));

$img = shortcode_atts(array(
            'image_left' => 'image_left',
), $atts);

$img2 = shortcode_atts(array(
            'image_right' => 'image_right',
), $atts);
$get_img_left = wp_get_attachment_image_src($img["image_left"], "large");
$img_left = $get_img_left[0];
$get_img_right = wp_get_attachment_image_src($img2["image_right"], "large");
$img_right = $get_img_right[0];
?>
<article id="organic-category">
      <div class="container">
        <div class="bg-category">
        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
        <div class="title-category-big">//<?php echo esc_attr($atts['title']); ?></div>
        </div>
        
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                  <div class="form-category">
                    <div class="title-category"><a href="<?php echo esc_attr($atts['url_left']); ?>"><?php echo esc_attr($atts['title_left']); ?></a></div>
                    <div class="cover-images-category left">
                      <img src="<?php echo esc_attr($img_left); ?>" alt="">
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                  <div class="form-category">
                    <div class="title-category"><a href="<?php echo esc_attr($atts['url_right']); ?>"><?php echo esc_attr($atts['title_right']); ?></a></div>
                    <div class="cover-images-category left">
                      <img src="<?php echo esc_attr($img_right); ?>" alt="">
                    </div>
                  </div>
                </div>
        </div>
      </div>
    </article>