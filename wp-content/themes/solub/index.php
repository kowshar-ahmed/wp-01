<?php get_header(); ?>

<section class="tp-postbox-ptb p-relative pt-130 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="tp-postbox-wrapper">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/content'); ?>
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
            <div class="col-lg-4">
                <div class="tp-sidebar-wrapper pl-45">
                    <div class="tp-sidebar-widget mb-45">
                        <div class="tp-sidebar-widget-content">
                            <div class="tp-sidebar-search">
                                <form action="#">
                                    <div class="tp-sidebar-search-input p-relative">
                                        <input type="text" placeholder="Enter your keywords...">
                                        <button class="tp-sidebar-search-btn" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M9.55005 18.1001C14.2721 18.1001 18.1001 14.2721 18.1001 9.55005C18.1001 4.82799 14.2721 1 9.55005 1C4.82799 1 1 4.82799 1 9.55005C1 14.2721 4.82799 18.1001 9.55005 18.1001Z" stroke="#1F2220" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M18.9992 19L17.1992 17.2" stroke="#1F2220" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tp-sidebar-widget mb-45">
                        <h3 class="tp-sidebar-widget-title">Latest posts</h3>
                        <div class="tp-sidebar-widget-content">
                            <div class="tp-sidebar-post">
                                <div class="tp-recent-post-item d-flex align-items-center">
                                    <div class="tp-recent-post-thumb mr-20">
                                        <a href="blog-details.html"><img src="assets/img/blog/blog-sidebar/blog-rc-1.jpg" alt=""></a>
                                    </div>
                                    <div class="tp-recent-post-content">
                                        <h3 class="tp-recent-post-title">
                                            <a href="blog-details.html">Intuitive header by choo pre-built header</a>
                                        </h3>
                                        <div class="tp-recent-post-meta">
                                            <span><i class="fa-regular fa-clock"></i> April 24, 2024</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tp-recent-post-item d-flex align-items-center">
                                    <div class="tp-recent-post-thumb mr-20">
                                        <a href="blog-details.html"><img src="assets/img/blog/blog-sidebar/blog-rc-2.jpg" alt=""></a>
                                    </div>
                                    <div class="tp-recent-post-content">
                                        <h3 class="tp-recent-post-title">
                                            <a href="blog-details.html">Gain deep insights into
                                                your website traffic</a>
                                        </h3>
                                        <div class="tp-recent-post-meta">
                                            <span><i class="fa-regular fa-clock"></i> April 24, 2024</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tp-recent-post-item d-flex align-items-center">
                                    <div class="tp-recent-post-thumb mr-20">
                                        <a href="blog-details.html"><img src="assets/img/blog/blog-sidebar/blog-rc-3.jpg" alt=""></a>
                                    </div>
                                    <div class="tp-recent-post-content">
                                        <h3 class="tp-recent-post-title">
                                            <a href="blog-details.html">Starting and growing web design in 2024</a>
                                        </h3>
                                        <div class="tp-recent-post-meta">
                                            <span><i class="fa-regular fa-clock"></i> April 24, 2024</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tp-sidebar-widget mb-45">
                        <h3 class="tp-sidebar-widget-title">Latest posts</h3>
                        <div class="tp-service-sidebar-content">
                            <div class="tp-service-sidebar-list">
                                <ul>
                                    <li><a href="#">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>Wind turbines</div>
                                                <div><svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
                                                        <path d="M1 11L6 6L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg></div>
                                            </div>
                                        </a></li>
                                    <li><a href="#">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>Panel installation</div>
                                                <div><svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
                                                        <path d="M1 11L6 6L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg></div>
                                            </div>
                                        </a></li>
                                    <li><a href="#">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>Energy consulting</div>
                                                <div><svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
                                                        <path d="M1 11L6 6L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg></div>
                                            </div>
                                        </a></li>
                                    <li><a href="#">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>Solar maintenance</div>
                                                <div><svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
                                                        <path d="M1 11L6 6L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg></div>
                                            </div>
                                        </a></li>
                                    <li><a href="#">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>Recycling products</div>
                                                <div><svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
                                                        <path d="M1 11L6 6L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg></div>
                                            </div>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="tp-sidebar-widget mb-40">
                        <h3 class="tp-sidebar-widget-title">Tags</h3>
                        <div class="tagcloud">
                            <a href="blog-details.html">Solar energy</a>
                            <a href="blog-details.html">Green</a>
                            <a href="blog-details.html">Turbines</a>
                            <a href="blog-details.html">Solutions</a>
                            <a href="blog-details.html">Recycling</a>
                            <a href="blog-details.html">Hydrocarbo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer();
