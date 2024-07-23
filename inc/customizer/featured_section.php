<?php
/**
* Homepage featured Settings.
*
* @package Unexposed
*/

// Homepage Featured post section settings.
$wp_customize->add_section( 'homepage_featured_post_Section',
    array(
    'title'      => esc_html__( 'Featured Work Section Settings', 'unexposed' ),
    'capability' => 'edit_theme_options',
    'panel'      => 'frontpage_option_panel',
    )
);
// Setting - enable_featured_post.
$wp_customize->add_setting('enable_featured_post',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'unexposed_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_featured_post',
    array(
        'label'    => esc_html__('Enable Featured Work', 'unexposed'),
        'section'  => 'homepage_featured_post_Section',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting('featured_post_title',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('featured_post_title',
    array(
        'label'       => esc_html__('Featured Work Section Title', 'unexposed'),
        'section'     => 'homepage_featured_post_Section',
        'type'        => 'text',
    )
);

$wp_customize->add_setting(
    'upload_featured_bg_image',
    array(
        'default'           => '',
        'sanitize_callback' => 'unexposed_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'upload_featured_bg_image',
        array(
            'label'           => __( 'Upload Background Image', 'unexposed' ),
            'section'         => 'homepage_featured_post_Section',
        )
    )
);
$wp_customize->add_setting('select_category_for_featured_post',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(new Unexposed_Dropdown_Taxonomies_Control($wp_customize, 'select_category_for_featured_post',
    array(
        'label'       => esc_html__( ' Section Work Category', 'unexposed' ),
        'description'     => esc_html__('Select category to be shown on work section ', 'unexposed'),
        'section'         => 'homepage_featured_post_Section',
        'type'            => 'dropdown-taxonomies',
        'taxonomy'        => 'category',
    )));