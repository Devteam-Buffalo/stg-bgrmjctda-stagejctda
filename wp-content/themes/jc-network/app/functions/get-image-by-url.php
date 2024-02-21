<?php
/*
**  @file               get-remote-image.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               3/28/18
**  @requires           wpthumb()
*/
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'jc_image_by_url' ) ) :

	function jc_image_by_url( $args = null ) {

		$url = $args['url'] ?? null;
	
		if ( isset( $url ) && function_exists( 'wpthumb' ) ) {
	
			$options = wp_parse_args( $args, [
				'width'                   => 640,
				'height'                  => 480,
				'crop'                    => true,
				'skip_remote_check'       => true,
				'jpeg_quality'            => 70,
			] );

			return wpthumb( $url, $options );
		}
		
		return $args;

	}

endif;
