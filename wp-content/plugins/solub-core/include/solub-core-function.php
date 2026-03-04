<?php



// get all post 
function tp_all_post($post_type_name = 'post')
{
    $posts = get_posts(array(
        'post_type' => $post_type_name,
        'orderby' => 'name',
        'order'   => 'ASC',
        'posts_per_page'   => -1,
    ));
    $posts_list = [];
    foreach ($posts as $post) {
        $posts_list[$post->ID] = $post->post_title;
    }
    return $posts_list;
}



/**
 * Sanitize SVG markup for front-end display.
 *
 * @param  string $svg SVG markup to sanitize.
 * @return string 	  Sanitized markup.
 */
function solub_core_kses($custom_html_tags = '')
{
    $allowed_html = [
        'svg' => array(
            'class' => true,
            'aria-hidden' => true,
            'aria-labelledby' => true,
            'role' => true,
            'xmlns' => true,
            'width' => true,
            'height' => true,
            'viewbox' => true, // <= Must be lower case!
        ),
        'path'  => array(
            'd' => true,
            'fill' => true,
            'stroke' => true,
            'stroke-width' => true,
            'stroke-linecap' => true,
            'stroke-linejoin' => true,
            'opacity' => true,
        ),
        'a' => [
            'class'    => [],
            'href'    => [],
            'title'    => [],
            'target'    => [],
            'rel'    => [],
        ],
        'b' => [],
        'blockquote'  =>  [
            'cite' => [],
        ],
        'cite'                      => [
            'title' => [],
        ],
        'code'                      => [],
        'del'                    => [
            'datetime'   => [],
            'title'      => [],
        ],
        'dd'                     => [],
        'div'                    => [
            'class'   => [],
            'title'   => [],
            'style'   => [],
        ],
        'dl'                     => [],
        'dt'                     => [],
        'em'                     => [],
        'h1'                     => [],
        'h2'                     => [],
        'h3'                     => [],
        'h4'                     => [],
        'h5'                     => [],
        'h6'                     => [],
        'i'                         => [
            'class' => [],
        ],
        'img'                    => [
            'alt'  => [],
            'class'   => [],
            'height' => [],
            'src'  => [],
            'width'   => [],
        ],
        'li'                     => array(
            'class' => array(),
        ),
        'ol'                     => array(
            'class' => array(),
        ),
        'p'                         => array(
            'class' => array(),
        ),
        'q'                         => array(
            'cite'    => array(),
            'title'   => array(),
        ),
        'q'                         => array(
            'cite'    => array(),
            'title'   => array(),
        ),
        'span'                      => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'iframe'                 => array(
            'width'         => array(),
            'height'     => array(),
            'scrolling'     => array(),
            'frameborder'   => array(),
            'allow'         => array(),
            'src'        => array(),
        ),
        'strike'                 => array(),
        'br'                     => array(),
        'strong'                 => array(),
    ];

    return wp_kses($custom_html_tags, $allowed_html);
}





// Trait / Custom function for heading widget
trait Solub_Custom_Fun
{
    protected function section_heading($ctl_id = null, $ctl_name = 'Title and Content')
    {
        $this->start_controls_section(
            'solub_' . $ctl_id . '_title_section',
            [
                'label' => __($ctl_name, 'solub-core'),
            ]
        );

        $this->add_control(
            'solub_' . $ctl_id . '_sub_title',
            [
                'label' => __('Sub Title', 'solub-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Sub Title', 'solub-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'solub_' . $ctl_id . '_title',
            [
                'label' => __('Title', 'solub-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Title here', 'solub-core'),

            ]
        );

        $this->add_control(
            'solub_' . $ctl_id . '_description',
            [
                'label' => __('Content', 'solub-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Content here', 'solub-core'),
            ]
        );

        $this->end_controls_section();
    }






    protected function heading_style($ctl_style_id = null, $ctl_style_name = 'Sub Title Style', $ctl_style_class = '' )
    {
        $this->start_controls_section(
            'solub_'.$ctl_style_id.'_section_style',
            [
                'label' => __($ctl_style_name, 'solub-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'solub_'.$ctl_style_id.'_sub_title_margin',
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
                    '{{WRAPPER}} '.$ctl_style_class.'' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'solub_'.$ctl_style_id.'_sub_title_color',
            [
                'label' => esc_html__('Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$ctl_style_class.'' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'solub_'.$ctl_style_id.'_title_typography',
                'selector' => '{{WRAPPER}} '.$ctl_style_class.'',
            ]
        );


        $this->end_controls_section();
    }



}
