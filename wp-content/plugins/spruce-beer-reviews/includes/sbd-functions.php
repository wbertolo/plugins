<?php
/**
 * Plugin 1 functions
 *
 * @package SpruceBeerDashboard
 */

/**
 * Activation Hook.
 *
 * Check for errors upon activation and log them to a file at the root of the plugin.
 */
function sbd_activate() {
    echo 'here'; die;
	$log_file = PLUGIN_1__DIR . 'activation_errors.log';

	set_error_handler( function( $severity, $message, $file, $line ) use ( $log_file ) {
        $log_message = date( '[Y-m-d H:i:s]' ) . " ERROR: { $message } in { $file } on line { $line }\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
    });

	restore_error_handler();

}

register_activation_hook(__FILE__, 'sbd_activate');

/**
 * Gets the posts.
 *
 * @return string The rendered HTML content for the shortcode.
 */
function sbd_shortcode() {
	return sbd_render_template( sbd_get_beer_by_id( 110569 ) );
}


/**
 * Renders the plugin template with the given posts.
 *
 * @return string The rendered HTML content from the template.
 */
function sbd_render_template( $result ) {
	ob_start();
	include SBD__DIR . 'templates/sbd-template.php';
	return ob_get_clean();
}

/**
 * Register the plugin scripts
 */
function sbd_register_scripts() {
	// Plugin 1 stylesheet.
	wp_register_style( 'spruce-beer-dashboard-styles', PLUGIN_1__URL . 'dist/css/style.min.css', array(), filemtime( PLUGIN_1__DIR . 'dist/css/style.min.css' ) );
	wp_enqueue_style( 'spruce-beer-dashboard-styles' );
}
