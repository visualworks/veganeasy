<?php
        if ( is_active_sidebar('grid-sidebar') ) {
                dynamic_sidebar( 'maigrid-sidebar' );
        } else {
                _e('This is widget area. Go to Appearance -> Widgets to add some widgets.', 'origanics');
        }
?>