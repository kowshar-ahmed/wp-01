<?php

class Solub_Services_Post_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'solub_services_post_widget',
            __('Solub Services Post', 'text_domain'),
            array('description' => __('Display recent services with List', 'text_domain'))
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        $number = !empty($instance['number']) ? absint($instance['number']) : 3;
        $order = !empty($instance['order']) ? $instance['order'] : 'DESC';

        echo $args['before_widget'];

        if (!empty($title)) {
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }

        $recent_posts = new WP_Query(array(
            'post_type'      => 'services',
            'posts_per_page' => $number,
            'orderby'        => 'date',
            'order'          => $order,
        ));

?>



        <div class="tp-service-sidebar-list">
            <ul>
                <?php
                if ($recent_posts->have_posts()) {
                    while ($recent_posts->have_posts()) {
                        $recent_posts->the_post();
                ?>
                        <li>
                            <a href="<?php the_permalink(); ?>">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><?php the_title(); ?></div>
                                    <div><svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
                                            <path d="M1 11L6 6L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg></div>
                                </div>
                            </a>
                        </li>
                <?php
                    }
                    wp_reset_postdata();
                }
                ?>
            </ul>
        </div>




    <?php
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : __('Services Posts', 'text_domain');
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

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title']  = sanitize_text_field($new_instance['title']);
        $instance['number'] = absint($new_instance['number']);
        $instance['order']  = in_array($new_instance['order'], ['ASC', 'DESC']) ? $new_instance['order'] : 'DESC';
        return $instance;
    }
}

// Register the widget
function register_solub_services_post_widget()
{
    register_widget('Solub_Services_Post_Widget');
}
add_action('widgets_init', 'register_solub_services_post_widget');
