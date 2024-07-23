<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Unexposed
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
				unexposed_posted_on();
				unexposed_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

    <?php
    if ( is_singular() ) :
        if (has_post_thumbnail($post->ID)) {
            $featured_image_single_post = get_post_meta($post->ID, 'unexposed-meta-checkbox', true);
            if ('yes' != $featured_image_single_post) {
                unexposed_post_thumbnail();
            }
        } else {
            }
    else :
        unexposed_post_thumbnail();
    endif;
    ?>
    <footer class="entry-footer">
        <?php unexposed_entry_footer(); ?>
    </footer><!-- .entry-footer -->
    <?php if (has_excerpt() && !is_singular()) {
        echo "<div class='entry-content'>";
        the_excerpt();
        echo "</div>";
    } elseif (!is_singular()) {
        echo "<div class=\"entry-content\">";
        the_excerpt();
        echo "</div>";
    } else {?>
	<div class="entry-content">
        <?php
        $read_more_text = esc_html(unexposed_get_option('read_more_button_text'));
        the_content(sprintf(
        /* translators: %s: Name of current post. */
            wp_kses($read_more_text, __('%s <i class="ion-ios-arrow-right read-more-right"></i>', 'unexposed'), array('span' => array('class' => array()))),
            the_title('<span class="screen-reader-text">"', '"</span>', false)
        ));

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'unexposed' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
<?php } ?>

    <?php if (is_singular()) {
        do_action('unexposed_navigation_action');
    } ?>

</article><!-- #post-<?php the_ID(); ?> -->
