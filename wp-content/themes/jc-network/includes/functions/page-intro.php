<?php
if ( ! function_exists( 'jc_page_intro' ) ) :
	function jc_page_intro($post = null) {
		if ( isset( $post ) && is_object( $post ) ) {
			$page = wp_parse_args($post, [
				'page_heading'    => (isset($post->page_heading) && (! empty($post->page_heading))) ? $post->page_heading : $post->post_title,
				'page_subheading' => (isset($post->page_subheading) && (! empty($post->page_subheading))) ? $post->page_subheading : false,
				'page_intro'      => (isset($post->page_intro) && (! empty($post->page_intro))) ? $post->page_intro : false,
			]);
			$center_page_intro = get_post_meta(get_the_id(), 'center_page_intro', true);
			$stylize_page_intro = get_post_meta(get_the_id(), 'stylize_page_intro', true);
			ob_start(); ?>
			<div class="intro<?= $center_page_intro ? ' centered' : null ?><?= $stylize_page_intro ? ' styled' : null ?>">
				<?php if ($page['page_heading']) : ?>
					<h1><?= apply_filters('the_title', $page['page_heading']) ?></h1>
				<?php endif ?>
				<?php if ($page['page_subheading']) : ?>
					<h3><?= apply_filters('the_title', $page['page_subheading']) ?></h3>
				<?php endif ?>
				<?= $page['page_intro'] ? $page['page_intro'] : null ?>
			</div>
			<?php ob_get_flush();
		}
	}
endif;
