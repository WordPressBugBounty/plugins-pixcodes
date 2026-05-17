<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>
<div class="slide"><?php echo wp_kses_post( do_shortcode( $content ) ); ?></div>
