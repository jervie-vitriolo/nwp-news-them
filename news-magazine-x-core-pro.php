<?php

/**
 * @wordpress-plugin
 * Plugin Name:       News Magazine X Core Pro
 * Plugin URI:        https://wp-royal-themes.com/themes/news-magazine-x/
 * Description:       Core Premium plugin for News Magazine X WordPress theme.
 * Version:           1.0.7
 * Update URI: https://api.freemius.com
 * Author:            WP Royal
 * Author URI:        https://wp-royal-themes.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       news-magazine-x-core-pro
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
    die;
}
if ( !function_exists( 'newsx_core_pro_fs' ) ) {
    // Create a helper function for easy SDK access.
    function newsx_core_pro_fs() {
        global $newsx_core_pro_fs;
        if ( !isset( $newsx_core_pro_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $newsx_core_pro_fs = fs_dynamic_init( array(
                'id'              => '17549',
                'slug'            => 'news-magazine-x-core-pro',
                'premium_slug'    => 'news-magazine-x-core-pro',
                'type'            => 'plugin',
                'public_key'      => 'pk_69fcb8bb5043aea835fa5f63b69d3',
                'is_premium'      => true,
                'is_premium_only' => true,
                'has_addons'      => false,
                'has_paid_plans'  => true,
                'menu'            => array(
                    'slug'       => 'newsx-options',
                    'first-path' => 'admin.php?page=newsx-options',
                    'support'    => false,
                ),
                'is_live'         => true,
            ) );
        }
        return $newsx_core_pro_fs;
    }

    // Init Freemius.
    newsx_core_pro_fs();
    // Signal that SDK was initiated.
    do_action( 'newsx_core_pro_fs_loaded' );
}
/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'NEWSX_CORE_PRO_VERSION', '1.0.7' );
define( 'NEWSX_CORE_PRO__FILE__', __FILE__ );
define( 'NEWSX_CORE_PRO_PLUGIN_BASE', plugin_basename( NEWSX_CORE_PRO__FILE__ ) );
define( 'NEWSX_CORE_PRO_PATH', plugin_dir_path( NEWSX_CORE_PRO__FILE__ ) );
define( 'NEWSX_CORE_PRO_URL', plugins_url( '/', NEWSX_CORE_PRO__FILE__ ) );
define( 'NEWSX_CORE_PRO_CUSTOMIZER', NEWSX_CORE_PRO_PATH . 'admin/customizer/' );
define( 'NEWSX_CORE_PRO_WIDGETS', NEWSX_CORE_PRO_PATH . 'includes/widgets/' );
// Include Widgets
add_action( 'widgets_init', function () {
    require_once NEWSX_CORE_PRO_WIDGETS . 'include-widgets.php';
} );
// Include Helpers
require_once NEWSX_CORE_PRO_PATH . 'includes/helpers/utilities.php';
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-newsx-core-pro-activator.php
 */
function activate_newsx_core_pro() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-newsx-core-pro-activator.php';
    Newsx_Core_Pro_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-newsx-core-pro-deactivator.php
 */
function deactivate_newsx_core_pro() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-newsx-core-pro-deactivator.php';
    Newsx_Core_Pro_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_newsx_core_pro' );
register_deactivation_hook( __FILE__, 'deactivate_newsx_core_pro' );
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-newsx-core-pro.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_newsx_core_pro() {
    $plugin = new Newsx_Core_Pro();
    $plugin->run();
}

run_newsx_core_pro();