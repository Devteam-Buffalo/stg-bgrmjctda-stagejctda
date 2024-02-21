<?php
/*
**  @file    media.php
**  
**  @desc    
**  
**  @path    /media.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    9/24/17
*/
defined( 'ABSPATH' ) || exit;

/*
* Remove JPEG Compression Set by WP
------------------------------------ */
add_filter( 'jpeg_quality', 'custom_jpeg_quality', 10, 2 );
function custom_jpeg_quality( $quality, $context ) {
	return 100;
}