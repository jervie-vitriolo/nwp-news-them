<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Create a custom widget class
class Newsx_Video_Playlist extends Newsx_Widget {

    public function __construct() {
		$this->widget_cssclass = 'newsx-video-playlist-widget';
		$this->widget_description = esc_html__( 'Sample description, remove if needed.', 'news-magazine-x' );
		$this->widget_name = esc_html__( 'NewsX: Video Playlist', 'news-magazine-x' );

        // Register Fields
		$this->sections = [
            'general_section' => [
                'section_title' => [
                    'type' => 'title',
                    'label' => esc_html__( 'General', 'news-magazine-x' ),
                ],
                'widget_title' => [
                    'type' => 'text',
                    'default' => 'Video Playlist',
                    'label' => esc_html__( 'Title', 'news-magazine-x' ),
                ],
                'widget_accent_color' => [
                    'type' => 'colorpicker',
                    'default' => '',
                    'label' => esc_html__( 'Accent Color', 'news-magazine-x' ),
                ],
            ],

            'settings_section' => [
                'section_title' => [
                    'type' => 'title',
                    'label' => esc_html__( 'Settings', 'news-magazine-x' ),
                ],
                'query_group_title' => [
                    'type' => 'group-title',
                    'label' => esc_html__( 'Query', 'news-magazine-x' ),
                ],
                'playlist_query' => [
                    'type' => 'select',
                    'default' => 'custom',
                    'choices' => [
                        'custom' => esc_html__( 'Custom URLs', 'news-magazine-x' ),
                        'playlist' => esc_html__( 'YouTube Playlist', 'news-magazine-x' ),
                    ],
                    'label' => esc_html__( 'Playlist Query', 'news-magazine-x' ),
                ],
                'youtube_api_key' => [
                    'type' => 'text',
                    'default' => '',
                    'label' => esc_html__( 'YouTube API Key', 'news-magazine-x' ),
                    'description' => 'To get your <strong>Youtube API Key</strong> please watch this <strong><a href="https://youtu.be/LLAZUTbc97I" target="_blank">Video Tutorial</a></strong>.',
                ],
                'youtube_playlist_id' => [
                    'type' => 'text',
                    'default' => '',
                    'label' => esc_html__( 'YouTube Playlist ID', 'news-magazine-x' ),
                    'description' => 'To get your <strong>Youtube Playlist ID</strong> go to YouTube Channel, select Playlist and find E.g: <strong>list=PLjFiZESrp9558M7Rghnk5s4sMq6m3RyOb</strong> in the URL and copy the ID.',
                ],
                'title_group_title' => [
                    'type' => 'group-title',
                    'label' => esc_html__( 'Title', 'news-magazine-x' ),
                ],
                'title_tag' => [
                    'type' => 'select',
                    'default' => 'h6',
                    'choices' => newsx_get_html_tag_options(),
                    'label' => esc_html__( 'HTML Tag', 'news-magazine-x' ),
                ],
                'playlist_title' => [
                    'type' => 'text',
                    'default' => 'Now Playing',
                    'label' => esc_html__( 'Playlist Title', 'news-magazine-x' ),
                ],
                'urls_group_title' => [
                    'type' => 'group-title',
                    'label' => esc_html__( 'Custom Video URLs', 'news-magazine-x' ),
                ],
                'url_1' => [
                    'type' => 'url',
                    'default' => 'https://youtu.be/OrtzJs-wzlw',
                    'label' => esc_html__( 'URL 1', 'news-magazine-x' ),
                ],
                'url_2' => [
                    'type' => 'url',
                    'default' => 'https://youtu.be/zCfzzUuX8HE',
                    'label' => esc_html__( 'URL 2', 'news-magazine-x' ),
                ],
                'url_3' => [
                    'type' => 'url',
                    'default' => 'https://youtu.be/Abw5LIIfgEo',
                    'label' => esc_html__( 'URL 3', 'news-magazine-x' ),
                ],
                'url_4' => [
                    'type' => 'url',
                    'default' => 'https://youtu.be/dcpehUVAx0k',
                    'label' => esc_html__( 'URL 4', 'news-magazine-x' ),
                ],
                'url_5' => [
                    'type' => 'url',
                    'default' => 'https://youtu.be/-wTaxzBxo6E',
                    'label' => esc_html__( 'URL 5', 'news-magazine-x' ),
                ],
                'url_6' => [
                    'type' => 'url',
                    'default' => 'https://youtu.be/9qJH__RF--I',
                    'label' => esc_html__( 'URL 6', 'news-magazine-x' ),
                ],
            ],
		];

		parent::__construct();
    }
    
