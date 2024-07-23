<?php
/**
 * Metabox.
 *
 * @package Unexposed
 */

if ( ! function_exists( 'unexposed_add_meta_box' ) ) :

    /**
     * Add the Meta Box
     *
     * @since 1.0.0
     */
    function unexposed_add_meta_box() {

        $meta_box_on = array( 'post', 'page' );

        foreach ( $meta_box_on as $meta_box_as ) {
            add_meta_box(
                'unexposed-theme-settings',
                esc_html__( 'Layout Options', 'unexposed' ),
                'unexposed_render_layout_option_metabox',
                $meta_box_as,
                'side',
                'low'
            );
        }

    }

endif;

add_action( 'add_meta_boxes', 'unexposed_add_meta_box' );

if ( ! function_exists( 'unexposed_render_layout_option_metabox' ) ) :

    /**
     * Render theme settings meta box.
     *
     * @since 1.0.0
     */
    function unexposed_render_layout_option_metabox( $post, $metabox ) {

        $post_id = $post->ID;
        $unexposed_post_meta_value = get_post_meta($post_id);

        // Meta box nonce for verification.
        wp_nonce_field( basename( __FILE__ ), 'unexposed_meta_box_nonce' );
        ?>
        <div id="pb_metabox-container" class="pb-metabox-container">
            <div id="pb-metabox-layout" class="unexposed-opt-switch">
                <label class="unexposed-label-text"> <?php _e('Disable Featured Image on single page', 'unexposed') ?></label>
                <input type="checkbox" name="unexposed-meta-checkbox" id="unexposed-meta-checkbox" value="yes" <?php if (isset ($unexposed_post_meta_value['unexposed-meta-checkbox'])) checked($unexposed_post_meta_value['unexposed-meta-checkbox'][0], 'yes'); ?> />
                <label for="unexposed-meta-checkbox" class="unexposed-checkbox-label"></label>
            </div>
        </div>

        <?php
    }

endif;



if ( ! function_exists( 'unexposed_save_settings_meta' ) ) :

    /**
     * Save meta box value.
     *
     * @since 1.0.0
     *
     * @param int     $post_id Post ID.
     * @param WP_Post $post Post object.
     */
    function unexposed_save_settings_meta( $post_id, $post ) {

        // Verify nonce.
        if ( ! isset( $_POST['unexposed_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['unexposed_meta_box_nonce'], basename( __FILE__ ) ) ) {
            return; }

        // Bail if auto save or revision.
        if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
            return;
        }

        // Check the post being saved == the $post_id to prevent triggering this call for other save_post events.
        if ( empty( $_POST['post_ID'] ) || $_POST['post_ID'] != $post_id ) {
            return;
        }

        // Check permission.
        if ( 'page' === $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return; }
        } else if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        $unexposed_meta_checkbox = isset($_POST['unexposed-meta-checkbox']) ? esc_attr($_POST['unexposed-meta-checkbox']) : '';
        update_post_meta($post_id, 'unexposed-meta-checkbox', sanitize_text_field($unexposed_meta_checkbox));

    }

endif;

add_action( 'save_post', 'unexposed_save_settings_meta', 10, 2 );
