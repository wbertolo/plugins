<?php
/**
 * Plugin 1 functions
 *
 * @package Plugin1
 */

/**
 * Gets the posts.
 *
 * @return string The rendered HTML content for the shortcode.
 */
function plugin1_shortcode() {
	return plugin1_render_template( plugin1_get_graphql_posts() );
}

/**
 * Register the plugin scripts
 */
function register_scripts() {

	// Theme stylesheet.
	wp_register_style( 'styles', PLUGIN_1__URL . '/dist/css/style.min.css', '', filemtime( PLUGIN_1__DIR . 'dist/css/style.min.css' ) );
	wp_enqueue_style( 'styles' );

	// Global scripts.
	wp_register_script( 'scripts', PLUGIN_1__URL . '/dist/js/bundle.min.js', '', filemtime( PLUGIN_1__DIR . 'dist/js/bundle.min.js' ), true );
	wp_enqueue_script( 'scripts' );
}


/**
 * Renders the plugin template with the given posts.
 *
 * @return string The rendered HTML content from the template.
 */
// @codingStandardsIgnoreLine
function plugin1_render_template( $posts ) {
	ob_start();
	include PLUGIN_1__DIR . 'templates/plugin1-template.php';
	return ob_get_clean();
}
