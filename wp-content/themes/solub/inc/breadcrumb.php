<?php

function solub_breadcrumb()
{
    global $post;

    if (is_front_page() && is_home()) {
        $title = __('Blog', 'exdos');
    } elseif (is_front_page()) {
        $title =  __('Blog', 'exdos');
    } elseif (is_home()) {
        if (get_option('page_for_posts')) {
            $title = get_the_title(get_option('page_for_posts'));
        }
    } elseif (is_single() && 'post' == get_post_type()) {
        $title = get_the_title();
    } elseif (is_single() && 'service' == get_post_type()) {
        $title = get_the_title();
    } elseif (is_single() && 'product' == get_post_type()) {
        $title = get_theme_mod('breadcrumb_product_details', __('Shop', 'exdos'));
    } elseif (is_search()) {
        $title = esc_html__('Search Results for : ', 'exdos') . get_search_query();
    } elseif (is_404()) {
        $title = esc_html__('404 Page not Found', 'exdos');
    } elseif (is_archive()) {
        $title = get_the_archive_title();
    } else {
        $title = get_the_title();
    }


    $breadcrumb_img = get_theme_mod('breadcrumb_img');
    $breadcrumb_img_page = function_exists('get_field') ? get_field('breadcrumb_image') : '';

    if ($breadcrumb_img_page) {
        $bg_img = $breadcrumb_img_page['url'];
    } else {
        $bg_img = $breadcrumb_img;
    }


    // var_dump($breadcrumb_img);

?>
    <!-- beadcrumb area start -->
    <div class="tp-breadcrumb__ptb tp-breadcrumb__bg p-relative z-index-1 fix" data-background="<?php echo esc_url($bg_img); ?>">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="tp-breadcrumb__content p-relative">
                        <h3 class="tp-breadcrumb__title white"><?php echo solub_kses($title); ?></h3>
                        <?php if (function_exists('bcn_display')) : ?>
                            <div class="tp-breadcrumb__list white">
                                <?php bcn_display(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- beadcrumb area end -->
<?php
}
