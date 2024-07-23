<?php
/**/
$wp_customize->add_section(
    'home_page_video_option',
    array(
        'title'      => __( 'Video Section Options', 'unexposed' ),
        'panel'      => 'frontpage_option_panel',
    )
);

$wp_customize->add_setting(
    'enable_video_section',
    array(
        'default'           => '',
        'sanitize_callback' => 'unexposed_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'enable_video_section',
    array(
        'label'   => __( 'Enable Video Section', 'unexposed' ),
        'section' => 'home_page_video_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'upload_video_image_1',
    array(
        'default'           => '',
        'sanitize_callback' => 'unexposed_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'upload_video_image_1',
        array(
            'label'           => __( 'Upload Featured Image', 'unexposed' ),
            'section'         => 'home_page_video_option',
        )
    )
);


$wp_customize->add_setting(
    'video_button_url',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'video_button_url',
    array(
        'label'           => __( 'Video Button URL:', 'unexposed' ),
        'section'         => 'home_page_video_option',
        'type'            => 'text',
        'description'     => __( 'Leave empty if you don\'t want the have a this link', 'unexposed' ),
    )
);
