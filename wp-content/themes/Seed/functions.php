<?php
  define('ORI_BASE_URL', get_template_directory_uri());
  define('ORI_BASE', get_template_directory());


 if ( file_exists( ORI_BASE . '/vc_template_function.php' ) ) {
      include (ORI_BASE . '/vc_template_function.php');
 }

include 'woocommerce-grid-list-toggle/grid-list-toggle.php';
include 'woosalescountdown/woosalescountdown.php';
include 'woocommerce-ajax-add-to-cart-for-variable-products/woocommerce-ajax-add-to-cart-variable-products.php';
include 'libs/tgmpa-register.php';

function organic_fonts() {
    $protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style( 'mytheme-opensans', "$protocol://fonts.googleapis.com/css?family=Playfair+Display:400,700,700italic" );}
add_action( 'wp_enqueue_scripts', 'organic_fonts' );

if ( ! isset( $content_width ) ) {

      $content_width = 1024;
 }
function origanic_styles()
	{
    global $redux_demo;
     //style
	    wp_enqueue_style('bootstrap', ORI_BASE_URL .'/css/bootstrap.css', array(), '3.3.1');
	    wp_enqueue_style('font-awesome', ORI_BASE_URL .'/css/font-awesome.min.css', array(), '4.3.0');
      wp_enqueue_style('css-slide', ORI_BASE_URL .'/css/swiper.min.css', array(), '4.3.0');
      wp_enqueue_style('animate-slide', ORI_BASE_URL .'/css/animate.css', array(), '4.3.0');
      wp_enqueue_style('css-lookbook', ORI_BASE_URL .'/css/lookbook.css', array(), '1.0.0');
      
      //js
      wp_enqueue_script('jquery-bootstrap', ORI_BASE_URL .'/js/bootstrap.min.js', 'jquery', '3.3.1', TRUE);
      wp_enqueue_script('jquery-swiper-min', ORI_BASE_URL .'/js/swiper.jquery.min.js', 'jquery', '3.0.4', FALSE);
      wp_enqueue_script('jssquery-bootstrap', ORI_BASE_URL .'/js/jquery.carouFredSel-6.2.1-packed.js', 'jquery', '3.3.1', TRUE);
      wp_enqueue_script('parallax', ORI_BASE_URL .'/js/jquery.parallax-1.1.3.js', 'jquery', '3.3.1', TRUE);
      wp_enqueue_script('parallax-scroll', ORI_BASE_URL .'/js/jquery.scrollTo-1.4.2-min.js', 'jquery', '3.3.1', TRUE);
      wp_enqueue_script('seed', ORI_BASE_URL .'/js/seed.js', 'jquery', '1.0.0', TRUE);
      wp_enqueue_script('effect', ORI_BASE_URL .'/js/classie.js', 'jquery', '1.0.0', TRUE);
      wp_enqueue_script('click', ORI_BASE_URL .'/js/modernizr.custom.js', 'jquery', '1.0.0', TRUE);
      if (isset($redux_demo['header-fixed'])) {
        wp_enqueue_script('sticker', ORI_BASE_URL .'/js/sticker.js', 'jquery', '1.0.0', TRUE);
      }
      
      if (is_page_template( 'templates/Home-02.php' )) {
        wp_enqueue_style('style-home-02', ORI_BASE_URL .'/css/style-home-02.css', array(), '3.3.1');
      }
      if (is_page_template( 'templates/Home-03.php' )) {
        wp_enqueue_style('style-home-03', ORI_BASE_URL .'/css/style-home-03.css', array(), '3.3.1');
      }
      if (is_page_template( 'templates/Home-04.php' )) {
        wp_enqueue_style('style-home-04', ORI_BASE_URL .'/css/style-home-04.css', array(), '3.3.1');
      }
      if (!is_page_template( 'templates/Home-02.php' ) && !is_page_template( 'templates/Home-03.php' )&&!is_page_template( 'templates/Home-04.php' )) {
        wp_enqueue_style('style-home', ORI_BASE_URL .'/css/style.css', array(), '3.3.1');
      }
  }  

if ( !is_admin() ) {
  add_action('wp_enqueue_scripts', 'origanic_styles');
}  

if ( ! function_exists( 'origanic_theme_setup' ) ) {
      function origanic_theme_setup() {
              $language_folder = ORI_BASE_URL . '/languages';
              load_theme_textdomain( 'beautheme', $language_folder );

              add_theme_support( 'automatic-feed-links' );
              add_theme_support( 'post-thumbnails' );
              add_theme_support( 'title-tag' );
              add_theme_support( 'post-formats',
                      array(
                              'video',
                              'image',
                              'audio',
                              'gallery'
                      )
               );

              $default_background = array(
                      'default-color' => '#e8e8e8',
              );
              add_theme_support( 'custom-background', $default_background );
               register_nav_menu ( 'primary-menu', __('Primary Menu', 'beautheme') );

               $sidebar = array(
                  'name' => __('Main Sidebar', 'beautheme'),
                  'id' => 'main-sidebar',
                  'description' => 'Main sidebar for origanic theme',
                  'class' => 'main-sidebar',
                  'before_title' => '<h3 class="widgettitle">',
                  'after_sidebar' => '</h3>'
               );
               register_sidebar( $sidebar );
      }
      add_action ( 'init', 'origanic_theme_setup' );
}

