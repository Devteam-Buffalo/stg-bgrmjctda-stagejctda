<?php
/*
**  @file               model-page-content.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/2/18
*/
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'jc_page_content' ) ) :

	function jc_page_content( $post = null ) {
		
		if ( isset( $post ) && is_object( $post ) ) :

			$page = wp_parse_args( $post, [
				'page_excerpt' => ( isset( $post->page_excerpt ) && ! empty( $post->page_excerpt ) ) ? $post->page_excerpt : $post->post_excerpt,
				'page_content' => ( isset( $post->page_content ) && ! empty( $post->page_content ) ) ? $post->page_content : $post->post_content,
				'ugc_script' => ( isset( $post->ugc_script ) && ! empty( $post->ugc_script ) ) ? $post->ugc_script : null,
				'ugc_text' => ( isset( $post->ugc_text ) && ! empty( $post->ugc_text ) ) ? $post->ugc_text : false,
				'video_script' => ( isset( $post->video_script ) && ! empty( $post->video_script ) ) ? $post->video_script : null,
			] );
			
			ob_start();
			
			if ( is_singular( $post->post_type ) && ( ! empty( $page['page_content'] ) ) ) : ?>
			
				<div class="uk-text-break"><?= apply_filters( 'the_content', $page['page_content'] ) ?></div>
			
			<?php elseif ( is_post_type_archive( $post->post_type ) && ( ! empty( $page['page_excerpt'] ) ) ) : ?>
			
				<div class="uk-text-break"><?= apply_filters( 'the_excerpt', $page['page_excerpt'] ) ?></div>
			
			<?php else : ?>
			
				<div class="uk-text-large"><?= apply_filters( 'the_excerpt', $page['page_excerpt'] ) ?></div>
			
			<?php endif ?>
			
			<?= $page['ugc_script'] ?? null ?>
			<?= $page['ugc_text'] ? '<p class="uk-text-small">' . $page['ugc_text'] . '</p>' : null ?>
			<?= $page['ugc_script'] ?? null ?>
			
			<?php ob_get_flush();
			
		else :
		
			return false;
		
		endif;

	}

endif;