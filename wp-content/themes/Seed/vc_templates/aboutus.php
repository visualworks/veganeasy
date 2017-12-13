<?php
$title = $titlepost = '';
extract(shortcode_atts(array(
    'title' => '',
    'titlepost' => ''
), $atts));
$img = shortcode_atts(array(
            'bg_top_left' => 'bg_top_left',
            'bg_top_right' => 'bg_top_right',
            'bg_bottom_left' => 'bg_bottom_left',
            'bg_bottom_right' => 'bg_bottom_right',
        ), $atts);
    $img01 = wp_get_attachment_image_src($img["bg_top_left"], "large");
    $bg_01 = $img01[0];

    $img02 = wp_get_attachment_image_src($img["bg_top_right"], "large");
    $bg_02 = $img02[0];

    $img03 = wp_get_attachment_image_src($img["bg_bottom_left"], "large");
    $bg_03 = $img03[0];

    $img04 = wp_get_attachment_image_src($img["bg_bottom_right"], "large");
    $bg_04 = $img04[0];
?>
<div class="content-about-top">
    <div class="title-about-us"><?php print($title); ?><span>//</span></div>
            
    <div class="content-about-us">
      <div class="text-title-about-us"><?php print($titlepost); ?></div>
      <div class="content">
      <?php print($content); ?>
        </div>
    </div>
        <div class="image-bg-about-us">
        <div class="img-01"><img src="<?php print($bg_01); ?>"></div>
        <div class="img-02"><img src="<?php print($bg_02); ?>"></div>
        <div class="img-03"><img src="<?php print($bg_03); ?>"></div>
        <div class="img-04"><img src="<?php print($bg_04); ?>"></div>
    </div>
</div>