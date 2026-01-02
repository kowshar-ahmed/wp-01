<?php
if (! defined('ABSPATH')) {
    exit;
}

/**
 * Solub Category Arrow Widget
 */
class Solub_Category_Arrow_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'solub_category_arrow',
            __('Solub Category List', 'solub'),
            array('description' => __('Display categories with arrow markup', 'solub'))
        );
    }

    /**
     * Frontend Output
     */
    public function widget($args, $instance)
    {

        echo $args['before_widget'];

        // Title
        if (! empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        $cat_limit = ! empty($instance['cat_limit']) ? absint($instance['cat_limit']) : 5;
        $order     = ! empty($instance['order']) ? $instance['order'] : 'ASC';

        $categories = get_categories(array(
            'orderby'    => 'name',
            'order'      => $order,
            'number'     => $cat_limit,
            'hide_empty' => true,
        ));

        if (! empty($categories)) : ?>
            <div class="tp-service-sidebar-content">
                <div class="tp-service-sidebar-list">
                    <ul>
                        <?php foreach ($categories as $category) : ?>
                            <li>
                                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div><?php echo esc_html($category->name); ?></div>
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
                                                <path d="M1 11L6 6L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif;

        echo $args['after_widget'];
    }

    /**
     * Backend Form
     */
    public function form($instance)
    {

        $title     = $instance['title'] ?? '';
        $cat_limit = $instance['cat_limit'] ?? 5;
        $order     = $instance['order'] ?? 'ASC';
        ?>

        <!-- Title -->
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
            <input class="widefat"
                id="<?php echo $this->get_field_id('title'); ?>"
                name="<?php echo $this->get_field_name('title'); ?>"
                type="text"
                value="<?php echo esc_attr($title); ?>">
        </p>

        <!-- Category Limit -->
        <p>
            <label for="<?php echo $this->get_field_id('cat_limit'); ?>">
                Number of Categories:
            </label>
            <input class="tiny-text"
                id="<?php echo $this->get_field_id('cat_limit'); ?>"
                name="<?php echo $this->get_field_name('cat_limit'); ?>"
                type="number"
                min="1"
                value="<?php echo esc_attr($cat_limit); ?>">
        </p>

        <!-- Order -->
        <p>
            <label for="<?php echo $this->get_field_id('order'); ?>">Order:</label>
            <select class="widefat"
                id="<?php echo $this->get_field_id('order'); ?>"
                name="<?php echo $this->get_field_name('order'); ?>">
                <option value="ASC" <?php selected($order, 'ASC'); ?>>ASC</option>
                <option value="DESC" <?php selected($order, 'DESC'); ?>>DESC</option>
            </select>
        </p>

<?php
    }

    /**
     * Save Widget
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title']     = sanitize_text_field($new_instance['title']);
        $instance['cat_limit'] = absint($new_instance['cat_limit']);
        $instance['order']     = in_array($new_instance['order'], array('ASC', 'DESC')) ? $new_instance['order'] : 'ASC';
        return $instance;
    }
}

/**
 * Register Widget
 */
function solub_register_category_arrow_widget()
{
    register_widget('Solub_Category_Arrow_Widget');
}
add_action('widgets_init', 'solub_register_category_arrow_widget');
