<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// get needed classes
$classes = 'pixcode  pixcode--separator  separator';
$classes .= ! empty( $style ) ? ' separator--' . esc_attr( $style ) : '';
?>
<hr class="<?php echo esc_attr( $classes ); ?>"/>
