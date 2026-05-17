<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$class= "span12";

if ( isset($param['admin_class'] ) ) $class = $param['admin_class'];?>

<span class="<?php echo esc_attr( $class ); ?>" >
    <label for="<?php echo esc_attr( $param['param_key'] ); ?>"><?php echo esc_html( $param['name'] ); ?></label>
    <input type="text" name="<?php echo esc_attr( $param['param_key'] ); ?>" class="wpgrade-colorpicker"/>
</span>
