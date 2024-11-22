<?php
/**
 * Plugin 1 functions
 *
 * @package SpruceBeerDashboard
 */

/**
 * Gets the posts.
 *
 * @return string The rendered HTML content for the shortcode.
 */
function sbd_shortcode() {
	$beer_info     = sbd_get_beer_by_id( 110569 );
	$beer_activity = sbd_get_beer_activity_by_id( 110569 );
	return sbd_render_template( $beer_info, $beer_activity );
}


/**
 * Renders the plugin template with the given posts.
 *
 * @param array $beer_info      Information about the beer (e.g., beer details like name, ABV, etc.).
 * @param array $beer_activity  Activity related to the beer (e.g., user ratings, reviews, etc.).
 *
 * @return string The rendered HTML content from the template.
 */
// @codingStandardsIgnoreLine
function sbd_render_template( $beer_info, $beer_activity ) {
	ob_start();
	include SBD__DIR . 'templates/sbd-template.php';
	return ob_get_clean();
}

/**
 * Register the plugin scripts
 */
function sbd_register_scripts() {
	// Plugin 1 stylesheet.
	wp_register_style( 'spruce-beer-dashboard-styles', SBD__URL . 'dist/css/style.min.css', array(), filemtime( SBD__DIR . 'dist/css/style.min.css' ) );
	wp_enqueue_style( 'spruce-beer-dashboard-styles' );
}


if ( ! function_exists( 'write_log' ) ) {
	/**
	 * Writes the logs
	 */
	function sbd_write_log( $log ) {
		if ( true === WP_DEBUG ) {
			if ( is_array( $log ) || is_object( $log ) ) {
				// error_log( print_r( $log, true ) );
			} else {
				// error_log( $log );
			}
		}
	}

}
