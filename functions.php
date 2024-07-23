<?php
/**
 * Unexposed functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Unexposed
 */

if (!function_exists('unexposed_setup')):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function unexposed_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Unexposed, use a find and replace
	 * to change 'unexposed' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('unexposed', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(array(
			'mainnav' => esc_html__('Primary Menu', 'unexposed'),
			'social'  => __('Social Menu', 'unexposed'),
		));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

	// Set up the WordPress core custom background feature.
	add_theme_support('custom-background', apply_filters('unexposed_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)));

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support('custom-logo', array(
			'flex-width'  => true,
			'flex-height' => true,
		));

    /**
     * Add theme support for gutenberg block
     *
     */
    add_theme_support( 'align-wide' );

    add_theme_support( 'responsive-embeds' );

    add_theme_support( 'wp-block-styles' );


}
endif;
add_action('after_setup_theme', 'unexposed_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function unexposed_content_width() {
	$GLOBALS['content_width'] = apply_filters('unexposed_content_width', 640);
}
add_action('after_setup_theme', 'unexposed_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function unexposed_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Footer Column 1', 'unexposed'),
        'id' => 'footer-col-1',
        'description' => esc_html__('Displays items on footer section.', 'unexposed'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Column 2', 'unexposed'),
        'id' => 'footer-col-2',
        'description' => esc_html__('Displays items on footer section.', 'unexposed'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Column 3', 'unexposed'),
        'id' => 'footer-col-3',
        'description' => esc_html__('Displays items on footer section.', 'unexposed'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'unexposed_widgets_init');

/**
 * Add Google Font
 */
if (!function_exists('unexposed_fonts_url')):

/**
 * Return fonts URL.
 *
 * @since 1.0.0
 * @return string Fonts URL.
 */
function unexposed_fonts_url() {

	$fonts_url = '';
	$fonts = array();

	$unexposed_primary_font = unexposed_get_option('primary_font');
	$unexposed_secondary_font = unexposed_get_option('secondary_font');

	$unexposed_fonts = array();
	$unexposed_fonts[] = $unexposed_primary_font;
	$unexposed_fonts[] = $unexposed_secondary_font;

	$unexposed_fonts_stylesheet = '//fonts.googleapis.com/css?family=';

	$i = 0;
	for ($i = 0; $i < count($unexposed_fonts); $i++) {

	    if ('off' !== sprintf(_x('on', '%s font: on or off', 'unexposed'), $unexposed_fonts[$i])) {
	        $fonts[] = $unexposed_fonts[$i];
	    }

	}


    if ($fonts) {
        $fonts_url = add_query_arg(array(
            'family' => urldecode(implode('|', $fonts)),
            'display' => 'swap',
        ), 'https://fonts.googleapis.com/css');

    }

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function unexposed_scripts() {
	$min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG?'':'.min';

    $theme_version = wp_get_theme()->get( 'Version' );
    $fonts_url = unexposed_fonts_url();
    if( $fonts_url ){
        
        require_once get_theme_file_path( 'assets/css/wptt-webfont-loader.php' );
        wp_enqueue_style(
            'unexposed-google-fonts',
            wptt_get_webfont_url( $fonts_url ),
            array(),
            $theme_version
        );
    }

	wp_enqueue_style('jquery-slick', get_template_directory_uri().'/assets/slick/css/slick'.$min.'.css');
	wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/magnific-popup/magnific-popup.css');

	wp_enqueue_style('unexposed-style', get_stylesheet_uri(), array(), $theme_version );
    wp_style_add_data('unexposed-style', 'rtl', 'replace');

	wp_enqueue_script('unexposed-navigation', get_template_directory_uri().'/js/navigation.js', array('jquery'), '', true);

	wp_enqueue_script('unexposed-skip-link-focus-fix', get_template_directory_uri().'/js/skip-link-focus-fix.js', array(), '20151215', true);

	wp_enqueue_script('jquery-slick', get_template_directory_uri().'/assets/slick/js/slick'.$min.'.js', array('jquery'), '', true);
	wp_enqueue_script('jquery-magnific-popup', get_template_directory_uri() . '/assets/magnific-popup/jquery.magnific-popup' . $min . '.js', array('jquery'), '', true);
    wp_enqueue_script('theiaStickySidebar', get_template_directory_uri() . '/assets/theiaStickySidebar/theia-sticky-sidebar'.$min.'.js', array('jquery'), '', true);
	wp_enqueue_script('unexposed-script', get_template_directory_uri().'/js/script.js', array('jquery'), '', 1);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

    $custom_css = unexposed_custom_css();
    if ( $custom_css ) {
        wp_add_inline_style( 'unexposed-style', $custom_css );
    }

}
add_action('wp_enqueue_scripts', 'unexposed_scripts');

/**
 * Enqueue admin scripts and styles.
 */
function unexposed_admin_scripts($hook)
{
    wp_enqueue_style('unexposed-admin-style', get_template_directory_uri() . '/assets/css/admin-style.css');
    wp_enqueue_script('unexposed-admin-script', get_template_directory_uri() . '/assets/js/admin-page.js', array('jquery'), '', 1);

    if ('widgets.php' === $hook) {
        wp_enqueue_media();
        wp_enqueue_script('unexposed-widgets', get_template_directory_uri() . '/assets/js/widgets.js', array('jquery','wp-util'), '1.0.0', true);
    }
}

add_action('admin_enqueue_scripts', 'unexposed_admin_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory().'/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory().'/inc/template-tags.php';

/**
 * Custom functions for this theme.
 */
require get_template_directory().'/inc/custom-functions.php';

/**
 * Custom hooks for this theme.
 */
require get_template_directory().'/inc/category-metabox.php';

/**
 * Custom hooks for this theme.
 */
require get_template_directory().'/inc/custom-hooks.php';


/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory().'/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory().'/inc/customizer/customizer.php';

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path('/inc/icon-functions.php');

/**
 * author widgets.
 */
require get_template_directory().'/inc/author-widget.php';
require get_template_directory().'/inc/recent-post-widget.php';
require get_template_directory().'/inc/social-widget.php';

/**
 * admin page.
 */
require get_parent_theme_file_path('/inc/admin-page/admin-about.php');

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory().'/inc/jetpack.php';
}

/**
 * Custom hooks for this theme.
 */
require get_template_directory().'/inc/helper/single-meta.php';
require get_template_directory().'/inc/helper/widget-init.php';

/**
 * CSS related hooks.
 */

if (!function_exists('unexposed_custom_css')) :

    /**
     * Do action theme custom CSS.
     *
     * @since 1.0.0
     */
    function unexposed_custom_css()
    {
    	global $unexposed_google_fonts;


    	$unexposed_primary_color = unexposed_get_option('primary_color');
    	
    	$unexposed_slider_text_bg_color = unexposed_get_option('slider_text_bg_color');
    	$unexposed_slider_text_color = unexposed_get_option('slider_text_color');
    	$unexposed_primary_font = $unexposed_google_fonts[unexposed_get_option('primary_font')];
    	$unexposed_secondary_font = $unexposed_google_fonts[unexposed_get_option('secondary_font')];
    	?>
    	<style type="text/css">
            <?php if (!empty ($unexposed_primary_color)) { ?>
            body .site button:hover,
            body .site button:active, button:focus,
            body .site input[type="button"]:hover,
            body .site input[type="button"]:focus,
            body .site input[type="button"]:active,
            body .site input[type="reset"]:hover,
            body .site input[type="reset"]:active,
            body .site input[type="reset"]:focus,
            body .site input[type="submit"]:hover,
            body .site input[type="submit"]:active,
            body .site input[type="submit"]:focus {
                background: <?php echo $unexposed_primary_color ?> !important;
            }

            body .site a:hover,
            body .site a:focus,
            body .site a:active,
            body .site .main-navigation div.menu > ul > li.current-menu-item > a,
            body .site .main-navigation div.menu > ul > li:hover > a,
            body .site .main-navigation div.menu > ul > li:focus > a,
            body .copyright-info a {
                color: <?php echo $unexposed_primary_color ?> !important;
            }
            <?php } ?>

            <?php if (!empty ($unexposed_slider_text_bg_color)) { ?>
            body .slider {
                background: <?php echo $unexposed_slider_text_bg_color ?> !important;
            }
            <?php } ?>

            <?php if (!empty ($unexposed_slider_text_color)) { ?>
            body .site .slides-title a,
            body .site .slides-excerpt,
            body .site .continue-reading-btn * {
                color: <?php echo $unexposed_slider_text_color ?> !important;
            }

            body .site .slider .slick-dots li button:before{
                border-color: <?php echo $unexposed_slider_text_color ?> !important;
            }
            <?php } ?>


            <?php if(!empty($unexposed_primary_font)){ ?>
            body,
            button,
            input,
            select,
            optgroup,
            textarea{
                font-family: <?php echo $unexposed_primary_font; ?> !important;
            }
            <?php } ?>
            <?php if(!empty($unexposed_secondary_font)){ ?>
            body h1,
            body h2,
            body h3,
            body h4,
            body h5,
            body h6,
            body .site .site-title{
                font-family: <?php echo $unexposed_secondary_font; ?> !important;
            }
            <?php } ?>

    	</style>
    	<?php
    }

endif;