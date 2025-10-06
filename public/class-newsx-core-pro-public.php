<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://https://wp-royal-themes.com/
 * @since      1.0.0
 *
 * @package    Newsx_Core_Pro
 * @subpackage Newsx_Core_Pro/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Newsx_Core_Pro
 * @subpackage Newsx_Core_Pro/public
 * @author     WP Royal <info.wproyal@gmail.com>
 */
class Newsx_Core_Pro_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Newsx_Core_Pro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Newsx_Core_Pro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/css/newsx-core-pro-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Newsx_Core_Pro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Newsx_Core_Pro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/js/newsx-core-pro-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Load Post Formats Template.
	 *
	 * @since    1.0.0
	 */
    public function load_post_format_template( $format ) {
		if ( !function_exists('get_field') ) {
			return;
		}

        $template_path = NEWSX_CORE_PRO_PATH . 'public/template-parts/post-formats/post-format-' . $format . '.php';
        
        if ( file_exists( $template_path ) ) {
            include $template_path;
        }
    }

	/**
	 * Add Retina Logo attribute.
	 *
	 * @since    1.0.0
	 */
	public function change_logo_attr( $attr, $attachment, $size ) {
		$retina_logo_sw = newsx_get_option('retina_logo_sw');
		$ft_retina_logo_sw = newsx_get_option('ft_retina_logo_sw');
		
		if ( !$retina_logo_sw && !$ft_retina_logo_sw ) {
			return $attr;
		}

		$custom_logo_opt = intval(get_theme_mod( 'custom_logo' ));
		$footer_logo_opt = newsx_get_option('footer_logo');
		$footer_logo_id = isset($footer_logo_opt) ? attachment_url_to_postid($footer_logo_opt) : '';

		// Header Logo
		if ( $attachment->ID === $custom_logo_opt && $retina_logo_sw ) {
			$custom_logo = wp_get_attachment_image_src( $custom_logo_opt, 'full' );
			$custom_logo = $custom_logo[0];

			$retina_logo = newsx_get_option('retina_logo');
			$attr['srcset'] = '';

			if ( $retina_logo ) {
				$attr['srcset'] = esc_url($custom_logo) . ' 1x,' . esc_url($retina_logo) . ' 2x';
			}
		}

		// Footer Logo
		if ( $attachment->ID === $footer_logo_id && $ft_retina_logo_sw ) {
			$footer_logo = wp_get_attachment_image_src( $footer_logo_id, 'full' );
			$footer_logo = $footer_logo[0];

			$ft_retina_logo = newsx_get_option('ft_retina_logo');
			$attr['srcset'] = '';

			if ( $ft_retina_logo ) {
				$attr['srcset'] = esc_url($footer_logo) . ' 1x,' . esc_url($ft_retina_logo) . ' 2x';
			}
		}

		return $attr;
	}

}
