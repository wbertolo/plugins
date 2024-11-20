<?php
/**
 * Plugin 1 functions
 *
 * @package Plugin1
 */


function plugin1_shortcode( $atts ) {

	// $atts = shortcode_atts(
    //     array(
    //         'title' => 'my title',
    //         'content' => 'my content',
    //         'image' => 'https://followthislight.com/wp-content/uploads/2023/12/PXL_20231202_100316332-1200x900.jpg',
    //         "alt" => 'italy'
    //     ),
    //     $atts,
    //     'plugin1'
    // );

    return plugin1_render_template( plugin1_get_graphql_posts() );
 }

 // Register Scripts
function register_scripts() {

	// Theme stylesheet.
	wp_register_style( 'styles', PLUGIN_1__URL . '/dist/css/style.min.css', '', filemtime( PLUGIN_1__DIR . 'dist/css/style.min.css' ) );
	wp_enqueue_style( 'styles' );

	// Global scripts.
	wp_register_script( 'scripts', PLUGIN_1__URL . '/dist/js/bundle.min.js', '', filemtime( PLUGIN_1__DIR . 'dist/js/bundle.min.js' ), true );
	wp_enqueue_script( 'scripts' );

}


// Renders the template
function plugin1_render_template( $posts ) {

    // // Extract attributes passed to the block (if using Gutenberg block).
    // $title = isset( $attributes['title'] ) ? $attributes['title'] : 'default itle';
    // $content = isset( $attributes['content'] ) ? $attributes['content'] : 'default content.';
    // $image = isset( $attributes['image'] ) ? $attributes['image'] : 'default image URL';
    // $alt = isset( $attributes['alt'] ) ? $attributes['alt'] : 'default alt';

    // Start output buffering to capture the template's output.
    ob_start();
    include PLUGIN_1__DIR . 'templates/plugin1-template.php';
    return ob_get_clean();
}
 