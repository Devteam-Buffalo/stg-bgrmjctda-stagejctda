<?php
/*
**  @file               get-weather.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               5/3/18
*/
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'jc_get_weather' ) ) :

	function jc_get_weather( $latitude = null, $longitude = null, $options = null ) {

		if ( isset( $latitude, $longitude ) ) {

			$api = esc_url( WEATHER_API, 'https', 'api' );
			$key = esc_attr( WEATHER_KEY );
			$lat = floatval( $latitude );
			$lon = floatval( $longitude );
			$gps = "{$lat},{$lon}";
			$opt = 'exclude=minutely,hourly,daily,alerts,flags&units=us';
			$url = "{$api}/{$key}/{$gps}?{$opt}";
			
			$response = jc_get_api( $url, $options );
			
			if ( is_wp_error( $response ) ) 
				throw new Exception( $response->get_error_message(), $response->get_error_code() );
			
			return $response;
		
		}
		
		return false;

	}

endif;