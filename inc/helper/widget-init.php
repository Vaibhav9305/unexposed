<?php
/* Register site widgets */
if ( ! function_exists( 'unexposed_widgets' ) ) :
    /**
     * Load widgets.
     *
     * @since 1.0
     */
    function unexposed_widgets() {
        register_widget( 'Unexposed_Author_Info' );
        register_widget( 'Unexposed_Recent_Post' );
        register_widget( 'Unexposed_Social_Menu' );
    }
endif;
add_action( 'widgets_init', 'unexposed_widgets' );
