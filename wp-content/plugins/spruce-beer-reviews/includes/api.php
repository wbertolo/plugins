<?php
/**
 * Spruce Beer Dashboard API
 *
 * @package SpruceBeerDashboard
 */

/**
 * Fetch beer information by beer ID.
 *
 * @param int $beer_id The beer ID.
 * @return array|false Decoded JSON response or false on failure.
 */
function sbd_get_beer_by_id( $beer_id ) {

	// Validate the beer ID.
	if ( empty( $beer_id ) || ! is_numeric( $beer_id ) ) {
		sbd_write_log( 'Invalid Beer ID provided.' );
		return false;
	}

	// Call the Untappd API using the untappd_api_request function.
	$response = sbd_api_request( "beer/info/$beer_id" );

	// Return the response or handle errors.
	if ( $response ) {
		return $response;
	}

	sbd_write_log( "Failed to fetch beer info for Beer ID: { $beer_id }" );
	return false;
}


/**
 * Fetch beer actvity by beer ID.
 *
 * @param int $beer_id The beer ID.
 * @return array|false Decoded JSON response or false on failure.
 */
function sbd_get_beer_activity_by_id( $beer_id ) {

	// Validate the beer ID.
	if ( empty( $beer_id ) || ! is_numeric( $beer_id ) ) {
		sbd_write_log( 'Invalid Beer ID provided.' );
		return false;
	}

	$params['limit'] = 10;

	// Call the Untappd API using the untappd_api_request function.
	$response = sbd_api_request( "beer/checkins/$beer_id/", $params );

	// Return the response or handle errors.
	if ( $response ) {
		return $response;
	}

	sbd_write_log( "Failed to fetch beer info for Beer ID: { $beer_id }" );
	return false;
}


/**
 * Fetch data from the Untappd API.
 *
 * @param string $endpoint The Untappd API endpoint.
 * @param array  $params Query parameters as an associative array.
 * @return array|false Decoded JSON response or false on failure.
 */
function sbd_api_request( $endpoint, $params = array() ) {

	// Base variables.
	$base_url                = 'https://api.untappd.com/v4/';
	$params['client_id']     = UNTAPPD_API_CLIENT_ID;
	$params['client_secret'] = UNTAPPD_API_CLIENT_SECRET;

	// Full URL with query parameters.
	$url = $base_url . $endpoint . '?' . http_build_query( $params );

	// Request.
	$response = wp_remote_get(
		$url,
		array(
			'timeout' => 10, // Timeout (seconds).
			'headers' => array(
				'Content-Type' => 'application/json',
			),
		)
	);

	// Error handling.
	if ( is_wp_error( $response ) ) {
		sbd_write_log( 'Untappd API request error: ' . $response->get_error_message() );
		return false;
	}

	// Decoding of the JSON response.
	$body      = wp_remote_retrieve_body( $response );
	$http_code = wp_remote_retrieve_response_code( $response );

	// Success.
	if ( 200 === $http_code && ! empty( $body ) ) {
		return json_decode( $body, true ); // Decoded JSON.
	}

	// Error log for non-200 responses.
	sbd_write_log( "Untappd API request failed: HTTP { $http_code }" );
	return false;
}
