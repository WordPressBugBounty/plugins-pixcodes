<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WpGradeShortcode_Button extends WpGradeShortcode {

	public function __construct( $settings = array() ) {
		$this->self_closed = false;
		$this->name        = esc_html__( 'Button', 'pixcodes_txtd' );
		$this->code        = 'button';
		$this->icon        = 'icon-bookmark';
		$this->direct      = false;
		$this->one_line    = true;

		$this->params = array(
			'label'     => array(
				'type'        => 'text',
				'name'        => esc_html__( 'Label Text', 'pixcodes_txtd' ),
				'admin_class' => 'span6',
				'is_content'  => true,
			),
			'link'      => array(
				'type'        => 'text',
				'name'        => esc_html__( 'Link URL', 'pixcodes_txtd' ),
				'admin_class' => 'span5 push1'
			),
			'size'      => array(
				'type'        => 'select',
				'name'        => esc_html__( 'Button Size', 'pixcodes_txtd' ),
				'options'     => array(
					''      => esc_html__( '-- Select Size --', 'pixcodes_txtd' ),
					'small' => esc_html__( 'Small', 'pixcodes_txtd' ),
					'large' => esc_html__( 'Large', 'pixcodes_txtd' ),
					'huge'  => esc_html__( 'Huge', 'pixcodes_txtd' )
				),
				'admin_class' => 'span6'
			),
			'text_size' => array(
				'type'        => 'select',
				'name'        => esc_html__( 'Text Size', 'pixcodes_txtd' ),
				'options'     => array(
					''      => esc_html__( '-- Select Size --', 'pixcodes_txtd' ),
					'gamma' => esc_html__( 'Small', 'pixcodes_txtd' ),
					'beta'  => esc_html__( 'Large', 'pixcodes_txtd' ),
					'alpha' => esc_html__( 'Huge', 'pixcodes_txtd' )
				),
				'admin_class' => 'span5 push1'
			),
			'class'     => array(
				'type'        => 'text',
				'name'        => esc_html__( 'Class', 'pixcodes_txtd' ),
				'admin_class' => 'span3'
			),
			'id'        => array(
				'type'        => 'text',
				'name'        => esc_html__( 'ID', 'pixcodes_txtd' ),
				'admin_class' => 'span2 push1'
			),
			'newtab'    => array(
				'type'        => 'switch',
				'name'        => esc_html__( 'Open in a new tab?', 'pixcodes_txtd' ),
				'admin_class' => 'span5 push2'
			),
		);

		// allow the theme or other plugins to "hook" into this shortcode's params
		$this->params = apply_filters( 'pixcodes_filter_params_for_' . strtolower( $this->name ), $this->params );

		add_shortcode( 'button', array( $this, 'add_shortcode' ) );
	}

	public function add_shortcode( $atts, $content ) {
		//create an array with only the registered params - dynamic since we filter them and have no way of knowing for sure
		$extract_params = array();
		if ( isset( $this->params ) ) {
			foreach ( $this->params as $key => $value ) {
				$extract_params[ $key ] = '';
			}
		}
		extract( shortcode_atts( $extract_params, $atts ) );

		/**
		 * Template localization between plugin and theme
		 */
		$located = locate_template( "templates/shortcodes/{$this->code}.php", false, false );
		if ( ! $located ) {
			$located = dirname( __FILE__ ) . '/templates/' . $this->code . '.php';
		}
		// load it
		ob_start();
		require $located;

		return ob_get_clean();
	}
}
