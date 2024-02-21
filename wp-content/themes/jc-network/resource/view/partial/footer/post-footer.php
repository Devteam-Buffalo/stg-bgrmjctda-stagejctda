<?php
/*
**  @file               post-footer.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/21/18
*/
defined( 'ABSPATH' ) || exit;

$share = [
	'shortlink' => wp_get_shortlink( get_the_id() ),
	'title'     => get_the_title( get_the_id() ),
	'excerpt'   => get_the_excerpt( get_the_id() ),
	'thumbnail' => wp_get_attachment_image_url( get_post_thumbnail_id( get_the_id() ), 'full', false ),
]; ?>

<footer>
	<div class="uk-grid uk-grid-width-1-1 uk-grid-width-medium-1-2">
		<div class="uk-text-small">
			<?php jc_post_date() ?>
			
			<?php jc_list_categories() ?>
			
			<?php jc_list_tags() ?>
		</div>
		<div class="uk-text-center">
			<small class="uk-text-uppercase text-light-grey sans-serif">Share this Blog Post</small>
	
			<?php pods_view( 'resource/view/partial/cta/social-share.php', compact( array_keys( get_defined_vars() ) ) ) ?>
		</div>
	</div>

	<?php edit_post_link( '<span class="uk-icon-pencil uk-icon-justify"></span> Edit this Page', '<hr>', '', get_the_id(), 'uk-button-link' ) ?>
</footer>