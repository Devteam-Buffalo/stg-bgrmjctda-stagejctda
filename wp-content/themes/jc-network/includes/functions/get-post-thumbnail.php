<?php
/*
**  @file               get-post-thumbnail.php
**  @description        ]
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               5/3/18
*/
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'jc_get_post_thumbnail' ) ) :

	function jc_get_post_thumbnail( $args = null ) {
		
		if ( is_pod( $args ) )
			$args = get_object_vars( $args );
		
		if ( is_array( $args ) && function_exists( 'wpthumb' ) ) {

			$args = wp_parse_args( $args, [
				'ID'                => $args['ID'] ? absint( $args['ID'] ) : null,
				'post_id'           => $args['post_id'] ? absint( $args['post_id'] ) : null,
				'image_id'          => $args['image_id'] ? absint( $args['image_id'] ) : null,
				'image_url'         => $args['image_url'] ? esc_url_raw( $args['image_url'] ) : null,
				'jpeg_quality'      => 85,
				'width'             => 2560,
				'height'            => 1920,
				'resize'            => true,
				'crop'              => false,
				'cache'             => true,
				'skip_remote_check' => false,
				'resize_animations' => true,
			] );

			$args = array_filter( $args );
			
			switch( $args ) {
				case 'ID' :
				case 'post_id' :
				case 'image_id' :
					$id = $args['ID'] ?? $args['post_id'];
					$image = $args['image_id'] ?? get_post_thumbnail_id( $id );
					$url = wp_get_attachment_image_url( $image, 'full', false );
					$hero = [
						'image' => [
							'url'       => wpthumb( $url, $args ),
							'width'     => $args['width'],
							'height'    => $args['height'],
							'alt'       => get_post_meta( $image, '_wp_attachment_image_alt', true ),
							'title'     => get_the_title( $image ),
							'desc'      => get_the_content( $image ),
							'cap'       => get_the_excerpt( $image ),
							'credit'    => get_post_meta( $image, 'photo_credit', true ),
							'copyright' => get_post_meta( $image, 'copyright', true ),
						],
						'page'  => [
							'title'     => get_the_title( $args['post_id'] )
						]
					];
					return $hero;
					break;

				case 'image_url' :
					$hero = [
						'image' => [
							'url' => wpthumb( $args['image_url'], $args ),
						],
						'page'  => [
							'title' => $args['title'] ?? null
						],
					];
					return $hero;
					break;
			}
		}	
		
		return false;

	}

endif;