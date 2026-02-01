<?php



function portfolio_page_template($template)
{
    if (is_singular('Portfolios')) {
        $new_template = __DIR__ . '/single/Portfolios-single.php';
        if ('' != $new_template) {
            return $new_template;
        }
    }
    return $template;
}
add_filter('template_include', 'portfolio_page_template', 99);




/**
 * Register Custom Post Type: Portfolios
 * Taxonomy: Portfolio Categories
 * Text Domain: solub-core
 */

if (! defined('ABSPATH')) exit;

function solub_core_register_portfolio_post_type()
{

    $labels = array(
        'name'                  => esc_html__('Portfolios', 'solub-core'),
        'singular_name'         => esc_html__('Portfolio', 'solub-core'),
        'menu_name'             => esc_html__('Portfolios', 'solub-core'),
        'name_admin_bar'        => esc_html__('Portfolio', 'solub-core'),
        'add_new'               => esc_html__('Add New', 'solub-core'),
        'add_new_item'          => esc_html__('Add New Portfolio', 'solub-core'),
        'new_item'              => esc_html__('New Portfolio', 'solub-core'),
        'edit_item'             => esc_html__('Edit Portfolio', 'solub-core'),
        'view_item'             => esc_html__('View Portfolio', 'solub-core'),
        'all_items'             => esc_html__('All Portfolios', 'solub-core'),
        'search_items'          => esc_html__('Search Portfolios', 'solub-core'),
        'not_found'             => esc_html__('No Portfolios found.', 'solub-core'),
        'not_found_in_trash'    => esc_html__('No Portfolios found in Trash.', 'solub-core'),
        'parent_item_colon'     => esc_html__('Parent Portfolio:', 'solub-core'),
        'featured_image'        => esc_html__('Portfolio Image', 'solub-core'),
        'set_featured_image'    => esc_html__('Set Portfolio image', 'solub-core'),
        'remove_featured_image' => esc_html__('Remove Portfolio image', 'solub-core'),
        'use_featured_image'    => esc_html__('Use as Portfolio image', 'solub-core'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'Portfolios'),
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-admin-tools',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
        'show_in_rest'       => true,
    );

    register_post_type('portfolio', $args);


    /**
     * Taxonomy: Portfolio Categories
     */
    $tax_labels = array(
        'name'              => esc_html__('Portfolio Categories', 'solub-core'),
        'singular_name'     => esc_html__('Portfolio Category', 'solub-core'),
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
        'rewrite'           => array('slug' => 'portfolio-category'),
        'show_in_rest'      => true,
    );

    register_taxonomy('portfolio_category', array('portfolio'), $tax_args);
}
add_action('init', 'solub_core_register_portfolio_post_type');