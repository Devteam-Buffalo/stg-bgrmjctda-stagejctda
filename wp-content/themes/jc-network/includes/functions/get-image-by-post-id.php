<?php
/*
**  @file               get-post-image.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               3/28/18
*/
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'jc_image_by_post_id' ) ) :

	function jc_image_by_post_id( $args = null ) {

		$post_id = $args['ID'] ?? get_queried_object_id();

		$options = wp_parse_args( $args, [
			'width'                   => 640,
			'height'                  => 480,
			'crop'                    => true,
			'crop_from_position'      => 'center,center',
			'resize'                  => true,
			'cache'                   => true,
			'jpeg_quality'            => 70,
			'resize_animations'       => true,
		] );
	
		if ( isset( $post_id ) ) {
			return wp_get_attachment_image_url( get_post_thumbnail_id( $post_id ), $options, false );
		}
		
		return $args;

	}

endif;