<?php
/**
 * GNOME Grass Theme Customizer
 *
 * @package GNOME Website
 */

//Checkboxes
function grass_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

//Integers
function grass_sanitize_int( $input ) {
    if ( is_numeric( $input ) ) {
        return intval( $input );
    }
}

//Text
function grass_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
