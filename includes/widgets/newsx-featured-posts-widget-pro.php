<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function newsx_featured_posts_widget_options() {
    return [
        'widget_general_section' => [
            'section_title' => [
                'type'  => 'title',
                'label' => esc_html__( 'General', 'news-magazine-x' ),
            ],
            'widget_title' => [
                'type' => 'text',
                'default' => 'Featured Posts',
                'label' => esc_html__( 'Title', 'news-magazine-x' ),
            ],
            'widget_accent_color' => [
                'type' => 'colorpicker',
                'default' => '',
                'label' => esc_html__( 'Accent Color', 'news-magazine-x' ),
            ],
            'title_group_title' => [
                'type' => 'group-title',
                'label' => esc_html__( 'Post Title', 'news-magazine-x' ),
            ],
            'title_tag' => [
                'type' => 'select',
                'default' => 'h6',
                'choices' => newsx_get_html_tag_options(),
                'label' => esc_html__( 'HTML Tag', 'news-magazine-x' ),
            ],
        ],
        'query_section' => [
            'section_title' => [
                'type'  => 'title',
                'label' => esc_html__( 'Query', 'news-magazine-x' ),
            ],
            'orderby' => [
                'type' => 'select',
                'default' => 'date',
                'choices' => newsx_get_orderby_query_choices(),
                'label' => esc_html__( 'Order by', 'news-magazine-x' ),
            ],
            'published_days' => [
                'type' => 'number',
                'default' => '365',
                'label' => esc_html__( 'Published X Days Ago', 'news-magazine-x' ),
            ],
            'categories' => [
                'type' => 'select2',
                'class' => 'multiselect', // Note: Remove this to select single option only
                'default' => '',
                'choices' => newsx_get_taxonomy_term_choices( 'category' ),
                'label' => esc_html__( 'Categories', 'news-magazine-x' ),
            ],
            'tags' => [
                'type' => 'select2',
                'class' => 'multiselect',
                'default' => '',
                'choices' => newsx_get_taxonomy_term_choices( 'post_tag' ),
                'label' => esc_html__( 'Tags', 'news-magazine-x' ),
            ],
            'posts_per_page' => [
                'type' => 'number',
                'default' => '6',
                'label' => esc_html__( 'Number of Posts', 'news-magazine-x' ),
            ],
            'offset' => [
                'type' => 'number',
                'default' => '0',
                'label' => esc_html__( 'Offset', 'news-magazine-x' ),
            ],
        ],
    ];
}