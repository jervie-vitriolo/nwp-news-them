<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$custom_html = newsx_get_option( 'header_html1_editor' );

if ( !isset( $custom_html ) || empty( $custom_html ) ) {
	return;
}

// Get Args
$is_duplicate = isset($args['is_duplicate']) && $args['is_duplicate'];
$class = $is_duplicate ? ' newsx-duplicate-element' : '';

echo '<div class="newsx-custom-html newsx-header-custom-html-1'. esc_attr($class) .'">';
	echo newsx_customizer_edit_button_markup('hd_custom_html_1');
	echo wp_kses_post( $custom_html );
echo '</div>';
