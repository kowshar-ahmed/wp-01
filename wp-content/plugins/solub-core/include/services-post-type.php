<?php



function service_page_template($template)
{
    if (is_singular('services')) {
        $new_template = __DIR__ . '/single/services-single.php';
        if ('' != $new_template) {
            return $new_template;
        }
    }
    return $template;
}
add_filter('template_include', 'service_page_template', 99);




/**
 * Register Custom Post Type: Services
 * Taxonomy: Service Categories
 * Text Domain: solub-core
 */

if (! defined('ABSPATH')) exit;

function solub_core_register_services_post_type()
{

    $labels = array(
        'name'                  => esc_html__('Services', 'solub-core'),
        'singular_name'         => esc_html__('Service', 'solub-core'),
        'menu_name'             => esc_html__('Services', 'solub-core'),
        'name_admin_bar'        => esc_html__('Service', 'solub-core'),
        'add_new'               => esc_html__('Add New', 'solub-core'),
        'add_new_item'          => esc_html__('Add New Service', 'solub-core'),
        'new_item'              => esc_html__('New Service', 'solub-core'),
        'edit_item'             => esc_html__('Edit Service', 'solub-core'),
        'view_item'             => esc_html__('View Service', 'solub-core'),
        'all_items'             => esc_html__('All Services', 'solub-core'),
        'search_items'          => esc_html__('Search Services', 'solub-core'),
        'not_found'             => esc_html__('No services found.', 'solub-core'),
        'not_found_in_trash'    => esc_html__('No services found in Trash.', 'solub-core'),
        'parent_item_colon'     => esc_html__('Parent Service:', 'solub-core'),
        'featured_image'        => esc_html__('Service Image', 'solub-core'),
        'set_featured_image'    => esc_html__('Set service image', 'solub-core'),
        'remove_featured_image' => esc_html__('Remove service image', 'solub-core'),
        'use_featured_image'    => esc_html__('Use as service image', 'solub-core'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'services'),
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-admin-tools',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
        'show_in_rest'       => true,
    );

    register_post_type('services', $args);


    /**
     * Taxonomy: Service Categories
     */
    $tax_labels = array(
        'name'              => esc_html__('Service Categories', 'solub-core'),
        'singular_name'     => esc_html__('Service Category', 'solub-core'),
        'search_items'      => esc_html__('Search Categories', 'solub-core'),
        'all_items'         => esc_html__('All Categories', 'solub-core'),
        'parent_item'       => esc_html__('Parent Category', 'solub-core'),
        'parent_item_colon' => esc_html__('Parent Category:', 'solub-core'),
        'edit_item'         => esc_html__('Edit Category', 'solub-core'),
        'update_item'       => esc_html__('Update Category', 'solub-core'),
        'add_new_item'      => esc_html__('Add New Category', 'solub-core'),
        'new_item_name'     => esc_html__('New Category Name', 'solub-core'),
        'menu_name'         => esc_html__('Categories', 'solub-core'),
    );

    $tax_args = array(
        'hierarchical'      => true, // like categories
        'labels'            => $tax_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'service-category'),
        'show_in_rest'      => true,
    );

    register_taxonomy('service_category', array('services'), $tax_args);
}
add_action('init', 'solub_core_register_services_post_type');
