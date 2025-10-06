<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Create a custom widget class
class Newsx_News_Ticker extends Newsx_Widget {

    public function __construct() {
		$this->widget_cssclass = 'newsx-news-ticker-widget';
		$this->widget_description = esc_html__( 'Smaple description, remove if needed.', 'news-magazine-x' );
		$this->widget_name = esc_html__( 'NewsX: News Ticker', 'news-magazine-x' );

        // Register Fields
		$this->sections = [
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
                    'label' => esc_html__( 'Published X Days ago', 'news-magazine-x' ),
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
                'type_select' => [
                    'type' => 'select',
                    'label' => esc_html__( 'Ticker Type', 'news-magazine-x' ),
                    'default' => 'slider',
                    'choices' => [
                        'slider' => esc_html__( 'Slider', 'news-magazine-x' ),
                        'marquee' => esc_html__( 'Marquee', 'news-magazine-x' ),
                    ]
                ],
                'layout' => [
                    'type' => 'select',
                    'default' => '1',
                    'choices' => [
                        '1-column' => esc_html__( 'One Column', 'news-magazine-x' ),
                        '2-column' => esc_html__( 'Two Columns', 'news-magazine-x' ),
                        '3-column' => esc_html__( 'Three Columns', 'news-magazine-x' ),
                        '4-column' => esc_html__( 'Four Columns', 'news-magazine-x' ),
                        ],
                    'label' => esc_html__( 'Select Layout', 'news-magazine-x' ),
                ],
                'posts_per_page' => [
                    'type' => 'number',
                    'default' => '6',
                    'label' => esc_html__( 'Number of Posts', 'news-magazine-x' ),
                ],
                'show_image' => [
                    'type' => 'switcher',
                    'default' => false,
                    'label' => esc_html__( 'Show Thumbnails', 'news-magazine-x' ),
                ],
                'show_navigation' => [
                    'type' => 'switcher',
                    'default' => true,
                    'label' => esc_html__( 'Show Navigation', 'news-magazine-x' ),
                ],
                'open_in_new_tab' => [
                    'type' => 'switcher',
                    'default' => false,
                    'label' => esc_html__( 'Open Links in New Tab', 'news-magazine-x' ),
                ],
                'title_group_autoplay' => [
                    'type' => 'group-title',
                    'label' => esc_html__( 'Autoplay', 'news-magazine-x' ),
                ],
                'autoplay' => [
                    'type' => 'switcher',
                    'default' => false,
                    'label' => esc_html__( 'Autoplay on Load', 'news-magazine-x' ),
                ],
                'delay' => [
                    'type' => 'number',
                    'default' => '1000',
                    'label' => esc_html__( 'Autoplay Delay', 'news-magazine-x' ),
                ],
                'title_group_title' => [
                    'type' => 'group-title',
                    'label' => esc_html__( 'Post Title', 'news-magazine-x' ),
                ],
                'title_letter_count' => [
                    'type' => 'number',
                    'default' => 100,
                    'label' => esc_html__( 'Letter Count', 'news-magazine-x' ),
                ],
            ],
            'marquee_section' => [
                'marquee_direction' => [
                    'type' => 'select',
                    'default' => 'left',
                    'choices' => [
                        'left' => esc_html__( 'Left', 'news-magazine-x' ),
                        'right' => esc_html__( 'Right', 'news-magazine-x' ),
                    ],
                    'label' => esc_html__( 'Direction', 'news-magazine-x' ),
                ]
            ],
            'heading_section' => [
                'section_title' => [
                    'type' => 'title',
                    'label' => esc_html__( 'Heading', 'news-magazine-x' ),
                ],
                'heading_text' => [
                    'type' => 'text',
                    'default' => 'Hot News',
                    'label' => esc_html__( 'Text', 'news-magazine-x' ),
                ],
                'heading_icon_type' => [
                    'type' => 'select',
                    'default' => 'none',
                    'choices' => [
                        'none' => esc_html__( 'None', 'news-magazine-x' ),
                        'blink' => esc_html__( 'Blink', 'news-magazine-x' ),
                        'fire' => esc_html__( 'Fire', 'news-magazine-x' )
                    ],
                    'label' => esc_html__( 'Icon', 'news-magazine-x' ),
                ],
                'heading_bg_style' => [
                    'type' => 'select',
                    'default' => 's1',
                    'choices' => [
                        's0' => esc_html__( 'Default', 'news-magazine-x' ),
                        's1' => esc_html__( 'Style 1', 'news-magazine-x' ),
                        's2' => esc_html__( 'Style 2', 'news-magazine-x' ),
                    ],
                    'label' => esc_html__( 'Background Style', 'news-magazine-x' ),
                ],
            ],
            'styles_section' => [
                'section_title' => [
                    'type' => 'title',
                    'label' => esc_html__( 'Styles', 'news-magazine-x' ),
                ],
                'heading_group_title' => [
                    'type' => 'group-title',
                    'label' => esc_html__( 'Heading', 'news-magazine-x' ),
                ],
                'heading_text_color' => [
                    'type' => 'colorpicker',
                    'default' => '',
                    'label' => esc_html__( 'Text Color', 'news-magazine-x' ),
                ],
                'heading_icon_color' => [
                    'type' => 'colorpicker',
                    'default' => '',
                    'label' => esc_html__( 'Icon Color', 'news-magazine-x' ),
                ],
                'heading_bg_color' => [
                    'type' => 'colorpicker',
                    'default' => '#e8e8e8',
                    'label' => esc_html__( 'Background Color', 'news-magazine-x' ),
                ],
                'heading_font_size' => [
                    'type' => 'number-responsive',
                    'default' => json_encode([
                        'desktop' => 16,
                        'tablet' => 16,
                        'mobile' => 16,
                    ]),
                    'input_attrs' => [
                        'min' => 0,
                        'max' => 25,
                        'step' => 1,
                    ],
                    'label' => esc_html__( 'Font Size', 'news-magazine-x' ),
                ],
                'content_group_title' => [
                    'type' => 'group-title',
                    'label' => esc_html__( 'Content', 'news-magazine-x' ),
                ],
                'title_text_color' => [
                    'type' => 'colorpicker',
                    'default' => '',
                    'label' => esc_html__( 'Title Color', 'news-magazine-x' ),
                ],
                'title_text_color_hover' => [
                    'type' => 'colorpicker',
                    'default' => '',
                    'label' => esc_html__( 'Title Color (Hover)', 'news-magazine-x' ),
                ],
                'content_bd_color' => [
                    'type' => 'colorpicker',
                    'default' => '',
                    'label' => esc_html__( 'Content Border Color', 'news-magazine-x' ),
                ],
                'content_bg_color' => [
                    'type' => 'colorpicker',
                    'default' => '',
                    'label' => esc_html__( 'Content Background Color', 'news-magazine-x' ),
                ],
                'title_font_size' => [
                    'type' => 'number-responsive',
                    'default' => json_encode([
                        'desktop' => 16,
                        'tablet' => 16,
                        'mobile' => 16,
                    ]),
                    'input_attrs' => [
                        'min' => 0,
                        'max' => 25,
                        'step' => 1,
                    ],
                    'label' => esc_html__( 'Title Font Size', 'news-magazine-x' ),
                ],
                'nav_group_title' => [
                    'type' => 'group-title',
                    'label' => esc_html__( 'Navigation Arrows', 'news-magazine-x' ),
                ],
                'nav_color' => [
                    'type' => 'colorpicker',
                    'default' => '#e8e8e8',
                    'label' => esc_html__( 'Color', 'news-magazine-x' ),
                ],
                'nav_color_hover' => [
                    'type' => 'colorpicker',
                    'default' => '#cdcdcd',
                    'label' => esc_html__( 'Color (Hover)', 'news-magazine-x' ),
                ],
                'nav_bg_color' => [
                    'type' => 'colorpicker',
                    'default' => '',
                    'label' => esc_html__( 'Background Color', 'news-magazine-x' ),
                ],
                'nav_bg_color_hover' => [
                    'type' => 'colorpicker',
                    'default' => '',
                    'label' => esc_html__( 'Background Color (Hover)', 'news-magazine-x' ),
                ],
            ]
		];

