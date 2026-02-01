<?php

namespace ElementorHelloWorld\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Kirki\Control\Image;

if (! defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Solub Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Solub_Portfolio_Post extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'solub-portfolio-post';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return __('Solub Portfolio Post', 'solub-core');
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-animation-text';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories()
	{
		return ['solub-category'];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends()
	{
		return ['solub-core'];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls()
	{
		$this->register_controls_section();
		$this->register_style_section();
	}

	// Title and Content Section
	protected function register_controls_section()
	{
		$this->start_controls_section(
			'post_section',
			[
				'label' => __('Portfolio Post', 'solub-core'),
			]
		);

		$this->add_control(
			'post_per_page',
			[
				'label' => __('Posts Per Page', 'solub-core'),
				'type' => Controls_Manager::NUMBER,
				'default' => __('3', 'solub-core'),
			]
		);

		$this->add_control(
			'post_include',
			[
				'label' => esc_html__('Post Include', 'textdomain'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => tp_all_post(),
			]
		);

		$this->add_control(
			'post_not_in',
			[
				'label' => esc_html__('Post Exclude', 'textdomain'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => tp_all_post(),
			]
		);

		$this->add_control(
			'order',
			[
				'label' => __('Order', 'solub-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'ASC' => __('Ascending', 'solub-core'),
					'DESC' => __('Descending', 'solub-core'),
				],
			]
		);

		$this->add_control(
			'order_by',
			[
				'label' => __('Order By', 'solub-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'title',
				'options' => [
					'date' => __('Date', 'solub-core'),
					'title' => __('Title', 'solub-core'),
					'rand' => __('Random', 'solub-core'),
					'id' => __('ID', 'solub-core'),
					'author' => __('Author', 'solub-core'),
					'comment_count' => __('Comment Count', 'solub-core'),
					'menu_order' => __('Menu Order', 'solub-core'),
					'parent' => __('Parent', 'solub-core'),
					'modified' => __('Modified', 'solub-core'),
				],
			]
		);

		$this->end_controls_section();
	}




	protected function register_style_section()
	{


		$this->start_controls_section(
			'title_section_style',
			[
				'label' => __('Title', 'solub-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_margin',
			[
				'label' => esc_html__('Margin', 'textdomain'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tp-el-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Text Color', 'textdomain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-el-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'sub_title_typography',
				'selector' => '{{WRAPPER}} .tp-el-title',
			]
		);


		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();


		// WP_Query arguments
		$args = array(
			'post_type'              => 'portfolio', // use any for any kind of post type, custom post type slug for custom post type
			'post_status'            => array('publish'), // Also support: pending, draft, auto-draft, future, private, inherit, trash, any
			'posts_per_page'         => $settings['post_per_page'], // use -1 for all post
			'order'                  => $settings['order'], // Also support: ASC
			'orderby'                => $settings['order_by'], // Also support: none, rand, id, title, slug, modified, parent, menu_order, comment_count
			'post__in' => $settings['post_include'],
			'post__not_in' => $settings['post_not_in'],
		);

		// The Query
		$query = new \WP_Query($args);

?>






		<section class="tp-portfolio-breadcrumb-ptb pt-130 pb-130">
			<div class="container">
				<div class="row">
					<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
							$categories = get_the_category();
					?>
							<div class="col-lg-4 col-md-6">
								<div class="tp-portfolio-5-item p-relative mb-30">
									<div class="tp-portfolio-5-thumb p-relative">
										<img src="assets/img/portfolio/home-3/project-3-1.jpg" alt="">
									</div>
									<div class="tp-portfolio-5-content">
										<p>Solar system</p>
										<h4 class="tp-portfolio-5-title"><a href="portfolio-details.html">Solar system</a></h4>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</section>




		<section class="tp-blog-ptb p-relative pt-140 pb-110" data-bg-color="#EBF3ED">
			<div class="container">
				<div class="row">
					<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
							$categories = get_the_category();
					?>
							<div class="col-lg-4 col-md-6">
								<div class="tp-blog-item mb-30 wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".3s">
									<div class="tp-blog-item-content mb-30">
										<div class="tp-blog-item-tags">
											<?php
											if (! empty($categories)) {
												$limited_categories = array_slice($categories, 0, 2); // Get only first two categories
												foreach ($limited_categories as $category) {
													echo '<a href="' . esc_url(get_category_link($category->term_id)) .
														'">' .
														esc_html($category->name) . '</a>';
												}
											}
											?>
										</div>
										<h4 class="tp-blog-item-title"><a class="textline" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									</div>
									<div class="tp-blog-item-thumb p-relative">
										<?php the_post_thumbnail(); ?>
										<div class="tp-blog-item-btn">
											<a href="<?php the_permalink(); ?>">Details <span><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
														<path d="M1 9L9 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
														<path d="M1 1H9V9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													</svg></span></a>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</section>




<?php

	}
}

$widgets_manager->register(new Solub_Portfolio_Post());
