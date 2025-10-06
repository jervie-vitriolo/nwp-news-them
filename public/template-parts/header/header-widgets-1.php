<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Get Args
$is_duplicate = isset($args['is_duplicate']) && $args['is_duplicate'];
$class = $is_duplicate ? ' newsx-duplicate-element' : '';

echo '<aside class="header-widgets-area header-widgets-area-1'. esc_attr($class) .'">';
    if ( is_active_sidebar( 'header-widgets-1' ) ) {
        echo newsx_customizer_edit_button_markup('sidebar-widgets-header-widgets-1');
    }

    newsx_dynamic_sidebar( 'header-widgets-1' );
echo '</aside>';
