<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Unexposed
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    }
    ?>

    <?php if (unexposed_get_option('enable_preloader_option') == 1){ ?>
        <div class="preloader">
            <div class="layer"></div>
            <div class="layer"></div>
            <div class="layer"></div>
            <div class="layer"></div>
            <div class="inner">
                <figure class="animateFadeInUp">
                    <div class="load-spinner"></div>
                </figure>
            </div>
            <!-- end inner -->
        </div>
        <!-- end preloader -->
        <div class="transition-overlay">
            <div class="layer"></div>
            <div class="layer"></div>
            <div class="layer"></div>
            <div class="layer"></div>
        </div>
        <!-- end transition-overlay -->
    <?php } ?>
    <?php if (unexposed_get_option('enable_cursor_option') == 1){ ?>
        <div class="theme-custom-cursor theme-cursor-primary"></div>
        <div class="theme-custom-cursor theme-cursor-secondary"></div>
    <?php } ?>


<div id="page" class="site <?php if (unexposed_get_option('enable_featured_page_section') == 1) {
    echo "content-block";
} ?>">
<?php if (has_header_image()) {
    $unexposed_header_img_cl = "header-image";
} else {
    $unexposed_header_img_cl = "header-image-disabled";
}
$unexposed_header_color = "";
$unexposed_header_color = unexposed_get_option('header_bg_scheme');
if ($unexposed_header_color == 'dark-scheme') {
    $unexposed_header_colors = "dark-scheme";
} else {
    $unexposed_header_colors = "light-scheme";
}
$unexposed_header_img = get_header_image(); ?>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'unexposed'); ?></a>

    <header id="masthead" class="site-header">
        <!-- header -->
        <div class="wrapper">
            <div class="row">
                <div class="col col-full">
                  <div class="site-header-details">
                    <div class="site-header-left">
                      <div class="site-branding <?php echo $unexposed_logo_display; ?>">
                        <div class="logo">
                            <?php
                            the_custom_logo();
                            if (is_front_page() && is_home()) : ?>
                                <h1 class="site-title">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                        <?php bloginfo('name'); ?>
                                    </a>
                                </h1>
                            <?php else : ?>
                                <p class="site-title">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                        <?php bloginfo('name'); ?>
                                    </a>
                                </p>
                            <?php
                            endif;
  
                            $description = get_bloginfo('description', 'display');
                            if ($description || is_customize_preview()) : ?>
                                <p class="site-description">
                                    <?php echo esc_html($description); ?>
                                </p>
                            <?php
                            endif; ?>
                        </div>
                      </div>
                    </div>
                      
                    <div class="site-header-right">
                      <button type="button" class="icon-search" aria-label="search">
                          <?php echo unexposed_get_svg( array( 'icon' => 'loupe' ) ); ?>
                      </button>

                      <a href="#" class="toggle nav-toggle nav-untoggle toggle-menu" data-toggle-target=".menu-modal" data-toggle-screen-lock="true" data-toggle-body-class="showing-menu-modal" aria-pressed="false" data-set-focus=".site-header .nav-toggle" role="button">
                        <span class="screen-reader-text"><?php esc_html_e('Primary Menu', 'unexposed'); ?>
                        </span>
                        <i class="toogle-icon"></i>
                      </a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </header>

    <?php if (has_custom_header()) { ?>
      <div class="unt-block custom-header section-spacing">
          <?php
          $header_text =unexposed_get_option('header_content_title');
          $header_description = unexposed_get_option('header_content_description');
          $header_button_label = unexposed_get_option('header_button_text');
          $header_button_link = unexposed_get_option('header_button_url');?>
          <div class="custom-header-media">
              <?php the_custom_header_markup(); ?>
          </div>
          <?php
          if ($header_text || $header_button_link) { ?>
              <div class="header-media-content">
                  <div class="site-wrapper">
                      <div class="site-row">
                          <div class="site-column site-column-9">
                              <div class="header-media-caption">

                                  <?php if ($header_text) { ?>
                                  <header class="entry-header">
                                      <h2 class="entry-title entry-title-large">
                                          <?php echo esc_html($header_text); ?>
                                      </h2>
                                  </header>

                                  <?php } ?>

                                  <?php if ($header_description) { ?>
                                      <div class="entry-content" itemprop="text">
                                          <p>
                                              <?php echo esc_html($header_description); ?>
                                          </p>
                                      </div>

                                  <?php } ?>

                                  <?php if ($header_button_label) { ?>

                                      <div class="unt-continue-reading">
                                          <a href="<?php echo esc_url($header_button_link); ?>" class="unt-btn unt-btn-primary">
                                              <?php echo esc_html($header_button_label); ?>
                                              <?php echo unexposed_get_svg(array('icon' => 'arrow-right')) ?>
                                          </a>
                                      </div>

                                  <?php } ?>

                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          <?php } ?>

      </div>
    <?php } ?>

    <?php get_template_part('inc/helper/header-nav'); ?>

    <div class="model-search">
        <a href="javascript:void(0)" class="searchbar-skip-link"></a>
        <a href="javascript:void(0)" class="cross-exit"></a>
        <div class="model-search-wrapper">
            <div class="popup-form">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>

    <?php if ((is_front_page() || is_home()) && !is_paged() ) {
      do_action('unexposed_action_slider_post');
      require get_template_directory().'/inc/helper/about.php';
      require get_template_directory().'/inc/helper/category-section.php';
      require get_template_directory().'/inc/helper/featured-work.php';
      require get_template_directory().'/inc/helper/video.php';
      require get_template_directory().'/inc/helper/cta.php';
      require get_template_directory().'/inc/helper/testimonial.php';
    }
    ?>

    <div id="content" class="site-content">
    