if ( ! function_exists( 'organic_thumbnail' ) ) {
  function organic_thumbnail( $size ) {
 
    // Chỉ hiển thumbnail với post không có mật khẩu
    if ( ! is_single() &&  has_post_thumbnail()  && ! post_password_required() || has_post_format( 'image' ) ) : ?>
      <figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure><?php
    endif;
  }
}

if ( ! function_exists( 'origanic_logo' ) ) {
function origanic_logo() {?>
  <div class="logo">

    <div class="site-name">
      <?php if ( is_home() ) {
        printf(
          '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
          home_url(),
          get_bloginfo( 'description' ),
          get_bloginfo( 'sitename' )
        );
      } else {
        printf(
          '<a href="%1$s" title="%2$s">%3$s</a>',
          home_url(),
          get_bloginfo( 'description' ),
          get_bloginfo( 'sitename' )
        );
      } // endif ?>
    </div>
    <div class="site-description"><?php bloginfo( 'description' ); ?></div>

  </div>
<?php }
}

if ( ! function_exists( 'origanic_menu' ) ) {
  function origanic_menu( $slug ) {
    $menu = array(
      'theme_location' => $slug,
      'container' => 'nav',
      'container_class' => $slug,
    );
    wp_nav_menu( $menu );
  }
}
if ( ! function_exists( 'origanic_entry_header' ) ) {
  function origanic_entry_header() {
    if ( is_single() ) : ?>
 
      <div class="archive-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
      </div>
    <?php else : ?>
      <div class="archive-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
      </div><?php
 
    endif;
  }
}
if( ! function_exists( 'origanic_entry_meta' ) ) {
  function origanic_entry_meta() {
    if ( ! is_page() ) :
      echo '<div class="entry-meta">';
        printf( __('<span class="author">Posted by %1$s</span>', 'beautheme'),
          get_the_author() );
 
        printf( __('<span class="date-published"> at %1$s</span>', 'beautheme'),
          get_the_date() );
 
        printf( __('<span class="category"> in %1$s</span>', 'beautheme'),
          get_the_category_list( ', ' ) );
        if ( comments_open() ) :
          echo ' <span class="meta-reply">';
            comments_popup_link(
              __('Leave a comment', 'beautheme'),
              __('One comment', 'beautheme'),
              __('% comments', 'beautheme'),
              __('Read all comments', 'beautheme')
             );
          echo '</span>';
        endif;
      echo '</div>';
    endif;
  }
}



if ( ! function_exists( 'origanic_entry_content' ) ) {
  function origanic_entry_content() {
    if ( ! is_single() ) :
      the_excerpt();
    else :
      the_content();
      $link_pages = array(
        'before' => __('<p>Page:', 'beautheme'),
        'after' => '</p>',
        'nextpagelink'     => __( 'Next page', 'beautheme' ),
        'previouspagelink' => __( 'Previous page', 'beautheme' )
      );
      wp_link_pages( $link_pages );
    endif;
 
  }
}
if ( ! function_exists( 'origanic_entry_tag' ) ) {
  function origanic_entry_tag() {
    if ( has_tag() ) :
      echo '<div class="entry-tag">';
      printf( __('Tagged in %1$s', 'beautheme'), get_the_tag_list( '', ', ' ) );
      echo '</div>';
    endif;
  }
}

//Shortcode show product home 4
function shortcode_woo_post($atts, $contents='') {
 
            // $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $default = array(
      'category' => '',
      'per_page' => '',
      'columns' =>'',
    );

  $atts = shortcode_atts( $default, $atts );
  $sc = do_shortcode('[product_category category="'.$atts['category'].'" per_page="'.$atts['per_page'].'" columns="'.$atts['columns'].'"]');
  $div ='
    <article id="organic-trending-item">
      <div class="row">
        '.$sc.'
      </div>
    </article>';
    return $div;
}
add_shortcode('woo_product_home_04', 'shortcode_woo_post');



function beau_reorganize_meta_boxes() {
    remove_meta_box( 'postimagediv', 'Logo partner', 'partner' );
    add_meta_box('postimagediv', __('Partner logo','beautheme'), 'post_thumbnail_meta_box', 'partner', 'normal', 'high');
}
add_action( 'do_meta_boxes', 'beau_reorganize_meta_boxes');

