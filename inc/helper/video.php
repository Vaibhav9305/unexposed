<?php
/**
 * Displays Testimonial Section
 *
 * @package Unexposed
 */
$enable_video_section = unexposed_get_option('enable_video_section');
$video_button_url = unexposed_get_option('video_button_url');
$upload_video_image_1 = unexposed_get_option('upload_video_image_1');
if ($enable_video_section) { ?>
  <section class="video-cta section-spacing">
    <div class="wrapper">
      <div class="row">
        <div class="col col-full">
          <div class="video-cta-details">
            <img src="<?php echo esc_url($upload_video_image_1); ?>" alt="">
            
            <div class="video-cta-play">
              <?php echo unexposed_get_svg(array('icon' => 'play')) ?>
            </div>

            <div class="ripple-1"></div>
            <div class="ripple-2"></div>
            <div class="ripple-3"></div>
            <div class="ripple-4"></div>
            <div class="ripple-5"></div>
          </div>

        </div>
      </div>
    </div>

    <div class="video-cta-popup">
      <iframe src="<?php echo esc_url($video_button_url); ?>" frameborder="0"></iframe>
      <?php echo unexposed_get_svg(array('icon' => 'close')) ?>
    </div>
  </section>
<?php }