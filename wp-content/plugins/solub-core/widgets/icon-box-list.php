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
class Solub_Icon_List extends Widget_Base
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
		return 'solub-icon-list';
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
		return __('Icon Box List', 'solub-core');
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
			'icon_bg_color',
			[
				'label' => esc_html__('Icon BG Color', 'textdomain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .tp-el-icon' => 'background-color: {{VALUE}}',
				],
			]
		);

		$repeater->add_control(
			'icon_color',
			[
				'label' => esc_html__('Icon Color', 'textdomain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .tp-el-icon' => 'color: {{VALUE}}',
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





		<?php foreach ($settings['item_list'] as $item) : ?>

			<div class="tp-faq-item d-flex align-items-center mb-40 elementor-repeater-item-<?php echo esc_attr($item['_id']); ?>">
				<div class="tp-faq-item-icon">
					<span class="tp-el-icon">
						<?php if ($item['icon_style'] == 'svg') { ?>
							<?php echo $item['svg']; ?>
						<?php } elseif ($item['icon_style'] == 'image') { ?>
							<img src="<?php echo $item['image']['url']; ?>" alt="<?php echo esc_attr($item['item_title']); ?>">
						<?php } else { ?>
							<?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?>
						<?php } ?>
					</span>
				</div>
				<div class="tp-faq-item-content">
					<h4 class="tp-el-title"><?php echo solub_core_kses($item['item_title']); ?></h4>
					<p class="tp-el-content"><?php echo solub_core_kses($item['item_desc']); ?></p>
				</div>
			</div>
		<?php endforeach; ?>





<?php

	}
}

$widgets_manager->register(new Solub_Icon_List());
