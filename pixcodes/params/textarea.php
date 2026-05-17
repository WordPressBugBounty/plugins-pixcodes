<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$class= "span12";
if ( isset($param['admin_class'] ) ) $class = $param['admin_class'];
$is_content = '';
if ( isset($param['is_content'] ) ) $is_content = 'class="is_shortcode_content"';
$rows = 3;
if ( isset($param['rows'] ) ) $rows = $param['rows'];
?>

    <span class="<?php echo esc_attr( $class ); ?>" >
        <?php if (!empty($param['name'])) :?>
	    <label for="<?php echo esc_attr( $param['param_key'] ); ?>"><?php echo esc_html( $param['name'] ); ?></label>
	    <?php endif; ?>
        <textarea type="<?php echo esc_attr( $param['type'] ); ?>" name="<?php echo esc_attr( $param['param_key'] ); ?>" rows="<?php echo esc_attr( $rows ); ?>" <?php echo wp_kses_data( $is_content ); ?> ><?php if ( isset($param['predefined'] ) ) echo esc_textarea( $param['predefined'] ); ?></textarea>
    </span>
