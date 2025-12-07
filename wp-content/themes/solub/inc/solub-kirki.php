<?php

new \Kirki\Panel(
	'solub_panel',
	[
		'priority'    => 10,
		'title'       => esc_html__( 'Solub Options', 'kirki' ),
		'description' => esc_html__( 'Solub All options here', 'kirki' ),
	]
);

// header section 
function header_section(){
    new \Kirki\Section(
        'solub_header',
        [
            'title'       => esc_html__( 'Header Option', 'kirki' ),
            'description' => esc_html__( 'Header information here you can find.', 'kirki' ),
            'panel'       => 'solub_panel',
            'priority'    => 160,
        ]
    );
    
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'header_top_switch',
            'label'       => esc_html__( 'Header Topbar On/Off', 'kirki' ),
            'description' => esc_html__( 'You can Show or hide header topbar here', 'kirki' ),
            'section'     => 'solub_header',
            'default'     => 'on',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'kirki' ),
                'off' => esc_html__( 'Disable', 'kirki' ),
            ],
        ]
    );
    
    new \Kirki\Field\Text(
        [
            'settings' => 'header_time',
            'label'    => esc_html__( 'Time', 'kirki' ),
            'section'  => 'solub_header',
            'default'  => esc_html__( 'Monday - Friday : 8:30 AM to 6:30 PM', 'kirki' ),
            'priority' => 10,
        ]
    );
    
    new \Kirki\Field\Text(
        [
            'settings' => 'header_button',
            'label'    => esc_html__( 'Button text', 'kirki' ),
            'section'  => 'solub_header',
            'default'  => esc_html__( '+999 3265 464968', 'kirki' ),
            'priority' => 10,
        ]
    );
    new \Kirki\Field\Text(
        [
            'settings' => 'header_button_url',
            'label'    => esc_html__( 'Button URL', 'kirki' ),
            'section'  => 'solub_header',
            'default'  => esc_html__( 'tel:012345678', 'kirki' ),
            'priority' => 10,
        ]
    );
}
header_section();



// header social section 
function header_social_section(){
    new \Kirki\Section(
        'solub_header_social',
        [
            'title'       => esc_html__( 'Header Social', 'kirki' ),
            'description' => esc_html__( 'Header social information here you can find.', 'kirki' ),
            'panel'       => 'solub_panel',
            'priority'    => 160,
        ]
    );
    
    new \Kirki\Field\Text(
        [
            'settings' => 'social_fb',
            'label'    => esc_html__( 'Facebook URL', 'kirki' ),
            'section'  => 'solub_header_social',
            'default'  => esc_html__( '#', 'kirki' ),
            'priority' => 10,
        ]
    );
    new \Kirki\Field\Text(
        [
            'settings' => 'social_x',
            'label'    => esc_html__( 'Twitter URL', 'kirki' ),
            'section'  => 'solub_header_social',
            'default'  => esc_html__( '#', 'kirki' ),
            'priority' => 10,
        ]
    );
    new \Kirki\Field\Text(
        [
            'settings' => 'social_in',
            'label'    => esc_html__( 'Instagram URL', 'kirki' ),
            'section'  => 'solub_header_social',
            'default'  => esc_html__( '#', 'kirki' ),
            'priority' => 10,
        ]
    );
    new \Kirki\Field\Text(
        [
            'settings' => 'social_pin',
            'label'    => esc_html__( 'Pinterest URL', 'kirki' ),
            'section'  => 'solub_header_social',
            'default'  => esc_html__( '#', 'kirki' ),
            'priority' => 10,
        ]
    );    
}
header_social_section();

// header social section 
function header_logo_section(){
    new \Kirki\Section(
        'solub_header_logo',
        [
            'title'       => esc_html__( 'Header Logo', 'kirki' ),
            'description' => esc_html__( 'Header logo information here you can find.', 'kirki' ),
            'panel'       => 'solub_panel',
            'priority'    => 160,
        ]
    );
    
    new \Kirki\Field\Image(
        [
            'settings'    => 'solub_logo_black',
            'label'       => esc_html__( 'Logo Black', 'kirki' ),
            'description' => esc_html__( 'Please upload your black logo here.', 'kirki' ),
            'section'     => 'solub_header_logo',
            'default'     =>  get_template_directory_uri().'/assets/img/logo/logo-black.png',
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'solub_logo_white',
            'label'       => esc_html__( 'Logo White', 'kirki' ),
            'description' => esc_html__( 'Please upload your white logo here.', 'kirki' ),
            'section'     => 'solub_header_logo',
            'default'     =>  get_template_directory_uri().'/assets/img/logo/logo-white.png',
        ]
    );
  
}
header_logo_section();