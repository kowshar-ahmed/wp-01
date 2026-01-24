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
class Solub_About extends Widget_Base
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
		return 'solub-about';
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
		return __('About', 'solub-core');
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

		$this->add_control(
			'description',
			[
				'label' => __('Content', 'solub-core'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __('Content here', 'solub-core'),
			]
		);

		$this->end_controls_section();





		$this->start_controls_section(
			'features_section',
			[
				'label' => __('Features List', 'solub-core'),
			]
		);

		$repeater = new \Elementor\Repeater();


		$repeater->add_control(
			'feature_title',
			[
				'label' => esc_html__('Title', 'textdomain'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('List Title', 'textdomain'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'item_list',
			[
				'label' => esc_html__('Repeater List', 'textdomain'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'feature_title' => esc_html__('Title #1', 'textdomain'),
					],
					[
						'feature_title' => esc_html__('Title #2', 'textdomain'),
					],
					[
						'feature_title' => esc_html__('Title #3', 'textdomain'),
					],
				],
				'title_field' => '{{{ feature_title }}}',
			]
		);

		$this->end_controls_section();




		// Video Section
		$this->start_controls_section(
			'video_section',
			[
				'label' => __('Video', 'solub-core'),
			]
		);


		$this->add_control(
			'video_text',
			[
				'label' => __('Video Text', 'solub-core'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Video text here', 'solub-core'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'video_url',
			[
				'label' => __('Video URL', 'solub-core'),
				'type' => Controls_Manager::TEXT,
				'default' => __('#', 'solub-core'),
				'label_block' => true,
			]
		);

		$this->end_controls_section();




		// Image Section 
		$this->start_controls_section(
			'image_section',
			[
				'label' => __('Image', 'solub-core'),
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__('Choose Image', 'textdomain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'image_two',
			[
				'label' => esc_html__('Choose Image 2', 'textdomain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();




		// Button Section
		$this->start_controls_section(
			'button_section',
			[
				'label' => __('Button', 'solub-core'),
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => __('Button Text', 'solub-core'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Button Text', 'solub-core'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'button_link',
			[
				'label' => esc_html__('Link', 'textdomain'),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => ['url', 'is_external', 'nofollow'],
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->end_controls_section();




		// Info Section
		$this->start_controls_section(
			'Info_section',
			[
				'label' => __('Info', 'solub-core'),
			]
		);

		$this->add_control(
			'info_text',
			[
				'label' => __('Info Text', 'solub-core'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __('Info Text', 'solub-core'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'info_number',
			[
				'label' => __('Info Number', 'solub-core'),
				'type' => Controls_Manager::TEXT,
				'default' => __('51,202,65+', 'solub-core'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'info_sub_text',
			[
				'label' => __('Info Title', 'solub-core'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Sub Title', 'solub-core'),
				'label_block' => true,
			]
		);

		$this->end_controls_section();
	}




	protected function register_style_section()
	{
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

		if (! empty($settings['button_link'])) {
			$this->add_link_attributes('button_arg', $settings['button_link']);
			$this->add_render_attribute('button_arg', 'class', 'tp-btn btn-text-flip');
		}

?>




		<section class="tp-about-ptb p-relative fix pt-140 pb-140">
			<div class="tp-about-shape d-none d-xxl-block">
				<div class="tp-about-shape-1">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/about/about-shape-1.png" alt="">
				</div>
				<div class="tp-about-shape-2">
					<img class="animation-rotation" src="<?php echo get_template_directory_uri(); ?>/assets/img/about/about-shape-2.png" alt="">
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="tp-about-thumb-wrap mb-40 p-relative">
							<div class="tp-about-icon p-absolute">
								<div class="tp-about-icon-space p-relative d-inline-block">
									<img class="tp-rotate-infinite" src="<?php echo get_template_directory_uri(); ?>/assets/img/about/about-text.png" alt="text">
									<img class="position-middle" src="<?php echo get_template_directory_uri(); ?>/assets/img/about/about-text-shape.png" alt="thumb">
								</div>
							</div>
							<div class="tp-about-thumb pr-160 wow img-custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.1s">
								<img class="w-100" src="<?php echo $settings['image']['url']; ?>" alt="">
							</div>
							<div class="tp-about-thumb-2 p-absolute wow img-custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.3s">
								<img class="w-100" src="<?php echo $settings['image_two']['url']; ?>" alt="">
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="tp-about-content wow fadeInRight" data-wow-duration=".9s" data-wow-delay=".3s">
							<div class="tp-about-heading mb-35">
								<?php if ($settings['sub_title']) : ?>
									<span class="tp-section-title-pre"><?php echo solub_core_kses($settings['sub_title']); ?></span>
								<?php endif; ?>

								<?php if ($settings['title']) : ?>
									<h4 class="tp-section-title mb-30"><?php echo solub_core_kses($settings['title']); ?> <br>
									</h4>
								<?php endif; ?>

								<?php if ($settings['description']) : ?>
									<p><?php echo solub_core_kses($settings['description']); ?></p>
								<?php endif; ?>
							</div>
							<div class="tp-about-list">
								<ul>
									<?php foreach($settings['item_list'] as $item) : ?>
									<li><span><svg xmlns="http://www.w3.org/2000/svg" width="11" height="9" viewBox="0 0 11 9" fill="none">
												<path d="M9.5451 1.27344L3.9201 7.04884L1.36328 4.42366" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
											</svg></span><?php echo solub_core_kses($item['feature_title']); ?></li>
									<?php endforeach; ?>
								</ul>
							</div>
							<div class="tp-about-btn-box d-flex align-items-center">

								<div class="tp-hero-btn">
									<a <?php echo $this->get_render_attribute_string('button_arg'); ?>>
										<span data-text="<?php echo esc_html($settings['button_text']); ?>">
											<?php echo esc_html($settings['button_text']); ?></span>
									</a>
								</div>
								<div class="tp-about-video-btn-box d-flex align-items-center">
									<a class="tp-hero-btn-video popup-video d-flex align-items-center" href="<?php echo esc_html($settings['video_url']) ?>">
										<span><svg xmlns=" http://www.w3.org/2000/svg" width="21" height="23" viewBox="0 0 21 23" fill="none">
										<g filter="url(#filter0_d_1_4493)">
											<path d="M17 7.56533L4.14619 14.9831L4.14619 0.147537L17 7.56533Z" fill="currentColor" />
										</g>
										<defs>
											<filter id="filter0_d_1_4493" x="0.145996" y="0.147461" width="20.854" height="22.8357" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
												<feFlood flood-opacity="0" result="BackgroundImageFix" />
												<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
												<feOffset dy="4" />
												<feGaussianBlur stdDeviation="2" />
												<feComposite in2="hardAlpha" operator="out" />
												<feColorMatrix type="matrix" values="0 0 0 0 0.533333 0 0 0 0 0.15451 0 0 0 0 0.0222222 0 0 0 0.3 0" />
												<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_4493" />
												<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_4493" result="shape" />
											</filter>
										</defs>
										</svg></span>
									</a>
									<div class="tp-about-video-btn-text">
										<span><?php echo solub_core_kses($settings['video_text']); ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>



<?php

	}
}

$widgets_manager->register(new Solub_About());
