<?php get_header(); ?>


    <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <h3><?php the_title(); ?></h3>

        <?php the_content(); ?>

        <?php endwhile; ?>
        <?php endif; ?>
    </div>




<?php get_footer();