		parent::__construct();
    }

    public function newsx_news_ticker_heading_icon( $instance ) {
        $heading_icon_type = $instance['heading_icon_type'];

        if ( 'none' !== $heading_icon_type ) {
            echo '<span class="news-ticker-heading-icon '. esc_attr($heading_icon_type) .'">';
                if ( 'blink' == $heading_icon_type ) {
                    echo '<span class="newsx-ticker-icon-circle"></span>';
                } else if ( 'fire' == $heading_icon_type ) {
                    echo newsx_get_svg_icon( $heading_icon_type );
                }
            echo '</span>';
        }
    }

    public function newsx_news_ticker_content_markup( $instance, $heading_element, $news_ticker_posts ) {
        if ( 'marquee' === $instance['type_select'] ) {
            $swiper_class = '';
            $swiper_slide = '';

            $marquee_options = [
                'direction' => 'left',
                'duplicated' => true,
                'startVisible' => true,
                'gap' => 0,
                'duration' => absint( 50 * 1000 ),
                'pauseOnHover' => true
            ];
        } else {
            $swiper_class = 'swiper';
            $swiper_slide = 'swiper-slide';
        }

        echo '<div class="newsx-news-ticker" data-ticker-type="'. $instance['type_select'] .'">';

            if ( !empty($instance['heading_text']) || 'none' !== $instance['heading_icon_type'] ) {
                echo '<'. $heading_element .' class="news-ticker-heading newsx-'. esc_attr($instance['heading_bg_style']) .'">';
                    echo '<span class="news-ticker-heading-text">'. esc_html($instance['heading_text']) .'</span>';
                    $this->newsx_news_ticker_heading_icon( $instance );
                echo '</'. $heading_element .'>';
            }

            echo '<div class="news-ticker-wrapper" data-newsx-settings="'. esc_attr( wp_json_encode( $instance ) ) .'">';

                echo '<div class="news-ticker-content '. $swiper_class .'">';
                    if ( 'marquee' === $instance['type_select'] ) {
                        echo '<div class="newsx-ticker-marquee" data-options='. wp_json_encode($marquee_options) .'>';
                    } else {
                        echo '<div class="swiper-wrapper">';
                    }

                    if ( $news_ticker_posts->have_posts() ) :
                        while ( $news_ticker_posts->have_posts() ) : $news_ticker_posts->the_post();

                            echo '<div class="news-ticker-post '. $swiper_slide .'">';
            
                            $instance['_el_locations'] = [
                                'below' => [
                                    'title',
                                ]
                            ];

                            // Get Post Template
                            get_template_part( 'includes/widgets/loop/news-ticker-post', '', [ 'instance' => $instance ] );

                            echo '</div>';

                        endwhile;
                    endif;

                    wp_reset_postdata();

                    echo '</div>';
                echo '</div>';

                if ( 'slider' === $instance['type_select'] && $instance['show_navigation'] ) {
                    echo '<div class="newsx-slider-prev swiper-button-prev"></div>';
                    echo '<div class="newsx-slider-next swiper-button-next"></div>';
                }

            echo '</div>';
        echo '</div>';
    }

    // Output the content of the widget
    public function widget( $args, $instance ) {
        $this->widget_start( $args );

            if ( ! empty( $instance ) ) {

                // Add Query Args to Instance for AJAX
                $main_query_args = newsx_get_main_query_args( $instance );
                $instance['_main_query_args'] = $main_query_args;
    
                // Get Posts
                $posts = new WP_Query( $main_query_args );
    
                // Get Post Count
                $instance['_post_count'] = $posts->found_posts;
    
                // Get Layout Class
                $ticker_type  = ' newsx-news-ticker-'. $instance['type_select'];
    
                $heading_element = isset($instance['heading_link']) ? 'a' : 'div';
    
                $this->newsx_news_ticker_content_markup( $instance, $heading_element, $posts );

            }

        $this->widget_end( $args );
    }
}

// Register the widget
function register_news_ticker_widget() {
    register_widget( 'Newsx_News_Ticker' );
}

add_action( 'widgets_init', 'register_news_ticker_widget' );