// breadcrumb
function the_breadcrumb() {
    global $post;
    if (!is_home()) {
        echo '<span class="category-detail name"><a href="';
        echo home_url();
        echo '">';
        echo 'Home';
        echo '</a></span>';
        if (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<span class="category-detail active"><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></span>';
                }
                printf('%s',$output);
                echo '<strong title="'.$title.'"> '.$title.'</strong>';
            } 
            else{
                if(get_the_title()!='')
                {
                  echo '<span class="category-detail active"> '.get_the_title().'</span>';
                }
                
            }

        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
}

/* REGISTER WIDGETS ------------------------------------------------------------*/
 
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Footer lookbook',
        'id'   => 'footer-lookbook-widget',
        'description'   => 'Footer lookbook widget position.',
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));
    register_sidebar(array(
        'name' => 'Footer Left',
        'id'   => 'footer-left-widget',
        'description'   => 'Left Footer widget position.',
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));

    register_sidebar(array(
        'name' => 'Email subscribe',
        'id'   => 'email-subscribe',
        'description'   => 'Email subscribe widget position.',
        'before_widget' => '<div id="%1$s" class="form-send-letter">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));
    register_sidebar(array(
        'name' => 'Banner home 2',
        'id'   => 'banner-home-2',
        'description'   => 'Banner home 2 widget position.',
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));
    register_sidebar(array(
        'name' => 'Sidebar-product',
        'id'   => 'sidebar-product',
        'description'   => 'Sidebar product widget position.',
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));
}

//Register widget for page

function beau_register_sidebar() {
    global $redux_demo, $col;

    $col = $redux_demo['footer-columns'];
    if ($col==0) {
        $col =12;
    }
    $colnum = intval(12/$col);
    if($col==1)
    {
          register_sidebar(
              array(  // 1
                  'name' => __( 'Footer sidebar ', 'beautheme' ),
                  'description' => __( 'This is footer sidebar ', 'beautheme' ),
                  'id' => 'sidebar-footer-1',
                  'before_widget' => '<div class="footer-widget col-lg-12 col-md-12 col-sm-12 col-xs-12">',
                  'after_widget' => '</div>',
                  'before_title' => '<h3 class="widget-title">',
                  'after_title' => '</h3>'
              )
          );
    }
    else {
      for ($i=1; $i <= $col; $i++) {
          register_sidebar(
              array(  // 1
                  'name' => __( 'Footer sidebar'.$i, 'beautheme' ),
                  'description' => __( 'This is footer sidebar '.$i, 'beautheme' ),
                  'id' => 'sidebar-footer-'.$i,
                  'before_widget' => '<div class="footer-widget col-md-'.$colnum . ' col-sm-' .$colnum . ' col-xs-12">',
                  'after_widget' => '</div>',
                  'before_title' => '<h3 class="widget-title">',
                  'after_title' => '</h3>'
              )
          );
      }
    }
    
}
add_action( 'widgets_init', 'beau_register_sidebar' );

/**
* WooCommerce: Show only one custom product attribute above Add-to-cart button on single product page.
*/
function isa_woo_get_one_pa(){
 
    // Edit below with the title of the attribute you wish to display
    $desired_att = 'Some Attribute Title';
  
    global $product;
    $attributes = $product->get_attributes();
     
    if ( ! $attributes ) {
        return;
    }
     
    $out = '';
  
    foreach ( $attributes as $attribute ) {
         
        if ( $attribute['is_taxonomy'] ) {
         
            // sanitize the desired attribute into a taxonomy slug
            $tax_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $desired_att)));
         
            // if this is desired att, get value and label
             
            if ( $attribute['name'] == 'pa_' . $tax_slug ) {
             
                $terms = wp_get_post_terms( $product->id, $attribute['name'], 'all' );
                 
                // get the taxonomy
                $tax = $terms[0]->taxonomy;
                 
                // get the tax object
                $tax_object = get_taxonomy($tax);
                 
                // get tax label
                if ( isset ($tax_object->labels->name) ) {
                    $tax_label = $tax_object->labels->name;
                } elseif ( isset( $tax_object->label ) ) {
                    $tax_label = $tax_object->label;
                }
                 
                foreach ( $terms as $term ) {
      
                    $out .= $tax_label . ': ';
                    $out .= $term->name . '<br />';
                      
                }           
             
            } // our desired att
             
        } else {
         
            // for atts which are NOT registered as taxonomies
             
            // if this is desired att, get value and label
            if ( $attribute['name'] == $desired_att ) {
                $out .= $attribute['name'] . ': ';
                $out .= $attribute['value'];
            }
        }       
         
     
    }
     
    echo esc_attr($out);
}
add_action('woocommerce_single_product_summary', 'isa_woo_get_one_pa');

add_filter( 'add_to_cart_text', 'woo_custom_cart_button_text' );                                // < 2.1
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +
  
