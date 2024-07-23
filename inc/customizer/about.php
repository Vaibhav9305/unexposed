<?php
/**/
$wp_customize->add_section(
    'home_page_about_option',
    array(
        'title'      => __( 'About Section Options', 'unexposed' ),
        'panel'      => 'frontpage_option_panel',
    )
);

$wp_customize->add_setting(
    'enable_about_section',
    array(
        'default'           => $default['enable_about_section'],
        'sanitize_callback' => 'unexposed_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'enable_about_section',
    array(
        'label'   => __( 'Enable About Section', 'unexposed' ),
        'section' => 'home_page_about_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting('select_about_page', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'unexposed_sanitize_dropdown_pages',
    ));

$wp_customize->add_control('select_about_page', array(
        'input_attrs' => array(
            'style'      => 'width: 50px;',
        ),
        'label'           => esc_html__('Select About Page', 'unexposed'),
        'section'         => 'home_page_about_option',
        'type'            => 'dropdown-pages',
    )
);

$wp_customize->add_setting(
    'upload_about_image_1',
    array(
        'default'           => '',
        'sanitize_callback' => 'unexposed_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'upload_about_image_1',
        array(
            'label'           => __( 'Upload Featured image 1', 'unexposed' ),
            'section'         => 'home_page_about_option',
        )
    )
);


$wp_customize->add_setting(
    'about_buttom_text',
    array(
        'default'           => $default['about_buttom_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'about_buttom_text',
    array(
        'label'    => __( 'About Highlight Text', 'unexposed' ),
        'section'  => 'home_page_about_option',
        'type'     => 'text',
    )
);

$wp_customize->add_setting('about_buttom_number',
    array(
        'default'           => $default['about_buttom_number'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'unexposed_sanitize_positive_integer',
    )
);
$wp_customize->add_control('about_buttom_number',
    array(
        'label'       => esc_html__('About Highlight Number', 'unexposed'),
        'section'     => 'home_page_about_option',
        'type'        => 'number',
        'input_attrs' => array('min' => 0, 'max' => 200, 'style' => 'width: 150px;'),

    )
);

$wp_customize->add_setting(
    'about_buttom_text_2',
    array(
        'default'           => $default['about_buttom_text_2'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'about_buttom_text_2',
    array(
        'label'    => __( 'About Highlight Text - 2', 'unexposed' ),
        'section'  => 'home_page_about_option',
        'type'     => 'text',
    )
);

$wp_customize->add_setting('about_buttom_number_2',
    array(
        'default'           => $default['about_buttom_number_2'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'unexposed_sanitize_positive_integer',
    )
);
$wp_customize->add_control('about_buttom_number_2',
    array(
        'label'       => esc_html__('About Highlight Number - 2', 'unexposed'),
        'section'     => 'home_page_about_option',
        'type'        => 'number',
        'input_attrs' => array('min' => 0, 'max' => 200, 'style' => 'width: 150px;'),

    )
);


$wp_customize->add_setting(
    'about_button_text',
    array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'about_button_text',
    array(
        'label'    => __( 'About Button Text', 'unexposed' ),
        'section'  => 'home_page_about_option',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'about_button_url',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'about_button_url',
    array(
        'label'           => __( 'About Button URL:', 'unexposed' ),
        'section'         => 'home_page_about_option',
        'type'            => 'text',
        'description'     => __( 'Leave empty if you don\'t want the have a this link', 'unexposed' ),
    )
);

