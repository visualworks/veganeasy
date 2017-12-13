<?php
        if ( is_single() ) :
                echo '<div class="author-box">';
                        echo '<div class="author-avatar">'. get_avatar( get_the_author_meta( 'ID' ) ) . '</div>';
                        printf( '<h3>'. __( 'Written By %1$s', 'beautheme' ) . '</h3>',
                                '<a href="' . get_author_posts_url( get_the_author_meta('ID') ) . '">' . get_the_author() . '</a>' );
                        echo '<p>'. get_the_author_meta( 'description' ) . '</p>';
                echo '</div>';
        endif;
        ?>