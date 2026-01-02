<?php
// Exit if accessed directly
if (! defined('ABSPATH')) {
    exit;
}

/**
 * Solub Recent Post Widget
 */
class Solub_Recent_Post_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'solub_recent_post',
            __('Solub Recent Post', 'solub'),
            array(
                'description' => __('Display recent posts with custom markup', 'solub')
            )
        );
    }

    /**
     * Frontend output
     */
    public function widget($args, $instance)
    {

        echo $args['before_widget'];

        // Widget title
        if (! empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        $post_count = ! empty($instance['post_count']) ? absint($instance['post_count']) : 3;
        $order      = ! empty($instance['order']) ? $instance['order'] : 'DESC';

        $query = new WP_Query(array(
            'post_type'      => 'post',
            'posts_per_page' => $post_count,
            'order'          => $order,
            'orderby'        => 'date',
        ));

?>
        <div class="tp-sidebar-widget-content">
            <div class="tp-sidebar-post">
                <?php

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post(); ?>

                        <div class="tp-recent-post-item d-flex align-items-center">
                            <div class="tp-recent-post-thumb mr-20">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail('thumbnail');
                                    } ?>
                                </a>
                            </div>
                            <div class="tp-recent-post-content">
                                <h3 class="tp-recent-post-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <div class="tp-recent-post-meta">
                                    <span>
                                        <i class="fa-regular fa-clock"></i>
                                        <?php echo get_the_date(); ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                <?php endwhile;
                    wp_reset_postdata();
                endif;

                echo $args['after_widget'];
                ?>
            </div>
        </div>
    <?php
    }


    /**
     * Backend form
     */
    public function form($instance)
    {

        $title      = ! empty($instance['title']) ? $instance['title'] : '';
        $post_count = ! empty($instance['post_count']) ? $instance['post_count'] : 3;
        $order      = ! empty($instance['order']) ? $instance['order'] : 'DESC';
    ?>

        <!-- Widget Title -->
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <?php _e('Title:', 'solub'); ?>
            </label>
            <input class="widefat"
                id="<?php echo $this->get_field_id('title'); ?>"
                name="<?php echo $this->get_field_name('title'); ?>"
                type="text"
                value="<?php echo esc_attr($title); ?>">
        </p>

        <!-- Post Count -->
        <p>
            <label for="<?php echo $this->get_field_id('post_count'); ?>">
                <?php _e('Number of posts:', 'solub'); ?>
            </label>
            <input class="tiny-text"
                id="<?php echo $this->get_field_id('post_count'); ?>"
                name="<?php echo $this->get_field_name('post_count'); ?>"
                type="number"
                step="1"
                min="1"
                value="<?php echo esc_attr($post_count); ?>">
        </p>

        <!-- Order -->
        <p>
            <label for="<?php echo $this->get_field_id('order'); ?>">
                <?php _e('Post Order:', 'solub'); ?>
            </label>
            <select class="widefat"
                id="<?php echo $this->get_field_id('order'); ?>"
                name="<?php echo $this->get_field_name('order'); ?>">
                <option value="DESC" <?php selected($order, 'DESC'); ?>>DESC</option>
                <option value="ASC" <?php selected($order, 'ASC'); ?>>ASC</option>
            </select>
        </p>

<?php
    }

    /**
     * Save options
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title']      = sanitize_text_field($new_instance['title']);
        $instance['post_count'] = absint($new_instance['post_count']);
        $instance['order']      = in_array($new_instance['order'], array('ASC', 'DESC')) ? $new_instance['order'] : 'DESC';
        return $instance;
    }
}

/**
 * Register Widget
 */
function solub_register_recent_post_widget()
{
    register_widget('Solub_Recent_Post_Widget');
}
add_action('widgets_init', 'solub_register_recent_post_widget');
