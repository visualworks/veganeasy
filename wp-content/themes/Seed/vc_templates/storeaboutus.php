<?php
$title = $title_content = $name_store = $phone_store = $email_store = $address_store = $description_right = $avatar_author = $name = $job = $list_slide = '';
extract(shortcode_atts(array(
    'title' => '',
      'title_content' => '',
      'description_left' => '',
      'description_right' => '',
      'name' =>'',
      'job' =>'',
      'name_store' => '',
      'phone_store' => '',
      'email_store' => '',
      'address_store' => '',
      'list_slide' => '',
), $atts));
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
 $a = shortcode_atts(array(
            'image' => 'image',
            'avatar' => 'avatar',
        ), $atts);
 
        $img = wp_get_attachment_image_src($a["image"], "large");
        $avatar = wp_get_attachment_image_src($a["avatar"], "large");
        $imgSrc = $img[0];
        $avatar_author = $avatar[0];
?>
<article id="organic-store-about-us">
      <div class="title-store"><?php print $title; ?></div>
      <div class="banner-store">
        <?php 
        if ( is_plugin_active( 'masterslider/masterslider.php' ) ) {
        masterslider($list_slide); 
        }
        ?>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="store-right">
            <div class="title-text"><?php print $title_content; ?></div>
            <div class="content">
              <div class="name"><?php print $name_store; ?></div>
              <div class="phone"><?php print $phone_store; ?></div>
              <div class="email"><?php print $email_store; ?></div>
              <div class="address"><?php print $address_store; ?></div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="store-left">
            <div class="content"><?php print $description_right; ?></div>
            <div class="avatar-scroll">
              <div class="avatar-left"><img src="<?php print $avatar_author; ?>"></div>
              <div class="avatar-right">
                <p class="name-auther"><?php print $name; ?></p>
                <p class="job-auther"><?php print $job; ?></p>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </article>