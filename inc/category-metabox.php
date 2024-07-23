<?php
/**
 * Add custom fields to post categories.
 *
 * @package WordPress
 * @subpackage Unexposed
 * @since Unexposed 1.0.0
 */

// Add custom fields to the category add form
function unexposed_add_category_fields() {
    ?>
    <div class="form-field term-thumbnail-wrap">
        <label><?php esc_html_e( 'Thumbnail', 'unexposed' ); ?></label>
            <div id="post_cat_thumbnail" style="float: left; margin-right: 10px;">
                <img width="60px" height="60px" />
            </div>
        <div style="line-height: 60px;">
            <input type="hidden" id="post_cat_thumbnail_id" name="post_cat_thumbnail_id" />
            <button type="button" class="upload_image_button button"><?php esc_html_e( 'Upload/Add image', 'unexposed' ); ?></button>
            <button type="button" class="remove_image_button button"><?php esc_html_e( 'Remove image', 'unexposed' ); ?></button>
        </div>
        <div class="clear"></div>
    </div>
    <?php
}
add_action( 'category_add_form_fields', 'unexposed_add_category_fields' );

// Add custom fields to the category edit form
function unexposed_edit_category_fields( $term ) {
    $thumbnail_id = absint( get_term_meta( $term->term_id, 'thumbnail_id', true ) );
    $image = $thumbnail_id ? wp_get_attachment_thumb_url( $thumbnail_id ) : '';
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label><?php esc_html_e( 'Thumbnail', 'unexposed' ); ?></label></th>
        <td>
            <?php if ($image) { ?>
                <div id="post_cat_thumbnail" style="float: left; margin-right: 10px;">
                    <img src="<?php echo esc_url( $image ); ?>" width="60px" height="60px" />
                </div>
            <?php } ?>

            <div style="line-height: 60px;">
                <input type="hidden" id="post_cat_thumbnail_id" name="post_cat_thumbnail_id" value="<?php echo $thumbnail_id; ?>" />
                <button type="button" class="upload_image_button button"><?php esc_html_e( 'Upload/Add image', 'unexposed' ); ?></button>
                <button type="button" class="remove_image_button button"><?php esc_html_e( 'Remove image', 'unexposed' ); ?></button>
            </div>
            <div class="clear"></div>
        </td>
    </tr>
    <?php
}
add_action( 'category_edit_form_fields', 'unexposed_edit_category_fields', 10 );

// Save custom category fields
function unexposed_save_category_fields( $term_id ) {
    if ( isset( $_POST['post_cat_thumbnail_id'] ) ) {
        update_term_meta( $term_id, 'thumbnail_id', absint( $_POST['post_cat_thumbnail_id'] ) );
    }

}
add_action( 'created_category', 'unexposed_save_category_fields', 10, 3 );
add_action( 'edited_category', 'unexposed_save_category_fields', 10, 3 );

// Enqueue scripts and styles for category fields
function unexposed_admin_category_meta_js( $hook ) {
    if ( ! in_array( $hook, array( 'edit-tags.php', 'term.php' ), true ) ) {
        return;
    }

    wp_enqueue_media();
    wp_enqueue_script( 'unexposed_post_cat_js', get_template_directory_uri() . '/assets/js/category-meta-box.js', true );

    wp_localize_script(
        'unexposed_post_cat_js',
        'WPINTERFACEADMIN',
        array(
            'title'   => __( 'Choose an image', 'unexposed' ),
            'btn_txt' => __( 'Use image', 'unexposed' ),
        )
    );
}
add_action( 'admin_enqueue_scripts', 'unexposed_admin_category_meta_js' );

// Display category image in admin columns
function unexposed_post_cat_column_head( $columns ) {
    $new_columns = array();

    if ( isset( $columns['cb'] ) ) {
        $new_columns['cb'] = $columns['cb'];
        unset( $columns['cb'] );
    }

    $new_columns['thumb'] = __( 'Image', 'unexposed' );

    return array_merge( $new_columns, $columns );
}
add_filter( 'manage_edit-category_columns', 'unexposed_post_cat_column_head' );

function unexposed_post_cat_column_body( $columns, $column, $id ) {
    if ( 'thumb' === $column ) {
        $thumbnail_id = get_term_meta( $id, 'thumbnail_id', true );
        $image = $thumbnail_id ? wp_get_attachment_thumb_url( $thumbnail_id ) : '';
        $columns .= '<img src="' . esc_url( $image ) . '" alt="' . esc_attr__( 'Thumbnail', 'unexposed' ) . '" class="wp-post-image" height="48" width="48" />';
    }
    return $columns;
}
add_filter( 'manage_category_custom_column', 'unexposed_post_cat_column_body', 10, 3 );
