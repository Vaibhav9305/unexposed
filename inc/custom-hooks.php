<?php
if (!function_exists('unexposed_banner_slider_args')):
    /**
     * Banner Slider Details
     *
     * @since Unexposed 1.0.0
     *
     * @return array $qargs Slider details.
     */
    function unexposed_banner_slider_args()
    {
        $unexposed_banner_slider_number = absint(unexposed_get_option('number_of_home_slider'));
        $unexposed_banner_slider_from = esc_attr(unexposed_get_option('select_slider_from'));
        switch ($unexposed_banner_slider_from) {
            case 'from-page':
                $unexposed_banner_slider_page_list_array = array();
                for ($i = 1; $i <= $unexposed_banner_slider_number; $i++) {
                    $unexposed_banner_slider_page_list = unexposed_get_option('select_page_for_slider_' . $i);
                    if (!empty($unexposed_banner_slider_page_list)) {
                        $unexposed_banner_slider_page_list_array[] = absint($unexposed_banner_slider_page_list);
                    }
                }
                // Bail if no valid pages are selected.
                if (empty($unexposed_banner_slider_page_list_array)) {
                    return;
                }
                /*page query*/
                $qargs = array(
                    'posts_per_page' => absint($unexposed_banner_slider_number),
                    'orderby' => 'post__in',
                    'post_type' => 'page',
                    'post__in' => $unexposed_banner_slider_page_list_array,
                );
                return $qargs;
                break;

            case 'from-category':
                $unexposed_banner_slider_category = absint(unexposed_get_option('select_category_for_slider'));
                $qargs = array(
                    'posts_per_page' => absint($unexposed_banner_slider_number),
                    'post_type' => 'post',
                    'cat' => $unexposed_banner_slider_category,
                );
                return $qargs;
                break;

            default:
                break;
        }
        ?>
        <?php
    }
endif;

