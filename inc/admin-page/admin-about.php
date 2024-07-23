<?php
/**
 * Unexposed About Page
 * @package Unexposed
 *
 */
if (!class_exists('Unexposed_Admin_About_page')):
    class Unexposed_Admin_About_page
    {
        function __construct()
        {
            add_action('admin_menu', array($this, 'unexposed_backend_menu'), 999);
        }
        // Add Backend Menu
        function unexposed_backend_menu()
        {
            add_theme_page(esc_html__('Unexposed', 'unexposed'), esc_html__('Unexposed', 'unexposed'), 'activate_plugins', 'unexposed-about', array($this, 'unexposed_main_page'),1);
        }
        // Settings Form
        function unexposed_main_page()
        {
            $site_url = 'https://unitedtheme.com';
            $base_url = home_url();
            $theme_version = wp_get_theme()->get('Version');
            $theme_info = wp_get_theme();
            $theme_name = $theme_info->__get('Name');
            $theme_descrioption = $theme_info->__get('Description');
            ?>
            <div class="theme-admin-wrapper">
                <div class="theme-admin-top">
                    <div class="theme-admin-logo">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/images/unexposed-logo.png'); ?>"
                             class="theme-branding-logo">
                        <span class="theme-version-info"> <?php echo esc_attr($theme_version); ?> </span>
                    </div>
                    <h1 class="theme-welcome-text">
                        <?php echo esc_html__('Bonjour! Ciao! Willkommen! Hello!', 'unexposed'); ?>
                    </h1>
                    <h2 class="theme-main-title">
                        <?php printf(__('Thank you for choosing %1$s', 'unexposed'), esc_html($theme_name)); ?>
                    </h2>
                    <p>
                        <?php echo esc_html__("Oh my goodness, we're so thrilled you decided to join the UnitedTheme family! Hats off on making an excellent decision!", 'unexposed'); ?>
                    </p>
                    <div class="theme-admin-button-block">
                        <a href="<?php echo esc_url($site_url); ?>/themes/unexposed/" class="theme-admin-button" target="_blank"> <?php echo esc_html__('Theme Details', 'unexposed'); ?> </a>
                        <a href="<?php echo esc_url($site_url); ?>/live-preview/unexposed/" class="theme-admin-button" target="_blank"> <?php echo esc_html__('View Demo', 'unexposed'); ?> </a>
                        <a href="https://wordpress.org/support/theme/unexposed/reviews/" class="theme-admin-button" target="_blank"><?php echo esc_html__('Rate This Theme', 'unexposed'); ?></a>
                        <a href="<?php echo esc_url($site_url); ?>/themes/unexposed-plus/" class="theme-admin-button" target="_blank"> <?php echo esc_html__('Upgrade To Pro', 'unexposed'); ?>  </a>
                    </div>
                </div>
                <div class="theme-admin-bottom">
                    <div class="theme-admin-tab">
                        <ul class="theme-admin-tablist">
                            <li class="active-tab"><?php echo esc_html__('getting started', 'unexposed'); ?></li>
                            <li><?php echo esc_html__('support', 'unexposed'); ?></li>
                            <li class="freevspro"><?php echo esc_html__('free vs pro', 'unexposed'); ?></li>
                        </ul>
                    </div>
                    <div class="theme-tab-wrapper">
                        <div class="theme-admin-getting-started theme-tab-content">
                            <div class="theme-admin-item">
                                <div class="theme-admin-content">
                                    <div class="theme-admin-text">
                                        <?php echo esc_html($theme_descrioption); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="theme-admin-item">
                                <div class="theme-admin-content">
                                    <h3 class="entry-title entry-title-small">
                                        <?php echo esc_html__('Site Title', 'unexposed'); ?>
                                    </h3>
                                    <div class="theme-admin-text">
                                        <?php echo esc_html__('Manage your site logo and site icon', 'unexposed'); ?>
                                    </div>
                                    <a href="<?php echo esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bsection%5D=title_tagline') ?>"
                                       class="theme-admin-button">
                                        <?php echo esc_html__('Site Identity', 'unexposed'); ?>
                                    </a>
                                </div>
                            </div>
                            <div class="theme-admin-item">
                                <div class="theme-admin-content">
                                    <h3 class="entry-title entry-title-small">
                                        <?php echo esc_html__('General settings', 'unexposed'); ?>
                                    </h3>
                                    <div class="theme-admin-text">
                                        <?php echo esc_html__('Advanced Color and typography options', 'unexposed'); ?>
                                    </div>
                                    <a href="<?php echo esc_url($site_url); ?>/themes/unexposed-plus/" target="_blank" class="theme-admin-button">
                                        <?php echo esc_html__('Upgrade To Pro', 'unexposed'); ?>
                                    </a>
                                </div>
                            </div>
                            <div class="theme-admin-item">
                                <div class="theme-admin-content">
                                    <h3 class="entry-title entry-title-small">
                                        <?php echo esc_html__('Menu', 'unexposed'); ?>
                                    </h3>
                                    <div class="theme-admin-text">
                                        <?php echo esc_html__('Manage your Sites menu form here', 'unexposed'); ?>
                                    </div>
                                    <a href="<?php echo esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bpanel%5D=nav_menus') ?>"
                                       class="theme-admin-button">
                                        <?php echo esc_html__('Setting up Menu', 'unexposed'); ?>
                                    </a>
                                </div>
                            </div>
                            <div class="theme-admin-item">
                                <div class="theme-admin-content">
                                    <h3 class="entry-title entry-title-small">
                                        <?php echo esc_html__('Theme Options', 'unexposed'); ?>
                                    </h3>
                                    <div class="theme-admin-text">
                                        <?php echo esc_html__('Manage your site via theme option panel on customizer', 'unexposed'); ?>
                                    </div>
                                    <a href="<?php echo esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bpanel%5D=theme_option_panel') ?>"
                                       class="theme-admin-button">
                                        <?php echo esc_html__('Theme Options', 'unexposed'); ?>
                                    </a>
                                </div>
                            </div>
                            <div class="theme-admin-item">
                                <div class="theme-admin-content">
                                    <h3 class="entry-title entry-title-small">
                                        <?php echo esc_html__('Footer Featured Blog', 'unexposed'); ?>
                                    </h3>
                                    <div class="theme-admin-text">
                                        <?php echo esc_html__('Manage You May Also Like section', 'unexposed'); ?>
                                    </div>
                                    <a href="<?php echo esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bsection%5D=featured_blog_settings') ?>"
                                       class="theme-admin-button">
                                        <?php echo esc_html__('Featured Image Gallery', 'unexposed'); ?>
                                    </a>
                                </div>
                            </div>
                            <div class="theme-admin-item">
                                <div class="theme-admin-content">
                                    <h3 class="entry-title entry-title-small">
                                        <?php echo esc_html__('Slider Settings', 'unexposed'); ?>
                                    </h3>
                                    <div class="theme-admin-text">
                                        <?php echo esc_html__('Manage your main slider and their content', 'unexposed'); ?>
                                    </div>
                                    <a href="<?php echo esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bsection%5D=slider_section_settings') ?>"
                                       class="theme-admin-button">
                                        <?php echo esc_html__('Slider Options', 'unexposed'); ?>
                                    </a>
                                </div>
                            </div>
                            <div class="theme-admin-item">
                                <div class="theme-admin-content">
                                    <h3 class="entry-title entry-title-small">
                                        <?php echo esc_html__('Featured Page Settings', 'unexposed'); ?>
                                    </h3>
                                    <div class="theme-admin-text">
                                        <?php echo esc_html__('Manage featured page settings', 'unexposed'); ?>
                                    </div>
                                    <a href="<?php echo esc_url($base_url . '/wp-admin/customize.php?autofocus%5Bsection%5D=featured_page_settings') ?>"
                                       class="theme-admin-button">
                                        <?php echo esc_html__('Featured Page Options', 'unexposed'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="theme-admin-support theme-tab-content">
                            <div class="theme-admin-item">
                                <div class="theme-icon-item">
                                    <i class="dashicons dashicons-book"></i>
                                </div>
                                <div class="theme-admin-content">
                                    <h3 class="entry-title entry-title-small"> <?php echo esc_html__('Documentation', 'unexposed'); ?></h3>
                                    <div class="theme-admin-text">
                                        <?php echo esc_html__('Read our full documentation for all the detailed information on
                                        how to setup and use Meta News theme.', 'unexposed'); ?>
                                    </div>
                                    <a href="https://docs.unitedtheme.com/unexposed" class="theme-admin-button" target="_blank"><?php echo esc_html__('read documentation', 'unexposed'); ?> </a>
                                </div>
                            </div>
                            <div class="theme-admin-item">
                                <div class="theme-icon-item">
                                    <i class="dashicons dashicons-editor-help"></i>
                                </div>
                                <div class="theme-admin-content">
                                    <h3 class="entry-title entry-title-small">
                                        <?php echo esc_html__('Contact support', 'unexposed'); ?>
                                    </h3>
                                    <div class="theme-admin-text">
                                        <?php echo esc_html__('Still need support? Please create a support ticket and one of our support member will get back to you ASAP.', 'unexposed'); ?>
                                    </div>
                                    <a href="<?php echo esc_url($site_url); ?>/submit-a-request/" class="theme-admin-button" target="_blank"><?php echo esc_html__('contact support', 'unexposed'); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="theme-admin-freevspro theme-tab-content">
                            <ul>
                                <li class="table-item">
                                    <ul class="table-data theme-equal-half">
                                        <li>
                                            <h3 class="entry-title entry-title-xs">
                                                <?php echo esc_html__('Upgrade to Pro', 'unexposed'); ?>
                                            </h3>
                                            <div class="theme-admin-text">
                                                <?php printf(__('Unlock all the features with %1$s Plus', 'unexposed'), esc_html($theme_name)); ?>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="<?php echo esc_url($site_url); ?>/themes/unexposed-plus/"
                                               class="theme-freevspro-button theme-admin-button" target="_blank">
                                                <?php echo esc_html__('Upgrade to Pro', 'unexposed'); ?>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="table-item">
                                    <ul class="table-data">
                                        <li>
                                            <?php echo esc_html__('List of features', 'unexposed'); ?>
                                        </li>
                                        <li>
                                            <?php echo esc_html__('Free', 'unexposed'); ?>
                                        </li>
                                        <li>
                                            <?php echo esc_html__('Plus', 'unexposed'); ?>
                                        </li>
                                    </ul>
                                </li>
                                <li class="table-item">
                                    <ul class="table-data">
                                        <li>
                                            <span class="feature-list-lead">
                                            <?php echo esc_html__('One Click Demo Import', 'unexposed'); ?>
                                            </span>
                                            <span>
                                            <?php echo esc_html__('A feature that allows you to import a pre-designed website template with a single click.', 'unexposed'); ?>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-no-alt cross"></i>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-saved check"></i>
                                        </li>
                                    </ul>
                                </li>
                                <li class="table-item">
                                    <ul class="table-data">
                                        <li>
                                            <span class="feature-list-lead">
                                            <?php echo esc_html__('Fully Responsive', 'unexposed'); ?>
                                            </span>
                                            <span>
                                            <?php echo esc_html__('Provide your mobile users with the best experience by sharing the most detailed images.', 'unexposed'); ?>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-saved check"></i>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-saved check"></i>
                                        </li>
                                    </ul>
                                </li>
                                <li class="table-item">
                                    <ul class="table-data">
                                        <li>
                                            <span class="feature-list-lead">
                                            <?php echo esc_html__('High-speed Performance', 'unexposed'); ?>
                                            </span>
                                            <span>
                                            <?php echo esc_html__('Your customers will never have to wait for too long with our algorithms and optimizations.', 'unexposed'); ?>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-saved check"></i>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-saved check"></i>
                                        </li>
                                    </ul>
                                </li>
                                <li class="table-item">
                                    <ul class="table-data">
                                        <li>
                                            <span class="feature-list-lead">
                                            <?php echo esc_html__('Unrestricted Features', 'unexposed'); ?>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-no-alt cross"></i>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-saved check"></i>
                                        </li>
                                    </ul>
                                </li>
                                <li class="table-item">
                                    <ul class="table-data">
                                        <li>
                                            <span class="feature-list-lead">
                                            <?php echo esc_html__('Webmaster Tools', 'unexposed'); ?>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-no-alt cross"></i>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-saved check"></i>
                                        </li>
                                    </ul>
                                </li>
                                <li class="table-item">
                                    <ul class="table-data">
                                        <li>
                                            <span class="feature-list-lead">
                                            <?php echo esc_html__('Fonts and color option', 'unexposed'); ?>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-no-alt cross"></i>
                                        </li>
                                        <li>
                                            <div class="theme-table-detail">
                                                <?php echo esc_html__('1000+ Google fonts', 'unexposed'); ?>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="table-item">
                                    <ul class="table-data">
                                        <li>
                                            <span class="feature-list-lead">
                                            <?php echo esc_html__('TypeKit Fonts', 'unexposed'); ?>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-no-alt cross"></i>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-saved check"></i>
                                        </li>
                                    </ul>
                                </li>
                                <li class="table-item">
                                    <ul class="table-data">
                                        <li>
                                            <span class="feature-list-lead">
                                            <?php echo esc_html__('Custom Fonts', 'unexposed'); ?>
                                            </span>
                                            <span>
                                                <?php echo esc_html__('Easily upload and integrate custom fonts on your site by using the Custom Fonts module.', 'unexposed'); ?>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-no-alt cross"></i>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-saved check"></i>
                                        </li>
                                    </ul>
                                </li>
                                <li class="table-item">
                                    <ul class="table-data">
                                        <li>
                                            <span class="feature-list-lead">
                                            <?php echo esc_html__('SEO optimized', 'unexposed'); ?>
                                            </span>
                                            <span>
                                            <?php echo esc_html__('Get more visitors by making the content of your website fully visible for search engines.', 'unexposed'); ?>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-saved check"></i>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-saved check"></i>
                                        </li>
                                    </ul>
                                </li>
                                <li class="table-item">
                                    <ul class="table-data">
                                        <li>
                                            <span class="feature-list-lead">
                                            <?php echo esc_html__('Newsletter option', 'unexposed'); ?>
                                            </span>
                                            <span>
                                            <?php echo esc_html__('Provides a ready-to-go solution for your mail marketing needs.', 'unexposed'); ?>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-no-alt cross"></i>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-saved check"></i>
                                        </li>
                                    </ul>
                                </li>
                                <li class="table-item">
                                    <ul class="table-data">
                                        <li>
                                            <span class="feature-list-lead">
                                            <?php echo esc_html__('Footer Credit Remove', 'unexposed'); ?>
                                            </span>
                                            <span>
                                            <?php echo esc_html__('Remove default copyright text from the footer.', 'unexposed'); ?>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-no-alt cross"></i>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-saved check"></i>
                                        </li>
                                    </ul>
                                </li>
                                <li class="table-item">
                                    <ul class="table-data">
                                        <li>
                                            <span class="feature-list-lead">
                                            <?php echo esc_html__('Translation Ready', 'unexposed'); ?>
                                            </span>
                                            <span>
                                            <?php echo esc_html__('Translate your project to any language with po translation, WPML plugin and RTL style', 'unexposed'); ?>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-saved check"></i>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-saved check"></i>
                                        </li>
                                    </ul>
                                </li>
                                <li class="table-item">
                                    <ul class="table-data">
                                        <li>
                                            <span class="feature-list-lead">
                                            <?php echo esc_html__('Instagram Feature', 'unexposed'); ?>
                                            </span>
                                            <span>
                                            <?php echo esc_html__('Show images from your Instagram account', 'unexposed'); ?>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-no-alt cross"></i>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-saved check"></i>
                                        </li>
                                    </ul>
                                </li>
                                <li class="table-item">
                                    <ul class="table-data">
                                        <li>
                                            <span class="feature-list-lead">
                                            <?php echo esc_html__('Facebook Integration', 'unexposed'); ?>
                                            </span>
                                            <span>
                                            <?php echo esc_html__('Display your Facebook Fanpage widget in your sidebar or post content via a shortcode', 'unexposed'); ?>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-no-alt cross"></i>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-saved check"></i>
                                        </li>
                                    </ul>
                                </li>
                                <li class="table-item">
                                    <ul class="table-data">
                                        <li>
                                            <span class="feature-list-lead">
                                            <?php echo esc_html__('Pinterest Integration', 'unexposed'); ?>
                                            </span>
                                            <span>
                                            <?php echo esc_html__('Display your Pinterest Board widget in your sidebar or post content via a shortcode', 'unexposed'); ?>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-no-alt cross"></i>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-saved check"></i>
                                        </li>
                                    </ul>
                                </li>
                                <li class="table-item">
                                    <ul class="table-data">
                                        <li>
                                            <span class="feature-list-lead">
                                            <?php echo esc_html__('Twitter Integration', 'unexposed'); ?>
                                            </span>
                                            <span>
                                            <?php echo esc_html__('Display your Twitter feed in your sidebar with a widget or post content via a shortcode', 'unexposed'); ?>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-no-alt cross"></i>
                                        </li>
                                        <li>
                                            <i class="dashicons dashicons-saved check"></i>
                                        </li>
                                    </ul>
                                </li>
                                <li class="table-item">
                                    <ul class="table-data theme-equal-half">
                                        <li>
                                            <h3 class="entry-title entry-title-xs"><?php echo esc_html__('Upgrade to Pro', 'unexposed'); ?></h3>
                                            <div class="theme-admin-text">
                                                <?php printf(__('Unlock all the features with %1$s Plus', 'unexposed'), esc_html($theme_name)); ?>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="<?php echo esc_url($site_url); ?>/themes/unexposed-plus/"
                                               class="theme-freevspro-button theme-admin-button" target="_blank">
                                                <?php echo esc_html__('Upgrade to Pro', 'unexposed'); ?>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="theme-admin-footer">
                    <svg width="55" height="55" viewBox="0 0 40.5 48.3">
                        <path fill="#2d82c8" d="M33.4 29.4l7.1 12.3-7.4.6-4 6-7.3-12.9"></path>
                        <path d="M33.5 29.6L26 42.7l-4.2-7.3 11.6-6 .1.2zM0 41.7l7.5.6 3.9 6 7.2-12.4-11-7.3L0 41.7z" fill="#2271b1"></path>
                        <path d="M39.5 18.7c0 1.6-2.4 2.8-2.7 4.3-.4 1.5 1 3.8.2 5.1-.8 1.3-3.4 1.2-4.5 2.3-1.1 1.1-1 3.7-2.3 4.5-1.3.8-3.6-.6-5.1-.2-1.5.4-2.7 2.7-4.3 2.7S18 35 16.5 34.7c-1.5-.4-3.8 1-5.1.2s-1.2-3.4-2.3-4.5-3.7-1-4.5-2.3.6-3.6.2-5.1-2.7-2.7-2.7-4.3 2.4-2.8 2.7-4.3c.4-1.5-1-3.8-.2-5.1C5.4 8 8.1 8.1 9.1 7c1.1-1.1 1-3.7 2.3-4.5s3.6.6 5.1.2C18 2.4 19.2 0 20.8 0c1.6 0 2.8 2.4 4.3 2.7 1.5.4 3.8-1 5.1-.2 1.3.8 1.2 3.4 2.3 4.5 1.1 1.1 3.7 1 4.5 2.3s-.6 3.6-.2 5.1c.3 1.5 2.7 2.7 2.7 4.3z" fill="#599fd9"></path>
                        <path d="M23.6 7c-6.4-1.5-12.9 2.5-14.4 8.9-.7 3.1-.2 6.3 1.5 9.1 1.7 2.7 4.3 4.6 7.4 5.4.9.2 1.9.3 2.8.3 2.2 0 4.4-.6 6.3-1.8 2.7-1.7 4.6-4.3 5.4-7.5C34 15 30 8.5 23.6 7zm7 14c-.6 2.6-2.2 4.8-4.5 6.2-2.3 1.4-5 1.8-7.6 1.2-2.6-.6-4.8-2.2-6.2-4.5-1.4-2.3-1.8-5-1.2-7.6.6-2.6 2.2-4.8 4.5-6.2 1.6-1 3.4-1.5 5.2-1.5.8 0 1.5.1 2.3.3 5.4 1.3 8.7 6.7 7.5 12.1zm-8.2-4.5l3.7.5-2.7 2.7.7 3.7-3.4-1.8-3.3 1.8.6-3.7-2.7-2.7 3.8-.5 1.6-3.4 1.7 3.4z" fill="#fff"></path>
                    </svg>
                    <h3 class="entry-title entry-title-small"><?php echo esc_html__('Upgrade now', 'unexposed'); ?>  </h3>
                    <div class="theme-admin-text">
                        <?php echo esc_html__('Upgrade to the Pro version and get instant access to all premium extensions, features and future updates.', 'unexposed'); ?>
                    </div>
                    <a href="<?php echo esc_url($site_url); ?>/themes/unexposed-plus/" class="theme-admin-button"><?php echo esc_html__('Purchase', 'unexposed'); ?> <?php echo esc_html($theme_name); ?> <?php echo esc_html__('Plus', 'unexposed'); ?></a>
                </div>
            </div>
            <?php
        }
    }
    new Unexposed_Admin_About_page();
endif;