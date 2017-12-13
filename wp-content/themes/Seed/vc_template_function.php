<?php 
if(!class_exists('WPBakeryShortCode')) return;
//Visual comporeser


//Add some attribute file nay
add_action( 'vc_before_init', 'addParallax',999999 );
function addParallax(){
  if(function_exists('vc_remove_param')){
        //vc_remove_param('vc_row','bg_image');
    vc_remove_param('vc_row','bg_image_repeat');
  }
  if(function_exists('vc_add_param')){
    vc_add_param('vc_column',array(
        'type' => 'checkbox',
        'heading' => __('Enable parallax background', 'beautheme'),
        'param_name' => 'parallax_background',
        'value' => array( __('Yes, please', 'beautheme') => 'yes' ),
        "description" => __("Enable parallax in this section (background no repeat)", "beautheme"),
        "group" => __( 'Design options', 'beautheme' ),
      )
    );
    vc_add_param('vc_row',array(
        'type' => 'checkbox',
        'heading' => __( 'Enable parallax background', 'beautheme' ),
        'param_name' => 'parallax_background',
        'value' => array( __( 'Yes, please', 'beautheme' ) => 'yes' ),
        "description" => __("Enable parallax in this section (background no repeat)", "beautheme"),
        "group" => __( 'Design options', 'beautheme' ),
      )
    );
    //Row inner
    vc_add_param('vc_row_inner',array(
        'type' => 'checkbox',
        'heading' => __( 'Enable parallax background', 'beautheme' ),
        'param_name' => 'parallax_background',
        'value' => array( __( 'Yes, please', 'beautheme' ) => 'yes' ),
        "description" => __("Enable parallax in this section (background no repeat)", "beautheme"),
        "group" => __( 'Design options', 'beautheme' ),
      )
    );

  }

}

add_action( 'vc_before_init', 'history_home' );
function history_home() {
   vc_map( array(
  'name' => __( 'History home', 'beautheme' ),
  'base' => 'historyhome',
  'weight' => 1,
  'description' => __( 'History home', 'beautheme' ),
  'params' => array(
        array(
          'type' => 'dropdown',
          'heading' => __( 'Option', 'beautheme' ),
          'param_name' => 'option',
          'value' => array('Select...','style 1','style 2', 'style 3'),
        ),
        array(
                'type' => 'textfield',
                'heading' => __( 'Title history', 'beautheme' ),
                'param_name' => 'title',
                'description' => __( 'You can set title is history or about us or whatever you want', 'beautheme' ),
            ),
        array(
                'type' => 'textfield',
                'heading' => __( 'Title content', 'beautheme' ),
                'param_name' => 'titlepost',
                'description' => __( 'You can set title of content', 'beautheme' ),
            ),
        array(
                'type' => 'textfield',
                'heading' => __( 'Description', 'beautheme' ),
                'param_name' => 'description',
                'description' => __( 'You can set description of content', 'beautheme' ),
            ),
        array(
                'type' => 'textfield',
                'heading' => __( 'History button link', 'beautheme' ),
                'param_name' => 'url',
                'description' => __( 'You can set url of button', 'beautheme' ),
            ),
        array(
                'type' => 'textfield',
                'heading' => __( 'Button read more', 'beautheme' ),
                'param_name' => 'text_bt',
                'description' => __( 'You can set text of button', 'beautheme' ),
            ),
        array(
          'type' => 'attach_images',
          'heading' => __( 'Images', 'beautheme' ),
          'param_name' => 'images',
          'value' => '',
          'description' => __( 'Select images from media library.', 'beautheme' )
        ),
        array(
          'type' => 'textarea_html',
          'heading' => __( 'Content', 'beautheme' ),
          'param_name' => 'content',
          'description' => __( 'Content of this section.', 'beautheme' )
        ),
      )
    )
  );
}
class WPBakeryShortCode_historyhome extends WPBakeryShortCode {
}


