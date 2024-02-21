<?php
/*
**  @file               get-page-intro.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               5/4/18
*/
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'jc_get_intro' ) ) :

	function jc_get_intro( $post = null ) {
		
		if ( isset( $post ) && is_object( $post ) ) {

			$page = wp_parse_args( $post, [
				'page_heading'    => ( isset( $post->page_heading ) && ( ! empty( $post->page_heading ) ) ) ? $post->page_heading : $post->post_title,
				'page_subheading' => ( isset( $post->page_subheading ) && ( ! empty( $post->page_subheading ) ) ) ? $post->page_subheading : false,
				'page_intro'      => ( isset( $post->page_intro ) && ( ! empty( $post->page_intro ) ) ) ? $post->page_intro : false,
			] );
			
			$center_page_intro = get_post_meta( get_the_id(), 'center_page_intro', true );
			$stylize_page_intro = get_post_meta( get_the_id(), 'stylize_page_intro', true );
			
			ob_start(); ?>

			<div class="intro<?= ( $center_page_intro === '1' ) ? ' centered' : null ?><?= ( $stylize_page_intro === '1' ) ? ' styled' : null ?>">
			
			<?php if ( ! ( has_post_thumbnail() || is_front_page() ) ) : ?>
				
				<h1><?= apply_filters( 'the_title', $page['page_heading'] ) ?></h1>
				<h3><?= apply_filters( 'the_title', ucwords( strtolower( $page['page_subheading'] ) ) ) ?></h3>
				<?= $page['page_intro'] ?>

			<?php else : ?>
				
				<h2><?= apply_filters( 'the_title', $page['page_heading'] ) ?></h2>
				
				<?php if ( $page['page_subheading'] ) : ?>
					<h3><?= apply_filters( 'the_title', ucwords( strtolower( $page['page_subheading'] ) ) ) ?></h3>
				<?php endif ?>

				<?php if ( $page['page_intro'] ) : ?>
					<?= $page['page_intro'] ?>
				<?php endif ?>

			<?php endif ?>
			
			</div>

			<?php ob_get_flush();

		}
		
		return true;

	}

endif;