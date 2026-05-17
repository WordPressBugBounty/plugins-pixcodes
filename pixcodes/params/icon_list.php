<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$class= "span12";

if ( isset($param['admin_class'] ) ) $class = $param['admin_class'];?>

<span class="<?php echo esc_attr( $class ); ?>" >
    <label for="<?php echo esc_attr( $param['param_key'] ); ?>"><?php echo esc_html( $param['name'] ); ?></label>
    <ul class="pxg_icon_list">
        <input type="hidden" name="<?php echo esc_attr( $param['param_key'] ); ?>" class="selected_icon"/>
        <?php foreach ($param["icons"] as $icon) { ?>
            <li class="icon" data-icon="<?php echo esc_attr( $icon ); ?>"><i class="icon-<?php echo esc_attr( $icon ); ?>"></i></li>
        <?php } ?>
    </ul>
</span>
