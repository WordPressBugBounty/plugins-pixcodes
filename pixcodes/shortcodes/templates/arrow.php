<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$classes = array( 'pixcode', 'pixcode--arrow' );

if ( ! empty( $align ) ) {
	$classes[] = 'arrow--' . sanitize_html_class( $align );
}

if ( ! empty( $size ) ) {
	$classes[] = 'arrow--' . sanitize_html_class( $size );
}

if ( ! empty( $color ) ) {
	$classes[] = 'arrow--' . sanitize_html_class( $color );
}
?>
<span class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>"></span>
