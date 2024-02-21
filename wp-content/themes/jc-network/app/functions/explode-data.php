<?php
/*
**  @file               explode-data.php
**  @description        
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/11/17
*/
defined( 'ABSPATH' ) || exit;

function jc_explode_data( $value ) {
	if( ! $value || ! is_string( $value ) )
		return false;
	
	$output = explode('|', $value);
	
	if( $output )
		return $output;
}

function jc_separate_time( $value ) {
	if( ! $value || ! is_string( $value ) )
		return false;
	
	$output = explode('-', $value);
	
	if( $output )
		return $output;
}

function jc_location_hours( $value ) {
	if( ! $value || ! is_string( $value ) )
		return false;
	
	$x = jc_explode_data( $value );

	//$f = 'Hi';
	//$o = 'g:i a';
	
	$output = [];
	
	if( is_array( $x ) ) {
		$h = [
			'Sunday'    => jc_separate_time( $x[0] ),
			'Monday'    => jc_separate_time( $x[1] ),
			'Tuesday'   => jc_separate_time( $x[2] ),
			'Wednesday' => jc_separate_time( $x[3] ),
			'Thursday'  => jc_separate_time( $x[4] ),
			'Friday'    => jc_separate_time( $x[5] ),
			'Saturday'  => jc_separate_time( $x[6] )
		];
		foreach( $h as $k => $v ) {
			$date_from = date_create_from_format('Hi', $v[0] );
			$date_to = date_create_from_format('Hi', $v[1] );
			
			$from = $date_from ? date_format( $date_from, 'g:i a') : null;
			$to = $date_to ? date_format( $date_to, 'g:i a') : null;
			
			$set = [
				$k => [
					'Open' => $from ?? false,
					'Close' => $to ?? false
				]
			];
			array_push( $output, $set );
		}
	}
	
	if( ! is_wp_error( $output ) && is_array( $output ) )
		return $output;
}