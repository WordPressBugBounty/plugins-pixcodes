<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$class= "span12";
if ( isset($param['admin_class'] ) ) $class = $param['admin_class'];
if ( isset($param['is_content'] ) ) $is_content = 'class="is_shortcode_content"'; else { $is_content = ''; } ?>

<span class="<?php echo esc_attr( $class ); ?>" >
    <label for="<?php echo esc_attr( $param['param_key'] ); ?>"><?php echo esc_html( $param['name'] ); ?></label>
    <input type="<?php echo esc_attr( $param['type'] ); ?>" name="<?php echo esc_attr( $param['param_key'] ); ?>" <?php echo wp_kses_data( $is_content ); ?>/>
</span>
