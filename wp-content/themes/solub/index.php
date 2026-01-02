<?php get_header(); ?>

<section class="tp-postbox-ptb p-relative pt-130 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="tp-postbox-wrapper">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/content', get_post_format()); ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="tp-pagination pt-30">
                        <nav>
                            <ul>

                                <li>
                                    <a href="#">1</a>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    <a href="#">3</a>
                                </li>
                                <li>
                                    <a href="#" class="next-page-number current">
                                        Next
                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.9998 6.77883L1 6.77883" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M8.75684 1.55767L14.0001 6.7784L8.75684 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
            <?php if (
                is_active_sidebar('blog-sidebar')) : ?>
            <div class="col-lg-4">
                <div class="tp-sidebar-wrapper pl-45">
                    <?php get_sidebar(); ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer();
