<?php

new \Kirki\Panel(
	'solub_panel',
	[
		'priority'    => 10,
		'title'       => esc_html__( 'Solub Options', 'kirki' ),
		'description' => esc_html__( 'Solub All options here.', 'kirki' ),
	]
);

new \Kirki\Section(
	'solub_header_section',
	[
		'title'       => esc_html__( 'Header Option', 'kirki' ),
		'description' => esc_html__( 'Header information here you can find.', 'kirki' ),
		'panel'       => 'solub_panel',
		'priority'    => 160,
	]
);

new \Kirki\Field\Text(
	[
		'settings' => 'header_text_control',
		'label'    => esc_html__( 'Time', 'kirki' ),
		'section'  => 'solub_header_section',
		'default'  => esc_html__( 'Monday - Friday : 8:30 AM to 6:30 PM', 'kirki' ),
		'priority' => 10,
	]
);
new \Kirki\Field\Text(
	[
		'settings' => 'header_button_control',
		'label'    => esc_html__( 'Button', 'kirki' ),
		'section'  => 'solub_header_section',
		'default'  => esc_html__( '+999 3265 464968', 'kirki' ),
		'priority' => 10,
	]
);
new \Kirki\Field\Text(
	[
		'settings' => 'header_button_url_control',
		'label'    => esc_html__( 'Button URL', 'kirki' ),
		'section'  => 'solub_header_section',
		'default'  => esc_html__( 'tel:01234567', 'kirki' ),
		'priority' => 10,
	]
);