    public function widget( $args, $instance ) {
        $this->widget_start( $args );
        $this->instance = $instance; // Store instance for use in get_youtube_playlist_videos

        // Widget Title
        get_template_part( 'includes/widgets/extras/widget-title', '', [ 'instance' => $instance, 'widget_args' => $args ] );

        $title_tag = isset($instance['title_tag']) ? $instance['title_tag'] : 'h6';
        $playlist_title = isset($instance['playlist_title']) ? $instance['playlist_title'] : 'Now Playing';
        $playlist_query = isset($instance['playlist_query']) ? $instance['playlist_query'] : 'manual';

        // Get video URLs based on query type
        $video_urls = [];
        
        if ('playlist' === $playlist_query && !empty($instance['youtube_playlist_id'])) {
            $playlist_id = sanitize_text_field($instance['youtube_playlist_id']);
            $video_urls = $this->get_youtube_playlist_videos($playlist_id);
        } else {
            // Manual URLs
            for ($i = 1; $i <= 6; $i++) {
                if (!empty($instance['url_' . $i])) {
                    $video_urls[] = $instance['url_' . $i];
                }
            }
        }

        if (!empty($video_urls)) {
            echo '<div class="newsx-vplaylist-wrap">';
                // Video player container
                echo '<div class="video-player-wrap">';
                    echo '<div class="video-player">';
                        echo '<div class="newsx-vplaylist-main"></div>';
                    echo '</div>';
                echo '</div>';
                
                // Playlist container
                echo '<div class="newsx-vplaylist-thumbs-wrap">';
                    echo '<div class="newsx-vplaylist-highlight">';
                        echo '<div class="newsx-vplaylist-heading">';
                            echo '<span>'. esc_html($playlist_title) .'</span>';
                            echo '<'. esc_attr($title_tag) .' class="newsx-vplaylist-current-title"></'. esc_attr($title_tag) .'>';
                        echo '</div>';
                        echo '<div class="newsx-vplaylist-controller">';
                            echo '<div class="newsx-play">';
                                echo newsx_get_svg_icon('play');
                            echo '</div>';
                            echo '<div class="newsx-pause">';
                                echo newsx_get_svg_icon('pause');
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    
                    echo '<div class="newsx-vplaylist-thumbs" data-urls=\''. json_encode($video_urls) .'\'>';
                        echo '<ul></ul>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
        
        $this->widget_end( $args );
    }

    /**
     * Get videos from YouTube playlist
     */
    private function get_youtube_playlist_videos($playlist_id) {
        $api_key = isset($this->instance['youtube_api_key']) ? $this->instance['youtube_api_key'] : '';
        $videos = [];
        
        if ('' === $api_key) {
            return $videos;
        }

        $api_url = sprintf(
            'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=50&playlistId=%s&key=%s',
            $playlist_id,
            $api_key
        );

        $response = wp_remote_get($api_url);

        if (is_wp_error($response)) {
            return $videos;
        }

        $response_code = wp_remote_retrieve_response_code($response);
        if (200 !== $response_code) {
            return $videos;
        }

        $body = json_decode(wp_remote_retrieve_body($response), true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $videos;
        }
        
        if (!empty($body['items'])) {
            foreach ($body['items'] as $item) {
                if (!empty($item['snippet']['resourceId']['videoId'])) {
                    $videos[] = 'https://youtu.be/' . $item['snippet']['resourceId']['videoId'];
                }
            }
        }

        return $videos;
    }
}

// Register the widget
function register_video_playlist_widget() {
    register_widget( 'Newsx_Video_Playlist' );
}

add_action( 'widgets_init', 'register_video_playlist_widget' );