<?php
/**
 * Default theme options.
 *
 * @package Unexposed
 */

if (!function_exists('unexposed_get_default_theme_options')):

/**
 * Get default theme options
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
function unexposed_get_default_theme_options() {

	$defaults = array();

    $defaults['enable_featured_blog'] = 0;
    $defaults['select_category_for_featured_blog'] = 0;
	$defaults['featured_blog_title']    = esc_html__('You May Also Like', 'unexposed');

    $defaults['show_slider_section']           = 1;
    $defaults['number_of_home_slider']         = 5;
    $defaults['show_slider_content_section']         = 0;
    $defaults['number_of_content_home_slider'] = 30;
    $defaults['slider_button_text']            =  __('Learn More','unexposed');
    $defaults['select_slider_from']            = 'from-category';
    $defaults['select-page-for-slider']        = 0;
    $defaults['select_category_for_slider']    = 0;
	$defaults['slider_text_bg_color'] = '#000000';
	$defaults['slider_text_color'] = '#fff';

	// category
    $defaults['enable_category_section'] 	   = 0;
	$defaults['category_post_title']           = __('Featured Category','unexposed');
	$defaults['category_post_sub_title']     = '';
	$defaults['number_of_category']     	   = 4;

	// testimonial
    $defaults['enable_featured_post'] 	   = 0;

    // about page
    $defaults['enable_about_section'] 	   = 0;
    $defaults['about_buttom_text'] 	   = __('customer satisfaction','unexposed');
    $defaults['about_buttom_number'] 	   = 100;    
    $defaults['about_buttom_text_2'] 	   = __('photography session','unexposed');
    $defaults['about_buttom_number_2'] 	   = 350;

	// testimonial
    $defaults['enable_testimonial_section'] 	   = 0;
    $defaults['testimonial_post_title'] 	   = __('Our Testimonial','unexposed');
    $defaults['enable_cta_section'] 	   = 0;
    $defaults['cta_post_title'] 	   = __('Feel free to connect','unexposed');
    $defaults['cta_button_text'] 	   = __('Contact Us','unexposed');

	$defaults['header_bg_scheme']            = 'dark-scheme';
	$defaults['header_content_title']            = __('Welcome to unExposed','unexposed');
	$defaults['header_button_text']            = __('Contact Us','unexposed');

    $defaults['ed_floating_next_previous_nav']          = 0;


	$defaults['enable_instagram']               = 0;
	$defaults['']           = __('Check Our Instagram','unexposed');
	$defaults['instagram_title_text']           = __('View more in Instagram','unexposed');
	$defaults['instagram_user_name']            = '';
	$defaults['instagram_user_api']            = '';
	$defaults['number_of_instagram']            = 10;


    /*layout*/
	$defaults['read_more_button_text']    = esc_html__('Continue Reading', 'unexposed');
	$defaults['excerpt_length_global']    = 50;
	$defaults['pagination_type']          = 'numeric';
	$defaults['copyright_text']           = esc_html__('Copyright All rights reserved', 'unexposed');


	$defaults['primary_color'] = '#F44336';
	$defaults['primary_font']      = 'Pontano+Sans';
	$defaults['secondary_font']    = 'Raleway:400,300,500,600,700,900';

	$defaults['enable_preloader_option']               = 1;
	$defaults['enable_cursor_option']               = 1;
	// Pass through filter.
	$defaults = apply_filters('unexposed_filter_default_theme_options', $defaults);

	return $defaults;

}

endif;