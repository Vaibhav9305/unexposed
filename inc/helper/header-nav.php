<?php 
if ( ! function_exists( 'unexposed_filter_nav_menu_item_args' ) ) :
	function unexposed_filter_nav_menu_item_args( $args, $item, $depth ) {

		// Add sub menu toggles to the main menu with toggles
		if ( $args->theme_location == 'mainnav' && isset( $args->show_toggles ) ) {

			// Wrap the menu item link contents in a div, used for positioning
			$args->before = '<div class="wpintf-wrapper">';
			$args->after  = '';

			// Add a toggle to items with children
			if ( in_array( 'menu-item-has-children', $item->classes ) ) {

				$toggle_target_string = '.menu-modal .menu-item-' . $item->ID . ' &gt; .sub-menu';

				// Add the sub menu toggle
				$args->after .= '<div class="sub-menu-toggle-wrapper"><a href="#" class="toggle sub-menu-toggle border-color-border fill-children-current-color" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250"><span class="screen-reader-text">' . __( 'Show sub menu', 'unexposed' ) . '</span>' . unexposed_get_svg(array('icon' => 'angle-down')) . '</a></div>';

			}

			// Close the wrapper
			$args->after .= '</div>';

			// Add sub menu icons to the main menu without toggles (the fallback menu)
		} elseif ( $args->theme_location == 'mainnav' ) {
			if ( in_array( 'menu-item-has-children', $item->classes ) ) {
				$args->before = '<div class="link-icon-wrapper fill-children-current-color">';
				$args->after  = unexposed_get_svg(array('icon' => 'angle-down')) . '</div>';
			} else {
				$args->before = '';
				$args->after  = '';
			}
		}

		return $args;

	}
endif;
add_filter( 'nav_menu_item_args', 'unexposed_filter_nav_menu_item_args', 10, 3 );
?>

<div class="menu-modal cover-modal" data-modal-target-string=".menu-modal" aria-expanded="false">

	<div class="menu-modal-inner modal-inner bg-body-background">

		<div class="menu-wrapper section-inner">

			<div class="menu-top">

				<div class="menu-modal-toggles header-toggles">

					<a href="#" class="toggle nav-toggle nav-untoggle" data-toggle-target=".menu-modal" data-toggle-screen-lock="true" data-toggle-body-class="showing-menu-modal" aria-pressed="false" data-set-focus="#site-header .nav-toggle" role="button"> 
						<div class="toggle-text">
							<?php esc_html_e( 'Close', 'unexposed' ); ?>
              <?php echo unexposed_get_svg(array('icon' => 'close')) ?>
						</div>
						<div class="bars">
							<div class="bar"></div>
							<div class="bar"></div>
							<div class="bar"></div>
						</div>
					</a>
				</div>

				<ul class="main-menu reset-list-style">
					<?php
					if ( has_nav_menu( 'mainnav' ) ) {
						wp_nav_menu(
							array(
								'container'      => '',
								'items_wrap'     => '%3$s',
								'show_toggles'   => true,
								'theme_location' => 'mainnav',
							)
						);
					} else {
						wp_list_pages( 
							array( 
								'match_menu_classes' => true,
								'title_li'           => false, 
							)
						);
					}
					?>
				</ul>

			</div>

			<div class="menu-bottom">

				<p class="menu-copyright">&copy; <?php echo esc_html( date( 'Y' ) ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php echo bloginfo( 'name' ); ?></a></p>

				<?php if (has_nav_menu('social')) : ?>
					<div class="social-navigation" role="navigation" aria-label="<?php esc_attr_e('Footer Social Links Menu', 'unexposed'); ?>">
					    <?php
					    wp_nav_menu(array(
					        'theme_location' => 'social',
					        'menu_class' => 'social-links-menu',
					        'depth' => 1,
					        'link_before' => '<span class="icon-label">',
					        'link_after' => '</span>' . unexposed_get_svg(array('icon' => 'chain')),
					    ));
					    ?>
					</div>
    			<?php endif; ?>

			</div>

		</div>

	</div>

</div>