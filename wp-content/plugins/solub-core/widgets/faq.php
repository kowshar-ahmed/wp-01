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
class Solub_Faq extends Widget_Base
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
		return 'solub-faq';
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
		return __('Faq', 'solub-core');
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
	// Faq List Section
	protected function register_controls_section()
	{
		$this->start_controls_section(
			'item_section',
			[
				'label' => __('Faq List', 'solub-core'),
			]
		);

		$repeater = new \Elementor\Repeater();


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
				'label' => esc_html__('Faq List', 'textdomain'),
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





		<div class="tp-faq-box wow fadeInLeft" data-wow-duration=".9s" data-wow-delay=".3s">
			<div class="accordion accordion-flush" id="accordionFlushExample">
				<?php foreach ($settings['item_list'] as $key => $item) :
					$collapsed = ($key == 1) ? '' : 'collapsed';
					$show = ($key == 1) ? 'show' : '';
				?>
					<div class="accordion-item">
						<h2 class="accordion-header">
							<button class="accordion-button <?php echo esc_attr($collapsed); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne-<?php echo esc_attr($key); ?>" aria-expanded="false" aria-controls="flush-collapseOne-<?php echo esc_attr($key); ?>">
								<?php echo solub_core_kses($item['item_title']); ?>
								<span class="accordion-btn"></span>
							</button>
						</h2>
						<div id="flush-collapseOne-<?php echo esc_attr($key); ?>" class="accordion-collapse collapse <?php echo esc_attr($show); ?>" data-bs-parent="#accordionFlushExample">
							<div class="accordion-body"><?php echo solub_core_kses($item['item_desc']); ?></div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>






<?php

	}
}

$widgets_manager->register(new Solub_Faq());