add_action( 'vc_before_init', 'blog_home' );
function blog_home() {
   vc_map( array(
        "name" => __( "Blog Home", "beautheme" ),
        "base" => "bloghome",
        'weight' => 3,
        "params" => array(
          array(
            'type' => 'dropdown',
            'heading' => __( 'Option', 'beautheme' ),
            'param_name' => 'option',
            'value' => array('Select...','style 1','style 2', 'style 3', 'style 4'),
          ),
          array(
                  'type' => 'textfield',
                  'heading' => __( 'Post per page', 'beautheme' ),
                  'param_name' => 'per_page',
                  'description' => __( 'Number post per page', 'beautheme' ),
              ),
          array(
                  'type' => 'textfield',
                  'heading' => __( 'Category name', 'beautheme' ),
                  'param_name' => 'category_name',
                  'description' => __( 'Name of category you want to show', 'beautheme' ),
              ),
          array(
                  'type' => 'href',
                  'heading' => __( 'See all blog link', 'beautheme' ),
                  'param_name' => 'url',
                  'description' => __( 'Button link.', 'beautheme' )
          ),
        ),

     ) 
  );
}
class WPBakeryShortCode_bloghome extends WPBakeryShortCode {
}


add_action( 'vc_before_init', 'content_about_us' );
function content_about_us() {
   vc_map( array(
  'name' => __( 'About us', 'beautheme' ),
  'base' => 'aboutus',
  'weight' => 4,
  'description' => __( 'About us', 'beautheme' ),
  'params' => array(
        array(
          'type' => 'textfield',
          'heading' => __( 'Title', 'beautheme' ),
          'param_name' => 'title',
          'description' => __( 'You can set title is history or about us or whatever you want', 'beautheme' ),
            ),
        array(
          'type' => 'textfield',
          'heading' => __( 'Title content', 'beautheme' ),
          'param_name' => 'titlepost',
          'description' => __( 'You can set title of content', 'beautheme' ),
            ),
        array(
          'type' => 'textarea_html',
          'heading' => __( 'Content', 'beautheme' ),
          'param_name' => 'content',
          'description' => __( 'Content of this section.', 'beautheme' )
        ),
        array(
          'type' => 'attach_images',
          'heading' => __( 'Background top left', 'beautheme' ),
          'param_name' => 'bg_top_left',
          'value' => '',
          'description' => __( 'Select images from media library.', 'beautheme' )
        ),
        array(
          'type' => 'attach_images',
          'heading' => __( 'Background top right', 'beautheme' ),
          'param_name' => 'bg_top_right',
          'value' => '',
          'description' => __( 'Select images from media library.', 'beautheme' )
        ),
        array(
          'type' => 'attach_images',
          'heading' => __( 'Background bottom left', 'beautheme' ),
          'param_name' => 'bg_bottom_left',
          'value' => '',
          'description' => __( 'Select images from media library.', 'beautheme' )
        ),
        array(
          'type' => 'attach_images',
          'heading' => __( 'Background bottom right', 'beautheme' ),
          'param_name' => 'bg_bottom_right',
          'value' => '',
          'description' => __( 'Select images from media library.', 'beautheme' )
        ),
      )
    )
  );
}
class WPBakeryShortCode_aboutus extends WPBakeryShortCode {
}

add_action( 'vc_before_init', 'store_about_us' );
function store_about_us() {
  $master_sliders = '';
    if (is_plugin_active('masterslider/masterslider.php')){
      $master_sliders = get_masterslider_names( false );
    }
   vc_map( array(
  'name' => __( 'Store about us', 'beautheme' ),
  'base' => 'storeaboutus',
  'description' => __( 'Store about us', 'beautheme' ),
  'weight' => 5,
  'params' => array(
        array(
            'type' => 'textfield',
            'heading' => __( 'Title', 'beautheme' ),
            'param_name' => 'title',
            'description' => __( 'You can set title', 'beautheme' ),
            ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'List slide', 'beautheme' ),
            'param_name' => 'list_slide',
            'value' => $master_sliders,
          ),
        array(
                'type' => 'textfield',
                'heading' => __( 'Title content', 'beautheme' ),
                'param_name' => 'title_content',
                'description' => __( 'You can set title of content', 'beautheme' ),
            ),
        array(
                'type' => 'textfield',
                'heading' => __( 'Name store', 'beautheme' ),
                'param_name' => 'name_store',
                'description' => __( 'You can set name of store', 'beautheme' ),
            ),
        array(
                'type' => 'textfield',
                'heading' => __( 'Phone store', 'beautheme' ),
                'param_name' => 'phone_store',
                'description' => __( 'You can set phone of store', 'beautheme' ),
            ),
        array(
                'type' => 'textfield',
                'heading' => __( 'Email store', 'beautheme' ),
                'param_name' => 'email_store',
                'description' => __( 'You can set Email of store', 'beautheme' ),
            ),
        array(
                'type' => 'textfield',
                'heading' => __( 'Address store', 'beautheme' ),
                'param_name' => 'address_store',
                'description' => __( 'You can set address of store', 'beautheme' ),
            ),
        array(
          'type' => 'textarea',
          'heading' => __( 'Description right', 'beautheme' ),
          'param_name' => 'description_right',
          'description' => __( 'Description right of this section.', 'beautheme' )
        ),
        array(
          'type' => 'attach_images',
          'heading' => __( 'Avatar', 'beautheme' ),
          'param_name' => 'avatar',
          'value' => '',
          'description' => __( 'Select images from media library.', 'beautheme' )
        ),
        array(
                'type' => 'textfield',
                'heading' => __( 'Name content', 'beautheme' ),
                'param_name' => 'name',
                'description' => __( 'You can set name of content', 'beautheme' ),
            ),
        array(
                'type' => 'textfield',
                'heading' => __( 'Job content', 'beautheme' ),
                'param_name' => 'job',
                'description' => __( 'You can set job of content', 'beautheme' ),
            ),
      )
    )
  );
}
class WPBakeryShortCode_storeaboutus extends WPBakeryShortCode {
}


