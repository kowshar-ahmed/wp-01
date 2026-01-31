<?php

class Solub_Recent_Post_Widget extends WP_Widget {

public function __construct() {
    parent::__construct(
        'solub_recent_post_widget',
        __('Solub Recent Post', 'text_domain'),
        array('description' => __('Display recent posts with thumbnail and date', 'text_domain'))
    );
}

public function widget($args, $instance) {
    $title = apply_filters('widget_title', $instance['title']);
    $number = !empty($instance['number']) ? absint($instance['number']) : 3;
    $order = !empty($instance['order']) ? $instance['order'] : 'DESC';

    echo $args['before_widget'];

    if (!empty($title)) {
        echo $args['before_title'] . esc_html($title) . $args['after_title'];
    }

    $recent_posts = new WP_Query(array(
        'post_type'      => 'post',
        'posts_per_page' => $number,
        'orderby'        => 'date',
        'order'          => $order,
    ));

    ?>
    <div class="tp-sidebar-widget-content">
        <div class="tp-sidebar-post">
    <?php        
    if ($recent_posts->have_posts()) {
        while ($recent_posts->have_posts()) {
            $recent_posts->the_post();
            ?>
            <div class="tp-recent-post-item d-flex align-items-center">
                <div class="tp-recent-post-thumb mr-20">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('thumbnail'); ?>
                    </a>
                </div>
                <div class="tp-recent-post-content">
                    <h3 class="tp-recent-post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <div class="tp-recent-post-meta">
                        <span><i class="fa-regular fa-clock"></i> <?php echo get_the_date(); ?></span>
                    </div>
                </div>
            </div>
            <?php
        }
        wp_reset_postdata();
    }
    ?>

    </div>
    </div>
    <?php
    echo $args['after_widget'];
}

public function form($instance) {
    $title = !empty($instance['title']) ? $instance['title'] : __('Recent Posts', 'text_domain');
    $number = !empty($instance['number']) ? absint($instance['number']) : 3;
    $order = !empty($instance['order']) ? $instance['order'] : 'DESC';
    ?>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
               name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
               value="<?php echo esc_attr($title); ?>">
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('Number of posts:'); ?></label>
        <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('number')); ?>"
               name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" step="1" min="1"
               value="<?php echo esc_attr($number); ?>" size="3">
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('order')); ?>"><?php _e('Order:'); ?></label>
        <select id="<?php echo esc_attr($this->get_field_id('order')); ?>"
                name="<?php echo esc_attr($this->get_field_name('order')); ?>" class="widefat">
            <option value="DESC" <?php selected($order, 'DESC'); ?>>Descending</option>
            <option value="ASC" <?php selected($order, 'ASC'); ?>>Ascending</option>
        </select>
    </p>
    <?php
}

public function update($new_instance, $old_instance) {
    $instance = array();
    $instance['title']  = sanitize_text_field($new_instance['title']);
    $instance['number'] = absint($new_instance['number']);
    $instance['order']  = in_array($new_instance['order'], ['ASC', 'DESC']) ? $new_instance['order'] : 'DESC';
    return $instance;
}
}

// Register the widget
function register_solub_recent_post_widget() {
register_widget('Solub_Recent_Post_Widget');
}
add_action('widgets_init', 'register_solub_recent_post_widget');
