<?php
/*
**  @file               file-exists.php
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

	if( ! filter_var($url, FILTER_VALIDATE_URL) || jc_images_exist_response( $url ) != 200 )
		return false;

	return $url;
}

function jc_images_exist( $urls ) {
	if( ! $urls || ! is_array( $urls ) ) 
		return false;
	
	$output = $urls;
	
	foreach( $output as $key => $value ) :
		if( empty( $value ) || jc_images_exist_response( $value ) != 200 ) :
			unset( $output[$key] );
		else :
			$output[$key] = $value;
		endif;
	endforeach;

	return $output;
}

function jc_images_exist_response( $url ) {
	$ch = @curl_init( $url );

	if( $ch === false )
		return false;

	// we want headers
	@curl_setopt( $ch, CURLOPT_HEADER, true );

	// dont need body
	@curl_setopt( $ch, CURLOPT_NOBODY, true );

	// catch output (do NOT print!)
	@curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

	// do not follow redirects
	@curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, false );

	// fairly random number (seconds)
	@curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 5 );

	// fairly random number (seconds)
	@curl_setopt( $ch, CURLOPT_TIMEOUT, 6 );

	// pretend we're a regular browser
	@curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.0) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.89 Safari/537.1" );

	@curl_exec( $ch );
	
	if( @curl_errno( $ch ) ) { // should be 0
		@curl_close( $ch );
		
		return false;
	}
	
	$code = @curl_getinfo( $ch, CURLINFO_HTTP_CODE ); // note: php.net documentation shows this returns a string, but really it returns an int
	
	@curl_close($ch);
	
	return $code;
}

function getHttpResponseCode_using_getheaders($url, $followredirects = true){
    // returns string responsecode, or false if no responsecode found in headers (or url does not exist)
    // NOTE: could potentially take up to 0-30 seconds , blocking further code execution (more or less depending on connection, target site, and local timeout settings))
    // if $followredirects == false: return the FIRST known httpcode (ignore redirects)
    // if $followredirects == true : return the LAST  known httpcode (when redirected)
    if(! $url || ! is_string($url)){
        return false;
    }
    $headers = @get_headers($url);
    if($headers && is_array($headers)){
        if($followredirects){
            // we want the the last errorcode, reverse array so we start at the end:
            $headers = array_reverse($headers);
        }
        foreach($headers as $hline){
            // search for things like "HTTP/1.1 200 OK" , "HTTP/1.0 200 OK" , "HTTP/1.1 301 PERMANENTLY MOVED" , "HTTP/1.1 400 Not Found" , etc.
            // note that the exact syntax/version/output differs, so there is some string magic involved here
            if(preg_match('/^HTTP\/\S+\s+([1-9][0-9][0-9])\s+.*/', $hline, $matches) ){// "HTTP/*** ### ***"
                $code = $matches[1];
                return $code;
            }
        }
        // no HTTP/xxx found in headers:
        return false;
    }
    // no headers :
    return false;
}