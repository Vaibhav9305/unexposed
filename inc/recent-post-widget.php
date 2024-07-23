<?php
/**
 * Adds Unexposed_Recent_Post widget.
 */
class Unexposed_Recent_Post extends WP_Widget {
    /**
     * Sets up a new widget instance.
     *
     * @since 1.0.0
     */
    function __construct() {
        parent::__construct(
            'unexposed_recent_posts_widget',
            esc_html__( 'Unexposed Recent Posts', 'unexposed' ),
            array( 'description' => esc_html__( 'Displays recent posts', 'unexposed' ), )
        );
    }

    /**
     * Outputs the content for the current widget instance.
     *
     * @since 1.0.0
     *
     * @param array $args     Display arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
            echo $args['before_title'] . $title . $args['after_title'];
        }
        $post_category     = ! empty( $instance['post_category'] ) ? $instance['post_category'] : 0;
        ?>
        <div id="unexposed-recent" role="tabpanel" class="tab-pane">
            <?php
            $this->render_post('recent',$instance);
            ?>
        </div>
        <?php
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @since 1.0.0
     *
     * @param array $instance Previously saved values from database.
     *
     *
     */
    public function form( $instance ) {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $no_of_recent_posts = ! empty( $instance['no_of_recent_posts'] ) ? $instance['no_of_recent_posts'] : 5;
        $recent_content_length = ! empty( $instance['recent_content_length'] ) ? $instance['recent_content_length'] : 0;
        $post_category    = ! empty( $instance['post_category'] ) ? $instance['post_category'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php esc_attr_e('Title:', 'unexposed'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'post_category' ); ?>"><?php _e( 'Category:', 'unexposed' ); ?></label>
            <?php
            $cat_args = array(
                'orderby'         => 'name',
                'hide_empty'      => 0,
                'taxonomy'        => 'category',
                'name'            => $this->get_field_name('post_category'),
                'id'              => $this->get_field_id('post_category'),
                'selected'        => $post_category,
                'show_option_all' => __( 'All Categories','unexposed' ),
            );
            wp_dropdown_categories( $cat_args );
            ?>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'no_of_recent_posts' ) ); ?>">
                <?php esc_attr_e( 'No of Posts:', 'unexposed' ); ?>
            </label>
            <input type="number" id="<?php echo esc_attr( $this->get_field_id( 'no_of_recent_posts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'no_of_recent_posts' ) ); ?>" value="<?php echo esc_attr( $no_of_recent_posts ); ?>" min="1" max="5" step="1" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'recent_content_length' ) ); ?>">
                <?php esc_attr_e( 'Content Length (Words):', 'unexposed' ); ?>
            </label>
            <input type="number" id="<?php echo esc_attr( $this->get_field_id( 'recent_content_length' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'recent_content_length' ) ); ?>" value="<?php echo esc_attr( $recent_content_length ); ?>" min="0" max="40" step="1" />
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @since 1.0.0
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['no_of_recent_posts'] = ( ! empty( $new_instance['no_of_recent_posts'] ) ) ? absint( $new_instance['no_of_recent_posts'] ) : '';
        $instance['recent_content_length'] = ( ! empty( $new_instance['recent_content_length'] ) ) ? absint( $new_instance['recent_content_length'] ) : 0;
            $instance['post_category']    = absint( $new_instance['post_category'] );

        return $instance;
    }

    /**
     * Outputs the tab posts
     *
     * @since 1.0.0
     *
     * @param array $args  Post Arguments.
     */
    public  function render_post( $type, $args ){
        $post_category     = ! empty( $instance['post_category'] ) ? $instance['post_category'] : 0;
        $post_args = array();
        $content_length = 0;
        switch ($type) {
            case 'recent':
                $post_args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'cat' => $args['post_category'],
                    'posts_per_page' => $args['no_of_recent_posts'],
                );
                $content_length = absint($args['recent_content_length']);
                break;

            default:
                break;
        }

        if (!empty($post_args) && is_array($post_args)) {
            $post_data = new WP_Query($post_args);
            if ($post_data->have_posts()) {
                echo '<ul class="article-item article-list-item article-tabbed-list article-item-left">';
                while ($post_data->have_posts()) {
                    $post_data->the_post();
                    ?>
                    <li class="full-item row row-small">
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="full-item-image col col-three">
                                <a href="<?php the_permalink(); ?>" class="post-thumb">
                                    <?php
                                    the_post_thumbnail('thumbnail', array(
                                        'alt' => get_the_title(),
                                    ));
                                    ?>
                                </a>
                            </div>
                        <?php } ?>
                        <div class="full-item-details col col-seven">
                            <div class="full-item-content">
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <div class="entry-meta">
                            <span class="posted-on">
                                <?php echo esc_html(get_the_date()); ?>
                            </span>
                                </div>
                                <?php if ($content_length > 0) : ?>
                                    <div class="full-item-desc">
                                        <div class="post-description">
                                            <?php echo wp_trim_words(get_the_excerpt(), $content_length, ''); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                    <?php
                }
                wp_reset_postdata();
                echo '</ul>';
            }
        }
    }
}