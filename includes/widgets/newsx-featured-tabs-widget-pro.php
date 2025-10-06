<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function newsx_featured_tabs_widget_options() {
    return [
        'widget_general_section' => [
            'section_title' => [
                'type'  => 'title',
                'label' => esc_html__( 'General', 'news-magazine-x' ),
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
        'tab_1_section' => [
            'section_title' => [
                'type'  => 'title',
                'label' => esc_html__( 'Tab 1', 'news-magazine-x' ),
            ],
            't1_title' => [
                'type' => 'text',
                'default' => 'Latest',
                'label' => esc_html__( 'Title', 'news-magazine-x' ),
            ],
            't1_orderby' => [
                'type' => 'select',
                'default' => 'date',
                'choices' => newsx_get_orderby_query_choices(),
                'label' => esc_html__( 'Order by', 'news-magazine-x' ),
            ],
            't1_published_days' => [
                'type' => 'number',
                'default' => '365',
                'label' => esc_html__( 'Published X Days Ago', 'news-magazine-x' ),
            ],
            't1_categories' => [
                'type' => 'select2',
                'class' => 'multiselect', // Note: Remove this to select single option only
                'default' => '',
                'choices' => newsx_get_taxonomy_term_choices( 'category' ),
                'label' => esc_html__( 'Categories', 'news-magazine-x' ),
            ],
            't1_tags' => [
                'type' => 'select2',
                'class' => 'multiselect',
                'default' => '',
                'choices' => newsx_get_taxonomy_term_choices( 'post_tag' ),
                'label' => esc_html__( 'Tags', 'news-magazine-x' ),
            ],
            't1_posts_per_page' => [
                'type' => 'number',
                'default' => '6',
                'label' => esc_html__( 'Number of Posts', 'news-magazine-x' ),
            ],
            't1_offset' => [
                'type' => 'number',
                'default' => '0',
                'label' => esc_html__( 'Offset', 'news-magazine-x' ),
            ],
        ],
        'tab_2_section' => [
            'section_title' => [
                'type'  => 'title',
                'label' => esc_html__( 'Tab 2', 'news-magazine-x' ),
            ],
            't2_title' => [
                'type' => 'text',
                'default' =>  'Popular',
                'label' => esc_html__( 'Title', 'news-magazine-x' ),
            ],
            't2_orderby' => [
                'type' => 'select',
                'default' => 'popular',
                'choices' => newsx_get_orderby_query_choices(),
                'label' => esc_html__( 'Order by', 'news-magazine-x' ),
            ],
            't2_published_days' => [
                'type' => 'number',
                'default' => '365',
                'label' => esc_html__( 'Published X Days Ago', 'news-magazine-x' ),
            ],
            't2_categories' => [
                'type' => 'select2',
                'class' => 'multiselect', // Note: Remove this to select single option only
                'default' => '',
                'choices' => newsx_get_taxonomy_term_choices( 'category' ),
                'label' => esc_html__( 'Categories', 'news-magazine-x' ),
            ],
            't2_tags' => [
                'type' => 'select2',
                'class' => 'multiselect',
                'default' => '',
                'choices' => newsx_get_taxonomy_term_choices( 'post_tag' ),
                'label' => esc_html__( 'Tags', 'news-magazine-x' ),
            ],
            't2_posts_per_page' => [
                'type' => 'number',
                'default' => '6',
                'label' => esc_html__( 'Number of Posts', 'news-magazine-x' ),
            ],
            't2_offset' => [
                'type' => 'number',
                'default' => '0',
                'label' => esc_html__( 'Offset', 'news-magazine-x' ),
            ],
        ],
        'tab_3_section' => [
            'section_title' => [
                'type'  => 'title',
                'label' => esc_html__( 'Tab 3', 'news-magazine-x' ),
            ],
            't3_title' => [
                'type' => 'text',
                'default' => 'Trending',
                'label' => esc_html__( 'Title', 'news-magazine-x' ),
            ],
            't3_orderby' => [
                'type' => 'select',
                'default' => 'comment_count',
                'choices' => newsx_get_orderby_query_choices(),
                'label' => esc_html__( 'Order by', 'news-magazine-x' ),
            ],
            't3_published_days' => [
                'type' => 'number',
                'default' => '365',
                'label' => esc_html__( 'Published X Days Ago', 'news-magazine-x' ),
            ],
            't3_categories' => [
                'type' => 'select2',
                'class' => 'multiselect', // Note: Remove this to select single option only
                'default' => '',
                'choices' => newsx_get_taxonomy_term_choices( 'category' ),
                'label' => esc_html__( 'Categories', 'news-magazine-x' ),
            ],
            't3_tags' => [
                'type' => 'select2',
                'class' => 'multiselect',
                'default' => '',
                'choices' => newsx_get_taxonomy_term_choices( 'post_tag' ),
                'label' => esc_html__( 'Tags', 'news-magazine-x' ),
            ],
            't3_posts_per_page' => [
                'type' => 'number',
                'default' => '6',
                'label' => esc_html__( 'Number of Posts', 'news-magazine-x' ),
            ],
            't3_offset' => [
                'type' => 'number',
                'default' => '0',
                'label' => esc_html__( 'Offset', 'news-magazine-x' ),
            ],
        ],
    ];
}
