<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

echo '<aside class="footer-widgets-area footer-widgets-area-6">';
    if ( is_active_sidebar( 'footer-widgets-6' ) ) {
        echo newsx_customizer_edit_button_markup('sidebar-widgets-footer-widgets-6');
    }

    newsx_dynamic_sidebar( 'footer-widgets-6' );
echo '</aside>';
