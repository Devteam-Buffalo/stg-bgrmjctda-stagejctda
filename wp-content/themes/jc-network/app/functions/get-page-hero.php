<?php
/*
**  @file               get-page-hero.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               3/30/18
*/
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'jc_get_page_hero' ) ) :

	function jc_get_page_hero( $args = null ) {
		
		if ( is_array( $args ) && function_exists( 'wpthumb' ) ) :

			$options = wp_parse_args( $args, [
				'post_id'           => null,
				'image_id'          => null,
				'image_url'         => null,
				'width'             => 3240,
				'height'            => 1080,
				'jpeg_quality'      => 50,
				'crop'              => true,
				'skip_remote_check' => true,
			] );

			$hero = [];

			if ( isset( $options['image_id'] ) ) :
				
				$image_id  = absint( $options['image_id'] );
				$image_url = wp_get_attachment_image_url( $image_id, 'full', false );

				$hero = [
					'image' => [
						'url'       => wpthumb( $image_url, $options ),
						'width'     => $options['width'],
						'height'    => $options['height'],
						'alt'       => get_post_meta( $image_id, '_wp_attachment_image_alt', true ),
						'title'     => get_the_title( $image_id ),
						'desc'      => get_the_content( $image_id ),
						'cap'       => get_the_excerpt( $image_id ),
						'credit'    => get_post_meta( $image_id, 'photo_credit', true ),
						'copyright' => get_post_meta( $image_id, 'copyright', true ),
					]
				];

			endif;

			if ( isset( $options['post_id'] ) ) :
				
				$post_id   = absint( $options['post_id'] );
				$image_id  = get_post_thumbnail_id( $post_id );
				$image_url = wp_get_attachment_image_url( $image_id, 'full', false );

				$hero = [
					'image' => [
						'url'       => wpthumb( $image_url, $options ),
						'width'     => $options['width'],
						'height'    => $options['height'],
						'alt'       => get_post_meta( $image_id, '_wp_attachment_image_alt', true ),
						'title'     => get_the_title( $image_id ),
						'desc'      => get_the_content( $image_id ),
						'cap'       => get_the_excerpt( $image_id ),
						'credit'    => get_post_meta( $image_id, 'photo_credit', true ),
						'copyright' => get_post_meta( $image_id, 'copyright', true ),
					],
					'page'  => [
						'title'     => get_the_title( $post_id ) ?? null
					],
				];
				
			endif;
	
			if ( isset( $options['image_url'] ) ) :

				$image_url = esc_url_raw( $options['image_url'] );
				$title = $args['title'] ?? null;
	
				$hero = [
					'image' => [
						'url' => wpthumb( $image_url, $options ),
					],
					'page'  => [
						'title' => $title
					],
				];
	
			endif;
	
			return $hero;

		else :

			return $args;

		endif;

	}

endif;