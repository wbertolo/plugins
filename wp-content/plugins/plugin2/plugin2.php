<?php
/**
 * Plugin Name: Plugin 2
 * Description: A PHP experimental project for tbk.
 * Version: 1.0.0
 * Author: William Bertolo
 * Author URI: https://github.com/wbertolo/
 * Text Domain: plugin-1
 * Domain Path: /languages
 *
 * @package Plugin2
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Constants.
define( 'PLUGIN_2_VERSION', '1.0.0' );
define( 'PLUGIN_2__DIR', plugin_dir_path( __FILE__ ) ); // path.

/**
 * Enqueues scripts.
 */
function enqueue_scripts() {

	$plugin_dir    = plugin_dir_path( __FILE__ );
	$manifest_path = $plugin_dir . 'app/build/asset-manifest.json';

	if ( ! file_exists( $manifest_path ) ) {
		return; // manifest doesn't exist.
	}

	// @codingStandardsIgnoreLine
	$manifest = json_decode( file_get_contents( $manifest_path ), true );

	// Enqueue main runtime and chunks.
	if ( isset( $manifest['files']['main.js'] ) ) {
		wp_enqueue_script(
			'react-runtime',
			plugins_url( 'app/build/' . $manifest['files']['main.js'], __FILE__ ),
			array(),
			filemtime( PLUGIN_2__DIR . 'app/build' . $manifest['files']['main.js'] ),
			true
		);
	}

	// CSS.
	if ( isset( $manifest['files']['main.css'] ) ) {
		wp_enqueue_style(
			'react-style',
			plugins_url( 'app/build/' . $manifest['files']['main.css'], __FILE__ ),
			'',
			filemtime( PLUGIN_2__DIR . 'app/build' . $manifest['files']['main.css'] )
		);
	}

	// Pass vars to React.
	wp_localize_script(
		'plugin2',
		'wpData',
		array(
			'restUrl' => esc_url( rest_url() ),
			'nonce'   => wp_create_nonce( 'wp_rest' ),
		)
	);
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );


/**
 * Creates the shortcodes.
 */
function plugin2_shortcode() {
	return '<div id="root"></div>'; // This is where React will mount.
}

add_shortcode( 'plugin2', 'plugin2_shortcode' );