add_action( 'vc_before_init', 'category_home' );
function category_home() {
   vc_map( array(
  'name' => __( 'Category home', 'beautheme' ),
  'base' => 'categoryhome',
  'description' => __( 'Category home', 'beautheme' ),
  'weight' => 5,
  'params' => array(
          array(
                'type' => 'textfield',
                'heading' => __( 'Title category', 'beautheme' ),
                'param_name' => 'title',
                'description' => __( 'You can set title category', 'beautheme' ),
          ),
          array(
                'type' => 'textfield',
                'heading' => __( 'Title left', 'beautheme' ),
                'param_name' => 'title_left',
                'description' => __( 'You can set title left', 'beautheme' ),
          ),
          array(
                'type' => 'attach_images',
                'heading' => __( 'Image left', 'beautheme' ),
                'param_name' => 'image_left',
                'value' => '',
                'description' => __( 'Select images from media library.', 'beautheme' )
          ),
          array(
                'type' => 'textfield',
                'heading' => __( 'Title right', 'beautheme' ),
                'param_name' => 'title_right',
                'description' => __( 'You can set title right', 'beautheme' ),
          ),
          array(
                'type' => 'attach_images',
                'heading' => __( 'Image right', 'beautheme' ),
                'param_name' => 'image_right',
                'value' => '',
                'description' => __( 'Select images from media library.', 'beautheme' )
        ),
          array(
                  'type' => 'href',
                  'heading' => __( 'Link category left', 'beautheme' ),
                  'param_name' => 'url_left',
                  'description' => __( 'Link category left.', 'beautheme' )
          ),
          array(
                  'type' => 'href',
                  'heading' => __( 'See all blog link', 'beautheme' ),
                  'param_name' => 'url_right',
                  'description' => __( 'Link category right.', 'beautheme' )
          ),
      )
    )
  );
}
class WPBakeryShortCode_categoryhome extends WPBakeryShortCode {
}

add_action( 'vc_before_init', 'map_footer' );
function map_footer() {
   vc_map( array(
  'name' => __( 'Map footer', 'beautheme' ),
  'base' => 'mapfooter',
  'description' => __( 'Map footer', 'beautheme' ),
  'weight' => 5,
  'params' => array(
        array(
                'type' => 'textfield',
                'heading' => __( 'Latitude map', 'beautheme' ),
                'param_name' => 'latitude_map',
                'description' => __( 'You can set latitude map', 'beautheme' ),
            ),
        array(
                'type' => 'textfield',
                'heading' => __( 'Longitude map', 'beautheme' ),
                'param_name' => 'longitude_map',
                'description' => __( 'You can set longitude map', 'beautheme' ),
            ),
        array(
          'type' => 'attach_images',
          'heading' => __( 'Icon map', 'beautheme' ),
          'param_name' => 'icon_map',
          'value' => '',
          'description' => __( 'Select images from media library.', 'beautheme' )
        ),
      ),
    )
  );
}
class WPBakeryShortCode_mapfooter extends WPBakeryShortCode {
}

