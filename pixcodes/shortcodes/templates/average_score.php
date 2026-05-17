<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$pixcodes_note          = function_exists( 'get_field' ) ? get_field( 'note' ) : '';
$pixcodes_average_score = class_exists( 'bucket' ) && is_callable( array( 'bucket', 'get_average_score' ) ) ? bucket::get_average_score() : '';
?>
<div class="score-box  score-box--inside">
	<div class="score__average-wrapper">
		<div class="score__average <?php echo $pixcodes_note ? 'average--with-desc' : ''; ?>">
			<?php
			echo '<div class="score__note" itemprop="rating" >' . esc_html( $pixcodes_average_score ) . '</div>';
			if ( $pixcodes_note ) {
				echo '<div class="score__desc">' . wp_kses_post( $pixcodes_note ) . '</div>';
			} ?>
			<meta itemprop="worst" content="1">
			<meta itemprop="best" content="10">
		</div>
	</div>
</div>
