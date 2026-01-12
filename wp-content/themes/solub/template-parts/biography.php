<?php 
    // Get the post author ID
    $author_id = get_the_author_meta('ID');

    // Get the author's avatar
    $author_avatar =  80;

    // Get the author's name
    $author_name = get_the_author_meta('display_name');

    // Get the author's bio/description
    $author_bio = get_the_author_meta('description');

    $facebook_url = get_the_author_meta('facebook_url');
    $instagram_url = get_the_author_meta('instagram_url');
    $vimeo_url = get_the_author_meta('vimeo_url');


?>

<div class="postbox-details-author-box mb-55 d-flex align-items-start">
    <div class="postbox-details-author-avatar">
        <?php echo get_avatar( get_the_author_meta( 'user_email' ), $author_avatar, '', '', [ 'class' => 'media-object img-circle' ] );?> 
    </div>
    <div class="postbox-details-author-content">
        <h5 class="postbox-details-author-title"><?php echo esc_html($author_name); ?></h5>
        <p><?php echo esc_html($author_bio); ?></p>
        <div class="postbox-details-author-social">
            <?php if($facebook_url): ?>
            <a href="<?php echo esc_url($facebook_url); ?>"><i class="fab fa-facebook-f"></i></a>
            <?php endif; ?>
            <?php if($instagram_url): ?>    
            <a href="<?php echo esc_url($instagram_url); ?>"><i class="fab fa-linkedin-in"></i></a>
            <?php endif; ?>
            <?php if($vimeo_url): ?>    
            <a href="<?php echo esc_url($vimeo_url); ?>"><i class="fab fa-vimeo-v"></i></a>
            <?php endif; ?>
        </div>
    </div>
</div>