add_action( 'vc_before_init', 'subcriber_footer' );
function subcriber_footer() {
   vc_map( array(
  'name' => __( 'Subcriber footer', 'beautheme' ),
  'base' => 'subcriber',
  'description' => __( 'Subcriber footer', 'beautheme' ),
  'weight' => 5,
  'params' => array(
          array(
          'type' => 'attach_images',
          'heading' => __( 'Background subcribe', 'beautheme' ),
          'param_name' => 'bg_subcribe',
          'value' => '',
          'description' => __( 'Select images from media library.', 'beautheme' )
        ),
      ),
    )
  );
}
class WPBakeryShortCode_subcriber extends WPBakeryShortCode {
}


add_action( 'vc_before_init', 'slide_woocommerce' );
function slide_woocommerce() {

   vc_map( array(
  'name' => __( 'Silde woocommerce', 'beautheme' ),
  'base' => 'slide_product_woocommerce',
  'description' => __( 'Setting slide slide woocommerce', 'beautheme' ),
  'weight' => 5,
  'params' => array(

        array(
            'type' => 'dropdown',
            'heading' => __( 'Option', 'beautheme' ),
            'param_name' => 'option',
            'value' => array('Select...','style 1','style 2', 'style 3'),
            'group' => __( 'Slide options', 'beautheme' )
          ),
        array(
          'type' => 'checkbox',
          'heading' => __( 'Auto slide?', 'beautheme' ),
          'param_name' => 'auto_slide',
          'value' => array( __( 'Active', 'beautheme' ) => 'yes' ),
          'group' => __( 'Slide options', 'beautheme' ),
          'description' => __( 'If active please set slide speed.', 'beautheme' ),
        ),
        array(
          'type' => 'checkbox',
          'heading' => __( 'Loop items?', 'beautheme' ),
          'param_name' => 'loop_slide',
          'value' => array( __( 'Active', 'beautheme' ) => 'yes' ),
          'group' => __( 'Slide options', 'beautheme' )

        ),
        array(
          'type' => 'checkbox',
          'heading' => __( 'Lock button prev?', 'beautheme' ),
          'param_name' => 'look_prev_slide',
          'value' => array( __( 'Active', 'beautheme' ) => 'yes' ),
          'group' => __( 'Slide options', 'beautheme' )
        ),
        array(
          'type' => 'checkbox',
          'heading' => __( 'Lock button next?', 'beautheme' ),
          'param_name' => 'look_next_slide',
          'value' => array( __( 'Active', 'beautheme' ) => 'yes' ),
          'group' => __( 'Slide options', 'beautheme' )
        ),
        array(
          'type' => 'checkbox',
          'heading' => __( 'Slider mousewheel Enabled?', 'beautheme' ),
          'param_name' => 'mousewheel_slide',
          'value' => array( __( 'Active', 'beautheme' ) => 'yes' ),
          'group' => __( 'Slide options', 'beautheme' )
        ),
        array(
          'type' => 'checkbox',
          'heading' => __( 'Slider Touch Drag Enabled?', 'beautheme' ),
          'param_name' => 'drag_slide',
          'value' => array( __( 'Active', 'beautheme' ) => 'yes' ),
          'group' => __( 'Slide options', 'beautheme' )
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Title product slider', 'beautheme' ),
            'param_name' => 'title_product',
            'description' => __( 'You can set title', 'beautheme' ),
          ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Slider Total Items', 'beautheme' ),
            'param_name' => 'total_product',
            'description' => __( 'You can set Slider Total Items', 'beautheme' ),
          ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Slide Speed', 'beautheme' ),
            'param_name' => 'speed_product',
            'description' => __( 'You can set slide speed', 'beautheme' ),
          ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Space between product (px)', 'beautheme' ),
            'param_name' => 'space_product',
            'description' => __( 'You can set space', 'beautheme' ),
          ),
      ),
    )
  );
}

class WPBakeryShortCode_slide_product_woocommerce extends WPBakeryShortCode {
}