function woo_custom_cart_button_text() {
  
        return __( 'add to basket', 'beautheme' );
  
}
add_filter( 'wc_product_sku_enabled', '__return_false' );

add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {

  $args['posts_per_page'] = 4; // 4 related products
  $args['columns'] = 4; // arranged in 2 columns
  return $args;
}

function tags_in_post($atts) {    // [tags] outputs post's tags in a span
global $post;
$tags = '<span class="post-tags">';
ob_start();
the_tags( '<span class="post-tags"><strong>Tags:</strong> ', ', ', '</span>' );
$tags = ob_get_flush();
return $tags;
}
add_shortcode ('tags', 'tags_in_post');

// remove field URL with unset field
function remove_comment_fields($fields) {
  unset($fields['url']);
  return $fields;
  }
add_filter('comment_form_default_fields','remove_comment_fields');

function bg_recent_comments($no_comments = 5, $comment_len = 80, $avatar_size = 48) {
    $comments_query = new WP_Comment_Query();
    $comments = $comments_query->query( array( 'number' => $no_comments ) );
    $comm = '';
    if ( $comments ) : foreach ( $comments as $comment ) :
        $comm .= '<li><a class="author" href="' . get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID . '">';
        $comm .= get_avatar( $comment->comment_author_email, $avatar_size );
        $comm .= get_comment_author( $comment->comment_ID ) . ':</a> ';
        $comm .= '<p>' . strip_tags( substr( apply_filters( 'get_comment_text', $comment->comment_content ), 0, $comment_len ) ) . '...</p></li>';
    endforeach; else :
        $comm .= 'No comments.';
    endif;
    echo esc_attr($comm); 
}


function implement_ajax() {
if(isset($_POST['main_catid']))
            {
            $categories=  get_categories('child_of='.$_POST['main_catid'].'&hide_empty=0');
              foreach ($categories as $cat) {
                $option .= '<option value="'.$cat->term_id.'">';
                $option .= $cat->cat_name;
                $option .= ' ('.$cat->category_count.')';
                $option .= '</option>';
              }
 
              echo '<option value="-1" selected="selected">Scegli...</option>'.$option;
            die();
            } // end if
}
add_action('wp_ajax_my_special_ajax_call', 'implement_ajax');
add_action('wp_ajax_nopriv_my_special_ajax_call', 'implement_ajax');
add_filter( 'woocommerce_product_tabs', 'woo_reorder_tabs', 98 );
function woo_reorder_tabs( $tabs ) {

  $tabs['reviews']['priority'] = 5;     // Reviews first
  $tabs['additional_information']['priority'] = 10; // Additional information third
  $tabs['description']['priority'] = 15;      // Description second


  return $tabs;
}

//

add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

  $tabs['reviews']['title'] = __( 'Reviews','beautheme');        // Rename the reviews tab

  return $tabs;

}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 3; // 3 products per row
  }
}

add_filter('manage_posts_columns', 'add_thumbnail_column', 5);

//End

//Add colum thumbnail and display
function add_thumbnail_column($columns){
  $columns['new_post_thumb'] = __('Featured Image','beautheme');
  return $columns;
}

add_action('manage_posts_custom_column', 'display_thumbnail_column', 5, 2);


function display_thumbnail_column($column_name, $post_id){
  switch($column_name){
    case 'new_post_thumb':
      $post_thumbnail_id = get_post_thumbnail_id($post_id);
      if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
        echo '<img width="180" src="' . $post_thumbnail_img[0] . '" />';
      }
      break;
  }
}
//end 


//Social in detail product
add_action('woocommerce_share','wooshare');
function wooshare(){
$div = '
<div class="social-icon"><a href="#"></a></div>
<div class="social-class">
<div class="fb-like" data-href="'.get_permalink().'" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
<a href="http://pinterest.com/pin/create/button/?url='.get_permalink().'&media='.wp_get_attachment_url( get_post_thumbnail_id() ).'" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>

<a href="https://twitter.com/share" class="twitter-share-button" data-via="bryanheadrick">Tweet</a>
<div class="g-plusone" data-size="medium"></div>
</div>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>';
printf('%s',$div) ;
?>
<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'en-GB'}
</script>
<div id="fb-root"></div>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $(".social-icon a").click(function(){  
    $(".social-class").fadeToggle('400');
    return false;
    });
});
</script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=281787978603249";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php
}
//end

//Register type thumbnail
add_image_size('postfull-thumbnail',1500,518, true);
add_image_size('productfull-thumbnail',910,615, true);
//end

// Register menu mobile
register_nav_menus( array(
        'mobile-menu' => 'Mobile Menu',
        'contact-menu' => 'Contact Menu'
) );
//end
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
function wcs_woo_remove_reviews_tab($tabs) {
 unset($tabs['reviews']);
 return $tabs;
}