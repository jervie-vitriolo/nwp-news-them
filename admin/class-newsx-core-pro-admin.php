<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://https://wp-royal-themes.com/
 * @since      1.0.0
 *
 * @package    Newsx_Core_Pro
 * @subpackage Newsx_Core_Pro/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Newsx_Core_Pro
 * @subpackage Newsx_Core_Pro/admin
 * @author     WP Royal <info.wproyal@gmail.com>
 */
class Newsx_Core_Pro_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		// Include Files.
		$this->_includes();

		// Clear Kirki font transients on license change.
		if ( function_exists( 'newsx_core_pro_fs' ) ) {
			newsx_core_pro_fs()->add_action('after_license_change', [Newsx_Core_Pro_Helpers::class, 'delete_kirki_font_transients']);
			add_action('admin_init', [ $this, 'newsx_check_license_deactivation' ]);
		}

	}

	/**
	 * Include Files.
	 *
	 * @since    1.0.0
	 */
	public function _includes() {
		require_once NEWSX_CORE_PRO_PATH . 'admin/helpers/class-newsx-core-pro-helpers.php';
		require_once NEWSX_CORE_PRO_PATH . 'admin/customizer/class-newsx-customizer-pro-options.php';
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/css/newsx-core-pro-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/js/newsx-core-pro-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Check license deactivation.
	 *
	 * @since    1.0.0
	 */
	public function newsx_check_license_deactivation() {
		if (isset($_REQUEST['fs_action']) && 'deactivate_license' === $_REQUEST['fs_action']) {
			error_log('License deactivation detected - Time: ' . date('Y-m-d H:i:s'));
			Newsx_Core_Pro_Helpers::delete_kirki_font_transients();
		}
	}

	/**
	 * Define ACF Pro Settings URL.
	 *
	 * @since    1.0.0
	 */
	public function newsx_acf_settings_url( $url ) {
		$url = NEWSX_CORE_PRO_URL . 'plugins/acf/';
		return $url;
	}

	/**
	 * Integrate ACF Pro.
	 *
	 * @since    1.0.0
	 */
	public function newsx_integrate_acf_pro() {
		if ( ! function_exists( 'is_plugin_active' ) ) {
			include_once ABSPATH . 'wp-admin/includes/plugin.php';
		}
		
		// Check if ACF PRO is active
		if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
			// Abort all bundling, ACF PRO plugin takes priority
			return;
		}

		include_once NEWSX_CORE_PRO_PATH . 'plugins/acf/acf.php';

		// Check if the ACF free plugin is activated
		if ( is_plugin_active( 'advanced-custom-fields/acf.php' ) ) {
			// Free plugin activated
			// Free plugin activated, show notice
			add_action( 'admin_notices', function () {
				?>
				<div class="updated" style="border-left: 4px solid #ffba00;">
					<p>The ACF plugin cannot be activated at the same time as Third-Party Product and has been deactivated. Please keep ACF installed to allow you to use ACF functionality.</p>
				</div>
				<?php
			}, 99 );

			// Disable ACF free plugin
			deactivate_plugins( 'advanced-custom-fields/acf.php' );
		}

		// Check if ACF free is installed
		if ( ! file_exists( WP_PLUGIN_DIR . '/advanced-custom-fields/acf.php' ) ) {
			// Free plugin not installed
			// Hide the ACF admin menu item.
			add_filter( 'acf/settings/show_admin', '__return_false' );
			// Hide the ACF Updates menu
			add_filter( 'acf/settings/show_updates', '__return_false', 100 );
		}
	}

	/**
	 * Register ACF Fields.
	 *
	 * @since    1.0.0
	 */
	public function newsx_register_acf_metaboxes() {

		if ( ! function_exists( 'acf_add_local_field_group' ) ) {
			return;
		}

		$fields_array = array(
			array(
				'key' => 'field_65c33cf5d292f',
				'label' => 'Post Format: Video URL',
				'name' => 'newsx_post_video_url',
				'aria-label' => '',
				'type' => 'oembed',
				'instructions' => 'Example: https://youtu.be/...',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'width' => '',
				'height' => '',
			),
			array(
				'key' => 'field_65c344f19098c',
				'label' => 'Post Format: Audio URL',
				'name' => 'newsx_post_audio_url',
				'aria-label' => '',
				'type' => 'oembed',
				'instructions' => 'Example: https://soundcloud.com/...',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'width' => '',
				'height' => '',
			),
			array(
				'key' => 'field_669f4fa5ea40b',
				'label' => 'Post Format: Gallery Images',
				'name' => 'newsx_post_gallery_images',
				'aria-label' => '',
				'type' => 'gallery',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
				'library' => 'all',
				'min' => '',
				'max' => '',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
				'insert' => 'append',
				'preview_size' => 'medium',
			),
		);

		if ( ! function_exists( 'is_plugin_active' ) ) {
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}

		if ( is_plugin_active( 'post-views-counter/post-views-counter.php' ) ) {
			$fields_array[] = array(
				'key' => 'field_65c3481761e71',
				'label' => 'Fake Post Views',
				'name' => 'newsx_post_fake_views',
				'aria-label' => '',
				'type' => 'number',
				'instructions' => 'Input a starting view count for this post.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'min' => '',
				'max' => '',
				'placeholder' => '',
				'step' => '',
				'prepend' => '',
				'append' => 'Leave this setting blank to display the real count.',
			);
		}
				
	
		acf_add_local_field_group( array(
		'key' => 'group_65c335f9d16b4',
		'title' => 'Single Post Settings',
		'fields' => $fields_array,
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
		) );

	}

		/**
	 * Register ACF Pro Fields.
	 *
	 * @since    1.0.0
	 */
	public function newsx_register_acf_pro_metaboxes() {
	
		if ( ! function_exists( 'acf_add_local_field_group' ) ) {
			return;
		}
	
		acf_add_local_field_group( array(
			'key' => 'group_669a833fc91fc',
			'title' => 'Sources / Via',
			'fields' => array(
				array(
					'key' => 'field_669a834031116',
					'label' => 'Sources',
					'name' => 'newsx_post_sources',
					'aria-label' => '',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => '',
					),
					'layout' => 'table',
					'pagination' => 0,
					'min' => 0,
					'max' => 0,
					'collapsed' => '',
					'button_label' => 'Add Source',
					'rows_per_page' => 20,
					'sub_fields' => array(
						array(
							'key' => 'field_669a837031117',
							'label' => 'Source Name',
							'name' => 'newsx_post_source_name',
							'aria-label' => '',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'maxlength' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'parent_repeater' => 'field_669a834031116',
						),
						array(
							'key' => 'field_669a839731118',
							'label' => 'Source URL',
							'name' => 'newsx_post_source_url',
							'aria-label' => '',
							'type' => 'url',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'parent_repeater' => 'field_669a834031116',
						),
					),
				),
				array(
					'key' => 'field_669a83bf31119',
					'label' => 'Via',
					'name' => 'newsx_post_vias',
					'aria-label' => '',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => '',
					),
					'layout' => 'table',
					'pagination' => 0,
					'min' => 0,
					'max' => 0,
					'collapsed' => '',
					'button_label' => 'Add Via',
					'rows_per_page' => 20,
					'sub_fields' => array(
						array(
							'key' => 'field_669a83d23111a',
							'label' => 'Via Name',
							'name' => 'newsx_post_via_name',
							'aria-label' => '',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'maxlength' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'parent_repeater' => 'field_669a83bf31119',
						),
						array(
							'key' => 'field_669a83d73111b',
							'label' => 'Via URL',
							'name' => 'newsx_post_via_url',
							'aria-label' => '',
							'type' => 'url',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'parent_repeater' => 'field_669a83bf31119',
						),
					),
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'post',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
			'show_in_rest' => 0,
		) );
				
	}

}