add_action( 'vc_before_init', 'testimonial_home' );
function testimonial_home() {
   vc_map( array(
        "name" => __( "Testimonial Home", "beautheme" ),
        "base" => "testimonialhome",
        'weight' => 3,
        "params" => array(
          array(
            'type' => 'dropdown',
            'heading' => __( 'Option', 'beautheme' ),
            'param_name' => 'option',
            'value' => array('Select...','style 1','style 2', 'style 3'),
            'group' => __( 'Slide options', 'beautheme' )
          ),
          array(
                'type' => 'attach_images',
                'heading' => __( 'Background images', 'beautheme' ),
                'param_name' => 'image_bg',
                'value' => '',
                'description' => __( 'Select images from media library.', 'beautheme' )
          ),
          array(
            'type' => 'checkbox',
            'heading' => __( 'Auto slide?', 'beautheme' ),
            'param_name' => 'auto_slide',
            'value' => array( __( 'Active', 'beautheme' ) => 'yes' ),
            'group' => __( 'Slide options', 'beautheme' )
          ),
          array(
          'type' => 'checkbox',
          'heading' => __( 'Loop items?', 'beautheme' ),
          'param_name' => 'loop_slide',
          'value' => array( __( 'Active', 'beautheme' ) => 'yes' ),
          'group' => __( 'Slide options', 'beautheme' )

          ),
          array(
          'type' => 'checkbox',
          'heading' => __( 'Slider Pagination at Bottom?', 'beautheme' ),
          'param_name' => 'pagination_slide',
          'value' => array( __( 'Active', 'beautheme' ) => 'yes' ),
          'group' => __( 'Slide options', 'beautheme' )
          ),
          array(
            'type' => 'textfield',
            'heading' => __( 'Slider Total Items', 'beautheme' ),
            'param_name' => 'total_product',
            'description' => __( 'You can set Slider Total Items', 'beautheme' ),
          ),
          array(
            'type' => 'textfield',
            'heading' => __( 'Number colum product', 'beautheme' ),
            'param_name' => 'colum_product',
            'description' => __( 'You can set colum', 'beautheme' ),
          ),
        ),

     ) 
  );
}
class WPBakeryShortCode_testimonialhome extends WPBakeryShortCode {
}

add_action( 'vc_before_init', 'lookbook' );
function lookbook() {
  $master_sliders = '';
    if (is_plugin_active('masterslider/masterslider.php')){
      $master_sliders = get_masterslider_names( false );
    }
   vc_map( array(
      "name" => __( "Look book", "beautheme" ),
      "base" => "lookbook",
      'weight' => 3,
      'params' => array(
        array(
          'type' => 'dropdown',
          'heading' => __( 'Option', 'beautheme' ),
          'param_name' => 'option',
          'value' => array('Style three column','Style Grid', 'Style full', 'Style two column', 'Style Masterslide'),
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'Title lookbook:', 'beautheme' ),
          'param_name' => 'title_lookbook',
          'description' => __( 'You can set title lookbook.(only for option Three column and Full)', 'beautheme' ),
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'Content lookbook:', 'beautheme' ),
          'param_name' => 'content_lookbook',
          'description' => __( 'You can set content lookbook.(only for option Three column and Full)', 'beautheme' ),
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'Id lookbook:', 'beautheme' ),
          'param_name' => 'id_lookbook',
          'description' => __( 'You can set id lookbook.', 'beautheme' ),
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'Number year background:', 'beautheme' ),
          'param_name' => 'year_lookbook',
          'description' => __( 'You can set year of background (only for option Full).', 'beautheme' ),
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'Copyright:', 'beautheme' ),
          'param_name' => 'copy_lookbook',
          'description' => __( 'You can set Copyright.', 'beautheme' ),
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'Info:', 'beautheme' ),
          'param_name' => 'info_lookbook',
          'description' => __( 'You can set info.', 'beautheme' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'List slide', 'beautheme' ),
          'param_name' => 'list_slide',
          'value' => $master_sliders,
          'description' => __( 'You can set slide lookbook (only for option lookbook Masterslide).', 'beautheme' ),
        ),
        array(
          'type' => 'attach_images',
          'heading' => __( 'Images left option Grid', 'beautheme' ),
          'param_name' => 'image_left',
          'value' => '',
          'description' => __( 'Select images from media library. (only for option Grid)', 'beautheme' )
        ),
      ),
    ) 
  );
}
class WPBakeryShortCode_lookbook extends WPBakeryShortCode {
}
?>