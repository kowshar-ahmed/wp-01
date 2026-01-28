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
class Solub_Button extends Widget_Base
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
		return 'solub-button';
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
		return __('Solub Button', 'solub-core');
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
			'button_section',
			[
				'label' => __('Button', 'solub-core'),
			]
		);

		$this->add_control(
			'design_style',
			[
				'label' => esc_html__('Select Style', 'textdomain'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style_1',
				'options' => [
					'style_1' => esc_html__('Style 01', 'textdomain'),
					'style_2'  => esc_html__('Style 02', 'textdomain'),
					'style_3'  => esc_html__('Style 03', 'textdomain'),
				],
			]
		);

		$this->end_controls_section();


		/* Button Controls */
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


		<?php if ($settings['design_style'] == 'style_2'):
			if (! empty($settings['button_link'])) {
				$this->add_link_attributes('button_arg', $settings['button_link']);
				$this->add_render_attribute('button_arg', 'class', 'tp-btn btn-text-flip');
			}
			?>
			<div class="tp-solub-btn tp-el-section">
				<a <?php echo $this->get_render_attribute_string('button_arg'); ?>>
					<span data-text="<?php echo esc_html($settings['button_text']); ?>">
						<?php echo esc_html($settings['button_text']); ?></span>
				</a>
			</div>

		<?php elseif ($settings['design_style'] == 'style_3'):
			if (! empty($settings['button_link'])) {
				$this->add_link_attributes('button_arg', $settings['button_link']);
				$this->add_render_attribute('button_arg', 'class', 'tp-btn btn-text-flip');
			}
			?>
			<div class="tp-solub-btn tp-portfolio-btn-wrap tp-el-section">
				<a <?php echo $this->get_render_attribute_string('button_arg'); ?>>
					<span data-text="<?php echo esc_html($settings['button_text']); ?>">
						<?php echo esc_html($settings['button_text']); ?></span>
				</a>
			</div>
		<?php else : ?>
			<?php if (!empty($settings['button_text'])) :
				if (! empty($settings['button_link'])) {
					$this->add_link_attributes('button_arg', $settings['button_link']);
					$this->add_render_attribute('button_arg', 'class', 'tp-btn btn-2 btn-text-flip');
				}
			?>
				<div class="tp-solub-btn tp-el-section">
					<a <?php echo $this->get_render_attribute_string('button_arg'); ?>><span data-text="
										<?php echo esc_html($settings['button_text']); ?>">
							<?php echo esc_html($settings['button_text']); ?></span>
					</a>
				</div>
			<?php endif; ?>
		<?php endif; ?>



<?php

	}
}

$widgets_manager->register(new Solub_Button());
