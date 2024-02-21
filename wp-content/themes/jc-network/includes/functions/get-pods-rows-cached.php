<?php
/*
**  @file               get-pods-rows-cached.php
**  @description        Function, with caching, to export all items of a Pod as a serialized php array or JSON object
**  @package            jctda-public-prod
**  @since              1.0.0
**  @author             lpeterson
**  @date               2/23/18
**  @param string       $p
**  @param bool         $j
**  @return             bool|mixed|null|string|void
*/

defined('ABSPATH') || exit;

if ( ! function_exists( 'get_pods_rows_cached' ) ) :

	function get_pods_rows_cached( $p, $t = null, $j = false ) {
		
		// if no pod name given, bail by returning false
		if( ! isset( $p ) ) 
			return false;
		
		//name the transient we are caching in for the pod
		$k = "pods_{$p}_rows";
		
		// get the cached pod, or get false
		$o = pods_transient_get( $k );
	
		//check if we already have this data cached, if not continue
		if ( ! $o ) {
	
			//build Pods object, get all items
			$a = pods( $p, [ 'limit' => 100 ], true );
	
			//if we have items, loop through them, adding each item's complete row to the array
			if ( $a && $a->total() > 0 ) {
				while ( $a->fetch() ) {
					$o[ $a->id() ] = $a->row();
				}
			}
			// if not, bail by returning false
			else {
				return false;
			}
			
			// check if json is desired, else, serialize it
			$o = $j ? json_encode( $o ) : serialize( $o );

			//set expiration if none given
			$t = $t ?: HOUR_IN_SECONDS;
	
			//cache for next time
			pods_transient_set( $k, $o, $t );
	
		}
		
		// return either the existing transient, or the newly set transient
		return $o;
	
	}

endif;