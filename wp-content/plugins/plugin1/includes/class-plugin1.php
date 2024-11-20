<?php
/**
 * Main class for Plugin 1
 *
 * @package Plugin1
 */

class Plugin1{
    
    public function __construct() {
        add_action( 'init', array( $this, 'init' ) );
    }

    public function init() {
        load_plugin_textdomain( 'plugin-1', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); // for translation

        add_shortcode( 'plugin1', 'plugin1_shortcode' );

    }

}
