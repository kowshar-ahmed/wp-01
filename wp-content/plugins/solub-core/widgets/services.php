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
class Solub_Services extends Widget_Base
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
		return 'solub-services';
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
		return __('Services', 'solub-core');
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
			'item_section',
			[
				'label' => __('Services List', 'solub-core'),
			]
		);

		$repeater = new \Elementor\Repeater();


		$repeater->add_control(
			'icon_style',
			[
				'label' => esc_html__('Select Icon Style', 'textdomain'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'icon',
				'options' => [
					'icon' => esc_html__('icon', 'textdomain'),
					'svg'  => esc_html__('svg', 'textdomain'),
					'image'  => esc_html__('image', 'textdomain'),
				],
			]
		);

		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__('Icon', 'textdomain'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				'condition' => [
					'icon_style' => 'icon',
				],
			]
		);


		$repeater->add_control(
			'svg',
			[
				'label' => esc_html__('SVG', 'textdomain'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('', 'textdomain'),
				'label_block' => true,
				'condition' => [
					'icon_style' => 'svg',
				],
			]
		);

		$repeater->add_control(
			'image',
			[
				'label' => esc_html__('Choose Image', 'textdomain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'icon_style' => 'image',
				],
			]
		);

		$repeater->add_control(
			'item_title',
			[
				'label' => esc_html__('Title', 'textdomain'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('List Title', 'textdomain'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'item_desc',
			[
				'label' => esc_html__('Description', 'textdomain'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('Content here...', 'textdomain'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'item_button_text',
			[
				'label' => esc_html__('Button', 'textdomain'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('See More', 'textdomain'),
				'label_block' => true,
			]
		);


		$repeater->add_control(
			'item_button_url',
			[
				'label' => esc_html__('Button URL', 'textdomain'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('#', 'textdomain'),
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

		if (! empty($settings['button_link'])) {
			$this->add_link_attributes('button_arg', $settings['button_link']);
			$this->add_render_attribute('button_arg', 'class', 'tp-btn btn-text-flip');
		}

?>





		<!-- service area stat -->
		<section class="tp-service-ptb fix pt-140" data-bg-color="#EBF3ED">
			<div class="container">
				<div class="row">
					<div class="col-lg-5">
						<div class="tp-service-box wow fadeInLeft" data-wow-duration=".9s" data-wow-delay=".3s">
							<div class="tp-service-heading mb-50">
								<span class="tp-section-title-pre"><?php echo solub_core_kses($settings['sub_title']); ?></span>
								<h4 class="tp-section-title mb-30"><?php echo solub_core_kses($settings['title']); ?></h4>
								<p><?php echo solub_core_kses($settings['description']); ?></p>
							</div>
							<div class="tp-service-btn">
								<a <?php echo $this->get_render_attribute_string('button_arg'); ?>>
									<span data-text="<?php echo esc_html($settings['button_text']); ?>">
										<?php echo esc_html($settings['button_text']); ?></span>
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-7">
						<div class="tp-service-wrapper wow fadeInRight" data-wow-duration=".9s" data-wow-delay=".3s">
							<div class="swiper tp-service-active">
								<div class="swiper-wrapper">
									<?php foreach ($settings['item_list'] as $item) : ?>
										<div class="swiper-slide">
											<div class="tp-service-item">
												<div class="tp-service-item-icon">
													<span>
														<?php if($item['icon_style'] == 'svg' ){ ?>
															<?php echo $item['svg']; ?>
														<?php } elseif($item['icon_style'] == 'image' ){ ?>
															<img src="<?php echo $item['image']['url']; ?>" alt="<?php echo esc_attr($item['item_title']); ?>">
														<?php } else { ?>
															<?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?>
														<?php } ?>
													</span>
												</div>
												<div class="tp-service-item-content">

													<?php if (!empty($item['item_button_url'])) : ?>
														<h4 class="tp-service-item-title"><a href="<?php echo solub_core_kses($item['item_button_url']); ?>"><?php echo solub_core_kses($item['item_title']); ?></a></h4>
													<?php else : ?>
														<h4 class="tp-service-item-title"><?php echo solub_core_kses($item['item_title']); ?></h4>
													<?php endif; ?>

													<p><?php echo solub_core_kses($item['item_desc']); ?></p>

													<?php if (!empty($item['item_button_url'])) : ?>
														<a class="tp-service-item-btn" href="<?php echo solub_core_kses($item['item_button_url']); ?>"><?php echo solub_core_kses($item['item_button_text']); ?> <span><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
																	<path d="M1 6.5H12M12 6.5L6.5 1M12 6.5L6.5 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
																</svg></span></a>
													<?php endif; ?>
												</div>
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
		<!-- service area end -->





<?php

	}
}

$widgets_manager->register(new Solub_Services());
