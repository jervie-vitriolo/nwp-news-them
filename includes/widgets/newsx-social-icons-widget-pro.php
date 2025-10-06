<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function newsx_social_icons_widget_options() {
    return [
        'widget_general_section' => [
            'section_title' => [
                'type'  => 'title',
                'label' => esc_html__( 'General', 'news-magazine-x' ),
            ],
            'widget_title' => [
                'type' => 'text',
                'default' => 'Social Icons',
                'label' => esc_html__( 'Widget Title', 'news-magazine-x' ),
            ],
            'widget_accent_color' => [
                'type' => 'colorpicker',
                'default' => '',
                'label' => esc_html__( 'Accent Color', 'news-magazine-x' ),
            ],
            'settings_group_title' => [
                'type' => 'group-title',
                'label' => esc_html__( 'Settings', 'news-magazine-x' ),
            ],
            'use_original_colors' => [
                'type' => 'switcher',
                'default' => false,
                'label' => esc_html__( 'Use Original colors', 'news-magazine-x' ),
            ],
            'thousand_separator' => [
                'type' => 'switcher',
                'default' => false,
                'label' => esc_html__( 'Thousand Separator', 'news-magazine-x' ),
            ],
            'icon_size' => [
                'type' => 'number',
                'default' => '20',
                'label' => esc_html__( 'Icon Size', 'news-magazine-x' ),
            ],
        ],
        'layout_section' => [
            'section_title' => [
                'type'  => 'title',
                'label' => esc_html__( 'Layout', 'news-magazine-x' ),
            ],
            'social_layout' => [
                'type' => 'select',
                'default' => 's0',
                'choices' => [
                    's0' => esc_html__( 'Default', 'news-magazine-x' ),
                    's1' => esc_html__( 'Style 1', 'news-magazine-x' ),
                    's2' => esc_html__( 'Style 2', 'news-magazine-x' ),
                ],
                'label' => esc_html__( 'Social Layout', 'news-magazine-x' ),
            ],
            'social_style' => [
                'type' => 'select',
                'default' => 's0',
                'choices' => [
                    's0' => esc_html__( 'Default', 'news-magazine-x' ),
                    's1' => esc_html__( 'Style 1', 'news-magazine-x' ),
                    's2' => esc_html__( 'Style 2', 'news-magazine-x' ),
                ],
                'label' => esc_html__( 'Social Style (Original Colors)', 'news-magazine-x' ),
            ],
            'columns' => [
                'type' => 'select',
                'default' => '1',
                'choices' => [
                    '1' => esc_html__( '1 Column', 'news-magazine-x' ),
                    '2' => esc_html__( '2 Columns', 'news-magazine-x' ),
                ],
                'label' => esc_html__( 'Columns', 'news-magazine-x' ),
            ],
        ],
        'social_icons_section' => [
            'section_title' => [
                'type'  => 'title',
                'label' => esc_html__( 'Social Icons', 'news-magazine-x' ),
            ],
            'facebook_group_title' => [
                'type' => 'group-title',
                'label' => esc_html__( 'Facebook', 'news-magazine-x' ),
            ],
            'facebook_url' => [
                'type' => 'url',
                'default' => '#',
                'label' => esc_html__( 'Social URL', 'news-magazine-x' ),
            ],
            'facebook_followers' => [
                'type' => 'number',
                'default' => '1000',
                'label' => esc_html__( 'Likes / Followers Count', 'news-magazine-x' ),
            ],
            'x_twitter_group_title' => [
                'type' => 'group-title',
                'label' => esc_html__( 'X (Twitter)', 'news-magazine-x' ),
            ],
            'x_twitter_url' => [
                'type' => 'url',
                'default' => '#',
                'label' => esc_html__( 'Social URL', 'news-magazine-x' ),
            ],
            'x_twitter_followers' => [
                'type' => 'number',
                'default' => '1000',
                'label' => esc_html__( 'Likes / Followers Count', 'news-magazine-x' ),
            ],
            'instagram_group_title' => [
                'type' => 'group-title',
                'label' => esc_html__( 'Instagram', 'news-magazine-x' ),
            ],
            'instagram_url' => [
                'type' => 'url',
                'default' => '#',
                'label' => esc_html__( 'Social URL', 'news-magazine-x' ),
            ],
            'instagram_followers' => [
                'type' => 'number',
                'default' => '1000',
                'label' => esc_html__( 'Likes / Followers Count', 'news-magazine-x' ),
            ],
            'pinterest_group_title' => [
                'type' => 'group-title',
                'label' => esc_html__( 'Pinterest', 'news-magazine-x' ),
            ],
            'pinterest_url' => [
                'type' => 'url',
                'default' => '#',
                'label' => esc_html__( 'Social URL', 'news-magazine-x' ),
            ],
            'pinterest_followers' => [
                'type' => 'number',
                'default' => '1000',
                'label' => esc_html__( 'Likes / Followers Count', 'news-magazine-x' ),
            ],
            'youtube_group_title' => [
                'type' => 'group-title',
                'label' => esc_html__( 'Youtube', 'news-magazine-x' ),
            ],
            'youtube_url' => [
                'type' => 'url',
                'default' => '#',
                'label' => esc_html__( 'Social URL', 'news-magazine-x' ),
            ],
            'youtube_followers' => [
                'type' => 'number',
                'default' => '1000',
                'label' => esc_html__( 'Likes / Followers Count', 'news-magazine-x' ),
            ],
            'tiktok_group_title' => [
                'type' => 'group-title',
                'label' => esc_html__( 'Tiktok', 'news-magazine-x' ),
            ],
            'tiktok_url' => [
                'type' => 'url',
                'default' => '#',
                'label' => esc_html__( 'Social URL', 'news-magazine-x' ),
            ],
            'tiktok_followers' => [
                'type' => 'number',
                'default' => '1000',
                'label' => esc_html__( 'Likes / Followers Count', 'news-magazine-x' ),
            ],
            'telegram_group_title' => [
                'type' => 'group-title',
                'label' => esc_html__( 'Telegram', 'news-magazine-x' ),
            ],
            'telegram_url' => [
                'type' => 'url',
                'default' => '#',
                'label' => esc_html__( 'Social URL', 'news-magazine-x' ),
            ],
            'telegram_followers' => [
                'type' => 'number',
                'default' => '1000',
                'label' => esc_html__( 'Likes / Followers Count', 'news-magazine-x' ),
            ],
            'soundcloud_group_title' => [
                'type' => 'group-title',
                'label' => esc_html__( 'Soundcloud', 'news-magazine-x' ),
            ],
            'soundcloud_url' => [
                'type' => 'url',
                'default' => '#',
                'label' => esc_html__( 'Social URL', 'news-magazine-x' ),
            ],
            'soundcloud_followers' => [
                'type' => 'number',
                'default' => '1000',
                'label' => esc_html__( 'Likes / Followers Count', 'news-magazine-x' ),
            ],
            'vimeo_group_title' => [
                'type' => 'group-title',
                'label' => esc_html__( 'Vimeo', 'news-magazine-x' ),
            ],
            'vimeo_url' => [
                'type' => 'url',
                'default' => '#',
                'label' => esc_html__( 'Social URL', 'news-magazine-x' ),
            ],
            'vimeo_followers' => [
                'type' => 'number',
                'default' => '1000',
                'label' => esc_html__( 'Likes / Followers Count', 'news-magazine-x' ),
            ],
            'dribbble_group_title' => [
                'type' => 'group-title',
                'label' => esc_html__( 'Dribbble', 'news-magazine-x' ),
            ],
            'dribbble_url' => [
                'type' => 'url',
                'default' => '#',
                'label' => esc_html__( 'Social URL', 'news-magazine-x' ),
            ],
            'dribbble_followers' => [
                'type' => 'number',
                'default' => '1000',
                'label' => esc_html__( 'Likes / Followers Count', 'news-magazine-x' ),
            ],
        ],
    ];
}