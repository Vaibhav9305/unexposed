<?php
/**/
$wp_customize->add_section(
    'home_page_cta_option',
    array(
        'title'      => __( 'CTA Section Options', 'unexposed' ),
        'panel'      => 'frontpage_option_panel',
    )
);

$wp_customize->add_setting(
    'enable_cta_section',
    array(
        'default'           => $default['enable_cta_section'],
        'sanitize_callback' => 'unexposed_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'enable_cta_section',
    array(
        'label'   => __( 'Enable CTA Section', 'unexposed' ),
        'section' => 'home_page_cta_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'cta_post_title',
    array(
        'default'           => $default['cta_post_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'cta_post_title',
    array(
        'label'    => __( 'CTA Posts Title', 'unexposed' ),
        'section'  => 'home_page_cta_option',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'cta_post_description',
    array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'cta_post_description',
    array(
        'label'    => __( 'CTA Posts Description', 'unexposed' ),
        'section'  => 'home_page_cta_option',
        'type'     => 'textarea',
    )
);

$wp_customize->add_setting(
    'upload_cta_image_1',
    array(
        'default'           => '',
        'sanitize_callback' => 'unexposed_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'upload_cta_image_1',
        array(
            'label'           => __( 'Upload Featured image 1', 'unexposed' ),
            'section'         => 'home_page_cta_option',
        )
    )
);


$wp_customize->add_setting(
    'cta_button_text',
    array(
        'default'           => $default['cta_button_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'cta_button_text',
    array(
        'label'    => __( 'CTA Button Text', 'unexposed' ),
        'section'  => 'home_page_cta_option',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'cta_button_url',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'cta_button_url',
    array(
        'label'           => __( 'CTA Button URL:', 'unexposed' ),
        'section'         => 'home_page_cta_option',
        'type'            => 'text',
        'description'     => __( 'Leave empty if you don\'t want the have a this link', 'unexposed' ),
    )
);
