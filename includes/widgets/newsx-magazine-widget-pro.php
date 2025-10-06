<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function newsx_magazine_widget_options() {
    return [
        'widget_general_section' => [
            'section_title' => [
                'type'  => 'title',
                'label' => esc_html__( 'General', 'news-magazine-x' ),
            ],
            'widget_title' => [
                'type' => 'text',
                'default' => 'Latest Posts',
                'label' => esc_html__( 'Widget Title', 'news-magazine-x' ),
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
                'default' => '1-2',
                'choices' => [
                    '1-2' => [
                        'image' => newsx_get_svg_icon('mgz-layout-1'),
                        'title' => esc_html__( ' (3 posts)', 'news-magazine-x' ),
                    ],
                    '1-3' => [
                        'image' => newsx_get_svg_icon('mgz-layout-2'),
                        'title' => esc_html__( '4 posts', 'news-magazine-x' ),
                    ],
                    '1-4' => [
                        'image' => newsx_get_svg_icon('mgz-layout-3'),
                        'title' => esc_html__( '5 posts', 'news-magazine-x' ),
                    ],
                    '1-1-2' => [
                        'image' => newsx_get_svg_icon('mgz-layout-4'),
                        'title' => esc_html__( '4 posts', 'news-magazine-x' ),
                    ],
                    '2-1-2' => [
                        'image' => newsx_get_svg_icon('mgz-layout-5'),
                        'title' => esc_html__( '5 posts', 'news-magazine-x' ),
                    ],
                    '1vh-3h' => [
                        'image' => newsx_get_svg_icon('mgz-layout-6'),
                        'title' => esc_html__( '4 posts', 'news-magazine-x' ),
                    ],
                    '1-1-1' => [
                        'image' => newsx_get_svg_icon('mgz-layout-7'),
                        'title' => esc_html__( '3 posts', 'news-magazine-x' ),
                    ],
                    '1-1-3' => [
                        'image' => newsx_get_svg_icon('mgz-layout-8'),
                        'title' => esc_html__( '5 posts', 'news-magazine-x' ),
                    ],
                    '2-3' => [
                        'image' => newsx_get_svg_icon('mgz-layout-9'),
                        'title' => esc_html__( '5 posts', 'news-magazine-x' ),
                    ],
                    '2-h' => [
                        'image' => newsx_get_svg_icon('mgz-layout-10'),
                        'title' => esc_html__( '2, 4, 6 posts', 'news-magazine-x' ),
                    ],
                    '3-h' => [
                        'image' => newsx_get_svg_icon('mgz-layout-11'),
                        'title' => esc_html__( '3, 6, 9 posts', 'news-magazine-x' ),
                    ],
                    '4-h' => [
                        'image' => newsx_get_svg_icon('mgz-layout-12'),
                        'title' => esc_html__( '4, 8, 12 posts', 'news-magazine-x' ),
                    ]
                    ],
                'label' => esc_html__( 'Select Layout', 'news-magazine-x' ),
            ],
            'elements_preset' => [
                'type' => 'select',
                'default' => 's0',
                'choices' => [
                    's0' => esc_html__( 'Default', 'news-magazine-x' ),
                    's1' => esc_html__( 'Style 1', 'news-magazine-x' ),
                    's2' => esc_html__( 'Style 2', 'news-magazine-x' ),
                ],
                'label' => esc_html__( 'Elements Preset', 'news-magazine-x' ),
            ],
            'container_height' => [
                'type' => 'number-responsive',
                'default' => json_encode([
                    'desktop' => 650,
                    'tablet' => 550,
                    'mobile' => 650,
                ]),
                'input_attrs' => [
                    'min' => 100,
                    'max' => 1000,
                    'step' => 10,
                ],
                'label' => esc_html__( 'Container Height', 'news-magazine-x' ),
            ],
            'gutter' => [
                'type' => 'number-responsive',
                'default' => json_encode([
                    'desktop' => 15,
                    'tablet' => 15,
                    'mobile' => 15,
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
    ];
}