<?php get_header(); ?>


<section class="tp-service-details-ptb pt-130 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="tp-service-sidebar mb-50">
                        <?php dynamic_sidebar('services-sidebar'); ?>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="tp-service-details-right-wrap">
                    <div class="tp-service-details-thumb mb-50">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="tp-service-details-content mb-45">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>