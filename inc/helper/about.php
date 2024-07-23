<?php 
$enable_about_section = unexposed_get_option('enable_about_section');

if ($enable_about_section) {
  $select_about_page = unexposed_get_option('select_about_page');
  $upload_about_image_1 = unexposed_get_option('upload_about_image_1');
  $about_buttom_text = unexposed_get_option('about_buttom_text');
  $about_buttom_number = unexposed_get_option('about_buttom_number');
  $about_buttom_text_2 = unexposed_get_option('about_buttom_text_2');
  $about_buttom_number_2 = unexposed_get_option('about_buttom_number_2');
  $about_button_text = unexposed_get_option('about_button_text');
  $about_button_url = unexposed_get_option('about_button_url');
  $qargs = array(
      'posts_per_page' => 1,
      'post_type' => 'page',
      'page_id' => absint($select_about_page),
  ); ?>

  <section class="about-us section-spacing">
    <div class="wrapper">
    <?php
    $qargs_query = new WP_Query($qargs);
    if ($qargs_query->have_posts()) :
        while ($qargs_query->have_posts()) : $qargs_query->the_post();
            ?>
          <div class="row">
            <div class="col col-seven">
              <div class="about-us-left">
                <div class="about-us-top">
                  <?php
                  the_post_thumbnail('medium_large', array(
                      'alt' => get_the_title(),
                  ));
                  ?>
                  <div class="about-us-content">
                    <h2 class="entry-title entry-title-big">
                      <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                      </a>
                    </h2>

                      <?php the_excerpt(); ?>
                  </div>
                </div>

                <div class="about-us-bottom">
                  <div class="about-bottom-item">
                    <span class="botton-item-index">
                      <?php echo esc_html($about_buttom_number.'%'); ?>
                    </span>

                    <span class="bottom-item-text">
                        <?php echo esc_html($about_buttom_text); ?>
                    </span>
                  </div>

                  <div class="about-bottom-item">
                    <span class="botton-item-index">
                      <?php echo esc_html($about_buttom_number_2."+"); ?>
                    </span>

                    <span class="bottom-item-text">
                      <?php echo esc_html($about_buttom_text_2); ?>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col col-three">
              <div class="about-us-right">
                <img src="<?php echo esc_url($upload_about_image_1); ?>" alt="">

                <a href="<?php echo esc_url($about_button_url); ?>">
                  <?php echo esc_html($about_button_text); ?>
                  <?php echo unexposed_get_svg(array('icon' => 'arrow-right')) ?>
                </a>
              </div>
            </div>
          </div>
        <?php endwhile;
        wp_reset_postdata();
    endif; ?>
    </div>
  </section>
<?php
}