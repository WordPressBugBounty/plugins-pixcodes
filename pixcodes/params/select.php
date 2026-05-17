<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$class= "span12";
if ( isset($param['admin_class'] ) ) $class = $param['admin_class']; ?>

    <span class="<?php echo esc_attr( $class ); ?>" >
        <label for="<?php echo esc_attr( $param['param_key'] ); ?>"><?php echo esc_html( $param['name'] ); ?></label>
        <select name="<?php echo esc_attr( $param['param_key'] ); ?>" >
            <?php
            $options = $param['options'];
            foreach ( $options as $i => $opt ) { ?>
                <option value="<?php echo esc_attr( $i ); ?>"><?php echo esc_html( $opt ); ?></option>
            <?php } ?>
        </select>
    </span>
