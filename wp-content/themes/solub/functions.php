<?php

if ( ! function_exists( 'solub_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @since Twenty Fifteen 1.0
     */
    function solub_setup() {
    
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on solub, use a find and replace
         * to change 'solub' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'solub', get_template_directory() . '/languages' );
    
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
    
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded  tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );
    
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );

        // set_post_thumbnail_size( 825, 510, true );
    
        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( array(
            'main-menu' => __( 'Main Menu','solub' ),
        ) );
    
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ) );
    
        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', array(
            'image', 'video', 'gallery', 'audio',
        ) );


        remove_theme_support( 'widgets-block-editor' );
    
    }
    endif; // solub_setup
    add_action( 'after_setup_theme', 'solub_setup' ); 


    /**
     * Add a sidebar.
     */
    function solub_widgets_init() {

        register_sidebar( array(
            'name'          => __( 'Blog Sidebar', 'solub' ),
            'id'            => 'blog-sidebar',
            'description'   => __( 'This widgets will display in blog sidebar', 'solub' ),
            'before_widget' => '<div id="%1$s" class="tp-sidebar-widget mb-45 %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="tp-sidebar-widget-title">',
            'after_title'   => '</h3>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Widget 01', 'solub' ),
            'id'            => 'footer-widget-1',
            'description'   => __( 'This widgets will display in footer widget 01', 'solub' ),
            'before_widget' => '<div id="%1$s" class="tp-footer-widget tp-footer-col-1 mb-50 %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="tp-footer-widget-title">',
            'after_title'   => '</h3>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Widget 02', 'solub' ),
            'id'            => 'footer-widget-2',
            'description'   => __( 'This widgets will display in footer widget 02', 'solub' ),
            'before_widget' => '<div id="%1$s" class="tp-footer-widget tp-footer-col-2 mb-50 %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="tp-footer-widget-title">',
            'after_title'   => '</h3>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Widget 03', 'solub' ),
            'id'            => 'footer-widget-3',
            'description'   => __( 'This widgets will display in footer widget 03', 'solub' ),
            'before_widget' => '<div id="%1$s" class="tp-footer-widget tp-footer-col-3 mb-50 %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="tp-footer-widget-title">',
            'after_title'   => '</h3>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Widget 04', 'solub' ),
            'id'            => 'footer-widget-4',
            'description'   => __( 'This widgets will display in footer widget 04', 'solub' ),
            'before_widget' => '<div id="%1$s" class="tp-footer-widget tp-footer-col-4 mb-50 %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="tp-footer-widget-title">',
            'after_title'   => '</h3>',
        ) );
    }
    add_action( 'widgets_init', 'solub_widgets_init' );



    // solub_theme_scripts 
    function solub_theme_scripts() {
        
        // css files 
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '5.2.3', 'all' );
        wp_enqueue_style( 'swiper-bundle', get_template_directory_uri() . '/assets/css/swiper-bundle.css', array(), '8.2.2', 'all' );
        wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0', 'all' );
        wp_enqueue_style( 'font-awesome-pro', get_template_directory_uri() . '/assets/css/font-awesome-pro.css', array(), '1.0', 'all' );
        wp_enqueue_style( 'solub-spacing', get_template_directory_uri() . '/assets/css/spacing.css', array(), '1.0', 'all' );
        wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css', array(), '1.0', 'all' );
        wp_enqueue_style( 'nice-select', get_template_directory_uri() . '/assets/css/nice-select.css', array(), '1.0', 'all' );
        wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.0', 'all' );
        wp_enqueue_style( 'solub-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0', 'all' );
        wp_enqueue_style( 'style', get_stylesheet_uri() );
    
        // js files 
        wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri() . '/assets/js/bootstrap-bundle.js', array( 'jquery' ), 1.1, true );
        wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.js', array( 'jquery' ), 1.1, true );
        wp_enqueue_script( 'swiper-bundle', get_template_directory_uri() . '/assets/js/swiper-bundle.js', array( 'jquery' ), 1.1, true );
        wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/waypoints.js', array( 'jquery' ), 1.1, true );
        wp_enqueue_script( 'purecounter', get_template_directory_uri() . '/assets/js/purecounter.js', array( 'jquery' ), 1.1, true );
        wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.js', array( 'jquery' ), 1.1, true );
        wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js', array( 'jquery' ), 1.1, true );
        wp_enqueue_script( 'isotope-pkgd', get_template_directory_uri() . '/assets/js/isotope-pkgd.js', array( 'imagesloaded' ), 1.1, true );
        wp_enqueue_script( 'solub-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), 1.1, true );
    
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
    add_action( 'wp_enqueue_scripts', 'solub_theme_scripts' );


    if ( class_exists( 'Kirki' ) ) {
        require_once('inc/solub-kirki.php');
    }
    require_once('inc/template-function.php');
    require_once('inc/nav-walker.php');
    require_once('inc/solub-recent-post.php');
    require_once('inc/solub-cat-list.php');


/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function solub_search_form( $form ) {
	$form = '<div class="tp-sidebar-widget-content">
            <div class="tp-sidebar-search">
                <form action="' . home_url( '/' ) . '">
                <div class="tp-sidebar-search-input p-relative">
                    <input name="s" type="text" value="' . get_search_query() . '" placeholder="' . __( 'Enter your keywords...' ) . '">
                    <button class="tp-sidebar-search-btn" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M9.55005 18.1001C14.2721 18.1001 18.1001 14.2721 18.1001 9.55005C18.1001 4.82799 14.2721 1 9.55005 1C4.82799 1 1 4.82799 1 9.55005C1 14.2721 4.82799 18.1001 9.55005 18.1001Z" stroke="#1F2220" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.9992 19L17.1992 17.2" stroke="#1F2220" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg></button>
                </div>
                </form>
            </div>
        </div>';

	return $form;
}
add_filter( 'get_search_form', 'solub_search_form' );