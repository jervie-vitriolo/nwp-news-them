<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function newsx_newsletter_widget_options() {
    return [
        'widget_general_section' => [
            'section_title' => [
                'type'  => 'title',
                'label' => esc_html__( 'General', 'news-magazine-x' ),
            ],
            'title' => [
                'type' => 'text',
                'default' => 'Newsletter',
                'label' => esc_html__( 'Section Title', 'news-magazine-x' ),
            ],
            'title_tag' => [
                'type' => 'select',
                'default' => 'h3',
                'choices' => newsx_get_html_tag_options(),
                'label' => esc_html__( 'HTML Tag', 'news-magazine-x' ),
            ],
            'description' => [
                'type' => 'textarea',
                'default' => 'Stay updated with our weekly newsletter. Subscribe now to never miss an update!',
                'label' => esc_html__( 'Description', 'news-magazine-x' ),
            ],
            'shortcode' => [
                'type' => 'text',
                'default' => '[mc4wp_form]',
                'label' => esc_html__( 'Description', 'news-magazine-x' ),
            ],
        ],
    ];
}