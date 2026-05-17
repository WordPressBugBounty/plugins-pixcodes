<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// get needed classes
$classes = 'pixcode  pixcode--btn  btn';
$classes .= ! empty( $size ) ? '  btn--' . esc_attr( $size ) : '';
$classes .= ! empty( $text_size ) ? '  btn--' . esc_attr( $text_size ) : '';
$classes .= ! empty( $class ) ? '  ' . esc_attr( $class ) : '';

// get content
$content = ! empty( $content ) ? $this->get_clean_content( $content ) : '';
?>
<a
	<?php if ( ! empty( $id ) ) : ?>
		id="<?php echo esc_attr( $id ); ?>"
	<?php endif; ?>
	class="<?php echo esc_attr( $classes ); ?>"
	<?php if ( ! empty( $link ) ) : ?>
		href="<?php echo esc_url( $link ); ?>"
	<?php endif; ?>
	<?php if ( ! empty( $newtab ) ) : ?>
		target="_blank" rel="noopener"
	<?php endif; ?>
><?php echo wp_kses_post( $content ); ?></a>
