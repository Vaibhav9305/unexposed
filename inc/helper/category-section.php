<?php
/**
 * Displays Category Section
 *
 * @package Unexposed
 */
$enable_category_section = unexposed_get_option('enable_category_section');
$number_of_category = unexposed_get_option('number_of_category');
$category_post_sub_title = unexposed_get_option('category_post_sub_title');
$category_post_title = unexposed_get_option('category_post_title');
if ($enable_category_section) {
    ?>
    <section class="category-section section-spacing">
      <div class="wrapper">
        <div class="section-header">
          <span class="header-sub-title">
            <?php echo esc_html($category_post_sub_title); ?>
          </span>

          <h2 class="header-title">
            <?php echo esc_html($category_post_title); ?>
          </h2>
        </div>

        <div class="row">
          <div class="col col-full">
            <div class="category-details grid-container">
                <?php
                for ($x = 1; $x <= $number_of_category; $x++) {
                    $c_category = get_theme_mod('select_featured_cat_' . $x);
                    if ($c_category) {
                        $cat_obj = get_category($c_category);
                        $cat_name = isset($cat_obj->name) ? $cat_obj->name : '';
                        $cat_id = isset($cat_obj->term_id) ? $cat_obj->term_id : '';
                        $count = isset($cat_obj->count) ? $cat_obj->count : '';
                        $cat_link = get_category_link($cat_id);
                        $thumbnail_id = get_term_meta($cat_id, 'thumbnail_id', true);
                        $image_tag = wp_get_attachment_image($thumbnail_id, 'medium_large');
                        ?>
                            <?php if ($cat_name) { ?>

                            <div class="category-detail-item">
                                <?php if (!empty($image_tag)) { ?>
                                    <a href="<?php echo esc_url($cat_link); ?>" class="">
                                        <?php echo $image_tag; ?>
                                    </a>
                                <?php } ?>

                                <h2 class="entry-title entry-title-small m-0">
                                    <a href="<?php echo esc_url($cat_link); ?>">
                                    <?php echo esc_html($cat_name); ?>
                                    </a>
                                </h2>
                            </div>

                            <?php } ?>

                          <?php
                      }
                } ?>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php }