<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Newsx_Core_Pro_Dynamic_CSS {
	static function get_global_colors() {
		$parse_css = '';

		$accent_color_selector = '.newsx-nav-menu a:hover, .newsx-nav-menu .current-menu-item > a, .newsx-nav-menu .current-menu-ancestor > a, .newsx-header-social-icons .newsx-social-icon:hover, .newsx-social-icon:hover, .newsx-cta-button:hover a, .newsx-random-post:hover a, .newsx-tabs li.active, #newsx-back-to-top.newsx-trans-bg svg, .newsx-grid-filter:hover, .newsx-grid-filter.active';
		$accent_color_bg_selector = '.newsx-pointer-item:after, .newsx-dark-mode-switcher .newsx-switch-to-light, .search-submit, .newsx-header-search .newsx-search-results-view-all a, .newsx-weather-header, .newsx-vplaylist-controller, .newsx-newsletter-form input[type="submit"], .newsx-s1.newsx-category-list .category-count, .newsx-post-index, .newsx-blog-pagination .current, .newsx-reading-progress-bar, .newsx-post-sources .postsource-tag a, #newsx-back-to-top:not(.newsx-trans-bg), .wp-block-search__button, .newsx-s0.newsx-widget-title-wrap .newsx-widget-title-text, .newsx-menu-item-label, .newsx-widget :not(.newsx-original-colors) .newsx-social-icon:hover, .newsx-post-sources .source-tag a, .newsx-single-continue-reading a';
		$accent_color_bd_selector = '.sub-menu, #newsx-back-to-top.newsx-trans-bg, blockquote, .newsx-widget-title-wrap, .newsx-widget-title-text, .newsx-widget-title-text:after, .newsx-widget .newsx-ring-loader div, .wp-block-quote, .newsx-menu-item-label';
		$accent_color_svg_selector = '.newsx-nav-menu a:hover svg, .newsx-nav-menu .current-menu-item > a svg, .newsx-nav-menu .current-menu-ancestor > a svg, .newsx-header-social-icons .newsx-social-icon:hover svg, .newsx-social-icon:hover svg, .newsx-cta-button:hover svg, .newsx-header-search .newsx-search-icon:hover svg, .newsx-random-post:hover svg, .newsx-switch-to-dark:hover svg, #newsx-back-to-top.newsx-trans-bg svg, .newsx-post-sharing .sharing-icons svg:hover';
		$links_color_selector = 'a';
		$links_color_svg_selector = '';
		$link_hover_color_selector = 'a:hover, .newsx-table-of-contents a:hover, .wp-block-tag-cloud.is-style-outline a:hover, .newsx-grid-read-more a:hover, .newsx-breadcrumbs a:hover, .newsx-post-meta-inner div a:hover, a.comment-reply-link:hover, .newsx-post-sources .post-source:not(.source-tag) a:hover, .widget_nav_menu li a:hover, .post-page-numbers.current, .newsx-category-list li a:hover';
		$link_hover_color_svg_selector = '';
		$headings_color_selector = 'h1, h1 a, h2, h2 a, h3, h3 a, h4, h4 a, h5, h5 a, h6, h6 a, .newsx-site-title-tagline .site-title a, .newsx-header-menu-primary a, .newsx-mobile-menu-toggle, .newsx-header-social-icons .newsx-social-icon, .newsx-random-post svg, .newsx-grid-title > :where(div, p, span) a, .newsx-ajax-search-results .search-results-content a, .newsx-table-of-contents a, .newsx-grid-read-more a, .newsx-weather-content .weather-location, .newsx-weather-content .weather-temp, .newsx-post-meta-inner .newsx-post-author a, .comment-author, .comment .comment-author a, .newsx-post-content + .newsx-static-sharing .sharing-header, .newsx-single-post-media .image-caption, .newsx-newsletter-title svg, .widget_block .wp-block-quote, .widget_block .wp-block-details:not(.has-text-color) summary, table:not(.has-text-color) thead th, .widget_block table:not(.has-text-color) thead th, table:not(.has-text-color) tfoot tr, .widget_block table:not(.has-text-color) tfoot tr, .newsx-widget .soc-brand, .newsx-widget .newsx-lt-s1 .soc-label1, .newsx-widget .soc-count';
		$heading_color_bg_selector = '.comment-form .form-submit .submit, .post-password-form input[type="submit"], .wpcf7-submit, .wp-block-file__button, .wp-block-loginout .button';
		$headings_color_svg_selector = '.newsx-header-search .newsx-search-icon svg, .newsx-post-author-box svg, .newsx-widget .newsx-social-icon svg, .newsx-header-social-icons .newsx-social-icon svg, .newsx-post-sharing .sharing-icons svg';
		$body_text_color_selector = 'body, button, input, select, textarea, .newsx-social-icon, .newsx-cta-button a, .newsx-random-post a, .newsx-blog-pagination > *, .newsx-breadcrumbs a, .newsx-post-sources a, .widget_nav_menu li a, .newsx-grid-view-all a, .newsx-category-list li a';
		$body_text_placeholder_color_selector = '.search-field::placeholder, .newsx-newsletter-form input::placeholder, .wp-block-search__input::placeholder';
		$body_text_color_svg_selector = '.newsx-social-icon svg, .newsx-search-icon svg, .newsx-cta-button svg, .newsx-random-post svg, .newsx-switch-to-dark svg, .widget_nav_menu svg';
		$meta_color_selector = '.newsx-weather-content .weather-condition, .newsx-weather-content .weather-extra-info, .newsx-grid-date-time, .newsx-grid-author a, .newsx-grid-author a:hover, .newsx-grid-post-meta div:first-child:after, .wp-block-tag-cloud.is-style-outline a, .sharing-header, .newsx-post-meta-inner, .newsx-post-meta-inner a, .newsx-post-author-box .author-job, .newsx-related-posts .post-date, .comment-meta, .comment-meta a, .comment-respond .logged-in-as, .comment-respond .logged-in-as, .comment-respond .comment-notes, .comment-form .comment-form-cookies-consent label, .comment-form textarea::placeholder, .comment-form input::placeholder, .wpcf7-form-control::placeholder, .newsx-post-content + .newsx-static-sharing .sharing-header svg, .newsx-newsletter-form .agree-to-terms, .newsx-newsletter-policy, .newsx-archive-page-header .sub-categories span, .newsx-ajax-search-results .search-results-content span';
		$meta_color_svg_selector = '.sharing-header svg, .newsx-post-meta-inner svg';
		$borders_color_selector = 'pre, button, input, select, textarea, .newsx-mobile-menu li, .newsx-cta-button, .search-form, .search-field, .newsx-ajax-search-results, .newsx-s1-ft.newsx-widget-title-wrap, .newsx-grid-filters-dropdown, .newsx-prev, .newsx-next, .newsx-load-more, .newsx-category-list li a, .newsx-tabs li, .newsx-social-icon, .newsx-blog-pagination > *, article.entry-comments, .newsx-table-of-contents a, .newsx-post-navigation, .newsx-post-navigation .newsx-divider, .comments-pagination, .newsx-post-author-box, .newsx-newsletter-wrap, .newsx-related-posts-wrap, table, td, th, .widget_block table thead, .widget_block table th, .widget_block table td, .widget_block table tfoot, .wp-block-search__input, :where(.wp-block-search__button-inside .wp-block-search__inside-wrapper), .wp-block-tag-cloud.is-style-outline a, .widget_nav_menu li a, .wp-block-group, .wp-block-code, .wp-block-table thead, .wp-block-table tfoot, .wp-block-table td, .wp-block-table th';
		$content_background_color_selector = '.newsx-offcanvas-widgets-area, .newsx-mobile-menu-container, .search-form, .newsx-ajax-search-results, .newsx-table-of-contents h3:after, .newsx-single-post-media .image-caption, .newsx-table-of-contents > div:before, .comment-form textarea, .comment-form input';

		if ( !newsx_get_option('global_island_style') ) {
			$content_background_color_selector .= ', .newsx-row-inner, .newsx-single-wrap, .newsx-blog-page-wrap, .newsx-archive-page-wrap, .newsx-default-page-wrap';
		} else {
			$content_background_color_selector .= ', ';
			$content_background_color_selector .= '.site-content :where(section.newsx-list-widget, section.newsx-grid-widget, section.newsx-social-icons-widget, section.newsx-featured-tabs-widget, section.newsx-featured-posts-widget, section.newsx-category-list-widget, .widget_tag_cloud, .widget_text, .widget_block .wp-block-table, .widget_search, .newsx-single-content-wrap, .newsx-default-page-wrap .primary), .primary > .newsx-posts-feed .newsx-grid-item, .primary > .newsx-posts-feed > .newsx-blog-pagination, .newsx-fp-row-extra .newsx-posts-feed .newsx-grid-item';
		}
		
		$accent_color = newsx_get_option('global_color_accent');
		$links_color = newsx_get_option('global_color_links');
		$headings_color = newsx_get_option('global_color_headings');
		$body_text_color = newsx_get_option('global_color_body_text');
		$meta_color = newsx_get_option('global_color_meta');
		$borders_color = newsx_get_option('global_color_borders');
		$site_background_color = newsx_get_option('global_color_site_background');
		$content_background_color = newsx_get_option('global_color_content_background');

		// Accent
		$parse_css .= newsx_parse_css([
			$accent_color_selector => [
				'color' => $accent_color,
			],
			$accent_color_bg_selector => [
				'background-color' => $accent_color,
			],
			$accent_color_svg_selector => [
				'fill' => $accent_color,
			],
			$accent_color_bd_selector => [
				'border-color' => $accent_color,
			],
			'.newsx-tabs li.active' => [
				'border-bottom-color' => $accent_color .' !important',
			],
			'.newsx-post-sources .source-tag a:hover' => [
				'box-shadow' => '0 0 5px 3px ' . newsx_hex_to_rgba($accent_color, 0.2),
			],
			'.newsx-underline-hover:hover' => [
				'text-decoration-color' => $accent_color,
				'-webkit-text-decoration-color' => $accent_color,
			],
		]);

		// Links
		$parse_css .= newsx_parse_css([
			$links_color_selector => [
				'color' => $links_color['normal'],
			],
			$links_color_svg_selector => [
				'fill' => $links_color['normal'],
			],


			$link_hover_color_selector => [
				'color' => $links_color['hover'],
			],
			$link_hover_color_svg_selector => [
				'fill' => $links_color['hover'],
			],
		]);

		// Headings
		$parse_css .= newsx_parse_css([
			$headings_color_selector => [
				'color' => $headings_color,
			],
			$heading_color_bg_selector => [
				'background-color' => $headings_color,
			],
			$headings_color_svg_selector => [
				'fill' => $headings_color,
			],
		]);

		// Body Text
		$parse_css .= newsx_parse_css([
			$body_text_color_selector => [
				'color' => $body_text_color,
			],
			$body_text_color_svg_selector => [
				'fill' => $body_text_color,
			],
			'.newsx-search-icon .newsx-ring-loader div' => [
				'border-left-color' => $body_text_color,
			],
		]);

		// Body Text - Placeholders
		$parse_css .= newsx_parse_css([
			$body_text_placeholder_color_selector => [
				'color' => newsx_hex_to_rgba($body_text_color, 0.6),
			],
		]);

		// Meta
		$parse_css .= newsx_parse_css([
			$meta_color_selector => [
				'color' => $meta_color,
			],
			$meta_color_svg_selector => [
				'fill' => $meta_color,
			],
			'.newsx-post-meta-inn-group > div:after, .newsx-grid-post-meta div:first-child:after' => [
				'background-color' => $meta_color,
			],
		]);

		// Borders
		$parse_css .= newsx_parse_css([
			$borders_color_selector => [
				'border-color' => $borders_color,
			],
			'.wp-block-separator' => [
				'color' => $borders_color,
			],
			'hr, .wp-block-separator, :where(.wp-block-calendar table:not(.has-background) th), code, kbd, samp' => [
				'background-color' => $borders_color,
			],
			'.newsx-dark-mode-switcher' => [
				'background-color' => newsx_hex_to_rgba($borders_color, 0.8),
			]
		]);

		$parse_css .= newsx_get_background_css($site_background_color, 'body, .site-content');

		$parse_css .= newsx_parse_css([
			$content_background_color_selector => [
				'background-color' => $content_background_color,
			],
			'.search-form::after' => [
				'border-color' => $content_background_color,
			],
		]);

		// Footer Custom Colors
		if ( newsx_get_option('global_color_footer_enable') ) {
			$footer_headings_color_selector = '.newsx-site-footer h1, .newsx-site-footer h1 a, .newsx-site-footer h2, .newsx-site-footer h2 a, .newsx-site-footer h3, .newsx-site-footer h3 a, .newsx-site-footer h4, .newsx-site-footer h4 a, .newsx-site-footer h5, .newsx-site-footer h5 a, .newsx-site-footer h6, .newsx-site-footer h6 a, .newsx-site-footer .newsx-grid-title > :where(div, p, span) a, .newsx-site-footer a';
			$footer_heading_color_bg_selector = '';
			$footer_headings_color_svg_selector = '';
			$footer_text_color_selector = '.newsx-site-footer, .newsx-site-footer button, .newsx-site-footer input, .newsx-site-footer select, .newsx-site-footer textarea, .newsx-site-footer .newsx-social-icon, .newsx-site-footer .newsx-category-list li a';
			$footer_text_placeholder_color_selector = '.newsx-site-footer .search-field::placeholder, .newsx-site-footer .newsx-newsletter-form input::placeholder, .newsx-site-footer .wp-block-search__input::placeholder';
			$footer_text_color_svg_selector = '.newsx-site-footer .newsx-social-icon svg, .newsx-site-footer .newsx-search-icon svg';
			$footer_meta_color_selector = '.newsx-site-footer .newsx-post-meta';
			$footer_meta_color_svg_selector = '';
			$footer_borders_color_selector = '.newsx-site-footer pre, .newsx-site-footer button, .newsx-site-footer input, .newsx-site-footer select, .newsx-site-footer textarea, .newsx-site-footer .search-form, .newsx-site-footer .search-field, .newsx-site-footer .newsx-widget-title-wrap:where(.newsx-s1-ft,.newsx-s2-ft), .newsx-site-footer .newsx-category-list.newsx-s0 li a, .newsx-site-footer .newsx-tabs li';

			$footer_headings_color = newsx_get_option('global_color_footer_headings');
			$footer_text_color = newsx_get_option('global_color_footer_text');
			$footer_meta_color = newsx_get_option('global_color_footer_meta');
			$footer_borders_color = newsx_get_option('global_color_footer_borders');

			// Footer Headings
			$parse_css .= newsx_parse_css([
				$footer_headings_color_selector => [
					'color' => $footer_headings_color,
				],
				// $footer_heading_color_bg_selector => [
				// 	'background-color' => $footer_headings_color,
				// ],
				// $footer_headings_color_svg_selector => [
				// 	'fill' => $footer_headings_color,
				// ],
			]);

			// Footer Text
			$parse_css .= newsx_parse_css([
				$footer_text_color_selector => [
					'color' => $footer_text_color,
				],
				$footer_text_color_svg_selector => [
					'fill' => $footer_text_color,
				],
			]);

			// Footer Text - Placeholders
			$parse_css .= newsx_parse_css([
				$footer_text_placeholder_color_selector => [
					'color' => newsx_hex_to_rgba($footer_text_color, 0.6),
				],
			]);

			// Meta
			$parse_css .= newsx_parse_css([
				$footer_meta_color_selector => [
					'color' => $footer_meta_color,
				],
				// $footer_meta_color_svg_selector => [
				// 	'fill' => $footer_meta_color,
				// ],
				'.newsx-site-footer .newsx-post-meta-inn-group > div:after, .newsx-site-footer .newsx-grid-post-meta div:first-child:after' => [
					'background-color' => $footer_meta_color,
				],
			]);

			// Footer Borders
			$parse_css .= newsx_parse_css([
				$footer_borders_color_selector => [
					'border-color' => $footer_borders_color,
				],
				'.wp-block-separator' => [
					'color' => $borders_color,
				],
				'.newsx-site-footer hr, .newsx-site-footer .wp-block-separator, .newsx-site-footer :where(.wp-block-calendar table:not(.has-background) th), .newsx-site-footer code, .newsx-site-footer kbd, .newsx-site-footer samp' => [
					'background-color' => $footer_borders_color,
				],
			]);
		}

		return $parse_css;
	}

	static function get_global_typography() {
		$parse_css = '';

		// Headings Font
		$heading_font_selector = 'h1, h1 .author-name, h2, h3, h4, h5, h6, .widget_block .wp-block-quote p, .widget_block table thead th, .widget_block table tfoot tr';
		$global_font_heading = newsx_get_option('global_font_heading');

		$parse_css .= newsx_get_typography_css($global_font_heading, $heading_font_selector);
	
		// Custom Heading Fonts 
		$parse_css .= newsx_get_typography_css(newsx_get_option('global_font_h1'), 'h1');
		$parse_css .= newsx_get_typography_css(newsx_get_option('global_font_h2'), 'h2');
		$parse_css .= newsx_get_typography_css(newsx_get_option('global_font_h3'), 'h3');
		$parse_css .= newsx_get_typography_css(newsx_get_option('global_font_h4'), 'h4');
		$parse_css .= newsx_get_typography_css(newsx_get_option('global_font_h5'), 'h5');
		$parse_css .= newsx_get_typography_css(newsx_get_option('global_font_h6'), 'h6');
	
		$parse_css .= newsx_parse_css([
			'.newsx-widget .newsx-social-icon .soc-brand, .newsx-widget .newsx-lt-s1 .newsx-social-icon .soc-label1, .newsx-widget .newsx-social-icon .soc-count' => [
				'font-family' => $global_font_heading['font-family'],
				'font-weight' => 'bold',
			],
		]);
		
		// Add Extra PX to Weather Widget
		$global_font_h2 = newsx_get_option('global_font_h2');
		$parse_css .= newsx_get_resp_slider_control_css($global_font_h2['font-size'], '.newsx-weather-content .weather-temp', 'font-size', 'px', -20); // -- hack to make +

		return $parse_css;
	}

	static function get_global_layout_styles() {
		$parse_css = '';

		$global_container_width = newsx_get_option('global_container_width');
		$global_container_padding = newsx_get_option('global_container_padding');
		$global_padding_selector = '.newsx-builder-grid-row, .newsx-row-inner, .newsx-archive-page-wrap, .newsx-blog-page-wrap, .newsx-single-wrap, .newsx-default-page-wrap, .newsx-mobile-menu-container, .newsx-widget .newsx-container';
	
		$parse_css .= newsx_parse_css([
			'.newsx-container' => [
				'max-width' => $global_container_width .'px'
			]
		]);
	
		$parse_css .= newsx_get_resp_slider_control_css($global_container_padding, $global_padding_selector, 'padding-left', 'px');
		$parse_css .= newsx_get_resp_slider_control_css($global_container_padding, $global_padding_selector, 'padding-right', 'px');

		return $parse_css;
	}

	static function get_global_sidebar_styles() {
		$parse_css = '';

		$parse_css .= newsx_parse_css([
			'.newsx-sidebar' => [
				'width' => newsx_get_option('global_sidebar_width') .'%'
			],
		]);
		$sidebar_content_distance_selector = '.newsx-row-inner, .newsx-single-inner, .newsx-blog-page-inner, .newsx-archive-page-inner';
	
		$parse_css .= newsx_get_resp_slider_control_css(newsx_get_option('global_sidebar_content_distance'), $sidebar_content_distance_selector, 'gap', 'px');
	
		// Sticky Sidebar
		if ( newsx_get_option('global_sidebar_sticky') ) {
			$parse_css .= newsx_minify_static_css('
				.newsx-sidebar {
					position: sticky;
					top: 0;
					align-self: flex-start;
				}
			');
		}

		return $parse_css;
	}

	static function get_global_widget_styles() {
		$parse_css = '';

		$widget_accent_color = newsx_get_option('global_widget_accent_color');
	
		// Accent
		$parse_css .= newsx_parse_css([
			'.newsx-grid-filter:hover, .newsx-grid-filter.active' => [
				'color' => $widget_accent_color,
			],
			'.newsx-s0.newsx-widget-title-wrap .newsx-widget-title-text' => [
				'background-color' => $widget_accent_color,
			],
			'.newsx-widget-title-wrap, .newsx-widget-title-text, .newsx-widget-title-text:after, .newsx-widget .newsx-ring-loader div' => [
				'border-color' => $widget_accent_color,
			],
			'.newsx-s3.newsx-widget-title-wrap' => [
				'border-bottom-color' => newsx_hex_to_rgba($widget_accent_color, 0.2),
			],
		]);
		
		$parse_css .= newsx_get_resp_slider_control_css(newsx_get_option('global_widget_font_size'), '.newsx-widget-title-text', 'font-size', 'px');

		return $parse_css;
	}

	static function get_header_footer_section_styles( $location, $section ) {
		$parse_css = '';

		$short_loc = 'header' === $location ? 'hd' : 'ft';
		$direction = 'header' === $location ? 'bottom' : 'top';

		$parse_css .= newsx_get_background_css(newsx_get_option('section_'. $short_loc .'_'. $section .'_bg'), '.newsx-site-'. $location .' .newsx-'. $section .'-section-wrap');

		$parse_css .= newsx_parse_css([
			'.newsx-site-'. $location .' .newsx-'. $section .'-section-wrap' => [
				'border-color' => newsx_get_option('section_'. $short_loc .'_'. $section .'_bd_color'),
				'border-'. $direction .'-width' => newsx_get_option('section_'. $short_loc .'_'. $section .'_bd_width') .'px',
			],
		]);

		return $parse_css;
	}

	static function get_header_site_identity_styles() {
		$parse_css = '';
		
		$parse_css .= newsx_get_element_visibility_css(newsx_get_option('logo_title_duplicate_visibility'), '.newsx-site-identity.newsx-duplicate-element', 'flex');

		$parse_css .= newsx_parse_css([
			'.newsx-site-title-tagline .site-title a' => [
				'color' => newsx_get_option('logo_title_color')['normal'],
			],
			'.newsx-site-title-tagline .site-title a:hover' => [
				'color' => newsx_get_option('logo_title_color')['hover'],
			],
		]);

		$parse_css .= newsx_parse_css([
			'.newsx-site-title-tagline .site-description' => [
				'color' => newsx_get_option('logo_tagline_color'),
			],
		]);

		return $parse_css;
	}

	static function get_header_primary_menu_styles() {
		$parse_css = '';

		$header_pm_color = newsx_get_option('header_pm_color');
		$header_pm_bg_color = newsx_get_option('header_pm_bg_color');
		$header_pm_submenu_offset = newsx_get_option('header_pm_submenu_offset');
		$header_pm_submenu_bd_width = newsx_get_option('header_pm_submenu_bd_width');
		$header_pm_submenu_bd_radius = newsx_get_option('header_pm_submenu_bd_radius');
	
		$parse_css .= newsx_parse_css([
			// Normal
			'.newsx-header-menu-primary a' => [
				'color' => $header_pm_color['normal'],
				'background-color' => $header_pm_bg_color['normal'],
			],
			'.newsx-header-menu-primary svg' => [
				'fill' => $header_pm_color['normal'],
			],
	
			// Hover
			'.newsx-header-menu-primary a:hover,
			 .newsx-header-menu-primary .current-menu-item > a' => [
				'color' => $header_pm_color['hover'],
				'background-color' => $header_pm_bg_color['hover'],
			],
			'.newsx-header-menu-primary a:hover svg,
			 .newsx-header-menu-primary .current-menu-item > a svg' => [
				'fill' => $header_pm_color['hover'],
			],
			'.newsx-header-menu-primary .newsx-pointer-item:after' => [
			   'background-color' => $header_pm_color['hover'],
		    ],
			'.newsx-header-menu-primary .newsx-menu-item-label' => [
				'background-color' => $header_pm_color['hover'],
				'border-color' => $header_pm_color['hover'],
		    ],
		]);
	
		$parse_css .= newsx_get_resp_slider_control_css(newsx_get_option('header_pm_item_font_size'), '.newsx-header-menu-primary .newsx-nav-menu > .menu-item > a', 'font-size', 'px');
		$parse_css .= newsx_get_resp_slider_control_css(newsx_get_option('header_pm_subitem_font_size'), '.newsx-header-menu-primary .sub-menu a', 'font-size', 'px');
		$parse_css .= newsx_get_resp_svg_size_css(newsx_get_option('header_pm_item_font_size'), '.newsx-header-menu-primary .home-icon svg');
	
		$parse_css .= newsx_parse_css([
			'.newsx-header-menu-primary .newsx-desktop-menu .sub-menu' => [
				'width' => newsx_get_option('header_pm_submenu_width') .'px'
			],
			'.newsx-header-menu-primary .newsx-desktop-menu.newsx-nav-menu > .menu-item > .sub-menu' => [
				'margin-top' => $header_pm_submenu_offset .'px'
			],
			'.newsx-header-menu-primary .newsx-desktop-menu.newsx-nav-menu > .menu-item > .sub-menu:before' => [
				'height' => 'calc('. $header_pm_submenu_offset .'px + '. $header_pm_submenu_bd_width .'px)',
			],
		]);
	
		$parse_css .= newsx_parse_css([
			'.newsx-header-menu-primary .newsx-desktop-menu .sub-menu' => [
				'border-width' => $header_pm_submenu_bd_width .'px',
				'border-top-style' => 'solid',
				'border-top-color' => newsx_get_option('header_pm_submenu_bd_color'),
				'border-radius' => $header_pm_submenu_bd_radius .'px',
			],
			'.newsx-header-menu-primary .newsx-desktop-menu .sub-menu .menu-item:first-child > a' => [
				'border-top-left-radius' => $header_pm_submenu_bd_radius .'px',
				'border-top-right-radius' => $header_pm_submenu_bd_radius .'px',
			],
			'.newsx-header-menu-primary .newsx-desktop-menu .sub-menu .menu-item:last-child > a' => [
				'border-bottom-left-radius' => $header_pm_submenu_bd_radius .'px',
				'border-bottom-right-radius' => $header_pm_submenu_bd_radius .'px',
			],
		]);
	
		$parse_css .= newsx_parse_css([
			'.newsx-header-menu-primary .newsx-desktop-menu .sub-menu.newsx-submenu-divider .menu-item:not(:last-child)' => [
				'border-bottom-color' => newsx_get_option('header_pm_submenu_div_color'),
			],
		]);

		// Mobile menu
		$parse_css .= newsx_parse_css([
			'.newsx-mobile-menu-toggle' => [
				'color' => newsx_get_option('header_pm_toggle_color'),
				'border-radius' => newsx_get_option('header_pm_toggle_bd_radius') .'px',
			],
			'.newsx-mobile-menu-toggle svg' => [
				'fill' => newsx_get_option('header_pm_toggle_color'),
			],
			'.newsx-mobile-menu-toggle.style-fill' => [
				'background-color' => newsx_get_option('header_pm_toggle_bg_color'),
			],
			'.newsx-mobile-menu-toggle.style-outline' => [
				'border' => '1px solid '. newsx_get_option('header_pm_toggle_color'),
			],
		]);

		$parse_css .= newsx_parse_css([
			'.newsx-mobile-menu-toggle span:nth-child(3)' => [
				'font-size' => newsx_get_option('header_pm_toggle_label_size') .'px',
			],
			'.newsx-mobile-menu-toggle svg' => [
				'width' => newsx_get_option('header_pm_toggle_icon_size') .'px',
				'height' => newsx_get_option('header_pm_toggle_icon_size') .'px',
			],
		]);

		$parse_css .= newsx_parse_css([
			'.newsx-mobile-menu li' => [
				'border-bottom-color' => newsx_get_option('header_pm_mobile_drop_div_color'),
			],
		]);
		
		return $parse_css;
	}

	static function get_header_secondary_menu_styles() {
		$parse_css = '';

		$parse_css .= newsx_get_element_visibility_css( newsx_get_option('header_sm_duplicate_visibility'), '.newsx-header-menu-secondary-wrapper.newsx-duplicate-element');

		$header_sm_color = newsx_get_option('header_sm_color');
		$header_sm_bg_color = newsx_get_option('header_sm_bg_color');
		$header_sm_submenu_offset = newsx_get_option('header_sm_submenu_offset');
		$header_sm_submenu_bd_width = newsx_get_option('header_sm_submenu_bd_width');
		$header_sm_submenu_bd_radius = newsx_get_option('header_sm_submenu_bd_radius');

		$parse_css .= newsx_parse_css([
			// Normal
			'.newsx-header-menu-secondary a' => [
				'color' => $header_sm_color['normal'],
				'background-color' => $header_sm_bg_color['normal'],
			],
			'.newsx-header-menu-secondary svg' => [
				'fill' => $header_sm_color['normal'],
			],

			// Hover
			'.newsx-header-menu-secondary a:hover,
			.newsx-header-menu-secondary .current-menu-item > a' => [
				'color' => $header_sm_color['hover'],
				'background-color' => $header_sm_bg_color['hover'],
			],
			'.newsx-header-menu-secondary a:hover svg,
			.newsx-header-menu-secondary .current-menu-item > a svg' => [
				'fill' => $header_sm_color['hover'],
			],
			'.newsx-header-menu-secondary .newsx-pointer-item:after' => [
				'background-color' => $header_sm_color['hover'],
			],
		]);

		$parse_css .= newsx_get_resp_slider_control_css(newsx_get_option('header_sm_item_font_size'), '.newsx-header-menu-secondary .newsx-nav-menu > .menu-item > a', 'font-size', 'px');
		$parse_css .= newsx_get_resp_slider_control_css(newsx_get_option('header_sm_subitem_font_size'), '.newsx-header-menu-secondary .sub-menu a', 'font-size', 'px');
	
		$parse_css .= newsx_parse_css([
			'.newsx-header-menu-secondary .newsx-desktop-menu .sub-menu' => [
				'width' => newsx_get_option('header_sm_submenu_width') .'px'
			],
			'.newsx-header-menu-secondary .newsx-desktop-menu.newsx-nav-menu > .menu-item > .sub-menu' => [
				'margin-top' => $header_sm_submenu_offset .'px'
			],
			'.newsx-header-menu-secondary .newsx-desktop-menu.newsx-nav-menu > .menu-item > .sub-menu:before' => [
				'height' => 'calc('. $header_sm_submenu_offset .'px + '. $header_sm_submenu_bd_width .'px)',
			],
		]);
	
		$parse_css .= newsx_parse_css([
			'.newsx-header-menu-secondary .newsx-desktop-menu .sub-menu' => [
				'border-top' => $header_sm_submenu_bd_width .'px solid '. newsx_get_option('header_sm_submenu_bd_color'),
				'border-radius' => $header_sm_submenu_bd_radius .'px',
			],
			'.newsx-header-menu-secondary .newsx-desktop-menu .sub-menu .menu-item:first-child > a' => [
				'border-top-left-radius' => $header_sm_submenu_bd_radius .'px',
				'border-top-right-radius' => $header_sm_submenu_bd_radius .'px',
			],
			'.newsx-header-menu-secondary .newsx-desktop-menu .sub-menu .menu-item:last-child > a' => [
				'border-bottom-left-radius' => $header_sm_submenu_bd_radius .'px',
				'border-bottom-right-radius' => $header_sm_submenu_bd_radius .'px',
			],
		]);
	
		$parse_css .= newsx_parse_css([
			'.newsx-header-menu-secondary .newsx-desktop-menu .sub-menu.newsx-submenu-divider .menu-item:not(:last-child)' => [
				'border-bottom' => newsx_get_option('header_sm_submenu_div_size') .'px solid '. newsx_get_option('header_sm_submenu_div_color'),
			],
		]);

		return $parse_css;
	}

	static function get_header_date_and_time_styles() {
		$parse_css = '';
		
		$parse_css .= newsx_get_element_visibility_css( newsx_get_option('date_duplicate_visibility'), '.newsx-date-and-time.newsx-duplicate-element' );

		$parse_css .= newsx_parse_css([
			'.newsx-date-and-time' => [
				'color' => newsx_get_option('header_date_color'),
			],
		]);
		
		$parse_css .= newsx_get_resp_slider_control_css(newsx_get_option('header_date_font_size'), '.newsx-date-and-time', 'font-size', 'px');

		return $parse_css;
	}

	static function get_header_news_ticker_styles() {
		$parse_css = '';

		$header_nt_heading_text_color = newsx_get_option('header_nt_heading_text_color');
		$header_nt_heading_icon_color = newsx_get_option('header_nt_heading_icon_color');
		$header_nt_heading_bg_color = newsx_get_option('header_nt_heading_bg_color');
		$header_nt_title_color = newsx_get_option('header_nt_content_text_color');
		$header_nt_content_bg_color = newsx_get_option('header_nt_content_bg_color');
		$header_nt_nav_color = newsx_get_option('header_nt_nav_color');
		$header_nt_nav_bg_color = newsx_get_option('header_nt_nav_bg_color');
	
		$parse_css .= newsx_minify_static_css(
			'.newsx-header-news-ticker .news-ticker-heading.newsx-s1:before {
				border-right-color: transparent;
			}'
		);
	
		$parse_css .= newsx_parse_css([
			// Heading
			'.newsx-header-news-ticker .news-ticker-heading-text' => [
				'color' => $header_nt_heading_text_color,
			],
			'.newsx-header-news-ticker .newsx-ticker-icon-circle' => [
				'color' => $header_nt_heading_icon_color,
				'background-color' => $header_nt_heading_icon_color
			],
			'.newsx-header-news-ticker .news-ticker-heading-icon svg' => [
				'fill' => $header_nt_heading_icon_color,
			],
			'.newsx-header-news-ticker .news-ticker-heading,
			 .newsx-header-news-ticker .news-ticker-heading::before' => [
				'background-color' => $header_nt_heading_bg_color,
			 ],
			 '.newsx-header-news-ticker .news-ticker-heading.newsx-s1:before' => [
				'border-right-color' => $header_nt_heading_bg_color,
			 ],
	
			// Content
			'.newsx-header-news-ticker .newsx-news-ticker-title' => [
				'color' => $header_nt_title_color['normal'],
			],
			'.newsx-header-news-ticker .newsx-news-ticker-title:hover' => [
				'color' => $header_nt_title_color['hover'],
			],
			'.newsx-header-news-ticker .news-ticker-wrapper' => [
				'background-color' => $header_nt_content_bg_color,
			],
	
			// Navigation
			'.newsx-header-news-ticker .newsx-slider-prev::after,
			 .newsx-header-news-ticker .newsx-slider-next::after' => [
			   'color' => $header_nt_nav_color['normal']
			],
			'.newsx-header-news-ticker .newsx-slider-prev:hover::after,
			 .newsx-header-news-ticker .newsx-slider-next:hover::after' => [
			   'color' => $header_nt_nav_color['hover']
			 ],
			'.newsx-header-news-ticker .newsx-slider-prev,
			 .newsx-header-news-ticker .newsx-slider-next' => [
				'background-color' => $header_nt_nav_bg_color['normal']
			 ],
			'.newsx-header-news-ticker .newsx-slider-prev:hover,
			 .newsx-header-news-ticker .newsx-slider-next:hover' => [
				'background-color' => $header_nt_nav_bg_color['hover']
			]
		]);
	
		$header_nt_heading_font_size = newsx_get_option('header_nt_heading_font_size');
		$parse_css .= newsx_get_resp_slider_control_css($header_nt_heading_font_size, '.newsx-header-news-ticker .news-ticker-heading', 'font-size', 'px');
		$parse_css .= newsx_get_resp_svg_size_css($header_nt_heading_font_size, '.newsx-header-news-ticker .news-ticker-heading-icon svg');
		$parse_css .= newsx_get_resp_slider_control_css(newsx_get_option('header_nt_content_font_size'), '.newsx-header-news-ticker .newsx-news-ticker-title', 'font-size', 'px');
	
		$header_nt_heading_padding = newsx_get_option('header_nt_heading_padding');
		$parse_css .= newsx_get_resp_spacing_css($header_nt_heading_padding, '.newsx-header-news-ticker .news-ticker-heading', 'padding', 'px');
		$parse_css .= newsx_get_resp_spacing_css(newsx_get_option('header_nt_nav_padding'), '.newsx-header-news-ticker .newsx-slider-prev, .newsx-header-news-ticker .newsx-slider-next', 'padding', 'px');
	
		$nt_heading_fz_desktop = isset($header_nt_heading_font_size['desktop']) ? $header_nt_heading_font_size['desktop'] : 20;
		$nt_heading_pt_pb_sum = intval($header_nt_heading_padding['desktop']['top']) + intval($header_nt_heading_padding['desktop']['bottom']);
		$nt_heading_s1_border_width = $nt_heading_pt_pb_sum > $nt_heading_fz_desktop ? $nt_heading_pt_pb_sum + ($nt_heading_fz_desktop/2) : $nt_heading_fz_desktop + 2;
		$nt_heading_s2_right_offset = $nt_heading_fz_desktop/2 + 5;
		$parse_css .= newsx_parse_css([
			'.newsx-header-news-ticker .news-ticker-heading.newsx-s1:before' => [
				'border-width' => $nt_heading_s1_border_width .'px',
			],
			'.newsx-header-news-ticker .news-ticker-heading.newsx-s1 + .news-ticker-wrapper' => [
				'padding-left' => $nt_heading_s1_border_width + 5 .'px',
			],
			'.newsx-header-news-ticker .news-ticker-heading.newsx-s2:before' => [
				'right' => '-'. $nt_heading_s2_right_offset .'px',
			],
		]);
	
		$nt_nav_icon_size = newsx_get_option('header_nt_nav_icon_size');
		$parse_css .= newsx_get_resp_slider_control_css($nt_nav_icon_size, '.newsx-header-news-ticker .newsx-slider-prev:after, .newsx-header-news-ticker .newsx-slider-next:after', 'font-size', 'px');
	
		$parse_css .= newsx_parse_css([
			'.newsx-header-news-ticker .newsx-slider-prev, .newsx-header-news-ticker .newsx-slider-next' => [
				'width' => $nt_nav_icon_size['desktop'] .'px',
			],
		]);
	
		if ( 'slider' === newsx_get_option('header_nt_type_select') && newsx_get_option('header_nt_nav') ) {
			$parse_css .= newsx_parse_css([
				'.newsx-header-news-ticker .news-ticker-wrapper' => [
					'align-self' => 'center',
				],
			]);
		}

		return $parse_css;
	}

	static function get_header_search_styles() {
		$parse_css = '';

		$header_search_icon_color = newsx_get_option('header_search_icon_color');
		$header_search_bd_radius = newsx_get_option('header_search_bd_radius');
	
		$parse_css .= newsx_get_element_visibility_css(newsx_get_option('header_search_visibility'), '.newsx-header-search');
		$parse_css .= newsx_get_element_visibility_css(newsx_get_option('header_search_duplicate_visibility'), '.newsx-header-search.newsx-duplicate-element');
	
		$parse_css .= newsx_parse_css([
			// Normal
			'.newsx-header-search .newsx-search-icon svg' => [
				'fill' => $header_search_icon_color['normal'],
			],
	
			'.newsx-header-search .newsx-ring-loader div' => [
				'border-left-color' => $header_search_icon_color['normal'],
			],
	
			// Hover
			'.newsx-header-search .newsx-search-icon:hover svg' => [
				'fill' => $header_search_icon_color['hover'],
			],
	
			'.newsx-header-search .newsx-ring-loader:hover div' => [
				'border-color' => $header_search_icon_color['hover'] . ' transparent transparent transparent',
			],
	
			'.newsx-header-search .search-submit, .newsx-header-search .newsx-search-results-view-all a' => [
				'background-color' => $header_search_icon_color['hover'],
			],
		]);
	
		$header_search_width = newsx_get_option('header_search_width');
	
		$parse_css .= newsx_get_resp_svg_size_css(newsx_get_option('header_search_icon_size'), '.newsx-header-search .newsx-search-icon svg');
		$parse_css .= newsx_get_resp_slider_control_css($header_search_width, '.newsx-header-search .search-form, .header-search-s1.active .search-form', 'width');
		$parse_css .= newsx_get_resp_slider_control_css($header_search_width, '.newsx-ajax-search-results.newsx-no-results', 'max-width');
	
		if ( '' !== $header_search_bd_radius ) {
			$parse_css .= newsx_parse_css([
				'.newsx-header-search .search-form, .newsx-header-search .newsx-ajax-search-results, .newsx-header-search .newsx-search-results-view-all a' => [
					'border-radius' => $header_search_bd_radius .'px',
				],
				'.newsx-header-search .search-field' => [
					'border-top-left-radius' => $header_search_bd_radius .'px',
					'border-bottom-left-radius' => $header_search_bd_radius .'px',
				],
				'.newsx-header-search .search-submit' => [
					'border-top-right-radius' => $header_search_bd_radius .'px',
					'border-bottom-right-radius' => $header_search_bd_radius .'px',
				],
				'.newsx-header-search .newsx-search-results-view-all' => [
					'border-radius' => $header_search_bd_radius .'px',
				],
			]);
		}

		return $parse_css;
	}

	static function get_header_offcanvas_styles() {
		$parse_css = '';

		$header_ofc_width = newsx_get_option('header_ofc_width');

		$parse_css .= newsx_parse_css([
			'.newsx-offcanvas-widgets-area' => [
				'width' => $header_ofc_width .'px'
			],
		]);
	
		$parse_css .= newsx_get_element_visibility_css(newsx_get_option('header_ofc_visibility'), '.newsx-offcanvas-btn');
		$parse_css .= newsx_get_element_visibility_css( newsx_get_option('header_ofc_duplicate_visibility'), '.newsx-offcanvas-btn.newsx-duplicate-element' );
	
		$header_ofc_icon_color = newsx_get_option('header_ofc_icon_color');
	
		$parse_css .= newsx_parse_css([
			// Normal
			'.newsx-offcanvas-btn svg' => [
			   'fill' => $header_ofc_icon_color['normal'],
			],
	
			// Hover
			'.newsx-offcanvas-btn:hover svg path' => [
				'fill' => $header_ofc_icon_color['hover'],
			],
		]);
	
		$parse_css .= newsx_get_resp_svg_size_css(newsx_get_option('header_ofc_icon_size'), '.newsx-offcanvas-btn svg');

		return $parse_css;
	}

	static function get_header_random_post_styles() {
		$parse_css = '';

		$parse_css .= newsx_get_element_visibility_css(newsx_get_option('random_post_visibility'), '.newsx-random-post', 'flex');
		$parse_css .= newsx_get_element_visibility_css( newsx_get_option('random_post_duplicate_visibility'), '.newsx-random-post.newsx-duplicate-element', 'flex');
	
		$random_post_color = newsx_get_option('random_post_color');
		$random_post_icon_size = newsx_get_option('random_post_icon_size');
	
		$parse_css .= newsx_parse_css([
			// Normal
			'.newsx-random-post a' => [
				'color' => $random_post_color['normal'],
			],
			'.newsx-random-post svg' => [
				'fill' => $random_post_color['normal'],
			],
	
			// Hover
			'.newsx-random-post a:hover' => [
				'color' => $random_post_color['hover'],
			],
			'.newsx-random-post a:hover svg' => [
				'fill' => $random_post_color['hover'],
			],
		]);
	
		$parse_css .= newsx_get_resp_svg_size_css(newsx_get_option('random_post_icon_size'), '.newsx-random-post svg');

		return $parse_css;
	}

	static function get_header_dark_switcher_styles() {
		$parse_css = '';

		$parse_css .= newsx_get_element_visibility_css(newsx_get_option('dark_switcher_duplicate_visibility'), '.newsx-dark-mode-switcher.newsx-duplicate-element', 'flex');

		// $dark_switcher_color = newsx_get_option('dark_switcher_color');
		// $dark_switcher_icon_size = newsx_get_option('dark_switcher_icon_size');
	
		// $parse_css .= newsx_parse_css([
		// 	// Normal
		// 	'.newsx-dark-mode-switcher svg' => [
		// 		'fill' => $dark_switcher_color['normal'],
		// 	],
	
		// 	// Hover
		// 	'.newsx-dark-mode-switcher:hover svg' => [
		// 		'fill' => $dark_switcher_color['hover'],
		// 	],
		// ]);

		return $parse_css;
	}

	static function get_header_cta_button_styles() {
		$parse_css = '';

		$parse_css .= newsx_get_element_visibility_css(newsx_get_option('header_cta_visibility'), '.newsx-header-cta-button');
		$parse_css .= newsx_get_element_visibility_css(newsx_get_option('header_cta_duplicate_visibility'), '.newsx-header-cta-button.newsx-duplicate-element');
	
		$header_cta_text_color = newsx_get_option('header_cta_text_color');
		$header_cta_bg_color = newsx_get_option('header_cta_bg_color');
		$header_cta_border_color = newsx_get_option('header_cta_border_color');
	
		$parse_css .= newsx_parse_css([
			// Normal
			'.newsx-header-cta-button a' => [
			   'color' => $header_cta_text_color['normal'],
			],
			'.newsx-header-cta-button svg' => [
			   'fill' => $header_cta_text_color['normal'],
			],
			'.newsx-header-cta-button' => [
			   'background-color' => $header_cta_bg_color['normal'],
			   'border-color' => $header_cta_border_color['normal'],
			],
	
			// Hover
			'.newsx-header-cta-button:hover a' => [
				'color' => $header_cta_text_color['hover'],
			],
			'.newsx-header-cta-button:hover svg' => [
				'fill' => $header_cta_text_color['hover'],
			],
			'.newsx-header-cta-button:hover' => [
				'border-color' => $header_cta_border_color['hover'],
				'background-color' => $header_cta_bg_color['hover'],
			]
		]);
	
		// Typography
		$parse_css .= newsx_get_typography_css(newsx_get_option('header_cta_font'), '.newsx-header-cta-button a');
		$parse_css .= newsx_get_resp_slider_control_css(newsx_get_option('header_cta_font_size'), '.newsx-header-cta-button a', 'font-size', 'px');
		$parse_css .= newsx_get_resp_svg_size_css(newsx_get_option('header_cta_icon_size'), '.newsx-header-cta-button svg');
		
		// Border
		$parse_css .= newsx_parse_css([
			'.newsx-header-cta-button' => [
				'border-width' => newsx_get_option('header_cta_border_width') . 'px',
				'border-style' => 'solid',
				'border-radius' => newsx_get_option('header_cta_border_radius') . 'px',
			],
		]);
	
		// Padding & Margin
		$parse_css .= newsx_get_resp_spacing_css(newsx_get_option('header_cta_padding'), '.newsx-header-cta-button a', 'padding', 'px');
		$parse_css .= newsx_get_resp_spacing_css(newsx_get_option('header_cta_margin'), '.newsx-header-cta-button', 'margin', 'px');

		return $parse_css;
	}

	static function get_header_social_icons_styles() {
		$parse_css = '';
		
		$parse_css .= newsx_get_element_visibility_css(newsx_get_option('header_si_duplicate_visibility'), '.newsx-header-social-icons.newsx-duplicate-element', 'flex');

		$header_si_color = newsx_get_option('header_si_color');
		$header_si_icon_size = newsx_get_option('header_si_icon_size');
	
		$parse_css .= newsx_parse_css([
			// Normal
			'.newsx-header-social-icons .newsx-social-icon' => [
				'color' => $header_si_color['normal'],
			],
			'.newsx-header-social-icons .newsx-social-icon svg' => [
				'fill' => $header_si_color['normal'],
			],
	
			// Hover
			'.newsx-header-social-icons .newsx-social-icon:hover' => [
				'color' => $header_si_color['hover'],
			],
			'.newsx-header-social-icons .newsx-social-icon:hover svg' => [
				'fill' => $header_si_color['hover'],
			],
		]);
	
		$parse_css .= newsx_get_resp_svg_size_css(newsx_get_option('header_si_icon_size'), '.newsx-header-social-icons .newsx-social-icon svg');
		$parse_css .= newsx_get_resp_slider_control_css(newsx_get_option('header_si_label_size'), '.newsx-header-social-icons .newsx-svg-icon + span', 'font-size');

		return $parse_css;
	}

	static function get_header_weather_styles() {
		$parse_css = '';

		$parse_css .= newsx_get_element_visibility_css(newsx_get_option('header_weather_visibility'), '.newsx-header-weather', 'flex');
		$parse_css .= newsx_get_element_visibility_css(newsx_get_option('header_weather_duplicate_visibility'), '.newsx-header-weather.newsx-duplicate-element', 'flex');
	
		$parse_css .= newsx_parse_css([
			'.newsx-header-weather' => [
				'color' => newsx_get_option('header_weather_color'),
			],
		]);
		
		$parse_css .= newsx_get_resp_svg_size_css(newsx_get_option('header_weather_icon_size'), '.newsx-header-weather svg');
		$parse_css .= newsx_get_resp_slider_control_css(newsx_get_option('header_weather_font_size'), '.newsx-header-weather .location', 'font-size', 'px', 4);
		$parse_css .= newsx_get_resp_slider_control_css(newsx_get_option('header_weather_font_size'), '.newsx-header-weather .temperature', 'font-size', 'px');
		$parse_css .= newsx_get_resp_slider_control_css(newsx_get_option('header_weather_font_size'), '.newsx-header-weather .temperature sup', 'font-size', 'px', 6);
	
		$parse_css .= newsx_get_resp_spacing_css(newsx_get_option('header_weather_margin'), '.newsx-header-weather', 'margin', 'px');

		return $parse_css;
	}

	static function get_header_custom_html_1_styles() {
		$parse_css = '';

		$parse_css .= newsx_get_element_visibility_css( newsx_get_option('header_html1_visibility'), '.newsx-header-custom-html-1');
		$parse_css .= newsx_get_element_visibility_css( newsx_get_option('header_html1_duplicate_visibility'), '.newsx-header-custom-html-1.newsx-duplicate-element');
	
		$parse_css .= newsx_parse_css([
			'.newsx-header-custom-html-1' => [
				'color' => newsx_get_option('header_html1_text_color'),
			],
			
			// Normal
			'.newsx-header-custom-html-1 a' => [
				'color' => newsx_get_option('header_html1_link_color')['normal'],
			],
	
			// Hover
			'.newsx-header-custom-html-1 a:hover' => [
				'color' => newsx_get_option('header_html1_link_color')['hover'],
			],
		]);
	
		$parse_css .= newsx_get_resp_slider_control_css(newsx_get_option('header_html1_font_size'), '.newsx-header-custom-html-1', 'font-size');
		$parse_css .= newsx_get_resp_spacing_css(newsx_get_option('header_html1_margin'), '.newsx-header-custom-html-1', 'margin');

		
		return $parse_css;
	}

	static function get_header_custom_html_2_styles() {
		$parse_css = '';

		$parse_css .= newsx_get_element_visibility_css( newsx_get_option('header_html2_visibility'), '.newsx-header-custom-html-2');
		$parse_css .= newsx_get_element_visibility_css( newsx_get_option('header_html2_duplicate_visibility'), '.newsx-header-custom-html-2.newsx-duplicate-element');
	
		$parse_css .= newsx_parse_css([
			'.newsx-header-custom-html-2' => [
				'color' => newsx_get_option('header_html2_text_color'),
			],

			// Normal
			'.newsx-header-custom-html-2 a' => [
				'color' => newsx_get_option('header_html2_link_color')['normal'],
			],
	
			// Hover
			'.newsx-header-custom-html-2 a:hover' => [
				'color' => newsx_get_option('header_html2_link_color')['hover'],
			],
		]);
	
		$parse_css .= newsx_get_resp_slider_control_css(newsx_get_option('header_html2_font_size'), '.newsx-header-custom-html-2', 'font-size');
		$parse_css .= newsx_get_resp_spacing_css(newsx_get_option('header_html2_margin'), '.newsx-header-custom-html-2', 'margin');

		return $parse_css;
	}

	static function get_header_widgets_1_styles() {
		$parse_css = '';
		
		$parse_css .= newsx_get_element_visibility_css( newsx_get_option('header_widgets_1_visibility'), '.header-widgets-area-1' );
		$parse_css .= newsx_get_element_visibility_css( newsx_get_option('header_widgets_1_duplicate_visibility'), '.header-widgets-area-1.newsx-duplicate-element' );

		return $parse_css;
	}

	static function get_header_widgets_2_styles() {
		$parse_css = '';
		
		$parse_css .= newsx_get_element_visibility_css( newsx_get_option('header_widgets_2_visibility'), '.header-widgets-area-2' );
		$parse_css .= newsx_get_element_visibility_css( newsx_get_option('header_widgets_2_duplicate_visibility'), '.header-widgets-area-2.newsx-duplicate-element' );

		return $parse_css;
	}

	static function get_footer_copyright_styles() {
		$parse_css = '';
		
		$parse_css .= newsx_get_responsive_align_control_css(newsx_get_option('copyright_align'), '.newsx-copyright', 'text-align');
		
		$parse_css .= newsx_get_element_visibility_css( newsx_get_option('copyright_visibility'), '.newsx-copyright');

		$copyright_link_color = newsx_get_option('copyright_link_color');

		$parse_css .= newsx_parse_css([
			'.newsx-copyright' => [
				'color' => newsx_get_option('copyright_text_color')
			],
			'.newsx-copyright a' => [
				'color' => $copyright_link_color ? $copyright_link_color['normal'] : ''
			],
			'.newsx-copyright a:hover' => [
				'color' => $copyright_link_color ? $copyright_link_color['hover'] : ''
			]
		]);
	
		$parse_css .= newsx_get_resp_slider_control_css(newsx_get_option('copyright_font_size'), '.newsx-copyright', 'font-size');

		return $parse_css;
	}

	static function get_footer_menu_styles() {
		$parse_css = '';

		$footer_menu_color = newsx_get_option('footer_menu_color');
		$footer_menu_bg_color = newsx_get_option('footer_menu_bg_color');
	
		$parse_css .= newsx_parse_css([
			// Normal
			'.newsx-footer-menu a' => [
				'color' => $footer_menu_color ? $footer_menu_color['normal'] : '',
				'background-color' => $footer_menu_bg_color ? $footer_menu_bg_color['normal'] : ''
			],
	
			// Hover
			'.newsx-footer-menu a:hover,
			 .newsx-footer-menu .current-menu-item > a' => [
				'color' => $footer_menu_color ? $footer_menu_color['hover'] : '',
				'background-color' => $footer_menu_bg_color ? $footer_menu_bg_color['hover'] : '',
			]
		]);
	
		$parse_css .= newsx_get_resp_slider_control_css(newsx_get_option('footer_menu_item_font_size'), '.newsx-footer-menu a', 'font-size');

		
		return $parse_css;
	}

	static function get_footer_back_to_top_styles() {
		$parse_css = '';

		$ft_backtop_color = newsx_get_option('ft_backtop_color');
		$ft_backtop_bg_color = newsx_get_option('ft_backtop_bg_color');
	
		$parse_css .= newsx_parse_css([
			// Normal
			'#newsx-back-to-top:not(.newsx-trans-bg)' => [
				'color' => $ft_backtop_color['normal'],
				'background-color' => $ft_backtop_bg_color['normal'],
			],
			'#newsx-back-to-top.newsx-trans-bg' => [
				'border-color' => $ft_backtop_color['normal'],
			],
			'#newsx-back-to-top svg, #newsx-back-to-top.newsx-trans-bg svg' => [
				'fill' => $ft_backtop_color['normal'],
			],
	
			// Hover
			'#newsx-back-to-top:not(.newsx-trans-bg):hover' => [
				'color' => $ft_backtop_color['hover'],
				'background-color' => $ft_backtop_bg_color['hover'],
			],
			'#newsx-back-to-top.newsx-trans-bg:hover' => [
				'border-color' => $ft_backtop_color['hover'],
			],
			'#newsx-back-to-top:hover svg, #newsx-back-to-top.newsx-trans-bg:hover svg' => [
				'fill' => $ft_backtop_color['hover'],
			],
		]);

		return $parse_css;
	}

	static function get_footer_custom_html_1_styles() {
		$parse_css = '';

		$parse_css .= newsx_parse_css([
			// Normal
			'.newsx-footer-custom-html-1' => [
				'color' => newsx_get_option('footer_html1_color'),
			],
			'.newsx-footer-custom-html-1 a' => [
				'color' => newsx_get_option('footer_html1_link_color')['normal'],
			],
	
			// Hover
			'.newsx-footer-custom-html-1 a:hover' => [
				'color' => newsx_get_option('footer_html1_link_color')['hover'],
			],
		]);
	
		$parse_css .= newsx_get_resp_slider_control_css(newsx_get_option('footer_html1_font_size'), '.newsx-footer-custom-html-1', 'font-size');
		
		return $parse_css;
	}

	static function get_footer_custom_html_2_styles() {
		$parse_css = '';

		$parse_css .= newsx_parse_css([
			// Normal
			'.newsx-footer-custom-html-2' => [
				'color' => newsx_get_option('footer_html2_color'),
			],
			'.newsx-footer-custom-html-2 a' => [
				'color' => newsx_get_option('footer_html2_link_color')['normal'],
			],
	
			// Hover
			'.newsx-footer-custom-html-2 a:hover' => [
				'color' => newsx_get_option('footer_html2_link_color')['hover'],
			],
		]);
	
		$parse_css .= newsx_get_resp_slider_control_css(newsx_get_option('footer_html2_font_size'), '.newsx-footer-custom-html-2', 'font-size');
		
		return $parse_css;
	}
	
	static function get_footer_social_icons_styles() {
		$parse_css = '';

		$footer_si_color = newsx_get_option('footer_si_color');
		$footer_si_icon_size = newsx_get_option('footer_si_icon_size');
	
		$parse_css .= newsx_parse_css([
			// Normal
			'.newsx-footer-social-icons a' => [
				'color' => $footer_si_color ? $footer_si_color['normal'] : '',
			],
			'.newsx-footer-social-icons svg' => [
				'fill' => $footer_si_color ? $footer_si_color['normal'] : '',
			],
	
			// Hover
			'.newsx-footer-social-icons a:hover' => [
				'color' => $footer_si_color ? $footer_si_color['hover'] : '',
			],
			'.newsx-footer-social-icons a:hover svg' => [
				'fill' => $footer_si_color ? $footer_si_color['hover']  : '',
			],
		]);
	
		$parse_css .= newsx_get_resp_svg_size_css(newsx_get_option('footer_si_icon_size'), '.newsx-footer-social-icons svg');
		$parse_css .= newsx_get_resp_slider_control_css(newsx_get_option('footer_si_label_size'), '.newsx-footer-social-icons .newsx-svg-icon + span', 'font-size');

		return $parse_css;
	}

	static function get_blog_single_header_post_meta_styles() {
		$parse_css = '';

		$parse_css .= newsx_get_resp_slider_control_css(newsx_get_option('bs_content_font_size'), '.newsx-post-meta-inner', 'font-size', 'px', 2);
		$parse_css .= newsx_get_resp_svg_size_css(newsx_get_option('bs_content_font_size'), '.newsx-post-meta-inner svg', 2);

		return $parse_css;
	}

	static function get_blog_single_content_styles() {
		$parse_css = '';

		$blog_single_font_size = newsx_get_option('bs_content_font_size');
		$blog_single_font_size_selector = '.newsx-single-wrap .newsx-post-content, .newsx-archive-page-header p';

		$parse_css .= newsx_parse_css([
			'.newsx-single-wrap .newsx-post-content' => [
			   'color' => newsx_get_option('bs_content_text_color'),
			],
		]);
	
		$parse_css .= newsx_get_resp_slider_control_css($blog_single_font_size, $blog_single_font_size_selector, 'font-size', 'px');
	
		return $parse_css;
	}

	static function get_blog_single_sharing_styles() {
		$parse_css = '';

			
		$bs_sharing_style = newsx_get_option('bs_sharing_style');
		$bs_sharing_fl_style = newsx_get_option('bs_sharing_fl_style');
		$bs_sharing_original_colors = newsx_get_option('bs_sharing_original_colors');
		$bs_sharing_text_color = newsx_get_option('bs_sharing_text_color');
		$bs_sharing_bg_color = newsx_get_option('bs_sharing_bg_color');

		// Normal
		$parse_css .= newsx_parse_css([
			'.newsx-post-sharing .sharing-icons a' => [
			'color' => $bs_sharing_text_color['normal'],
			],
			'.newsx-post-sharing .sharing-icons svg' => [
			'fill' => $bs_sharing_text_color['normal'],
			],
			':where(.newsx-s1, .newsx-s1-sr, .newsx-s1-br) > .newsx-post-sharing .sharing-icons a' => [
			'background-color' => $bs_sharing_bg_color['normal'],
			],
			':where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons a' => [
			'border-color' => $bs_sharing_bg_color['normal'],
			],
		]);

		// Hover
		if ( !$bs_sharing_original_colors ) {
			$parse_css .= newsx_parse_css([
				'.newsx-post-sharing .sharing-icons a:hover' => [
					'color' => $bs_sharing_text_color['hover'],
				],
				'.newsx-post-sharing .sharing-icons a:hover svg path' => [
					'fill' => $bs_sharing_text_color['hover'],
				],
				':where(.newsx-s1, .newsx-s1-sr, .newsx-s1-br) > .newsx-post-sharing .sharing-icons a:hover' => [
				'background-color' => $bs_sharing_bg_color['hover'],
				],
				':where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons a:hover' => [
				'border-color' => $bs_sharing_bg_color['hover'],
				],
			]);
		}
		
		if ( $bs_sharing_original_colors ) {
			if ( 's0' === $bs_sharing_style || 's0' === $bs_sharing_fl_style ) {
				$parse_css .= newsx_minify_static_css('
					.newsx-s0.newsx-static-sharing .sharing-icons .facebook-share svg,
					.newsx-s0.newsx-float-sharing .sharing-icons .facebook-share svg {
						fill: #3b5998;
					}

					.newsx-s0.newsx-static-sharing .sharing-icons .x-twitter-share svg,
					.newsx-s0.newsx-float-sharing .sharing-icons .x-twitter-share svg {
						fill: #1da1f2;
					}

					.newsx-s0.newsx-static-sharing .sharing-icons .flipboard-share svg,
					.newsx-s0.newsx-float-sharing .sharing-icons .flipboard-share svg {
						fill: #e12828;
					}

					.newsx-s0.newsx-static-sharing .sharing-icons .pinterest-share svg,
					.newsx-s0.newsx-float-sharing .sharing-icons .pinterest-share svg {
						fill: #bd081c;
					}

					.newsx-s0.newsx-static-sharing .sharing-icons .linkedin-share svg,
					.newsx-s0.newsx-float-sharing .sharing-icons .linkedin-share svg {
						fill: #0077b5;
					}

					.newsx-s0.newsx-static-sharing .sharing-icons .tumblr-share svg,
					.newsx-s0.newsx-float-sharing .sharing-icons .tumblr-share svg {
						fill: #35465c;
					}

					.newsx-s0.newsx-static-sharing .sharing-icons .reddit-share svg,
					.newsx-s0.newsx-float-sharing .sharing-icons .reddit-share svg {
						fill: #ff4500;
					}

					.newsx-s0.newsx-static-sharing .sharing-icons .vk-share svg,
					.newsx-s0.newsx-float-sharing .sharing-icons .vk-share svg {
						fill: #4c75a3;
					}

					.newsx-s0.newsx-static-sharing .sharing-icons .whatsapp-share svg,
					.newsx-s0.newsx-float-sharing .sharing-icons .whatsapp-share svg {
						fill: #25d366;
					}

					.newsx-s0.newsx-static-sharing .sharing-icons .telegram-share svg,
					.newsx-s0.newsx-float-sharing .sharing-icons .telegram-share svg {
						fill: #0088cc;
					}

					.newsx-s0.newsx-static-sharing .sharing-icons .mail-share svg,
					.newsx-s0.newsx-float-sharing .sharing-icons .mail-share svg {
						fill: #ff6600;
					}

					.newsx-s0.newsx-static-sharing .sharing-icons .copy-share svg,
					.newsx-s0.newsx-float-sharing .sharing-icons .copy-share svg {
						fill: #333;
					}

					.newsx-s0.newsx-static-sharing .sharing-icons .print-share svg,
					.newsx-s0.newsx-float-sharing .sharing-icons .print-share svg {
						fill: #333;
					}

				');
			}
			
			if ( 's1' === $bs_sharing_style || 's1-sr' === $bs_sharing_style || 's1-br' === $bs_sharing_style ||
				's1' === $bs_sharing_fl_style || 's1-sr' === $bs_sharing_fl_style || 's1-br' === $bs_sharing_fl_style ) {
				$parse_css .= newsx_minify_static_css('
					:where(.newsx-s1, .newsx-s1-sr, .newsx-s1-br) > .newsx-post-sharing .sharing-icons .share-label {
						color: #fff;
					}
					:where(.newsx-s1, .newsx-s1-sr, .newsx-s1-br) > .newsx-post-sharing .sharing-icons .newsx-svg-icon svg {
						fill: #fff;
						color: #fff;
					}
					:where(.newsx-s1, .newsx-s1-sr, .newsx-s1-br) > .newsx-post-sharing .sharing-icons .facebook-share {
						background-color: #3b5998;
					}
					:where(.newsx-s1, .newsx-s1-sr, .newsx-s1-br) > .newsx-post-sharing .sharing-icons .x-twitter-share {
						background-color: #1da1f2;
					}
					:where(.newsx-s1, .newsx-s1-sr, .newsx-s1-br) > .newsx-post-sharing .sharing-icons .flipboard-share {
						background-color: #e12828;
					}
					:where(.newsx-s1, .newsx-s1-sr, .newsx-s1-br) > .newsx-post-sharing .sharing-icons .pinterest-share {
						background-color: #bd081c;
					}
					:where(.newsx-s1, .newsx-s1-sr, .newsx-s1-br) > .newsx-post-sharing .sharing-icons .linkedin-share {
						background-color: #0077b5;
					}
					:where(.newsx-s1, .newsx-s1-sr, .newsx-s1-br) > .newsx-post-sharing .sharing-icons .tumblr-share {
						background-color: #35465c;
					}
					:where(.newsx-s1, .newsx-s1-sr, .newsx-s1-br) > .newsx-post-sharing .sharing-icons .reddit-share {
						background-color: #ff4500;
					}
					:where(.newsx-s1, .newsx-s1-sr, .newsx-s1-br) > .newsx-post-sharing .sharing-icons .vk-share {
						background-color: #4c75a3;
					}
					:where(.newsx-s1, .newsx-s1-sr, .newsx-s1-br) > .newsx-post-sharing .sharing-icons .whatsapp-share {
						background-color: #25d366;
					}
					:where(.newsx-s1, .newsx-s1-sr, .newsx-s1-br) > .newsx-post-sharing .sharing-icons .telegram-share {
						background-color: #0088cc;
					}
					:where(.newsx-s1, .newsx-s1-sr, .newsx-s1-br) > .newsx-post-sharing .sharing-icons .mail-share {
						background-color: #ff6600;
					}
					:where(.newsx-s1, .newsx-s1-sr, .newsx-s1-br) > .newsx-post-sharing .sharing-icons .copy-share {
						background-color: #333;
					}
					:where(.newsx-s1, .newsx-s1-sr, .newsx-s1-br) > .newsx-post-sharing .sharing-icons .print-share {
						background-color: #666;
					}
				');
			}
			
			if ( 's2' === $bs_sharing_style || 's2-sr' === $bs_sharing_style || 's2-br' === $bs_sharing_style ||
				's2' === $bs_sharing_fl_style || 's2-sr' === $bs_sharing_fl_style || 's2-br' === $bs_sharing_fl_style ) {
				$parse_css .= newsx_minify_static_css('
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .facebook-share {
						color: #3b5998;
						border-color: #3b5998;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .facebook-share svg {
						fill: #3b5998;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .x-twitter-share {
						color: #1da1f2;
						border-color: #1da1f2;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .x-twitter-share svg {
						fill: #1da1f2;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .flipboard-share {
						color: #e12828;
						border-color: #e12828;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .flipboard-share svg {
						fill: #e12828;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .pinterest-share {
						color: #bd081c;
						border-color: #bd081c;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .pinterest-share svg {
						fill: #bd081c;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .linkedin-share {
						color: #0077b5;
						border-color: #0077b5;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .linkedin-share svg {
						fill: #0077b5;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .tumblr-share {
						color: #35465c;
						border-color: #35465c;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .tumblr-share svg {
						fill: #35465c;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .reddit-share {
						color: #ff4500;
						border-color: #ff4500;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .reddit-share svg {
						fill: #ff4500;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .vk-share {
						color: #4c75a3;
						border-color: #4c75a3;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .vk-share svg {
						fill: #4c75a3;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .whatsapp-share {
						color: #25d366;
						border-color: #25d366;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .whatsapp-share svg {
						fill: #25d366;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .telegram-share {
						color: #0088cc;
						border-color: #0088cc;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .telegram-share svg {
						fill: #0088cc;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .mail-share {
						color: #ff6600;
						border-color: #ff6600;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .mail-share svg {
						fill: #ff6600;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .copy-share {
						color: #333;
						border-color: #333;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .copy-share svg {
						fill: #333;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .print-share {
						color: #666;
						border-color: #666;
					}
					:where(.newsx-s2, .newsx-s2-sr, .newsx-s2-br) > .newsx-post-sharing .sharing-icons .print-share svg {
						fill: #666;
					}
				');
			}
		}

		$bs_sharing_icon_size = newsx_get_option('bs_sharing_icon_size');
		$parse_css .= newsx_get_resp_svg_size_css($bs_sharing_icon_size, '.newsx-post-sharing svg');
		
		$parse_css .= newsx_get_element_visibility_css( newsx_get_option('bs_sharing_fl_visibility'), '.newsx-float-sharing');
		
		return $parse_css;
	}

	static function get_blog_single_table_of_contents_styles() {
		$parse_css = '';

		$parse_css .= newsx_parse_css([
			'.newsx-table-of-contents > div' => [
			   'column-count' => newsx_get_option('bs_toc_layout'),
			],
		]);
	
		if ( newsx_get_option('bs_toc_clip_long_text') ) {
			$parse_css .= newsx_minify_static_css('
				.newsx-table-of-contents h5 a {
					overflow: hidden;
					text-overflow: ellipsis;
					white-space: nowrap;
				}
			');
		}
		
		$parse_css .= newsx_parse_css([
			'.newsx-table-of-contents, .newsx-table-of-contents h3:after, .newsx-table-of-contents > div:before' => [
			   'background-color' => newsx_get_option('bs_toc_bg_color'),
			],
		]);
	
		if ( newsx_get_option('bs_toc_box_shadow') ) {
			$parse_css .= newsx_minify_static_css('
				.newsx-table-of-contents {
					box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
				}
			');
		}
	
		if ( newsx_get_option('bs_toc_show_dividers') ) {
			$parse_css .= newsx_minify_static_css('
				.newsx-table-of-contents a {
					border-top-width: 1px;
					border-top-style: solid;
				}
				.newsx-table-of-contents > div h5:first-child a {
					border: 0;
				}
				.newsx-table-of-contents > div {
					position: relative;
				}
				.newsx-table-of-contents > div:before {
					position: absolute;
					z-index: 1;
					top: 0;
					left: 0;
					width: 100%;
					height: 2px;
					content: "";
				}
			');
		}

		return $parse_css;
	}

	static function get_blog_single_newsletter_styles() {
		$parse_css = '';

		if ( newsx_get_option('bs_newsletter_section_divider') ) {
			$parse_css .= newsx_minify_static_css('
				.newsx-newsletter-wrap {
					border-bottom-width: 1px;
					border-bottom-style: solid;
				}
			');
		}
		
		$parse_css .= newsx_get_background_css(newsx_get_option('bs_newsletter_background'), '.newsx-newsletter-wrap');
	
		$parse_css .= newsx_get_resp_spacing_css(newsx_get_option('bs_newsletter_padding'), '.newsx-newsletter-wrap', 'padding');
		$parse_css .= newsx_get_resp_spacing_css(newsx_get_option('bs_newsletter_margin'), '.newsx-newsletter-wrap', 'margin');

		return $parse_css;
	}

	static function get_blog_single_advanced_prbar_styles() {
		$parse_css = '';

		$parse_css .= newsx_parse_css([
			'.newsx-reading-progress-bar' => [
				'background-color' => newsx_get_option('bs_advanced_rpbar_color'),
				'height' => newsx_get_option('bs_advanced_rpbar_height') .'px',
			],
		]);
		
		return $parse_css;
	}

	static function get_preloader_styles() {
		$parse_css = '';

		$preloader_type = newsx_get_option('preloader_type');
		$preloader_bg_color = newsx_get_option('preloader_bg_color');
		$preloader_animation_color = newsx_get_option('preloader_anim_color');
		$preloader_logo_width = newsx_get_option('preloader_logo_width');

		$parse_css .= newsx_minify_static_css('
			.newsx-preloader-wrap {
				display: flex;
				align-items: center;
				justify-content: center;
				position: fixed;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				z-index: 999999999999;
				border: none !important;
				background-color: '.$preloader_bg_color.';
			}

			.newsx-preloader-wrap .logo-img {
				width: '.$preloader_logo_width.'px;
			}

			.newsx-dark-mode .newsx-preloader-wrap .logo-img.newsx-has-dark-logo img:first-child {
				display: none;
			}
		');

		if ( 'animation_1' === $preloader_type ) {
			$parse_css .= '.cssload-container{width:100%;height:36px;text-align:center}.cssload-speeding-wheel{width:36px;height:36px;margin:0 auto;border:2px solid '.$preloader_animation_color.';border-radius:50%;border-left-color:transparent;border-right-color:transparent;animation:cssload-spin 575ms infinite linear;-o-animation:cssload-spin 575ms infinite linear;-ms-animation:cssload-spin 575ms infinite linear;-webkit-animation:cssload-spin 575ms infinite linear;-moz-animation:cssload-spin 575ms infinite linear}@keyframes cssload-spin{100%{transform:rotate(360deg);transform:rotate(360deg)}}@-o-keyframes cssload-spin{100%{-o-transform:rotate(360deg);transform:rotate(360deg)}}@-ms-keyframes cssload-spin{100%{-ms-transform:rotate(360deg);transform:rotate(360deg)}}@-webkit-keyframes cssload-spin{100%{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}@-moz-keyframes cssload-spin{100%{-moz-transform:rotate(360deg);transform:rotate(360deg)}}';
			$parse_css .= '.newsx-dark-mode .cssload-speeding-wheel{filter: brightness(0) invert(1);}';
		} elseif ( 'animation_2' === $preloader_type ) {
			$parse_css .= '.cssload-container{width:100%;height:44px;text-align:center}.cssload-tube-tunnel{width:44px;height:44px;margin:0 auto;border:3px solid;border-radius:50%;border-color:'.$preloader_animation_color.';animation:cssload-scale 1035ms infinite linear;-o-animation:cssload-scale 1035ms infinite linear;-ms-animation:cssload-scale 1035ms infinite linear;-webkit-animation:cssload-scale 1035ms infinite linear;-moz-animation:cssload-scale 1035ms infinite linear}@keyframes cssload-scale{0%{transform:scale(0);transform:scale(0)}90%{transform:scale(0.7);transform:scale(0.7)}100%{transform:scale(1);transform:scale(1)}}@-o-keyframes cssload-scale{0%{-o-transform:scale(0);transform:scale(0)}90%{-o-transform:scale(0.7);transform:scale(0.7)}100%{-o-transform:scale(1);transform:scale(1)}}@-ms-keyframes cssload-scale{0%{-ms-transform:scale(0);transform:scale(0)}90%{-ms-transform:scale(0.7);transform:scale(0.7)}100%{-ms-transform:scale(1);transform:scale(1)}}@-webkit-keyframes cssload-scale{0%{-webkit-transform:scale(0);transform:scale(0)}90%{-webkit-transform:scale(0.7);transform:scale(0.7)}100%{-webkit-transform:scale(1);transform:scale(1)}}@-moz-keyframes cssload-scale{0%{-moz-transform:scale(0);transform:scale(0)}90%{-moz-transform:scale(0.7);transform:scale(0.7)}100%{-moz-transform:scale(1);transform:scale(1)}}';
			$parse_css .= '.newsx-dark-mode .cssload-tube-tunnel{filter: brightness(0) invert(1);}';
		} elseif ( 'animation_3' === $preloader_type ) {
			$parse_css .= '.cssload-loader{display:block;margin:0 auto;width:29px;height:29px;position:relative;border:4px solid '.$preloader_animation_color.';animation:cssload-loader 2.3s infinite ease;-o-animation:cssload-loader 2.3s infinite ease;-ms-animation:cssload-loader 2.3s infinite ease;-webkit-animation:cssload-loader 2.3s infinite ease;-moz-animation:cssload-loader 2.3s infinite ease}.cssload-loader-inner{vertical-align:top;display:inline-block;width:100%;background-color:'.$preloader_animation_color.';animation:cssload-loader-inner 2.3s infinite ease-in;-o-animation:cssload-loader-inner 2.3s infinite ease-in;-ms-animation:cssload-loader-inner 2.3s infinite ease-in;-webkit-animation:cssload-loader-inner 2.3s infinite ease-in;-moz-animation:cssload-loader-inner 2.3s infinite ease-in}@keyframes cssload-loader{0%{transform:rotate(0deg)}25%{transform:rotate(180deg)}50%{transform:rotate(180deg)}75%{transform:rotate(360deg)}100%{transform:rotate(360deg)}}@-o-keyframes cssload-loader{0%{transform:rotate(0deg)}25%{transform:rotate(180deg)}50%{transform:rotate(180deg)}75%{transform:rotate(360deg)}100%{transform:rotate(360deg)}}@-ms-keyframes cssload-loader{0%{transform:rotate(0deg)}25%{transform:rotate(180deg)}50%{transform:rotate(180deg)}75%{transform:rotate(360deg)}100%{transform:rotate(360deg)}}@-webkit-keyframes cssload-loader{0%{transform:rotate(0deg)}25%{transform:rotate(180deg)}50%{transform:rotate(180deg)}75%{transform:rotate(360deg)}100%{transform:rotate(360deg)}}@-moz-keyframes cssload-loader{0%{transform:rotate(0deg)}25%{transform:rotate(180deg)}50%{transform:rotate(180deg)}75%{transform:rotate(360deg)}100%{transform:rotate(360deg)}}@keyframes cssload-loader-inner{0%{height:0}25%{height:0}50%{height:100%}75%{height:100%}100%{height:0}}@-o-keyframes cssload-loader-inner{0%{height:0}25%{height:0}50%{height:100%}75%{height:100%}100%{height:0}}@-ms-keyframes cssload-loader-inner{0%{height:0}25%{height:0}50%{height:100%}75%{height:100%}100%{height:0}}@-webkit-keyframes cssload-loader-inner{0%{height:0}25%{height:0}50%{height:100%}75%{height:100%}100%{height:0}}@-moz-keyframes cssload-loader-inner{0%{height:0}25%{height:0}50%{height:100%}75%{height:100%}100%{height:0}}';
			$parse_css .= '.newsx-dark-mode .cssload-loader{filter: brightness(0) invert(1);}';
		} elseif ( 'animation_4' === $preloader_type ) {
			$parse_css .= '.cssload-fond{position:relative;margin:auto}.cssload-container-general{animation:cssload-animball_two 1.15s infinite;-o-animation:cssload-animball_two 1.15s infinite;-ms-animation:cssload-animball_two 1.15s infinite;-webkit-animation:cssload-animball_two 1.15s infinite;-moz-animation:cssload-animball_two 1.15s infinite;width:43px;height:43px}.cssload-internal{width:43px;height:43px;position:absolute}.cssload-ballcolor{width:19px;height:19px;border-radius:50%}.cssload-ball_1,.cssload-ball_2,.cssload-ball_3,.cssload-ball_4{position:absolute;animation:cssload-animball_one 1.15s infinite ease;-o-animation:cssload-animball_one 1.15s infinite ease;-ms-animation:cssload-animball_one 1.15s infinite ease;-webkit-animation:cssload-animball_one 1.15s infinite ease;-moz-animation:cssload-animball_one 1.15s infinite ease}.cssload-ball_1{background-color:'.$preloader_animation_color.';top:0;left:0}.cssload-ball_2{background-color:'.$preloader_animation_color.';top:0;left:23px}.cssload-ball_3{background-color:'.$preloader_animation_color.';top:23px;left:0}.cssload-ball_4{background-color:'.$preloader_animation_color.';top:23px;left:23px}@keyframes cssload-animball_one{0%{position:absolute}50%{top:12px;left:12px;position:absolute;opacity:.5}100%{position:absolute}}@-o-keyframes cssload-animball_one{0%{position:absolute}50%{top:12px;left:12px;position:absolute;opacity:.5}100%{position:absolute}}@-ms-keyframes cssload-animball_one{0%{position:absolute}50%{top:12px;left:12px;position:absolute;opacity:.5}100%{position:absolute}}@-webkit-keyframes cssload-animball_one{0%{position:absolute}50%{top:12px;left:12px;position:absolute;opacity:.5}100%{position:absolute}}@-moz-keyframes cssload-animball_one{0%{position:absolute}50%{top:12px;left:12px;position:absolute;opacity:.5}100%{position:absolute}}@keyframes cssload-animball_two{0%{transform:rotate(0deg) scale(1)}50%{transform:rotate(360deg) scale(1.3)}100%{transform:rotate(720deg) scale(1)}}@-o-keyframes cssload-animball_two{0%{-o-transform:rotate(0deg) scale(1)}50%{-o-transform:rotate(360deg) scale(1.3)}100%{-o-transform:rotate(720deg) scale(1)}}@-ms-keyframes cssload-animball_two{0%{-ms-transform:rotate(0deg) scale(1)}50%{-ms-transform:rotate(360deg) scale(1.3)}100%{-ms-transform:rotate(720deg) scale(1)}}@-webkit-keyframes cssload-animball_two{0%{-webkit-transform:rotate(0deg) scale(1)}50%{-webkit-transform:rotate(360deg) scale(1.3)}100%{-webkit-transform:rotate(720deg) scale(1)}}@-moz-keyframes cssload-animball_two{0%{-moz-transform:rotate(0deg) scale(1)}50%{-moz-transform:rotate(360deg) scale(1.3)}100%{-moz-transform:rotate(720deg) scale(1)}}';
			$parse_css .= '.newsx-dark-mode :where(.cssload-ball_1,.cssload-ball_2,.cssload-ball_3,.cssload-ball_4){filter: brightness(0) invert(1);}';
		} elseif ( 'animation_5' === $preloader_type ) {
			$parse_css .= '#loadFacebookG{width:35px;height:35px;display:block;position:relative;margin:auto}.facebook_blockG{background-color:'.$preloader_animation_color.';border:1px solid '.$preloader_animation_color.';float:left;height:25px;margin-left:2px;width:7px;opacity:.1;animation-name:bounceG;-o-animation-name:bounceG;-ms-animation-name:bounceG;-webkit-animation-name:bounceG;-moz-animation-name:bounceG;animation-duration:1.235s;-o-animation-duration:1.235s;-ms-animation-duration:1.235s;-webkit-animation-duration:1.235s;-moz-animation-duration:1.235s;animation-iteration-count:infinite;-o-animation-iteration-count:infinite;-ms-animation-iteration-count:infinite;-webkit-animation-iteration-count:infinite;-moz-animation-iteration-count:infinite;animation-direction:normal;-o-animation-direction:normal;-ms-animation-direction:normal;-webkit-animation-direction:normal;-moz-animation-direction:normal;transform:scale(0.7);-o-transform:scale(0.7);-ms-transform:scale(0.7);-webkit-transform:scale(0.7);-moz-transform:scale(0.7)}#blockG_1{animation-delay:.3695s;-o-animation-delay:.3695s;-ms-animation-delay:.3695s;-webkit-animation-delay:.3695s;-moz-animation-delay:.3695s}#blockG_2{animation-delay:.496s;-o-animation-delay:.496s;-ms-animation-delay:.496s;-webkit-animation-delay:.496s;-moz-animation-delay:.496s}#blockG_3{animation-delay:.6125s;-o-animation-delay:.6125s;-ms-animation-delay:.6125s;-webkit-animation-delay:.6125s;-moz-animation-delay:.6125s}@keyframes bounceG{0%{transform:scale(1.2);opacity:1}100%{transform:scale(0.7);opacity:.1}}@-o-keyframes bounceG{0%{-o-transform:scale(1.2);opacity:1}100%{-o-transform:scale(0.7);opacity:.1}}@-ms-keyframes bounceG{0%{-ms-transform:scale(1.2);opacity:1}100%{-ms-transform:scale(0.7);opacity:.1}}@-webkit-keyframes bounceG{0%{-webkit-transform:scale(1.2);opacity:1}100%{-webkit-transform:scale(0.7);opacity:.1}}@-moz-keyframes bounceG{0%{-moz-transform:scale(1.2);opacity:1}100%{-moz-transform:scale(0.7);opacity:.1}}';
			$parse_css .= '.newsx-dark-mode .facebook_blockG{filter: brightness(0) invert(1);}';
		} elseif ( 'animation_6' === $preloader_type ) {
			$parse_css .= '.loader{height:42px;left:50%;position:absolute;transform:translateX(-50%) translateY(-50%);-o-transform:translateX(-50%) translateY(-50%);-ms-transform:translateX(-50%) translateY(-50%);-webkit-transform:translateX(-50%) translateY(-50%);-moz-transform:translateX(-50%) translateY(-50%);width:42px}.loader span{background:'.$preloader_animation_color.';display:block;height:8px;opacity:0;position:absolute;width:8px;animation:load 3s ease-in-out infinite;-o-animation:load 3s ease-in-out infinite;-ms-animation:load 3s ease-in-out infinite;-webkit-animation:load 3s ease-in-out infinite;-moz-animation:load 3s ease-in-out infinite}.loader span.block-1{animation-delay:.686s;-o-animation-delay:.686s;-ms-animation-delay:.686s;-webkit-animation-delay:.686s;-moz-animation-delay:.686s;left:0;top:0}.loader span.block-2{animation-delay:.632s;-o-animation-delay:.632s;-ms-animation-delay:.632s;-webkit-animation-delay:.632s;-moz-animation-delay:.632s;left:11px;top:0}.loader span.block-3{animation-delay:.568s;-o-animation-delay:.568s;-ms-animation-delay:.568s;-webkit-animation-delay:.568s;-moz-animation-delay:.568s;left:22px;top:0}.loader span.block-4{animation-delay:.514s;-o-animation-delay:.514s;-ms-animation-delay:.514s;-webkit-animation-delay:.514s;-moz-animation-delay:.514s;left:34px;top:0}.loader span.block-5{animation-delay:.45s;-o-animation-delay:.45s;-ms-animation-delay:.45s;-webkit-animation-delay:.45s;-moz-animation-delay:.45s;left:0;top:11px}.loader span.block-6{animation-delay:.386s;-o-animation-delay:.386s;-ms-animation-delay:.386s;-webkit-animation-delay:.386s;-moz-animation-delay:.386s;left:11px;top:11px}.loader span.block-7{animation-delay:.332s;-o-animation-delay:.332s;-ms-animation-delay:.332s;-webkit-animation-delay:.332s;-moz-animation-delay:.332s;left:22px;top:11px}.loader span.block-8{animation-delay:.268s;-o-animation-delay:.268s;-ms-animation-delay:.268s;-webkit-animation-delay:.268s;-moz-animation-delay:.268s;left:34px;top:11px}.loader span.block-9{animation-delay:.214s;-o-animation-delay:.214s;-ms-animation-delay:.214s;-webkit-animation-delay:.214s;-moz-animation-delay:.214s;left:0;top:22px}.loader span.block-10{animation-delay:.15s;-o-animation-delay:.15s;-ms-animation-delay:.15s;-webkit-animation-delay:.15s;-moz-animation-delay:.15s;left:11px;top:22px}.loader span.block-11{animation-delay:.086s;-o-animation-delay:.086s;-ms-animation-delay:.086s;-webkit-animation-delay:.086s;-moz-animation-delay:.086s;left:22px;top:22px}.loader span.block-12{animation-delay:.032s;-o-animation-delay:.032s;-ms-animation-delay:.032s;-webkit-animation-delay:.032s;-moz-animation-delay:.032s;left:34px;top:22px}.loader span.block-13{animation-delay:-.032s;-o-animation-delay:-.032s;-ms-animation-delay:-.032s;-webkit-animation-delay:-.032s;-moz-animation-delay:-.032s;left:0;top:34px}.loader span.block-14{animation-delay:-.086s;-o-animation-delay:-.086s;-ms-animation-delay:-.086s;-webkit-animation-delay:-.086s;-moz-animation-delay:-.086s;left:11px;top:34px}.loader span.block-15{animation-delay:-.15s;-o-animation-delay:-.15s;-ms-animation-delay:-.15s;-webkit-animation-delay:-.15s;-moz-animation-delay:-.15s;left:22px;top:34px}.loader span.block-16{animation-delay:-.214s;-o-animation-delay:-.214s;-ms-animation-delay:-.214s;-webkit-animation-delay:-.214s;-moz-animation-delay:-.214s;left:34px;top:34px}@keyframes load{0%{opacity:0;transform:translateY(-70px)}15%{opacity:0;transform:translateY(-70px)}30%{opacity:1;transform:translateY(0)}70%{opacity:1;transform:translateY(0)}85%{opacity:0;transform:translateY(70px)}100%{opacity:0;transform:translateY(70px)}}@-o-keyframes load{0%{opacity:0;-o-transform:translateY(-70px)}15%{opacity:0;-o-transform:translateY(-70px)}30%{opacity:1;-o-transform:translateY(0)}70%{opacity:1;-o-transform:translateY(0)}85%{opacity:0;-o-transform:translateY(70px)}100%{opacity:0;-o-transform:translateY(70px)}}@-ms-keyframes load{0%{opacity:0;-ms-transform:translateY(-70px)}15%{opacity:0;-ms-transform:translateY(-70px)}30%{opacity:1;-ms-transform:translateY(0)}70%{opacity:1;-ms-transform:translateY(0)}85%{opacity:0;-ms-transform:translateY(70px)}100%{opacity:0;-ms-transform:translateY(70px)}}@-webkit-keyframes load{0%{opacity:0;-webkit-transform:translateY(-70px)}15%{opacity:0;-webkit-transform:translateY(-70px)}30%{opacity:1;-webkit-transform:translateY(0)}70%{opacity:1;-webkit-transform:translateY(0)}85%{opacity:0;-webkit-transform:translateY(70px)}100%{opacity:0;-webkit-transform:translateY(70px)}}@-moz-keyframes load{0%{opacity:0;-moz-transform:translateY(-70px)}15%{opacity:0;-moz-transform:translateY(-70px)}30%{opacity:1;-moz-transform:translateY(0)}70%{opacity:1;-moz-transform:translateY(0)}85%{opacity:0;-moz-transform:translateY(70px)}100%{opacity:0;-moz-transform:translateY(70px)}}';
			$parse_css .= '.newsx-dark-mode .newsx-preloader-wrap .loader span{filter: brightness(0) invert(1);}';
		} elseif ( 'animation_7' === $preloader_type ) {
			$parse_css .= '.cssload-cube{background-color:'.$preloader_animation_color.';width:9px;height:9px;position:absolute;margin:auto;animation:cssload-cubemove 2s infinite ease-in-out;-o-animation:cssload-cubemove 2s infinite ease-in-out;-ms-animation:cssload-cubemove 2s infinite ease-in-out;-webkit-animation:cssload-cubemove 2s infinite ease-in-out;-moz-animation:cssload-cubemove 2s infinite ease-in-out}.cssload-cube1{left:13px;top:0;animation-delay:.1s;-o-animation-delay:.1s;-ms-animation-delay:.1s;-webkit-animation-delay:.1s;-moz-animation-delay:.1s}.cssload-cube2{left:25px;top:0;animation-delay:.2s;-o-animation-delay:.2s;-ms-animation-delay:.2s;-webkit-animation-delay:.2s;-moz-animation-delay:.2s}.cssload-cube3{left:38px;top:0;animation-delay:.3s;-o-animation-delay:.3s;-ms-animation-delay:.3s;-webkit-animation-delay:.3s;-moz-animation-delay:.3s}.cssload-cube4{left:0;top:13px;animation-delay:.1s;-o-animation-delay:.1s;-ms-animation-delay:.1s;-webkit-animation-delay:.1s;-moz-animation-delay:.1s}.cssload-cube5{left:13px;top:13px;animation-delay:.2s;-o-animation-delay:.2s;-ms-animation-delay:.2s;-webkit-animation-delay:.2s;-moz-animation-delay:.2s}.cssload-cube6{left:25px;top:13px;animation-delay:.3s;-o-animation-delay:.3s;-ms-animation-delay:.3s;-webkit-animation-delay:.3s;-moz-animation-delay:.3s}.cssload-cube7{left:38px;top:13px;animation-delay:.4s;-o-animation-delay:.4s;-ms-animation-delay:.4s;-webkit-animation-delay:.4s;-moz-animation-delay:.4s}.cssload-cube8{left:0;top:25px;animation-delay:.2s;-o-animation-delay:.2s;-ms-animation-delay:.2s;-webkit-animation-delay:.2s;-moz-animation-delay:.2s}.cssload-cube9{left:13px;top:25px;animation-delay:.3s;-o-animation-delay:.3s;-ms-animation-delay:.3s;-webkit-animation-delay:.3s;-moz-animation-delay:.3s}.cssload-cube10{left:25px;top:25px;animation-delay:.4s;-o-animation-delay:.4s;-ms-animation-delay:.4s;-webkit-animation-delay:.4s;-moz-animation-delay:.4s}.cssload-cube11{left:38px;top:25px;animation-delay:.5s;-o-animation-delay:.5s;-ms-animation-delay:.5s;-webkit-animation-delay:.5s;-moz-animation-delay:.5s}.cssload-cube12{left:0;top:38px;animation-delay:.3s;-o-animation-delay:.3s;-ms-animation-delay:.3s;-webkit-animation-delay:.3s;-moz-animation-delay:.3s}.cssload-cube13{left:13px;top:38px;animation-delay:.4s;-o-animation-delay:.4s;-ms-animation-delay:.4s;-webkit-animation-delay:.4s;-moz-animation-delay:.4s}.cssload-cube14{left:25px;top:38px;animation-delay:.5s;-o-animation-delay:.5s;-ms-animation-delay:.5s;-webkit-animation-delay:.5s;-moz-animation-delay:.5s}.cssload-cube15{left:38px;top:38px;animation-delay:.6s;-o-animation-delay:.6s;-ms-animation-delay:.6s;-webkit-animation-delay:.6s;-moz-animation-delay:.6s}.cssload-spinner{margin:auto;width:49px;height:49px;position:relative}@keyframes cssload-cubemove{35%{transform:scale(0.005)}50%{transform:scale(1.7)}65%{transform:scale(0.005)}}@-o-keyframes cssload-cubemove{35%{-o-transform:scale(0.005)}50%{-o-transform:scale(1.7)}65%{-o-transform:scale(0.005)}}@-ms-keyframes cssload-cubemove{35%{-ms-transform:scale(0.005)}50%{-ms-transform:scale(1.7)}65%{-ms-transform:scale(0.005)}}@-webkit-keyframes cssload-cubemove{35%{-webkit-transform:scale(0.005)}50%{-webkit-transform:scale(1.7)}65%{-webkit-transform:scale(0.005)}}@-moz-keyframes cssload-cubemove{35%{-moz-transform:scale(0.005)}50%{-moz-transform:scale(1.7)}65%{-moz-transform:scale(0.005)}}';
			$parse_css .= '.newsx-dark-mode .cssload-cube{filter: brightness(0) invert(1);}';
		} elseif ( 'animation_8' === $preloader_type ) {
			$parse_css .= '.cssload-loader{width:40px;height:40px;position:absolute;left:50%;transform:translate3d(-50%,-50%,0);-o-transform:translate3d(-50%,-50%,0);-ms-transform:translate3d(-50%,-50%,0);-webkit-transform:translate3d(-50%,-50%,0);-moz-transform:translate3d(-50%,-50%,0);perspective:1200px;-o-perspective:1200;-ms-perspective:1200;-webkit-perspective:1200;-moz-perspective:1200}.cssload-flipper{position:relative;display:block;height:inherit;width:inherit;animation:cssload-flip 1.38s infinite ease-in-out;-o-animation:cssload-flip 1.38s infinite ease-in-out;-ms-animation:cssload-flip 1.38s infinite ease-in-out;-webkit-animation:cssload-flip 1.38s infinite ease-in-out;-moz-animation:cssload-flip 1.38s infinite ease-in-out;transform-style:preserve-3d;-o-transform-style:preserve-3d;-ms-transform-style:preserve-3d;-webkit-transform-style:preserve-3d;-moz-transform-style:preserve-3d}.cssload-front,.cssload-back{position:absolute;top:0;left:0;display:block;background-color:'.$preloader_animation_color.';height:100%;width:100%;backface-visibility:hidden}.cssload-back{background-color:'.$preloader_animation_color.';z-index:800;transform:rotateY(-180deg);-o-transform:rotateY(-180deg);-ms-transform:rotateY(-180deg);-webkit-transform:rotateY(-180deg);-moz-transform:rotateY(-180deg)}@keyframes cssload-flip{0%{transform:perspective(117px) rotateX(0deg) rotateY(0deg)}50%{transform:perspective(117px) rotateX(-180.1deg) rotateY(0deg)}100%{transform:perspective(117px) rotateX(-180deg) rotateY(-179.9deg)}}@-o-keyframes cssload-flip{0%{-o-transform:perspective(117px) rotateX(0deg) rotateY(0deg)}50%{-o-transform:perspective(117px) rotateX(-180.1deg) rotateY(0deg)}100%{-o-transform:perspective(117px) rotateX(-180deg) rotateY(-179.9deg)}}@-ms-keyframes cssload-flip{0%{-ms-transform:perspective(117px) rotateX(0deg) rotateY(0deg)}50%{-ms-transform:perspective(117px) rotateX(-180.1deg) rotateY(0deg)}100%{-ms-transform:perspective(117px) rotateX(-180deg) rotateY(-179.9deg)}}@-webkit-keyframes cssload-flip{0%{-webkit-transform:perspective(117px) rotateX(0deg) rotateY(0deg)}50%{-webkit-transform:perspective(117px) rotateX(-180.1deg) rotateY(0deg)}100%{-webkit-transform:perspective(117px) rotateX(-180deg) rotateY(-179.9deg)}}@-moz-keyframes cssload-flip{0%{-moz-transform:perspective(117px) rotateX(0deg) rotateY(0deg)}50%{-moz-transform:perspective(117px) rotateX(-180.1deg) rotateY(0deg)}100%{-moz-transform:perspective(117px) rotateX(-180deg) rotateY(-179.9deg)}}';
			$parse_css .= '.newsx-dark-mode :where(.cssload-back, .cssload-front){filter: brightness(0) invert(1);}';
		} elseif ( 'animation_9' === $preloader_type ) {
			$parse_css .= '.cssload-box-loading{width:37px;height:37px;margin:auto;position:absolute;left:0;right:0;top:0;bottom:0}.cssload-box-loading:before{content:"";width:37px;height:4px;background:'.$preloader_animation_color.';opacity:.1;position:absolute;top:44px;left:0;border-radius:50%;animation:shadow .58s linear infinite;-o-animation:shadow .58s linear infinite;-ms-animation:shadow .58s linear infinite;-webkit-animation:shadow .58s linear infinite;-moz-animation:shadow .58s linear infinite}.cssload-box-loading:after{content:"";width:37px;height:37px;background:'.$preloader_animation_color.';position:absolute;top:0;left:0;border-radius:2px;animation:cssload-animate .58s linear infinite;-o-animation:cssload-animate .58s linear infinite;-ms-animation:cssload-animate .58s linear infinite;-webkit-animation:cssload-animate .58s linear infinite;-moz-animation:cssload-animate .58s linear infinite}@keyframes cssload-animate{17%{border-bottom-right-radius:2px}25%{transform:translateY(7px) rotate(22.5deg)}50%{transform:translateY(13px) scale(1,0.9) rotate(45deg);border-bottom-right-radius:30px}75%{transform:translateY(7px) rotate(67.5deg)}100%{transform:translateY(0) rotate(90deg)}}@-o-keyframes cssload-animate{17%{border-bottom-right-radius:2px}25%{-o-transform:translateY(7px) rotate(22.5deg)}50%{-o-transform:translateY(13px) scale(1,0.9) rotate(45deg);border-bottom-right-radius:30px}75%{-o-transform:translateY(7px) rotate(67.5deg)}100%{-o-transform:translateY(0) rotate(90deg)}}@-ms-keyframes cssload-animate{17%{border-bottom-right-radius:2px}25%{-ms-transform:translateY(7px) rotate(22.5deg)}50%{-ms-transform:translateY(13px) scale(1,0.9) rotate(45deg);border-bottom-right-radius:30px}75%{-ms-transform:translateY(7px) rotate(67.5deg)}100%{-ms-transform:translateY(0) rotate(90deg)}}@-webkit-keyframes cssload-animate{17%{border-bottom-right-radius:2px}25%{-webkit-transform:translateY(7px) rotate(22.5deg)}50%{-webkit-transform:translateY(13px) scale(1,0.9) rotate(45deg);border-bottom-right-radius:30px}75%{-webkit-transform:translateY(7px) rotate(67.5deg)}100%{-webkit-transform:translateY(0) rotate(90deg)}}@-moz-keyframes cssload-animate{17%{border-bottom-right-radius:2px}25%{-moz-transform:translateY(7px) rotate(22.5deg)}50%{-moz-transform:translateY(13px) scale(1,0.9) rotate(45deg);border-bottom-right-radius:30px}75%{-moz-transform:translateY(7px) rotate(67.5deg)}100%{-moz-transform:translateY(0) rotate(90deg)}}@keyframes shadow{0%,100%{transform:scale(1,1)}50%{transform:scale(1.2,1)}}@-o-keyframes shadow{0%,100%{-o-transform:scale(1,1)}50%{-o-transform:scale(1.2,1)}}@-ms-keyframes shadow{0%,100%{-ms-transform:scale(1,1)}50%{-ms-transform:scale(1.2,1)}}@-webkit-keyframes shadow{0%,100%{-webkit-transform:scale(1,1)}50%{-webkit-transform:scale(1.2,1)}}@-moz-keyframes shadow{0%,100%{-moz-transform:scale(1,1)}50%{-moz-transform:scale(1.2,1)}}';
			$parse_css .= '.newsx-dark-mode .cssload-box-loading:before, .newsx-dark-mode .cssload-box-loading:after{filter: brightness(0) invert(1);}';
		}

		return $parse_css;
	}

}

