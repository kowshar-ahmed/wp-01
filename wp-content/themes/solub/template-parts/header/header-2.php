<?php
$header_top_switch = get_theme_mod('header_top_switch', true);

$header_time = get_theme_mod('header_time', __('Monday - Friday : 8:30 AM to 6:30 PM', 'solub'));
$header_button = get_theme_mod('header_button', __('+999 3265 464968', 'solub'));
$header_button_url = get_theme_mod('header_button_url', __('tel:012345678', 'solub'));


// var_dump($header_time);
?>





<!-- header area start -->
<header class="tp-header-1-ptb tp-header-transparent tp-header-border">
   <div class="tp-header-main-sticky p-relative">
      <div class="container">
         <div class="d-flex justify-content-between align-items-center">
            <div class="tp-header-logo">
               <?php solub_header_logo(); ?>
            </div>
            <div class="tp-header-box d-flex align-items-center justify-content-between">
               <div class="tp-header-1-menu">
                  <div class="tp-main-menu d-none d-xl-block">
                     <nav class="tp-mobile-menu-active">
                        <?php solub_main_menu(); ?>
                     </nav>
                  </div>
               </div>
               <div class="tp-header-main-right d-flex align-items-center">

                  <div class="tp-header-right-search d-none d-md-flex align-items-center">
                     <div id="tp-header-search" class="p-relative">
                        <form action="/" method="get">
                           <div class=" tp-header-search-input">
                              <input name="s" type="text" value="<?php the_search_query(); ?>" placeholder="<?php echo esc_attr__('Search...', 'solub'); ?>">
                           </div>
                           <div class="tp-header-search-icon">
                              <span>
                                 <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.88888 18.7778C14.7981 18.7778 18.7778 14.7981 18.7778 9.88888C18.7778 4.97969 14.7981 1 9.88888 1C4.97969 1 1 4.97969 1 9.88888C1 14.7981 4.97969 18.7778 9.88888 18.7778Z" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M21 21L16.1666 16.1666" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                 </svg>
                              </span>
                           </div>
                        </form>
                     </div>
                  </div>

                  <div class="tp-header-main-right-btn d-none d-md-block">
                     <a href="<?php echo esc_url($header_button_url); ?>" class="tp-btn btn-text-flip">
                        <span data-text="Get in Touch"><?php echo esc_html($header_button); ?></span>
                     </a>
                  </div>

                  <div class="tp-header-hamburger d-xl-none offcanvas-open-btn">
                     <button class="hamburger-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>
<header class="tp-header-1-ptb p-relative tp-int-menu tp-header-sticky-cloned">
   <div class="tp-header-main-sticky tp-header-1-main p-relative">
      <div class="container">
         <div class="d-flex justify-content-between align-items-center">
            <div class="tp-header-logo">
               <?php solub_header_logo(); ?>
            </div>
            <div class="tp-header-box d-flex align-items-center justify-content-between">
               <div class="tp-header-1-menu">
                  <div class="tp-main-menu d-none d-xl-block">
                     <nav class="">
                        <?php solub_main_menu(); ?>
                     </nav>
                  </div>
               </div>
               <div class="tp-header-main-right d-flex align-items-center">
                  <div class="tp-header-right-search d-none d-md-flex align-items-center">
                     <div id="tp-header-search-3" class="p-relative">
                        <form action="/" method="get">
                           <div class="tp-header-search-input">
                              <input name="s" type="text" value="<?php the_search_query(); ?>" placeholder="<?php echo esc_attr__('Search...', 'solub'); ?>">
                              <div class="tp-header-search-icon">
                                 <span>
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M9.88888 18.7778C14.7981 18.7778 18.7778 14.7981 18.7778 9.88888C18.7778 4.97969 14.7981 1 9.88888 1C4.97969 1 1 4.97969 1 9.88888C1 14.7981 4.97969 18.7778 9.88888 18.7778Z" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                       <path d="M21 21L16.1666 16.1666" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                 </span>
                              </div>
                        </form>
                     </div>
                  </div>

                  <div class="tp-header-main-right-btn d-none d-md-block">
                     <a href="<?php echo esc_url($header_button_url); ?>" class="tp-btn btn-text-flip">
                        <span data-text="<?php echo esc_html($header_button); ?>"><?php echo esc_html($header_button); ?></span>
                     </a>
                  </div>

                  <div class="tp-header-hamburger d-xl-none offcanvas-open-btn">
                     <button class="hamburger-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>
<!-- header area end -->





<?php get_template_part('template-parts/header/offcanvas');
