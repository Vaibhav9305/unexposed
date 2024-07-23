<?php
/**
 * Displays FAQ Section
 *
 * @package Unexpoed
 */
$enable_cta_section = unexposed_get_option('enable_cta_section');
$cta_post_title = unexposed_get_option('cta_post_title');
$cta_post_description = unexposed_get_option('cta_post_description');
$upload_cta_image_1 = unexposed_get_option('upload_cta_image_1');
$cta_button_text = unexposed_get_option('cta_button_text');
$cta_button_url = unexposed_get_option('cta_button_url');
if ($enable_cta_section) { ?>

<section class="cta section-spacing">
  <div class="wrapper">
    <div class="row">
      <div class="col col-five">
        <div class="cta-content">
            <?php if ($cta_post_title) { ?>
                <h2 class="entry-title entry-title-large">
                    <?php echo esc_html($cta_post_title); ?>
                </h2>
            <?php } ?>

            <?php if ($cta_post_description) { ?>
            <p>
                <?php echo esc_html($cta_post_description); ?>
            </p>
            <?php } ?>

            <?php if (!empty($cta_button_text)) { ?>
                <a href="<?php echo esc_url($cta_button_url); ?>" class="unt-btn unt-btn-primary">
                    <span><?php echo esc_html($cta_button_text); ?></span>
                </a>
            <?php } ?>
        </div>
      </div>
        
        <?php if (!empty($upload_cta_image_1)) { ?>
            <div class="col col-five">
                <img src="<?php echo esc_url($upload_cta_image_1); ?>" alt="">
            </div>
        <?php } ?>
    </div>
  </div>
</section>

<?php } ?>
