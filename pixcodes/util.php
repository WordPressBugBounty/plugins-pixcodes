<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if ( ! function_exists( 'pixcodes_shortcode_modal_allowed_html' ) ) {
	function pixcodes_shortcode_modal_allowed_html() {
		$allowed_html = wp_kses_allowed_html( 'post' );

		$allowed_html['button'] = array(
			'type'  => true,
			'class' => true,
		);
		$allowed_html['form'] = array(
			'id' => true,
		);
		$allowed_html['fieldset'] = array();
		$allowed_html['input'] = array(
			'type'        => true,
			'id'          => true,
			'name'        => true,
			'class'       => true,
			'value'       => true,
			'rows'        => true,
			'placeholder' => true,
			'checked'     => true,
			'multiple'    => true,
		);
		$allowed_html['div']['data-tab'] = true;
		$allowed_html['li']['data-index'] = true;
		$allowed_html['select'] = array(
			'type'         => true,
			'name'         => true,
			'class'        => true,
			'id'           => true,
			'multiple'     => true,
			'value'        => true,
			'data-options' => true,
		);
		$allowed_html['option'] = array(
			'value'    => true,
			'selected' => true,
		);
		$allowed_html['textarea'] = array(
			'type'        => true,
			'name'        => true,
			'class'       => true,
			'id'          => true,
			'rows'        => true,
			'placeholder' => true,
		);

		return $allowed_html;
	}
}

if ( ! function_exists( 'pixcodes_frontend_allowed_html' ) ) {
	function pixcodes_frontend_allowed_html() {
		$allowed_html = wp_kses_allowed_html( 'post' );

		$allowed_html['div']['data-slidertransition'] = true;
		$allowed_html['div']['data-arrows']           = true;
		$allowed_html['div']['data-bullets']          = true;
		$allowed_html['div']['data-autoheight']       = true;
		$allowed_html['div']['data-value']            = true;
		$allowed_html['title']                        = array();
		$allowed_html['icon']                         = array();
		$allowed_html['body']                         = array();
		$allowed_html['meta']                         = array(
			'itemprop' => true,
			'content'  => true,
		);

		return $allowed_html;
	}
}

if (!function_exists('wpgrade_remove_spaces_around_shortcodes')) {

	function wpgrade_remove_spaces_around_shortcodes( $content ) {
		$array = array(
			'<p>[' => '[',
			']</p>' => ']',
			']<br />' => ']'
		);

		$content = strtr( $content, $array );

		return $content;
	}
}

if (!function_exists('wpgrade_parse_shortcode_content')) {

	function wpgrade_parse_shortcode_content( $content ) {

	   /* Parse nested shortcodes and add formatting. */
		$content = trim( do_shortcode( shortcode_unautop( $content ) ) );

		/* Remove '' from the start of the string. */
		if ( substr( $content, 0, 4 ) == '' )
			$content = substr( $content, 4 );

		/* Remove '' from the end of the string. */
		if ( substr( $content, -3, 3 ) == '' )
			$content = substr( $content, 0, -3 );

		/* Remove any instances of ''. */
		$content = str_replace( array( '<p></p>' ), '', $content );
		$content = str_replace( array( '<p> </p>' ), '', $content );
		$content = str_replace( array( '<p>  </p>' ), '', $content );

		return $content;
	}
}
