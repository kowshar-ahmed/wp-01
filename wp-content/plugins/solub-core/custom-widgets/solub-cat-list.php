<?php

class Solub_Category_List_Widget extends WP_Widget {

public function __construct() {
    parent::__construct(
        'solub_category_list_widget',
        __('Solub Category List', 'text_domain'),
        array('description' => __('Displays a list of categories with custom design', 'text_domain'))
    );
}

public function widget($args, $instance) {
    $title = apply_filters('widget_title', $instance['title']);
    $number = !empty($instance['number']) ? absint($instance['number']) : 5;

    echo $args['before_widget'];

    if (!empty($title)) {
        echo $args['before_title'] . esc_html($title) . $args['after_title'];
    }

    $categories = get_categories(array(
        'orderby'     => 'name',
        'order'       => 'ASC',
        'number'      => $number,
        'hide_empty'  => true,
    ));

    if (!empty($categories)) {
        echo '<div class="tp-service-sidebar-content">
        <div class="tp-service-sidebar-list"><ul>';
        foreach ($categories as $category) {
            $category_link = get_category_link($category->term_id);
            ?>
            <li><a href="<?php echo esc_url($category_link); ?>">
                <div class="d-flex justify-content-between align-items-center">
                    <div><?php echo esc_html($category->name); ?></div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
                            <path d="M1 11L6 6L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                </div>
            </a></li>
            <?php
        }
        echo '</ul></div></div>';
    }

    echo $args['after_widget'];
}

public function form($instance) {
    $title = !empty($instance['title']) ? $instance['title'] : __('Categories', 'text_domain');
    $number = !empty($instance['number']) ? absint($instance['number']) : 5;
    ?>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
               name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
               value="<?php echo esc_attr($title); ?>">
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('Number of categories:'); ?></label>
        <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('number')); ?>"
               name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" step="1" min="1"
               value="<?php echo esc_attr($number); ?>" size="3">
    </p>
    <?php
}

public function update($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = sanitize_text_field($new_instance['title']);
    $instance['number'] = absint($new_instance['number']);
    return $instance;
}
}

// Register the widget
function register_solub_category_list_widget() {
register_widget('Solub_Category_List_Widget');
}
add_action('widgets_init', 'register_solub_category_list_widget');
