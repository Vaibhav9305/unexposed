<?php
/**/
$wp_customize->add_section(
    'home_page_category_option',
    array(
        'title'      => __( 'Categories Section Options', 'unexposed' ),
        'panel'      => 'frontpage_option_panel',
    )
);

$wp_customize->add_setting(
    'enable_category_section',
    array(
        'default'           => $default['enable_category_section'],
        'sanitize_callback' => 'unexposed_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'enable_category_section',
    array(
        'label'   => __( 'Enable Category Section', 'unexposed' ),
        'section' => 'home_page_category_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'category_post_sub_title',
    array(
        'default'           => $default['category_post_sub_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'category_post_sub_title',
    array(
        'label'    => __( 'Category Posts Sub Title', 'unexposed' ),
        'section'  => 'home_page_category_option',
        'type'     => 'text',
    )
);


$wp_customize->add_setting(
    'category_post_title',
    array(
        'default'           => $default['category_post_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'category_post_title',
    array(
        'label'    => __( 'Category Section Title', 'unexposed' ),
        'section'  => 'home_page_category_option',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'number_of_category',
    array(
        'default'           => $default['number_of_category'],
        'sanitize_callback' => 'unexposed_sanitize_select',
    )
);
$wp_customize->add_control(
    'number_of_category',
    array(
        'label'       => __( 'Number Of Category', 'unexposed' ),
        'section'     => 'home_page_category_option',
        'type'        => 'select',
        'choices'     => array(
            '3' => __( '3', 'unexposed' ),
            '4' => __( '4', 'unexposed' ),
        ),
    )
);

for ( $i=1; $i <=  unexposed_get_option( 'number_of_category' ) ; $i++ ) {
    // $wp_customize->add_setting('select_featured_cat_'. $i,
    //     array(
    //         'default'           => '',
    //         'capability'        => 'edit_theme_options',
    //         'sanitize_callback' => 'absint',
    //     )
    // );
    // $wp_customize->add_control(new Unexposed_Dropdown_Taxonomies_Control($wp_customize, 'select_featured_cat_'. $i,
    //     array(
    //         'label'           => esc_html__('Category for slider - ', 'unexposed'). $i,
    //         'description'     => esc_html__('Select category to be shown on tab ', 'unexposed'),
    //         'section'         => 'home_page_category_option',
    //         'type'            => 'dropdown-taxonomies',
    //         'taxonomy'        => 'category',
    //     ))
    // );


    $wp_customize->add_setting('select_featured_cat_'. $i,
        array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(new Unexposed_Dropdown_Taxonomies_Control($wp_customize, 'select_featured_cat_'. $i,
            array(
                'label'           => esc_html__('Category for slider', 'unexposed'),
                'description'     => esc_html__('Select category to be shown on tab ', 'unexposed'),
                'section'         => 'home_page_category_option',
                'type'            => 'dropdown-taxonomies',
                'taxonomy'        => 'category',

            )));
}

