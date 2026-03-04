<?php

// Your code to enqueue parent theme styles
function solub_child_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'solub_child_styles' );


    /**
     * Add a sidebar.
     */
    function solub_child_widgets_init() {

        register_sidebar( array(
            'name'          => __( 'New Sidebar', 'solub' ),
            'id'            => 'new-sidebar',
            'description'   => __( 'This widgets will display in blog sidebar', 'solub' ),
            'before_widget' => '<div id="%1$s" class="tp-sidebar-widget mb-45 %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="tp-sidebar-widget-title">',
            'after_title'   => '</h3>',
        ) );

    }
    add_action( 'widgets_init', 'solub_child_widgets_init' );