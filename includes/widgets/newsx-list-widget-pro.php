<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function newsx_list_widget_options() {
    return [
        'widget_general_section' => [
            'section_title' => [
                'type'  => 'title',
                'label' => esc_html__( 'General', 'news-magazine-x' ),
            ],
            'widget_title' => [
                'type' => 'text',
                'default' => 'Latest Posts',
                'label' => esc_html__( 'Title', 'news-magazine-x' ),
            ],
            'widget_accent_color' => [
                'type' => 'colorpicker',
                'default' => '',
                'label' => esc_html__( 'Accent Color', 'news-magazine-x' ),
            ],
            'extras_group_title' => [
                'type' => 'group-title',
                'label' => esc_html__( 'Extras', 'news-magazine-x' ),
            ],
            'widget_url' => [
                'type' => 'url',
                'default' => '#',
                'label' => esc_html__( 'Custom URL', 'news-magazine-x' ),
            ],
            'display_taxonomy' => [
                'type' => 'select',
                'default' => 'view-all',
                'choices' => [
                    'none' => esc_html__( 'None', 'news-magazine-x' ),
                    'view-all' => esc_html__( 'as View All Link', 'news-magazine-x' ),
                    'ajax-filters' => esc_html__( 'as AJAX Filters', 'news-magazine-x' ),
                ],
                'label' => esc_html__( 'Display Taxonomy Filters', 'news-magazine-x' ),
            ],
            'view_all_text' => [
                'type' => 'text',
                'default' => 'View All',
                'label' => esc_html__( 'View All Text', 'news-magazine-x' ),
            ],
        ],
        'query_section' => [
            'section_title' => [
                'type'  => 'title',
                'label' => esc_html__( 'Query', 'news-magazine-x' ),
            ],
            // 'selection' => [
            //     'type' => 'select',
            //     'default' => 'dynamic',
            //     'choices' => [
            //         'dynamic' => esc_html__( 'Dynamic', 'news-magazine-x' ),
            //         'manual' => esc_html__( 'Manual', 'news-magazine-x' ),
            //     ],
            //     'label' => esc_html__( 'Selection', 'news-magazine-x' ),
            // ],
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
                'default' => '5',
                'label' => esc_html__( 'Posts Per Page', 'news-magazine-x' ),
            ],
            'offset' => [
                'type' => 'number',
                'default' => '0',
                'label' => esc_html__( 'Offset', 'news-magazine-x' ),
            ],
        ],
        'layout_section' => [
            'section_title' => [
                'type' => 'title',
                'label' => esc_html__( 'Layout', 'news-magazine-x' ),
            ],
            'layout' => [
                'type' => 'radio-image',
                'default' => 'list-1',
                'choices' => [
                    'list-1' => [
                        'image' => newsx_get_svg_icon('list-layout-1'),
                        'title' => esc_html__( 'One Big List', 'news-magazine-x' ),
                    ],
                    'list-2' => [
                        'image' => newsx_get_svg_icon('list-layout-2'),
                        'title' => esc_html__( 'One Big Grid 1', 'news-magazine-x' ),
                    ],
                    'list-3' => [
                        'image' => newsx_get_svg_icon('list-layout-3'),
                        'title' => esc_html__( 'One Big Grid 2', 'news-magazine-x' ),
                    ],
                    'list-4' => [
                        'image' => newsx_get_svg_icon('list-layout-4'),
                        'title' => esc_html__( 'One Big Left', 'news-magazine-x' ),
                    ],
                    'list-5' => [
                        'image' => newsx_get_svg_icon('list-layout-5'),
                        'title' => esc_html__( 'One Big Overlay', 'news-magazine-x' ),
                    ],
                    'list-6' => [
                        'image' => newsx_get_svg_icon('list-layout-6'),
                        'title' => esc_html__( 'Two Big', 'news-magazine-x' ),
                    ],
                    'list-7' => [
                        'image' => newsx_get_svg_icon('list-layout-7'),
                        'title' => esc_html__( '1 Column', 'news-magazine-x' ),
                    ],
                    'list-8' => [
                        'image' => newsx_get_svg_icon('list-layout-8'),
                        'title' => esc_html__( '2 Column', 'news-magazine-x' ),
                    ],
                    'list-9' => [
                        'image' => newsx_get_svg_icon('list-layout-9'),
                        'title' => esc_html__( '3 Column', 'news-magazine-x' ),
                    ],
                    ],
                'label' => esc_html__( 'Select Layout', 'news-magazine-x' ),
            ],
            'elements_preset' => [
                'type' => 'select',
                'default' => 's0',
                'choices' => [
                    's0' => esc_html__( 'Default', 'news-magazine-x' ),
                    's1' => esc_html__( 'Style 1', 'news-magazine-x' ),
                    's2' => esc_html__( 'Style 2 (List 1)', 'news-magazine-x' ),
                ],
                'label' => esc_html__( 'Elements Preset', 'news-magazine-x' ),
            ],
            'gutter' => [
                'type' => 'number-responsive',
                'default' => json_encode([
                    'desktop' => 5,
                    'tablet' => 5,
                    'mobile' => 5,
                ]),
                'input_attrs' => [
                    'min' => 0,
                    'max' => 25,
                    'step' => 1,
                ],
                'label' => esc_html__( 'Gutter (Gap)', 'news-magazine-x' ),
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
                'default' => 'h3',
                'choices' => newsx_get_html_tag_options(),
                'label' => esc_html__( 'HTML Tag', 'news-magazine-x' ),
            ],
            'title_letter_count' => [
                'type' => 'number',
                'default' => 100,
                'label' => esc_html__( 'Letter Count', 'news-magazine-x' ),
            ],
            'excerpt_group_title' => [
                'type' => 'group-title',
                'label' => esc_html__( 'Excerpt', 'news-magazine-x' ),
            ],
            'excerpt_letter_count' => [
                'type' => 'number',
                'default' => 600,
                'label' => esc_html__( 'Excerpt Letter Count', 'news-magazine-x' ),
            ],
            'date_group_title' => [
                'type' => 'group-title',
                'label' => esc_html__( 'Date & Time', 'news-magazine-x' ),
            ],
            'date_format' => [
                'type' => 'select',
                'default' => 'default',
                'choices' => [
                    'default' => esc_html__( 'WordPress Default', 'news-magazine-x' ),
                    'time-ago' => esc_html__( 'Time Ago', 'news-magazine-x' ),
                ],
                'label' => esc_html__( 'Format', 'news-magazine-x' ),
            ],
            'date_show_time' => [
                'type' => 'switcher',
                'default' => false,
                'label' => esc_html__( 'Show Time', 'news-magazine-x' ),
            ],
            'author_group_title' => [
                'type' => 'group-title',
                'label' => esc_html__( 'Author', 'news-magazine-x' ),
            ],
            'author_show_avatar' => [
                'type' => 'switcher',
                'default' => false,
                'label' => esc_html__( 'Show Avatar', 'news-magazine-x' ),
            ],
            'author_avatar_size' => [
                'type' => 'number',
                'default' => 32,
                'label' => esc_html__( 'Avatar Size', 'news-magazine-x' ),
            ],
            'read_more_group_title' => [
                'type' => 'group-title',
                'label' => esc_html__( 'Read More', 'news-magazine-x' ),
            ],
            'read_more_text' => [
                'type' => 'text',
                'default' => 'Read More',
                'label' => esc_html__( 'Text', 'news-magazine-x' ),
            ],
            'image_group_title' => [
                'type' => 'group-title',
                'label' => esc_html__( 'Thumbnail', 'news-magazine-x' ),
            ],
            'image_link' => [
                'type' => 'switcher',
                'default' => true,
                'label' => esc_html__( 'Image links to Single Post', 'news-magazine-x' ),
            ],
        ],
        'filters_section' => [
            'section_title' => [
                'type'  => 'title',
                'label' => esc_html__( 'Filters', 'news-magazine-x' ),
            ],
            'filter_all_text' => [
                'type' => 'text',
                'default' => 'All',
                'label' => esc_html__( 'All Text', 'news-magazine-x' ),
            ],
            'filter_tax_category' => [
                'type' => 'select2',
                'class' => 'multiselect',
                'default' => '',
                'choices' => newsx_get_taxonomy_term_choices( 'category' ),
                'label' => esc_html__( 'Select Categories', 'news-magazine-x' ),
            ],
        ],
        'pagination_section' => [
            'section_title' => [
                'type'  => 'title',
                'label' => esc_html__( 'Pagination', 'news-magazine-x' ),
            ],
            'pagination_type' => [
                'type' => 'select',
                'default' => 'ajax-next-prev',
                'choices' => [
                    'ajax-next-prev' => esc_html__( 'Next / Previous (AJAX)', 'news-magazine-x' ),
                    'ajax-load-more' => esc_html__( 'Load More (AJAX)', 'news-magazine-x' ),
                ],
                'label' => esc_html__( 'Pagination Type', 'news-magazine-x' ),
            ],
            'load_more_text' => [
                'type' => 'text',
                'default' => 'Load More',
                'label' => esc_html__( 'Load More Text', 'news-magazine-x' ),
            ],
        ],
    ];
}