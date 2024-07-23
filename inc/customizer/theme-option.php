<?php
/**
 * Theme Options Panel.
 *
 * @package Unexposed
 */
$default = unexposed_get_default_theme_options();
// Add Theme Options Panel.
$wp_customize->add_panel('frontpage_option_panel',
	array(
		'title'      => esc_html__('Front-Page Options', 'unexposed'),
		'priority'   => 199,
		'capability' => 'edit_theme_options',
	)
);

// Setting header_bg_scheme.
$wp_customize->add_setting('header_bg_scheme',
	array(
		'default'           => $default['header_bg_scheme'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'unexposed_sanitize_select',
	)
);
$wp_customize->add_control('header_bg_scheme',
	array(
		'label'    => esc_html__('Select Header Color Scheme', 'unexposed'),
		'section'  => 'header_image',
		'type'     => 'select',
		'choices'  => array(
			'dark-scheme' => esc_html__('Dark Scheme', 'unexposed'),
			'light-scheme' => esc_html__('Light-scheme', 'unexposed'),
		),
		'priority' => 100,
	)
);

$wp_customize->add_setting('header_content_title',
    array(
        'default'           => $default['header_content_title'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('header_content_title',
    array(
        'label'       => esc_html__('Header Content Title', 'unexposed'),
        'section'     => 'header_image',
        'type'        => 'text',
    )
);

$wp_customize->add_setting('header_content_description',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('header_content_description',
    array(
        'label'       => esc_html__('Header Content Description', 'unexposed'),
        'section'     => 'header_image',
        'type'        => 'textarea',
    )
);


$wp_customize->add_setting(
    'header_button_text',
    array(
        'default'           => $default['header_button_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'header_button_text',
    array(
        'label'    => __( 'Header Button Text', 'unexposed' ),
        'section'  => 'header_image',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'header_button_url',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'header_button_url',
    array(
        'label'           => __( 'Header Button URL:', 'unexposed' ),
        'section'         => 'header_image',
        'type'            => 'text',
        'description'     => __( 'Leave empty if you don\'t want the have a this link', 'unexposed' ),
    )
);



// Add Theme Options Panel.
$wp_customize->add_panel('theme_option_panel',
	array(
		'title'      => esc_html__('Theme Options', 'unexposed'),
		'priority'   => 200,
		'capability' => 'edit_theme_options',
	)
);
// Preloader Section.
$wp_customize->add_section('preloader_section',
    array(
        'title'      => esc_html__('Preloader Options', 'unexposed'),
        'priority'   => 10,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);

// Setting enable_preloader_option.
$wp_customize->add_setting('enable_preloader_option',
    array(
        'default' => $default['enable_preloader_option'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'unexposed_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_preloader_option',
    array(
        'label' => esc_html__('Enable Preloader Option', 'unexposed'),
        'section' => 'preloader_section',
        'type' => 'checkbox',
        'priority' => 100,
    )
);


// Cursor Section.
$wp_customize->add_section('cursor_section',
    array(
        'title'      => esc_html__('Cursor Options', 'unexposed'),
        'priority'   => 10,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);

// Setting enable_cursor_option.
$wp_customize->add_setting('enable_cursor_option',
    array(
        'default' => $default['enable_cursor_option'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'unexposed_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_cursor_option',
    array(
        'label' => esc_html__('Enable Custom Cursor', 'unexposed'),
        'section' => 'cursor_section',
        'type' => 'checkbox',
        'priority' => 100,
    )
);


/*layout management section start */
$wp_customize->add_section('theme_option_section_settings',
	array(
		'title'      => esc_html__('Layout Management', 'unexposed'),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting - read_more_button_text.
$wp_customize->add_setting('read_more_button_text',
	array(
		'default'           => $default['read_more_button_text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('read_more_button_text',
	array(
		'label'    => esc_html__('Button Text for Read More', 'unexposed'),
		'section'  => 'theme_option_section_settings',
		'type'     => 'text',
		'priority' => 170,
	)
);

/*content excerpt in global*/
$wp_customize->add_setting('excerpt_length_global',
	array(
		'default'           => $default['excerpt_length_global'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'unexposed_sanitize_positive_integer',
	)
);
$wp_customize->add_control('excerpt_length_global',
	array(
		'label'       => esc_html__('Archive Excerpt Length', 'unexposed'),
		'section'     => 'theme_option_section_settings',
		'type'        => 'number',
		'priority'    => 175,
		'input_attrs' => array('min' => 1, 'max' => 200, 'style' => 'width: 150px;'),

	)
);

$wp_customize->add_section('single_pagination_section',
    array(
        'title'      => esc_html__('Single Options', 'unexposed'),
        'priority'   => 100,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);

$wp_customize->add_setting('ed_floating_next_previous_nav',
    array(
        'default' => $default['ed_floating_next_previous_nav'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'unexposed_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_floating_next_previous_nav',
    array(
        'label' => esc_html__('Enable Floating Next/Previous Article', 'unexposed'),
        'section' => 'single_pagination_section',
        'type' => 'checkbox',
    )
);

// Pagination Section.
$wp_customize->add_section('pagination_section',
	array(
		'title'      => esc_html__('Pagination Options', 'unexposed'),
		'priority'   => 110,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting pagination_type.
$wp_customize->add_setting('pagination_type',
	array(
		'default'           => $default['pagination_type'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'unexposed_sanitize_select',
	)
);
$wp_customize->add_control('pagination_type',
	array(
		'label'    => esc_html__('Pagination Type', 'unexposed'),
		'section'  => 'pagination_section',
		'type'     => 'select',
		'choices'  => array(
			'numeric' => esc_html__('Numeric', 'unexposed'),
			'default' => esc_html__('Default (Older / Newer Post)', 'unexposed'),
		),
		'priority' => 100,
	)
);

// Footer Section.
$wp_customize->add_section('footer_section',
	array(
		'title'      => esc_html__('Footer Options', 'unexposed'),
		'priority'   => 130,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting copyright_text.
$wp_customize->add_setting('copyright_text',
	array(
		'default'           => $default['copyright_text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('copyright_text',
	array(
		'label'    => esc_html__('Footer Copyright Text', 'unexposed'),
		'section'  => 'footer_section',
		'type'     => 'text',
		'priority' => 120,
	)
);


global $unexposed_google_fonts;

$wp_customize->add_section( 'colors',
    array(
        'title'      => esc_html__( 'Color Options', 'unexposed' ),
        'priority'   => 10,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);
// Setting - primary_color.
$wp_customize->add_setting( 'primary_color',
    array(
        'default'           => $default['primary_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'primary_color',
        array(
            'label'      => esc_html__( 'Primary Color', 'unexposed' ),
            'section'    => 'colors',
            'settings'   => 'primary_color',
        ) )
);

$wp_customize->add_section('font_typo_section',
    array(
        'title'      => esc_html__('Fonts & Typography', 'unexposed'),
        'priority'   => 10,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);
// Setting - primary_font.
$wp_customize->add_setting('primary_font',
    array(
        'default'           => $default['primary_font'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'unexposed_sanitize_select',
    )
);
$wp_customize->add_control('primary_font',
    array(
        'label'    => esc_html__('Primary Font', 'unexposed'),
        'section'  => 'font_typo_section',
        'type'     => 'select',
        'choices'  => $unexposed_google_fonts,
        'priority' => 100,
    )
);

// Setting - secondary_font.
$wp_customize->add_setting('secondary_font',
    array(
        'default'           => $default['secondary_font'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'unexposed_sanitize_select',
    )
);
$wp_customize->add_control('secondary_font',
    array(
        'label'    => esc_html__('Secondary Font', 'unexposed'),
        'section'  => 'font_typo_section',
        'type'     => 'select',
        'choices'  => $unexposed_google_fonts,
        'priority' => 110,
    )
);