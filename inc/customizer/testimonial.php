<?php
/**/
$wp_customize->add_section(
    'home_page_testimonial_option',
    array(
        'title'      => __( 'Testimonial Section Options', 'unexposed' ),
        'panel'      => 'frontpage_option_panel',
    )
);

$wp_customize->add_setting(
    'enable_testimonial_section',
    array(
        'default'           => $default['enable_testimonial_section'],
        'sanitize_callback' => 'unexposed_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'enable_testimonial_section',
    array(
        'label'   => __( 'Enable Testimonial Section', 'unexposed' ),
        'section' => 'home_page_testimonial_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'testimonial_post_title',
    array(
        'default'           => $default['testimonial_post_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'testimonial_post_title',
    array(
        'label'    => __( 'Testimonial Section Title', 'unexposed' ),
        'section'  => 'home_page_testimonial_option',
        'type'     => 'text',
    )
);


$wp_customize->add_setting(
    'testimonial_post_description',
    array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'testimonial_post_description',
    array(
        'label'    => __( 'Testimonial Section Description', 'unexposed' ),
        'section'  => 'home_page_testimonial_option',
        'type'     => 'textarea',
    )
);


$wp_customize->add_setting(
    'upload_testimonial_image_1',
    array(
        'default'           => '',
        'sanitize_callback' => 'unexposed_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'upload_testimonial_image_1',
        array(
            'label'           => __( 'Upload Background Image', 'unexposed' ),
            'section'         => 'home_page_testimonial_option',
        )
    )
);

for ( $i=1; $i <= 5 ; $i++ ) {
    $wp_customize->add_setting( 'testimonial_select_page_'. $i, array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'unexposed_sanitize_dropdown_pages',
        
    ) );

    $wp_customize->add_control( 'testimonial_select_page_'. $i, array(
        'input_attrs'       => array(
            'style'           => 'width: 50px;'
            ),
        'label'             => __( 'Testimonial Page', 'unexposed' ) . ' - ' . $i ,
        'section'  => 'home_page_testimonial_option',
        'type'              => 'dropdown-pages',
        )
    );
}
