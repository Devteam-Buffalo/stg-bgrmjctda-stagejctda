<?php
/*
**  @file               get-image.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               3/28/18
*/
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'jc_image_by_id' ) ) :

	function jc_image_by_id( $args = null ) {

		$image_id = $args['ID'] ?? get_queried_object_id();

		$options = wp_parse_args( $args, [
			'width'                   => 640,
			'height'                  => 480,
			'crop'                    => true,
			'crop_from_position'      => 'center,center',
			'resize'                  => true,
			'cache'                   => true,
			'skip_remote_check'       => true,
			'jpeg_quality'            => 70,
			'resize_animations'       => true,
		] );
	
		if ( isset( $image_id ) ) {
			return wp_get_attachment_image_url( $image_id, $options, false );
		}
		
		return $args;

	}

endif;