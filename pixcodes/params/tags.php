<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$class= "span12";

if ( isset($param['admin_class'] ) ) $class = $param['admin_class'];
$is_content = '';
if ( isset($param['is_content'] ) ) $is_content = 'class="is_shortcode_content"'; ?>

    <span class="<?php echo esc_attr( $class ); ?> input-tags" >
        <label for="<?php echo esc_attr( $param['param_key'] ); ?>"><?php echo esc_html( $param['name'] ); ?></label>
        <select type="<?php echo esc_attr( $param['type'] ); ?>" name="<?php echo esc_attr( $param['param_key'] ); ?>" <?php echo wp_kses_data( $is_content ); ?> value="<?php echo esc_attr( implode( ',', $param['value'] ) ); ?>" data-options='<?php echo esc_attr( wp_json_encode( $param['options'] ) ); ?>'></select>
    </span>
