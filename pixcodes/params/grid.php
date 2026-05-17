<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$class= "span12";

if ( isset($param['admin_class'] ) ) $class = $param['admin_class'];
$is_content = '';
if ( isset($param['is_content'] ) ) $is_content = 'class="is_shortcode_content"';  ?>

<div class="wpgrade_grid_row <?php echo esc_attr( $class ); ?>" >
	<label for="<?php echo esc_attr( $param['param_key'] ); ?>"><?php echo esc_html( $param['name'] ); ?></label>
	<ul class="ruler">
		<li class="fixed active" data-name="handler-0">0</li>
		<li>1</li>
		<li>2</li>
		<li>3</li>
		<li class="active" data-name="handler-1">4</li>
		<li>5</li>
		<li>6</li>
		<li>7</li>
		<li class="active" data-name="handler-2">8</li>
		<li>9</li>
		<li>10</li>
		<li>11</li>
		<li class="active" data-name="handler-3">12</li>
	</ul>

	<ul type="<?php echo esc_attr( $param['type'] ); ?>" name="<?php echo esc_attr( $param['param_key'] ); ?>" <?php echo wp_kses_data( $is_content ); ?> class="grid_cols_slider" >
	</ul>

	<ul class="grid_cols_dimensions grid_full"></ul>
	<ul class="grid_cols_content grid_full"></ul>

</div>
