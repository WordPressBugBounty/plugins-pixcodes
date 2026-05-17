<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$class= "span12";
if ( isset($param['admin_class'] ) ) $class = $param['admin_class']; ?>

    <span class="<?php echo esc_attr( $class ); ?>" >
        <input type="checkbox" name="<?php echo esc_attr( $param['param_key'] ); ?>" />
        <label for="<?php echo esc_attr( $param['param_key'] ); ?>"><?php echo esc_html( $param['name'] ); ?></label>
    </span>
