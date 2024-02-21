<?php
/*
**  @file               fragment-cache.php
**  @description        Fragment caching with storage support for transients, object cache and object metadata.
**  @package            jctda
**  @since              1.0.0
**  @author             https://github.com/pressjitsu/fragment-cache
**  @date               11/8/17

Usage:

$args = array(
	'storage' => 'meta',
	'meta_type' => 'post',
	'object_id' => $post->ID,
);

if ( ! RM_Fragment_Cache::output( 'some-cache-key', $args ) ) {
	// do something expensive

	RM_Fragment_Cache::store();
}
*/
defined( 'ABSPATH' ) || exit;

class RM_Fragment_Cache {
	private static $key;
	private static $args;
	private static $lock;

	public static function output( $key, $args = array() ) {
		if ( self::$lock )
			throw new Exception( 'Output started but previous output was not stored.' );

		$args = wp_parse_args( $args, array(
			'storage' => 'transient', // object-cache, meta
			'unique' => array(),
			'ttl' => 0,

			// Meta storage only
			'meta_type' => '',
			'object_id' => 0,
		) );

		$args['unique'] = md5( json_encode( $args['unique'] ) );

		$cache = self::_get( $key, $args );

		$serve_cache = true;
		if ( empty( $cache ) ) {
			$serve_cache = false;
		} elseif ( $args['ttl'] > 0 && $cache['timestamp'] < time() + $args['ttl'] ) {
			$serve_cache = false;
		} elseif ( ! hash_equals( $cache['unique'], $args['unique'] ) ) {
			$serve_cache = false;
		}

		if ( ! $serve_cache ) {
			self::$key = $key;
			self::$args = $args;
			self::$lock = true;

			ob_start();
			return false;
		}

		echo $cache['data'] . '(from cache)';
		return true;
	}

	private static function _get( $key, $args ) {
		$cache = null;

		switch ( $args['storage'] ) {
			case 'transient':
				$cache = get_transient( '_rm_fragment_cache:' . $key );
				break;
			case 'object-cache':
				$cache = wp_cache_get( $key, 'rm_fragment_cache' );
				break;
			case 'meta':
				if ( empty( $args['meta_type'] ) || empty( $args['object_id'] ) )
					throw new Exception( 'When using meta storage meta_type and object_id are required.' );

				$cache = get_metadata( $args['meta_type'], $args['object_id'], '_rm_fragment_cache:' . $key, true );
				break;
		}

		return $cache;
	}

	private static function _set( $key, $args, $value ) {
		switch ( $args['storage'] ) {
			case 'transient':
				$cache = set_transient( '_rm_fragment_cache:' . $key, $value, $args['ttl'] );
				break;
			case 'object-cache':
				$cache = wp_cache_set( $key, $value, 'rm_fragment_cache', $args['ttl'] );
				break;
			case 'meta':
				$cache = update_metadata( $args['meta_type'], $args['object_id'], '_rm_fragment_cache:' . $key, $value );
				break;
		}

		return true;
	}

	public static function store() {
		if ( ! self::$lock )
			throw new Exception( 'Attempt to store but output was not started.' );

		self::$lock = false;

		$data = ob_get_clean();

		$cache = array(
			'data' => $data,
			'timestamp' => time(),
			'unique' => self::$args['unique'],
		);

		self::_set( self::$key, self::$args, $cache );
		echo $data;
	}
}
