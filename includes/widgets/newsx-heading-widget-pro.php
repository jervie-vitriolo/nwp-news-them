<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function newsx_heading_widget_options() {
    return [
        'widget_general_section' => [
            'section_title' => [
                'type'  => 'title',
                'label' => esc_html__( 'General', 'news-magazine-x' ),
            ],
            'widget_title' => [
                'type' => 'text',
                'default' => 'Sample Heading',
                'label' => esc_html__( 'Text', 'news-magazine-x' ),
            ],
            'widget_title_width' => [
                'type' => 'select',
                'default' => 'default',
                'choices' => [
                    'default' => esc_html__( 'Default', 'news-magazine-x' ),
                    'container' => esc_html__( 'Container Width', 'news-magazine-x' ),
                ],
                'label' => esc_html__( 'Width', 'news-magazine-x' ),
            ],
            'widget_accent_color' => [
                'type' => 'colorpicker',
                'default' => '',
                'label' => esc_html__( 'Accent Color', 'news-magazine-x' ),
            ],
        ],
    ];
}