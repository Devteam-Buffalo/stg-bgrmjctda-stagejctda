<?php
/*
**  @file               fragment.php
**  @description        Fragment cache, storing transients in object cache.
**  @package            jctda-public-prod
**  @since              1.0.0
**  @author             lpeterson
**  @date               1/30/18
*/

defined('ABSPATH') || exit;

/*
Usage:
	$fraggle = new JC_Fragment_Cache( 'rock', 3600 ); // Second param is TTL
	
	if ( ! $fraggle->output() ) { // NOTE, testing for a return of false
		do_a_little_dance();

		sing_a_happy_song();

		// ** BUT WHATEVER YOU DO ... **
		$fraggle->store();
		// ** DO NOT FORGET TO STORE YOUR FRAGMENT!!!!! **
		
	}
*/

class JC_Fragment_Cache {
	// Transient cache group for this object
	const GROUP = 'jc-fragments';
	
	// Hold onto the provided key
	var $key;
	
	// Specify some expiration time to invalidate
	// the object from the cache store
	var $ttl;

	public function __construct( $key, $ttl ) {
		$this->key = $key;
		$this->ttl = $ttl;
	}

	public function output() {
		// When requested, get the object from the cache store
		// ** ONLY IF IT EXISTS **
		$output = wp_cache_get( $this->key, self::GROUP );
		
		if ( ! empty( $output ) ) {
			//
			// ** GET READY TO DO THE HAPPY DANCE!! **
			// Cached object was found... phew... return the cached object
			// ** @TODO: more checks, fallbacks, object caching **
			//
			echo $output;
			
			// In case it's malformed, don't blow up the site... 
			// just say it'll be okay
			return true;
		} else {
			// If no object existed in the cache store
			// begin buffering and prepare to flush the buffer
			ob_start();
			
			// Say we don't have what was requested knowing it's been 
			// tossed into the hopper for buffered, cached output
			return false;
		}
	}

	public function store() {
		// Flush the buffers
		$output = ob_get_flush();
		
		// Add the object to the object cache store
		wp_cache_add( $this->key, $output, self::GROUP, $this->ttl );
	}
}