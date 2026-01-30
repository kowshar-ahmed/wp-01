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
class Solub_Step extends Widget_Base
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
		return 'solub-step-list';
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
		return __('Step List', 'solub-core');
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

	protected function register_controls_section()
	{
		$this->start_controls_section(
			'item_section',
			[
				'label' => __('Icon Box List', 'solub-core'),
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


		$this->add_control(
			'item_list',
			[
				'label' => esc_html__('Repeater List', 'textdomain'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'item_title' => esc_html__('Title #1', 'textdomain'),
					],
					[
						'item_title' => esc_html__('Title #2', 'textdomain'),
					],
					[
						'item_title' => esc_html__('Title #3', 'textdomain'),
					],
				],
				'title_field' => '{{{ item_title }}}',
			]
		);

		$this->end_controls_section();
	}




	// Style Section
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
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .tp-el-title',
			]
		);


		$this->end_controls_section();








		$this->start_controls_section(
			'content_section_style',
			[
				'label' => __('Content', 'solub-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_margin',
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
					'{{WRAPPER}} .tp-el-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_control(
			'content_color',
			[
				'label' => esc_html__('Text Color', 'textdomain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-el-content' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .tp-el-content',
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





		<section class="tp-step-ptb">
			<div class="container">
				<div class="tp-step-box p-relative wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".3s">
					<div class="tp-step-shapes">
						<div class="tp-step-shape-1">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/step/step-arrow-1.png" alt="">
						</div>
						<div class="tp-step-shape-2">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/step/step-arrow-2.png" alt="">
						</div>
						<div class="tp-step-shape-3">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/step/step-arrow-3.png" alt="">
						</div>
					</div>
					<div class="row">
						<?php foreach ($settings['item_list'] as $key => $item) : 
							$step_num = $key + 1;
						?>
							<div class="col-lg-3 col-md-6">
								<div class="tp-step-item p-relative text-center mb-30">
									<div class="tp-step-item-thumb p-relative mb-20">
										<img src="<?php echo $item['image']['url']; ?>" alt="">
										<span><?php echo esc_html($step_num); ?></span>
									</div>
									<div class="tp-step-item-content">
										<h4 class="tp-step-item-title"><?php echo solub_core_kses($item['item_title']); ?></h4>
										<p><?php echo solub_core_kses($item['item_desc']); ?></p>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</section>





<?php

	}
}

$widgets_manager->register(new Solub_Step());
