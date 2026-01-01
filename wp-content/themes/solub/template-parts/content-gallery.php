<?php
$post_format_url = function_exists('get_field') ? get_field('format_gallery') : '';
// var_dump($post_format_url);
?>



<article id="post-<?php the_ID(); ?>" <?php echo post_class('tp-postbox-item mb-75'); ?>>
    <?php if(!empty($post_format_url)) : ?>
        <div class="tp-postbox-thumb p-relative fix">
            <div class="tp-blog-post-active swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($post_format_url as $item) : ?>
                        <div class="swiper-slide">
                            <img src="<?php echo esc_url($item['url']); ?>" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="tp-postbox-nav">
                <button type="button" class="tp-blog-prev-1">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 7H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <button type="button" class="tp-blog-next-1"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7H13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7 1L13 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg></button>
            </div>
        </div>
    <?php endif; ?>
    <div class="tp-postbox-content">
        <div class="tp-postbox-meta">
            <span><img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt=""> <?php the_author(); ?> </span>
            <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15Z" stroke="#828282" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M8 3.80005V8.00005L10.8 9.40005" stroke="#828282" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg> <?php the_date(); ?></span>
        </div>
        <h3 class="tp-postbox-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <div class="tp-postbox-text">
            <?php the_excerpt(); ?>
        </div>
        <div class="tp-postbox-read-more">
            <a class="tp-btn btn-text-flip" href="<?php the_permalink(); ?>"><span data-text="Read More"><?php echo esc_html__('Read More', 'solub'); ?></span></a>
        </div>
    </div>
</article>