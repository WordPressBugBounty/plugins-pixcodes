<?php
/*
Plugin Name: PixCodes
Plugin URI: https://pixelgrade.com
Description: WordPress shortcodes plugin everywhere. Loaded with shortcodes, awesomeness and more.
Version: 2.3.9
Author: Pixelgrade
Author URI: https://pixelgrade.com
Author Email: hello@pixelgrade.com
License: GPL-2.0-or-later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: pixcodes
Domain Path: /lang
Requires at least: 5.9.0
Tested up to: 7.1
Requires PHP: 7.4
*/

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WpGradeShortcodes {

	protected static $plugin_dir;
	public $plugin_url;

	function __construct() {
		self::$plugin_dir = dirname( plugin_basename( __FILE__ ) );
		$this->plugin_url = plugin_dir_url( dirname( __FILE__ ) . '/plugin.php' );

		add_action( 'admin_init', array( $this, 'wpgrade_init_plugin' ) );
		// Register admin styles and scripts
		add_action( 'mce_buttons_2', array( $this, 'register_admin_assets' ) );

		// Register site styles and scripts
		// not used right now
		//add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_styles' ) );
		//add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_scripts' ) );

		// Run our plugin along with wordpress init
		add_action( 'init', array( $this, 'create_wpgrade_shortcodes' ) );

		add_filter( 'the_content', array( $this, 'wpgrade_remove_spaces_around_shortcodes' ) );

		// ajax load for modal
		if ( is_admin() ) {
			add_action( 'wp_ajax_wpgrade_get_shortcodes_modal', array( $this, 'wpgrade_get_shortcodes_modal' ) );
		}

		//prevent certain shortcodes from getting their content texturized
		add_filter( 'no_texturize_shortcodes', array( $this, 'wpgrade_shortcodes_to_exempt_from_wptexturize' ) );

	} // end constructor

	public function wpgrade_init_plugin() {
		$this->plugin_textdomain();
		$this->add_wpgrade_shortcodes_button();
	}

	public function plugin_textdomain() {
		// WordPress.org loads PixCodes language packs automatically.
	} // end plugin_textdomain

	/**
	 * Registers and enqueues admin-specific styles.
	 */
	public function register_admin_assets( $buttons ) {
		wp_enqueue_style( 'wpgrade-shortcodes-reveal-styles', $this->plugin_url . 'css/base.css', array( 'wp-color-picker' ), '2.3.9' );
		wp_enqueue_script( 'select2-js', $this->plugin_url . 'js/select2/select2.js', array(
					'jquery',
					'jquery-ui-tabs'
				), '2.3.9', true );
		wp_enqueue_script( 'wp-color-picker' );

		return $buttons;
	} // end register_admin_assets

	/**
	 * Registers and enqueues plugin-specific styles.Usually we base on the theme style and this is empty
	 */
	public function register_plugin_styles() {
	} // end register_plugin_styles

	/**
	 * Registers and enqueues plugin-specific scripts..Usually we base on theme front-end scripts and this is empty.
	 */
	public function register_plugin_scripts() {
	} // end register_plugin_scripts

	/*--------------------------------------------*
	 * Core Functions
	 *---------------------------------------------*/

	function add_wpgrade_shortcodes_button() {
		//make sure the user has correct permissions
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
			return;
		}

		// add to the visual mode only
		if ( get_user_option( 'rich_editing' ) == 'true' ) {
			add_filter( 'mce_external_plugins', array( $this, 'addto_mce_wpgrade_shortcodes' ) );
			add_filter( 'mce_buttons', array( $this, 'register_wpgrade_shortcodes_button' ) );
		}
	} // end action_method_name

	function register_wpgrade_shortcodes_button( $buttons ) {
		array_push( $buttons, "wpgrade" );

		return $buttons;
	} // end filter_method_name

	function addto_mce_wpgrade_shortcodes( $plugin_array ) {
		$plugin_array['wpgrade'] = $this->plugin_url . 'js/add_shortcode.js';
		wp_localize_script(
			'editor',
			'pixcodesModal',
			array(
				'nonce' => wp_create_nonce( 'pixcodes_shortcode_modal' ),
			)
		);

		return $plugin_array;
	}

	public function wpgrade_get_shortcodes_modal() {
		check_ajax_referer( 'pixcodes_shortcode_modal', 'nonce' );

		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
			wp_send_json_error( esc_html__( 'You are not allowed to access this shortcode modal.', 'pixcodes' ), 403 );
		}

		ob_start();
		include( 'views/shortcodes-modal.php' );
		wp_send_json_success( ob_get_clean() );
	}

	public function create_wpgrade_shortcodes() {
		include_once( 'shortcodes.php' );
	}

	function wpgrade_remove_spaces_around_shortcodes( $content ) {
		$array = array(
			'<p>[' => '[',
			']</p>' => ']',
			']<br />' => ']'
		);

		$content = strtr( $content, $array );

		return $content;
	}

	/**
	 * Add some of our own shortcodes to the list of shortcodes that won't have their content texturized.
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function wpgrade_shortcodes_to_exempt_from_wptexturize( $shortcodes ) {
		$shortcodes[] = 'restaurantmenu';

		return $shortcodes;
	}

} // end class

$WpGradeShortcodes = new WpGradeShortcodes();
