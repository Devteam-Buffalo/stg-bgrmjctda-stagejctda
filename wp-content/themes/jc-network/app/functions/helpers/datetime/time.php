<?php
/*
**  @file    time.php
**  
**  @desc    
**  
**  @path    /time.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    10/8/17
*/
defined( 'ABSPATH' ) || exit;

/* ---------------------------------------
*
* Returns: 8:32 p.m.
*
------------------------------------ */
function get_time( $given_time ) {
	date_default_timezone_set('America/New_York');

	$time = date('h:i A', $given_time );
	
	return $time;
}
