<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// get needed classes
$classes = 'pixcode  pixcode--heading article__headline';

//make the first subtitle letter special
if ( ! empty( $subtitle ) ) {
	$subtitle   = esc_html( $subtitle );
	$first_char = mb_substr( $subtitle, 0, 1 );
	$subtitle   = '<span class="first-letter">' . $first_char . '</span>' . mb_substr( $subtitle, 1 );
}

?>
<hgroup class="<?php echo esc_attr( $classes ); ?>">
	<h2 class="headline__secondary"><?php echo wp_kses_post( $subtitle ); ?></h2>
	<h1 class="headline__primary"><?php echo wp_kses_post( $title ); ?></h1>
</hgroup>
