<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://https://wp-royal-themes.com/
 * @since      1.0.0
 *
 * @package    Newsx_Core_Pro
 * @subpackage Newsx_Core_Pro/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Newsx_Core_Pro
 * @subpackage Newsx_Core_Pro/includes
 * @author     WP Royal <info.wproyal@gmail.com>
 */
class Newsx_Core_Pro_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		Newsx_Core_Pro_Helpers::delete_kirki_font_transients();
	}

}
