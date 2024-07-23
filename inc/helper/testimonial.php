<?php
/**
 * Displays Testimonial Section
 *
 * @package Unexposed
 */
$enable_testimonial_section = unexposed_get_option('enable_testimonial_section');
$testimonial_post_title = unexposed_get_option('testimonial_post_title');
$testimonial_post_description = unexposed_get_option('testimonial_post_description');
$upload_testimonial_image_1 = unexposed_get_option('upload_testimonial_image_1');
if ($enable_testimonial_section) { ?>
    <section class="testimonial section-spacing">
        <?php if ($upload_testimonial_image_1) { ?>
            <img src="<?php echo esc_url($upload_testimonial_image_1); ?>" alt="">
        <?php  } ?>

      <div class="wrapper">
        <div class="row">
            <div class="col col-four">
                <div class="testimonial-details">
                  <?php if ($testimonial_post_title) { ?>
                      <h2 class="entry-title entry-title-large">
                          <?php echo esc_html($testimonial_post_title); ?>
                      </h2>
                  <?php } ?>

                  <?php if ($testimonial_post_description) { ?>
                      <p class="entry-description">
                          <?php echo esc_html($testimonial_post_description); ?>
                      </p>
                  <?php } ?>
                </div>
            </div>

            <div class="col col-five">
              <div class="testimonial-slider">
  
                  <?php 
                  $testimonial_select_page_array = array();
                  for ($i=1; $i <=5 ; $i++) {
                      $testimonial_select_page = get_theme_mod('testimonial_select_page_'.$i);
                      if (!empty($testimonial_select_page)) {
                          $testimonial_select_page_array[] = absint($testimonial_select_page);
                      }
                  } 
                  $testimonial_page_query = new WP_Query(
                      array(
                          'post_type' => 'page',
                          'orderby' => 'post__in',
                          'post__in' => $testimonial_select_page_array,
                      )
                  );
                  if ($testimonial_page_query->have_posts()):
                  while ($testimonial_page_query->have_posts()): $testimonial_page_query->the_post(); 
                      ?>
                      <div class="testimonial-slider-item">
                          <div class="testimonial-slider-content">
                            <?php echo unexposed_get_svg(array('icon' => 'quote-right')) ?>
                            <span class="testimonial-rating">
                              &#9733;
                              &#9733;
                              &#9733;
                              &#9733;
                              &#9733;
                            </span>
                            <?php
                            if (has_excerpt()) {
                                the_excerpt();
                            } else {
                                echo '<p>';
                                echo esc_html(wp_trim_words(get_the_content(), 25, '...'));
                                echo '</p>';
                            }
                            ?>
                      
                            <div class="testimonial-user-info">
                              <?php if (has_post_thumbnail()) { ?>
                                  <?php $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
                                      $featured_image = isset($featured_image[0]) ? $featured_image[0] : ''; ?> 
                                  <img src="<?php echo esc_url($featured_image); ?>" alt="<?php the_title_attribute(); ?>">
                              <?php } ?>
                              <h2 class="entry-title entry-title-small">
                                  <a href="<?php the_permalink(); ?>" tabindex="0" rel="bookmark" title="<?php the_title_attribute(); ?>">
                                  <?php the_title(); ?>
                                  </a>
                              </h2>
                            </div>
                          </div>
                      </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                endif; ?>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
<?php }