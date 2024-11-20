<?php
/**
 * Plugin Name: Plugin 1
 * Description: A PHP experimental project for tbk.
 * Version: 1.0.0
 * Author: William Bertolo
 * Author URI: https://github.com/wbertolo/
 * Text Domain: plugin-1
 * Domain Path: /languages
 *
 * @package Plugin1
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Constants
define( 'PLUGIN_1_VERSION', '1.0.0' );
define( 'PLUGIN_1__DIR', plugin_dir_path( __FILE__ ) ); // path
define( 'PLUGIN_1__URL', plugin_dir_url( __FILE__ ) ); // url

// Includes
require_once PLUGIN_1__DIR . 'includes/plugin1-functions.php';
require_once PLUGIN_1__DIR . 'includes/class-plugin1.php';


// Initialize the plugin
function run_PLUGIN_1() {
    $plugin = new Plugin1();
    // $plugin->run();
}
run_PLUGIN_1();
