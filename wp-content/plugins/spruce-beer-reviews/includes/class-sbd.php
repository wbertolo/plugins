<?php
/**
 * Spruce Beer Dashboard
 *
 * @package SpruceBeerDashboard
 */

/**
 * SpruceBeerDashboard Class.
 *
 * This class handles the initialization of the SpruceBeerDashboard functionality:
 * text domain for translations,
 * registering the shortcode,
 * enqueuing the required scripts.
 */
class SpruceBeerDashboard {

	/**
	 * Constructor for the SpruceBeerDashboard class.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'init' ) );
	}

	/**
	 * Initializes the plugin's functionality.
	 */
	public function init() {
		load_plugin_textdomain( 'spruce-beer-dashboard', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); // for translation.
		add_shortcode( 'spruce-beer-dashboard', 'sbd_shortcode' );
		add_action( 'wp_enqueue_scripts', 'sbd_register_scripts' );
	}
}
