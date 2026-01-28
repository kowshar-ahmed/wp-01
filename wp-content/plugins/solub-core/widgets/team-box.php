<?php
namespace ElementorHelloWorld\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Solub Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Solub_Team_Box extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'solub-team';
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
	public function get_title() {
		return __( 'Solub Team', 'solub-core' );
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
	public function get_icon() {
		return 'eicon-thumbnails-down';
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
	public function get_categories() {
		return [ 'solub-category' ];
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
	public function get_script_depends() {
		return [ 'solub-core' ];
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
	protected function register_controls() {
		$this->register_controls_section(); 
		$this->register_style_section(); 
	}
		
	protected function register_controls_section() {
		$this->start_controls_section(
			'team_info_section',
			[
				'label' => __( 'Team Info', 'solub-core' ),
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => __( 'Sub Title', 'solub-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Sub Title', 'solub-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'solub-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Title here', 'solub-core' ),
			]
		);

		$this->end_controls_section();

		// button 
		$this->start_controls_section(
			'button_section',
			[
				'label' => __( 'Button', 'solub-core' ),
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => __( 'Button Text', 'solub-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Button Text', 'solub-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Link', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
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


		$this->start_controls_section(
			'social_section',
			[
				'label' => __( 'Social List', 'solub-core' ),
			]
		);

		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'icon_style',
			[
				'label' => esc_html__( 'Select Icon Type', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'icon',
				'options' => [
					'icon' => esc_html__( 'Icon', 'textdomain' ),
					'svg'  => esc_html__( 'Svg', 'textdomain' ),
					'image'  => esc_html__( 'Image', 'textdomain' ),
				],
			]
		);


		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook-f',
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
				'label' => esc_html__( 'Svg', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( '' , 'textdomain' ),
				'label_block' => true,
				'condition' => [
					'icon_style' => 'svg',
				],
			]
		);

		$repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
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
			'social_url',
			[
				'label' => esc_html__( 'URL', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#' , 'textdomain' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'item_list',
			[
				'label' => esc_html__( 'Social List', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'social_url' => esc_html__( 'fb.com', 'textdomain' ),
					],
					[
						'social_url' => esc_html__( 'x.com', 'textdomain' ),
					],
				],
				'title_field' => '{{{ social_url }}}',
			]
		);
		$this->end_controls_section();


	}	

	protected function register_style_section() {

		$this->start_controls_section(
			'main_section_style',
			[
				'label' => __( 'Section', 'solub-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_content_align',
			[
				'label' => esc_html__( 'Alignment', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'textdomain' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'textdomain' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'textdomain' ),
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


		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Sub Title', 'solub-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sub_title_margin',
			[
				'label' => esc_html__( 'Margin', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'custom' ],
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
				'label' => esc_html__( 'Text Color', 'textdomain' ),
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


		$this->start_controls_section(
			'title_section_style',
			[
				'label' => __( 'Title', 'solub-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_margin',
			[
				'label' => esc_html__( 'Margin', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'custom' ],
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
				'label' => esc_html__( 'Text Color', 'textdomain' ),
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
	protected function render() {
		$settings = $this->get_settings_for_display();
			if ( ! empty( $settings['button_text'] ) ) {	
				$this->add_link_attributes( 'button_arg', $settings['button_link'] );
			}	

		?>

		<div class="tp-team-item mb-30">
			<div class="tp-team-item-thumb p-relative mb-20 wow img-custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.1s">
			<a <?php echo $this->get_render_attribute_string( 'button_arg' ); ?>><img src="<?php echo esc_url($settings['image']['url']); ?>" alt=""></a>
			<div class="tp-team-item-social">
				<?php foreach($settings['item_list'] as $item) : ?>
				<a href="<?php echo esc_url($item['social_url']); ?>">
					<span>
						<?php if($item['icon_style'] == 'svg') : ?>
							<?php echo $item['svg']; ?>
						<?php elseif($item['icon_style'] == 'image') : ?>
							<img src="<?php echo $item['image']['url']; ?>" alt="">
						<?php else: ?>
							<?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
						<?php endif; ?>
					</span>
				</a>
				<?php endforeach; ?>	
			</div>
			</div>
			<div class="tp-team-item-wrap d-flex justify-content-between align-items-center">
			<div class="tp-team-item-content">
				<h4 class="tp-team-item-title"><a <?php echo $this->get_render_attribute_string( 'button_arg' ); ?>><?php echo esc_html($settings['sub_title']); ?></a></h4>
				<p><?php echo esc_html($settings['sub_title']); ?></p>
			</div>
			<div class="tp-team-item-btn">
				<a <?php echo $this->get_render_attribute_string( 'button_arg' ); ?>>
					<?php echo esc_html($settings['button_text'] ); ?> <span><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
					<path d="M1 9L9 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M1 1H9V9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				</svg></span></a>
			</div>
			</div>
		</div>


		<?php
	}

}

$widgets_manager->register( new Solub_Team_Box() );