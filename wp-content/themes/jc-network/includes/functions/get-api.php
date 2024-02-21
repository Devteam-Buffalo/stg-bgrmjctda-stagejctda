<?php
/*
**  @file               get-api.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               5/3/18
*/
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'jc_get_api' ) ) {

	function jc_get_api( $url, $options = null ) {

		if ( $url ) {

			$args = wp_parse_args( $options, [
				'method'              => 'GET',
				'timeout'             => 2,
				'redirection'         => 3,
				'httpversion'         => '1.1',
				'blocking'            => false,
				'headers'             => null,
				'cookies'             => null,
				'body'                => ( isset( $options['body'] ) && is_array( $options['body'] ) ) ? http_build_query( $options['body'] ) : null,
				'compress'            => true,
				'decompress'          => true,
				'sslverify'           => true,
				'stream'              => false,
				'filename'            => null,
				'limit_response_size' => 1024000,
				'cache'               => true,
				'cache_time'          => HOUR_IN_SECONDS,
				'cache_key'           => md5( $url ),
			] );
			
			if ( false === $args['cache'] ) {
				pods_transient_clear( $args['cache_key'] );
				
				$data = false;
			}
			else {
				$data = pods_transient_get( $args['cache_key'] );
			}
			
			if ( false === $data ) {
				
				$response = wp_safe_remote_get( $url, array_filter( $args ) );
				
				if ( ! is_wp_error( $response ) ) {

					$code = wp_remote_retrieve_response_code( $response );
					
					switch( $code ) {
						case 200 :
							$data = json_decode( wp_remote_retrieve_body( $response ), true );
							break;
						
						default :
							$data = wp_remote_retrieve_response_message( $response );
							break;
					}
					
					pods_transient_set( $args['cache_key'], $data, $args['cache_time'] );

				}
				else {

					throw new Exception( $response->get_error_message(), $response->get_error_code() );

				}

			}
			
			return $data;
		}
		
		return false;
		
	}

}