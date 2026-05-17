<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$class= "span12";
if ( isset($param['admin_class'] ) ) $class = $param['admin_class']; ?>

<span class="<?php echo esc_attr( $class ); ?>"  >
    <div class="info" >
        <?php echo wp_kses_post( $param["value"] ); ?>
    </div>
</span>
