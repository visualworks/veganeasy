<?php get_header();?>
<?php get_template_part( 'header-grid'); ?>
<section id="main-page" style="margin-top:0;">
        <article id="organic-header-grid">
            <div class="row">
                <div class="fix-cover">
                <?php 
                echo get_the_post_thumbnail( $id, 'full' );
                ?>
            </div>
                <div class="row" id="bg-cover">
                    <div class="container"> 
                        <div class="cover-top">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="category-list blog-left">
                                        <?php the_breadcrumb(); ?>
                                    </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <div class="category-name"><?php _e('Blog','beautheme') ?></div>
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


<?php get_footer(); ?>