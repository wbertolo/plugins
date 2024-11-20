<?php
/**
 * Plugin 1 functions
 *
 * @package Plugin1
 */

 function plugin1_shortcode( $atts ) {

	$atts = shortcode_atts(
        array(
            'message' => 'Plugin1 here', // Default message
        ),
        $atts,
        'your_shortcode' // Shortcode tag
    );

	return '<div class="plugin1-message">' . esc_html( $atts['message'] ) . '</div>';
 }