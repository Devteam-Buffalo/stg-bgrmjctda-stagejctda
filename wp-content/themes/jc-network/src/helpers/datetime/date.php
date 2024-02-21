<?php
/*
**  @file    date.php
**  
**  @desc    
**  
**  @path    /date.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    10/7/17
*/
defined( 'ABSPATH' ) || exit;

/* ---------------------------------------
*
* Returns: Saturday
*
------------------------------------ */
function get_day( $format = 'l' ) {
	$date_format = $format;

	$current_time = current_time( 'timestamp' );
	
	$date = date_i18n("{$date_format}", $current_time);

	return $date;
}

/* ---------------------------------------
*
* Returns: 10/07 6:09 pm
*
------------------------------------ */
function get_date() {
	$date_format = get_option( 'date_format' );

	$time_format = get_option( 'time_format' );

	$current_time = current_time( 'timestamp' );
	
	$date = date("{$date_format} {$time_format}", $current_time);

	return $date;
}

/* ---------------------------------------
*
* Returns: 10/07 @ 6:09 pm
*
------------------------------------ */	
function get_date_string() {
	$date_format = get_option( 'date_format' );

	$time_format = get_option( 'time_format' );

	$current_time = current_time( 'timestamp' );
	
	$date = date_i18n( $date_format, $current_time ) . ' @ ' . date_i18n( $time_format, $current_time );

	return $date;
}