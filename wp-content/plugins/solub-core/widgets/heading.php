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
class Solub_Heading extends Widget_Base
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
		return 'solub-heading';
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
		return __('Solub Heading', 'solub-core');
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
	}




	protected function register_style_section()
	{
		$this->start_controls_section(
			'section_style',
			[
				'label' => __('Sub Title', 'solub-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sub_title_margin',
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
					'{{WRAPPER}} .tp-el-sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_control(
			'sub_title_color',
			[
				'label' => esc_html__('Text Color', 'textdomain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-el-sub-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'sub_title_typography',
				'selector' => '{{WRAPPER}} .tp-el-sub-title',
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



		<div class="tp-about-heading">
			<?php if (!empty($settings['sub_title'])) : ?>
				<span class="tp-section-title-pre tp-el-sub-title"><?php echo solub_core_kses($settings['sub_title']); ?></span>
			<?php endif; ?>

			<?php if (!empty($settings['title'])) : ?>
				<h4 class="tp-section-title mb-30"><?php echo solub_core_kses($settings['title']); ?> <br>
				</h4>
			<?php endif; ?>

			<?php if (!empty($settings['description'])) : ?>
				<p><?php echo solub_core_kses($settings['description']); ?></p>
			<?php endif; ?>
		</div>




<?php

	}
}

$widgets_manager->register(new Solub_Heading());
