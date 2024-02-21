<?php
/*
**  @file    uploads.php
**  
**  @desc    
**  
**  @path    /uploads.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    9/24/17
*/
defined( 'ABSPATH' ) || exit;

/*
* Add more file formats to allowed upload types
------------------------------------ */
add_filter( 'upload_mimes', 'add_mime_types' );
function add_mime_types( $mimes ) {
	$mimes['json'] = 'javascript/json';
	$mimes['webp'] = 'image/webp';
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}