<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// get the root
$plug_path = dirname( dirname( __FILE__ ) );
include_once( $plug_path . '/shortcodes.php' );
global $wpgrade_shortcodes;

global $post;

$post_id = filter_input( INPUT_GET, 'post_id', FILTER_VALIDATE_INT );
if ( $post_id ) {
	$post = get_post( $post_id );
} elseif ( $post === null ) {
	$post = get_post( 1 );
} ?>
<div id="wpgrade_shortcodes">
	<div class="l_modal_header">
		<button type="button" class="btn back"><i class="icon-reply"></i><span><?php esc_html_e( 'Back', 'pixcodes' ); ?></span></button>
		<div class="l_modal_title"><?php esc_html_e( 'Choose shortcode:', 'pixcodes' ); ?></div>
		<button type="button" class="btn close close-reveal-modal"><i class="icon-remove"></i></button>
	</div>
	<div class="l_modal_body three_col">
		<div class="details_container ">
			<div class="details_content"></div>
		</div>
		<ul class="l_three_col">
			<?php
			$shortcoces_array = $wpgrade_shortcodes->get_shortcodes();
			/**
			 * In case someone has something to say about this list
			 * here is the only place where it can be filtered
			 */
			$shortcoces_array = apply_filters( 'filter_shortcodes', $shortcoces_array, $post );

				foreach ( $shortcoces_array as $key => $shortcode ) {
					$class             = 'shortcode_' . $shortcode["name"] . '_open';
					$data_trigger_open = 'shortcode_' . $shortcode["name"] . '_open';
					$shortcode_js      = wp_json_encode( (object) $shortcode );
					if ( $shortcode["direct"] ) {
						$class .= ' insert-direct-shortcode';
					} ?>
				<li class="shortcode">
					<a class="details <?php echo esc_attr( $class ); ?>" data-params='<?php echo esc_attr( $shortcode_js ); ?>' data-trigger-open="<?php echo esc_attr( $data_trigger_open ); ?>">
						<i class="icon <?php echo esc_attr( $shortcode["icon"] ); ?>"></i>
						<span class="title"><?php echo esc_html( $shortcode["name"] ); ?></span>
					</a>
					<?php if ( ! $shortcode['direct'] && ! empty( $shortcode['params'] ) ) { ?>
						<div class="shortcode_params details_content">
							<form id="wpgrade_shortcodes_form">
								<fieldset>
									<div class="row">
										<?php
										foreach ( $shortcode['params'] as $k => $param ) {

											// inject the key in param ... since i was too lazy to do that before
											$param['param_key'] = $k;
											echo wp_kses( $wpgrade_shortcodes->render_param( $param ), pixcodes_shortcode_modal_allowed_html() );
										} ?>

										<button type="submit" class="btn hidden"><?php esc_html_e( 'Submit', 'pixcodes' ); ?></button>
									</div>
								</fieldset>
							</form>
							<div id="data_params" type="hidden" data-params='<?php echo esc_attr( $shortcode_js ); ?>'></div>
						</div>
					<?php } ?>
				</li>
			<?php } ?>
		</ul>
	</div>
	<div class="l_modal_footer">
		<a class="btn btn_secondary close"><?php esc_html_e( 'Cancel', 'pixcodes' ); ?></a>
		<span><?php esc_html_e( 'or', 'pixcodes' ); ?></span>
		<a class="btn btn_primary disabled"><?php esc_html_e( 'Insert', 'pixcodes' ); ?></a>
	</div>
</div>
