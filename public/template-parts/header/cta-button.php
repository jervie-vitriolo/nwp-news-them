<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$cta_text = newsx_get_option('header_cta_text');
$cta_link = newsx_get_option('header_cta_link');
$cta_icon = newsx_get_option('header_cta_icon');
$cta_icon_pos = newsx_get_option('header_cta_icon_pos');
$cta_new_tab = newsx_get_option('header_cta_new_tab') ? '_blank' : '';

// Get Args
$is_duplicate = isset($args['is_duplicate']) && $args['is_duplicate'];
$class = $is_duplicate ? ' newsx-duplicate-element' : '';

$html = '';

if ( '' !== $cta_text && '' !== $cta_icon ) {
	$html .= '<div class="newsx-cta-button newsx-header-cta-button'. esc_attr($class) .'">';
		$html .= newsx_customizer_edit_button_markup('hd_cta_button');
		$html .= '<a href="'. esc_url($cta_link) .'" class="newsx-flex-center-vr" title="'. esc_attr($cta_text) .'" target="'. esc_attr($cta_new_tab) .'">';
			$html .= 'left' === $cta_icon_pos ? newsx_get_svg_icon($cta_icon) : '';
			$html .= '<span>'. esc_html($cta_text) .'</span>';
			$html .= 'right' === $cta_icon_pos ? newsx_get_svg_icon($cta_icon) : '';
		$html .= '</a>';
	$html .= '</div>';
}

echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped