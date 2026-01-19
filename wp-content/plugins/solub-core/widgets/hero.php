<?php

namespace ElementorHelloWorld\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (! defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Solub Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Solub_hero extends Widget_Base
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
		return 'Solub-hero';
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
		return __('Hero', 'solub-core');
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
		$this->start_controls_section(
			'title_section',
			[
				'label' => __('Title and Content', 'solub-core'),
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => __('Sub Title', 'solub-core'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Sub Title', 'solub-core'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __('Title', 'solub-core'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __('Title here', 'solub-core'),

			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __('Style', 'solub-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_transform',
			[
				'label' => __('Text Transform', 'solub-core'),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __('None', 'solub-core'),
					'uppercase' => __('UPPERCASE', 'solub-core'),
					'lowercase' => __('lowercase', 'solub-core'),
					'capitalize' => __('Capitalize', 'solub-core'),
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
				],
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
?>
		



		<section class="tp-hero-ptb tp-hero-hight p-relative" data-background="assets/img/hero/hero-bg-1.jpg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="tp-hero-content p-relative">
							<div class="tp-hero-heading">
								<span class="tp-hero-heading-subtitle wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".3s">
									<?php echo solub_core_kses($settings['sub_title']); ?>
								</span>
								<h3 class="tp-hero-heading-title wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".5s"><?php echo solub_core_kses($settings['title']); ?></h3>
							</div>
							<div class="tp-hero-btn-box d-flex align-items-center wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".7s">
								<div class="tp-hero-btn">
									<a class="tp-btn btn-2 btn-text-flip" href="about.html"><span data-text="Discover More">Discover More</span></a>
								</div>
								<a class="tp-hero-btn-video popup-video d-flex align-items-center" href="https://www.youtube.com/watch?v=go7QYaQR494"><span><svg width="11" height="14" viewBox="0 0 11 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M11 7L0.5 13.0622V0.937822L11 7Z" fill="currentColor" />
										</svg></span>
									<img src="assets/img/hero/video-text.svg" alt="">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tp-hero-item wow fadeInRight" data-wow-duration=".9s" data-wow-delay=".3s">
				<div class="tp-hero-item-content">
					<span>Since 2012, our happy <br>
						customers have avoided.</span>
				</div>
				<div class="tp-hero-item-user-box">
					<div class="tp-hero-item-user d-flex align-items-center">
						<div class="tp-hero-item-user-icon">
							<span><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
									<path d="M3.58123 7.25559C3.38775 7.25559 3.19396 7.18418 3.0426 7.04013C2.7301 6.74289 2.71789 6.2482 3.01544 5.9357L3.0371 5.91282C3.33557 5.60123 3.82995 5.59024 4.14184 5.8884C4.45342 6.18686 4.46441 6.68125 4.16595 6.99314L4.14733 7.01297C3.99383 7.17411 3.78753 7.25559 3.58123 7.25559Z" fill="white" />
									<path d="M24.3298 40C20.7022 40 17.3251 38.3102 15.1489 35.4431C13.5983 36.3821 11.8338 36.875 10 36.875C4.50562 36.875 0.0357055 32.4051 0.0357055 26.9107C0.0357055 24.4882 0.89386 22.1988 2.46643 20.3882C0.870972 18.4393 0 16.0107 0 13.4732C0 11.8201 0.360107 10.2313 1.07025 8.75122C1.25671 8.36243 1.72333 8.19794 2.11243 8.38501C2.50153 8.57178 2.66541 9.03839 2.47894 9.42749C1.87073 10.6946 1.5625 12.0557 1.5625 13.4732C1.5625 15.8578 2.46002 18.1302 4.08936 19.8712C4.37775 20.1791 4.3692 20.6604 4.07043 20.9586C2.4762 22.5467 1.5979 24.6606 1.5979 26.9107C1.59821 31.5436 5.36713 35.3125 10 35.3125C11.7691 35.3125 13.4613 34.769 14.8941 33.7405C15.0668 33.6163 15.2826 33.5681 15.4916 33.6069C15.7007 33.6453 15.885 33.7677 16.0022 33.9453C17.8546 36.7581 20.9677 38.4375 24.3301 38.4375C29.0887 38.4375 33.2016 35.0528 34.1098 30.3891C34.166 30.1001 34.3802 29.8669 34.6637 29.787C36.8857 29.158 38.4375 27.1054 38.4375 24.7946C38.4375 23.028 37.5497 21.3986 36.0629 20.4361C35.8743 20.314 35.7474 20.1169 35.7147 19.8944C35.6818 19.6722 35.7462 19.4467 35.8914 19.2752C37.5333 17.3364 38.4375 14.8682 38.4375 12.3248C38.4375 6.39038 33.6096 1.5625 27.6752 1.5625C23.9771 1.5625 20.5811 3.42743 18.5913 6.55151C18.4659 6.74866 18.2587 6.87927 18.0264 6.90735C17.7945 6.93542 17.5623 6.85822 17.3932 6.69708C15.6433 5.02716 13.3475 4.10767 10.928 4.10767C9.37469 4.10767 7.83661 4.49524 6.4798 5.22919C6.10016 5.43457 5.62622 5.29327 5.42084 4.91364C5.21576 4.534 5.35675 4.06006 5.73639 3.85498C7.32086 2.99805 9.11591 2.54517 10.928 2.54517C13.4457 2.54517 15.8493 3.39874 17.7878 4.96552C20.1108 1.84021 23.7436 0 27.6752 0C34.4711 0 40 5.52887 40 12.3248C40 14.9591 39.1525 17.5238 37.5992 19.6329C39.1159 20.9085 40 22.7829 40 24.7946C40 27.6407 38.1906 30.1859 35.545 31.1435C34.3219 36.3028 29.6783 40 24.3298 40Z" fill="white" />
									<path d="M27.6752 5.78125H27.6694C27.2385 5.77789 26.886 5.42633 26.8884 4.99542C26.8909 4.56573 27.2458 4.21875 27.6752 4.21875H27.6782C28.1091 4.22028 28.4631 4.57062 28.4622 5.00153C28.4616 5.43243 28.1061 5.78125 27.6752 5.78125Z" fill="white" />
									<path d="M35 13.1061C34.5685 13.1061 34.2187 12.7561 34.2187 12.3248C34.2187 9.83278 32.7688 7.52016 30.5252 6.43251C30.137 6.24453 29.9747 5.777 30.163 5.38881C30.3509 5.00063 30.8185 4.83858 31.2067 5.02657C32.5571 5.68117 33.6987 6.69649 34.5087 7.96297C35.3412 9.26455 35.7812 10.773 35.7812 12.3248C35.7812 12.7561 35.4315 13.1061 35 13.1061Z" fill="white" />
									<path d="M10 32.6562C6.83167 32.6562 4.25446 30.0787 4.25446 26.9107C4.25446 26.4792 4.60419 26.1294 5.03571 26.1294C5.46722 26.1294 5.81696 26.4792 5.81696 26.9107C5.81696 29.2172 7.69348 31.0937 10 31.0937C10.4315 31.0937 10.7812 31.4435 10.7812 31.875C10.7812 32.3065 10.4315 32.6562 10 32.6562Z" fill="white" />
									<path d="M23.4631 23.8367C20.4477 23.8367 17.9944 21.3834 17.9944 18.3679C17.9944 15.3525 20.4477 12.8992 23.4631 12.8992C26.4789 12.8992 28.9319 15.3525 28.9319 18.3679C28.9319 21.3834 26.4789 23.8367 23.4631 23.8367ZM23.4631 14.4617C21.3095 14.4617 19.5569 16.214 19.5569 18.3679C19.5569 20.5219 21.3095 22.2742 23.4631 22.2742C25.6171 22.2742 27.3694 20.5219 27.3694 18.3679C27.3694 16.214 25.6171 14.4617 23.4631 14.4617Z" fill="white" />
									<path d="M12.3685 23.8342C10.9683 23.8342 9.56788 23.301 8.50159 22.2351C6.36933 20.1028 6.36933 16.6333 8.50159 14.501C10.6339 12.3687 14.1034 12.3687 16.2357 14.501C16.5408 14.8062 16.5408 15.3009 16.2357 15.606C15.9305 15.9109 15.4358 15.9109 15.1306 15.606C14.393 14.8681 13.4119 14.4616 12.3685 14.4616C11.3254 14.4616 10.3442 14.8681 9.60663 15.606C8.0835 17.1289 8.0835 19.6072 9.60663 21.13C10.3442 21.8679 11.3254 22.2741 12.3685 22.2741C13.4119 22.2741 14.393 21.8679 15.1306 21.13C15.4358 20.8252 15.9305 20.8252 16.2357 21.13C16.5408 21.4352 16.5408 21.9299 16.2357 22.2351C15.1694 23.301 13.7689 23.8342 12.3685 23.8342Z" fill="white" />
									<path d="M32.319 27.1008H29.8077C29.4702 27.1008 29.1708 26.8839 29.0656 26.5631C28.9603 26.2424 29.0732 25.8902 29.3451 25.69C30.0601 25.162 31.5375 23.7646 31.5375 22.8168C31.5375 22.5165 31.46 22.3425 31.0632 22.3425C30.802 22.3425 30.589 22.5552 30.589 22.8168C30.589 23.2483 30.2393 23.598 29.8077 23.598C29.3765 23.598 29.0265 23.2483 29.0265 22.8168C29.0265 21.6937 29.9402 20.78 31.0632 20.78C32.2815 20.78 33.1 21.5985 33.1 22.8168C33.1 23.8083 32.4722 24.783 31.8051 25.5383H32.3187C32.7502 25.5383 33.1 25.8881 33.1 26.3196C33.1 26.7511 32.7502 27.1008 32.319 27.1008Z" fill="white" />
								</svg></span>
						</div>
						<div class="tp-hero-item-user-content">
							<h4 class="tp-hero-item-user-title">51,202,65+</h4>
							<p>Pounds of CO2</p>
						</div>
					</div>
				</div>
			</div>
		</section>

<?php

	}
}

$widgets_manager->register(new Solub_hero());
