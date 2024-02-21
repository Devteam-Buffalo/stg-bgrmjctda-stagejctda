<?php
/*
**  @file               image-exists.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/11/17
*/
defined( 'ABSPATH' ) || exit;

function jc_image_exists( $url ) {
	if( ! $url || ! is_string( $url ) )
		return false;

	$headers = @get_headers( $url );

	if( ! $headers || $headers[0] == 'HTTP/1.0 404 Not Found' || $headers[0] == 'HTTP/1.1 404 Not Found' || $headers[0] == 'HTTP/2 404 Not Found' )
		return false;
	
	return $url;
}