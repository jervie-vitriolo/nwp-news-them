<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( !is_admin() ) {
    return;
}

class Newsx_Core_Pro_Helpers {

	/**
	 * Delete Kirki Google Fonts transients
	 */
    public static function delete_kirki_font_transients() {
        global $wpdb;
        
        // Delete site-specific transients
        $transients = $wpdb->get_col("
            SELECT option_name FROM {$wpdb->options} 
            WHERE option_name LIKE '_site_transient_kirki_googlefonts%'
        ");

        foreach ($transients as $transient) {
            $transient_name = str_replace('_site_transient_', '', $transient);
            delete_site_transient($transient_name);
        }

        // Handle multisite network-wide transients
        if (is_multisite()) {
            $network_transients = $wpdb->get_col("
                SELECT meta_key FROM {$wpdb->sitemeta} 
                WHERE meta_key LIKE '_site_transient_kirki_googlefonts%'
            ");

            foreach ($network_transients as $transient) {
                $transient_name = str_replace('_site_transient_', '', $transient);
                delete_site_transient($transient_name);
            }
        }
    }

	/**
	 * Get Available Elements Array
	 */
	public static function get_available_elements_array( $component = 'header' ) {
		if ( 'header' === $component ) {
			$elements = [
				'site-identity' => esc_html__( 'Logo / Site Title', 'news-magazine-x' ),
				'primary-menu' => esc_html__( 'Primary Menu', 'news-magazine-x' ),
				'secondary-menu' => esc_html__( 'Secondary Menu', 'news-magazine-x' ),
				'date-and-time'  => esc_html__( 'Date and Time', 'news-magazine-x' ),
				'news-ticker' => esc_html__( 'News Ticker', 'news-magazine-x' ),
				'social-icons' => esc_html__( 'Social Icons', 'news-magazine-x' ),
				'search' => esc_html__( 'Search', 'news-magazine-x' ),
				'offcanvas' => esc_html__( 'Off-Canvas', 'news-magazine-x' ),
				'cta-button' => esc_html__( 'CTA Button', 'news-magazine-x' ),
				'weather' => esc_html__( 'Weather', 'news-magazine-x' ),
				'random-post' => esc_html__( 'Random Post', 'news-magazine-x' ),
				'dark-switcher' => esc_html__( 'Dark Mode Switcher', 'news-magazine-x' ),
				'custom-html-1' => esc_html__( 'Custom HTML 1', 'news-magazine-x' ),
				'custom-html-2' => esc_html__( 'Custom HTML 2', 'news-magazine-x' ),
				'header-widgets-1' => esc_html__( 'Widgets Area 1', 'news-magazine-x' ),
				'header-widgets-2' => esc_html__( 'Widgets Area 2', 'news-magazine-x' ),
			];
		} elseif ( 'footer' === $component ) {
			$elements = [
				'logo' => esc_html__( 'Logo', 'news-magazine-x' ),
				'copyright' => esc_html__( 'Copyright', 'news-magazine-x' ),
				'footer-menu' => esc_html__( 'Footer Menu', 'news-magazine-x' ),
				'social-icons' => esc_html__( 'Social Icons', 'news-magazine-x' ),
				'custom-html-1' => esc_html__( 'Custom HTML 1', 'news-magazine-x' ),
				'custom-html-2' => esc_html__( 'Custom HTML 2', 'news-magazine-x' ),
				'footer-widgets-1' => esc_html__( 'Widgets Area 1', 'news-magazine-x' ),
				'footer-widgets-2' => esc_html__( 'Widgets Area 2', 'news-magazine-x' ),
				'footer-widgets-3' => esc_html__( 'Widgets Area 3', 'news-magazine-x' ),
				'footer-widgets-4' => esc_html__( 'Widgets Area 4', 'news-magazine-x' ),
				'footer-widgets-5' => esc_html__( 'Widgets Area 5', 'news-magazine-x' ),
				'footer-widgets-6' => esc_html__( 'Widgets Area 6', 'news-magazine-x' ),
			];
		}
		
		return $elements;
	}

	/**	
	 * Get Orderby Query Choices
	 */
	public static function get_orderby_query_choices( $exclude = [] ) {
		$choices = [
			'date' => esc_html__( 'Published Date', 'news-magazine-x' ),
			'modified' => esc_html__( 'Last Modified', 'news-magazine-x' ),
			'comment_count' => esc_html__( 'Comments Count', 'news-magazine-x' ),
			'popular' => esc_html__( 'Popular (by Post Views)', 'news-magazine-x' ),
			'popular-custom' => esc_html__( 'Popular Custom (by Post Views)', 'news-magazine-x' ),
			'rand' => esc_html__( 'Random', 'news-magazine-x' ),
			'random-custom' => esc_html__( 'Random Custom', 'news-magazine-x' ),
			'title' => esc_html__( 'Post Title', 'news-magazine-x' ),
			'ID' => esc_html__( 'Post ID', 'news-magazine-x' ),
			'author' => esc_html__( 'Post Author', 'news-magazine-x' ),
		];
	
		if ( ! empty( $exclude ) ) {
			foreach ( $exclude as $key ) {
				unset( $choices[ $key ] );
			}
		}
	
		return $choices;
	}
    
}