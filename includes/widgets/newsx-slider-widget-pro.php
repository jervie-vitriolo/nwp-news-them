<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Create a custom widget class
class Newsx_Slider_Carousel extends Newsx_Widget {

    public function __construct() {
		$this->widget_cssclass = 'newsx-slider-widget';
		$this->widget_description = esc_html__( 'Smaple description, remove if needed.', 'news-magazine-x' );
		$this->widget_name = esc_html__( 'NewsX: Post Slider (Carousel)', 'news-magazine-x' );

        // Register Fields
		$this->sections = [
            'widget_general_section' => [
                'section_title' => [
                    'type'  => 'title',
                    'label' => esc_html__( 'General', 'news-magazine-x' ),
                ],
                'widget_title' => [
                    'type' => 'text',
                    'default' => 'PostSlider',
                    'label' => esc_html__( 'Title', 'news-magazine-x' ),
                ],
                'widget_accent_color' => [
                    'type' => 'colorpicker',
                    'default' => '',
                    'label' => esc_html__( 'Accent Color', 'news-magazine-x' ),
                ],
                'widget_title_width' => [
                    'type' => 'select',
                    'default' => 'default',
                    'choices' => [
                        'default' => esc_html__( 'Default', 'news-magazine-x' ),
                        'container' => esc_html__( 'Container Width', 'news-magazine-x' ),
                    ],
                    'label' => esc_html__( 'Title Width', 'news-magazine-x' ),
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
                    'default' => '6',
                    'label' => esc_html__( 'Number of Posts', 'news-magazine-x' ),
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
                    'type' => 'select',
                    'default' => '1-column',
                    'choices' => [
                        '1-column' => esc_html__( 'One Column', 'news-magazine-x' ),
                        '2-column' => esc_html__( 'Two Columns', 'news-magazine-x' ),
                        '3-column' => esc_html__( 'Three Columns', 'news-magazine-x' ),
                        '4-column' => esc_html__( 'Four Columns (1580px and above)', 'news-magazine-x' ),
                        ],
                    'label' => esc_html__( 'Select Layout', 'news-magazine-x' ),
                ],
                'elements_preset' => [
                    'type' => 'select',
                    'default' => 's0',
                    'choices' => [
                        's0' => esc_html__( 'Default', 'news-magazine-x' ),
                        's1' => esc_html__( 'Style 1', 'news-magazine-x' ),
                        // 's2' => esc_html__( 'Style 2', 'news-magazine-x' ),
                        // 's3' => esc_html__( 'Style 3', 'news-magazine-x' ),
                    ],
                    'label' => esc_html__( 'Elements Preset', 'news-magazine-x' ),
                ],
                'image_size' => [
                    'type' => 'select',
                    'default' => 'newsx-1200x600',
                    'choices' => newsx_get_image_sizes(),
                    'label' => esc_html__( 'Image Size', 'news-magazine-x' ),
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
                'center_content' => [
                    'type' => 'switcher',
                    'default' => true,
                    'label' => esc_html__( 'Center Slider Content', 'news-magazine-x' ),
                ],
                'autoplay' => [
                    'type' => 'switcher',
                    'default' => false,
                    'label' => esc_html__( 'Autoplay', 'news-magazine-x' ),
                ],
                'delay' => [
                    'type' => 'number',
                    'default' => '1000',
                    'label' => esc_html__( 'Delay', 'news-magazine-x' ),
                ],
                'nav_group_title' => [
                    'type' => 'group-title',
                    'label' => esc_html__( 'Navigation', 'news-magazine-x' ),
                ],
                'nav_arrows' => [
                    'type' => 'switcher',
                    'default' => true,
                    'label' => esc_html__( 'Show Arrows', 'news-magazine-x' ),
                ],
                'nav_style' => [
                    'type' => 'select',
                    'default' => 's0',
                    'choices' => [
                        's0' => esc_html__( 'Default', 'news-magazine-x' ),
                        's1' => esc_html__( 'Style 1', 'news-magazine-x' ),
                        's2' => esc_html__( 'Style 2', 'news-magazine-x' ),
                        's3' => esc_html__( 'Style 3', 'news-magazine-x' ),
                        's4' => esc_html__( 'Style 4', 'news-magazine-x' ),
                    ],
                    'label' => esc_html__( 'Arrows Style', 'news-magazine-x' ),
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
                'read_more_group_title' => [
                    'type' => 'group-title',
                    'label' => esc_html__( 'Read More', 'news-magazine-x' ),
                ],
                'read_more_text' => [
                    'type' => 'text',
                    'default' => 'Read More',
                    'label' => esc_html__( 'Text', 'news-magazine-x' ),
                ],
            ],
		];

		parent::__construct();
    }

    // Output the content of the widget
    public function widget( $args, $instance ) {
        $this->widget_start( $args );

        // Widget Title
        get_template_part( 'includes/widgets/extras/widget-title', '', [ 'instance' => $instance, 'widget_args' => $args ] );

        // Get Query Args
        $main_query_args = newsx_get_main_query_args( $instance );
        $instance['_main_query_args'] = $main_query_args;

        // Get Posts
        $posts = new WP_Query( $main_query_args );

        // Get Layout Class
        $layout_class  = isset($instance['layout']) ? ' newsx-slider-'. $instance['layout'] : ' newsx-slider-1-column';
        $layout_class .= isset( $instance['elements_preset'] ) ? ' newsx-'. $instance['elements_preset'] : '';

        echo '<div class="newsx-slider-wrap">';

            echo '<div class="newsx-swiper swiper">';
                echo '<div class="newsx-slider swiper-wrapper '. esc_attr( $layout_class ) .'" data-id="'. esc_attr($this->id) .'"  data-newsx-settings="'. esc_attr( wp_json_encode( $instance ) ) .'">';

                // Loop: Start
                if ( $posts->have_posts() ) :
                    while ( $posts->have_posts() ) : $posts->the_post();

                        if ( !has_post_thumbnail() ) {
                            continue;
                        }

                        // Get Posts
                        $posts_layout = new Newsx_Slider_Widget_Presets( $instance );
                        $posts_layout->display();

                    endwhile;
                endif;
                wp_reset_postdata();
                
                echo '</div>';
            echo '</div>'; // end .newsx-swiper

            if ( isset( $instance['nav_arrows'] ) && $instance['nav_arrows'] ) {
                echo '<div class="newsx-slider-prev newsx-slider-arrow swiper-button-prev newsx-'. esc_attr( $instance['nav_style'] ) .'"></div>';
                echo '<div class="newsx-slider-next newsx-slider-arrow swiper-button-next newsx-'. esc_attr( $instance['nav_style'] ) .'"></div>';
            }

        echo '</div>'; // end .newsx-slider-wrap

        $this->widget_end( $args );
    }
}

// Register the widget
function register_slider_widget() {
    // Include Presets
    require_once NEWSX_INCLUDES_DIR .'/widgets/presets/class-newsx-slider-widget-presets.php';

    register_widget( 'Newsx_Slider_Carousel' );
}

add_action( 'widgets_init', 'register_slider_widget' );
