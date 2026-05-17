<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$classes = array( 'pixcode', 'pixcode--infobox', 'infobox' );

if ( ! empty( $align ) ) {
	$classes[] = sanitize_html_class( $align );
}
?>
<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<?php if ( ! empty( $title ) ) : ?>
		<h3 class="infobox__title"><?php echo esc_html( $title ); ?></h3>
	<?php endif; ?>
	<?php if ( ! empty( $subtitle ) ) : ?>
		<div class="infobox__subtitle"><?php echo esc_html( $subtitle ); ?></div>
	<?php endif; ?>
	<?php if ( ! empty( $content ) ) : ?>
		<div class="infobox__content"><?php echo wp_kses_post( $this->get_clean_content( $content ) ); ?></div>
	<?php endif; ?>
</div>
