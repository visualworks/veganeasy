<?php get_header();
get_template_part( 'header-grid', 'index' ); ?>
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
                print $img;
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
                                        <span class="category-detail active"><?php echo __('Search Results','beautheme'); ?></span>
                                    </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <div class="category-name"><?php echo __('Search Results','beautheme'); ?></div>
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
                    <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-header">
                        <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
                        <div class="entry-thumbnail">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <?php endif; ?>

                        <h1 class="entry-title"><a href="<?php echo the_permalink();?>"><?php the_title(); ?></a></h1>
                    </div><!-- .entry-header -->

                    <div class="entry-content">
                        <div class="content-search" style="max-height:100px;overflow:hidden;">
                            <?php the_content(); ?>
                        </div>
                        
                        <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'beautheme' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
                    </div><!-- .entry-content -->

                    <footer class="entry-meta">
                        <?php edit_post_link( __( 'Edit', 'beautheme' ), '<span class="edit-link">', '</span>' ); ?>
                    </footer><!-- .entry-meta -->
                </article><!-- #post -->
            <?php endwhile; ?>
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
</section>
<?php get_footer(); ?>