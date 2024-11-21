<?php
/**
 * Plugin 1
 *
 * @package Plugin1
 */

/**
 * Plugin1 Class.
 *
 * This class handles the initialization of the Plugin1 functionality:
 * text domain for translations,
 * registering the shortcode,
 * enqueuing the required scripts for the plugin.
 */
class Plugin1 {

	/**
	 * Constructor for the Plugin1 class.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'init' ) );
	}

	/**
	 * Initializes the plugin's functionality.
	 */
	public function init() {
		load_plugin_textdomain( 'plugin-1', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); // for translation.
		add_shortcode( 'plugin1', 'plugin1_shortcode' );
		add_action( 'wp_enqueue_scripts', 'register_scripts' );
	}
}
