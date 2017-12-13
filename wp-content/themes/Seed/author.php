<?php get_header(); ?>
 
<div id="content">
        <div class="author-box"><?php
                //Show avatar author
                echo '<div class="author-avatar">'. get_avatar( get_the_author_meta( 'ID' ) ) . '</div>';
 
                //Show name author
                printf( '<h3>'. __( 'Posts by %1$s', 'beautheme' ) . '</h3>', get_the_author() );
 
                //Show description author
                echo '<p>'. get_the_author_meta( 'description' ) . '</p>';
 
                
                if ( get_the_author_meta( 'user_url' ) ) : printf( __('<a href="%1$s" title="Visit to %2$s website">Visit to my website</a>', 'beautheme'),
                        get_the_author_meta( 'user_url' ), get_the_author() );
                endif;
        ?></div>
        <section id="main-content">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content', get_post_format() ); ?>
                        
                <?php endwhile; ?>
                <?php else : ?>
                        <?php get_template_part( 'content', 'none' ); ?>
                <?php endif; ?>
        </section>
        <section id="sidebar">
                <?php 
                    get_sidebar(); 
                ?>
        </section>
 
</div>
 
<?php get_footer(); ?>