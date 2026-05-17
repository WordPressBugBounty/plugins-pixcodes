<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$class= "span12";
if ( isset($param['admin_class'] ) ) $class = $param['admin_class']; ?>

<span class="<?php echo esc_attr( $class ); ?>"  >
    <label for="<?php echo esc_attr( $param['param_key'] ); ?>"><?php echo esc_html( $param['name'] ); ?></label>
    <div class="media_image_holder" >
        <i class="icon-camera" style=""></i>
        <input type="hidden" class="media_image_input" name="<?php echo esc_attr( $param['param_key'] ); ?>" />
        <img class="upload_preview" />
        <i class="icon-edit" ></i>
    </div>
</span>
