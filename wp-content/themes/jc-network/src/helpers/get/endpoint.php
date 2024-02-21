<?php
/*
**  @file    get-endpoint.php
**  
**  @desc    
**  
**  @path    /get-endpoint.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    10/19/17
*/
defined( 'ABSPATH' ) || exit;

if( ! function_exists( 'get_endpoint' ) ) {
	function get_endpoint( $endpoint = null, $serialize = false, $object = false ) {
		if( $endpoint ) {
			$data = null;
			
			$get_args = array( 'sslverify' => false );
		
			$response = wp_remote_get( $endpoint, $get_args );
			
			if ( ! is_wp_error( $response ) ) {
				if ( 200 == wp_remote_retrieve_response_code( $response ) ) {
					$body = wp_remote_retrieve_body( $response );
					
					if( $serialize ) {
						$serialized_data = maybe_serialize( $body );
						
						$data = $serialized_data;
					}
					else {
						if( $object ) {
							$json_data = json_decode( $body, false );
						}
						else {
							$json_data = json_decode( $body, true );
						}
						
						$data = $json_data;
					}
				}
				elseif ( 404 == wp_remote_retrieve_response_code( $response ) ) {
					$data = wp_remote_retrieve_response_message( $response );
				}
				else {
					$data = wp_remote_retrieve_response_message( $response );
				}
			} else {
				$data = $response->get_error_message();
			}
			
			if( empty( $data ) ) 
				return;
			
			return $data;
		}
	}
}