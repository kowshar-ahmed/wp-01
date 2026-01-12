<?php get_header(); ?>


    <section class="tp-postbox-ptb tp-single-post-area p-relative pt-130 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="postbox-details-wrapper">
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part('template-parts/content', get_post_format()); ?> 
                            
                            <?php echo get_template_part('template-parts/biography'); ?>  
                            <!-- Comments Section -->
                            <?php if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                            endif; ?>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if(is_active_sidebar( 'blog-sidebar' )) : ?>
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