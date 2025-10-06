<?php

/**
 * Fired during plugin activation
 *
 * @link       https://https://wp-royal-themes.com/
 * @since      1.0.0
 *
 * @package    Newsx_Core_Pro
 * @subpackage Newsx_Core_Pro/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Newsx_Core_Pro
 * @subpackage Newsx_Core_Pro/includes
 * @author     WP Royal <info.wproyal@gmail.com>
 */
class Newsx_Core_Pro_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		// Update Theme Defaults
		self::update_theme_defaults();

		// Delete Kirki Font Transients
		Newsx_Core_Pro_Helpers::delete_kirki_font_transients();
	}

	public static function update_theme_defaults() {
		$newsx_options = get_option('newsx_options');

		if ('array' === gettype($newsx_options)) {
			// Update header social icons
			if (isset($newsx_options['header_social_icons'])) {
				foreach ($newsx_options['header_social_icons'] as &$icon) {
					$icon['header_social_icons_label'] = '';
				}
			}
		
			// Update footer social icons
			if (isset($newsx_options['footer_social_icons'])) {
				foreach ($newsx_options['footer_social_icons'] as &$icon) {
					$icon['footer_social_icons_label'] = '';
				}
			}
		
			// Update front page sections
			if (isset($newsx_options['front_page_sections'])) {
				foreach ($newsx_options['front_page_sections'] as &$section) {
					$section['stretch'] = false;
				}
			}
			
			update_option('newsx_options', $newsx_options);
		}
	}


}
