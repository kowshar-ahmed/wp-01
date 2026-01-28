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
class Solub_Testimonial_List extends Widget_Base
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
		return 'solub-testimonial';
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
		return __('Testimonial List', 'solub-core');
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
			'item_section',
			[
				'label' => __('Testimonial List', 'solub-core'),
			]
		);


		$this->add_control(
			'sec_text',
			[
				'label' => esc_html__('Big Text', 'textdomain'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Solub', 'textdomain'),
				'label_block' => true,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'image',
			[
				'label' => esc_html__('Choose Image', 'textdomain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


		$repeater->add_control(
			'item_name',
			[
				'label' => esc_html__('Name', 'textdomain'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Rasalina William', 'textdomain'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'item_subject',
			[
				'label' => esc_html__('Subject', 'textdomain'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Very nice Support', 'textdomain'),
				'label_block' => true,
			]
		);



		$repeater->add_control(
			'item_content',
			[
				'label' => esc_html__('Content', 'textdomain'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('It has survived not only five centuries, but also the leap into electronic', 'textdomain'),
				'label_block' => true,
			]
		);


		$this->add_control(
			'item_list',
			[
				'label' => esc_html__('Portfolio List', 'textdomain'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'item_name' => esc_html__('Title #1', 'textdomain'),
					],
					[
						'item_name' => esc_html__('Title #2', 'textdomain'),
					],

					[
						'item_name' => esc_html__('Title #3', 'textdomain'),
					],
				],
				'title_field' => '{{{ item_name }}}',
			]
		);

		$this->end_controls_section();






		// Button Section

	}




	// Style Section
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






		<section class="tp-testimonial-2-ptb p-relative fix pt-130 pb-130" data-bg-color="#EBF3ED">
			<div class="tp-testimonial-2-shape">
				<h1><?php echo esc_html($settings['sec_text']); ?></h1>
			</div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="tp-testimonial-2-wrapper p-relative">
							<div class="swiper tp-testimonial-content-active">
								<div class="swiper-wrapper">
									<?php foreach ($settings['item_list'] as $item) : ?>
										<div class="swiper-slide">
											<div class="tp-testimonial-2-item text-center">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonial/home-2/author-shape.png" alt="">
												<h4 class="tp-testimonial-2-item-title"><?php echo esc_html($item['item_name']); ?></h4>
												<p><?php echo solub_core_kses($item['item_content']); ?> </p>
												<span class="tp-testimonial-2-item-user"><?php echo esc_html($item['item_subject']); ?></span>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
							<div class="tp-testimonial-2-nav">
								<button type="button" class="tp-testimonial-prev">
									<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M13 7H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</button>
								<button type="button" class="tp-testimonial-next"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M1 7H13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M7 1L13 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									</svg></button>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
						<div class="tp-testimonial-2-thumb-wrap">
							<div class="swiper tp-testimonial-thumb-active">
								<div class="swiper-wrapper text-center">
									<?php foreach ($settings['item_list'] as $item) : ?>
										<div class="swiper-slide">
											<div class="tp-testimonial-2-thumb">
												<img data-width="60" src="<?php echo $item['image']['url']; ?>" alt="">
											</div>
										</div>
									<?php endforeach; ?>
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

$widgets_manager->register(new Solub_Testimonial_List());