if (!function_exists('unexposed_banner_slider')):
    /**
     * Banner Slider
     *
     * @since Unexposed 1.0.0
     *
     */
    function unexposed_banner_slider()
    {
        $unexposed_slider_excerpt_number = absint(unexposed_get_option('number_of_content_home_slider'));
        $unexposed_slider_content_enable = (unexposed_get_option('show_slider_content_section'));
        if (1 != unexposed_get_option('show_slider_section')) {
            return null;
        }
        $unexposed_banner_slider_args = unexposed_banner_slider_args();
        $unexposed_banner_slider_query = new WP_Query($unexposed_banner_slider_args);
        $i = 0;
        ?>
        <div class="slider-wrapper section-spacing">
          <?php $rtl_class = 'false';
            if(is_rtl()){ 
                $rtl_class = 'true';
          }?>
          <div class="wrapper">
            <div id="mainslider" data-slick='{"rtl": <?php echo($rtl_class); ?>}'>
                <?php
                if ($unexposed_banner_slider_query->have_posts()) :
                    while ($unexposed_banner_slider_query->have_posts()) : $unexposed_banner_slider_query->the_post();
                        if (has_excerpt()) {
                            $unexposed_slider_content = get_the_excerpt();
                        } else {
                            $unexposed_slider_content = unexposed_words_count($unexposed_slider_excerpt_number, get_the_content());
                        }
                        ?>
                        <div class="item">
                          <div class="main-slider-content">
                            <?php if (has_post_thumbnail()) {
                                $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
                                $featured_image = isset($featured_image[0]) ? $featured_image[0] : ''; ?>
                                <div class="slides-image" style="background-image: url(<?php echo esc_url($featured_image); ?>);"></div>
                            <?php } ?>
                            <div class="slide-caption">
                                <h2 class="entry-title entry-title-large">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <?php if ($unexposed_slider_content_enable == 1) { ?>
                                    <div class="excerpt slides-excerpt hidden-mobile">
                                        <?php if ($unexposed_slider_excerpt_number != 0) { ?>
                                            <span class="smalltext"><?php echo wp_kses_post($unexposed_slider_content); ?></span>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
  
                                <div class="continue-reading-btn">
                                    <a href="<?php the_permalink(); ?>">
                                        <span><?php echo esc_html(unexposed_get_option('slider_button_text')); ?></span>
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="svg-arrow" x="0px" y="0px" viewBox="0 0 476.213 476.213" style="enable-background:new 0 0 476.213 476.213;" xml:space="preserve">
                                                <polygon points="345.606,107.5 324.394,128.713 418.787,223.107 0,223.107 0,253.107 418.787,253.107 324.394,347.5   345.606,368.713 476.213,238.106 "/>
                                            </svg>
                                    </a>
                                </div>
  
                            </div>
                          </div>
                        </div>
                        <?php
                        $i++;
                    endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
          </div>
        </div>
        <!-- end slider-section -->
        <?php
    }
endif;
add_action('unexposed_action_slider_post', 'unexposed_banner_slider', 10);

if (!function_exists('unexposed_featured_blog')) :
    /**
     * Featured Blog
     *
     * @since Unexposed 1.0.0
     *
     */
    function unexposed_featured_blog()
    {
        if (1 != unexposed_get_option('enable_featured_blog')) {
            return null;
        }

        $unexposed_featured_blog_args = array(
            'post_type' => 'post',
            'posts_per_page' => 6,
            'cat' => absint(unexposed_get_option('select_category_for_featured_blog')),
        ); ?>
        <section class="united-block united-recommendation-block section-spacing">
            <div class="wrapper">
                <h2 class="recommended-title"><span><?php echo esc_html(unexposed_get_option('featured_blog_title')); ?></span></h2>
            </div>
            <div class="wrapper">
                <div class="row">
                  <div class="recommendation-block-carousel slick-space">
                    <?php
                    $unexposed_featured_blog_query = new WP_Query($unexposed_featured_blog_args);

                    if ($unexposed_featured_blog_query->have_posts()) :
                        while ($unexposed_featured_blog_query->have_posts()) : $unexposed_featured_blog_query->the_post();
                            ?>
                            <div class="recommentaion-carousel-item">
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                  <?php if (has_post_thumbnail()) { ?>
                                    <a href="<?php the_permalink(); ?>" class="zoom-image">
                                        <?php the_post_thumbnail('medium_large'); ?>
                                    </a>
                                  <?php } ?>

                                  <div class="recommendation-block-details">
                                      <h2 class="entry-title entry-title-medium">
                                          <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                      </h2>
                                      <div class="entry-meta">
                                          <?php unexposed_posted_on(); ?>
                                      </div><!-- .entry-meta -->
                                  </div>
                                </article>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                  </div>
                </div>
            </div>
        </section>
        <?php
    }
endif;

add_action('unexposed_action_featured_page', 'unexposed_featured_blog', 20);


if (!function_exists('unexposed_related_blog')):
    /**
     * Related Post
     *
     * @since Unexposed 1.0.0
     */
    function unexposed_related_blog()
    {
        global $post;
        $post_categories = get_the_category($post->ID); // get category object
        $category_ids = array(); // set an empty array
        foreach ($post_categories as $post_category) {
            $category_ids[] = $post_category->term_id;
        }
        if (empty($category_ids)) return;

        $unexposed_related_blog_args = array(
            'post_type' => 'post',
            'posts_per_page' => 5,
            'category__in' => $category_ids,
            'post__not_in' => array($post->ID),
        );
        ?>
        <div class="united-block related-block">
            <h2 class="recommended-title">
                <span><?php echo esc_html__('Related Post', 'unexposed'); ?></span>
            </h2>
            <div class="related-wrapper">
                <?php
                $unexposed_related_blog_query = new WP_Query($unexposed_related_blog_args);
                if ($unexposed_related_blog_query->have_posts()) :
                    while ($unexposed_related_blog_query->have_posts()) : $unexposed_related_blog_query->the_post();
                        ?>
                        <div class="full-item row row-small">
                            <?php if (has_post_thumbnail()) { ?>
                                <div class="full-item-image col col-three">
                                    <div class="photo-wrapper">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium'); ?>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="full-item-details col <?php if (has_post_thumbnail()) { ?>col-seven<?php } else { ?>col-full<?php } ?>">
                                <header class="entry-header">
                                    <h2 class="entry-title">
                                        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                    </h2>
                                    <div class="entry-meta">
                                        <?php unexposed_posted_on(); ?>
                                    </div>
                                </header>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
        <?php
    }
endif;

add_action('unexposed_action_related_post', 'unexposed_related_blog', 20);