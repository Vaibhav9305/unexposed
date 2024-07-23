<?php 
$enable_featured_post = unexposed_get_option('enable_featured_post');

if ($enable_featured_post) {
  $featured_post_title = unexposed_get_option('featured_post_title');
  $select_category_for_featured_post = unexposed_get_option('select_category_for_featured_post');
  $upload_featured_bg_image = unexposed_get_option('upload_featured_bg_image');
  $unexposed_featured_blog_args = array(
      'post_type' => 'post',
      'posts_per_page' => 6,
      'cat' => absint($select_category_for_featured_post),
  ); ?>
  <section class="our-service section-spacing">
    <div class="wrapper">
      <div class="row">
        <div class="col col-full">
          <div class="our-service-details">
            <?php
            $unexposed_featured_blog_query = new WP_Query($unexposed_featured_blog_args);

            if ($unexposed_featured_blog_query->have_posts()) :
                while ($unexposed_featured_blog_query->have_posts()) : $unexposed_featured_blog_query->the_post();
                    ?>
                  <div class="our-service-item">
                    <?php if (has_post_thumbnail()) { ?>
                      <a href="<?php the_permalink(); ?>">
                          <?php the_post_thumbnail('medium'); ?>
                      </a>
                    <?php } ?>
                    <h2 class="entry-title entry-title-medium line-clamp line-clamp-2">
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>


                    <?php
                    if (has_excerpt()) {
                        the_excerpt();
                    } else {
                        echo '<p>';
                        echo esc_html(wp_trim_words(get_the_content(), 12, '...'));

                        echo '<a href="' . esc_url(get_permalink()) . '" class="theme-link">';
                        echo esc_html__('Learn More', 'unexposed') . ' ';
                        echo '</a>';

                        echo '</p>';
                    }
                    ?>
                  </div>

                <?php
                  endwhile;
                  wp_reset_postdata();
              endif;
              ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
}
