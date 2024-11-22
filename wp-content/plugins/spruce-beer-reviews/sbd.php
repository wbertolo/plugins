<?php
/**
 * Plugin Name: Spruce Beer Dashboard
 * Description: A one-page dashboard for their Spruce Beer data, ratings, and latest reviews.
 * Version: 1.0.0
 * Author: William Bertolo, for tbk Creative (https://www.tbkcreative.com/)
 * Author URI: https://github.com/wbertolo/
 * Text Domain: spruce-beer-dashboard
 * Domain Path: /languages
 *
 * @package SpruceBeerDashboard
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Constants.
define( 'SBD_VERSION', '1.0.0' );
define( 'SBD__DIR', plugin_dir_path( __FILE__ ) ); // path.
define( 'SBD__URL', plugin_dir_url( __FILE__ ) ); // url.
define('UNTAPPD_API_CLIENT_ID', '3B699F2A6042F01F5F198865B533DAE74E4498EF');
define('UNTAPPD_API_CLIENT_SECRET', '6A750CCE8AC023F996133E376E3B58EC5478BCD5');

// Includes.
require_once SBD__DIR . 'includes/api.php';
require_once SBD__DIR . 'includes/sbd-functions.php';
require_once SBD__DIR . 'includes/class-sbd.php';


/**
 * Initialize the plugin.
 */
function run_class_spruce_beer_dashboard() {
	$plugin = new SpruceBeerDashboard();
}
run_class_spruce_beer_dashboard();
