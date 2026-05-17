<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$return_string = '<div class="pixslider js-pixslider" ' . esc_html( $navigation_style ) . ' data-slidertransition="' . esc_html( $custom_slider_transition ) . '">';

$return_string .= do_shortcode( $content );

$return_string .= '</div>';
echo wp_kses( $return_string, pixcodes_frontend_allowed_html() );
