<?php


// menu 
function solub_main_menu(){
    wp_nav_menu(array(
        'theme_location' => 'main-menu',
        'container'     => '',
        'menu_class'    => '',
        'fallback_cb'   => 'Solub_Walker_Nav_Menu::fallback',
        'walker'        => new Solub_Walker_Nav_Menu,
    ));
}

// solub_header_logo
function solub_header_logo(){ 
    $solub_logo_black = get_theme_mod('solub_logo_black', get_template_directory_uri().'/assets/img/logo/logo-black.png');
    ?>

    <a href="<?php home_url(); ?>">
        <img data-width="130" src="<?php echo esc_url($solub_logo_black); ?>" alt="">
    </a>
    
    <?php 
}

// solub_header_social 
function solub_header_social(){ 
    $social_fb = get_theme_mod('social_fb',__('#','solub'));
    $social_x = get_theme_mod('social_x',__('#','solub'));
    $social_in = get_theme_mod('social_in',__('#','solub'));
    $social_pin = get_theme_mod('social_pin',__('#','solub'));
    
    ?>

    <?php if($social_fb): ?>
    <a href="<?php echo esc_url($social_fb); ?>"><i class="fa-brands fa-facebook"></i></a>
    <?php endif; ?>

    <?php if($social_x): ?>
    <a href="<?php echo esc_url($social_x); ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path></svg></a>
    <?php endif; ?>

    <?php if($social_in): ?>
    <a href="<?php echo esc_url($social_in); ?>"><i class="fa-brands fa-instagram"></i></a>
    <?php endif; ?>

    <?php if($social_pin): ?>
    <a href="<?php echo esc_url($social_pin); ?>"><i class="fa-brands fa-pinterest"></i></a>
    <?php endif; ?>
<?php
}

function solub_footer_copyright(){ 
    $footer_copyright = get_theme_mod('footer_copyright',__('Copyright © 2024 Solub. All Rights Reserved.','solub'));
?>

<p><?php echo esc_html($footer_copyright); ?></p>

<?php
}

// solub_footer_social 
function solub_footer_social(){ 
    $social_foo_fb = get_theme_mod('social_foo_fb',__('#','solub'));
    $social_foo_x = get_theme_mod('social_foo_x',__('#','solub'));
    $social_foo_in = get_theme_mod('social_foo_in',__('#','solub'));
    $social_foo_pin = get_theme_mod('social_foo_pin',__('#','solub'));
    $social_foo_ln = get_theme_mod('social_foo_ln',__('#','solub'));
    
    ?>
        <?php if($social_foo_fb): ?>
        <a href="<?php echo esc_url($social_foo_fb); ?>"><i class="fa-brands fa-facebook"></i></a>
        <?php endif; ?>


        <?php if($social_foo_in): ?>
        <a href="<?php echo esc_url($social_foo_in); ?>"><i class="fa-brands fa-instagram"></i></a>
        <?php endif; ?>

        <?php if($social_foo_ln): ?>
        <a href="<?php echo esc_url($social_foo_ln); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="currentColor">
            <path d="M0.0308789 3.37631H2.96437V12.6612H0.0308789V3.37631ZM8.98575 3.37631C8.84165 3.37631 8.69755 3.3851 8.55344 3.40269C8.42993 3.42027 8.30641 3.44665 8.1829 3.48182C8.05938 3.51699 7.95645 3.55216 7.87411 3.58733C7.79177 3.60491 7.68884 3.64887 7.56532 3.71921C7.44181 3.77197 7.35946 3.80714 7.31829 3.82472C7.2977 3.84231 7.22565 3.89506 7.10214 3.98299C6.97862 4.07091 6.91686 4.11488 6.91686 4.11488V3.37631H3.98337V12.6612H6.91686V6.80537C6.91686 6.78779 6.91686 6.75262 6.91686 6.69986C6.91686 6.64711 6.93745 6.55039 6.97862 6.40971C7.04038 6.26903 7.11243 6.15473 7.19477 6.0668C7.2977 5.96129 7.4521 5.86458 7.65796 5.77665C7.8844 5.68873 8.14173 5.64477 8.42993 5.64477C8.92399 5.64477 9.28424 5.75027 9.51069 5.96129C9.75772 6.17231 9.88124 6.45367 9.88124 6.80537V12.6612H13V6.91088C13 6.29541 12.8868 5.76786 12.6603 5.32824C12.4339 4.87103 12.1663 4.52812 11.8575 4.29952C11.5693 4.05333 11.2193 3.85989 10.8076 3.71921C10.4165 3.56095 10.0768 3.46423 9.7886 3.42906C9.52098 3.39389 9.25337 3.37631 8.98575 3.37631ZM0.432304 0.369284C0.144101 0.615473 0 0.914417 0 1.26612C0 1.61781 0.144101 1.91676 0.432304 2.16295C0.720507 2.40914 1.07047 2.53223 1.48219 2.53223C1.8939 2.53223 2.24386 2.40914 2.53207 2.16295C2.82027 1.91676 2.96437 1.61781 2.96437 1.26612C2.96437 0.914417 2.82027 0.615473 2.53207 0.369284C2.24386 0.123095 1.8939 0 1.48219 0C1.07047 0 0.720507 0.123095 0.432304 0.369284Z" fill="currentColor"/>
            </svg></a>
        <?php endif; ?>

        <?php if($social_foo_x): ?>    
        <a href="<?php echo esc_url($social_foo_x); ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15px" height="15px"><path d="M 4.4042969 3 C 3.7572969 3 3.3780469 3.7287656 3.7480469 4.2597656 L 9.7363281 12.818359 L 3.7246094 19.845703 C 3.3356094 20.299703 3.6578594 21 4.2558594 21 L 4.9199219 21 C 5.2129219 21 5.4916406 20.871437 5.6816406 20.648438 L 10.919922 14.511719 L 14.863281 20.146484 C 15.238281 20.680484 15.849953 21 16.501953 21 L 19.835938 21 C 20.482937 21 20.862187 20.272188 20.492188 19.742188 L 14.173828 10.699219 L 19.900391 3.9902344 C 20.232391 3.6002344 19.955359 3 19.443359 3 L 18.597656 3 C 18.305656 3 18.027891 3.1276094 17.837891 3.3496094 L 12.996094 9.0097656 L 9.3945312 3.8554688 C 9.0205313 3.3194687 8.4098594 3 7.7558594 3 L 4.4042969 3 z" fill="currentcolor"></path></svg></a>
        <?php endif; ?>
<?php
}


// solub tags 
function solub_tags(){

	$post_tags = get_the_tags();

    if ($post_tags) {
        foreach ($post_tags as $item) {
            ?>
            <a href="<?php echo get_tag_link($item); ?>"><?php echo esc_html( $item->name); ?></a>
            <?php
        }
    } else {
        ?>
        <i>No tags found</i>
        <?php
    }
}

// solub_pagination
function solub_pagination() {
    $pages = paginate_links( array(
        'type'      => 'array',
        'prev_text' => '<i class="fal fa-long-arrow-left"></i>',
        'next_text' => '<i class="fal fa-long-arrow-right"></i>',
    ) );
    if ( $pages ) {
        echo '<ul>';
        foreach ( $pages as $page ) {
            echo '<li>' . $page . '</li>';
        }
        echo '</ul>';
    }
}