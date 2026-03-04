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
class Solub_trait_Heading extends Widget_Base
{
	use \Solub_Custom_Fun;

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
		return 'solub-trait-heading';
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
		return __('Solub Trait Heading', 'solub-core');
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

		$this->section_heading('test', 'Title Heading Content');
		$this->section_heading('test2', 'Title Heading Content 2');
	}




	protected function register_style_section()
	{
		$this->start_controls_section(
			'main_section_style',
			[
				'label' => __('Section', 'solub-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_content_align',
			[
				'label' => esc_html__('Alignment', 'textdomain'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'textdomain'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'textdomain'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'textdomain'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .tp-el-section' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();


		$this->heading_style('sub', 'Demo Sub Title', '.el-sub');
		$this->heading_style('title', 'Demo Title', '.el-title');
		$this->heading_style('content', 'Demo Content', '.el-content');
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



		<div class="tp-about-heading tp-el-section">
			<?php if (!empty($settings['solub_test_sub_title'])) : ?>
				<span class="tp-section-title-pre el-sub"><?php echo solub_core_kses($settings['solub_test_sub_title']); ?></span>
			<?php endif; ?>

			<?php if (!empty($settings['solub_test_title'])) : ?>
				<h4 class="tp-section-title mb-30 el-title"><?php echo solub_core_kses($settings['solub_test_title']); ?> <br>
				</h4>
			<?php endif; ?>

			<?php if (!empty($settings['solub_test_description'])) : ?>
				<p class="el-content"><?php echo solub_core_kses($settings['solub_test_description']); ?></p>
			<?php endif; ?>
		</div>

		<hr>

		<h1><?php echo solub_core_kses($settings['solub_test2_sub_title']); ?></h1>



<?php

	}
}

$widgets_manager->register(new Solub_trait_Heading());
