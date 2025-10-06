<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function newsx_category_list_widget_options() {
    return [
        'widget_general_section' => [
            'section_title' => [
                'type'  => 'title',
                'label' => esc_html__( 'General', 'news-magazine-x' ),
            ],
            'widget_title' => [
                'type' => 'text',
                'default' => 'Category List',
                'label' => esc_html__( 'Title', 'news-magazine-x' ),
            ],
            'widget_accent_color' => [
                'type' => 'colorpicker',
                'default' => '',
                'label' => esc_html__( 'Accent Color', 'news-magazine-x' ),
            ],
        ],
        'query_section' => [
            'section_title' => [
                'type'  => 'title',
                'label' => esc_html__( 'Query', 'news-magazine-x' ),
            ],
            'categories' => [
                'type' => 'select2',
                'class' => 'multiselect', // Note: Remove this to select single option only
                'default' => '',
                'choices' => newsx_get_taxonomy_term_choices( 'category' ),
                'label' => esc_html__( 'Categories', 'news-magazine-x' ),
            ],
        ],
        'layout_section' => [
            'section_title' => [
                'type' => 'title',
                'label' => esc_html__( 'Layout', 'news-magazine-x' ),
            ],
            'elements_preset' => [
                'type' => 'select',
                'default' => 's0',
                'choices' => [
                    's0' => esc_html__( 'Default', 'news-magazine-x' ),
                    's1' => esc_html__( 'Style 1', 'news-magazine-x' ),
                    's2' => esc_html__( 'Style 2', 'news-magazine-x' ),
                ],
                'label' => esc_html__( 'Layout Preset', 'news-magazine-x' ),
            ],
        ],
        'elements_section' => [
            'section_title' => [
                'type'  => 'title',
                'label' => esc_html__( 'Elements', 'news-magazine-x' ),
            ],
            'title_group_title' => [
                'type' => 'group-title',
                'label' => esc_html__( 'Title', 'news-magazine-x' ),
            ],
            'title_tag' => [
                'type' => 'select',
                'default' => 'span',
                'choices' => newsx_get_html_tag_options(),
                'label' => esc_html__( 'HTML Tag', 'news-magazine-x' ),
            ],
        ],
    ];
}