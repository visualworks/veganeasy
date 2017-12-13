<?php get_header();
get_template_part( 'header-grid', 'index' ); ?>
<?php 
if ( class_exists( 'AjaxLoadMore' ) ) {
?>
    <section id="main-page">
        <article id="organic-header-grid">
            <div class="row">
                <div class="fix-cover">
                <?php 
                    $args = array(
                    'post_type' => 'page',
                    'post_status' => 'publish'
                ); 
                $pages = get_pages($args); 
                $img = get_the_post_thumbnail( $id, 'postfull-thumbnail');
                echo esc_attr($img);
                if($img==""){
                    if ( class_exists( 'ReduxFramework' ) ) {
                        global $redux_demo;
                        echo '<img src="'.$redux_demo['media-no-url']['url'].'">;';
                    }
                }
                ?>
            </div>
                <div class="row" id="bg-cover">
                    <div class="container"> 
                        <div class="cover-top">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="category-list blog-left">
                                        <?php the_breadcrumb(); ?>
                                        <span class="category-detail active">
                                            <?php
                                        if ( is_tag() ) :
                                                printf( __('%1$s','beautheme'), single_tag_title( '', true ) );
                                        elseif ( is_category() ) :
                                                printf( __('%1$s','beautheme'), single_cat_title( '', false ) );
                                        elseif ( is_day() ) :
                                                printf( __('%1$s','beautheme'), the_time('l, F j, Y') );
                                        elseif ( is_month() ) :
                                                printf( __('%1$s','beautheme'), the_time('F Y') );
                                        elseif ( is_year() ) :
                                                printf( __('%1$s','beautheme'), the_time('Y') );
                                        endif;
                                         ?>
                                        </span>
                                    </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <div class="category-name">
                                    <?php
                                        if ( is_tag() ) :
                                                printf( __('%1$s','beautheme'), single_tag_title( '', true ) );
                                        elseif ( is_category() ) :
                                                printf( __('%1$s','beautheme'), single_cat_title( '', false ) );
                                        elseif ( is_day() ) :
                                                printf( __('%1$s','beautheme'), the_time('l, F j, Y') );
                                        elseif ( is_month() ) :
                                                printf( __('%1$s','beautheme'), the_time('F Y') );
                                        elseif ( is_year() ) :
                                                printf( __('%1$s','beautheme'), the_time('Y') );
                                        endif;
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <article id="organic-content-grid" class="blog-left">
            <div class="container">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="sidebar-blog">
                        <?php 
                        get_sidebar(); 
                        ?>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div id="content-blog-full">
                      <?php
                      $year = get_the_date('Y');
                        $month = get_the_date('m');
                        $day = get_the_date('d');
                      if(is_category()){
                        echo do_shortcode( '[ajax_load_more repeater="template_1" post_type="post" category="'.single_cat_title( '', false ).'"posts_per_page="2" scroll="false" button_label="LOAD MORE"]' );
                      }
                      elseif ( is_tag()){
                        echo do_shortcode( '[ajax_load_more repeater="template_1" post_type="post" tag="'.single_tag_title( '', false ).'" posts_per_page="2" scroll="false" button_label="LOAD MORE"]' );
                      
                      }
                      elseif(is_year()){
                            echo do_shortcode('[ajax_load_more  repeater="template_1" post_type="post" posts_per_page="2"  year="' . $year . '" scroll="false" button_label="LOAD MORE"]'); 
                        }  
                        elseif(is_month()){
                            echo do_shortcode('[ajax_load_more  repeater="template_1" post_type="post" posts_per_page="2"  year="' . $year . '" month="' . $month . '" scroll="false" button_label="LOAD MORE"]'); 
                        }  
                        elseif(is_day()){
                            echo do_shortcode('[ajax_load_more  repeater="template_1" post_type="post" posts_per_page="2"  year="' . $year . '" month="' . $month . '" day="' . $day . '" scroll="false" button_label="LOAD MORE"]'); 
                        }           
                      ?>
                    </div>  
                </div>
            </div>
        </article>
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
    </section><!-- #primary -->
<?php }
else {
?>
<section id="main-page">
        <article id="organic-header-grid">
            <div class="row">
                <div class="fix-cover">
                <?php 
                    $args = array(
                    'post_type' => 'page',
                    'post_status' => 'publish'
                ); 
                $pages = get_pages($args); 
                $img = get_the_post_thumbnail( $id, 'postfull-thumbnail');
                echo esc_attr($img);
                if($img==""){
                    global $redux_demo;
                    
                    echo '<img src="'.$redux_demo['media-no-url']['url'].'">;';
                }
                ?>
            </div>
                <div class="row" id="bg-cover">
                    <div class="container"> 
                        <div class="cover-top">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="category-list blog-left">
                                        <?php the_breadcrumb(); ?>
                                        <span class="category-detail active">
                                            <?php
                                        if ( is_tag() ) :
                                                printf( __('%1$s','beautheme'), single_tag_title( '', true ) );
                                        elseif ( is_category() ) :
                                                printf( __('%1$s','beautheme'), single_cat_title( '', false ) );
                                        elseif ( is_day() ) :
                                                printf( __('%1$s','beautheme'), the_time('l, F j, Y') );
                                        elseif ( is_month() ) :
                                                printf( __('%1$s','beautheme'), the_time('F Y') );
                                        elseif ( is_year() ) :
                                                printf( __('%1$s','beautheme'), the_time('Y') );
                                        endif;
                                         ?>
                                        </span>
                                    </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <div class="category-name">
                                    <?php
                                        if ( is_tag() ) :
                                                printf( __('%1$s','beautheme'), single_tag_title( '', true ) );
                                        elseif ( is_category() ) :
                                                printf( __('%1$s','beautheme'), single_cat_title( '', false ) );
                                        elseif ( is_day() ) :
                                                printf( __('%1$s','beautheme'), the_time('l, F j, Y') );
                                        elseif ( is_month() ) :
                                                printf( __('%1$s','beautheme'), the_time('F Y') );
                                        elseif ( is_year() ) :
                                                printf( __('%1$s','beautheme'), the_time('Y') );
                                        endif;
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <article id="organic-content-grid" class="blog-left">
            <div class="container">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="sidebar-blog">
                        <?php 
                        get_sidebar(); 
                        ?>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div id="content-blog-full">
                        <?php if ( have_posts() ) : ?>

                        <?php /* The loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'content', get_post_format() ); ?>
                        <?php endwhile; ?>

                    <?php else : ?>
                        <?php get_template_part( 'content', 'none' ); ?>
                    <?php endif; ?>
                    </div>  
                </div>
            </div>
        </article>
        <article id="organic-send-mail">
            <div class="container">
                <?php 
                    if ( is_active_sidebar( 'email-subscribe' ) ){
                        if ( is_plugin_active( 'email-subscribers/email-subscribers.php' ) ) {
                            if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('email-subscribe') ) ;
                        }
                    }
                ?>
            </div>
        </article>
    </section><!-- #primary -->
<?php } ?>
<?php get_footer(); ?>