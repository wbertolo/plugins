<?php
/**
 * Plugin 1 API
 *
 * @package Plugin1
 */

/**
 * Gets the posts.
 * 
 * @return array Post collection data.
 */
function plugin1_get_graphql_posts() {

	$query = '
    query Posts {
      posts(first: 10) {
        edges {
          node {
            id
            title
            excerpt
            featuredImage {
              node {
                altText
                sourceUrl
              }
            }
          }
        }
      }
    }';

	$graphql_url = 'https://followthislight.com/graphql';

	$body = json_encode(
		array(
			'query' => $query,
		)
	);

	$headers = array(
		'Content-Type' => 'application/json',
	);

	$response = wp_remote_post(
		$graphql_url,
		array(
			'method'  => 'POST',
			'body'    => $body,
			'headers' => $headers,
			'timeout' => 15,
		)
	);

	if ( is_wp_error( $response ) ) {
		return 'Error: ' . $response->get_error_message();
	}

	// Decode the response.
	$data = json_decode( wp_remote_retrieve_body( $response ), true );

	// Check if data exists.
	if ( isset( $data['data']['posts']['edges'] ) ) {
		return $data['data']['posts']['edges'];  // Return the posts data.
	}

	return 'No posts found';
}
