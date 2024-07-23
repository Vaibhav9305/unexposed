<?php
/**
 * slider section
 *
 * @package Unexposed
 */

$default = unexposed_get_default_theme_options();

// Slider Main Section.
$wp_customize->add_section('slider_section_settings',
	array(
		'title'      => esc_html__('Slider Options', 'unexposed'),
		'capability' => 'edit_theme_options',
		'panel'      => 'frontpage_option_panel',
	)
);

// Setting - show_slider_section.
$wp_customize->add_setting('show_slider_section',
	array(
		'default'           => $default['show_slider_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'unexposed_sanitize_checkbox',
	)
);
$wp_customize->add_control('show_slider_section',
	array(
		'label'    => esc_html__('Enable Slider', 'unexposed'),
		'section'  => 'slider_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

/*No of Slider*/
$wp_customize->add_setting('number_of_home_slider',
	array(
		'default'           => $default['number_of_home_slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'unexposed_sanitize_select',
	)
);
$wp_customize->add_control('number_of_home_slider',
	array(
		'label'       => esc_html__('Select no of slider', 'unexposed'),
		'description' => esc_html__('If you are using selection "from page" option please refresh to get actual no of page', 'unexposed'),
		'section'     => 'slider_section_settings',
		'choices'     => array(
			'1'          => esc_html__('1', 'unexposed'),
			'2'          => esc_html__('2', 'unexposed'),
			'3'          => esc_html__('3', 'unexposed'),
			'4'          => esc_html__('4', 'unexposed'),
			'5'          => esc_html__('5', 'unexposed'),
			'6'          => esc_html__('6', 'unexposed'),
			'7'          => esc_html__('7', 'unexposed'),
			'8'          => esc_html__('8', 'unexposed'),
			'9'          => esc_html__('9', 'unexposed'),
		),
		'type'     => 'select',
		'priority' => 105,
	)
);

// Setting - show_slider_content_section.
$wp_customize->add_setting('show_slider_content_section',
	array(
		'default'           => $default['show_slider_content_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'unexposed_sanitize_checkbox',
	)
);
$wp_customize->add_control('show_slider_content_section',
	array(
		'label'    => esc_html__('Enable Slider Content', 'unexposed'),
		'section'  => 'slider_section_settings',
		'type'     => 'checkbox',
		'priority' => 105,
	)
);

/*content excerpt in Slider*/
$wp_customize->add_setting('number_of_content_home_slider',
	array(
		'default'           => $default['number_of_content_home_slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'unexposed_sanitize_positive_integer',
	)
);
$wp_customize->add_control('number_of_content_home_slider',
	array(
		'label'       => esc_html__('Select no words of slider', 'unexposed'),
		'section'     => 'slider_section_settings',
		'type'        => 'number',
		'priority'    => 110,
		'input_attrs' => array('min' => 0, 'max' => 200, 'style' => 'width: 150px;'),

	)
);

// Setting - select_slider_from.
$wp_customize->add_setting('select_slider_from',
	array(
		'default'           => $default['select_slider_from'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'unexposed_sanitize_select',
	)
);
$wp_customize->add_control('select_slider_from',
	array(
		'label'          => esc_html__('Select Slider From', 'unexposed'),
		'section'        => 'slider_section_settings',
		'type'           => 'select',
		'choices'        => array(
			'from-page'     => esc_html__('Page', 'unexposed'),
			'from-category' => esc_html__('Category', 'unexposed')
		),
		'priority' => 110,
	)
);

for ($i = 1; $i <= unexposed_get_option('number_of_home_slider'); $i++) {
	$wp_customize->add_setting('select_page_for_slider_'.$i, array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'unexposed_sanitize_dropdown_pages',
		));

	$wp_customize->add_control('select_page_for_slider_'.$i, array(
			'input_attrs' => array(
				'style'      => 'width: 50px;',
			),
			'label'           => esc_html__('Slider From Page', 'unexposed').' - '.$i,
			'priority'        => '120'.$i,
			'section'         => 'slider_section_settings',
			'type'            => 'dropdown-pages',
			'priority'        => 120,
			'active_callback' => 'unexposed_is_select_page_slider',
		)
	);
}

// Setting - drop down category for slider.
$wp_customize->add_setting('select_category_for_slider',
	array(
		'default'           => $default['select_category_for_slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(new Unexposed_Dropdown_Taxonomies_Control($wp_customize, 'select_category_for_slider',
		array(
			'label'           => esc_html__('Category for slider', 'unexposed'),
			'description'     => esc_html__('Select category to be shown on tab ', 'unexposed'),
			'section'         => 'slider_section_settings',
			'type'            => 'dropdown-taxonomies',
			'taxonomy'        => 'category',
			'priority'        => 130,
			'active_callback' => 'unexposed_is_select_cat_slider',

		)));

$wp_customize->add_setting('slider_button_text',
    array(
        'default'           => $default['slider_button_text'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('slider_button_text',
    array(
        'label'    => esc_html__('Slider Button Text', 'unexposed'),
        'section'  => 'slider_section_settings',
        'type'     => 'text',
        'priority' => 140,
    )
);

// Setting - slider_text_color.
$wp_customize->add_setting('slider_text_color',
    array(
        'default'           => $default['slider_text_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control('slider_text_color',
    array(
        'label'    => esc_html__('Slider Text Color', 'unexposed'),
        'section'  => 'slider_section_settings',
        'type'     => 'color',
        'priority' => 140,
    )
);

// Setting - slider_text_bg_color.
$wp_customize->add_setting('slider_text_bg_color',
    array(
        'default'           => $default['slider_text_bg_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control('slider_text_bg_color',
    array(
        'label'    => esc_html__('Slider Background Color', 'unexposed'),
        'section'  => 'slider_section_settings',
        'type'     => 'color',
        'priority' => 140,
    )
);

