<?php
extract(shortcode_atts(array(
    'per_page' => '',
    'category_name' => '',
    'url' => '',
), $atts));
//$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$args = array(
        'post_type' => 'Post',
        'posts_per_page' => $atts['per_page'],
        'category_name' => $atts['category_name'],
    );
  $postType = new WP_Query( $args);
  $user_info = get_userdata(1);
  $post_id = 0;
  $get_comments_number = get_comments_number( $post_id );
  if($atts['option']=='style 1'){
  $div ='
    <article id="organic-comming-blog" class="style1">
      <div class="container">
      <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
        <div class="title-blog">'.__('Upcoming blog', 'beautheme').'</div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
        <div class="see-all-blog"><a href="'.$atts['url'].'">'.__('See all blogs', 'beautheme').'</a></div>
      </div>';
      
      if ($postType->have_posts()) {
        while ($postType->have_posts()) {
          $postType->the_post();
          $content_blog = strip_tags(get_the_content());
          $category =  get_the_category();
          $div .='
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            
              <div class="blog-content">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-2">
                <div class="blog-left">
                <div class="month">'.get_the_time('M').'.</div>
                <div class="day btn-menu btn-outlined">
                    '.get_the_time('d').'
                    <span class="line top"></span>
                    <span class="line right"></span>
                    <span class="line bottom"></span>
                    <span class="line left"></span>
                </div>
              </div>
            </div>

            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-10">
            <div class="blog-right">
              <div class="title-content-blog">
                <a href="'.get_post_permalink().'">'.get_the_title().'</a>
              </div>
              <div class="auther-blog">
                <p>Posted by '.get_the_author().' / '.$category[0]->cat_name.' / '.$get_comments_number.' '.__('Comments', 'beautheme').'</p>
              </div>
              <div class="description-blog">
                <div>'.$content_blog.'</div>
              </div>
              <div class="more-info-blog">
                <a href="'.get_post_permalink().'">'.__('More info', 'beautheme').'</a>
              </div>
              </div>
            </div>
            </div>
          </div>';
        }
      }
      wp_reset_postdata();
      $div .='</div>
    </article>';
    print $div;
}
if($atts['option']=='style 2'){
$div ='
    <article id="organic-comming-blog" class="style2">
      <div class="container">
      
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
          <div class="blog-bottom">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="title-blog">'.__('Upcoming blog', 'beautheme').'</div>
            </div>';
      
          if ($postType->have_posts()) {
                  while ($postType->have_posts()) {
                    $postType->the_post();
                    $content_blog = strip_tags(get_the_content());
                    $category =  get_the_category();
                    $div .='
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="blog-content">
              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <div class="blog-left">
                <div class="month">'.get_the_time('M').'.</div>
                <div class="day btn-menu btn-outlined">
                    '.get_the_time('d').'
                    <span class="line top"></span>
                    <span class="line right"></span>
                    <span class="line bottom"></span>
                    <span class="line left"></span>
                </div>
                </div>
              </div>
              <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <div class="blog-right">
                <div class="title-content-blog">
                  <a href="'.get_post_permalink().'">'.get_the_title().'</a>
                </div>
                <div class="auther-blog">
                  <p>Posted by '.get_the_author().' / '.$category[0]->cat_name.' / '.$get_comments_number.' '.__('Comments', 'beautheme').'</p>
                </div>
                <div class="description-blog">
                  <p>'.$content_blog.'</p>
                </div>
                <div class="more-info-blog">
                  <a href="'.get_post_permalink().'">'.__('More info', 'beautheme').'</a>
                </div>
                </div>
                </div>
              </div>
            </div>';
              }
            }
            wp_reset_postdata();
          $div .='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="see-all-blog"><a href="'.$atts['url'].'">'.__('See all blogs', 'beautheme').'</a></div>
          </div>
          </div>
          </div>
        </div>
      </div>
    </article>';
    print $div;
}
if($atts['option']=='style 3'){
  $div ='
    <article id="organic-comming-blog" class="style3">
      <div class="container">
      <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
        <div class="title-blog">'.__('Upcoming blog', 'beautheme').'</div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
        <div class="see-all-blog"><a href="'.$atts['url'].'">'.__('See all blogs', 'beautheme').'</a></div>
      </div>';
      
      if ($postType->have_posts()) {
        while ($postType->have_posts()) {
          $postType->the_post();
          $content_blog = strip_tags(get_the_content());
          $category =  get_the_category();
          $div .='
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            
              <div class="blog-content">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-2">
                <div class="blog-left">
                <div class="month">'.get_the_time('M').'.</div>
                <div class="day btn-menu btn-outlined">
                    '.get_the_time('d').'
                    <span class="line top"></span>
                    <span class="line right"></span>
                    <span class="line bottom"></span>
                    <span class="line left"></span>
                </div>
              </div>
            </div>

            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-10">
            <div class="blog-right">
              <div class="title-content-blog">
                <a href="'.get_post_permalink().'">'.get_the_title().'</a>
              </div>
              <div class="auther-blog">
                <p>Posted by '.get_the_author().' / '.$category[0]->cat_name.' / '.$get_comments_number.' '.__('Comments', 'beautheme').'</p>
              </div>
              <div class="description-blog">
                <div>'.$content_blog.'</div>
              </div>
              <div class="more-info-blog">
                <a href="'.get_post_permalink().'">'.__('More info', 'beautheme').'</a>
              </div>
              </div>
            </div>
            </div>
          </div>';
        }
      }
      wp_reset_postdata();
      $div .='</div>
    </article>';
    print $div;
}
if($atts['option']=='style 4'){
$div ='
    <article id="organic-comming-blog" class="style4">
      <div class="container">
      
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
          <div class="blog-bottom">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="title-blog">Upcoming blog</div>
            </div>';
      
          if ($postType->have_posts()) {
                  while ($postType->have_posts()) {
                    $postType->the_post();
                    $content_blog = strip_tags(get_the_content());
                    $category =  get_the_category();
                    $div .='
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="blog-content">
              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <div class="blog-left">
                <div class="month">'.get_the_time('M').'.</div>
                <div class="day btn-menu btn-outlined">
                    '.get_the_time('d').'
                    <span class="line top"></span>
                    <span class="line right"></span>
                    <span class="line bottom"></span>
                    <span class="line left"></span>
                </div>
                </div>
              </div>
              <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <div class="blog-right">
                <div class="title-content-blog">
                  <a href="'.get_post_permalink().'">'.get_the_title().'</a>
                </div>
                <div class="auther-blog">
                  <p>Posted by '.get_the_author().' / '.$category[0]->cat_name.' / '.$get_comments_number.' '.__('Comments', 'beautheme').'</p>
                </div>
                <div class="description-blog">
                  <p>'.$content_blog.'</p>
                </div>
                <div class="more-info-blog">
                  <a href="'.get_post_permalink().'">'.__('More info', 'beautheme').'</a>
                </div>
                </div>
                </div>
              </div>
            </div>';
              }
            }
            wp_reset_postdata();
          $div .='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="see-all-blog"><a href="'.$atts['url'].'">'.__('See all blogs', 'beautheme').'</a></div>
          </div>
          </div>
          </div>
        </div>
      </div>
    </article>';
    print $div;
}
?>