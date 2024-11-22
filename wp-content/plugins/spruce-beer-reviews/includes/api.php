<?php
/**
 * Spruce Beer Dashboard API
 *
 * @package SpruceBeerDashboard
 */

/**
 * Fetch data from the Untappd API.
 *
 * @param string $endpoint The Untappd API endpoint.
 * @param array $params Query parameters as an associative array.
 * @return array|false Decoded JSON response or false on failure.
 */
function sbd_get_data( $endpoint, $params = [] ) {

	// Base variables.
	$base_url = 'https://api.untappd.com/v4/';
	$params['client_id'] = UNTAPPD_API_CLIENT_ID;
    $params['client_secret'] = UNTAPPD_API_CLIENT_SECRET;

	// Full URL with query parameters.
    $url = $base_url . $endpoint . '?' . http_build_query($params);

    // Request.
    $response = wp_remote_get(
		$url, 
		[
			'timeout' => 10, // Timeout (seconds)
			'headers' => [
				'Content-Type' => 'application/json',
        	],
	    ]
	);

	// Error handling.
	if ( is_wp_error( $response ) ) {
        error_log( 'Untappd API request error: ' . $response->get_error_message() );
        return false;
    }

	// Decoding of the JSON response.
	$body = wp_remote_retrieve_body( $response );
	$http_code = wp_remote_retrieve_response_code( $response );

	// Success.
	if ( $http_code === 200 && !empty( $body ) ) {
        return json_decode( $body, true ); // Decoded JSON
    }

	// Error log for non-200 responses
	error_log( "Untappd API request failed: HTTP { $http_code }" );
	return false;

}
