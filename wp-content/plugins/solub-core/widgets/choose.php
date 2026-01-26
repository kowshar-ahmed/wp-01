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
class Solub_Choose extends Widget_Base
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
		return 'solub-choose';
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
		return __('choose', 'solub-core');
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

		$this->add_control(
			'section_lg_text',
			[
				'label' => __('Large Text', 'solub-core'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __('Solub Hub', 'solub-core'),

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






		// Experience Section
		$this->start_controls_section(
			'exp_section',
			[
				'label' => __('Experience', 'solub-core'),
			]
		);


		$this->add_control(
			'exp_number',
			[
				'label' => __('Experience Number', 'solub-core'),
				'type' => Controls_Manager::TEXT,
				'default' => __('12', 'solub-core'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'exp_text',
			[
				'label' => __('Experience Text', 'solub-core'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Years Experience', 'solub-core'),
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

?>






		<section class="tp-chose-ptb p-relative pb-120">
			<div class="tp-chose-section-text">
				<h1><?php echo esc_html($settings['section_lg_text']); ?></h1>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-5">
						<div class="tp-chose-thumb-wrap p-relative">
							<div class="wow img-custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.1s">
								<img src="<?php echo $settings['image']['url']; ?>" alt="">
							</div>
							<div class="tp-chose-expreance">
								<h2 class="tp-chose-expreance-title"><?php echo solub_core_kses($settings['exp_number']); ?></h2>
								<h6><?php echo solub_core_kses($settings['exp_text']); ?></h6>
							</div>
						</div>
					</div>
					<div class="col-lg-7">
						<div class="tp-chose-wrapper">
							<div class="tp-chose-thumb mb-60 wow img-custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.1s">
								<img src="<?php echo $settings['image_two']['url']; ?>" alt="">
							</div>
							<div class="tp-chose-heading pl-100 wow fadeInRight" data-wow-duration=".9s" data-wow-delay=".3s">

								<?php if ($settings['sub_title']) : ?>
									<span class="tp-section-title-pre"><?php echo solub_core_kses($settings['sub_title']); ?></span>
								<?php endif; ?>

								<?php if ($settings['title']) : ?>
									<h4 class="tp-section-title mb-30"><?php echo solub_core_kses($settings['title']); ?></h4>
								<?php endif; ?>

								<?php if ($settings['description']) : ?>
									<p class="mb-45"><?php echo solub_core_kses($settings['description']); ?></p>
								<?php endif; ?>
								<div class="tp-chose-list">
									<ul>
										<?php foreach ($settings['item_list'] as $item) : ?>
											<li><span><svg xmlns="http://www.w3.org/2000/svg" width="26" height="19" viewBox="0 0 26 19" fill="none">
														<path d="M25 1L8.5 17.5L1 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
													</svg></span><?php echo solub_core_kses($item['feature_title']); ?></li>
										<?php endforeach; ?>
									</ul>
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

$widgets_manager->register(new Solub_Choose());
